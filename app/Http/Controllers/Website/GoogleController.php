<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class GoogleController extends Controller
{
    protected $guard = 'web';
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    protected $loginPath = '/login';
    
    public function redirectToGoogle()
    {
        $query = http_build_query([
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => 'openid profile email',
            'access_type' => 'offline',
            'prompt' => 'select_account consent',
        ]);

        return redirect('https://accounts.google.com/o/oauth2/v2/auth?' . $query);
    }

    public function handleGoogleCallback(Request $request)
    {
        if (!$request->has('code')) {
            return redirect('/login')->with('error', 'Authorization code not provided.');
        }
        
        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'grant_type' => 'authorization_code',
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'client_secret' => env('GOOGLE_CLIENT_SECRET'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
            'code' => $request->code,
        ]);

        $data = $response->json();

        // Fetch user info
        $userInfo = Http::withHeaders([
            'Authorization' => 'Bearer ' . $data['access_token'],
        ])->get('https://www.googleapis.com/oauth2/v3/userinfo')->json();

        // Check if email already exists
        $existingUser = User::where('email', $userInfo['email'])->first();

        if ($existingUser) {
            // If email exists, show validation error
            if($existingUser->socialLogin == 1){
                if (Auth::guard('web')->attempt(['email' => $userInfo['email'], 'password' => $userInfo['email']])) {
                    $user = Auth::user();
                    $api_token = $user->createToken($user->email)->accessToken;
                    if ($request->fcm_token ) {
                        $user->fcm_token = $request->fcm_token;
                        $user->api_token = $api_token;
                        $user->image_url = $request->image_url;
                        $user->update();
                    }
                    $user->api_token = $api_token;
                    $user->save();
                    return redirect('/');
                }
            }else{
              return redirect($this->loginPath)->with('error', 'Your email is already registered, and you haven’t logged in with Google. Please log in using your password, or if you don’t remember it, use the ‘Forgot Password’ option.');  
            }
        }

        // If email does NOT exist, you can create a new user (optional)
        $user = User::create([
            'firstname' => $userInfo['name'],
            'email' => $userInfo['email'],
            'password' => bcrypt($userInfo['email']), // generate random password
            'socialLogin' => 1
        ]);

        if (Auth::guard('web')->attempt(['email' => $userInfo['email'], 'password' => $userInfo['email']])) {
            $user = Auth::user();
            $api_token = $user->createToken($user->email)->accessToken;
            if ($request->fcm_token ) {
                $user->fcm_token = $request->fcm_token;
                $user->api_token = $api_token;
                $user->image_url = $request->image_url;
                $user->update();
            }
            $user->api_token = $api_token;
            $user->save();
            return redirect('/');
        }

        return redirect('/login');
    }
}

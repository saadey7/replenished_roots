<?php

namespace App\Http\Controllers\Website;

use Validator;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
    protected $guard = 'web';
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    protected $loginPath = '/login';
    public function login(){
        return view('website.pages.login');
    }
    
    public function process_login(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
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
        } else {
            return Redirect::back()->withErrors('Invalid Email or Password');
        }
    }

    public function register(){
        return view('website.pages.register');
    }

    public function process_register(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'firstname'=>'required',
            'email' => 'unique:users|required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        //If any Validation fail
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        //Image
        if ($request->hasFile('image')) {
            //upload new file
            $extension = $request->image->extension();
            $filename = time() . "_." . $extension;
            $request->image->move(public_path('/assets/images/user'), $filename);
            $input['image'] = $filename;
        }



        //Convert Password into hash
        $input['password'] = bcrypt($input['password']);

        //Create User
        $user = User::create($input);

        //Update Token created user

        $api_token = $user->createToken($user->email)->accessToken;

        // $emailverfication = EmailVerfication::updateOrCreate(['email' => $user->email],
        //     [
        //         'email' => $user->email,
        //         'pin' => mt_rand(1000, 9999),
        //     ]
        // );
        $user = User::find($user->id);
        if ($user) {
            // $user->notify(
            //     new EmailVerificationRequest($emailverfication->pin)
            // );
            return redirect('login');
        }

    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmailVerfication;
use App\Models\RequestNotification;
use App\Models\PasswordReset;
use App\Models\User;
use App\Models\Province;
use App\Models\Legal;
use App\Models\City;
use App\Notifications\EmailVerificationRequest;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;
use Validator;
use Illuminate\Support\Facades\Schema;

class UserController extends Controller
{
    public $successStatus = 200;
    public $errorStatus = 404;
    public function register(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstname'=>'required',
            'email' => 'unique:users|required|email',
            'password' => 'required|confirmed|min:6',
        ]);
        $checkUser = User::where('email', $request->email)->first();
        if($checkUser){
             return response()->json(['status' => 'error','message'=>$validator->errors(),'validaterror'=>"1", 'key1' => 2, 'login' => 1], 401);
        }

        //If any Validation fail
        if ($validator->fails()) {
             return response()->json(['status' => 'error','message'=>$validator->errors(),'validaterror'=>"1", 'key1' => 2], 401);
        }

        //Image

            if ($request->hasFile('image')) {
                //upload new file
                $extension = $request->image->extension();
                $filename = time() . "_." . $extension;
                $request->image->move(public_path('assets/images/user'), $filename);
                $input['image'] = $filename;
            }



        //Convert Password into hash
        $input['password'] = bcrypt($input['password']);

        //Create User
        $user = User::create($input);

        //Update Token created user

        $api_token = $user->createToken($user->email)->accessToken;

        User::where('id', $user->id)->update(['api_token' => $api_token]);

        // $emailverfication = EmailVerfication::updateOrCreate(['email' => $user->email],
        //     [
        //         'email' => $user->email,
        //         'pin' => mt_rand(1000, 9999),
        //     ]
        // );
        $user = User::find($user->id);
        // $userdata = UserResource::make($user);
        if ($user) {
            // $user->notify(
            //     new EmailVerificationRequest($emailverfication->pin)
            // );
            return response()->json([
                "userdata" => $user,
                "message" => "User Registered Successfully",
                "status" => 'success','validaterror'=>"0"
            ],$this->successStatus);
        }

    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            if ($user->type == 'Driver') {
                 if ($user->driver_approve == 1) {
                    $success['token'] = $user->createToken($user->email)->accessToken;
                    $user->api_token = $success['token'];
                    if ($request->fcm_token) {
                        $user->fcm_token = $request->fcm_token;
                        $user->image_url = $request->image_url;
                        $user->update();
                    }
                    $user->save();
                    User::where('id', $user->id)->update(['status' => 1]);
                    return response()->json([
                            'userdata' => $user,
                            "message" => "Driver Logged In Successfully",
                            "status" => 'success'
                        ], $this->successStatus);
                 } else {
                    return response()->json([
                        "message" => "Your account must be approved by Admin",
                        "status" => 'error'
                    ], 401);
                 }
                 
            }
            $success['token'] = $user->createToken($user->email)->accessToken;
            $user->api_token = $success['token'];
            if ($request->fcm_token) {
                $user->fcm_token = $request->fcm_token;
                $user->image_url = $request->image_url;
                $user->update();
            }
            $user->save();
            User::where('id', $user->id)->update(['status' => 1]);
            // $userdata = UserResource::make($user);
            return response()->json([
                    'userdata' => $user,
                    "message" => "User Logged In Successfully",
                    "status" => 'success','validaterror'=>"0"
                ]
                , $this->successStatus);
        } elseif($request->socialType == 'social'){
            return response()->json(['message' => 'Social Login', 'social' => 1, 'status' => 'error'], 401);
        } else {
            return response()->json(['message' => 'Invalid Username or Password', 'status' => 'error'], 401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['message' => "User Not found", 'status' => 'error'], $this->errorStatus);
        }
        return response()->json([
            "userdata" => $user,
            "message" => "Get User Data Successfully",
            "status" => 'success'
        ], $this->successStatus);
    }

    // forgot password methods
    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);
        if ($validator->fails()) {
            return response()->json(['message'=> $validator->errors(), 'status' => 'error'], 401);
        }
        $user = User::where('email', $request->email)->first();
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address.",
                'status' => 'error'
            ], $this->errorStatus);

        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'pin' => mt_rand(1000, 9999),
            ]
        );
        if ($user && $passwordReset)
            $user->notify(
                new PasswordResetRequest($passwordReset->pin)
            );
        return response()->json([
            'message' => "We have e-mailed your password reset link!",
            'status' => 'success'
        ],$this->successStatus);
    }


    //Update fcm token

    public function updateFcmToken(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['message'=> "User Not found", 'status' => 'error'], $this->errorStatus);
        }
        User::where('id',$user->id)->update(['fcm_token'=>$request->fcm_token]);
        
        return response()->json([
            'message' => "Token Updated Successfully",
            'status' => 'success'
        ],$this->successStatus);
    }

    public function confirmCode(Request $request)
    {
        $pin = $request->pin;
        $email = $request->email;
        $passwordReset = PasswordReset::where([['pin', $pin],['email',$email]])->first();
        if (!$passwordReset)
            return response()->json([
                'error' => "This password reset token is invalid.", 'status' => 'error'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'error' => "This password reset token is invalid.", 'status' => 'error'
            ], 404);
        }
        return response()->json([$passwordReset,
            "message" => "Success",
            "status" => "success"]);
    }


    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find(Request $request)
    {
        $token = $request->token;

        $passwordReset = PasswordReset::where('token', $token)
            ->first();
        if (!$passwordReset)
            return response()->json([
                'error' => "This password reset token is invalid.", 'status' => 'error'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'error' => "This password reset token is invalid.", 'status' => 'error'
            ], 404);
        }
        return response()->json([$passwordReset,
            "message" => "Success",
            "status" => "success"]);
    }

    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'pin' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 'error'], 401);
        }

        $passwordReset = PasswordReset::where([
            ['pin', $request->pin],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.', 'status' => 'error'
            ], $this->errorStatus);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address.", 'status' => 'error'
            ], $this->errorStatus);
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json(['userdata' => $user, 'status' => 'success'], $this->successStatus);
    }

    public function edit(Request $request)
    {
        $user = auth('api')->user();
        if (!$user) {
            return response()->json(['message' => "User Not found", 'status' => 'error'], $this->errorStatus);
        }

        if ($request) {
            $requests = $request->except('password_confirmation');
            $input = $requests;

            if ($request->hasFile('image')) {

                //code for remove old file

                if ($user->image != null) {
                    $url_path = parse_url($user->image, PHP_URL_PATH);
                    $basename = pathinfo($url_path, PATHINFO_BASENAME);
                    $file_old =  public_path("assets/images/user/$basename");
                    unlink($file_old);
                }
                //upload new file
                $extension = $request->image->extension();
                $filename = time() . "_." . $extension;
                $request->image->move(public_path('assets/images/user'), $filename);
                $input['image'] = $filename;
            }

            if($request->password != null && $request->password_confirmation != null)
            {
                if($request->password_confirmation == $request->password)
                    $input['password'] = Hash::make($request->password);
                else
                 return response()->json(['message' => 'Your Password and Confirm are mismatch', 'status' => 'error'], $this->errorStatus);
            }

            //prevent user not update email
                $input['email'] = $user->email;
                $user->update($input);
                $userdata= User::find($user->id);
                // $userdetail = UserResource::make($userdata);
            return response()->json(['userdata' => $userdata,'message' => "User Data Updated Successfully", 'status' => 'success'],$this->successStatus);
        } else {
            return response()->json(['error' => "User Data was not Updated ", 'status' => 'error'],$this->errorStatus);
        }

    }

    public function changePassword(Request $request)
    {
        $user_id = auth('api')->user()->id;
        $user = User::find($user_id);
        if (!$user) {
            return response()->json(['message' => 'User not found by this Id', 'status' => 'error'], $this->errorStatus);
        }

        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|confirmed|min:6|max:11',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 'error'], $this->errorStatus);
        }

        if (Hash::check($request->old_password, $user->password)) {
            if ($request->old_password == $request->password) {
                $error['password'] = ['New Password cannot be the same as your Old Password'];
                return response()->json(['message' => $error, 'status' => 'error'], $this->errorStatus);
            }
            $user->fill(['password' => Hash::make($request->password)])->save();
            return response()->json(['userdata' => $user, 'status' => 'success'], $this->successStatus);
        } else {
            $error['old_password'] = ['Your old password was incorrect'];

            return response()->json(['message' => $error, 'status' => 'error'], $this->errorStatus);
        }

    }


    public function verifyEmail(Request $request)
    {

        $token = $request->pin;
        $email = $request->email;
        $emailverfication = EmailVerfication::where([['pin', $token],['email',$email]])->first();
        if (!$emailverfication)
            return response()->json([
                'error' => "This Verfication Code is invalid."
            ], $this->errorStatus);
        User::where('email', $emailverfication->email)->update(['email_verified_at' => Carbon::now()]);
        $user = User::where('email', $emailverfication->email)->first();

        $user->api_token = $user->createToken($emailverfication->email)->accessToken;
        if (!$emailverfication)
            return response()->json([
                'message' => "This Verfication Code is invalid.", 'status' => 'error'
            ], $this->errorStatus);
        if (Carbon::parse($emailverfication->updated_at)->addMinutes(720)->isPast()) {
            $emailverfication->delete();
            return response()->json([
                'message' => "Pin Expired.", 'status' => 'error'
            ], $this->errorStatus);
        }
        return response()->json([$user,
            "success" => "Email Verfied Successfully"],$this->successStatus);
    }

    public function confirmPassword($id, Request $request)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found by this Id', 'status' => 'error'], $this->errorStatus);
        }
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'This password confirmation not match', 'status' => 'error'], $this->errorStatus);
        }

        if (Hash::check($request->old_password, $user->password)) {
            $user->fill(['password' => Hash::make($request->password)])->save();
            return response()->json(['userdata' => $user, 'status' => 'success'], $this->successStatus);
        } else {

            return response()->json(['message' => 'Your old password was incorrect', 'status' => 'error'], $this->errorStatus);
        }

    }

    public function delete() 
    {
        $user = User::where('id','>',0)->delete();
        if($user){
            return response()->json(['message' => "User  Deleted", 'status' => 'success']);
        }
        else{
            return response()->json(['message' => "User Not Deleted", 'status' => 'error'], $this->errorStatus);
        }
    }
    
    public function province() 
    {
        $data = Province::with('city')->get();
        return response()->json([
            'province' => $data, 
            'message' => "All Province", 
            'status' => 'success'
        ]);
    }
    
    public function getcities(Request $request){
        $name = $request->province;
        $data = Province::where('province', $name)->first();
        $cities = City::where('province_id', $data->id)->get();
        return response()->json([
            'cities' => $cities, 
            'message' => "All Cities", 
            'status' => 'success'
        ]);
    }
    
    public function terms(){
        $data = Legal::where('contentName', 'Term & Conditions')->first();
        $about = Legal::where('contentName', 'About Us')->first();
        $privacy = Legal::where('contentName', 'Privacy Policy')->first();
        return response()->json([
            'terms' => $data, 
            'about' => $about, 
            'privacy' => $privacy, 
            'message' => "Terms & Conditions", 
            'status' => 'success'
        ]);
    }
    
    public function deleteUser(){
        $user = auth('api')->user();
        $data = User::find($user->id);
        $data->delete();
        return response()->json([
            'message' => "Deleted Successfully", 
            'status' => 'success'
        ]);
    }
    
    public function get_Cookies(){
        $data = 'ig_did=3C4D5779-26AF-4302-BD81-5A7900DA1316; datr=8NjwZCfxP6cWQAnShpuxOp7W; ig_nrcb=1; mid=ZPDY8wAEAAFdFHBCBeZEFo26iyvf; ds_user_id=63558934331; ps_n=0; ps_l=0; csrftoken=d2zaj6V34w2QM6XFJcg2UBKW8QSdwI1B; shbid="7952\05463558934331\0541738125932:01f70933f5a8a0c79e08783af2adfb95462fee1f60acd6fca921ac4222c0eb03cb256182"; shbts="1706589932\05463558934331\0541738125932:01f77bbfccc02a90eb0362eb4db04f0f24d8f73cd96432814d90aebda6bf848ab7480464"; rur="CLN\05463558934331\0541738136624:01f76c58cbc9a3e4f05c153092c1f66d47303acfdc50c2a11cf4ce5a8bb740f6d1c3599d"; sessionid=63558934331%3A8ijyDK1wGVbheA%3A2%3AAYeAVNaMdtJvyJ4jvMo-9YC8WlnRxwZ5nozwoxfK7g';
        print_r($data);
    }

}

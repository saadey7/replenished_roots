<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'image',
        'phone_no',
        'province',
        'city',
        'address',
        'zipcode',
        'status',
        'fcm_token',
        'latitude',
        'longitude'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getImageAttribute($value)
    {
        if($value == null)
        {
           return null;
        }
        else
        {
            return asset('/public/assets/images/user/' . $value);
        }

    }
    
    // public function sendNotification($user_id,$data_array,$getMessage)
    // {
    //     try{
    //         $user = User::find($user_id);
    //         $firebaseToken = $user->fcm_token;
        
    //         // Initialize the Firebase Admin SDK
    //         $firebaseFactory = (new Factory)
    //             ->withServiceAccount(__DIR__.'/firebasejson/quiksirv.json');
        
    //         $messaging = $firebaseFactory->createMessaging();
        
    //         // Create the notification message
    //         $notification = [
    //             'title' => $data_array['title'],
    //             'body' => $data_array['body']
    //         ];
        
    //         $message = CloudMessage::withTarget('token', $firebaseToken)
    //             ->withNotification($notification)
    //             ->withData([
    //                 'description' => $data_array['description'],
    //                 'type' => $data_array['type'],
    //                 'my_token' => $user->api_token,
    //             ]);
        
    //         // Send the message
    //         $response = $messaging->send($message);
        
    //         // Return response
    //         return response()->json(['success' => $response]);
    //     } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
    //         // Handle the exception
    //         // Remove the FCM token from the user's record
    //         $user->fcm_token = null;
    //         $user->save();
            
    //         // Return a response indicating that the notification was not sent
    //         return response()->json([
    //             'message' => "Notification not sent due to invalid FCM token",
    //             'status' => 'error'
    //         ], 400);
    //     }
    // }

    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guard = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'fcm_token',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function sendNotification($user_id,$data_array,$getMessage)
    {
        try{
            $user = Admin::find($user_id);
            $firebaseToken = $user->fcm_token;
        
            // Initialize the Firebase Admin SDK
            $firebaseFactory = (new Factory)
                ->withServiceAccount(__DIR__.'/firebasejson/replenished.json');
        
            $messaging = $firebaseFactory->createMessaging();
        
            // Create the notification message
            $notification = [
                'title' => $data_array['title'],
                'body' => $data_array['body']
            ];
        
            $message = CloudMessage::withTarget('token', $firebaseToken)
                ->withNotification($notification)
                ->withData([
                    'description' => $data_array['description'],
                    'type' => $data_array['type'],
                    'my_token' => $user->api_token,
                ]);
        
            // Send the message
            $response = $messaging->send($message);
        
            // Return response
            return response()->json(['success' => $response]);
        } catch (\Kreait\Firebase\Exception\Messaging\NotFound $e) {
            // Handle the exception
            // Remove the FCM token from the user's record
            $user->fcm_token = null;
            $user->save();
            
            // Return a response indicating that the notification was not sent
            return response()->json([
                'message' => "Notification not sent due to invalid FCM token",
                'status' => 'error'
            ], 400);
        }
    }

}

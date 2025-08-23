<?php

namespace App\Http\Resources;
use App\Models\Connections;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {  
        $splitName = explode(' ', $this->fullname, 2);
        return[
            'id' => $this->id,
            'firstname' => $splitName[0],
            'lastname' => $splitName? $splitName[1] : '',
            'email' => $this->email,
            'image' => $this->image,
            'phone_no' => $this->phone_no,
            'city' => $this->city,
            'area' => $this->area,
            'address' => $this->address,
            'email_verified_at' => $this->email_verified_at,
            'api_token' => $this->api_token,
            'fcm_token' => $this->fcm_token,
            'status' => $this->status,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
   
    }
}

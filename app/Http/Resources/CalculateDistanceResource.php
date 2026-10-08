<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Setting;
use App\Models\Connections;
class CalculateDistanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user = Auth::user();

        $R = 6371;

         $latitude = $user->latitude - $this->latitude;
         $longitude = $user->longitude - $this->longitude;

         $dlatitude = deg2rad($latitude);
         $dlongitude = deg2rad($longitude);

         $a = sin($dlatitude/2) * sin($dlatitude/2) + cos(deg2rad($user->latitude)) * cos(deg2rad($this->latitude))
                * sin($dlatitude/2) * sin($dlatitude/2);

        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        $distanceKM = $R * $c;

        $result = round($distanceKM,3). ' '. "KM";
        
        return[
            'id'=>$this->id,
            'username'=>$this->username,
            'email'=>$this->email,
            'image'=>$this->image,
            'zip_code'=>$this->zip_code,
            'notification_status'=>$this->notification_status,
            'status'=>$this->status,
            'email_verified_at'=>$this->email_verified_at,
            'api_token'=>$this->api_token,
            'fcm_token'=>$this->fcm_token,
            'distance' => $result,

        ];

    }
}

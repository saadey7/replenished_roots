<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CalculateDistanceResource;
use App\Models\Connections;
use App\Models\User;
use App\Models\Experience;
use App\Models\ExperienceBookMark;

class UserProfileResource extends JsonResource
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
        
        //Get BookMarked
        $bookM_detail = ExperienceBookMark::where('user_id', $user->id)->get('experience_id');
        $array = collect($bookM_detail);
        $bookmarked = $array->flatten()->unique();
        $all_bookmarked  =  Experience::whereIn('id',$bookmarked)->get();
        //Get BookMarked
        
        //Get Connection
        $id_list1 = Connections::where('sender_id',$this->id)->pluck('receiver_id');
        $id_list2 = Connections::where('receiver_id',$this->id)->pluck('sender_id');
        $array = collect([$id_list1,$id_list2]);
        $result = $array->flatten()->unique();
        $all_friends  =  User::whereIn('id',$result)->get();
        //Get Connection
        
        
        //Data Count
        $totalexperience = Experience::where('user_id', $this->id)->count();
        $totalconnections = Connections::where([['receiver_id', $this->id], ['connection', 'true']])->orWhere([['sender_id', $this->id], ['connection', 'true']])->count();
        $totalbookmarked = ExperienceBookMark::where('user_id', $this->id)->count();
        // Data Count
        
    //Distance
        //$check  =  User::whereIn('id',$result)->get(['latitude', 'longitude']);
        
       $get_distance =  CalculateDistanceResource::collection($all_friends);
        
    //Distance
        
        return[
            'totalexperience' => $totalexperience,
            'totalconnections' => $totalconnections,
            'totalbookmarked' => $totalbookmarked,
            'id'=>$this->id,
            'username'=>$this->username,
            'email'=>$this->email,
            'image'=>$this->image,
            'zip_code'=>$this->zip_code,
            'api_token'=>$this->api_token,
            'fcm_token'=>$this->fcm_token,
            'experience'=>$this->experience,
            'bookmarked'=>$all_bookmarked,
            'connections'=>$all_friends,
            'distance' => $get_distance
            ];
    }
}

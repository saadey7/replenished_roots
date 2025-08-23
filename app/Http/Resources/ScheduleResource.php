<?php

namespace App\Http\Resources;
use App\Models\ScheduleTime;
use App\Models\Schedule;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {  
        return[
            'id'=> $this->id,
            'from'=> $this->from,
            'to' =>  $this->to
        ];
   
    }
}

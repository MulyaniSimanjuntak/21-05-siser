<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'user_id'=>$this->user_id,
        'name'=>$this->name,
        'topic'=>$this->topic,
        'category'=>$this->category,
        'description'=>$this->description,
        'host'=>$this->host,
        'date'=>$this->date,
        'event_time_start'=>$this->event_time_start,
        'event_time_finish'=>$this->event_time_finish,
        'participants'=>$this->participant,
        'event_link'=>$this->event_link,
        'status'=>$this->status,
        'starting_status'=>$this->starting_status,
        'description_reject'=>$this->description_reject,
        ];
    }
}
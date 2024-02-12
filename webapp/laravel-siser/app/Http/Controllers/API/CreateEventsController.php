<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Event;
use App\Http\Controllers\API\APIController as APIController;

class CreateEventsController extends APIController
{
    public function getall(){
        $allevent=DB::table('events')-> get();
        return response()->json([
            'event'=>$allevent
        ]);
    }
    public function CreateEvents(Request $request){
        $event=Event::create([
        'user_id'=>$request->user_id,
        'name'=>$request->name,
        'topic'=>$request->topic,
        'category'=>$request->category,
        'description'=>$request->description,
        'host'=>$request->host,
        'date'=>$request->date,
        'event_time_start'=>$request->event_time_start,
        'event_time_finish'=>$request->event_time_finish,
        'participants'=>$request->participant,
        'event_link'=>$request->event_link,
        'status'=>$request->status,
        'starting_status'=>$request->starting_status,
        'description_reject'=>$request->description_reject,
        ]);
        $data =$event;

        return $this->sendResponse($data, 'Event successfully created');

    }
}
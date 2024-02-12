<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\APIController as APIController;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Validator;
use DB;

class EventsController extends APIController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function findEvent(Event $event)
    {
        $find_event = Event::find($event->id);

        if ($find_event == NULL) {
            return $this->sendError('Event not found.', ['data' => 'Event you want to delete is not found.'], 404);
        } else {
            $find_event->delete();
            $data = $find_event;

            return $this->sendResponse($data, 'Event marked as deleted, you can restore it later.');
        }
    }

    public function startEvent($id)
    {
        $start_event = Event::where('id', $id)->first();

        if ($start_event == NULL){
            return $this->sendError('comment not found.', ['data' => 'comment you want to edit not found or deleted.'], 404);
        } else {
            $start_event->update([
                'starting_status' => "event in progress",
            ]);

            $start_event->save();
            $data = $start_event;

            return $this->sendResponse($data, 'Event successfully started.');
        }   
     }
    public function stopEvent(Event $event)
    {
        $stop_event = Event::where('id', $event->id)->first();

        if ($stop_event == NULL){
            return $this->sendError('Event not found.', ['error' => 'Data not Found'], 401);
        } else {
            $stop_event->update([
                'starting_status' => "Event Is Over",
            ]);

            $stop_event->save();
            $data = $stop_event;

            return $this->sendResponse($data, 'Event successfully stoped.');
        }
    }
}
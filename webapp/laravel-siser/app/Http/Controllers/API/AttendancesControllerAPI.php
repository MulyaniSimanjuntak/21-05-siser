<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Comment;
use App\Models\Attendance;
use App\Http\Controllers\API\APIController as APIController;
use Illuminate\Support\Facades\Auth;

class AttendancesControllerAPI extends APIController
{
    public function createAttendance(Event $event)
    {
        $attendance = Attendance::create([
            'event_id' => $event->id,
        ]);

        $data = $attendance;
        $data['links'] = [
            "href" => "/event_view/" . $event->id,
            "rel" => "Events",
            "type" => "GET"
        ];

        return $this->sendResponse($data, 'Attendance created successfully.');
    }
}
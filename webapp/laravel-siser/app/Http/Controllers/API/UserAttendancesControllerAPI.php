<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\Attendance;
use App\Models\UserAttendance;
use App\Http\Controllers\API\APIController as APIController;
use Illuminate\Support\Facades\Auth;

class UserAttendancesControllerAPI extends APIController
{
    public function doAttend(Event $event)
    {
        $event_attend = Attendance::where('event_id', $event->id)->first();
        $user = Auth::user();
        $attendance = UserAttendance::create([
            'user_id' => $user->id,
            'attendance_id' => $event_attend->id,
            'time_attend_start' => Carbon::now(),
            'time_attend_stop' => NULL,
            'attend_status' => 'Attended',
        ]);

        $data = $attendance;
        $data['links'] = [
            "href" => "/event_view/" . $event->id,
            "rel" => "Events",
            "type" => "GET"
        ];

        return $this->sendResponse($data, 'User Successfully do Attended.');
    }

    public function doStopAttend(Attendance $attendances, Event $event)
    {
        $user = Auth::user();
        $attendance = UserAttendance::where([
            ['user_id', $user->id],
            ['attendance_id', $attendances->id]
        ])->first();

        $attendance->update([
            'attend_status' => "Stop Attend",
            'time_attend_stop' => Carbon::now(),
        ]);
        $attendance->save();

        $data = $attendance;
        $data['links'] = [
            "href" => "/event_view/" . $event->id,
            "rel" => "Events",
            "type" => "GET"
        ];

        return $this->sendResponse($data, 'Attendance successfully Stoped.');
    }
}

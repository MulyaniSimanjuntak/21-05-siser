<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Certificate;
use App\Models\Comment;
use App\Models\Event;
use App\Models\LogActivity;
use App\Models\Participant;
use App\Models\User;
use App\Models\UserAttendance;
use App\Models\UserCertificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventsConfirmationController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events_confirmation.events_confirmation', compact('events'));
    }

    public function confirmed(Event $event)
    {
        Event::where('id', $event->id)
            ->update([
                'status' => "confirmed",
                'description_reject' => "confirmed"
            ]);

        LogActivity::create([
            'username' => session('username'),
            'activity' => "Confirm Create Event",
            'date_time' => Carbon::now(),
        ]);
        return redirect('/events_confirmation');
    }

    public function rejected(Request $request, Event $event)
    {
        Event::where('id', $event->id)
            ->update([
                'status' => "rejected",
                'description_reject' => $request->description_reject,
            ]);

        LogActivity::create([
            'username' => session('username'),
            'activity' => "Reject Create Event",
            'date_time' => Carbon::now(),
        ]);
        return redirect('/events_confirmation');
    }
}

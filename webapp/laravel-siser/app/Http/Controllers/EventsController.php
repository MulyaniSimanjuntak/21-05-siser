<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Http\Controllers\Session;
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

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('status', 'confirmed')->get();
        return view('events.events_view', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.events_create');
    }

    public function yourEvents(User $user)
    {
        $events = Event::where('user_id', $user->id)->get();
        return view('events.your_events_view', compact('events'));
    }

    public function yourEventsHistory(User $user)
    {
        $events = DB::table('events')
            ->join('participants', 'events.id', '=', 'participants.event_id')
            ->where('participants.user_id', '=', session('id'))
            ->select('events.*')
            ->get();

        return view('events.your_events_history', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date("Y-m-d", strtotime(str_replace("/", "-", $request->date)));
        if (session('role') == "admin") {
            Event::create([
                'user_id' => session('id'),
                'name' => $request->name,
                'topic' => $request->topic,
                'category' => $request->category,
                'description' => $request->description,
                'host' => $request->host,
                'date' => $date,
                'event_time_start' => $request->event_time_start,
                'event_time_finish' => $request->event_time_finish,
                'participants' => NULL,
                'event_link' => $request->event_link,
                'status' => "confirmed",
                'starting_status' => "waiting"
            ]);

            LogActivity::create([
                'username' => session('username'),
                'activity' => "Create Events",
                'date_time' => Carbon::now(),
            ]);

            return redirect('event')->with('message2', 'Pendaftaran Acara berhasil');
        } else {
            Event::create([
                'user_id' => session('id'),
                'name' => $request->name,
                'topic' => $request->topic,
                'category' => $request->category,
                'description' => $request->description,
                'host' => session('name'),
                'date' => $date,
                'event_time_start' => $request->event_time_start,
                'event_time_finish' => $request->event_time_finish,
                'participants' => NULL,
                'event_link' => $request->event_link,
                'status' => "waiting",
                'starting_status' => "waiting"
            ]);

            LogActivity::create([
                'username' => session('username'),
                'activity' => "Create Events",
                'date_time' => Carbon::now(),
            ]);

            return redirect('event')->with('message2', 'Pendaftaran Acara berhasil');
        }
    }

    public function participate(Request $request, Event $event)
    {

        Participant::create([
            'user_id' => session('id'),
            'event_id' => $event->id,
        ]);

        $participants = Participant::where([
            ['event_id', $event->id]
        ])->get();

        Event::where('id', $event->id)
            ->update([
                'participants' => count($participants),
            ]);

        LogActivity::create([
            'username' => session('username'),
            'activity' => "Events Participate",
            'date_time' => Carbon::now(),
        ]);

        return redirect('/event_view/' . $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $attendances = Attendance::where('event_id', $event->id)->first();
        
        $user_comments = Comment::where('event_id', $event->id)->get();

        $participants = Participant::where([
            ['user_id', session('id')],
            ['event_id', $event->id]
        ])->get();

        if ($attendances == NULL) {
            return view('events.event_view', compact('event', 'participants', 'attendances', 'user_comments'));
        } else {
            $user_attend = UserAttendance::where([
                ['user_id', session('id')],
                ['attendance_id', $attendances->id]
            ])->get();


            return view('events.event_view', compact('event', 'participants', 'attendances', 'user_attend', 'user_comments'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function startEvents(Event $event)
    {
        Event::where('id', $event->id)
            ->update([
                'starting_status' => "Event In Progress",
            ]);
        return redirect('/event_view/' . $event->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function stopEvents(Attendance $attendances, Event $event)
    {
        Event::where('id', $event->id)
            ->update([
                'starting_status' => "Event Is Over",
            ]);
        return redirect('/event_view/' . $event->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $Event
     * @return \Illuminate\Http\Response
     */
    public function DeleteEvent($id)
    {
        $events = Event::find($id);
        $events->delete();
        return redirect('event')->with('success','Event success deleted');
    }

    public function EditEvent($id)
    {
        $events   = Event::whereId($id)->first();
        return view('events.events_edit', ['events' => $events]);
    }
    public function UpdateEvent(Request $request, Event $event, LogActivity $log_activity, $id)
    {
        $date = date("Y-m-d", strtotime(str_replace("/", "-", $request->date)));
        if (session('role') == "admin") {
            Event::where('id', $id)->first()
                    ->update([
                        'user_id' => session('id'),
                        'name' => $request->name,
                        'topic' => $request->topic,
                        'category' => $request->category,
                        'description' => $request->description,
                        'host' => $request->host,
                        'date' => $date,
                        'event_time_start' => $request->event_time_start,
                        'event_time_finish' => $request->event_time_finish,
                        'participants' => NULL,
                        'event_link' => $request->event_link,
                        'status' => "confirmed",
                        'starting_status' => "waiting"
                    ]);

            LogActivity::where('id', $log_activity->id)
                    ->update([
                        'username' => session('username'),
                        'activity' => "Edit Events",
                        'date_time' => Carbon::now(),
                    ]);
                    return redirect('event');
            } else {
                Event::where('id', $event->id)
                        ->update([
                            'user_id' => session('id'),
                            'name' => $request->name,
                            'topic' => $request->topic,
                            'category' => $request->category,
                            'description' => $request->description,
                            'host' => session('name'),
                            'date' => $date,
                            'event_time_start' => $request->event_time_start,
                            'event_time_finish' => $request->event_time_finish,
                            'participants' => NULL,
                            'event_link' => $request->event_link,
                            'status' => "waiting",
                            'starting_status' => "waiting"
                ]);

                LogActivity::where('id', $log_activity->id)
                            ->update([
                                'username' => session('username'),
                                'activity' => "Edit Events",
                                'date_time' => Carbon::now(),
                ]);
                return redirect('event');
                }   
    }
    public function DeleteYourEvent($id)
    {
        $events = Event::find($id);
        $events->delete();
        return redirect()->route('yourEvents')->with('success','Event success deleted');
    } 
    
}

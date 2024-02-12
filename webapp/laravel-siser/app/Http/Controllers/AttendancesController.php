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

class AttendancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        Attendance::create([
            'event_id' => $event->id,
        ]);

        return redirect('/event_view/'. $event->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $Attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $Attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $Attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $Attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $Attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $Attendance)
    {
        //
    }
}

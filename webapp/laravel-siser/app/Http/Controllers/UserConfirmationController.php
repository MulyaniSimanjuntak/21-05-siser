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

class UserConfirmationController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users_confirmation.users_confirmation', compact('users'));
    }

    public function confirmed(User $user)
    {
        User::where('id', $user->id)
            ->update([
                'status' => "confirmed",
                'description_reject' => "confirmed"
            ]);

        LogActivity::create([
            'username' => session('username'),
            'activity' => "Confirm User Register",
            'date_time' => Carbon::now(),
        ]);
        return redirect('/users_confirmation');
    }

    public function rejected(Request $request, User $user)
    {
        User::where('id', $user->id)
            ->update([
                'status' => "rejected",
                'description_reject' => $request->description_reject,
            ]);

        LogActivity::create([
            'username' => session('username'),
            'activity' => "Reject User Register",
            'date_time' => Carbon::now(),
        ]);

        return redirect('/users_confirmation');
    }
}

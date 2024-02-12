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
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('register.register');
    }

    public function store(Request $request)
    {
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => strtolower($request->email),
            'date_of_birth' => $request->date_of_birth,
            'job' => $request->job,
            'role' => 'member',
            'gender' => $request->gender,
            'id_card_number' => $request->id_card_number,
            'status' => 'waiting',
        ]);

        LogActivity::create([
            'username' => $request->username,
            'activity' => "Registration",
            'date_time' => Carbon::now(),
        ]);

        return redirect('/login')->with('message2', 'Pendaftaran akun berhasil');
    }
}

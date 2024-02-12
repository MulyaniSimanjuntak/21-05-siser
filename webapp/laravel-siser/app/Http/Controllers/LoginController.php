<?php

namespace App\Http\Controllers;

use App\Models\Attedance;
use App\Models\Certificate;
use App\Models\Comment;
use App\Models\Event;
use App\Models\LogActivity;
use App\Models\Participant;
use App\Models\User;
use App\Models\UserAttedance;
use App\Models\UserCertificate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('authenticated') != true) {
            return view('login.login');
        } else {
            return redirect('/dashboard');
        }
    }


    public function indexlogin()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            $user = User::where('username', $request->username)->first();

            if ($user->status == "rejected") {
                return redirect('/login')->with('message1', 'Akun Anda Tidak Dapat Diregister Dikarenakan ' . $user->description_reject);
            } else if ($user->status == "waiting") {
                return redirect('/login')->with('message1', 'Akun Anda Belum Dikonfirmasi');
            } else if ($user->status === "confirmed") {
                session(['authenticated' => true]);
                session(['username' => $user->username]);
                session(['id' => $user->id]);
                session(['name' => $user->name]);
                session(['email' => $user->email]);
                session(['phone' => $user->phone]);
                session(['gender' => $user->gender]);
                session(['role' => $user->role]);
                session(['date_of_birth' => $user->date_of_birth]);
                session(['status_user' => $user->status_user]);

                LogActivity::create([
                    'username' => session('username'),
                    'activity' => "Login",
                    'date_time' => Carbon::now(),
                ]);

                if ($user->role == "member") {
                    session(['user_role' => "member"]);
                    return redirect('/dashboard');
                } else if ($user->role == "host") {
                    session(['user_role' => "host"]);
                    return redirect('/dashboard');
                } else if ($user->role == "admin") {
                    session(['user_role' => "admin"]);
                    return redirect('/dashboard');
                }
            } else if ($user->role == "admin") {
                session(['authenticated' => true]);
                session(['username' => $user->username]);
                session(['id' => $user->id]);
                session(['name' => $user->name]);
                session(['email' => $user->email]);
                session(['phone' => $user->phone]);
                session(['gender' => $user->gender]);
                session(['role' => $user->role]);
                session(['date_of_birth' => $user->date_of_birth]);
                session(['status_user' => $user->status_user]);

                LogActivity::create([
                    'username' => session('username'),
                    'activity' => "Login",
                    'date_time' => Carbon::now(),
                ]);

                return redirect('/dashboard');
            }
        } else {
            return redirect('login')->with('message1', 'Password Or Username Incorrect');
        }
    }

    public function dashboard()
    {

        if (session('user_role') == "member") {
            $users = User::where('id', session('id'))->first();
            $events = Event::where('status', 'confirmed')->get();

            $participants = Participant::where([
                ['user_id', session('id')]
            ])->get();

            $user_events = DB::table('events')
                ->join('participants', 'events.id', '=', 'participants.event_id')
                ->where('participants.user_id', '=', session('id'))
                ->select('events.*')
                ->get();

            return view('home.home', compact('users', 'events', 'user_events'));
        } else if (session('user_role') == "host") {
            $users = User::where('id', session('id'))->first();
            $events = Event::where('status', 'confirmed')->get();
            $participants = Participant::where([
                ['user_id', session('id')]
            ])->get();

            $user_events = DB::table('events')
                ->join('participants', 'events.id', '=', 'participants.event_id')
                ->where('participants.user_id', '=', session('id'))
                ->select('events.*')
                ->get();

            return view('home.home', compact('users', 'events', 'user_events'));
        } else if (session('user_role') == "admin") {
            $users = User::where('id', session('id'))->first();
            $events = Event::where('status', 'confirmed')->get();
            $participants = Participant::where([
                ['user_id', session('id')]
            ])->get();


            $user_events = DB::table('events')
                ->join('participants', 'events.id', '=', 'participants.event_id')
                ->where('participants.user_id', '=', session('id'))
                ->select('events.*')
                ->get();

            return view('home.home', compact('users', 'events', 'user_events'));
        }
    }

    public function profile($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('profile.profile_view', compact('user'));
    }

    public function profileEdit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('profile.profile_edit', compact('user'));
    }

    public function profileUpdate(Request $request, $id)
    {
        $file = $request->file('gambar');

        // Mendapatkan Nama File
        $nama_file = $file->getClientOriginalName();

        // Mendapatkan Extension File
        $extension = $file->getClientOriginalExtension();

        // Mendapatkan Ukuran File
        $ukuran_file = $file->getSize();

        // Proses Upload File
        $destinationPath = 'uploads';
        $file->move($destinationPath, $file->getClientOriginalName());

        DB::table('users')->where('id', $id)->update([
            'username' => $request->username,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'gambar' => $nama_file,
            'job' => $request->job,
            'gender' => $request->gender,
            'id_card_number' => $request->id_card_number,
        ]);

        return redirect('/profile/' . $id);
    }

    public function logout()
    {
        LogActivity::create([
            'username' => session('username'),
            'activity' => "Logout",
            'date_time' => Carbon::now(),
        ]);

        session()->flush();
        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\APIController as APIController;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use DB;

class AuthController extends APIController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::user();
            
            $data['username'] =  $user->username;
            $data['login_at'] =  Carbon::now();
            $data['token_expired_at'] =  Carbon::now()->addHours(10);
            $data['token'] =  $user->createToken($user->username)->accessToken;

            return $this->sendResponse($data, 'User login successfully.');
        } else {
            return $this->sendError('Wrong username or password.', ['error' => 'Unauthorized'], 401);
        }
    }

    public function logout()
    {
        Auth::user()->token()->revoke();

        $data['logout_at'] = Carbon::now();

        return $this->sendResponse($data, 'User successfully loged out.');
    }

    public function register(Request $request)
  {
    $user = User::create([
        'username'=>$request->username,
        'password' => $request->password,
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'date_of_birth' => $request->date_of_birth,
        'job' => $request->job,
        'role' => 'member',
        'gender' => $request->gender,
        'id_card_number'=>$request->id_card_number,
        'status' => 'confirmed'
      ]);

      $data = $user;

      return $this->sendResponse($data, 'User successfully Register.');
  }

  public function findEvent(Request $request)
    {
        //$event = Event::where('id', $event-> id)->first();

        // if (!$event) {
            // return $this->sendError('Data already deleted or Data not found.', ['error' => 'Data not Found'], 401);
        // } else {
            // $data['event'] = $event;
            // return $this->sendResponse($data, 'Get Event by id succesfully.');
        // }
        $Event = DB::table('events')->where('id', $request->id)->get();
        return response()->json([
            'event'=>$Event
        ]);

    }

    public function FindProfile(Request $request)
    {
        $Event = DB::table('profile')->where('id', $request->id)->get();
        return response()->json([
            'profile'=>$Profile
        ]);
        
    }
}

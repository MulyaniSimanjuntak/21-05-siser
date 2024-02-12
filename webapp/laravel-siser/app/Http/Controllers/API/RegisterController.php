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

class RegisterController extends Controller
{
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
} 

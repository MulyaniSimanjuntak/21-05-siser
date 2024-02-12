<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\APIController as APIController;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Validator;
use DB;

class FindProfileController extends Controller
{
    /**
     * FindProfile api
     *
     * @return \Illuminate\Http\Response
     */

    public function findEvent(Request $request)
    {
        $Profile = DB::table('Profile')->where('id', $request->id)->get();

        if (is_null($Profile)){
            return $this->sendError('Data already deleted or Data not found.', ['error' => 'Data not Found'], 401);
        } else {
            return response()->json([
                'message'=>'Find profile by id Succesfully',
                'profile'=>$Profile
            ]);
        }
    }
}

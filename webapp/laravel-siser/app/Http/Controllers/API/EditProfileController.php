<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\API\APIController as APIController;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Validator;


class EditProfileController extends APIController
{
    public function getall(){
        $allevent=DB::table('profile')->get();
        return response()->json([
            'profile'=>$allprofile
        ]);
    }


    public function EditProfile(Request $request, $id){
        $event=Event::find($id);
        $event->update([
        'username'=>$request->username,
        'password'=>$request->password,
        'name'=>$request->name,
        'phone'=>$request->phone,
        'email'=>$request->email,
        'date_of_birth'=>$request->date_of_birth,
        'gambar'=>$request->gambar,
        'job'=>$request->job,
        'role'=>$request->role,
        'gender'=>$request->gender,
        'id_card_number'=>$request->id_card_number,
        'description_reject'=>$request->description_reject,
        'status'=>$request->status,
        ]);
        $event->save();
        $data = $event;

        return $this->sendResponse($data, 'Profile successfully updated.');
    }


}

<?php

namespace App\Http\Controllers;

use App\Mail\Email;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function send()
    {
        Mail::to('gadingthebeatboxer@gmail.com')->send(new Email());

    }

    public function notif()
    {
        User::factory(10)->create();

    }
}

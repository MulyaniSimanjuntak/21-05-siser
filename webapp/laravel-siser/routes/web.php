<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login and logout
Route::get('/', 'App\Http\Controllers\LoginController@index');
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::post('/login', 'App\Http\Controllers\LoginController@login');

//registration
Route::get('/registration', 'App\Http\Controllers\RegistrationController@index');
Route::post('/registration', 'App\Http\Controllers\RegistrationController@store');

Route::get('/email', 'App\Http\Controllers\EmailController@send');
Route::get('/pesan', 'App\Http\Controllers\EmailController@notif');

Route::group(['middleware' => 'AuthenticationMiddleware'], function () {
    Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

    Route::get('/dashboard', 'App\Http\Controllers\LoginController@dashboard');

    Route::group(['middleware' => ['auth', 'role:member,admin,host']], function () {

        Route::get('/event', 'App\Http\Controllers\EventsController@index');
        Route::get('/event_view/{event}', 'App\Http\Controllers\EventsController@show');
        Route::patch('/event_participate/{event}', 'App\Http\Controllers\EventsController@participate');
        Route::get('/events_history/{user}', 'App\Http\Controllers\EventsController@yourEventsHistory');
        // Route::get('/delete/{id}','App\Http\Controllers\EventsController@DeleteEvent');
        // Route::get('events_edit/{id}', 'App\Http\Controllers\EventsController@EditEvent');
        // Route::put('/update/{id}', 'App\Http\Controllers\EventsController@UpdateEvent');
        // Route::get('events_edit/{id}', 'App\Http\Controllers\EventsController@EditEvent');
        Route::post('/user_do_attend/{event}', 'App\Http\Controllers\UserAttendanceController@doAttend');
        Route::patch('/user_do_stop_attend/{attendances}/{event}', 'App\Http\Controllers\UserAttendanceController@doStopAttend');
        
        //comments
        Route::post('/add_comment/{event}', 'App\Http\Controllers\CommentController@addComment');
        Route::delete('/delete_comment/{comment}/{event}', 'App\Http\Controllers\CommentController@deleteComment');
    });

    Route::group(['middleware' => ['auth', 'role:admin,host']], function () {
        Route::get('/create_event', 'App\Http\Controllers\EventsController@create');
        Route::post('/create_event', 'App\Http\Controllers\EventsController@store');
        Route::get('/your_events/{user}', 'App\Http\Controllers\EventsController@yourEvents')->name('yourEvents');
        Route::patch('/event_start/{event}', 'App\Http\Controllers\EventsController@startEvents');
        Route::patch('/event_stop/{event}', 'App\Http\Controllers\EventsController@stopEvents');
        Route::post('/create_attendances/{event}', 'App\Http\Controllers\AttendancesController@store');
        Route::get('/delete/{id}','App\Http\Controllers\EventsController@DeleteEvent');
        Route::get('events_edit/{id}', 'App\Http\Controllers\EventsController@EditEvent');
        Route::put('/update/{id}', 'App\Http\Controllers\EventsController@UpdateEvent');
        Route::get('events_edit/{id}', 'App\Http\Controllers\EventsController@EditEvent');
        Route::get('/delete_yourevent/{id}','App\Http\Controllers\EventsController@DeleteYourEvent');
    });

    Route::group(['middleware' => ['auth', 'role:admin']], function () {
        //Log Activity
        Route::get('/log_activity', 'App\Http\Controllers\LogActivityController@index');

        //User Confirmation
        Route::get('/users_confirmation', 'App\Http\Controllers\UserConfirmationController@index');
        Route::patch('/users_confirmation/{user}/confirmed', 'App\Http\Controllers\UserConfirmationController@confirmed');
        Route::patch('/users_confirmation/{user}/rejected', 'App\Http\Controllers\UserConfirmationController@rejected');

        Route::get('/events_confirmation', 'App\Http\Controllers\EventsConfirmationController@index');
        Route::patch('/events_confirmation/{event}/confirmed', 'App\Http\Controllers\EventsConfirmationController@confirmed');
        Route::patch('/events_confirmation/{event}/rejected', 'App\Http\Controllers\EventsConfirmationController@rejected');
    });

    Route::get('/profile/{id}', 'App\Http\Controllers\LoginController@profile');

    Route::get('/profile_edit/{id}', 'App\Http\Controllers\LoginController@profileEdit');
    Route::patch('/profile_edit/{id}/update', 'App\Http\Controllers\LoginController@profileUpdate');

});


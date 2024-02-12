<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'App\Http\Controllers\API\AuthController@login');
Route::post('register', 'App\Http\Controllers\API\AuthController@register');

Route::middleware('auth:api')->group(function () {
    Route::get('logout', 'App\Http\Controllers\API\AuthController@logout');

    //Profile


    //Event
    Route::post('event_store', 'App\Http\Controllers\API\EventsController@store');
    Route::patch('edit_event/{event}', 'App\Http\Controllers\API\EventsController@editEvent');
    Route::delete('delete_event/{event}', 'App\Http\Controllers\API\EventsController@deleteEvent');
    Route::get('event', 'App\Http\Controllers\API\EventsController@getAllData');
    Route::patch('start-event/{id}', 'App\Http\Controllers\API\EventsController@startEvent');
    Route::patch('stop_event/{event}', 'App\Http\Controllers\API\EventsController@stopEvent');
    Route::get('find-event/{event}', 'App\Http\Controllers\API\EventsController@findEvent');

    //Comment
    Route::post('make_comment/{event}', 'App\Http\Controllers\API\CommentController@makeComment');
    Route::patch('edit_comment/{comment}', 'App\Http\Controllers\API\CommentController@editComment');
    Route::delete('delete_comment/{comment}', 'App\Http\Controllers\API\CommentController@deleteComment');
    Route::get('find_comment/{comment}', 'App\Http\Controllers\API\CommentController@findComment');
    Route::post('reply_comment/{event}/{comment}', 'App\Http\Controllers\API\CommentController@replyComment');

    //Attendances
    Route::post('createAttendance/{event}', 'App\Http\Controllers\API\AttendancesControllerAPI@createAttendance');
    Route::post('/user_do_attend/{event}', 'App\Http\Controllers\API\UserAttendancesControllerAPI@doAttend');
    Route::patch('/user_do_stop_attend/{attendances}/{event}', 'App\Http\Controllers\API\UserAttendancesControllerAPI@doStopAttend');
});


// Route::get('logout', 'App\Http\Controllers\API\AuthController@logout');
// Route::get('find-event/{id}', 'App\Http\Controllers\API\EventsController@findEvent');
// Route::get('/event_view', 'App\Http\Controllers\API\AuthController@show');
// Route::post('event-add', 'App\Http\Controllers\API\CreateEventsController@CreateEvents');
// Route::patch('start_event/{event}', 'App\Http\Controllers\API\EventsController@startEvent');

// Route::get('getalls', 'App\Http\Controllers\API\EditEventController@getall');
// Route::patch('EditEvent/{id}', 'App\Http\Controllers\API\EditEventController@EditEvent');
// Route::patch('EditProfile/{username}', 'App\Http\Controllers\API\EditProfileController@editprofile');
// Route::post('find-profile/{id}', 'App\Http\Controllers\API\EditProfileController@findProfile');
// Route::resource('event', App\Http\Controllers\API\DeleteEventController::class);
<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Event;
use App\Http\Controllers\API\APIController as APIController;
use App\Http\Resources\EventResource;

class DeleteEventController extends APIController
{
    public function destroy($id)
    {
        $events = Event::find($id);
        $events->delete();
        return response()->json('Event deleted successfully');
    }
}
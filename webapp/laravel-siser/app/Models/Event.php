<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'user_id',
        'name',
        'topic',
        'category',
        'description',
        'host',
        'date',
        'event_time_start',
        'event_time_finish',
        'participants',
        'event_link',
        'status',
        'starting_status',
        'description_reject',
    ];

    
}

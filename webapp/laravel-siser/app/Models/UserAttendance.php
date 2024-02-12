<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
    protected $table = 'user_attendance';

    protected $fillable = [
        'user_id',
        'attendance_id',
        'time_attend_start',
        'time_attend_stop',
        'attend_status'
    ];

    use HasFactory;
}

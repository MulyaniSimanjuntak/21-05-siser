<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $table = 'log_activity';

    protected $fillable = [
        'username',
        'activity',
        'date_time',
    ];
    use HasFactory;
}

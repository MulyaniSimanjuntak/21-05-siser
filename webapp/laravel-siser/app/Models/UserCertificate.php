<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCertificate extends Model
{
    protected $table = 'user_certificate';

    protected $fillable = [
        'user_id',
        'certificate_id',
    ];

    use HasFactory;
}

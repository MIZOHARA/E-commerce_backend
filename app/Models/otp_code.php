<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otp_code extends Model
{
    protected $fillable=[
        'number',
        'code',
        'expire_at',
    ];
}

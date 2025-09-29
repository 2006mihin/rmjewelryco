<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- ADD THIS

class Admin extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory; // <-- ADD HasFactory here

    protected $fillable = [
        'name',
        'user_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

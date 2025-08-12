<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    // Add this line:
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        // add other fields as needed
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}

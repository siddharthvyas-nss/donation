<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Volunteer extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
        'address',
        'skills',
        'interests',
        'availability',
        'emergency_contact_name',
        'emergency_contact_phone',
        'status',
        'mobile_verified',
        'email_verified',
        'mobile_verified_at',
        'email_verified_at',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'mobile_verified' => 'boolean',
        'email_verified' => 'boolean',
        'mobile_verified_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
    ];

    /**
     * Get the volunteer's status
     */
    public function getStatusTextAttribute()
    {
        return ucfirst($this->status);
    }

    /**
     * Check if volunteer is active
     */
    public function isActive()
    {
        return $this->status === 'active';
    }

    /**
     * Check if volunteer is verified
     */
    public function isVerified()
    {
        return $this->mobile_verified && $this->email_verified;
    }
}

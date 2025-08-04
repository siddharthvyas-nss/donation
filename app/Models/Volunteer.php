<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Volunteer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
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
     * Get the OTPs for the volunteer.
     */
    public function otps(): HasMany
    {
        return $this->hasMany(VolunteerOtp::class);
    }

    /**
     * Get mobile OTPs for the volunteer.
     */
    public function mobileOtps(): HasMany
    {
        return $this->hasMany(VolunteerOtp::class)->where('type', 'mobile');
    }

    /**
     * Get email OTPs for the volunteer.
     */
    public function emailOtps(): HasMany
    {
        return $this->hasMany(VolunteerOtp::class)->where('type', 'email');
    }

    /**
     * Check if volunteer is verified.
     */
    public function isVerified(): bool
    {
        return $this->mobile_verified && $this->email_verified;
    }

    /**
     * Check if volunteer is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Update last login timestamp.
     */
    public function updateLastLogin(): void
    {
        $this->update(['last_login_at' => now()]);
    }
}

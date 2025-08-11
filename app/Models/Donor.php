<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donor extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'volunteer_id',
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'company_name',
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}

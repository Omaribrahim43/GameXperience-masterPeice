<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lounges extends Model
{
    use HasFactory;
    protected $guarded = [];

    function agents()
    {
        return $this->belongsTo(User::class);
    }
    function devices()
    {
        return $this->hasMany(Device::class);
    }

    function LoungeDeviceTypes()
    {
        return $this->hasMany(LoungeDeviceTypes::class);
    }

    function userBalance()
    {
        return $this->hasMany(UserBalance::class);
    }
}

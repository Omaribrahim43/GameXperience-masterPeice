<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceTypes extends Model
{
    use HasFactory;
    protected $guarded = [];

    function devices()
    {
        return $this->hasMany(Device::class);
    }

    function LoungeDeviceTypes()
    {
        return $this->hasMany(LoungeDeviceTypes::class);
    }
}

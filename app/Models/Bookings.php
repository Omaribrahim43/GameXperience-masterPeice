<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;
    protected $guarded = [];
    function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
    function lounges()
    {
        return $this->belongsTo(Lounges::class, 'device_id');
    }
    function deviceType()
    {
        return $this->belongsTo(DeviceTypes::class, 'device_id');
    }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

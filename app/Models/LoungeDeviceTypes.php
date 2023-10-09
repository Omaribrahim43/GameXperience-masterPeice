<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoungeDeviceTypes extends Model
{
    use HasFactory;
    protected $guarded = [];

    function Lounges()
    {
        return $this->belongsTo(Lounges::class);
    }

    function deviceTypes()
    {
        return $this->belongsTo(DeviceTypes::class, 'device_type_id');
    }
}

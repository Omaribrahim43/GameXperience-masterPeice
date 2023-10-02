<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $guarded = [];
    function deviceType()
    {
        return $this->belongsTo(DeviceTypes::class);
    }
    function lounge()
    {
        return $this->belongsTo(Lounges::class);
    }
}

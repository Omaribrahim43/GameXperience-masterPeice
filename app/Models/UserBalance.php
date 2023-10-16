<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    use HasFactory;
    protected $guarded = [];

    function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function lounges()
    {
        return $this->belongsTo(Lounges::class, 'lounge_id');
    }

    function deviceTypes()
    {
        return $this->belongsTo(DeviceTypes::class, 'device_type_id');
    }
}

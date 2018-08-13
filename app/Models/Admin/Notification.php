<?php

namespace App\Models\Admin;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $casts = [
        'data' => 'object'
    ];

    public  function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y - H:i:s');
    }
    public  function getDateTimeAttribute($date)
    {
        return strtotime(Carbon::parse($date));
    }
}

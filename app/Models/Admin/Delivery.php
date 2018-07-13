<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected  $table="deliverys";
    protected $fillable=['id','name','phone','provincial','city','address','email','delivery'];
}

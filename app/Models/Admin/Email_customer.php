<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Email_customer extends Model
{
    protected  $table="email_customer";
    protected $fillable=['id','email'];
}

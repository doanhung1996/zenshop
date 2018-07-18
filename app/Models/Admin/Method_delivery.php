<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Method_delivery extends Model
{
    protected  $table="method_deliverys";
    protected $fillable=['id','title','date_info','price','date','user_id','status'];
    public function  user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

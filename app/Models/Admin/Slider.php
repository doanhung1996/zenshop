<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected  $table="sliders";
    protected $fillable=['id','name','title','price','link','image','background','status','user_id'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

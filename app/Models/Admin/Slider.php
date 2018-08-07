<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Slider
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property int $price
 * @property string $link
 * @property string $image
 * @property string $background
 * @property string $status
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereBackground($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Slider whereUserId($value)
 * @mixin \Eloquent
 */
class Slider extends Model
{
    protected  $table="sliders";
    protected $fillable=['id','name','title','price','link','image','background','status','user_id'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

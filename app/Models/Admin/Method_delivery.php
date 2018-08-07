<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Method_delivery
 *
 * @property int $id
 * @property string $title
 * @property string $date_info
 * @property int $date
 * @property int $price
 * @property int $user_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereDateInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Method_delivery whereUserId($value)
 * @mixin \Eloquent
 */
class Method_delivery extends Model
{
    protected  $table="method_deliverys";
    protected $fillable=['id','title','date_info','price','date','user_id','status'];
    public function  user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

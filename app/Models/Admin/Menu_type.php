<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Menu_type
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Menu_item[] $menu_item
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_type whereUpdatedAt($value)
 */
class Menu_type extends Model
{
    protected  $table="menu_types";
    protected  $fillable=['id','name','user_id'];

    public function  menu_item(){
        return $this->hasMany('App\Models\Admin\Menu_item','menu_type_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

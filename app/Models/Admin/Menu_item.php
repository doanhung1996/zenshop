<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Menu_item
 *
 * @property-read \App\Models\Admin\Menu_type $menu_type
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $type_connect
 * @property string $slug
 * @property int $connect_id
 * @property int $parent_id
 * @property int $menu_type_id
 * @property string $menu_type_title
 * @property int $menu_order
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereConnectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereMenuOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereMenuTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereMenuTypeTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereTypeConnect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Menu_item whereUpdatedAt($value)
 */
class Menu_item extends Model
{
    protected  $table="menu_items";
    protected  $fillable=['id','title','slug','type','parent_id','menu_type_id','order','user_id'];

    public function  menu_type(){
        return $this->belongsTo('App\Models\Admin\Menu_type','menu_type_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Admin\Menu_item', 'parent_id','id');
    }

    public function menu_item_multi_cat($data='',$parent_id=0,$level=0){
        $result=[];
        if(!empty($data)){
            foreach ($data as $item){
                if($item->parent_id==$parent_id){
                    $item['level']=$level;
                    $result[]=$item;
                    $child=$this->menu_item_multi_cat($data,$item->id,$level+1);
                    $result=array_merge($result,$child);
                }
            }
        }
        return $result;
    }
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Product_cat
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Product[] $product
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property int $parent_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product_cat whereUpdatedAt($value)
 */
class Product_cat extends Model
{
    protected  $table="product_cats";
    protected $fillable=['id','title','parent_id','user_id','status','slug'];

    public function product(){
        return $this->hasMany('App\Models\Admin\Product','product_cat_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Admin\Product_cat', 'parent_id');
    }


    public function product_multi_cat($data='',$parent_id=0,$level=0){
        $result=[];
        if(!empty($data)){
            foreach ($data as $item){

                if($item->parent_id==$parent_id){
                    $item['level']=$level;
                    $result[]=$item;
                    $child=$this->product_multi_cat($data,$item->id,$level+1);
                    $result=array_merge($result,$child);
                }
            }
        }
        return $result;
    }
}

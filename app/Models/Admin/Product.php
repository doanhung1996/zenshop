<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Product
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Order_detail[] $order_detail
 * @property-read \App\Models\Admin\Product_cat $product_cat
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property float $price
 * @property string $detail
 * @property int $product_cat_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereUpdatedAt($value)
 */
class Product extends Model
{
    protected  $table="products";
    protected $fillable=['id','product_name','product_code','description','image','price','detail','product_discount','product_cat_id','user_id','status','slug'];
    public function product_cat(){
        return $this->belongsTo('App\Models\Admin\Product_cat','product_cat_id','id');
    }

    public function order_detail(){
        return $this->hasMany('App\Models\Admin\Order_detail','product_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function path()
    {
        return "product/{$this->product_cat->parent->slug}/{$this->product_cat->slug}/{$this->slug}";
    }

}

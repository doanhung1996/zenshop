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
 * @property string $product_name
 * @property string $product_name_seal
 * @property string|null $images
 * @property string|null $images_s
 * @property string $link_video
 * @property int $product_discount
 * @property string $product_code
 * @property int $user_id
 * @property string $slug
 * @property int $product_purchase
 * @property int $category_id
 * @property int $viewer
 * @property int $cart
 * @property-read \App\Models\Admin\Product_cat $category
 * @property-read mixed $price_sale
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereCart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereImagesS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereLinkVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductNameSeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereProductPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Product whereViewer($value)
 */
class Product extends Model
{
    protected  $table="products";
    protected $fillable=['id','product_name','product_name_seal','product_code','description','image','price','product_purchase','detail','product_discount','product_cat_id','user_id','status','slug','category_id','link_video','images','images_s','viewer','cart','qty'];

    public function product_cat(){
        return $this->belongsTo('App\Models\Admin\Product_cat','product_cat_id','id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Admin\Product_cat','category_id','id');
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
    //Update
    public function updateView($slug)
    {
        return $this->where('slug',$slug)->increment('viewer');
    }

    public function getPriceSaleAttribute()
    {
        $price = ((100 - $this->product_discount)/100) * $this->price;
        return $price;
    }

}

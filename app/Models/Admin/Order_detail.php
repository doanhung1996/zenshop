<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Order_detail
 *
 * @property-read \App\Models\Admin\Order $order
 * @property-read \App\Models\Admin\Product $product
 * @mixin \Eloquent
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property float $price
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order_detail whereUpdatedAt($value)
 */
class Order_detail extends Model
{
    protected  $table="order_details";

    public function product(){
        return $this->belongsTo('App\Models\Admin\Product','product_id','id');
    }

    public function  order(){
        return $this->belongsTo('App\Models\Admin\Order','order_id','id');
    }
}

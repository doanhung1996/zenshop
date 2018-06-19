<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Order
 *
 * @property-read \App\Models\Admin\Customer $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Order_detail[] $order_detail
 * @mixin \Eloquent
 * @property int $id
 * @property int $customer_id
 * @property string $date_order
 * @property float $total
 * @property string $note
 * @property string $payment
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereDateOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order wherePayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereUpdatedAt($value)
 */
class Order extends Model
{
    protected  $table="orders";

    public function  order_detail(){
        return $this->hasMany('App\Models\Admin\Order_detail','order_id','id');
    }

    public function  customer(){
        return $this->belongsTo('App\Models\Admin\Customer','customer_id','id');
    }
}

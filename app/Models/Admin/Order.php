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
 * @property string $fullname
 * @property string $email
 * @property string $phone
 * @property string $province
 * @property string $city
 * @property string $address
 * @property string $pay
 * @property string $delivery
 * @property string $order_code
 * @property int $total_qty
 * @property int $total_sale
 * @property string $order_date
 * @property string $date_transport
 * @property int|null $user_id
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereDateTransport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereOrderCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order wherePay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereTotalQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereTotalSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Order whereUserId($value)
 */
class Order extends Model
{
    protected  $table="orders";
    protected $fillable=['id','fullname','email','phone','province','city','address','pay','delivery','order_code','total_qty','total_sale','order_date','date_transport','customer_id','user_id'];
    public function  order_detail(){
        return $this->hasMany('App\Models\Admin\Order_detail','order_id','id');
    }

    public function  customer(){
        return $this->belongsTo('App\Models\Admin\Customer','customer_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}

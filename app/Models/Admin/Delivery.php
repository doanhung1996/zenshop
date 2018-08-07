<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Delivery
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $provincial
 * @property string $city
 * @property string $address
 * @property string $email
 * @property int $delivery
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereDelivery($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereProvincial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Delivery whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Delivery extends Model
{
    protected  $table="deliverys";
    protected $fillable=['id','name','phone','provincial','city','address','email','delivery'];
}

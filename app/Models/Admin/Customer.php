<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Customer
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Order[] $order
 * @mixin \Eloquent
 * @property int $id
 * @property string $fullname
 * @property string $gender
 * @property string $email
 * @property int $phone
 * @property string $address
 * @property string $note
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Customer whereUpdatedAt($value)
 */
class Customer extends Model
{
    protected  $table="customers";
    protected $fillable=['fullname','email','phone','province','city','address'];

    public function  order(){
        return $this->hasMany('App\Models\Admin\Order','customer_id','id');
    }
}

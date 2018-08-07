<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Email_customer
 *
 * @property int $id
 * @property string $email
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Email_customer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Email_customer extends Model
{
    protected  $table="email_customer";
    protected $fillable=['id','email'];
}

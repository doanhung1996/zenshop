<?php

namespace App;

use App\Notifications\MailResetPasswordToken;
use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use NotificationChannels\WebPush\HasPushSubscriptions;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-write mixed $password
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $verified
 * @property string $account
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereVerified($value)
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $gender
 * @property string|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Page[] $pages
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 */
class User extends Authenticatable
{
    use Notifiable,HasPushSubscriptions;
    CONST ADMIN = 'admin';
    CONST ACTIVE = 'active';
    CONST PENDING = 'pending';
    CONST CUSTOMER = 'customer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'verified','phone','address','gender','image','account'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }
    public function isAdmin()
    {
        return $this->account == User::ADMIN;
    }
    public function isVerified()
    {
        return $this->verified == User::ACTIVE;
    }

    public function pages()
    {
        return $this->hasMany('App\Models\Admin\Page', 'user_id');
    }

//    public function routeNotificationForOneSignal()
//    {
//        return 1;
//    }
}

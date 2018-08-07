<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Page
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $content_page
 * @property string $slug
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereContentPage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereUpdatedAt($value)
 * @property int $user_id
 * @property-read \App\User $creator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Page whereUserId($value)
 */
class Page extends Model
{
    protected $table = "pages";

    protected $fillable = ['title', 'slug', 'status', 'content_page', 'user_id'];

    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }



}
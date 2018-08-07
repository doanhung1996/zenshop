<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Admin\Post
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $content
 * @property int $post_cat_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post wherePostCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereUpdatedAt($value)
 * @property string $title_seal
 * @property int $user_id
 * @property string $slug
 * @property int $category_id
 * @property int $viewer
 * @property-read \App\Models\Admin\Post_cat $category
 * @property-read \App\Models\Admin\Post_cat $post_cat
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereTitleSeal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post whereViewer($value)
 */
class Post extends Model
{
    protected $fillable=['id','title','title_seal','image','description','content','post_cat_id','user_id','slug','category_id'];
    protected  $table="posts";
//    protected $casts=['status'=>'int'];
//    public static function lastest()
//    {
//    }

    public function post_cat(){
        return $this->belongsTo('App\Models\Admin\Post_cat','post_cat_id','id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Admin\Post_cat','category_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function path()
    {
        return "post/{$this->post_cat->parent->slug}/{$this->post_cat->slug}/{$this->slug}";
    }
}

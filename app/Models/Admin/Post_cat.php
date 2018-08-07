<?php
/**
 * Created by PhpStorm.
 * User: hung
 * Date: 6/4/2018
 * Time: 7:50 PM
 */
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Admin\Post_cat
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property int $parent_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Post_cat[] $childs
 * @property-read \App\Models\Admin\Post_cat $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Admin\Post[] $post
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Admin\Post_cat whereUserId($value)
 * @mixin \Eloquent
 */
class Post_cat extends Model
{
    protected  $table="post_cats";
    protected $fillable=['title','slug','parent_id'];
    public function user(){
        return $this->belongsTo("App\User",'user_id','id');
    }

    public function post(){
        return $this->hasMany('App\Models\Admin\Post','post_cat_id','id');
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Admin\Post_cat', 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Models\Admin\Post_cat','parent_id');
    }

    public  function multi_data_post($data,$parent_id=0,$level=0){
        $result=array();
        if(!empty($data)){
            foreach ($data as $item){
                if($item->parent_id==$parent_id){
                    $item['level']=$level;
                    $result[]=$item;
                    $child=$this->multi_data_post($data,$item->id,$level+1);
                    $result=array_merge($result,$child);
                }
            }
        }
        return $result;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: hung
 * Date: 6/4/2018
 * Time: 7:50 PM
 */
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;


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
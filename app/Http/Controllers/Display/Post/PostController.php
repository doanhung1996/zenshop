<?php

namespace App\Http\Controllers\Display\Post;

use App\Models\Admin\Menu_item;
use App\Models\Admin\Menu_type;
use App\Models\Admin\Post;
use App\Models\Admin\Post_cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category,$slug)
    {
        $check_category=Post_cat::where('slug',$category)->firstOrFail();
        $check_parent = $check_category->childs()->where('slug', $slug)->firstOrFail();
        $post=Post_cat::latest()->where('slug',$slug)->firstOrFail()->post()->paginate(5);
        $menu_type_id=Menu_type::where('name','Header')->first()->id;
        $category_category=Menu_item::where('parent_id',0)->where('menu_type_id',$menu_type_id)->where('type','post')->get();
        return view('display.post.post',compact('post','check_category','check_parent','category_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category)
    {
        $category_id=Post_cat::where('slug',$category)->first();
        $category_post=Post::with('category','post_cat')->where('status','1')->where('category_id',$category_id['id'])->paginate(5);
        $category_post_count=Post::with('category','post_cat')->where('status','1')->where('category_id',$category_id['id'])->paginate(5)->count();
        $category_count_all=Post::with('category','post_cat')->where('status','1')->where('category_id',$category_id['id'])->count();
        $menu_type_id=Menu_type::where('name','Header')->first()->id;
        $category_category=Menu_item::where('parent_id',0)->where('menu_type_id',$menu_type_id)->where('type','post')->get();
        return view('display.post.category',compact('category_id','category_post','category_post_count','category_count_all','category_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search=$request->search;
        if(empty($search)){
            return back();
        }
        $post = Post::with('category','post_cat')->where('status',1)
            ->orwhere('title','like',"%$search%")->orwhere('title_seal','like',"%$search%")->paginate(5);
        $post->withPath("?search="."$search");
        $post_count=count($post);
        $post_count_search= Post::with('category','post_cat')->where('status',1)
            ->orwhere('title','like',"%$search%")->orwhere('title_seal','like',"%$search%")->count();
        $menu_type_id=Menu_type::where('name','Header')->first()->id;
        $category_category=Menu_item::where('parent_id',0)->where('menu_type_id',$menu_type_id)->where('type','post')->get();
        return view('display.post.search',compact('post','post_count','post_count_search','search','category_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category,$slug,$parent_slug)
    {
        $check_category=Post_cat::where('slug',$category)->firstOrFail();
        $check_parent = $check_category->childs()->where('slug', $slug)->firstOrFail();
        $post=Post::where(['slug'=>$parent_slug,'status'=> '1'])->firstOrFail();
        $menu_type_id=Menu_type::where('name','Header')->first()->id;
        $category_category=Menu_item::where('parent_id',0)->where('menu_type_id',$menu_type_id)->where('type','post')->get();
        return view('display.post.detail_post',compact('post','check_category','check_parent','category_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

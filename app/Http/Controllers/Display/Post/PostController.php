<?php

namespace App\Http\Controllers\Display\Post;

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
        $post=Post_cat::where('slug',$slug)->firstOrFail()->post()->paginate(5);
        return view('display.post.post',compact('post','check_category','check_parent'));
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
    public function show($category,$slug,$id)
    {
        $check_category=Post_cat::where('slug',$category)->firstOrFail();
        $check_parent = $check_category->childs()->where('slug', $slug)->firstOrFail();
        $post=Post::where('id',$id)->firstOrFail();
        return view('display.post.detail_post',compact('post','check_category','check_parent'));
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

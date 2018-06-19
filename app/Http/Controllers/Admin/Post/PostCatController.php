<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\PostCatStoreRequest;
use App\Http\Requests\StatusRequest;
use App\Http\Requests\UpdatePostCatRequest;
use App\Models\Admin\Post;
use App\Models\Admin\Post_cat;
use Auth;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostCatController extends Controller
{
    public function __construct()
    {
        $this->middleware('isadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_multi_cat= new Post_cat();
        $post_cat=Post_cat::with('user')->get();
        $post_all=Post_cat::all()->count();
        $data=$post_multi_cat->multi_data_post($post_cat);
        return view('admin.post/post_cat',compact('post_cat','data','post_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post/cat_create',compact('parent_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCatStoreRequest $request)
    {
        $Post_cat=new Post_cat();
        $Post_cat->title=$request->title;
        $Post_cat->slug=str_slug($request->title);
        $Post_cat->parent_id=$request->parent_id;
        $Post_cat->user_id = Auth::user()->id;
        $Post_cat->save();
        session()->flash('success', 'Thêm mới thành công !');
        return redirect()->route('post.cat.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post_cat $cat
     * @return Post_cat
     */
    public function edit(Post_cat $cat)
    {
        $parent_cat = Post_cat::where('parent_id', 0)->get();
        return view('admin.post.cat_update', compact('cat','parent_cat'));
    }

    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCatRequest $request, Post_cat $cat)
    {
        $cat->update([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'parent_id' => $request->parent_id
        ]);
        session()->flash('success', 'Chỉnh sửa thành công !');
        return back();
    }

    public function status(StatusRequest $request){
       $actions=$request->actions;
       $checkItem= $request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $check=Post_cat::where('parent_id',$v)->get();
                $check_post=Post::where('post_cat_id',$v)->get();
                if(count($check)==0 && count($check_post)==0){
                    Post_cat::where('id', $v)->delete();
                    session()->flash('success_status', 'Xóa thành công !');
                }else{
                    session()->flash('fail_status', 'Chưa xóa danh mục con !');
                }
            }
        }
        return back();
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

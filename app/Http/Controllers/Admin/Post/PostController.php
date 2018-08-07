<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\SearchPostRequest;
use App\Http\Requests\StatusPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Admin\Post;
use App\Models\Admin\Post_cat;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('status')){
            $status=request()->status;
            $post=Post::latest()->where('status',$status)->with(['user','post_cat','category'])->withCount('user')->paginate(8);
//            $query->where('status',$status);
        }else{
            $post=Post::latest()->with(['user','post_cat','category'])->withCount('user')->paginate(8);
        }
        $post_all= Post::all()->count();
        $post_active=Post::where('status','1')->get()->count();
        $post_pending=Post::where('status','-1')->count();
        return view('admin.post.post',compact('post','post_all','post_active','post_pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function post_get_status($status)
//    {
//        $post=Post::latest()->with(['user','post_cat'])->withCount('user')->where('status',$status)->paginate(8);
//        $post_all= Post::all()->count();
//        $post_active=Post::where('status','1')->get()->count();
//        $post_pending=Post::where('status','-1')->count();
//        return view('admin.post.post',compact('post','post_all','post_active','post_pending'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cat = Post_cat::where('parent_id','>', 0)->get();
        return view('admin.post.post_create',compact('parent_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('fileUpload')) {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $data['slug']=str_slug($data['title']);
            $data['title_seal']=str_slug($data['title'],' ');
            $data['image']='uploads/'.$fileName;
            $data['user_id']=Auth::user()->id;
            $data['category_id']=Post_cat::where('id', $request->post_cat_id)->first()->parent_id;
        }
        Post::create($data);
        session()->flash('success', 'Thêm mới thành công !');
        return back();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post)
    {
        $parent_cat = Post_cat::where('parent_id','!=', 0)->get();
        $post=Post::where('id',"$post")->with('post_cat')->get();
        return view('admin.post.post_update',compact('post','parent_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data=$request->all();
        if ($request->hasFile('fileUpload')) {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $data['slug']=str_slug($data['title']);
            $data['title_seal']=str_slug($data['title'],' ');
            $data['image']='uploads/'.$fileName;
            $data['user_id']=Auth::user()->id;
            $data['category_id']=Post_cat::where('id', $request->post_cat_id)->first()->parent_id;
        }
        $data['category_id']=Post_cat::where('id', $request->post_cat_id)->first()->parent_id;
        $post->update($data);
        session()->flash('update_success', 'Chỉnh sửa thành công !');
        return back();
    }

    public function status(StatusPostRequest $request){
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $delete=Post::where('id', $v)->delete();
            }
            if($delete){
                session()->flash('success_status', 'Xóa thành công !');
            }
        }else{
            foreach ($checkItem as $k =>$v){
                $update=Post::where('id', $v)->update(['status' => "$actions"]);
            }
            if($update){
                session()->flash('success_status', 'Chỉnh sửa thành công !');
            }else{
                session()->flash('success_status', 'Đã chỉnh sửa !');
            }
        }
        return back();
    }

    public  function search(SearchPostRequest $request){
        $value=$request->value;
        $search=$request->search;
        $post=Post::orwhereHas('user',function($user) use($value){
            $user->where('name','like',"%$value%");
        })->orwhereHas('post_cat',function($post_cat) use($value){
            $post_cat->where('title','like',"%$value%");
        })->orwhereHas('category',function($category_id) use($value){
            $category_id->where('title','like',"%$value%");
        })->orwhere('title','like',"%$value%")->paginate(8);
        $post->withPath("?value="."$value"."&search="."$search");
        $post_count=count($post);
        $post_all=Post::count();
        $post_active=Post::where('status','1')->get()->count();
        $post_pending=Post::where('status','-1')->count();
        return view('admin.post.post',compact('post','value','post_count','post_active','post_pending','post_all'));
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

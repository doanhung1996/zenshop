<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Requests\EditPageRequest;
use App\Http\Requests\SearchPageRequest;
use App\Http\Requests\StatusPageRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Admin\Page;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
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
        if(request()->has('status')){
            $status=request()->status;
            $pages= Page::latest()->join('users', 'pages.user_id', '=', 'users.id')->where('status',$status)->select('pages.id as id','pages.title as title','pages.slug as slug','pages.status as status','pages.created_at as created_at','users.name as name')->orderBy('pages.id', 'desc')->paginate(5);
//            $query->where('status',$status);
        }else{
            $pages= Page::latest()->join('users', 'pages.user_id', '=', 'users.id')->select('pages.id as id','pages.title as title','pages.slug as slug','pages.status as status','pages.created_at as created_at','users.name as name')->orderBy('pages.id', 'desc')->paginate(5);
        }
        $pages_all= Page::all()->count();
        $pages_active=Page::where('status','1')->get()->count();
        $pages_pending=Page::where('status','-1')->count();
        return view('admin.page.page',compact('pages','pages_all','pages_active','pages_pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function page_get_status($status)
    {
        $pages= Page::latest()->join('users', 'pages.user_id', '=', 'users.id')->select('pages.id as id','pages.title as title','pages.slug as slug','pages.status as status','pages.created_at as created_at','users.name as name')->where('status',$status)->orderBy('pages.id', 'desc')->paginate(5);
        $pages_all= Page::all()->count();
        $pages_active=Page::where('status','1')->get()->count();
        $pages_pending=Page::where('status','-1')->count();
        return view('admin.page.page',compact('pages','pages_all','pages_active','pages_pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        $page = new Page();
        $page->title = $request->title;
        $page->slug = str_slug($request->title);
        $page->content_page = $request->content_page;
        $page->user_id = Auth::user()->id;
        $page->status = '-1';
        $page->save();
        session()->flash('success', 'Thêm mới thành công !');
        return redirect()->route('page.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function status(StatusPageRequest $request){
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
                foreach ($checkItem as $k =>$v){
                    $delete=DB::table('pages')
                        ->where('id', $v)
                        ->delete();
                }
                if($delete){
                    session()->flash('success_status', 'Xóa thành công !');
                }
        }else{
                foreach ($checkItem as $k =>$v){
                    $update=DB::table('pages')
                        ->where('id', $v)
                        ->update(['status' => "$actions"]);
                }
            if($update){
                session()->flash('success_status', 'Chỉnh sửa thành công !');
            }else{
                session()->flash('success_status', 'Đã chỉnh sửa !');
            }
        }
        return redirect()->route('page.list');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $pages=DB::select('select * from pages where id = :id', ['id' => $id]);
        $pages=$pages['0'];
        return view('admin.page.update',compact('pages'));
    }

    public function update(UpdatePageRequest $request, $id)
    {
        $update=DB::table('pages')->where('id',"$id")->update([
            'title'=>$request->title,
            'slug'=>str_slug($request->title),
            'content_page'=>$request->content_page
        ]);
        if($update){
            session()->flash('success_update', 'Cập Nhật thành công !');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function search(SearchPageRequest $request){
        $search=$request->search;
        $value=$request->value;
        $pages= Page::latest()->join('users', 'pages.user_id', '=', 'users.id')
            ->select('pages.id as id','pages.title as title','pages.slug as slug','pages.status as status','pages.created_at as created_at','users.name as name')
            ->where('title','like',"%$value%")
            ->orwhere('slug','like',"%$value%")
            ->orwhere('name','like',"%$value%")
            ->orderBy('pages.id', 'desc')->paginate(5);
        $pages->withPath("?value="."$value"."&search="."$search");
        $pages_count= Page::latest()->join('users', 'pages.user_id', '=', 'users.id')
            ->select('pages.id as id','pages.title as title','pages.slug as slug','pages.status as status','pages.created_at as created_at','users.name as name')
            ->where('title','like',"%$value%")
            ->orwhere('slug','like',"%$value%")
            ->orwhere('name','like',"%$value%")->count();
        $pages_all= Page::all()->count();
        $pages_active=Page::where('status','1')->get()->count();
        $pages_pending=Page::where('status','-1')->count();
        return view('admin.page.page',compact('pages','pages_all','pages_count','pages_active','pages_pending','value'));
    }
    public function destroy($id)
    {
        //
    }
}

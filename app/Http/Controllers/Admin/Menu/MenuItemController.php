<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Requests\AddMenuItemRequest;
use App\Http\Requests\StatusMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\Admin\Menu_item;
use App\Models\Admin\Menu_type;
use App\Models\Admin\Page;
use App\Models\Admin\Post_cat;
use App\Models\Admin\Product_cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Add
         $page=Page::where('status','1')->select('title','slug')->get();
         $post_cat=Post_cat::where('parent_id','0')->with('childs')->get();
         $product_cat=Product_cat::where('parent_id','0')->with('childs')->get();
         $menu_parent=Menu_item::latest()->whereNotIn('type',['page','static'])->where('parent_id','0')->get();
         $menu_type=Menu_type::get();
         //Show
         $menu_multi_cat= new Menu_item();
         $menu=Menu_item::latest()->with('user','menu_type')->get();
         $count_menu=count($menu);
         $menu_item=$menu_multi_cat->menu_item_multi_cat($menu);
         return view('admin.menu.menu_item',compact('page','product_cat','post_cat','menu_parent','menu_type','menu_item','count_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_cat(Request $request)
    {
        $menu_type_id=$request->menu_type_id;
        $cat=Menu_item::where('menu_type_id',$menu_type_id)->whereNotIn('type',['page','static'])->where('parent_id','0')->get();
        if (count($cat)>0){
            echo '<option value="0" >-- Chọn --</option>';
            foreach ($cat as $item_cat){
                echo '<option value="'.$item_cat['id'].'" '.((old('parent_id')==$item_cat['id'])?'selected':"").'>'.$item_cat['title'].'</option>';
            }
        }else{
            echo '<option value="0" >-- Chọn --</option>';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddMenuItemRequest $request)
    {
        $page_slug=$request->page_slug;
        $static_slug=$request->static_slug;
        $product_slug=$request->product_slug;
        $post_slug=$request->post_slug;
        $data['title']=$request->title;
        $data['parent_id']=$request->parent_id;
        $data['order']=$request->order;
        $data['menu_type_id']=$request->menu_type_id;
        $data['user_id']=auth()->user()->id;
        if (empty($page_slug) && empty($static_slug) && empty($product_slug) && empty($post_slug)){
            session()->flash('fail','Bạn phải chọn 1 trong 4 mục cần chọn !');
            return back();
        }elseif (!empty($page_slug) && empty($static_slug) && empty($product_slug) && empty($post_slug)){
            $data['slug']=$page_slug;
            $data['type']='page';
        }elseif (!empty($static_slug) && empty($page_slug) && empty($product_slug) && empty($post_slug)){
            $data['slug']=$static_slug;
            $data['type']='static';
        }elseif (!empty($product_slug) && empty($page_slug) && empty($static_slug) && empty($post_slug)){
            $data['slug']=$product_slug;
            $data['type']='product';
        }elseif (!empty($post_slug) && empty($page_slug) && empty($static_slug) && empty($product_slug)){
            $data['slug']=$post_slug;
            $data['type']='post';
        }else {
            session()->flash('fail', 'Chỉ chọn 1 trong 4 mục cần chọn !');
            return back();
        }
        Menu_item::create($data);
        session()->flash('success', 'Thêm thành công !');
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
     * @param StatusMenuItemRequest $request
     * @return void
     */
    public function status(StatusMenuItemRequest $request)
    {
        $status  = $request->status;
        $checkItem= $request->checkItem;
        if ($status == 'delete'){
            foreach ($checkItem as $k => $v){
                $check_menu_item=Menu_item::where('parent_id',$v)->get();
                if(count($check_menu_item) == 0){
                    Menu_item::where('id', $v)->delete();
                    session()->flash('success', 'Xóa thành công !');
                }else{
                    session()->flash('fail', 'Chưa xóa danh mục con !');
                }
            }
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($menu_item)
    {
        $menu_item_old=Menu_item::whereId($menu_item)->first();
        $page=Page::where('status','1')->select('title','slug')->get();
        $post_cat=Post_cat::where('parent_id',0)->with('childs')->get();
        $product_cat=Product_cat::where('parent_id',0)->with('childs')->get();
        $menu_parent=Menu_item::latest()->where('menu_type_id',$menu_item_old['menu_type_id'])->whereNotIn('type',['page','static'])->where('parent_id',0)->get();
        $menu_type=Menu_type::get();
        return view('admin.menu.update_menu_item',compact('page','post_cat','product_cat','menu_parent','menu_type','menu_item_old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMenuItemRequest $request
     * @param Menu_item $menu_item
     * @return void
     */
    public function update(UpdateMenuItemRequest $request, Menu_item $menu_item)
    {
        $page_slug=$request->page_slug;
        $static_slug=$request->static_slug;
        $product_slug=$request->product_slug;
        $post_slug=$request->post_slug;
        $data['title']=$request->title;
        $data['parent_id']=$request->parent_id;
        $data['order']=$request->order;
        $data['menu_type_id']=$request->menu_type_id;
        if (empty($page_slug) && empty($static_slug) && empty($product_slug) && empty($post_slug)){
            session()->flash('fail','Bạn phải chọn 1 trong 4 mục cần chọn !');
            return back();
        }elseif (!empty($page_slug) && empty($static_slug) && empty($product_slug) && empty($post_slug)){
            $data['slug']=$page_slug;
            $data['type']='page';
        }elseif (!empty($static_slug) && empty($page_slug) && empty($product_slug) && empty($post_slug)){
            $data['slug']=$static_slug;
            $data['type']='static';
        }elseif (!empty($product_slug) && empty($page_slug) && empty($static_slug) && empty($post_slug)){
            $data['slug']=$product_slug;
            $data['type']='product';
        }elseif (!empty($post_slug) && empty($page_slug) && empty($static_slug) && empty($product_slug)){
            $data['slug']=$post_slug;
            $data['type']='post';
        }else {
            session()->flash('fail', 'Chỉ chọn 1 trong 4 mục cần chọn !');
            return back();
        }
        $menu_item->update($data);
        session()->flash('success', 'Cập nhật thành công !');
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

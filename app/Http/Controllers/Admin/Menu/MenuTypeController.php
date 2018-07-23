<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Requests\AddMenuTypeRequest;
use App\Http\Requests\StatusMenuTypeRequest;
use App\Http\Requests\UpdateMenuTypeRequest;
use App\Models\Admin\Menu_item;
use App\Models\Admin\Menu_type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_type=Menu_type::with('user')->get();
        return view('admin.menu.menu_type',compact('menu_type'));
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
    public function store(AddMenuTypeRequest $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->user()->id;
        Menu_type::create($data);
        session()->flash('success','Thêm mới thành công');
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
    public function edit($menu_type)
    {
        $menu_type=Menu_type::whereId($menu_type)->first();
         return view('admin.menu.update_menu_type',compact('menu_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMenuTypeRequest $request
     * @param Menu_type $menu_type
     * @return void
     */
    public function update(UpdateMenuTypeRequest $request, Menu_type $menu_type)
    {
        $data=$request->all();
        $menu_type->update($data);
        session()->flash('success','Cập nhật thành công');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StatusMenuTypeRequest $request
     * @param Menu_type $menu_type
     * @return \Illuminate\Http\Response
     */
    public function status(StatusMenuTypeRequest $request)
    {
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $check_menu_item=Menu_item::whereId($v)->get();
                if (count($check_menu_item)>0){
                    session()->flash('success', 'Chưa xóa menu item liên kết');
                    return back();
                }else{
                    $delete=Menu_type::where('id', $v)->delete();
                }
            }
            if($delete){
                session()->flash('success', 'Xóa thành công !');
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

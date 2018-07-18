<?php

namespace App\Http\Controllers\Admin\MethodDelivery;

use App\Http\Requests\CreateDeliveryRequest;
use App\Http\Requests\SearchDeliveryRequest;
use App\Http\Requests\StatusDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\Admin\Method_delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MethodDeliveryController extends Controller
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
            $method_delivery=Method_delivery::latest()->where('status',$status)->with('user')->paginate(8);
//            $query->where('status',$status);
        }else{
            $method_delivery=Method_delivery::latest()->with('user')->paginate(8);
        }
        $delivery_all=Method_delivery::count();
        $delivery_pendding=Method_delivery::where('status','-1')->count();
        $delivery_active=Method_delivery::where('status','1')->count();
        return view('admin.delivery.delivery',compact('method_delivery','delivery_all','delivery_active','delivery_pendding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function status(StatusDeliveryRequest $request)
    {
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $delete=Method_delivery::where('id', $v)->delete();
            }
            if($delete){
                session()->flash('success_status', 'Xóa thành công !');
            }
        }else{
            foreach ($checkItem as $k =>$v){
                $update=Method_delivery::where('id', $v)->update(['status' => "$actions"]);
            }
            if($update){
                session()->flash('success_status', 'Chỉnh sửa thành công !');
            }else{
                session()->flash('success_status', 'Đã chỉnh sửa !');
            }
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDeliveryRequest $request)
    {
        $data=$request->all();
        $data['user_id']=auth()->user()->id;
        Method_delivery::create($data);
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
    public function search(SearchDeliveryRequest $request)
    {
        $value=$request->value;
        $search=$request->search;
        $method_delivery=Method_delivery::orwhereHas('user',function($user) use($value){
            $user->where('name','like',"%$value%");
            })->orwhere('title','like',"%$value%")
            ->orwhere('price','like',"%$value%")
            ->with('user')
            ->paginate(5);
        $method_delivery->withPath("?value="."$value"."&search="."$search");

        $method_delivery_count=Method_delivery::whereHas('user',function($user) use($value){
            $user->where('name','like',"%$value%");
        })->orwhere('title','like',"%$value%")
            ->orwhere('price','like',"%$value%")
            ->with('user')
            ->count();
        $delivery_all=Method_delivery::count();
        $delivery_pendding=Method_delivery::where('status','-1')->count();
        $delivery_active=Method_delivery::where('status','1')->count();
        return view('admin.delivery.delivery',compact('method_delivery','value','delivery_all','delivery_pendding','delivery_active','method_delivery_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method_delivery=Method_delivery::whereId($id)->first();
        return view('admin.delivery.update',compact('method_delivery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryRequest $request, Method_delivery $method_delivery)
    {
        $data=$request->all();
        $update=$method_delivery->update($data);
        if ($update){
            session()->flash('success', 'Cập nhật thành công !');
        }else{
            session()->flash('success', 'Cập nhật Không thành công !');
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

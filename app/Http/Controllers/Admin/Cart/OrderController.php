<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Http\Requests\SearchOrderRequest;
use App\Http\Requests\StatusOrderRequest;
use App\Models\Admin\Order;
use App\Models\Admin\Order_detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status=0;
        if(request()->has('status')){
            $status=request()->status;
            $order=Order::latest()->where('status',$status)->paginate(8);
        }else{
            $order=Order::latest()->whereNotIn('status',['3'])->paginate(8);
        }
        $id=$status;
        $order_all=Order::whereNotIn('status',['3'])->count();
        $order_pending=Order::where('status','-1')->count();
        $order_delivery=Order::where('status','1')->count();
        $order_success=Order::where('status','2')->count();
        $order_recycle=Order::where('status','3')->count();
        return view('admin.cart.order',compact('order','order_all','order_pending','order_delivery','order_success','order_recycle','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function order_get_status($id)
//    {
//        $order=Order::latest()->where('status',$id)->paginate(8);
//        $order_all=Order::whereNotIn('status',['3'])->count();
//        $order_pending=Order::where('status','-1')->count();
//        $order_delivery=Order::where('status','1')->count();
//        $order_success=Order::where('status','2')->count();
//        $order_recycle=Order::where('status','3')->count();
//        return view('admin.cart.order',compact('order','order_all','order_pending','order_delivery','order_success','order_recycle','id'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status_order(StatusOrderRequest $request)
    {
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if (!is_array($checkItem)){
            $update=Order::where('id', $checkItem)->update(['status' => "$actions"]);
            if($update){
                session()->flash('success_status', 'Chỉnh sửa thành công !');
            }else{
                session()->flash('success_status', 'Đã chỉnh sửa !');
            }
        }else{
            if ($actions == 'delete'){
                foreach ($checkItem as $k =>$v){
                    $check_order_detail=Order_detail::where('order_id',$v)->get();
                    if (count($check_order_detail)>0){
                        session()->flash('success_status', 'Chưa Xóa Chi Tiết Đơn Hàng !');
                    }else{
                        $delete=Order::where('id', $v)->delete();
                        if($delete){
                            session()->flash('success_status', 'Xóa thành công !');
                        }
                    }
                }
            }else{
                foreach ($checkItem as $k =>$v){
                    $update=Order::where('id', $v)->update(['status' => "$actions"]);
                }
                if($update){
                    session()->flash('success_status', 'Chỉnh sửa thành công !');
                }else{
                    session()->flash('success_status', 'Đã chỉnh sửa !');
                }
            }
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function order_detail($id=0){
        $order=Order::latest()->whereId($id)->first();
        $order_detail=Order_detail::latest()->where('order_id',$id)->get();
        $total_profit=Order_detail::where('order_id',$id)->sum('profit');
        if (count($order_detail)<1){
            return redirect()->route('order');
        }
        return view('admin.cart.order_detail',compact('order','order_detail','total_profit'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_order_detail($id=0){
        $order=Order_detail::whereId($id)->delete();
        if ($order){
            session()->flash('success_status', 'Chỉnh sửa thành công !');
        }
        return back();
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
    public function search(SearchOrderRequest $request)
    {
        $value=$request->value;
        $search=$request->search;
        $order=Order::orwhere('fullname','like',"%$value%")
            ->orWhere('order_code','like',"%$value%")
            ->orWhere('email','like',"%$value%")
            ->orWhere('phone','like',"%$value%")
            ->orWhere('address','like',"%$value%")
            ->orWhere('city','like',"%$value%")
            ->orWhere('province','like',"%$value%")
            ->orWhere('total_sale','like',"%$value%")
            ->orWhere('total_sale','like',"%$value%")
            ->paginate(8);
        $order_count=Order::orwhere('fullname','like',"%$value%")
            ->orWhere('order_code','like',"%$value%")
            ->orWhere('email','like',"%$value%")
            ->orWhere('phone','like',"%$value%")
            ->orWhere('address','like',"%$value%")
            ->orWhere('city','like',"%$value%")
            ->orWhere('province','like',"%$value%")
            ->orWhere('total_sale','like',"%$value%")
            ->orWhere('total_sale','like',"%$value%")->count();
        $order_all=Order::whereNotIn('status',['3'])->count();
        $order->withPath("?value="."$value"."&search="."$search");
        $id=0;
        $order_pending=Order::where('status','-1')->count();
        $order_delivery=Order::where('status','1')->count();
        $order_success=Order::where('status','2')->count();
        $order_recycle=Order::where('status','3')->count();
        return view('admin.cart.order',compact('order_pending','order_delivery','order_success','order_recycle','order','order_count','order_all','id'));
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

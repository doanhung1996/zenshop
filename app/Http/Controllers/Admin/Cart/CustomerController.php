<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Http\Requests\DeleteCustomerRequest;
use App\Http\Requests\SearchCustomerRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=Customer::latest()->with('user')->paginate(8);
        $customer_all=Customer::count();
        return view('admin.cart.customer',compact('customer','customer_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(DeleteCustomerRequest $request)
    {
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $check_order=Order::where('customer_id',$v)->get();
                if (count($check_order)>0){
                    session()->flash('success_status', 'Chưa Xóa Đơn Hàng !');
                }else{
                    $delete=Customer::where('id', $v)->delete();
                    if($delete){
                        session()->flash('success_status', 'Xóa thành công !');
                    }
                }
            }
        }
        return back();
//        $customer=Customer::latest()->paginate(8);
//        $customer_all=Customer::count();
//        return view('admin.cart.customer',compact('customer','customer_all'));
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
    public function search(SearchCustomerRequest $request)
    {
        $value=$request->value;
        $search=$request->search;
        $customer=Customer::latest()->orwhereHas('user',function($user) use($value){
            $user->where('name','like',"%$value%");
            })->orwhere('fullname','like',"%$value%")
            ->orWhere('email','like',"%$value%")
            ->orWhere('phone','like',"%$value%")
            ->orWhere('address','like',"%$value%")
            ->orWhere('city','like',"%$value%")
            ->orWhere('province','like',"%$value%")
            ->paginate(8);
        $customer_count=Customer::orwhereHas('user',function($user) use($value){
            $user->where('name','like',"%$value%");
        })->orwhere('fullname','like',"%$value%")
            ->orWhere('email','like',"%$value%")
            ->orWhere('phone','like',"%$value%")
            ->orWhere('address','like',"%$value%")
            ->orWhere('city','like',"%$value%")
            ->orWhere('province','like',"%$value%")
            ->count();
        $customer->withPath("?value="."$value"."&search="."$search");
        $customer_all=Customer::count();
        return view('admin.cart.customer',compact('customer','customer_count','customer_all'));
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

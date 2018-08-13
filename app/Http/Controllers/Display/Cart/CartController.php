<?php

namespace App\Http\Controllers\Display\Cart;

//use App\Http\Requests\add_delivery_cart;
use App\Events\CartSuccess;
use App\Http\Requests\AddDeliveryCartRequest;
use App\Http\Requests\AddQtyCartRequest;
use App\Http\Requests\CofirmSuccessRequest;
use App\Http\Requests\ConfirmRequestCart;
use App\Http\Requests\UpdateQtyCartRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Delivery;
use App\Models\Admin\Method_delivery;
use App\Models\Admin\Order;
use App\Models\Admin\Order_detail;
use App\Models\Admin\Product;
use App\Traits\Provincial;
use Cart;
use Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

//use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_cart=Cart::content();
        $data_cart_count = count(Cart::content());
        $qty = Cart::count();
        $total =  Cart::total(0);
        return view('display.cart.detail_cart')->with(['data_cart'=>$data_cart,'data_cart_count'=>$data_cart_count,'qty'=>$qty,'total'=>$total]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content_cart()
    {
        $data_cart=Cart::content();
        $data_cart_count = count(Cart::content());
        $qty = Cart::count();
        $total =  Cart::total(0);
        return view('display.cart.content_cart')->with(['data_cart'=>$data_cart,'data_cart_count'=>$data_cart_count,'qty'=>$qty,'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_cart()
    {
        $data_cart_count = count(Cart::content());
        $qty = Cart::count();
        $total =  Cart::total(0);
        $data_cart=Cart::content()->take(2);
        return response()->view('display.cart.home', compact('data_cart', 'qty', 'total','data_cart_count') );
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
    public function delete(Request $request)
    {
        $rowId=$request->rowId;
        Cart::remove($rowId);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delivery()
    {
        if (Cart::count()<1){
            return redirect()->route('home');
        }
        $provincial=Provincial::get_provincial();
        $delivery=Method_delivery::where('status','1')->get();
        return view('display.cart.delivery_cart',compact('provincial','delivery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_delivery(AddDeliveryCartRequest $request)
    {
        $data_delivery=[
                'name'      =>$request->name,
                'phone'     =>$request->phone,
                'provincial'=> $request->provincial,
                'city'      =>$request->city,
                'address'   =>$request->address,
                'email'     =>$request->email,
                'delivery'  =>$request->delivery,
                'pay'       =>$request->pay,
        ];
         $cart=Cart::content();
         $qty = Cart::count();
         $total = Cart::total(0);
         $total_change=(int)str_replace(',','',$total);
         $price_ship=Method_delivery::whereId($request->delivery)->first()->price;
         $total_all = number_format($total_change + $price_ship,0);
         $delivery=Method_delivery::whereId($request->delivery)->first();
        return view('display.cart.confirm',compact('cart','qty','total','total_all','data_delivery','delivery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get_city(Request $request)
    {
        $provincial=Provincial::get_provincial();
        $provincial_name=$request->provincial;
        foreach ($provincial as $k => $v){
            if(($v['name']==$provincial_name)){
                foreach ($v['cities']  as $k_city => $v_city) {
                    echo '<option value="'.$v['cities'][$k_city].'" '.((old('city')==$v['cities'][$k_city])?'selected':"").'>'.$v['cities'][$k_city].'</option>';
                }
            }
        }
//      echo json_encode($city);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddQtyCartRequest $request)
    {
        $product_id=$request->product_id;
//        $product_qty=Product::whereId($product_id)->first()->qty;
        $qty=$request->qty;
//        if ($qty > $product_qty){
////            toastr.error('Số lượng hàng đã hết');
//            return back();
//        }elseif ($qty < 0){
////            toastr.error('Số lượng không đúng');
//            return back();
//        }
        $product=Product::whereId($product_id)->first();
        $new_cart =Cart::add("$product->id","$product->product_name","$qty",$product->price_sale);
        $new_cart->associate('App\Models\Admin\Product');
        return redirect()->route('cart.detail');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm_success(ConfirmRequestCart $request)
    {
        if (Cart::count()<1){
            return redirect()->route('home');
        }
        //ADD CUSTOMER
        if (isset(auth()->user()->id)) {
            $customer = [
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
                'user_id' => auth()->user()->id,
            ];
        }else{
            $customer = [
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
            ];
        }
        $customer_insert=Customer::create($customer);
        if ($customer_insert==false){
            return redirect()->route('home');
        }
        //ADD ORDER
        $total_qty = Cart::count();
        $total = Cart::total(0);
        $total_change=(int)str_replace(',','',$total);
        $method_delivery=Method_delivery::whereId($request->delivery)->first();
        //Giảm chỗ này . - Thêm discount_id
        $total_sale = (int)$total_change+$method_delivery['price'];
        $delivery=$method_delivery['title'].' '.$method_delivery['date_info'];
        $date=$method_delivery['date'];
        $pay=$request->pay;
        $order_date=date('d/m/Y - H:i:s',strtotime('now'));
        $date_transport=date('d/m/Y - H:i:s',strtotime("now + $date days"));
        $order_code = 'HD'.strtoupper(str_random(16));
        $customer_id=Customer::where('fullname',$request->name)->max('id');
        if (isset(auth()->user()->id)) {
            $order = [
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
                'pay' => $pay,
                'delivery' => $delivery,
                'order_code' => $order_code,
                'total_qty' => $total_qty,
                'total_sale' => $total_sale,
                'order_date' => $order_date,
                'date_transport' => $date_transport,
                'customer_id' => $customer_id,
                'user_id' => auth()->user()->id,
            ];
        }else{
            $order = [
                'fullname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'province' => $request->province,
                'city' => $request->city,
                'address' => $request->address,
                'pay' => $pay,
                'delivery' => $delivery,
                'order_code' => $order_code,
                'total_qty' => $total_qty,
                'total_sale' => $total_sale,
                'order_date' => $order_date,
                'date_transport' => $date_transport,
                'customer_id' => $customer_id,
            ];
        }
        $order_insert=Order::create($order);
        if ($order_insert==false){
            return redirect()->route('home');
        }
        $order_id=Order::where('fullname',$request->name)->max('id');
        //ADD ORDER DETAIL
        $cart_content=Cart::content();
        if (!empty($cart_content)){
            foreach($cart_content as $k => $v){
               $purchase=Product::whereId($v->id)->first(['product_purchase'])->product_purchase;
               $qty=Product::whereId($v->id)->first()->qty - $v->qty ;
               Product::whereId($v->id)->update(['qty'=> $qty]);
               //Giảm ở chỗ này , Giảm profit ,subtotal và thêm discount_id
               $profit=$v->price-$purchase;
               if (isset(auth()->user()->id)){
                   $order_detail=[
                       'order_id'    =>$order_id,
                       'product_id'  =>$v->id,
                       'name'        =>$v->name,
                       'quantity'    =>$v->qty,
                       'price'       =>$v->price,
                       'subtotal'    =>$v->subtotal,
                       'profit'      =>$profit,
                       'order_code'  =>$order_code,
                       'image'       =>$v->model->image,
                       'user_id'     =>auth()->user()->id,
                   ];
               }else{
                   $order_detail=[
                       'order_id'    =>$order_id,
                       'product_id'  =>$v->id,
                       'name'        =>$v->name,
                       'quantity'    =>$v->qty,
                       'price'       =>$v->price,
                       'subtotal'    =>$v->subtotal,
                       'profit'      =>$profit,
                       'order_code'  =>$order_code,
                       'image'       =>$v->model->image,
                   ];
               }
                $order_detail_insert=Order_detail::create($order_detail);
                if ($order_detail_insert==false){
                    return redirect()->route('home');
                }
            }
        }else{
            return redirect()->route('home');
        }
         $customer=(object)$customer;
        event(new CartSuccess($order_detail_insert->order_id,$customer,$cart_content, $total_sale, $total_qty,$order_date,$date_transport,$order_code));
        Cart::destroy();
        return redirect()->route('cart.confirm_sc');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm()
    {
        if (Cart::count()<1){
            return redirect()->route('home');
        }
        return view('display.cart.confirm');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $id=$request->id;
        $product=Product::whereId($id)->first();
        $cart=Cart::content();
        foreach ($cart as $k => $v) {
            if ($v->id == $product->id){
                if ($v->qty == $product->qty || $v->qty > $product->qty || $product->qty < 1){
                    return '';
                }
            }
        }
        $qty=1;
        $new_cart = Cart::add("$product->id","$product->product_name","$qty",$product->price_sale);
        $new_cart->associate('App\Models\Admin\Product');
        $data_cart_count = count(Cart::content());
        $qty = Cart::count();
        $total =  Cart::total(0);
        $data_cart=Cart::content()->take(2);
        return response()->view('display.cart.home', compact('data_cart', 'qty', 'total','data_cart_count') );
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_qty(Request $request)
    {
//        echo $request->
//        dd(Cart::content());
        $product_id=$request->product_id;
        $product_qty=Product::whereId($product_id)->first()->qty;
        $rowId=$request->rowId;
        $qty=$request->qty;
        if ($qty > $product_qty){
           return 'end';
        }elseif($qty < 1){
            return 'required';
        }else{
            Cart::update($rowId, $qty);
            return 'ok';
        }
//        if ($update==true) {
//            session()->flash('update_qty_success', 'Cập Nhật Thành Công !');
//        }
//        return back();
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

<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Requests\StatusProductCatRequest;
use App\Http\Requests\StoreCreateProductCatRequest;
use App\Http\Requests\StoreCreateProductRequest;
use App\Http\Requests\UpdateProductCatRequest;
use App\Models\Admin\Product;
use App\Models\Admin\Product_cat;
//use App\Models\Admin\Product;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_multi_cat = new Product_cat();
        $product_cat=Product_cat::with('user')->get();
        $product_count=count($product_cat);
        $data=$product_multi_cat->product_multi_cat($product_cat);
        return view('admin.product.product_cat',compact('data','product_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_id=Product_cat::where('parent_id','=',0)->get();
        return view('admin.product.cat_create',compact('parent_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreateProductCatRequest $request)
    {
        Product_cat::create([
            'title'=> $title=$request->title,
            'slug'=> str_slug($title=$request->title),
            'parent_id'=>$parent_cat=$request->parent_id,
            'user_id'=>Auth::user()->id
        ]);
        session()->flash('success_status','Thêm mới thành công');
        return back();
    }

    public function status(StatusProductCatRequest $request){
        $actions  = $request->actions;
        $checkItem= $request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k => $v){
                $check_product=Product::where('product_cat_id',$v)->get();
                $check=Product_cat::where('parent_id',$v)->get();
                if(count($check) == 0 && count($check_product)==0){
                    Product_cat::where('id', $v)->delete();
                    session()->flash('success_status', 'Xóa thành công !');
                }else{
                    session()->flash('fail_status', 'Chưa xóa danh mục con !');
                }
            }
        }
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
    public function edit($id)
    {
        $parent_id=Product_cat::where('parent_id','!=','0')->get();
        $product_cat=Product_cat::where('id',"$id")->first();
        return view('admin.product.update_cat_product',compact('parent_id','product_cat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductCatRequest $request
     * @param Product_cat $product_cat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductCatRequest $request, Product_cat $product_cat)
    {
        $product_cat->update([
            'title' => $request->title,
            'slug' => str_slug($request->title),
            'parent_id' => $request->parent_id
        ]);
        session()->flash('update_success', 'Chỉnh sửa thành công !');
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

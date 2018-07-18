<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Requests\SearchProductRequest;
use App\Http\Requests\StatusProductRequest;
use App\Http\Requests\StoreCreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Admin\Product;
use App\Models\Admin\Product_cat;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
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
             $product=Product::latest()->where('status',$status)->with(['user','product_cat'])->where('status',$status)->paginate(5);
        }else{
            $product=Product::latest()->with(['user','product_cat'])->paginate(5);
        }
        $product_all=Product::all()->count();
        $product_active=Product::where('status','1')->count();
        $product_pending=Product::where('status','-1')->count();
        return view('admin.product.product',compact('product','product_all','product_active','product_pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function product_get_status($status)
//    {
//        if(request()->has('status')){
//            $status=request()->status;
//            return $product=Product::latest()->where('status',$status)->with(['user','product_cat'])->where('status',$status)->paginate(5);
////            $query->where('status',$status);
//        }else{
//            $product=Product::latest()->with(['user','product_cat'])->where('status',$status)->paginate(5);
//        }
//        $product_all=Product::all()->count();
//        $product_active=Product::where('status','1')->count();
//        $product_pending=Product::where('status','-1')->count();
//        return view('admin.product.product',compact('product','product_all','product_active','product_pending'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_id=Product_cat::where('parent_id','!=',0)->get();
        return view('admin.product.create_product',compact('parent_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreateProductRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('fileUpload')) {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $data['slug']=str_slug($data['product_name']);
            $data['image']='uploads/'.$fileName;
            $data['user_id']=Auth::user()->id;
        }
        Product::create($data);
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
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function status(StatusProductRequest $request)
    {
         $actions=$request->actions;
         $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $delete=Product::where('id', $v)->delete();
            }
            if($delete){
                session()->flash('success_status', 'Xóa thành công !');
            }
        }else{
            foreach ($checkItem as $k =>$v){
                $update=Product::where('id', $v)->update(['status' => "$actions"]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function search(SearchProductRequest $request){
         $value=$request->value;
         $search=$request->search;
//         Slider::whereHas('user',function($user) use($value){
//             $user->where('name','like',"%$value%");
//         })
        $product=Product::orwhereHas('user',function($user) use($value){
             $user->where('name','like',"%$value%");
         })->orwhereHas('product_cat',function($product_cat) use($value){
             $product_cat->where('title','like',"%$value%");
         })->orwhere('product_name','like',"%$value%")
             ->orwhere('product_code','like',"%$value%")
             ->paginate(5);
         $product->withPath("?value="."$value"."&search="."$search");

         $product_count=Product::whereHas('user',function($user) use($value){
             $user->where('name','like',"%$value%");
         })->whereHas('product_cat',function($product_cat) use($value){
             $product_cat->where('title','like',"%$value%");
         })->orwhere('product_name','like',"%$value%")
             ->orwhere('product_code','like',"%$value%")
             ->get();
         $product_all=Product::all()->count();
         $product_count=count($product_count);
         $product_active=Product::where('status','1')->count();
         $product_pending=Product::where('status','-1')->count();
         return view('admin.product.product',compact('product','value','product_all','product_count','product_total','product_active','product_pending'));
     }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::where('id',$id)->first();
        $parent_id=Product_cat::where('parent_id','!=',0)->get();
        return view('admin.product.update_product',compact('parent_id','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request,Product $product)
    {
        $data=$request->all();
        if ($request->hasFile('fileUpload')) {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $data['slug']=str_slug($data['product_name']);
            $data['image']='uploads/'.$fileName;
            $data['user_id']=Auth::user()->id;
        }
        $product->update($data);
        session()->flash('success_update', 'Cập Nhật thành công !');
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

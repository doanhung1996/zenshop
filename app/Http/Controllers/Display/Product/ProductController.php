<?php

namespace App\Http\Controllers\Display\Product;

use App\Models\Admin\Product;
use App\Models\Admin\Product_cat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category,$slug)
    {
        $check_category=Product_cat::where('slug',$category)->firstOrFail();
        $check_parent = $check_category->childs()->where('slug', $slug)->firstOrFail();
        $product=Product_cat::where('slug',$slug)->firstOrFail()->product()->paginate(20);
        $product_count_paginate=count($product);
        $product_count=Product_cat::where('slug',$slug)->firstOrFail()->product()->count();
        return view('display.product.product',compact('product','check_category','check_parent','product_count','product_count_paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category)
    {
         $category_id=Product_cat::where('slug',$category)->first();
         $category_product=Product_cat::where('slug',$category)->first();
         $category_all=Product::with('category','product_cat')->where('status','1')->where('category_id',$category_id['id'])->paginate(20);
         $category_count=Product::with('category','product_cat')->where('status','1')->where('category_id',$category_id['id'])->paginate(20)->count();
         $category_count_all=Product::with('category','product_cat')->where('status','1')->where('category_id',$category_id['id'])->count();
         return view('display.product.category',compact('category_product','category_all','category_count','category_count_all'));
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
    public function show($category,$slug,$parent_slug)
    {
        $check_category=Product_cat::where('slug',$category)->firstOrFail();
        $check_parent = $check_category->childs()->where('slug', $slug)->firstOrFail();
        $product=Product::where(['slug'=>$parent_slug,'status'=> '1'])->firstOrFail();
        $related_products=Product_cat::where('slug',$slug)->latest()->firstOrFail()->product()->get();
        return view('display.product.detail_product',compact('product','check_category','check_parent','related_products'));
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

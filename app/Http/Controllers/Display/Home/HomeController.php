<?php

namespace App\Http\Controllers\Display\Home;

use App\Models\Admin\Post;
use App\Models\Admin\Product;
use App\Models\Admin\Product_cat;
use Cache;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $featured = Cache::remember('featured', 86400, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(8)->get();
        });

        $new_arrival = Cache::remember('new_arrival', 1440, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(8)->get();
        });

        $hot_sale = Cache::remember('hot_sale', 1440, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(8)->get();
        });

        $top_ten = Cache::remember('top_ten', 1440, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(10)->get();
        });

        $post_home = Cache::remember('post_home', 1440, function(){
            return Post::where('status','1')->with('post_cat.parent')->latest()->limit(10)->get();
        });
        return view('display.home.home',compact('featured','new_arrival','hot_sale','top_ten','post_home'));
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

<?php

namespace App\Http\Controllers\Display\Home;

use App\Filters\ProductFilter;
use App\Models\Admin\Menu_item;
use App\Models\Admin\Menu_type;
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
         $featured = Cache::remember('featured', 0, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(8)->get();
        });

        $new_arrival = Cache::remember('new_arrival', 0, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(8)->get();
        });

        $hot_sale = Cache::remember('hot_sale', 0, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(8)->get();
        });

        $top_ten = Cache::remember('top_ten', 0, function(){
            return Product::where('status','1')->with('product_cat')->latest()->limit(10)->get();
        });

        $post_home = Cache::remember('post_home', 0, function(){
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
//    public function search(Request $request) // test thu nhe
//    {
//        $category=$request->qc;
//        $value=$request->q;
//        if (empty($category) && empty($value)){
//            return back();
//        }
//        if(!empty($category) && !empty($value)){
//            $category_id= Product_cat::where('slug',$category)->firstOrFail()->id;
//            $product = Product::with('category','product_cat')->where('status',1)
//                ->orwhere('category_id',$category_id)->orwhere('product_name','like',"%$value%")->orwhere('product_name_seal','like',"%$value%")->paginate(20);
//            $product->withPath("?qc="."$category"."&q="."$value");
//            $product_count=count($product);
//            $product_count_search= Product::with('category','product_cat')->where('status',1)
//                ->orwhere('category_id',$category_id)->orwhere('product_name','like',"%$value%")->orwhere('product_name_seal','like',"%$value%")->count();
//        }elseif(!empty($category)){
//            $category_id= Product_cat::where('slug',$category)->firstOrFail()->id;
//            $product = Product::with('category','product_cat')->where('status',1)
//                ->orwhere('category_id',$category_id)->paginate(20);
//            $product->withPath("?qc="."$category"."&q="."$value");
//            $product_count=count($product);
//            $product_count_search= Product::with('category','product_cat')->where('status',1)
//                ->orwhere('category_id',$category_id)->count();
//        }elseif (!empty($value)){
//             $product = Product::with('category','product_cat')->where('status',1)
//               ->orwhere('product_name','like',"%$value%")->orwhere('product_name_seal','like',"%$value%")->paginate(20);
//            $product->withPath("?qc="."$category"."&q="."$value");
//            $product_count=count($product);
//            $product_count_search= Product::with('category','product_cat')->where('status',1)
//                ->orwhere('product_name','like',"%$value%")->orwhere('product_name_seal','like',"%$value%")->count();
//        }else{
//            return back();
//        }
//        $menu_type_id=Menu_type::where('name','Header')->first()->id;
//        $category_category=Menu_item::where('parent_id',0)->where('menu_type_id',$menu_type_id)->where('type','product')->get();
//        return view('display.product.search',compact('product_count_search','product_count','category_category','product','value'));
//    }

    public function search(ProductFilter $filter)
    {
        $query = Product::filter($filter)->with('category','product_cat');
        $product=  $query->paginate(20);
        $product_count=$product->perpage();
        $product_count_search=$product->total();
        $menu_type_id=Menu_type::where('name','Header')->first()->id;
        $category_category=Menu_item::where('parent_id',0)->where('menu_type_id',$menu_type_id)->where('type','product')->get();
        return view('display.product.search',compact('product_count_search','product_count','category_category','product','value'));
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

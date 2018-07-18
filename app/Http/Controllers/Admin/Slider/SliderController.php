<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Requests\AddSliderRequest;
use App\Http\Requests\EditSatusSliderRequest;
use App\Http\Requests\SearchSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Admin\Slider;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $query = Slider::query();
        if(request()->has('status')){
            $status=request()->status;
            $slider=Slider::latest()->where('status',$status)->with('user')->paginate(5);
//            $query->where('status',$status);
        }else{
            $slider=Slider::latest()->with('user')->paginate(5);
        }
//        if(request()->has('price')){
//            $price=request()->price;
//            $query->where('price',$price);
//        }
        // không thích if thì có kiểu ko if
//        $query->when(request('status'), function($q){
//                    $q->where('status',request()->status);
//                })->when(request('price'), function($q){
//                    $q->orwhere('price',request()->price);
//                });
//        return $sliders = $query->get();
        $slider_all=Slider::count();
        $slider_pendding=Slider::where('status','-1')->count();
        $slider_active=Slider::where('status','1')->count();
        return view('admin.slider.slider',compact('slider','slider_all','slider_active','slider_pendding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.slider.create_slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function slider_list_status($status)
//    {
//        $slider=Slider::latest()->where('status',$status)->with('user')->paginate(5);
//        $slider_all=Slider::count();
//        $slider_pendding=Slider::where('status','-1')->count();
//        $slider_active=Slider::where('status','1')->count();
//        return view('admin.slider.slider',compact('slider','slider_all','slider_active','slider_pendding'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function status(EditSatusSliderRequest $request)
    {
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $delete=Slider::where('id', $v)->delete();
            }
            if($delete){
                session()->flash('success_status', 'Xóa thành công !');
            }
        }else{
            foreach ($checkItem as $k =>$v){
                $update=Slider::where('id', $v)->update(['status' => "$actions"]);
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
    public function store(AddSliderRequest $request)
    {
        $data=$request->all();
        if ($request->hasFile('image') && $request->hasFile('background') ) {
            $file = $request->image;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $background = $request->background;
            $backgroundName = $background->getClientOriginalName();
            $background->move(public_path('uploads'),$backgroundName);
            $data['image']='uploads/'.$fileName;
            $data['background']='uploads/'.$backgroundName;
            $data['user_id']=Auth::user()->id;
        }
        Slider::create($data);
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
    public function search(SearchSliderRequest $request)
    {
        $value=$request->value;
        $search=$request->search;
        $slider=Slider::whereHas('user',function($user) use($value){
            $user->where('name','like',"%$value%");
            })->orwhere('name','like',"%$value%")
            ->orwhere('title','like',"%$value%")
            ->orwhere('price','like',"%$value%")
            ->with('user')
            ->paginate(5);
        $slider->withPath("?value="."$value"."&search="."$search");

        $slider_count=Slider::whereHas('user',function($user) use($value){
            $user->where('name','like',"%$value%");
        })->orwhere('name','like',"%$value%")
            ->orwhere('title','like',"%$value%")
            ->orwhere('price','like',"%$value%")
            ->with('user')
            ->count();
        $slider_all=Slider::count();
        $slider_pendding=Slider::where('status','-1')->count();
        $slider_active=Slider::where('status','1')->count();
        return view('admin.slider.slider',compact('slider','slider_all','slider_count','slider_pendding','slider_active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slider)
    {
        $slider=Slider::whereId($slider)->first();
        return view('admin.slider.update_slider',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $data=$request->all();
        if ($request->hasFile('image') && $request->hasFile('background') ) {
            $file = $request->image;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $background = $request->background;
            $backgroundName = $background->getClientOriginalName();
            $background->move(public_path('uploads'),$backgroundName);
            $data['image']='uploads/'.$fileName;
            $data['background']='uploads/'.$backgroundName;
            $data['user_id']=Auth::user()->id;
        }elseif ($request->hasFile('image')){
            $file = $request->image;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $data['image']='uploads/'.$fileName;
            $data['user_id']=Auth::user()->id;
        }elseif ($request->hasFile('background')){
            $background = $request->background;
            $backgroundName = $background->getClientOriginalName();
            $background->move(public_path('uploads'),$backgroundName);
            $data['background']='uploads/'.$backgroundName;
            $data['user_id']=Auth::user()->id;
        }

        $update=$slider->update($data);
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

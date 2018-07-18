<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UpdateInformationRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function account()
    {
        if (isset(auth()->user()->name) == false){
            session()->flash('success','Bạn chưa đăng nhập !');
            return redirect()->route('home');
        }else{
            $user_id=auth()->user()->id;
        }
        return view('auth.information',compact('user_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInformationRequest $request, User $user)
    {
        if (isset(auth()->user()->name) == false){
            session()->flash('success','Bạn chưa đăng nhập !');
            return redirect()->route('home');
        }else{
            $data=$request->all();
            $user->update($data);
            if ($user){
                session()->flash('success','Cập nhật thành công !');
            }else{
                session()->flash('success', 'Đã chỉnh sửa !');
            }
        }
        return redirect()->route('information.update.success');
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

<?php

namespace App\Http\Controllers\Admin\Email;

use App\Http\Requests\SearchEmailCustomerRequest;
use App\Http\Requests\StatusEmailCustomerRequest;
use App\Models\Admin\Email_customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Email_customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email_customer=Email_customer::paginate(8);
        $email_count=Email_customer::count();
        return view('admin.email.email',compact('email_customer','email_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(SearchEmailCustomerRequest $request)
    {
        $value=$request->value;
        $search=$request->search;
        $email_customer=Email_customer::where('email','like',"%$value%")->paginate(5);
        $email_customer->withPath("?value="."$value"."&search="."$search");
        $email_count=Email_customer::count();
        $email_count_search=Email_customer::where('email','like',"%$value%")->count();
        return view('admin.email.email',compact('email_customer','email_count','email_count_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function status(StatusEmailCustomerRequest $request)
    {
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $delete=Email_customer::where('id', $v)->delete();
            }
            if($delete){
                session()->flash('success_status', 'Xóa thành công !');
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

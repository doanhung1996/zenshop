<?php

namespace App\Http\Controllers\Display\Email;

use App\Http\Requests\AddEmailCustomerRequest;
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
    public function store(AddEmailCustomerRequest $request)
    {
        $email=$request->email;
        if (empty($email)){
            return redirect()->route('home');
        }else{
            $check_exist_email=Email_customer::where('email',$email)->first();
            if (!empty($check_exist_email)){
                return view('display.email.error_email');
            }else{
                Email_customer::create(['email'=>$request->email]);
                return view('display.email.email');
            }
        }
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

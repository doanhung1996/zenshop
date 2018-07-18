<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Requests\EditStatusAccountRequest;
use App\Http\Requests\SearchAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\User;
use function Aws\dir_iterator;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('account')){
            $account=request()->account;
            $account=User::latest()->where('account',$account)->paginate(8);
//            $query->where('status',$status);
        }else{
            $account=User::latest()->paginate(8);
        }

        $account_all=User::count();
        $account_admin=User::where('account','admin')->count();
        $account_customer=User::where('account','customer')->count();
        return view('admin.account.account',compact('account','account_all','account_admin','account_customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function list_account($account)
//    {
//        $account=User::where('account',$account)->latest()->paginate(8);
//        $account_all=User::count();
//        $account_admin=User::where('account','admin')->count();
//        $account_customer=User::where('account','customer')->count();
//        return view('admin.account.account',compact('account','account_all','account_admin','account_customer'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(EditStatusAccountRequest $request)
    {
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if ($actions == 'delete'){
            foreach ($checkItem as $k =>$v){
                $user=User::whereId($v)->get();
                if (count($user)>0){
                    session()->flash('success_status', 'Tài Khoản đang đăng nhập !');
                    return back();
                }else{
                    $delete=User::where('id', $v)->delete();
                }
            }
            if($delete){
                session()->flash('success_status', 'Xóa thành công !');
            }
        }else{
            foreach ($checkItem as $k =>$v){
                $update=User::where('id', $v)->update(['account' => "$actions"]);
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
    public function password()
    {
        $account=User::whereId(auth()->user()->id)->first();
        return view('admin.account.change_pass',compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function change_password(UpdatePasswordRequest $request,User $user)
    {
        $user=$user->update(['password'=>$request->password]);
        if ($user){
            session()->flash('success_update','Cập nhật thành công');
            }else{
            session()->flash('success_update', 'Đã chỉnh sửa !');
        }
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchAccountRequest $request)
    {
        $value=$request->value;
        $search=$request->search;
        $account=User::orwhere('name','like',"%$value%")
            ->orwhere('email','like',"%$value%")
            ->orwhere('phone','like',"%$value%")
            ->orwhere('gender','like',"%$value%")
            ->orwhere('address','like',"%$value%")
            ->paginate(5);
        $account->withPath("?value="."$value"."&search="."$search");
        $account_count=User::orwhere('name','like',"%$value%")
            ->orwhere('email','like',"%$value%")
            ->orwhere('phone','like',"%$value%")
            ->orwhere('gender','like',"%$value%")
            ->orwhere('address','like',"%$value%")
            ->count();
        $account_all=User::count();
        $account_admin=User::where('account','admin')->count();
        $account_customer=User::where('account','customer')->count();
        return view('admin.account.account',compact('account','value','account_count','account_all','account_admin','account_customer'));
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
         $account=User::whereId($id)->first();
         return view('admin.account.update',compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, User $user)
    {
        $data=$request->all();
        if ($request->hasFile('fileUpload')) {
            $file = $request->fileUpload;
            $fileName=$file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
            $data['image']='uploads/'.$fileName;
        }
        $user->update($data);
        if ($user){
            session()->flash('success_update','Cập nhật thành công');
        }else{
            session()->flash('success_update', 'Đã chỉnh sửa !');
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

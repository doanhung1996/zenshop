<?php

namespace App\Http\Controllers\Admin\Notification;

use App\Http\Requests\DeleteNotificationRequest;
use App\Models\Admin\Notification;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['isadmin','auth']);
//    }
    public function index()
    {
        $notification = User::whereEmail(config('app.admin_email'))->first()->unreadNotifications;
        return $notification;
    }

    public function destroy($id)
    {
        User::whereEmail(config('app.admin_email'))
            ->first()->notifications()
            ->findOrFail($id)
            ->markAsRead();
    }

    public function list_notification(){
         $notifications = auth()->user()->notifications()->paginate(8);
         $notification_all=Notification::count();
//        $notification=new Notification();
//        $a=$notification->where('id','1afd8bf3-639a-4eb1-8d07-b703f0fe2b18')->get();
//        dd($notifications[0]->data);
        return view('admin.notification.notification',compact('notifications','notification_all'));
    }

    public function delete(DeleteNotificationRequest $request){
        $actions=$request->actions;
        $checkItem=$request->checkItem;
        if($actions=='delete'){
            auth()->user()->notifications->whereIn('id', $checkItem)->each->delete();
            session()->flash('delete_success','Xóa thành công !');
        }
        return back();
    }
}

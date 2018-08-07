<?php

namespace App\Http\Controllers\Admin\Notification;

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

}

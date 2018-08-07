<?php

namespace App\Listeners;

use App\Events\CartSuccess;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\SendToCartSuccess;
use Illuminate\Support\Facades\Mail;
class NotificationToAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CartSuccess  $event
     * @return void
     */
    public function handle(CartSuccess $event)
    {
        Mail::to(config('app.admin_email'))
            ->send(new SendToCartSuccess($event->customer, $event->cart_content, $event->total_sale, $event->total_qty, $event->order_date, $event->date_transport, $event->order_code));
        $user = User::where('email', config('app.admin_email'))->first();
        $user->notify(new \App\Notifications\NotificationToAdmin($event));
        $user->updatePushSubscription('123');
    }
}

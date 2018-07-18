<?php

namespace App\Listeners;
use App\Mail\SendToCartSuccess;
use App\Events\CartSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
class MailToCustomer
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
         Mail::to($event->customer_insert->email)->send(new SendToCartSuccess($event->customer_insert,$event->cart_content,$event->total_sale,$event->total_qty,$event->order_date,$event->date_transport));
         Mail::to('doanvanhung160596@gmail.com')->send(new SendToCartSuccess($event->customer_insert,$event->cart_content,$event->total_sale,$event->total_qty,$event->order_date,$event->date_transport));
    }
}

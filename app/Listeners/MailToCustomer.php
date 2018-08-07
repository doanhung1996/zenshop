<?php

namespace App\Listeners;
use App\Jobs\SendEmail;
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
        dispatch(new SendEmail($event));
    }
}

<?php

namespace App\Listeners;

use App\Events\CartSuccess;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
        //
    }
}

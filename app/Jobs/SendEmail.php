<?php

namespace App\Jobs;

use App\Events\CartSuccess;
use App\Mail\SendToCartSuccess;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $event;
    public $tries = 5;
    /**
     * Create a new job instance.
     *
     * @param CartSuccess $event
     */
    public function __construct(CartSuccess $event)
    {
        $this->event=$event;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->event->customer->email)
            ->send(new SendToCartSuccess($this->event->customer,
            $this->event->cart_content,
            $this->event->total_sale,
            $this->event->total_qty,
            $this->event->order_date,
            $this->event->date_transport,
            $this->event->order_code));
    }
}

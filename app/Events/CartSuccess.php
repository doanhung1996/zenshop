<?php

namespace App\Events;

use App\Models\Admin\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CartSuccess
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $customer_insert;
    public $cart_content;
    public $total_sale;
    public $total_qty;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Customer $customer_insert, $cart_content, $total_sale, $total_qty)
    {
        $this->customer_insert=$customer_insert;
        $this->cart_content=$cart_content;
        $this->total_sale=$total_sale;
        $this->total_qty=$total_qty;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

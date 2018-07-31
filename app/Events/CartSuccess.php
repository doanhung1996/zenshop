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

    public $customer;
    public $cart_content;
    public $total_sale;
    public $total_qty;
    public $order_date;
    public $date_transport;
    public $order_code;

    /**
     * Create a new event instance.
     *
     * @param $customer
     * @param $cart_content
     * @param $total_sale
     * @param $total_qty
     * @param $order_date
     * @param $date_transport
     * @param $order_code
     */
    public function __construct($customer, $cart_content, $total_sale, $total_qty,$order_date,$date_transport,$order_code)
    {
        $this->customer=$customer;
        $this->cart_content=$cart_content;
        $this->total_sale=$total_sale;
        $this->total_qty=$total_qty;
        $this->order_date=$order_date;
        $this->date_transport=$date_transport;
        $this->order_code=$order_code;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
//    public function broadcastOn()
//    {
//        return new PrivateChannel('channel-name');
//    }
}

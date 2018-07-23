<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendToCartSuccess extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $customer_insert;
    public $cart_content;
    public $total_sale;
    public $total_qty;
    public $order_date;
    public $date_transport;
    public $order_code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer_insert,$cart_content,$total_sale,$total_qty,$order_date,$date_transport,$order_code)
    {
        $this->customer_insert=$customer_insert;
        $this->cart_content=$cart_content;
        $this->total_sale=$total_sale;
        $this->total_qty=$total_qty;
        $this->order_date=$order_date;
        $this->date_transport=$date_transport;
        $this->order_code=$order_code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("hungngu1996@gmail.com","Zenshop")->subject("Thanh Toán Thành Công !")->view('mail.sendmailcart',compact('customer_insert','cart_content','total_sale','total_qty','order_code'));
    }
}

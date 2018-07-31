<?php

namespace App\Mail;

use App\Models\Admin\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendToCartSuccess extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $customer;
    public $cart_content;
    public $total_sale;
    public $total_qty;
    public $order_date;
    public $date_transport;
    public $order_code;

    /**
     * Create a new message instance.
     *
     * @param $customer
     * @param $cart_content
     * @param $total_sale
     * @param $total_qty
     * @param $order_date
     * @param $date_transport
     * @param $order_code
     */
    public function __construct($customer,$cart_content,$total_sale,$total_qty,$order_date,$date_transport,$order_code)
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("doanvanhung160596@gmail.com","ZENZEN Vietnam™")
            ->subject("Thanh Toán Thành Công !")
            ->view('mail.sendmailcart',compact('customer','cart_content','date_transport','total_sale','total_qty','order_code'));
    }
}

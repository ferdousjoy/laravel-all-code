<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $sale_id;
    public function __construct($sale_id)
    {
        $this->sale_id=$sale_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

             return $this->from('leoab038@gmail.com')
                 ->to('kazijoy57@gmail.com')
              ->view('mail.orderconfirm',compact('sale_id'));
    }
}

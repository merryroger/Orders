<?php

namespace App\Mail;

use App\Models\Products;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderScopeReport extends Mailable
{
    use Queueable, SerializesModels;

    private $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailFrom = config('mail.from');
        $products = Products::whereIn('id', $this->products)->get();

        return $this->from($mailFrom)->view('orderscope', ['products' => $products]);
    }
}

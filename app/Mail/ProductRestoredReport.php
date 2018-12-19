<?php

namespace App\Mail;

use App\Models\Products;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductRestoredReport extends Mailable
{
    use Queueable, SerializesModels;

    private $product;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Products $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailFrom = config('mail.from');

        return $this->from($mailFrom)->view('product_restored', ['product' => $this->product]);
    }
}

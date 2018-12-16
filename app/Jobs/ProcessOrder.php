<?php

namespace App\Jobs;

use App\Mail\OrderScopeReport;
use App\Models\Orders;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $recipient;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->recipient = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $_orders = Orders::ownedByMail($this->recipient)->unchecked();
        if($_orders->count()) {

            $fields = [
              'checked' => true
            ];

            $orders = $_orders->get();

            foreach($orders as $order) {
                $products[] = $order->product_id;
                $order->update($fields);

            }

            Log::alert('Job was queued for recipient ' . $this->recipient);

            Mail::to($this->recipient)->send(new OrderScopeReport($products));
        }
    }
}

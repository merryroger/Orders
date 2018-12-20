<?php

namespace App\Listeners;

use App\Events\ProductRestoredDeleted;
use App\Mail\ProductRestoredDeletedReport;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class OnProductRestoredDeleted
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
     * @param  object  $event
     * @return void
     */
    public function handle(ProductRestoredDeleted $event)
    {
        $orders = $event->product->orders();
        if ($orders->count()) {
            $emails = $orders->distinct()->get(['email'])->map(function ($item) {
                return $item->email;
            })->all();

            foreach($emails as $email) {
                Mail::to($email)->send(new ProductRestoredDeletedReport($event->product));
            }
        }
    }
}

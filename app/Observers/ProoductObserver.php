<?php

namespace App\Observers;

use App\Models\Products;

class ProoductObserver
{
    /**
     * Handle the products "created" event.
     *
     * @param  \App\Products  $product
     * @return void
     */
    public function created(Products $product)
    {
        //
    }

    /**
     * Handle the products "updated" event.
     *
     * @param  \App\Products  $product
     * @return void
     */
    public function updated(Products $product)
    {
        //
    }

    /**
     * Handle the products "deleted" event.
     *
     * @param  \App\Products  $product
     * @return void
     */
    public function deleted(Products $product)
    {
        $product->sendNotification();
    }

    /**
     * Handle the products "restored" event.
     *
     * @param  \App\Products  $product
     * @return void
     */
    public function restored(Products $product)
    {
        $product->sendNotification();
    }

    /**
     * Handle the products "force deleted" event.
     *
     * @param  \App\Products  $product
     * @return void
     */
    public function forceDeleted(Products $product)
    {
        //
    }
}

<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('orders:show', function () {
    $hasProducts = \App\Models\Products::withTrashed()->count();
    if ($hasProducts) {
        $orders = \App\Models\Orders::all(['id', 'name', 'email', 'phone', 'product_id'])->filter(function ($item) {
            $product = $item->product()->withTrashed()->find($item->product_id);

            $item->setAttribute('product_name', $product->name);
            $item->setAttribute('product_price', sprintf('%01.2f', $product->price));

            unset($item->product_id);

            return $item;
        });

        $headers = [
            'Id',
            'User',
            'E-mail',
            'Phone',
            'Product',
            'Price'
        ];
        $orders = $orders->toArray();

        $this->table($headers, $orders);
    } else {
        $this->error('No orders were found');
    }

})->describe('Outputs the order list');
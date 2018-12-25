<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeOrderRequest;
use App\Jobs\ProcessOrder;
use App\Mail\OrderAccept;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function index()
    {
        $products = Cache::rememberForever('goods', function () {
            return Products::all();
        });

        if (Auth::user() != null) {
            return view('admin_order_products', compact('products'));
        } else {
            return view('order_products', compact('products'));
        }
    }

    public function store(MakeOrderRequest $request)
    {
        $fields = $request->only(['product_id', 'name', 'email', 'phone']);

        $order = Orders::create($fields);

        Mail::to($order->email)->send(new OrderAccept($order));

        session()->flash('orderdone', 'Your order had been accepted and confirmation has been sent via email.');

        ProcessOrder::dispatch($request->get('email'))->onConnection('database')->onQueue('orders')->delay(now()->addHour());

        return redirect()->route('orders.index');
    }

}

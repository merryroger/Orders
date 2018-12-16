<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Models\Products;
use App\Mail\OrderAccept;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $hasProducts = Products::withTrashed()->count();
        if ($hasProducts) {
            $orders = Orders::simplePaginate(5);

            return view('product_orders', compact('orders'));
        } else {
            return redirect()->route('admin.products.list');
        }

    }

    public function store(Request $request)
    {
        $User = Auth::user();

        $UserData = [
            'name' => $User->name,
            'email' => $User->email,
            'phone' => $User->phone
        ];

        $fields = array_merge($request->only(['product_id']), $UserData);

        $order = Orders::create($fields);

        Mail::to($order->email)->send(new OrderAccept($order));

        session()->flash('orderdone', 'Your order had been accepted and confirmation has been sent via email.');

        ProcessOrder::dispatch($User->email)->onConnection('database')->onQueue('orders')->delay(now()->addHour());

        return redirect()->route('orders.index');
    }

}

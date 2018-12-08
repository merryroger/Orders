<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeOrderRequest;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $products = Products::all()->filter(function ($item) {
            $item->setAttribute('alldata', $item->name . '/' . $item->price . ' руб.');
            return $item;
        });

        $products = $products->pluck('alldata', 'id');

        if (Auth::user() != null) {
            return view('admin_order_products', compact('products'));
        } else {
            return view('order_products', compact('products'));
        }
    }

    public function store(MakeOrderRequest $request)
    {
        $fields = $request->only(['product_id', 'name', 'email', 'phone']);

        Orders::create($fields);

        session()->flash('orderdone', 'Your order has been accepted.');

        return redirect()->route('orders.index');
    }
}

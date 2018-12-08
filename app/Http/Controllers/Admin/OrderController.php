<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $hasProducts = Products::withTrashed()->count();
        if ($hasProducts) {
            $orders = Orders::simplePaginate(2);

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

        Orders::create($fields);

        session()->flash('orderdone', 'Your order has been accepted.');

        return redirect()->route('orders.index');
    }

}

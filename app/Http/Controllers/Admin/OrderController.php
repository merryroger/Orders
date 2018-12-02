<?php

namespace App\Http\Controllers\Admin;

use App\Models\Orders;
use App\Models\Products;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $hasProducts = Products::withTrashed()->count();
        if ($hasProducts) {
            $orders = Orders::simplePaginate(2);
        }

        return ($hasProducts) ? view('product_orders', compact('orders')) : redirect()->route('admin.products.list');
    }
}

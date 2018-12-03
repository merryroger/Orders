<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductAddRequest;
use App\Models\Products;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    private const PERPAGE = 3;

    public function index()
    {
        $products = Products::withTrashed()->simplePaginate(self::PERPAGE);

        return view('admin.products', compact('products'));
    }

    public function add()
    {
        return view('admin.product_add_form');
    }

    public function store(ProductAddRequest $request)
    {
        $fields = $request->only(['name', 'price']);
        Products::create($fields);

        $products = Products::withTrashed()->count();

        return redirect()->route('admin.products.list', ['page' => ceil($products / self::PERPAGE)]);
    }

    public function softDelete(Products $product)
    {
        $product->delete();

        return redirect()->route('admin.products.list');
    }

    public function restore($id)
    {
        $product = Products::onlyTrashed()->find($id);
        $product->restore();

        return redirect()->route('admin.products.list');
    }
}

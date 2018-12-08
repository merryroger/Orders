<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductAddRequest;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function softDelete(Request $request, Products $product)
    {
        $product->delete();

        Log::notice('The "' . $product->name . '" product has been deleted.');

        return redirect()->route('admin.products.list', ['page' => $request->page]);
    }

    public function restore(Request $request, $id)
    {
        $product = Products::onlyTrashed()->find($id);
        $product->restore();

        Log::notice('The "' . $product->name . '" product has been restored.');

        return redirect()->route('admin.products.list', ['page' => $request->page]);
    }
}

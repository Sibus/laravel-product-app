<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        $attributes = $request->input();
        $product = Product::create($attributes);

        if ($product) {
            return redirect()
                ->route('products.edit', $product)
                ->with(['success' => "Product #{$product->id} successfully created"]);
        } else {
            return back()
                ->withErrors(['msg' => "Could not create product"])
                ->withInput();
        }
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $attributes = $request->input();
        $result = $product->update($attributes);

        if ($result) {
            return redirect()
                ->route('products.edit', $product)
                ->with(['success' => "Product #{$product->id} has been updated"]);
        } else {
            return back()
                ->withErrors(['msg' => "Could not update Product #{$product->id}"])
                ->withInput();
        }
    }

    public function destroy(Product $product)
    {
        $result = $product->delete();

        if (!$result) {
            return redirect()
                ->route('products.index')
                ->with(['success' => "Product #{$product->id} has been deleted"]);
        } else {
            return back()->withErrors(['msg' => "Could not delete Product #{$product->id}"]);
        }
    }
}

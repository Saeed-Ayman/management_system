<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // with sorting detects automatically sortBy
        // and sortDirection attr from request.
        $products = Product::withSorting();

        $products->when(
            $request->input('search_query'),
            fn($query, $search_query) => $query->where('name', 'like', '%'.$search_query.'%')
        );

        $products->whereBetween('price', [
            $request->input('min_price', PHP_INT_MIN),
            $request->input('max_price', PHP_INT_MAX)
        ]);

        return $products->paginate(10);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
        ]);

        return Product::create($data);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'integer'],
        ]);

        $product->update($data);

        return $product;
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json();
    }
}

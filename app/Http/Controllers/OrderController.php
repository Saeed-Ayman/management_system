<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // with sorting detects automatically sort_by
        // and sort_direction attr from request.
        return Order::withSorting()->paginate(10);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['required', 'integer'],
        ]);

        \DB::beginTransaction();

        try {
            $product = Product::find($data['product_id']);

            if ($product->quantity < $data['quantity']) {
                throw new \Exception("Not enough stock available.");
            }

            $product->decrement('quantity', $data['quantity']);

            $data['total_price'] = $product->price * $data['quantity'];
            $order = Order::create($data);

            \DB::commit();

            return $order;

        } catch (\Exception $e) {
            \DB::rollBack();

            return response()->json(['message' => $e->getMessage()], 400);
        }
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function destroy(Order $order)
    {
        $product = $order->product();

        $product->increment('quantity',  $order->quantity);
        $order->delete();

        return response()->json();
    }
}

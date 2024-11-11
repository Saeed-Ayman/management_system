<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $quantity = $this->faker->numberBetween(int2: 100);

        return [
            'product_id' => $product->id,

            'quantity' => $quantity,
            'total_price' => $quantity * $product->price,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}

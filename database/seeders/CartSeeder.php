<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cartData = [
            [
                'user_id' => 1,
                'product_id' => 1, // Assuming product IDs from ProductsTableSeeder
                'color' => 'Blue',
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 3,
                'color' => 'Red',
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'product_id' => 2,
                'color' => 'Black',
                'quantity' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Cart::insert($cartData);
    }
}

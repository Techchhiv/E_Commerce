<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'size'=>'XL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'product_id' => 3,
                'color' => 'Red',
                'quantity' => 1,
                'size'=>'XL',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        
        Cart::insert($cartData);
        // DB::table('carts')->delete();
    }
}

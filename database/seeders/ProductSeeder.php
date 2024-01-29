<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();
        DB::statement("alter table products auto_increment = 1");

        $additionalProducts = [
            [
                "name" => "Kids T-Shirt",
                "price" => 19.99,
                "description" => "Cute and colorful T-shirt for kids",
                "category_id" => 3,
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Men's Formal Shirt",
                "price" => 59.99,
                "description" => "Classic formal shirt for men",
                "category_id" => 1,
                "discount" => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Women's Handbag",
                "price" => 79.99,
                "description" => "Stylish handbag for women",
                "category_id" => 2,
                "discount" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Kids Sneakers",
                "price" => 29.99,
                "description" => "Comfortable sneakers for kids",
                "category_id" => 3,
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Men's Sportswear Set",
                "price" => 69.99,
                "description" => "Sporty outfit for men",
                "category_id" => 1,
                "discount" => 15,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Women's Sunglasses",
                "price" => 29.99,
                "description" => "Stylish sunglasses for women",
                "category_id" => 2,
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Kids Denim Jacket",
                "price" => 44.99,
                "description" => "Trendy denim jacket for kids",
                "category_id" => 3,
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Men's Running Shoes",
                "price" => 54.99,
                "description" => "High-performance running shoes for men",
                "category_id" => 1,
                "discount" => 20,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Women's Winter Coat",
                "price" => 89.99,
                "description" => "Warm winter coat for women",
                "category_id" => 2,
                "discount" => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Kids Pajama Set",
                "price" => 24.99,
                "description" => "Cozy pajama set for kids",
                "category_id" => 3,
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];
        
        DB::table('products')->insert($additionalProducts);
    }
}

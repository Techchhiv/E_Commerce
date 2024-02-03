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
                "name" => "Cinq à Sept Women's Cheyenne Lilac Vine Blazer",
                "price" => 19.99,
                "description" => "A stunning blazer featuring delicate floral embroidery on the side panels and a flattering, tailored fit.",
                "category_id" => 1,
                "image"=>"CinqASept.png",
                "discount" => 20,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Off-White Patch-detail Bomber Jacket in Red",
                "price" => 59.99,
                "description" => "Red varsity jacket with white sleeves and blue detailing",
                "category_id" => 1,
                "image"=>"OffWhite.png",
                "discount" => 10,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Black Suede Jacket with Gold Buttons",
                "price" => 79.99,
                "description" => "Black suede jacket with a soft, supple feel",
                "category_id" => 1,
                "image"=>"BlackSuede.png",
                "discount" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Tan Trench Coat with Belted Waist",
                "price" => 29.99,
                "description" => "Comfortable sneakers for kids",
                "category_id" => 2,
                "image"=>"TanTrench.png",
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Double-Breasted Blazer with Gold Buttons",
                "price" => 69.99,
                "description" => "Double-breasted blazer in a forest green color",
                "category_id" => 1,
                "image"=>"Blazer.png",
                "discount" => 15,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Rhude Cigaretta-print Silk Shirt in Red",
                "price" => 29.99,
                "description" => "Red silk shirt with an all-over print of cigarettes",
                "category_id" => 3,
                "image"=>"RhudeCigaretta.png",
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Black and White Checkered Button-Down Shirt",
                "price" => 44.99,
                "description" => "Material is difficult to determine from the image, but it could be cotton, polyester, or a blend",
                "category_id" => 3,
                "image"=>"Checkered.png",
                "discount" => 0,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Grey Wool Peacoat with Double Breasted Closure",
                "price" => 54.99,
                "description" => "Navy blue puffer jacket with a regular fit that Stand collar with a toggle closure Full zip closure with a branded zipper pull",
                "category_id" => 2,
                "image"=>"Denim.png",
                "discount" => 20,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Premium Checkerboard Cotton T-shirt",
                "price" => 29.99,
                "description" => "Experience comfort and style with our Premium Checkerboard Cotton T-shirt. Made from high-quality cotton, this T-shirt combines a classic checkerboard pattern with modern design. Perfect for casual occasions and a versatile addition to your wardrobe.",
                "category_id" => 3,
                "image" => "CheckerBoard.png",
                "discount" => 10, // 10% discount
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "name" => "Slim Fit Denim Jeans",
                "category_id" => 4, // Assuming jeans also fall under category 3
                "price" => 49.99,
                "image" => "Denim.png",
                "description" => "Step out in style with our Slim Fit Denim Jeans. Crafted from premium denim fabric, these jeans offer a comfortable and modern fit. The slim silhouette adds a touch of sophistication to your casual wardrobe. Perfect for any casual or semi-casual setting.",
                "discount" => 15, // 15% discount
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];
        
        DB::table('products')->insert($additionalProducts);
    }
}

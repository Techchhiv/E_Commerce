<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('categories')->delete();
        DB::statement("alter table categories auto_increment = 1");

        $category = [
            ["name"=>"Jacket","created_at"=>Carbon::now(),"updated_at"=>Carbon::now()],
            ["name"=>"Coat","created_at"=>Carbon::now(),"updated_at"=>Carbon::now()],
            ["name"=>"Shirt","created_at"=>Carbon::now(),"updated_at"=>Carbon::now()],
            ["name"=>"Jean","created_at"=>Carbon::now(),"updated_at"=>Carbon::now()],
            
        ];

        DB::table('categories')->insert(
            $category
        );
    }
}

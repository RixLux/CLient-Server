<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear tables
        \App\Models\Product::truncate();
        \App\Models\Category::truncate();

        // Enable foreign key checks
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $categories = ['Furniture', 'Stationery', 'Electronics', 'Storage', 'Decor'];

        foreach ($categories as $categoryName) {
            $category = \App\Models\Category::create(['name' => $categoryName]);

            for ($i = 1; $i <= 5; $i++) {
                \App\Models\Product::create([
                    'name' => $categoryName . ' Item ' . $i,
                    'price' => fake()->numberBetween(50000, 2000000),
                    'description' => 'High quality ' . strtolower($categoryName) . ' item for your office needs.',
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}

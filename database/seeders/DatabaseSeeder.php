<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

   /*
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
    */

    public function run(): void
{
    // Data Dummy 1
    Product::create([
        'name' => 'Laptop Gaming ROG',
        'price' => 15000000,
        'description' => 'Laptop spek dewa untuk gaming dan rendering.',
    ]);

    // Data Dummy 2
    Product::create([
        'name' => 'Mouse Wireless Logitech',
        'price' => 250000,
        'description' => 'Mouse ergonomis dengan koneksi 2.4GHz.',
    ]);
}

}

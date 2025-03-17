<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create test user
        $user = User::factory()->create([
            'name' => 'm',
            'email' => 'example@test.pl',
            'password' => bcrypt('password')
        ]);

        // Create products
        Product::factory()->count(20)->create();

        // Create orders with products
        $user->orders()->createMany([
            [
                'total' => 199.99,
                'status' => 'completed',
                'created_at' => now()->subDays(3),
                'products' => json_encode([
                    Product::find(1)->toArray(),
                    Product::find(2)->toArray()
                ])
            ],
            [
                'total' => 299.99,
                'status' => 'processing',
                'created_at' => now()->subDay(),
                'products' => json_encode([
                    Product::find(3)->toArray()
                ])
            ]
        ]);
    }
}
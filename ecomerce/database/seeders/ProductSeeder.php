<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Product 1',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'This is a description for product 1',
            'photo' => 'img/shoes_1.jpg',
        
            
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 200.00,
            'stock' => 30,
            'description' => 'This is a description for product 2',
            'photo' => 'img/shoes_2.jpg',
            
        ]);

        Product::create([
            'name' => 'Product 3',
            'price' => 150.00,
            'stock' => 20,
            'description' => 'This is a description for product 3',
            'photo' => 'img/shoes_3.png',
            
        ]);

        Product::create([
            'name' => 'Product 4',
            'price' => 300.00,
            'stock' => 10,
            'description' => 'This is a description for product 4',
            'photo' => 'img/shoes_4.png',
            
        ]);

        Product::create([
            'name' => 'Product 5',
            'price' => 250.00,
            'stock' => 5,
            'description' => 'This is a description for product 5',
            'photo' => 'img/shoes_7.png',
            
        ]);
    }
}

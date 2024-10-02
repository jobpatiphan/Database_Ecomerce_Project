<?php

<<<<<<< HEAD
namespace Database\Seeder;
=======
namespace Database\Seeders;
>>>>>>> 20f385a06f7e39ed20b45315ca68a97227a90d65

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
<<<<<<< HEAD
            'description' => 'Description here.',
            'photo' => 'img/shoe_1.png'
=======
            'description' => 'This is a description for product 1',
            'photo' => 'img/shoes_1.jpg',
        
            
>>>>>>> 20f385a06f7e39ed20b45315ca68a97227a90d65
        ]);

        Product::create([
            'name' => 'Product 2',
<<<<<<< HEAD
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_2.png'
=======
            'price' => 200.00,
            'stock' => 30,
            'description' => 'This is a description for product 2',
            'photo' => 'img/shoes_2.jpg',
            
>>>>>>> 20f385a06f7e39ed20b45315ca68a97227a90d65
        ]);

        Product::create([
            'name' => 'Product 3',
<<<<<<< HEAD
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_3.png'
=======
            'price' => 150.00,
            'stock' => 20,
            'description' => 'This is a description for product 3',
            'photo' => 'img/shoes_3.png',
            
>>>>>>> 20f385a06f7e39ed20b45315ca68a97227a90d65
        ]);

        Product::create([
            'name' => 'Product 4',
<<<<<<< HEAD
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_4.png'
=======
            'price' => 300.00,
            'stock' => 10,
            'description' => 'This is a description for product 4',
            'photo' => 'img/shoes_4.png',
            
>>>>>>> 20f385a06f7e39ed20b45315ca68a97227a90d65
        ]);

        Product::create([
            'name' => 'Product 5',
<<<<<<< HEAD
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_5.webp'
        ]);

        Product::create([
            'name' => 'Product 6',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_6.webp'
        ]);

        Product::create([
            'name' => 'Product 7',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_7.png'
        ]);

        Product::create([
            'name' => 'Product 8',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_8.png'
        ]);

        Product::create([
            'name' => 'Product 9',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_9.png'
        ]);

        Product::create([
            'name' => 'Product 10',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_10.png'
        ]);

        Product::create([
            'name' => 'Product 11',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_11.png'
        ]);

        Product::create([
            'name' => 'Product 12',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_12.png'
        ]);

        Product::create([
            'name' => 'Product 13',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_13.png'
        ]);

        Product::create([
            'name' => 'Product 14',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_14.png'
        ]);

        Product::create([
            'name' => 'Product 15',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_15.png'
        ]);

        Product::create([
            'name' => 'Product 16',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_16.png'
        ]);

        Product::create([
            'name' => 'Product 17',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_17.png'
        ]);

        Product::create([
            'name' => 'Product 18',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_18.png'
        ]);

        Product::create([
            'name' => 'Product 19',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoe_19.png'
=======
            'price' => 250.00,
            'stock' => 5,
            'description' => 'This is a description for product 5',
            'photo' => 'img/shoes_7.png',
            
>>>>>>> 20f385a06f7e39ed20b45315ca68a97227a90d65
        ]);
    }
}

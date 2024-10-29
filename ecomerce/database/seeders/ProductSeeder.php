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
            'name' => 'Cyber Pulse High-Tops',
            'price' => 199.99,
            'stock' => 59,
            'description' => 'These appear to be high-top futuristic sneakers with LED or light-up elements, featuring a cyberpunk/sci-fi aesthetic. The shoes are predominantly white/mint colored with glowing turquoise accent lights along the sole, midsole, and upper design elements. They also have some yellow lighting accents. They appear to be athletic or lifestyle sneakers with a chunky, tech-forward design that would fit right into a cyberpunk or future-tech fashion style.',
            'photo' => 'img/shoes_1.jpg'
        ]);

        Product::create([
            'name' => 'Product 2',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_2.jpg'
        ]);

        Product::create([
            'name' => 'Product 3',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_3.png'
        ]);

        Product::create([
            'name' => 'Product 4',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_4.png'
        ]);

        Product::create([
            'name' => 'Product 5',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_5.webp'
        ]);

        Product::create([
            'name' => 'Product 6',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_6.webp'
        ]);

        Product::create([
            'name' => 'Product 7',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_7.png'
        ]);

        Product::create([
            'name' => 'Product 8',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_8.png'
        ]);

        Product::create([
            'name' => 'Product 9',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_9.png'
        ]);

        Product::create([
            'name' => 'Product 10',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_10.png'
        ]);

        Product::create([
            'name' => 'Product 11',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_11.jpg'
        ]);

        Product::create([
            'name' => 'Product 12',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_12.jpg'
        ]);

        Product::create([
            'name' => 'Product 13',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_13.jpg'
        ]);

        Product::create([
            'name' => 'Product 14',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_14.png'
        ]);

        Product::create([
            'name' => 'Product 15',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_15.png'
        ]);

        Product::create([
            'name' => 'Product 16',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_16.png'
        ]);

        Product::create([
            'name' => 'Product 17',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_17.png'
        ]);

        Product::create([
            'name' => 'Product 18',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_18.jpg'
        ]);

        Product::create([
            'name' => 'Product 19',
            'price' => 100.00,
            'stock' => 50,
            'description' => 'Description here.',
            'photo' => 'img/shoes_19.png'
        ]);
    }
}

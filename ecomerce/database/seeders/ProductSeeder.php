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
            'stock' => 226,
            'description' => 'These appear to be high-top futuristic sneakers with LED or light-up elements, featuring a cyberpunk/sci-fi aesthetic. The shoes are predominantly white/mint colored with glowing turquoise accent lights along the sole, midsole, and upper design elements. They also have some yellow lighting accents. They appear to be athletic or lifestyle sneakers with a chunky, tech-forward design that would fit right into a cyberpunk or future-tech fashion style.',
            'photo' => 'products/shoes_1.jpg'
        ]);

        Product::create([
            'name' => 'Nike Adapt BB 2.0.',
            'price' => 350.00,
            'stock' => 134,
            'description' => 'The Nike Adapt BB 2.0 is a high-top basketball shoe that adapts to your foot with the touch of a button. It features a self-lacing system that allows you to customize the fit to your liking. The shoe also has a responsive Zoom Air unit in the heel and forefoot for maximum comfort and cushioning.',
            'photo' => 'products/shoes_2.jpg'
        ]);

        Product::create([
            'name' => 'Converse Chuck Taylor All Star Classic Ox "Soccer Dot"',
            'price' => 55.00,
            'stock' => 707,
            'description' => 'The classic Converse Chuck Taylor All Star Classic Ox gets a playful makeover with the "Soccer Dot" design. This low-top sneaker features a white canvas upper covered in colorful soccer ball and dot patterns, a vulcanized rubber sole, and the classic Chuck Taylor All Star branding on the ankle patch.',
            'photo' => 'products/shoes_3.png'
        ]);

        Product::create([
            'name' => 'Converse Chuck Taylor All Star Classic Ox',
            'price' => 55.00,
            'stock' => 286,
            'description' => 'The iconic Converse Chuck Taylor All Star Classic Ox in a vibrant red color. This low-top sneaker features a durable canvas upper, a vulcanized rubber sole, and the classic Chuck Taylor All Star branding on the ankle patch.',
            'photo' => 'products/shoes_4.png'
        ]);

        Product::create([
            'name' => 'Nike Air Jordan 5 Retro "Raging Bull"',
            'price' => 225.00,
            'stock' => 317,
            'description' => 'The Nike Air Jordan 5 Retro "Raging Bull" is a re-release of the iconic 1990 basketball shoe. This high-top sneaker features a white leather upper with red and blue accents, a visible Air Max unit in the heel, and a reflective tongue.',
            'photo' => 'products/shoes_5.webp'
        ]);

        Product::create([
            'name' => 'Nike ISPA React Flyknit',
            'price' => 180.00,
            'stock' => 141,
            'description' => 'The Nike ISPA React Flyknit is a futuristic sneaker designed for urban exploration. This low-top shoe features a breathable Flyknit upper with a unique lacing system, a responsive React foam midsole, and a durable rubber outsole. The shoe also features a bold lime green colorway that adds a pop of color to any outfit.',
            'photo' => 'products/shoes_6.webp'
        ]);

        Product::create([
            'name' => 'Nike Air Force 1 High "Pastel Dream"',
            'price' => 130.00,
            'stock' => 67,
            'description' => 'Description here.',
            'photo' => 'products/shoes_7.png'
        ]);

        Product::create([
            'name' => 'adidas Adizero X',
            'price' => 150.00,
            'stock' => 323,
            'description' => 'The adidas Adizero X is a lightweight and responsive running shoe designed for speed and comfort. This sleek sneaker features a breathable mesh upper, a supportive midfoot cage, and a responsive Lightstrike Pro midsole for maximum energy return. The bold yellow and white colorway adds a touch of style to this high-performance running shoe.',
            'photo' => 'products/shoes_8.png'
        ]);

        Product::create([
            'name' => 'Air Jordan 2 "Quai 54"',
            'price' => 225.00,
            'stock' => 473,
            'description' => 'The Air Jordan 2 "Quai 54" is a vibrant and playful take on the classic basketball shoe. This mid-top sneaker features a white leather upper with colorful accents, a visible Air unit in the heel, and a unique strap design. Inspired by the Quai 54 streetball tournament in Paris, this shoe is perfect for those who want to stand out on and off the court.',
            'photo' => 'products/shoes_9.png'
        ]);

        Product::create([
            'name' => 'Futuristic Glow-Up Sneakers',
            'price' => 129.99,
            'stock' => 106,
            'description' => 'Step into the future with these futuristic glow-up sneakers! These high-top sneakers are designed with a unique, chunky silhouette and a vibrant color palette. The shoe features a light-up sole that changes colors with every step, making it perfect for nighttime adventures. The adjustable strap and lace-up closure ensure a comfortable and secure fit.',
            'photo' => 'products/shoes_11.jpg'
        ]);

        Product::create([
            'name' => 'CyberPulse High-Tops',
            'price' => 149.99,
            'stock' => 109,
            'description' => 'Step into the future of footwear with the CyberPulse High-Tops. These futuristic sneakers feature a bold, chunky design with a mix of white leather and vibrant color accents. The highlight of these shoes is the integrated LED lights that illuminate the sole, creating a mesmerizing light show with every step. Perfect for those who want to make a statement and embrace cutting-edge style.',
            'photo' => 'products/shoes_12.jpg'
        ]);

        Product::create([
            'name' => 'NICZLANCA Futuristic LED Sneakers',
            'price' => 199.99,
            'stock' => 387,
            'description' => 'Step into the future with the NICZLANCA Futuristic LED Sneakers. These high-top sneakers are designed with a sleek, futuristic silhouette and a range of features that will turn heads. The shoes feature a built-in LED light system that illuminates the sole, creating a mesmerizing light show with every step. The adjustable straps and lace-up closure ensure a comfortable and secure fit.',
            'photo' => 'products/shoes_13.jpg'
        ]);

        Product::create([
            'name' => 'ASICS Baby Sneaker',
            'price' => 35.00,
            'stock' => 16,
            'description' => 'These adorable ASICS baby sneakers are perfect for your little one first steps. The soft, flexible sole provides comfort and support, while the cute floral print adds a touch of style. The easy-to-use lace-up closure ensures a secure fit.',
            'photo' => 'products/shoes_14.png'
        ]);

        Product::create([
            'name' => 'SHEE Pastel Dream Sneakers',
            'price' => 69.99,
            'stock' => 91,
            'description' => 'Step into a world of sweetness with the SHEE Pastel Dream Sneakers. These adorable sneakers feature a pastel color palette of mint green, baby blue, and pink, making them perfect for adding a touch of whimsy to any outfit. The chunky sole provides comfort and support, while the lace-up closure ensures a secure fit.',
            'photo' => 'products/shoes_15.png'
        ]);

        Product::create([
            'name' => 'CyberStride High-Tops',
            'price' => 179.99,
            'stock' => 10,
            'description' => 'Step into the future of footwear with the CyberStride High-Tops. These futuristic sneakers feature a sleek, high-top design with a mix of white leather and vibrant neon accents. The shoes are equipped with advanced technology, including a built-in power cell that provides energy for the illuminated sole and other features. Perfect for those who want to embrace cutting-edge style and performance.',
            'photo' => 'products/shoes_16.png'
        ]);

        Product::create([
            'name' => 'Neon Pulse Sneakers',
            'price' => 99.99,
            'stock' => 311,
            'description' => 'Light up your world with the Neon Pulse Sneakers! These eye-catching sneakers feature a vibrant color scheme and a chunky sole with built-in LED lights that change color with every step. The comfortable design and adjustable laces make them perfect for all-day wear.',
            'photo' => 'products/shoes_17.png'
        ]);

        Product::create([
            'name' => 'AirStrike Stiletto Sneakers',
            'price' => 6169.99,
            'stock' => 673,
            'description' => 'The AirStrike Stiletto Sneakers combine the bold athletic style of high-top sneakers with the edgy sophistication of high heels. These futuristic shoes feature a sleek white body adorned with the classic swoosh logo, metallic accents, and neon LED lights embedded in the sole, giving them a cyberpunk flair. The chrome buckle detail and high stiletto heel, highlighted with vibrant pink lights, make these a standout piece for those looking to make a bold fashion statement. Perfect for high-fashion events or club scenes, these shoes redefine modern footwear with their unique blend of sport and high-glam aesthetics.',
            'photo' => 'products/shoes_18.jpg'
        ]);

        Product::create([
            'name' => 'Pink Perfect',
            'price' => 39.99,
            'stock' => 388,
            'description' => 'These pink sneakers are the perfect addition to your little girl wardrobe. The velcro closure makes them easy to put on and take off, while the soft fabric and cushioned sole provide all-day comfort. The playful design will make her smile, and the pink color is sure to make her stand out.',
            'photo' => 'products/shoes_19.png'
        ]);
    }
}

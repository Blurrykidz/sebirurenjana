<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        $categories = ['Minuman', 'Main Course', 'Makanan', 'Snack', 'Dessert', 'Sweets', 'Salad', 'Appetizer'];
        $satuanList = ['1', '2', '3', '4'];

        foreach (range(1, 50) as $i) {
            $price = $faker->numberBetween(10000, 500000);
            $specialPrice = $faker->boolean(50) ? $faker->numberBetween(5000, $price - 1000) : null;

            Product::create([
                'name'          => $faker->words(2, true),
                'kode'          => strtoupper($faker->bothify('PRD###??')),
                'category'      => $faker->randomElement($categories),
                'price'         => $price,
                'special_price' => $specialPrice,
                'stock'         => $faker->numberBetween(0, 100),
                'satuan'        => $faker->randomElement($satuanList),
                'image'         => $faker->imageUrl(640, 480, 'product', true),
                'description'   => $faker->sentence(),
                'active'        => $faker->boolean(90) ? 1 : 0,
            ]);
        }
    }

}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Product;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Water Colour
        $product = new Product;
        $product->category_id = 4;
        $product->product_name = 'Dog Art';
        $product->product_code = 'PAINT0001';
        $product->description = $faker->sentence;
        $product->price = $faker->numberBetween(1,100);
        $product->image = '27441.jpg';
        $product->save();

        // Oil Painting
        $product = new Product;
        $product->category_id = 5;
        $product->product_name = 'Flower Art';
        $product->product_code = 'PAINT0002';
        $product->description = $faker->sentence;
        $product->price = $faker->numberBetween(1,100);
        $product->image = '19004.jpg';
        $product->save();

        //Pencil
        $product = new Product;
        $product->category_id = 6;
        $product->product_name = 'Logan';
        $product->product_code = 'DRAW0001';
        $product->description = $faker->sentence;
        $product->price = $faker->numberBetween(1,100);
        $product->image = '51964.jpg';
        $product->save();

        $product = new Product;
        $product->category_id = 6;
        $product->product_name = 'Dog';
        $product->product_code = 'DRAW0002';
        $product->description = $faker->sentence;
        $product->price = $faker->numberBetween(1,100);
        $product->image = '77772.jpg';
        $product->save();

    }
}

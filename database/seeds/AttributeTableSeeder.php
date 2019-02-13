<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Product;
use App\ProductsAttribute;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Logan Details
        $attribute = new ProductsAttribute;
        $attribute->product_id = 3;
        $attribute->sku = 'SKU0001';
        $attribute->size = '10x24';
        $attribute->price = $faker->numberBetween(1,100);
        $attribute->stock = $faker->numberBetween(1,100);
        $attribute->save();

        $attribute = new ProductsAttribute;
        $attribute->product_id = 3;
        $attribute->sku = 'SKU0002';
        $attribute->size = '50x100';
        $attribute->price = $faker->numberBetween(1,100);
        $attribute->stock = $faker->numberBetween(1,100);
        $attribute->save();

        $attribute = new ProductsAttribute;
        $attribute->product_id = 3;
        $attribute->sku = 'SKU0003';
        $attribute->size = '100x200';
        $attribute->price = $faker->numberBetween(1,100);
        $attribute->stock = $faker->numberBetween(1,100);
        $attribute->save();
    }
}

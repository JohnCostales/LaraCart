<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Main Category
        $category = new Category;
        $category->parent_id = 0;
        $category->name = 'Painting';
        $category->description = $faker->sentence;
        $category->url = 'painting';
        $category->save();

        $category = new Category;
        $category->parent_id = 0;
        $category->name = 'Drawing & Illustraion';
        $category->description = $faker->sentence;
        $category->url = 'drawing-and-illustration';
        $category->save();

        // Painting Category
        $category = new Category;
        $category->parent_id = 1;
        $category->name = 'Acrylic';
        $category->description = $faker->sentence;
        $category->url = 'painting-acrylic';
        $category->save();

        $category = new Category;
        $category->parent_id = 1;
        $category->name = 'Watercolour';
        $category->description = $faker->sentence;
        $category->url = 'painting-watercolour';
        $category->save();

        $category = new Category;
        $category->parent_id = 1;
        $category->name = 'Oil';
        $category->description = $faker->sentence;
        $category->url = 'painting-oil';
        $category->save();

        // Drawings
        $category = new Category;
        $category->parent_id = 2;
        $category->name = 'Pencil';
        $category->description = $faker->sentence;
        $category->url = 'drawing-and-illustration-pencil';
        $category->save();
    }
}

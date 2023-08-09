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
    public function run(): void
    {
        for ($i=0; $i<100  ; $i++) { 
            $product = new Product;
            $faker = Faker::create();
            $product->name = $faker->word;
            $product->price = 100;
            $product->description = 'This is a product';
            $product->category_id = 1;
            $product->image = '\assets\products\light-bulb.jpg';

            $product->save();
        }
        
    }
}

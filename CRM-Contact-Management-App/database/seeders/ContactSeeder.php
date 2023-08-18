<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for($i=0; $i < 10; $i++){
            Contact::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'company' => $faker->company,
                'image' => $faker->image('public/storage/images',200,280, null, false),
                'user_id' => 1,
                'tag_id' => rand(2, 3),
            ]);

        }   
    }
}

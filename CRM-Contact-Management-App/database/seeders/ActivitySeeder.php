<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Activity;



class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 0; $i < 20; $i++) {
            Activity::create([
                'activity' => $faker->randomElement(['Call', 'Email', 'Meeting', 'Lunch', 'Coffee', 'Drinks', 'Dinner', 'Other']),
                'status' => rand(0, 1),
                'contact_id' => rand(1, 20),
            ]);
        }
    }
}

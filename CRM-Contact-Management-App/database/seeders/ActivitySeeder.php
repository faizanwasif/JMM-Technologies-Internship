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
        for($i = 0; $i < 50; $i++) {
            Activity::create([
                'activity' => $faker->name,
                'status' => rand(0, 1),
                'contact_id' => $faker->numberBetween(1, 50),
            ]);
        }
    }
}

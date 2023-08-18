<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Note;


class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i < 20; $i++) {
            Note::create([
                'title' => $faker->sentence(3),
                'content' => $faker->paragraph(3),
                'contact_id' => rand(1, 10),
            ]);
        }
    }
}

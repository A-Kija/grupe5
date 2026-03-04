<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Farm;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i = 0; $i < 222; $i++) {
            DB::table('farms')->insert([
                'animal' => Farm::ANIMALS[rand(0, count(Farm::ANIMALS) - 1)],
                'weight' => rand(50, 4000) / 100, // rand 3875 => 38.75
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Farm;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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

        $tracks = ['Volvo', 'Scania', 'MAN', 'Mercedes', 'DAF', 'Iveco', 'Renault', 'Ford', 'GMC', 'Freightliner', 'Kamaz'];
        foreach($tracks as $track) {
            DB::table('truck_brands')->insert([
                'name' => $track,
            ]);
        }

        // Add 112 trucks
        for($i = 0; $i < 112; $i++) {
            DB::table('trucks')->insert([
                'color' => ['red', 'blue', 'green', 'black', 'white', 'yellow', 'multicolor', 'striped'][rand(0, 7)],
                'power' => rand(100, 1000),
                'year' => rand(1990, 2026),
                'truck_brand_id' => rand(1, count($tracks)),
            ]);
        }

        /* 
            $color = ['red', 'blue', 'green', 'black', 'white', 'yellow', 'multicolor', 'striped'][rand(0, 7)];
             
            arba

            $mas = ['red', 'blue', 'green', 'black', 'white', 'yellow', 'multicolor', 'striped'];
            $ind = rand(0, 7);
            $color = $mas[$ind];
         */

            $faker = Faker::create();
            for($i = 0; $i < 123; $i++) {
                DB::table('tags')->insert([
                    'name' => $faker->unique()->word(),
                ]);
            }





    }
}

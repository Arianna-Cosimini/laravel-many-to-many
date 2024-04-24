<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies=[
            "Html",
            "Css",
            "Javascript",
            "Vue.js",
            "Php",
            "Laravel",
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->technology = $technology;
            $newTechnology->save();
        }
    }
}

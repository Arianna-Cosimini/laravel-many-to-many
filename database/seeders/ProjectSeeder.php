<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->name();
            $newProject->description = $faker->text(100);
            $newProject->thumb = $faker->imageUrl(360, 360, 'animals', 'true');
            $newProject->code = $faker->words(1, true);
            $newProject->link = 'uploads/project-' . $faker->randomNumber() . '.pdf';
            $newProject->save();
        }
    }
}

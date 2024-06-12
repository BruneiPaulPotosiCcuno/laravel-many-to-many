<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newProject = new Project();
            $newProject->name = $faker->domainName();
            $newProject->slug = Str::slug($newProject->name, '_');
            $newProject->client_name = $faker->company();
            $newProject->summary = $faker->text(600);
            $newProject->save();
        }
    }
}

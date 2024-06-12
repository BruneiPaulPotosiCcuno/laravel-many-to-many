<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['npm', 'node', 'git', 'json', 'exe', 'env'];
        foreach ($technologies as $technologyName) {
            $newTechnology = new Technology();
            $newTechnology->name = $technologyName;
            $newTechnology->slug = Str::slug($newTechnology->name, '_');
            $newTechnology->save();
        }
    }
}

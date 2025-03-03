<?php

namespace Database\Seeders;

use App\Models\Students;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Students::factory(1000)->create();

        // Students::create([
        //     'name' => 'female 1',
        //     'age' => 25,
        //     'gender' => 'female',
        // ]);

        // Students::create([
        //     'name' => 'male 1',
        //     'age' => 22,
        //     'gender' => 'male',
        // ]);
    }
}
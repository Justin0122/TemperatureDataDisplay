<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create([
            'name' => 'Test User',
            'email' => 'test@test.nl',
        ]);

        \App\Models\User::factory(10)->create();

        //        \App\Models\Sensor::factory(10)->create();
        //        \App\Models\Temperature::factory(1000)->create();
    }
}

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
        // \App\Models\User::factory(10)->create();
        $this->call([
            Actor_filmSeeder::class,
            ActorSeeder::class,
            FilmSeeder::class,
            LanguageSeeder::class,
            RoleSeeder::class,
        ]);        
    }
}

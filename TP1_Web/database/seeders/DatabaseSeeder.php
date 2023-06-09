<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use App\Models\Actor;
Use App\Models\Critic;
Use App\Models\Film;
Use App\Models\Language;
Use App\Models\Role;
Use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ActorSeeder::class,
            LanguageSeeder::class,
            RoleSeeder::class,
            FilmSeeder::class,
            Actor_filmSeeder::class,
        ]);        
        User::factory(50)->has(Critic::factory(1))-> create();
    }
}

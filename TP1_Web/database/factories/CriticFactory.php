<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Critic>
 */
class CriticFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create();

        return [            
            'film_id' => $faker->randomDigitNotZero(), //Pour s'assurer que certains films ai plus d'une critique
            'score' => $faker->numberBetween(1,5), 
            'comment' => $faker->text(100), 
            'created_at' => now(),
            'updated_at' => null,
        ];
    }
}

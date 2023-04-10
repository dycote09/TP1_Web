<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'password' => $faker->text(8),
            'email' => $faker->safeEmail(),
            'last_name' => $faker->lastName(),
            'first_name' => $faker->firstName(),
            'role_id' => $faker->numberBetween(1,2),
            'rememberToken' => Str::random(10),
            'created_at' => now(),
            'updated_at' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName,
            'email' => fake()->safeEmail(),
            'username' => fake()->userName,
            'role_id' => Role::create(['name' => 'bibliotekar']),
            'email_verified_at' => now(),
            'password' => '$2y$10$rqOUfrPxmcjIYDctSZHy4O.KTPgTDvRo0c3chZIc8gikGsq9V2gFW', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}

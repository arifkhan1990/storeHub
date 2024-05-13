<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;


class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'store_id' => $this->faker->unique()->numberBetween(1, 50),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'profile_pic' => $this->faker->imageUrl(),
            'active' => $this->faker->boolean(80),
            'ban' => $this->faker->boolean(10),
            'soft_delete' => $this->faker->boolean(5),
            'nid' => $this->faker->numerify('#############'),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

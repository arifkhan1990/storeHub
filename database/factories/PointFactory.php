<?php

namespace Database\Factories;

use App\Models\Point;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointFactory extends Factory
{
    protected $model = Point::class;

    public function definition()
    {
        return [
            'point_title' => $this->faker->sentence,
            'total_point' => $this->faker->numberBetween(0, 1000),
            'current_point' => $this->faker->numberBetween(0, 1000),
            'use_point' => $this->faker->numberBetween(0, 1000),
            'account_id' => $this->faker->numberBetween(1, 100),
            'point_code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'point_status' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

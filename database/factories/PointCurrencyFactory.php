<?php

namespace Database\Factories;

use App\Models\PointCurrency;
use Illuminate\Database\Eloquent\Factories\Factory;

class PointCurrencyFactory extends Factory
{
    protected $model = PointCurrency::class;

    public function definition()
    {
        return [
            'point_id' => $this->faker->numberBetween(1, 100),
            'point_amount' => $this->faker->numberBetween(0, 1000),
            'currency_amount' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

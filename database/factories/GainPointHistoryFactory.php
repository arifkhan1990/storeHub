<?php

namespace Database\Factories;

use App\Models\GainPointHistory;
use Illuminate\Database\Eloquent\Factories\Factory;

class GainPointHistoryFactory extends Factory
{
    protected $model = GainPointHistory::class;

    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 100),
            'gain_point' => $this->faker->numberBetween(0, 100),
            'point_id' => $this->faker->numberBetween(1, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

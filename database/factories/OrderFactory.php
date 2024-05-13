<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'order_code' => $this->faker->unique()->uuid,
            'store_id' => $this->faker->numberBetween(1, 50),
            'payment_id' => $this->faker->numberBetween(1, 100),
            'order_details_id' => $this->faker->numberBetween(1, 100),
            'total' => $this->faker->randomNumber(4),
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'coupon_id' => $this->faker->numberBetween(1, 100),
            'delivery_id' => $this->faker->numberBetween(1, 100),
            'account_id' => $this->faker->numberBetween(1, 100),
            'order_status' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

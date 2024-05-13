<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'coupon_code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'store_id' => $this->faker->numberBetween(1, 50),
            'benefit' => [], // Define benefit data structure as needed
            'coupon_expire_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'coupon_active_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'coupon_status' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

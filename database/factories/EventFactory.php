<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition()
    {
        return [
            'payment_code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'store_id' => $this->faker->numberBetween(1, 50),
            'payment_type' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Cash', 'Bank Transfer']),
            'payment_details' => [], // Define payment_details data structure as needed
            'payment_status' => $this->faker->randomElement([0, 1]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

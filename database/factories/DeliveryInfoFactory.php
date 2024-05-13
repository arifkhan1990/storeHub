<?php

namespace Database\Factories;

use App\Models\DeliveryInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryInfoFactory extends Factory
{
    protected $model = DeliveryInfo::class;

    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 100),
            'delivery_location' => ['latitude' => $this->faker->latitude, 'longitude' => $this->faker->longitude],
            'delivery_receiver' => $this->faker->name,
            'receiver_phone' => $this->faker->phoneNumber,
            'sending_time' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'receiving_time' => $this->faker->dateTimeBetween('now', '+1 year'),
            'delivery_status' => $this->faker->randomElement([0, 1]),
            'delivery_code' => $this->faker->unique()->uuid,
            'delivery_service_provider_id' => $this->faker->numberBetween(1, 100),
            'delivery_charge' => $this->faker->randomFloat(2, 0, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

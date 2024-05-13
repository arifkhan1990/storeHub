<?php

namespace Database\Factories;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    protected $model = Vendor::class;

    public function definition()
    {
        return [
            'store_id' => $this->faker->numberBetween(1, 50),
            'vendor_name' => $this->faker->company,
            'vendor_code' => $this->faker->unique()->slug(2),
            'vendor_desc' => $this->faker->paragraph,
            'vendor_pic' => $this->faker->imageUrl(),
            'vendor_details' => $this->faker->sentence,
            'vendor_status' => $this->faker->boolean(80),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition()
    {
        return [
            'store_code' => $this->faker->unique()->word,
            'store_name' => $this->faker->unique()->company,
            'store_type' => $this->faker->randomElement(['Retail', 'Online', 'Wholesale']),
            'store_desc' => $this->faker->paragraph,
            'created_by' => $this->faker->numberBetween(1, 100),
            'store_email' => [$this->faker->unique()->safeEmail],
            'store_physical_address' => [$this->faker->address],
            'store_phone' => [$this->faker->phoneNumber],
            'fb_page_link' => [$this->faker->url],
            'instagram_page_link' => [$this->faker->url],
            'tiktok_page_link' => [$this->faker->url],
            'linkedin_page_link' => [$this->faker->url],
            'store_bio' => $this->faker->paragraph,
            'business_tin' => $this->faker->numerify('#############'),
            'owner_details' => $this->faker->sentence,
            'store_status' => $this->faker->boolean(80),
            'store_pic' => $this->faker->imageUrl(),
            'priority' => $this->faker->numberBetween(0, 10),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

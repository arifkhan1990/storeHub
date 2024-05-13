<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'brand_name' => $this->faker->word,
            'brand_code' => $this->faker->unique()->slug(2),
            'brand_desc' => $this->faker->paragraph,
            'brand_pic' => $this->faker->imageUrl(),
            'brand_type' => $this->faker->randomElement(['Fashion', 'Electronics', 'Home']),
            'brand_details' => $this->faker->sentence,
            'brand_status' => $this->faker->boolean(80),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

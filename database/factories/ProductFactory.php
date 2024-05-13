<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'store_id' => $this->faker->numberBetween(1, 50),
            'category_id' => $this->faker->numberBetween(1, 10),
            'brand_id' => $this->faker->numberBetween(1, 10),
            'vendor_id' => $this->faker->numberBetween(1, 50),
            'product_name' => $this->faker->word,
            'product_code' => $this->faker->unique()->slug(2),
            'product_short_desc' => $this->faker->sentence,
            'product_pic' => $this->faker->imageUrl(),
            'product_details_id' => $this->faker->numberBetween(1, 100),
            'product_status' => $this->faker->boolean(80),
            'attributes' => [],
            'attributes_options' => [],
            'stock' => $this->faker->numberBetween(0, 100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

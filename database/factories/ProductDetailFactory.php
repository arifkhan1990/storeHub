<?php

namespace Database\Factories;

use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductDetailFactory extends Factory
{
    protected $model = ProductDetail::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 100),
            'product_details_code' => $this->faker->unique()->slug(2),
            'product_desc' => $this->faker->paragraph,
            'product_pic' => [],
            'product_color' => [],
            'product_size' => [],
            'product_price' => [],
            'product_video' => $this->faker->url,
            'product_status' => $this->faker->boolean(80),
            'variants' => [],
            'stock' => $this->faker->numberBetween(0, 100),
            'stock_status' => $this->faker->boolean(80),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

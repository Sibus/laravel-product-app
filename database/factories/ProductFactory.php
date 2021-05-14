<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $statuses = [
            Product::STATUS_AVAILABLE,
            Product::STATUS_UNAVAILABLE,
        ];

        return [
            'art' => $this->faker->unique()->regexify('[A-Za-z0-9]{20}'),
            'name' => 'Product #' . $this->faker->unique()->randomNumber(),
            'status' => $this->faker->randomElement($statuses),
            'data' => [
                'color' => $this->faker->colorName,
                'size' => $this->faker->randomNumber(),
            ],
        ];
    }
}

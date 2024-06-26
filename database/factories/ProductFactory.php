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
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'image_url' => $this->faker->imageUrl(640, 480, 'products', true, 'Faker'),
            'quantity' => $this->faker->numberBetween(1, 100)  // Ensure this line is included
        ];
    }
}


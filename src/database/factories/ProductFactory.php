<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Measure;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(1, TRUE),
            'model' => $this->faker->words(1, TRUE),
            'description' => $this->faker->text(30),
            'measure' => optional(Measure::inRandomOrder()->first())->name,
            'quantity' => $this->faker->randomDigit(),
            'price' => $this->faker->numberBetween(1, 1000),
            'delivery_term' => $this->faker->numberBetween(1, 10),
        ];
    }
}

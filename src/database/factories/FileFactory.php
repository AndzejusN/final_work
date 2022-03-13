<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'item_name' => $this->faker->words(1, TRUE),
            'item_type' => $this->faker->fileExtension(),
            'path' => 'storage/',
            'product_id' => optional(Product::inRandomOrder()->first())->id
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\InquiryState;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquiry>
 */
class InquiryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => optional(User::inRandomOrder()->first())->id,
            'product_id' => optional(Product::inRandomOrder()->first())->id,
            'inquiry_state' => optional(InquiryState::inRandomOrder()->first())->name,
        ];
    }
}

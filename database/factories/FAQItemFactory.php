<?php

namespace Database\Factories;

use App\Models\FAQItem;
use App\Models\FAQCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FAQItemFactory extends Factory
{
    protected $model = FAQItem::class;

    public function definition()
    {
        return [
            'f_a_q_category_id' => FAQCategory::factory(),
            'question' => $this->faker->sentence,
            'answer' => $this->faker->paragraph,
            // Add other fields as necessary
        ];
    }
}

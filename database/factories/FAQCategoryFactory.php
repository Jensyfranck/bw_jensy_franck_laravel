<?php

namespace Database\Factories;

use App\Models\FAQCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FAQCategoryFactory extends Factory
{
    protected $model = FAQCategory::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            // Add other fields as necessary
        ];
    }
}

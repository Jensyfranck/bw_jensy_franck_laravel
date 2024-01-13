<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQCategory;

class FAQCategorySeeder extends Seeder
{
    public function run()
    {
        FAQCategory::factory()->count(5)->create(); // Creates 5 FAQ categories
    }
}

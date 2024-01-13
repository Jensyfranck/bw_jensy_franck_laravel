<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQItem;

class FAQItemSeeder extends Seeder
{
    public function run()
    {
        FAQItem::factory()->count(20)->create(); // Creates 20 FAQ items
    }
}

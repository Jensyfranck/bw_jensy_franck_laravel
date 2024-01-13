<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // other fillable fields...
    ];

    public function faqItems()
    {
        return $this->hasMany(FAQItem::class, 'f_a_q_category_id');
    }

}

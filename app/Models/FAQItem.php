<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQItem extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(FAQCategory::class, 'f_a_q_category_id');
    }

    protected $fillable = [
        'f_a_q_category_id', 'question', 'answer'
    ];

}

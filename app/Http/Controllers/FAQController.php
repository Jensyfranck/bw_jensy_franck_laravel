<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $faqCategories = FAQCategory::with('faqItems')->get();
        return view('faqs.index', compact('faqCategories'));
    }

}

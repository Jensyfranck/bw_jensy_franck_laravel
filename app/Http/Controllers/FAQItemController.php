<?php

namespace App\Http\Controllers;

use App\Models\FAQItem;
use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQItemController extends Controller
{
    // Display a listing of FAQ items
    public function index()
    {
        $items = FAQItem::with('category')->get();
        return view('faqs.index', compact('items'));
    }

    // Show the form for creating a new FAQ item
    public function create()
    {
        $categories = FAQCategory::all();
        return view('faqs-items.create', compact('categories'));
    }

    // Store a newly created FAQ item in storage
    public function store(Request $request)
    {
        $request->validate([
            'f_a_q_category_id' => 'required|exists:f_a_q_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        FAQItem::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ Item created successfully.');
    }

    // Show the form for editing the specified FAQ item
    public function edit($id)
    {
        $item = FAQItem::findOrFail($id);
        $categories = FAQCategory::all();
        return view('faqs-items.edit', compact('item', 'categories'));
    }

    // Update the specified FAQ item in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'f_a_q_category_id' => 'required|exists:f_a_q_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string'
        ]);

        $item = FAQItem::findOrFail($id);
        $item->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ Item updated successfully.');
    }

    // Remove the specified FAQ item from storage
    public function destroy($id)
    {
        $item = FAQItem::findOrFail($id);
        $item->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ Item deleted successfully.');
    }
}

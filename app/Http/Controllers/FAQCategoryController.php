<?php

namespace App\Http\Controllers;

use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQCategoryController extends Controller
{
    // Display a listing of FAQ categories
    public function index()
    {
        $categories = FAQCategory::all();
        return view('faqs.index', compact('categories'));
    }

    // Show the form for creating a new FAQ category
    public function create()
    {
        return view('faqs-categories.create');
    }

    // Store a newly created FAQ category in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        FAQCategory::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ Category created successfully.');
    }

    // Show the form for editing the specified FAQ category
    public function edit($id)
    {
        $category = FAQCategory::findOrFail($id);
        return view('faqs-categories.edit', compact('category'));
    }

    // Update the specified FAQ category in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = FAQCategory::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ Category updated successfully.');
    }

    // Remove the specified FAQ category from storage
    public function destroy($id)
    {
        $category = FAQCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ Category deleted successfully.');
    }
}

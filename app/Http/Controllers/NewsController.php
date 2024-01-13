<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsItems = News::latest('published_at')->get(); // Fetch all news items ordered by 'published_at'
        return view('news.index', compact('newsItems')); // Pass them to the view
    }

    public function create() {
        return view('news.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'cover_image' => 'nullable|image|max:2048', // Example validation for an image file
            'published_at' => 'nullable|date', // Optional published date
        ]);

        // Handle the cover image upload
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('news_cover_images', 'public');
        }

        // Create and save the news item
        $newsItem = new News();
        $newsItem->title = $validatedData['title'];
        $newsItem->message = $validatedData['message'];
        $newsItem->cover_image = $coverImagePath;
        $newsItem->published_at = $validatedData['published_at'] ?? now(); // Set to current time if not provided

        $newsItem->save();

        // Redirect to a relevant page with a success message
        return redirect()->route('news.index')->with('success', 'News item created successfully');
    }

    public function show(News $news) {
        return view('news.show', compact('news'));
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);
        return view('news.edit', compact('newsItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $newsItem = News::findOrFail($id);

        if ($request->hasFile('cover_image')) {
            // Delete old image if exists and not a default
            if ($newsItem->cover_image && $newsItem->cover_image != 'default_image.jpg') {
                Storage::delete('public/news_cover_images/' . $newsItem->cover_image);
            }

            // Handle the cover image upload
            $coverImagePath = $request->file('cover_image')->store('news_cover_images', 'public');
            $newsItem->cover_image = $coverImagePath;
        }

        // Update other news item fields
        $newsItem->title = $request->input('title');
        $newsItem->message = $request->input('message');
        $newsItem->save();

        return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }

}

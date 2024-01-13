<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Display the posts on the dashboard
    public function index()
    {
        $posts = Post::with('likes')->get();
        return view('dashboard', compact('posts'));
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Auth::user()->posts()->create([
            'title' => $request->title,
            'message' => $request->message,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        if (Auth::id() !== $post->user_id && !Auth::user()->is_admin) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $post->update($request->only('title', 'message'));
        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id && !Auth::user()->is_admin) {
            abort(403);
        }

        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }
}

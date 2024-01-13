<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // Store a like for a post
    public function store(Request $request, Post $post)
    {
        // Check if the post is already liked by the user to prevent duplicate likes
        $like = $post->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            return redirect()->back()->with('error', 'You have already liked this post.');
        }

        $post->likes()->create([
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Post liked successfully.');
    }
}

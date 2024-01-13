<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['message' => 'required|string']);

        $comment = new Comment();
        $comment->message = $request->message;
        $comment->user_id = Auth::id();
        $post->comments()->save($comment);

        return back()->with('success', 'Comment added successfully.');
    }
}

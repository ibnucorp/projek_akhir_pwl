<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Fetch all posts
        $posts = Post::all();

        // Pass the posts data to the view
        return view('pages.home', compact('posts'));
    }
    /**
     * Store a new post in the database.
     */
    public function store(Request $request)
    {
        // Create a new post
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_url' => $request->input('image_url'),
            'goal_amount' => $request->input('goal_amount'),
            'current_amount' => $request->input('current_amount', 0), // Default to 0 if not provided
            'status' => $request->input('status'),
        ]);

        return redirect()->route('home')->with('success', 'Post created successfully!');
    }

    public function create()
    {
        return view('posts.create');
    }
}

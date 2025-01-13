<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
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

    public function index($id)
    {
        $post = Post::findOrFail($id);

        // Ambil data donator terkait post
        $donators = Donator::where('post_id', $id)
            ->with('user')
            ->latest()
            ->paginate(5); // Mengambil 5 data per halaman

        return view('pages.post', compact('post', 'donators'));
    }

    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function delete($id) {}
}

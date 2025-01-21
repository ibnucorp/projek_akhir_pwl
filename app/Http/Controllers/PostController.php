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
        $imagePath = $request->file('image_file')->store('images/donasi', 'public');
        // Create a new post
        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image_url' => $imagePath, // Save the image filename
            'goal_amount' => $request->input('goal_amount'),
            'current_amount' => $request->input('current_amount', 0), // Default to 0 if not provided
            'status' => $request->input('status'),
        ]);

        return redirect()->route('dashboard.showall')->with('success', 'Post created successfully!');
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

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Update the post
        $post->update($request->only([
            'title',
            'description',
            'image_url',
            'goal_amount',
            'current_amount',
            'status'
        ]));

        // Redirect with a success message
        return redirect()->route('dashboard.showall')->with('success', 'Post updated successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function delete($id)
    {

        $post = Post::findOrFail($id);

        // Soft delete the post
        $post->delete();

        // Delete associated donators
        Donator::where('post_id', $id)->delete();

        return redirect()->back()->with('success', 'Post and associated donators deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $post = Post::findOrFail($id);

        // Toggle the status between active and inactive
        $post->status = $post->status === 'active' ? 'inactive' : 'active';
        $post->save();

        return redirect()->back()->with('success', 'Post status has been updated.');
    }
}

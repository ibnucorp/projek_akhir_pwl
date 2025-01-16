<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data Post
        $posts = Post::where('status', 'active')->get();
        $donators = Donator::latest()->take(5)->get();

        return view('pages.home', compact('posts', 'donators'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data Post
        $posts = Post::all();

        return view('pages.home', ['posts' => $posts]);
    }
}

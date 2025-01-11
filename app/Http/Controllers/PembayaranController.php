<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index($id)
    {
        $post = Post::findOrFail($id);
        return view('pages.pembayaran', compact('post'));
    }
}

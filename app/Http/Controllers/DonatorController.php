<?php

namespace App\Http\Controllers;

use App\Models\Donator;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonatorController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
            'pesan' => 'nullable|string',
            'total_donasi' => 'required|numeric|min:1',
            'tipe_bayar' => 'required|string|in:gopay,dana,bca',
        ]);
        $post = Post::find($request->post_id);
        if (($post->current_amount + $request->total_donasi) > $post->goal_amount) {
            return redirect()->back()->withErrors(['error' => 'Donasi melebihi batas target.']);
        }
        if ($post) {
            $post->current_amount += $request->total_donasi;
            $post->save();
        }

        // Save the donator data
        Donator::create([
            'user_id' => $request->user_id, // Assuming the user is logged in
            'post_id' => $request->post_id, // Pass this as a hidden input in the form
            'pesan' => $request->pesan,
            'total_donasi' => $request->total_donasi,
            'tipe_bayar' => $request->tipe_bayar,
        ]);


        // Redirect back with a success message
        return redirect('/')->with('success', 'Terima kasih atas donasi Anda!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function posts()
    {
        $posts = Post::with('user')->latest()->paginate(5);

        return view('posts', compact('posts'));
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }
}

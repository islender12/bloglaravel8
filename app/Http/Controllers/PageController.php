<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function posts(): Renderable
    {
        $posts = Post::with('user:id,name')->latest()->paginate(5);
        // dd($posts);
        return view('posts', compact('posts'));
    }

    public function post(Post $post): Renderable
    {
        return view('post', compact('post'));
    }
}

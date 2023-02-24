<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Support\Renderable;

class PageController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function posts(): Renderable
    {
        $posts = $this->postRepository->all(5);
        // dd($posts);
        return view('posts', compact('posts'));
    }

    public function post(Post $post): Renderable
    {
        return view('post', compact('post'));
    }
}

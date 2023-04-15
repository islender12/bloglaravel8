<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function searchPost(Request $request):Renderable
    {
        $busqueda = $request->input('search');

        $posts = $this->postRepository->search($busqueda);
        // $posts = Post::where("title", "like", "%$busqueda%")->orWhere("body", "like", "%$busqueda%")->paginate(10);
        return view('searchPost', compact('posts'));
    }
}

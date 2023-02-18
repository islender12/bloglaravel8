<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->all();

        return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Renderable
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request): RedirectResponse
    {
        try {

            // Salvar
            $post = new Post(
                $request->all()
                    + ['user_id' => auth()->id()]
            );

            $post = $this->postRepository->save($post);
            // Retornar
            return back()->with('status', 'Creado con Exito');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post): Renderable
    {
        return view('admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditPostRequest $request, Post $post): RedirectResponse
    {
        try {

            /**
             * Usamos el mismo metodo save()
             * y esto es porque tenemos dos parametros el primero los datos ($request)
             * y el Segundo es el post que vamos a Actualizar
             *
             * ello lo logramos usando el metodo fill donde laravel compara los datos
             * que tenemos en el objeto contra lo que recibimos en el request
             * y solo actualiza los datos que son distintos (fueron modificados)
             * y los actualiza en el objeto pero sin ser persitidos
             */
            $post->fill($request->all());
            $post = $this->postRepository->save($post);

            return redirect()->route('posts.edit', $post->slug)->with('status', 'Actualizado Correctamente');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $this->postRepository->delete($post);

        return back()->with('status', 'Eliminado Correctamente');
    }
}

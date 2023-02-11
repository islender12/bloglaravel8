<?php

namespace App\Repositories;

use App\Models\Post;
use Intervention\Image\Facades\Image;
// Nos permite eliminar una imagen o manipular la carpeta storage
use Illuminate\Support\Facades\Storage;

class PostRepository
{
    private $model, $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->model = new Post();
    }

    public function all()
    {
        return $this->model->with('user:id,name')->get();
    }

    public function save(Post $post)
    {
        //imagen

        // if ($post->imagen) {
        //     $post->imagen = $post->imagen->store('posts', 'public');
        //     $post->save();
        // }


        /**
         * ## Si es un string es
         *
         * 1.- porque existe la imagen en la base de datos y como usamos fill en el postcontroller
         * este me lo trae para comparar si existe
         * 2.- Porque no hemos modificado la imagen desde editar y existe en la base de datos
         *
         * Verificamos si es null es decir si estamos guardando o editando y no hemos colocado imagen
         *
         * ## Es un objeto siempre y cuando la imagen se cargue desde el formulario
         */

        if (is_string($post->imagen) || is_null($post->imagen)) {
            $post->save();
        } elseif (is_object($post->imagen)) {

            $oldImage = Post::find($post->id)->imagen ?? '';
            // Si existe una Imagen del posts y quiero actualizar
            // Le indicamos que elimine la anterior
            if (!empty($oldImage)) {
                $this->imageRepository->deleteImage($post->imagen);
            }
            $nombreImagen = $this->imageRepository->saveImage($post->imagen);
            $post->imagen = $nombreImagen;
            $post->save();
        }

        return $post;
    }

    public function delete(Post $post)
    {
        if ($post->imagen) {
            $this->imageRepository->deleteImage($post->imagen);
        }
        $post->delete();
        return $post;
    }
}

<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ImageRepository
{
    public function saveImage($image)
    {
        $ruta = storage_path('app\public/' . $image->store('posts', 'public'));
        $nombre = 'posts/' . basename($ruta);
        Image::make($image)->resize(500, 300)->save($ruta);
        return $nombre;
    }

    public function deleteImage($image)
    {
        Storage::disk('public')->delete($image);
    }
}

<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'user_id',
        'title',
        'imagen',
        'body',
        'iframe',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGetExcerptAttribute($key)
    {
        return substr($this->body, 0, 150);
    }

    public function getGetImagenAttribute($key)
    {
        if ($this->imagen) {
            return url("storage/$this->imagen");
        }
    }
}

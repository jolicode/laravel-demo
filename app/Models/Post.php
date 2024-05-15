<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = $post->slug ?: Str::slug($post->title, language: app()->getLocale());
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title, language: app()->getLocale());
        });
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Post extends Model
{
    public $timestamps = false;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'published_at',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeWithTag($query, $tagId): Builder
    {
        return $query->whereHas('tags', function ($query) use ($tagId) {
            $query->where('tags.id', $tagId);
        });
    }

    public function scopeBySelf($query): Builder
    {
        return $query->where('author_id', auth()->id());
    }

    public function scopePublished($query): Builder
    {
        return $query->where('published_at', '<=', now());
    }

    public function attachTagsToPost(array $tags): void
    {
        $tagIds = [];
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => (string) $tagName]);
            $tagIds[] = $tag->id;
        }

        self::tags()->sync($tagIds);
    }

    public function getTagsListAttribute(): string
    {
        return $this->tags->implode('name', ', ');
    }

    protected static function boot(): void
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

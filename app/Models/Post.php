<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property int       $id
 * @property string    $title
 * @property string    $slug
 * @property string    $content
 * @property \DateTime $published_at
 * @property User      $author
 * @property Tag[]     $tags
 * @property Comment[] $comments
 */
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

    public function scopeLatest(?Tag $tag)
    {
        return $this->where('published_at', '<=', now())
            ->when($tag, function ($query) use ($tag) {
                return $query->whereHas('tags', fn ($query) => $query->where('id', $tag->id));
            })
            ->orderBy('published_at', 'desc')
        ;
    }

    public function scopeBySelf()
    {
        return $this->where('author_id', auth()->id());
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

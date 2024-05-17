<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int       $id
 * @property int       $author_id
 * @property int       $post_id
 * @property string    $content
 * @property \DateTime $published_at
 * @property User      $author
 * @property Post      $post
 */
class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }
}

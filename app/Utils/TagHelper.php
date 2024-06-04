<?php

declare(strict_types=1);

namespace App\Utils;

use App\Models\Post;
use App\Models\Tag;

class TagHelper
{
    public static function handleTags(Post $post, array $tags): void
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            $tagIds[] = $tag->id;
        }

        $post->tags()->sync($tagIds);
    }
}

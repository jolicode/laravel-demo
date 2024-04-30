<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model implements \JsonSerializable
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function jsonSerialize(): string
    {
        // This entity implements JsonSerializable (http://php.net/manual/en/class.jsonserializable.php)
        // so this method is used to customize its JSON representation when json_encode()

        return $this->name;
    }
}

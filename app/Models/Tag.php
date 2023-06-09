<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag'
    ];

    //relationships
    public function posts(): HasManyThrough
    {
        return $this->hasManyThrough(Post::class, PostTag::class);
    }
}

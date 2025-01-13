<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'category_id', 'title', 'description', 'price', 'city_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function parentCategory()
    {
        return $this->category->parent;
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}

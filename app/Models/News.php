<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public static array $allowedFields = [
        'id', 'category_id', 'title', 'description', 'author', 'status', 'created_at', 'updated_at'
    ];

    protected $fillable = [
        'category_id', 'title', 'description', 'author', 'status', 'image'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}

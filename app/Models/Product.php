<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
      'id', 'category_id', 'name', 'description', 'slug', 'image', 'price', 'with_stock'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

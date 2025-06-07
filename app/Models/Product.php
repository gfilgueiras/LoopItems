<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'condition_id',
        'status_id',
        'title',
        'description'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function condition(): BelongsTo
    {
        return $this->belongsTo(Condition::class);
    }

    public function photo(): MorphMany
    {
        return $this->morphMany(Photo::class, 'shootable');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}

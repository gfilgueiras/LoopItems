<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = [
        'title',
        'statusId',
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}

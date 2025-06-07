<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Photo extends Model
{
    protected $fillable = [
        'path',
    ];

    public function shootable(): MorphTo
    {
        return $this->morphTo();
    }
}

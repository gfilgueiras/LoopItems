<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    protected $fillable = [
        'status_id',
        'title'
    ];

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}

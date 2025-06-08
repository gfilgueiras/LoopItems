<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    protected $fillable = [
        'userId',
        'dataBefore',
        'dataAfter',
        'message',
        'comment',
        'severity',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

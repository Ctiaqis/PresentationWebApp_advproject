<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TutorialDetail extends Model
{
    protected $fillable = [
        'tutorial_id',
        'text',
        'gambar',
        'code',
        'url',
        'order_number',
        'status',
    ];

    public function tutorial(): BelongsTo
    {
        return $this->belongsTo(Tutorial::class); #setiap TutorialDetail milik satu Tutorial
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tutorial extends Model
{
    protected $fillable = [
        'judul',
        'kode_matkul',
        'nama_matkul',
        'presentation_key',
        'finished_key',
        'url_presentation',
        'url_finished',
        'creator_email',
    ];

    # satu tutorial punya banyak TutorialDetail
    public function details(): HasMany
    {
        return $this->hasMany(TutorialDetail::class)->orderBy('order_number');
    }
}
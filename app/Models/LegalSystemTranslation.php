<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalSystemTranslation extends Model
{
    protected $fillable = [
        'legal_system_id',
        'language_id',
        'title',
        'slug',
        'summary',
        'content',
    ];

    public function legalSystem()
    {
        return $this->belongsTo(
            LegalSystemCms::class,
            'legal_system_id'
        );
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
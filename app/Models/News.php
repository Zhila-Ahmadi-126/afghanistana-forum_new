<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    protected $table = 'news';

 protected $fillable = [ 
    'created_by',
    'status',
    'media_type',
    'featured_image',
    'media_url',
    'youtube_url',
    'source_name',
    'source_url',
    'published_at',
];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * News Creator
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * All translations
     */
    public function translations(): HasMany
    {
        return $this->hasMany(NewsTranslation::class);
    }

   
   

}


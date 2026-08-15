<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnouncementCms extends Model
{
    protected $table = 'announcements_cms';

    protected $fillable = [

        'image',

        'pdf_file',

        'source_url',

        'publish_date',

        'expiry_date',

        'status',

        'is_featured',

        'sort_order',

        'created_by',

    ];


    public function translations()
    {
        return $this->hasMany(
            AnnouncementTranslation::class,
            'announcement_id'
        );
    }


    public function creator()
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }
}
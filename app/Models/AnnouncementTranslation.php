<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnnouncementTranslation extends Model
{
    protected $fillable = [

        'announcement_id',

        'language_id',

        'title',

        'short_description',

        'description',

        'meta_title',

        'meta_description',

        'created_by',

    ];


    public function announcement()
    {
        return $this->belongsTo(
            AnnouncementCms::class,
            'announcement_id'
        );
    }


    public function language()
    {
        return $this->belongsTo(
            Language::class,
            'language_id'
        );
    }
}
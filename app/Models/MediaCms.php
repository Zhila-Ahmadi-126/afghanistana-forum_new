<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaCms extends Model
{


    protected $fillable = [


        'type',

        'media_type',

        'thumbnail',

        'youtube_url',

        'external_url',

       

        'pdf_file',

        'start_date',

        'end_date',

        'status',

        'is_featured',

        'views',

        'created_by',


    ];







    // ==========================================
    // TRANSLATIONS
    // ==========================================

        public function translations()
        {
            return $this->hasMany(
                MediaTranslationCms::class,
                'media_id'
            );
        }







    // ==========================================
    // CREATOR
    // ==========================================


    public function creator()
    {

        return $this->belongsTo(

            User::class,

            'created_by'

        );

    }


}
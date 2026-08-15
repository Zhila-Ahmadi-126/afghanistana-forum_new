<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaTranslationCms extends Model
{


    protected $fillable = [


        'media_id',

        'language_id',

        'title',

        'short_description',

        'description',

        'meta_title',

        'meta_description',

        'created_by',


    ];







    // ==========================================
    // MEDIA RELATION
    // ==========================================


    public function media()
    {

        return $this->belongsTo(

            MediaCms::class,

            'media_id'

        );

    }








    // ==========================================
    // LANGUAGE RELATION
    // ==========================================


    public function language()
    {

        return $this->belongsTo(

            Language::class,

            'language_id'

        );

    }



}
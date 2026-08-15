<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveTranslationCms extends Model
{

    protected $table = 'archive_translation_cms';



    protected $fillable = [

        'archive_id',

        'language_id',

        'name',

        'short_description',

        'description',

        'meta_title',

        'meta_description',

    ];





    // ==========================================
    // ARCHIVE
    // ==========================================

    public function archive()
    {

        return $this->belongsTo(
            ArchiveCms::class,
            'archive_id'
        );

    }





    // ==========================================
    // LANGUAGE
    // ==========================================

    public function language()
    {

        return $this->belongsTo(
            Language::class,
            'language_id'
        );

    }


}
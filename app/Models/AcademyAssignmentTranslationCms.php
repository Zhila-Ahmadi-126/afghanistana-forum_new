<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyAssignmentTranslationCms extends Model
{
    protected $table = 'academy_assignment_translations_cms';

    protected $fillable = [

        'assignment_id',

        'language_id',

        'title',

        'description',

        'meta_title',

        'meta_description',

        'created_by',

    ];

    public function assignment()
    {
        return $this->belongsTo(
            AcademyAssignmentCms::class,
            'assignment_id'
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
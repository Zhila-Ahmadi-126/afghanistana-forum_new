<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyDepartmentTranslationCms extends Model
{

    protected $table = 'academy_department_translations_cms';



    protected $fillable = [

        'department_id',

        'language_id',

        'title',

        'short_description',

        'description',

        'meta_title',

        'meta_description',

        'created_by',

    ];





    /*
    |--------------------------------------------------------------------------
    | DEPARTMENT
    |--------------------------------------------------------------------------
    */

    public function department()
    {

        return $this->belongsTo(

            AcademyDepartmentCms::class,

            'department_id'

        );

    }





    /*
    |--------------------------------------------------------------------------
    | LANGUAGE
    |--------------------------------------------------------------------------
    */

    public function language()
    {

        return $this->belongsTo(

            Language::class,

            'language_id'

        );

    }





    /*
    |--------------------------------------------------------------------------
    | CREATOR
    |--------------------------------------------------------------------------
    */

    public function creator()
    {

        return $this->belongsTo(

            User::class,

            'created_by'

        );

    }

}
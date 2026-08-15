<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyClassTranslationCms extends Model
{


    protected $table = 'academy_class_translations_cms';



    protected $fillable = [

        'class_id',

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
    | CLASS
    |--------------------------------------------------------------------------
    */

    public function academyClass()
    {
        return $this->belongsTo(
            AcademyClassCms::class,
            'class_id'
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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyDepartmentCms extends Model
{

    protected $table = 'academy_departments_cms';



    protected $fillable = [

        'code',

        'icon',

        'image',

        'status',

        'is_featured',

        'created_by',

    ];





    /*
    |--------------------------------------------------------------------------
    | TRANSLATIONS
    |--------------------------------------------------------------------------
    */

    public function translations()
    {

        return $this->hasMany(

            AcademyDepartmentTranslationCms::class,

            'department_id'

        );

    }





    /*
    |--------------------------------------------------------------------------
    | DEFAULT TRANSLATION
    |--------------------------------------------------------------------------
    */

    public function translation()
    {

        return $this->hasOne(

            AcademyDepartmentTranslationCms::class,

            'department_id'

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
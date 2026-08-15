<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyResourceCms extends Model
{

    protected $table = 'academy_resources_cms';



    protected $fillable = [

        'department_id',

        'class_id',

        'resource_type',

        'title',

        'author',

        'cover_image',

        'file_path',

        'external_url',

        'html_path',

        'short_description',

        'description',

        'published_date',

        'status',

        'is_featured',

        'created_by',

    ];



    protected $casts = [

        'published_date' => 'date',

        'is_featured' => 'boolean',

    ];



    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function department()
    {

        return $this->belongsTo(

            AcademyDepartmentCms::class,

            'department_id'

        );

    }



    public function academyClass()
    {

        return $this->belongsTo(

            AcademyClassCms::class,

            'class_id'

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
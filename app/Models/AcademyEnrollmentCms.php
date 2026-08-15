<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyEnrollmentCms extends Model
{

    protected $table = 'academy_enrollments_cms';


   protected $fillable = [

    'student_id',

    'class_id',

    'enrollment_date',

    'enrollment_status',

    'final_result',

    'notes',

    'created_by',

];


    public function student()
    {
        return $this->belongsTo(
            AcademyStudentCms::class,
            'student_id'
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
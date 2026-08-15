<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyGradeCms extends Model
{

    protected $table = 'academy_grades_cms';


    protected $fillable = [

        'enrollment_id',

        'assignment_id',

        'grade_type',

        'score',

        'max_score',

        'feedback',

        'graded_by',

        'grade_date',

        'created_by',

    ];



    public function enrollment()
    {
        return $this->belongsTo(
            AcademyEnrollmentCms::class,
            'enrollment_id'
        );
    }



    public function assignment()
    {
        return $this->belongsTo(
            AcademyAssignmentCms::class,
            'assignment_id'
        );
    }



    public function grader()
    {
        return $this->belongsTo(
            User::class,
            'graded_by'
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
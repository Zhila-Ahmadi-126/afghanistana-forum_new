<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyCertificateCms extends Model
{

    protected $table = 'academy_certificates_cms';



    protected $fillable = [

        'student_id',

        'class_id',

        'certificate_number',

        'issue_date',

        'certificate_file',

        'status',

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
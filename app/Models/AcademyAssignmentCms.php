<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyAssignmentCms extends Model
{
    protected $table = 'academy_assignments_cms';
protected $fillable = [
    'class_id',
    'teacher_id',
    'attachment',
    'due_date',
    'status',
    'created_by',
];

    public function translations()
    {
        return $this->hasMany(
            AcademyAssignmentTranslationCms::class,
            'assignment_id'
        );
    }

    public function translation()
    {
        return $this->hasOne(
            AcademyAssignmentTranslationCms::class,
            'assignment_id'
        )->where(
            'language_id',
            session('admin_language_id',1)
        );
    }

    public function teacher()
    {
        return $this->belongsTo(
            AcademyTeacherCms::class,
            'teacher_id'
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
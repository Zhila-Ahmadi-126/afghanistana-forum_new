<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AcademyStudentCms extends Model
{
   protected $table = 'academy_students_cms';
   public function creator()
{
    return $this->belongsTo(User::class,'created_by');
}

public function user()
{
    return $this->belongsTo(User::class,'user_id');
}
public function enrollments()
{

    return $this->hasMany(
        AcademyEnrollmentCms::class,
        'student_id'
    );

}
public function certificates()
{
    return $this->hasMany(
        AcademyCertificateCms::class,
        'student_id'
    );
}
protected $fillable = [

    'first_name',
    'last_name',
    'gender',
    'date_of_birth',
    'email',
    'password',
    'phone',
    'address',
    'profile_image',
    'emergency_contact_name',
    'emergency_contact_phone',
    'enrollment_date',
    'status',
    'notes',
    'created_by',

];
protected $hidden = [
    'password',
];
}

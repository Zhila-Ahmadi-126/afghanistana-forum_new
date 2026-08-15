<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyTeacherCms extends Model
{

    protected $table = 'academy_teachers_cms';



    protected $fillable = [

        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'email',
        'phone',
        'profile_image',
        'position',
        'department_id',
        'biography',
        'education',
        'experience',
        'facebook_url',
        'linkedin_url',
        'youtube_url',
        'website_url',
        'status',
        'created_by',

    ];




public function classes()
{
    return $this->hasMany(
        AcademyClassCms::class,
        'teacher_id'
    );
}
    public function department()
    {

        return $this->belongsTo(

            AcademyDepartmentCms::class,

            'department_id'

        );

    }
    public function schedules()
{

    return $this->hasMany(

        AcademyScheduleCms::class,

        'teacher_id'

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
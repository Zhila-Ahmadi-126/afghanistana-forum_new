<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyScheduleCms extends Model
{

    protected $table = 'academy_schedules_cms';

   protected $fillable = [

    'class_id',

    'teacher_id',

    'day_of_week',

    'start_time',

    'end_time',

    'room',

    'schedule_type',

    'meeting_link',

    'status',

    'notes',

];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    public function academyClass()
    {

        return $this->belongsTo(

            AcademyClassCms::class,

            'class_id'

        );

    }



    public function teacher()
    {

        return $this->belongsTo(

            AcademyTeacherCms::class,

            'teacher_id'

        );

    }



    public function translations()
    {

        return $this->hasMany(

            AcademyScheduleTranslation::class,

            'schedule_id'

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
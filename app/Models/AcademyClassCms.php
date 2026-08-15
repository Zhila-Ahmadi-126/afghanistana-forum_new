<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AcademyTeacherCms;
class AcademyClassCms extends Model
{


    protected $table = 'academy_classes_cms';



    protected $fillable = [

        'department_id',

        'teacher_id',

        'class_code',

        'capacity',

        'start_date',

        'end_date',

        'schedule',

        'room',

        'status',

        'created_by',

    ];





    /*
    |--------------------------------------------------------------------------
    | DEPARTMENT
    |--------------------------------------------------------------------------
    */

    public function department()
    {

        return $this->belongsTo(

            AcademyDepartmentCms::class,

            'department_id'

        );

    }





    /*
    |--------------------------------------------------------------------------
    | TEACHER
    |--------------------------------------------------------------------------
    */

   public function teacher()
        {
            return $this->belongsTo(
                AcademyTeacherCms::class,
                'teacher_id'
            );
        }




    /*
    |--------------------------------------------------------------------------
    | TRANSLATIONS
    |--------------------------------------------------------------------------
    */

  public function translations()
{
    return $this->hasMany(
        AcademyClassTranslationCms::class,
        'class_id'
    );
}
public function schedules()
{

    return $this->hasMany(

        AcademyScheduleCms::class,

        'class_id'

    );

}



    public function translation()
    {

        return $this->hasOne(

            AcademyClassTranslationCms::class,

            'class_id'

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
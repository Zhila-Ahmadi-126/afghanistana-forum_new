<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyScheduleTranslation extends Model
{

    protected $table = 'academy_schedule_translations';

    protected $fillable = [

        'schedule_id',

        'language_id',

        'title',

        'description',

        'created_by',

    ];


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */


    public function schedule()
    {

        return $this->belongsTo(

            AcademyScheduleCms::class,

            'schedule_id'

        );

    }



    public function language()
    {

        return $this->belongsTo(

            Language::class,

            'language_id'

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
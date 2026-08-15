<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityReport extends Model
{
    use HasFactory;

    protected $table = 'activity_reports';

    protected $fillable = [

        'user_id',

        'report_date',

        'status',

    ];


   
    public function translations()
    {
        return $this->hasMany(
            ActivityReportTranslation::class
        );
    }

 

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

}
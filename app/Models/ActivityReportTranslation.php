<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityReportTranslation extends Model
{
    use HasFactory;

    protected $table = 'activity_report_translations';

    protected $fillable = [

        'activity_report_id',

        'language_id',

        'title',

        'summary',

        'completed_activities',

        'pending_activities',

        'challenges',

        'next_plan',

    ];


    public function report()
    {
        return $this->belongsTo(
            ActivityReport::class,
            'activity_report_id'
        );
    }
   public function language()
{
    return $this->belongsTo(
        Language::class
    );
}

  
}
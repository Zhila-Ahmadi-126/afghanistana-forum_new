<?php

namespace App\Models;
use App\Models\User;


use Illuminate\Database\Eloquent\Model;


class LegalSystemCms extends Model
{
    protected $table = 'legal_systems_cms';

    protected $fillable = [
        'type',
        'status',
        'created_by',
        'image',
    ];


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
   public function translations()
    {
        return $this->hasMany(
            LegalSystemTranslation::class,
            'legal_system_id'
        );
    }
   

public function documents()
{
    return $this->hasMany(
        LegalDocumentCms::class,
        'legal_system_id'
    );
}


}




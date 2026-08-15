<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveCms extends Model
{

    protected $table = 'archives_cms';



    protected $fillable = [

        'image',
        'archive_member_id',

        'pdf_file',

        'profile_url',

        'archive_year',

        'status',

        'sort_order',

        'created_by',

    ];




    // ==========================================
    // TRANSLATIONS
    // ==========================================

    public function translations()
    {

        return $this->hasMany(
            ArchiveTranslationCms::class,
            'archive_id'
        );

    }




    // ==========================================
    // CREATOR
    // ==========================================

    public function creator()
    {

        return $this->belongsTo(
            User::class,
            'created_by'
        );

    }
    public function archiveMember()
{
    return $this->belongsTo(ArchiveMember::class, 'archive_member_id');
}


}
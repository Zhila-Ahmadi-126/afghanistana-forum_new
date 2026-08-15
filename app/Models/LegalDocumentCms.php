<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDocumentCms extends Model
{
    use HasFactory;

    protected $table = 'legal_documents_cms';

    protected $fillable = [

        'legal_system_id',

        'cover_image',

        'pdf_file',

        'status',

        'created_by'

    ];



    /*
    |--------------------------------------------------------------------------
    | Legal System
    |--------------------------------------------------------------------------
    */

    public function legalSystem()
    {
        return $this->belongsTo(
            LegalSystemCms::class,
            'legal_system_id'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | Creator
    |--------------------------------------------------------------------------
    */

    public function creator()
    {
        return $this->belongsTo(
            User::class,
            'created_by'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | All Translations
    |--------------------------------------------------------------------------
    */

    public function translations()
    {
        return $this->hasMany(
            LegalDocumentTranslationCms::class,
            'legal_document_id'
        );
    }



    /*
    |--------------------------------------------------------------------------
    | English Translation
    |--------------------------------------------------------------------------
    */

    public function translation()
    {

        return $this->hasOne(
            LegalDocumentTranslationCms::class,
            'legal_document_id'
        )->whereHas('language', function ($q) {

            $q->where('code', 'en');

        });

    }
public function categories()
{
    return $this->hasMany(
        LegalCategoryCms::class,
        'legal_document_id'
    )->whereNull('parent_id');
}
}
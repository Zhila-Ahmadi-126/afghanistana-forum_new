<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalDocumentTranslationCms extends Model
{
    use HasFactory;

    protected $table = 'legal_document_translations_cms';

    protected $fillable = [

        'legal_document_id',

        'language_id',

        'title',

        'summary',

        'content',

        'seo_title',

        'seo_description'

    ];



    /*
    |--------------------------------------------------------------------------
    | Document
    |--------------------------------------------------------------------------
    */

    public function document()
    {

        return $this->belongsTo(

            LegalDocumentCms::class,

            'legal_document_id'

        );

    }



    /*
    |--------------------------------------------------------------------------
    | Language
    |--------------------------------------------------------------------------
    */

    public function language()
    {

        return $this->belongsTo(

            Language::class,

            'language_id'

        );

    }
    public function deleteTranslation($id)
{

    $translation = LegalDocumentTranslationCms::findOrFail($id);

    $translation->delete();


    return back()->with(
        'success',
        'Translation deleted successfully.'
    );

}

}
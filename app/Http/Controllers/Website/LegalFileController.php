<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\LegalFileCms;

class LegalFileController extends Controller
{
   public function show($id)
{
    $file = LegalFileCms::with([
        'translations.language'
    ])->findOrFail($id);


    // Current language
    $languageCode = app()->getLocale();


    // Translation
    $fileTranslation = $file->translations
        ->firstWhere('language.code', $languageCode);


    // English fallback
    if (!$fileTranslation) {

        $fileTranslation = $file->translations
            ->firstWhere('language.code', 'en');

    }


    /*
    |--------------------------------------------------------------------------
    | 1. PDF
    |--------------------------------------------------------------------------
    */

    if ($file->pdf_file) {

        return redirect(
            asset('storage/' . $file->pdf_file)
        );

    }


    /*
    |--------------------------------------------------------------------------
    | 2. External URL
    |--------------------------------------------------------------------------
    */

    if ($file->file_url) {

        return redirect($file->file_url);

    }


    /*
    |--------------------------------------------------------------------------
    | 3. Internal Legal File Page
    |--------------------------------------------------------------------------
    */

   return view(
    'website.legal-system.file-show',
    compact(
        'file',
        'fileTranslation'
    )
);
}
}
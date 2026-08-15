<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\LegalDocumentCms;

class LegalDocumentController extends Controller
{
    public function show($id)
    {
        $document = LegalDocumentCms::with([
            'translations.language',

            'legalSystem',

            'categories' => function ($query) {
                $query->with([
                    'translations.language',
                    'children.translations.language'
                ])
                ->orderBy('sort_order');
            },

        ])->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Current Language
        |--------------------------------------------------------------------------
        */

        $languageCode = app()->getLocale();


        /*
        |--------------------------------------------------------------------------
        | Document Translation
        |--------------------------------------------------------------------------
        */

        $translation = $document->translations
            ->firstWhere('language.code', $languageCode);


        /*
        |--------------------------------------------------------------------------
        | English Fallback
        |--------------------------------------------------------------------------
        */

        if (!$translation) {

            $translation = $document->translations
                ->firstWhere('language.code', 'en');

        }


        /*
        |--------------------------------------------------------------------------
        | Categories Translation
        |--------------------------------------------------------------------------
        */

        foreach ($document->categories as $category) {

            $category->currentTranslation =
                $category->translations
                    ->firstWhere('language.code', $languageCode)
                ??
                $category->translations
                    ->firstWhere('language.code', 'en');


            /*
            |--------------------------------------------------------------------------
            | Children Translation
            |--------------------------------------------------------------------------
            */

            foreach ($category->children as $child) {

                $child->currentTranslation =
                    $child->translations
                        ->firstWhere('language.code', $languageCode)
                    ??
                    $child->translations
                        ->firstWhere('language.code', 'en');

            }
        }


        return view(
            'website.legal-system.document-show',
            compact(
                'document',
                'translation'
            )
        );
    }
}
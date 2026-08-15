<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\LegalSystemCms;
use App\Models\Language;

class LegalSystemController extends Controller
{
    /**
     * Website Legal Systems Index
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Current Website Language
        |--------------------------------------------------------------------------
        */

        $currentLocale = app()->getLocale();

        $currentLanguage = Language::where(
            'code',
            $currentLocale
        )->first();


        /*
        |--------------------------------------------------------------------------
        | English Fallback Language
        |--------------------------------------------------------------------------
        */

        $englishLanguage = Language::where(
            'code',
            'en'
        )->first();


        /*
        |--------------------------------------------------------------------------
        | Language IDs
        |--------------------------------------------------------------------------
        */

        $currentLanguageId = $currentLanguage
            ? $currentLanguage->id
            : null;

        $englishLanguageId = $englishLanguage
            ? $englishLanguage->id
            : null;


        /*
        |--------------------------------------------------------------------------
        | Get All Active Legal Systems
        |--------------------------------------------------------------------------
        */

        $legalSystems = LegalSystemCms::where(
                'status',
                'active'
            )
            ->with([
                /*
                |--------------------------------------------------------------------------
                | Legal System Translations
                |--------------------------------------------------------------------------
                */

                'translations' => function ($query) use (
                    $currentLanguageId,
                    $englishLanguageId
                ) {

                    $query->whereIn(
                        'language_id',
                        array_filter([
                            $currentLanguageId,
                            $englishLanguageId
                        ])
                    );
                },


                /*
                |--------------------------------------------------------------------------
                | Legal Documents
                |--------------------------------------------------------------------------
                */

                'documents' => function ($query) {

                    $query->where(
                        'status',
                        'published'
                    );
                },


                /*
                |--------------------------------------------------------------------------
                | Document Translations
                |--------------------------------------------------------------------------
                */

                'documents.translations' => function ($query) use (
                    $currentLanguageId,
                    $englishLanguageId
                ) {

                    $query->whereIn(
                        'language_id',
                        array_filter([
                            $currentLanguageId,
                            $englishLanguageId
                        ])
                    );
                }
            ])
            ->orderBy(
                'id',
                'asc'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Return Website View
        |--------------------------------------------------------------------------
        */

        return view(
            'website.legal-system.index',
            compact(
                'legalSystems',
                'currentLanguageId',
                'englishLanguageId'
            )
        );
    }


    /**
     * Single Legal System
     */
    public function show($id)
    {
        /*
        |--------------------------------------------------------------------------
        | Current Language
        |--------------------------------------------------------------------------
        */

        $currentLocale = app()->getLocale();

        $currentLanguage = Language::where(
            'code',
            $currentLocale
        )->first();


        /*
        |--------------------------------------------------------------------------
        | English Fallback
        |--------------------------------------------------------------------------
        */

        $englishLanguage = Language::where(
            'code',
            'en'
        )->first();


        $currentLanguageId = $currentLanguage
            ? $currentLanguage->id
            : null;

        $englishLanguageId = $englishLanguage
            ? $englishLanguage->id
            : null;


        /*
        |--------------------------------------------------------------------------
        | Get Legal System
        |--------------------------------------------------------------------------
        */

        $legalSystem = LegalSystemCms::where(
                'status',
                'active'
            )
            ->with([

                'translations' => function ($query) use (
                    $currentLanguageId,
                    $englishLanguageId
                ) {

                    $query->whereIn(
                        'language_id',
                        array_filter([
                            $currentLanguageId,
                            $englishLanguageId
                        ])
                    );
                },


                'documents' => function ($query) {

                    $query->where(
                        'status',
                        'published'
                    );
                },


                'documents.translations' => function ($query) use (
                    $currentLanguageId,
                    $englishLanguageId
                ) {

                    $query->whereIn(
                        'language_id',
                        array_filter([
                            $currentLanguageId,
                            $englishLanguageId
                        ])
                    );
                }

            ])
            ->findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Return Single Page
        |--------------------------------------------------------------------------
        */

        return view(
            'website.legal-system.show',
            compact(
                'legalSystem',
                'currentLanguageId',
                'englishLanguageId'
            )
        );
    }
}
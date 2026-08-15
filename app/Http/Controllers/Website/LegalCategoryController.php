<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\LegalCategoryCms;
use App\Models\LegalFileCms;
class LegalCategoryController extends Controller
{
    public function show($id)
    {
        $languageCode = app()->getLocale();

        $category = LegalCategoryCms::with([
            'document.legalSystem',
            'translations.language',

            'files.translations.language',

            'children' => function ($query) {
                $query->where('status', 'active')
                    ->orderBy('sort_order')
                    ->with([
                        'translations.language',
                        'children.translations.language',
                    ]);
            },

        ])->findOrFail($id);
        $files = LegalFileCms::with([
            'translations.language'
        ])
        ->where('legal_category_id', $category->id)
        ->where('status', 'published')
        ->orderBy('sort_order')
        ->paginate(6)
        ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Category Translation
        |--------------------------------------------------------------------------
        */

        $translation = $category->translations
            ->firstWhere('language.code', $languageCode);

        if (!$translation) {
            $translation = $category->translations
                ->firstWhere('language.code', 'en');
        }


        /*
        |--------------------------------------------------------------------------
        | Children Translation
        |--------------------------------------------------------------------------
        */

        foreach ($category->children as $child) {

            $child->currentTranslation =
                $child->translations
                    ->firstWhere('language.code', $languageCode);

            if (!$child->currentTranslation) {

                $child->currentTranslation =
                    $child->translations
                        ->firstWhere('language.code', 'en');
            }
        }


        /*
        |--------------------------------------------------------------------------
        | File Translation
        |--------------------------------------------------------------------------
        */

        foreach ($category->files as $file) {

            $file->currentTranslation =
                $file->translations
                    ->firstWhere('language.code', $languageCode);

            if (!$file->currentTranslation) {

                $file->currentTranslation =
                    $file->translations
                        ->firstWhere('language.code', 'en');
            }
        }

            $files = $category->files()
                ->with(['translations.language'])
                ->where('status', 'published')
                ->orderBy('sort_order')
                ->paginate(6);
            return view(
                'website.legal-system.category-show',
                compact(
                    'category',
                    'translation',
                    'files'
                )
            );
    }
    
}
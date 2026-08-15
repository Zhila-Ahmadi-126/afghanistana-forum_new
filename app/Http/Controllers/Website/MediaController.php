<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MediaCms;
use App\Models\Language;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        // Current language
        $language = Language::where(
            'code',
            app()->getLocale()
        )->first();

        // Search
        $search = trim(
            $request->get('search', '')
        );

        // Selected year
        $selectedYear = $request->get('year');

        // Selected type
        $selectedType = $request->get('type');

        /*
        |--------------------------------------------------------------------------
        | Available Years
        |--------------------------------------------------------------------------
        */

        $years = MediaCms::query()
            ->where('status', 'active')
            ->whereNotNull('created_at')
            ->selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        /*
        |--------------------------------------------------------------------------
        | Available Media Types
        |--------------------------------------------------------------------------
        */

        $types = MediaCms::query()
            ->where('status', 'active')
            ->whereNotNull('type')
            ->select('type')
            ->distinct()
            ->orderBy('type')
            ->pluck('type');

        /*
        |--------------------------------------------------------------------------
        | Main Media Query
        |--------------------------------------------------------------------------
        */

        $mediaQuery = MediaCms::query()
            ->where('status', 'active')

            // Start date
            ->where(function ($query) {
                $query
                    ->whereNull('start_date')
                    ->orWhere('start_date', '<=', now());
            })

            // End date
            ->where(function ($query) {
                $query
                    ->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })

            // Translation
            ->with([
                'translations' => function ($query) use ($language) {

                    if ($language) {
                        $query->where(
                            'language_id',
                            $language->id
                        );
                    }

                }
            ]);

        /*
        |--------------------------------------------------------------------------
        | Year Filter
        |--------------------------------------------------------------------------
        */

        if (
            $selectedYear &&
            in_array(
                (int) $selectedYear,
                $years
                    ->map(fn ($year) => (int) $year)
                    ->toArray()
            )
        ) {
            $mediaQuery->whereYear(
                'created_at',
                $selectedYear
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Type Filter
        |--------------------------------------------------------------------------
        */

        if (
            $selectedType &&
            $types->contains($selectedType)
        ) {
            $mediaQuery->where(
                'type',
                $selectedType
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Search Filter
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $mediaQuery->whereHas(
                'translations',
                function ($query) use (
                    $search,
                    $language
                ) {

                    if ($language) {
                        $query->where(
                            'language_id',
                            $language->id
                        );
                    }

                    $query->where(function ($q) use ($search) {

                        $q->where(
                            'title',
                            'like',
                            '%' . $search . '%'
                        )

                        ->orWhere(
                            'short_description',
                            'like',
                            '%' . $search . '%'
                        )

                        ->orWhere(
                            'description',
                            'like',
                            '%' . $search . '%'
                        );

                    });

                }
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $media = $mediaQuery
            ->orderByDesc('is_featured')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Featured Media
        |--------------------------------------------------------------------------
        */

        $featuredMedia = MediaCms::query()

            ->where('status', 'active')

            ->where('is_featured', 1)

            ->whereNotNull('youtube_url')

            ->where(function ($query) {
                $query
                    ->whereNull('start_date')
                    ->orWhere('start_date', '<=', now());
            })

            ->where(function ($query) {
                $query
                    ->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })

            ->with([
                'translations' => function ($query) use ($language) {

                    if ($language) {
                        $query->where(
                            'language_id',
                            $language->id
                        );
                    }

                }
            ])

            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Send Everything To View
        |--------------------------------------------------------------------------
        */

        return view(
            'website.media.index',
            compact(
                'media',
                'years',
                'types',
                'selectedYear',
                'selectedType',
                'search',
                'featuredMedia'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SINGLE MEDIA
    |--------------------------------------------------------------------------
    */


public function show($id)
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();

    $media = MediaCms::query()
        ->where('status', 'active')
        ->with([
            'translations' => function ($query) use ($language) {

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }
            }
        ])
        ->findOrFail($id);

    // Increase views
    $media->increment('views');

    return view(
        'website.media.show',
        compact('media')
    );
}


}
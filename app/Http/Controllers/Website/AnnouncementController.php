<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AnnouncementCms;
use App\Models\Language;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | LANGUAGE
        |--------------------------------------------------------------------------
        */

        $language = Language::where(
            'code',
            app()->getLocale()
        )->first();

        /*
        |--------------------------------------------------------------------------
        | AVAILABLE YEARS
        |--------------------------------------------------------------------------
        */

        $years = AnnouncementCms::query()
            ->whereNotNull('publish_date')
            ->selectRaw('YEAR(publish_date) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');


        /*
        |--------------------------------------------------------------------------
        | SEARCH + YEAR
        |--------------------------------------------------------------------------
        */

        $search = trim($request->get('search', ''));

        $selectedYear = $request->get('year');


        /*
        |--------------------------------------------------------------------------
        | ANNOUNCEMENTS
        |--------------------------------------------------------------------------
        */

        $announcements = AnnouncementCms::query()

            /*
             * فعلاً فقط status را محدود نمی‌کنیم
             * تا رکوردهای موجود حتماً نمایش داده شوند.
             */

           ->where(function ($query) {
                $query
                    ->whereNull('publish_date')
                    ->orWhereDate('publish_date', '<=', today());
            })

           ->where(function ($query) {
                $query
                    ->whereNull('expiry_date')
                    ->orWhereDate('expiry_date', '>=', today());
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

            ]);


        /*
        |--------------------------------------------------------------------------
        | YEAR FILTER
        |--------------------------------------------------------------------------
        */

        if ($selectedYear) {

            $announcements->whereYear(
                'publish_date',
                (int) $selectedYear
            );

        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH FILTER
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $announcements->whereHas(
                'translations',
                function ($query) use ($search, $language) {

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
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $announcements = $announcements

            ->orderByDesc('is_featured')

            ->orderBy(
                'sort_order',
                'asc'
            )

            ->orderByDesc(
                'publish_date'
            )

            ->orderByDesc(
                'id'
            )

            ->paginate(20)

            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'website.announcement.index',
            compact(
                'announcements',
                'years',
                'selectedYear',
                'search'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SINGLE ANNOUNCEMENT
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $language = Language::where(
            'code',
            app()->getLocale()
        )->first();


        $announcement = AnnouncementCms::query()

            ->where(function ($query) {

                $query
                    ->whereNull('publish_date')
                    ->orWhereDate(
                        'publish_date',
                        '<=',
                        now()
                    );

            })

            ->where(function ($query) {

                $query
                    ->whereNull('expiry_date')
                    ->orWhereDate(
                        'expiry_date',
                        '>=',
                        now()
                    );

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

            ->findOrFail($id);


        return view(
            'website.announcement.show',
            compact('announcement')
        );
    }
}

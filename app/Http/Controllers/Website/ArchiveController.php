<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ArchiveCms;
use App\Models\ArchiveMember;
use App\Models\Language;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Current Language
        |--------------------------------------------------------------------------
        */

        $language = Language::where(
            'code',
            app()->getLocale()
        )->first();


        /*
        |--------------------------------------------------------------------------
        | Filters
        |--------------------------------------------------------------------------
        */

        $search = trim($request->input('search', ''));

        $year = $request->input('year');


        /*
        |--------------------------------------------------------------------------
        | Available Years
        |--------------------------------------------------------------------------
        |
        | فقط سال‌هایی که واقعاً Archive فعال دارند.
        | بنابراین سال‌های جدید مثل 2027، 2028 و ... خودکار اضافه می‌شوند.
        |
        */

        $years = ArchiveCms::query()
            ->where('status', 'active')
            ->whereNotNull('archive_year')
            ->whereBetween('archive_year', [2009, 2030])
            ->select('archive_year')
            ->distinct()
            ->orderBy('archive_year', 'desc')
            ->pluck('archive_year');


        /*
        |--------------------------------------------------------------------------
        | Archive Members
        |--------------------------------------------------------------------------
        |
        | برای هر Member فقط اولین Archive مطابق فیلتر نمایش داده می‌شود.
        |
        */

        $membersQuery = ArchiveMember::query()
            ->whereHas('archives', function ($query) use ($search, $year, $language) {

                $query->where('status', 'active');


                /*
                |--------------------------------------------------------------------------
                | YEAR FILTER
                |--------------------------------------------------------------------------
                */

                if ($year && $year !== 'all') {

                    $query->where(
                        'archive_year',
                        $year
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | SEARCH FILTER
                |--------------------------------------------------------------------------
                */

                if ($search !== '') {

                    $query->where(function ($archiveQuery) use (
                        $search,
                        $language
                    ) {

                        /*
                        |--------------------------------------------------------------------------
                        | Search in archive translations
                        |--------------------------------------------------------------------------
                        */

                        $archiveQuery->whereHas(
                            'translations',
                            function ($translationQuery) use (
                                $search,
                                $language
                            ) {

                                if ($language) {

                                    $translationQuery->where(
                                        'language_id',
                                        $language->id
                                    );

                                }

                                $translationQuery->where(function ($q) use ($search) {

                                    $q->where(
                                        'name',
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

                    });

                }

            });


        /*
        |--------------------------------------------------------------------------
        | Search Member Name / Surname
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $membersQuery->orWhere(function ($query) use ($search) {

                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('surname', 'like', '%' . $search . '%');

            });

        }


        /*
        |--------------------------------------------------------------------------
        | Eager Load Archives
        |--------------------------------------------------------------------------
        */

        $membersQuery->with([

            'archives' => function ($query) use (
                $language,
                $year,
                $search
            ) {

                $query
                    ->where('status', 'active');


                /*
                |--------------------------------------------------------------------------
                | YEAR
                |--------------------------------------------------------------------------
                */

                if ($year && $year !== 'all') {

                    $query->where(
                        'archive_year',
                        $year
                    );

                }


                /*
                |--------------------------------------------------------------------------
                | SEARCH
                |--------------------------------------------------------------------------
                */

                if ($search !== '') {

                    $query->whereHas(
                        'translations',
                        function ($translationQuery) use (
                            $search,
                            $language
                        ) {

                            if ($language) {

                                $translationQuery->where(
                                    'language_id',
                                    $language->id
                                );

                            }

                            $translationQuery->where(function ($q) use ($search) {

                                $q->where(
                                    'name',
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
                | TRANSLATION
                |--------------------------------------------------------------------------
                */

                $query->with([

                    'translations' => function ($translationQuery) use ($language) {

                        if ($language) {

                            $translationQuery->where(
                                'language_id',
                                $language->id
                            );

                        }

                    }

                ]);


                /*
                |--------------------------------------------------------------------------
                | FIRST ARCHIVE
                |--------------------------------------------------------------------------
                */

                $query
                    ->orderBy('sort_order', 'asc')
                    ->orderBy('id', 'asc')
                    ->limit(1);

            }

        ]);


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $members = $membersQuery
            ->orderBy('id', 'asc')
            ->paginate(20)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view(
            'website.archive.index',
            compact(
                'members',
                'years',
                'search',
                'year'
            )
        );
    }
}
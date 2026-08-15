<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\ActivityReport;
use App\Models\Language;
use Illuminate\Http\Request;

class ActivityReportController extends Controller
{
    /**
     * Reports Index
     */
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
        | Search
        |--------------------------------------------------------------------------
        */

        $search = trim(
            $request->get('search', '')
        );

        /*
        |--------------------------------------------------------------------------
        | Selected Year
        |--------------------------------------------------------------------------
        */

        $selectedYear = $request->get('year');

        /*
        |--------------------------------------------------------------------------
        | Available Years
        |--------------------------------------------------------------------------
        */

        $years = ActivityReport::query()
            ->whereNotNull('report_date')
            ->selectRaw('YEAR(report_date) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        /*
        |--------------------------------------------------------------------------
        | Reports Query
        |--------------------------------------------------------------------------
        */

       $reports = ActivityReport::query()
    ->with([
        'translations' => function ($query) use ($language) {

            if ($language) {
                $query->where(
                    'language_id',
                    $language->id
                );
            }

        },

        'user'
    ]);

        /*
        |--------------------------------------------------------------------------
        | Year Filter
        |--------------------------------------------------------------------------
        */

        if (
            $selectedYear &&
            $years->contains((int) $selectedYear)
        ) {

            $reports->whereYear(
                'report_date',
                $selectedYear
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Search Filter
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $reports->whereHas(
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
                            'summary',
                            'like',
                            '%' . $search . '%'
                        )

                        ->orWhere(
                            'completed_activities',
                            'like',
                            '%' . $search . '%'
                        )

                        ->orWhere(
                            'pending_activities',
                            'like',
                            '%' . $search . '%'
                        )

                        ->orWhere(
                            'challenges',
                            'like',
                            '%' . $search . '%'
                        )

                        ->orWhere(
                            'next_plan',
                            'like',
                            '%' . $search . '%'
                        );

                    });

                }
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Order + Pagination
        |--------------------------------------------------------------------------
        */

        $reports = $reports
            ->orderByDesc('report_date')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view(
            'website.activity-reports.index',
            compact(
                'reports',
                'years',
                'selectedYear',
                'search'
            )
        );
    }


    /**
     * Single Report
     */
    public function show($id)
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
        | Report
        |--------------------------------------------------------------------------
        */

        $report = ActivityReport::query()
            ->with([
                'translations' => function ($query) use ($language) {

                    if ($language) {

                        $query->where(
                            'language_id',
                            $language->id
                        );

                    }

                },

                'user'
            ])
            ->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | View
        |--------------------------------------------------------------------------
        */

        return view(
            'website.activity-reports.show',
            compact('report')
        );
    }
}
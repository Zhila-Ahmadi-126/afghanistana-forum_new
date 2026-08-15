<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // =========================
    // NEWS INDEX
    // =========================

    public function index(Request $request)
    {
        $query = News::with('translations')
            ->where('status', 'Published');

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->whereHas('translations', function ($q) use ($search) {

                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('summary', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%');

            });
        }

        // Date Filter
        if ($request->filled('date_filter')) {

            switch ($request->date_filter) {

                case 'day':
                    $query->where(
                        'published_at',
                        '>=',
                        now()->subDay()
                    );
                    break;

                case 'week':
                    $query->where(
                        'published_at',
                        '>=',
                        now()->subWeek()
                    );
                    break;

                case 'year':
                    $query->where(
                        'published_at',
                        '>=',
                        now()->subYear()
                    );
                    break;

                case 'two_years':
                    $query->where(
                        'published_at',
                        '>=',
                        now()->subYears(2)
                    );
                    break;
            }
        }

        // Maximum 10 News per page
        $news = $query
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view(
            'website.news.index',
            compact('news')
        );
    }


    // =========================
    // SINGLE NEWS
    // =========================

    public function show($id)
    {
        $news = News::with('translations')
            ->where('id', $id)
            ->where('status', 'Published')
            ->firstOrFail();

        return view(
            'website.news.show',
            compact('news')
        );
    }

   
}
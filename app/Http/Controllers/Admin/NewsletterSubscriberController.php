<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    /**
     * Display newsletter subscribers.
     */
    public function index(Request $request)
    {
        $subscribers = NewsletterSubscriber::query()

            ->when($request->search, function ($query) use ($request) {

                $query->where(
                    'email',
                    'like',
                    '%' . $request->search . '%'
                );

            })

            ->orderByDesc('created_at')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.newsletter_subscribers.index',
            compact('subscribers')
        );
    }
}
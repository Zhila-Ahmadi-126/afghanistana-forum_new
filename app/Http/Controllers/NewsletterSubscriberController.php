<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class NewsletterSubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ]);

        NewsletterSubscriber::firstOrCreate([
            'email' => $request->email,
        ]);

        return redirect()->route('newsletter.success');
    }
}
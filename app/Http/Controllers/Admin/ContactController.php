<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display all contact messages.
     */
    public function index(Request $request)
    {
        $contacts = Contact::query()

            ->when($request->search, function ($query) use ($request) {

                $query->where(function ($q) use ($request) {

                    $q->where('name', 'like', '%' . $request->search . '%')
                      ->orWhere('email', 'like', '%' . $request->search . '%')
                      ->orWhere('subject', 'like', '%' . $request->search . '%')
                      ->orWhere('message', 'like', '%' . $request->search . '%');

                });

            })

            ->when($request->status, function ($query) use ($request) {

                $query->where(
                    'status',
                    $request->status
                );

            })

            ->orderByDesc('created_at')

            ->paginate(10)

            ->withQueryString();

        return view(
            'admin.contacts.index',
            compact('contacts')
        );
    }
}
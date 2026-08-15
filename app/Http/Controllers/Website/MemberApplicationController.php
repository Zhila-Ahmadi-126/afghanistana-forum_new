<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MemberApplicationController extends Controller
{
    /**
     * Show membership application page
     */
    public function index()
    {
        return view('website.member_application');
    }

    /**
     * Submit membership application
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',

            'surname' => 'required|string|max:100',

            'date_of_birth' => 'required|date',

            'residence' => 'required|string|max:255',

            'postal_code' => 'required|string|max:50',

            'education' => 'required|string|max:255',

            'current_position' => 'required|string|max:255',

            'phone' => 'required|string|max:50',

            'email' => 'required|email|max:255',

            'legal_service_duration' => 'required|string|max:255',

            'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',

            'motivation' => 'required|string|max:5000',

            'description' => 'nullable|string|max:10000',

            'agreement' => 'accepted',
        ]);


        $photo = $request->file('photo');


        Mail::send(
            'emails.member_application',
            [
                'application' => $validated,
            ],
            function ($message) use ($validated, $photo) {

                $message->to('zilaamedi125@gmail.com')
                    ->subject(
                        'New Membership Application - '
                        . $validated['first_name']
                        . ' '
                        . $validated['surname']
                    );

                $message->attach(
                    $photo->getRealPath(),
                    [
                        'as' => $photo->getClientOriginalName(),
                        'mime' => $photo->getMimeType(),
                    ]
                );
            }
        );


        return back()->with(
            'success',
            'Your membership application has been submitted successfully.'
        );
    }
}
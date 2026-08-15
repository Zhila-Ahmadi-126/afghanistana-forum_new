<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function index()
    {
        return view('website.contact');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);


       $contact = Contact::create([
    'name' => $request->name,
    'email' => $request->email,
    'subject' => $request->subject,
    'message' => $request->message,
    'status' => 'unread',
]);



    Mail::to('zhilaahmadi125@gmail.com')
    ->send(new ContactMail($contact));



return redirect()
    ->route('contact')
    ->with('success', true);
    }
}
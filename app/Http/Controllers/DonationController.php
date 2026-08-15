<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display the donation page.
     */
    public function index()
    {
        return view('website.donation');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch($code)
    {
        $language = Language::where('code', $code)
            ->where('status', 'active')
            ->first();

        if (!$language) {

            return back();

        }

        Session::put('locale', $language->code);

        App::setLocale($language->code);

        return back();
    }
}
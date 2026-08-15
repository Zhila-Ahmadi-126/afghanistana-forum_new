<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalSystemCms;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Models\LegalSystemTranslation;
use Illuminate\Support\Str;
use App\Helpers\AuditHelper;
use Illuminate\Support\Facades\Auth;
class LegalSystemTranslationController extends Controller
{
   public function index(Request $request, LegalSystemCms $legalSystem)
{
    $languages = Language::orderBy('name')->get();

    $selectedLanguage = $request->language_id
        ?? $languages->first()->id;

    $translation = LegalSystemTranslation::where(
            'legal_system_id',
            $legalSystem->id
        )
        ->where(
            'language_id',
            $selectedLanguage
        )
        ->first();

    return view(
        'admin.legal-systems.translations',
        compact(
            'legalSystem',
            'languages',
            'translation',
            'selectedLanguage'
        )
    );
}
public function store(Request $request, LegalSystemCms $legalSystem)
{
    $request->validate([
        'language_id' => 'required|exists:languages,id',
        'title' => 'required|max:255',
        'summary' => 'nullable',
        'content' => 'nullable',
    ]);

    $translation = LegalSystemTranslation::updateOrCreate(

        [
            'legal_system_id' => $legalSystem->id,
            'language_id' => $request->language_id,
        ],
        [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'summary' => $request->summary,
            'content' => $request->content,
        ]

    );

    AuditHelper::log(

        Auth::user(),

        'legal_system_translations',

        'update',

        'Legal System Translation',

        $translation->id,

        $translation->title,

        'Saved translation'

    );

    return redirect()
        ->route(
            'admin.legal-systems.translations.index',
            [
                'legalSystem' => $legalSystem->id,
                'language_id' => $request->language_id,
            ]
        )
        ->with(
            'success',
            'Translation saved successfully.'
        );
}
public function destroy($legalSystem, $translation)
{

    $item = LegalSystemTranslation::find($translation);


    if(!$item){

        return back()->with('error','Translation not found');

    }


    $item->delete();


    return back()->with(
        'success',
        'Translation deleted successfully'
    );

}
}
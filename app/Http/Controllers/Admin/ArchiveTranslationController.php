<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveCms;
use App\Models\ArchiveTranslationCms;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchiveTranslationController extends Controller
{


    // ==========================================
    // TRANSLATION PAGE
    // ==========================================

    public function index($archiveId)
    {


        $archive = ArchiveCms::findOrFail($archiveId);



        $languages = Language::orderBy('name')->get();



        $languageId = request('language_id')
            ?? $languages->first()->id;



        $translation = ArchiveTranslationCms::where(

                'archive_id',

                $archiveId

            )
            ->where(

                'language_id',

                $languageId

            )
            ->first();




        return view(

            'admin.archives.translations',

            compact(

                'archive',

                'languages',

                'translation',

                'languageId'

            )

        );


    }





    // ==========================================
    // STORE / UPDATE TRANSLATION
    // ==========================================

    public function store(Request $request, $archiveId)
    {


        $request->validate([

            'language_id'=>'required',

            'name'=>'required',

        ]);





        ArchiveTranslationCms::updateOrCreate(

            [

                'archive_id'=>$archiveId,

                'language_id'=>$request->language_id,

            ],


            [

                'name'=>$request->name,

                'short_description'=>$request->short_description,

                'description'=>$request->description,

                'meta_title'=>$request->meta_title,

                'meta_description'=>$request->meta_description,

                'created_by'=>Auth::id(),

            ]

        );





        return back()->with(

            'success',

            'Translation saved successfully'

        );


    }







    // ==========================================
    // DELETE TRANSLATION
    // ==========================================

    public function destroy($archiveId,$translationId)
    {


        $translation = ArchiveTranslationCms::findOrFail($translationId);



        $translation->delete();




        return back()->with(

            'success',

            'Translation deleted successfully'

        );


    }


}
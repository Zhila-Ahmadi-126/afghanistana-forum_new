<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnnouncementCms;
use App\Models\AnnouncementTranslation;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementTranslationController extends Controller
{


    // ==========================================
    // TRANSLATION PAGE
    // ==========================================

    public function index($announcementId)
    {

           
        $announcement = AnnouncementCms::findOrFail($announcementId);



        $languages = Language::orderBy('name')->get();



        $languageId = request('language_id')
            ?? $languages->first()->id;



        $translation = AnnouncementTranslation::where(
                'announcement_id',
                $announcementId
            )
            ->where(
                'language_id',
                $languageId
            )
            ->first();



        return view(
            'admin.announcements.translations',
            compact(
                'announcement',
                'languages',
                'translation',
                'languageId'
            )
        );


    }






    // ==========================================
    // STORE TRANSLATION
    // ==========================================

    public function store(Request $request, $announcementId)
    {


        $request->validate([

            'language_id'=>'required',

            'title'=>'required'

        ]);




     AnnouncementTranslation::updateOrCreate(

        [
            'announcement_id'=>$announcementId,
            'language_id'=>$request->language_id
        ],

        [
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'meta_title'=>$request->meta_title,
            'meta_description'=>$request->meta_description,
            'created_by'=>Auth::id()
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

    public function destroy($announcementId,$translationId)
    {


        $translation = AnnouncementTranslation::findOrFail($translationId);



        $translation->delete();




        return back()->with(

            'success',

            'Translation deleted successfully'

        );


    }


}
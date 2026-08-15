<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\MediaCms;

use App\Models\MediaTranslationCms;

use App\Models\Language;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class MediaTranslationController extends Controller
{





    // ==========================================
    // TRANSLATION PAGE
    // ==========================================


    public function index($mediaId)
    {



        $media = MediaCms::findOrFail($mediaId);





        $languages = Language::orderBy('name')->get();







        $languageId = request('language_id')

            ?? $languages->first()->id;







        $translation = MediaTranslationCms::where(

                'media_id',

                $mediaId

            )

            ->where(

                'language_id',

                $languageId

            )

            ->first();







        return view(

            'admin.media.translations',

            compact(

                'media',

                'languages',

                'translation',

                'languageId'

            )

        );



    }









    // ==========================================
    // STORE / UPDATE TRANSLATION
    // ==========================================


    public function store(Request $request,$mediaId)
    {



        $request->validate([


            'language_id'=>'required',


            'title'=>'required',



        ]);








        MediaTranslationCms::updateOrCreate(



            [


                'media_id'=>$mediaId,


                'language_id'=>$request->language_id,



            ],




            [


                'title'=>$request->title,


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


    public function destroy($mediaId,$translationId)
    {



        $translation = MediaTranslationCms::findOrFail(

            $translationId

        );






        $translation->delete();






        return back()->with(

            'success',

            'Translation deleted successfully'

        );



    }






}
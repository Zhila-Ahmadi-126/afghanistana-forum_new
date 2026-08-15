<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use App\Models\LegalFileCms;
use App\Models\LegalFileTranslation;
use App\Models\LegalCategoryCms;
use App\Models\Language;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;





class LegalFileController extends Controller
{





/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/


public function index()
{


    $files = LegalFileCms::with([

        'translations.language',

        'category.translations',

        'creator'

    ])

    ->orderBy('sort_order')

    ->latest()

    ->paginate(10);




    return view(

        'admin.legal_files.index',

        compact('files')

    );


}









/*
|--------------------------------------------------------------------------
| CREATE
|--------------------------------------------------------------------------
*/


public function create()
{


    $categories = LegalCategoryCms::with('translations')

        ->get();



    $languages = Language::all();




    return view(

        'admin.legal_files.create',

        compact(

            'categories',

            'languages'

        )

    );


}









/*
|--------------------------------------------------------------------------
| STORE
|--------------------------------------------------------------------------
*/

public function store(Request $request)
{

    $request->validate([

        'legal_category_id' => 'required|exists:legal_categories_cms,id',

        'title' => 'required|string|max:255',

        'status' => 'required|in:draft,published,archived',

        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'pdf_file' => 'nullable|mimes:pdf|max:10240',

        'file_url' => 'nullable|url',

        'sort_order' => 'nullable|integer',

    ],[

        'legal_category_id.required'
            =>
        'Please select a legal category.',


        'legal_category_id.exists'
            =>
        'Selected legal category is invalid.',


        'title.required'
            =>
        'Please enter legal file title.',


        'status.required'
            =>
        'Please select status.',


        'status.in'
            =>
        'Selected status is not valid.',


        'image.image'
            =>
        'Uploaded file must be an image.',


        'image.mimes'
            =>
        'Only JPG, JPEG, PNG and WEBP images are allowed.',


        'pdf_file.mimes'
            =>
        'Only PDF files are allowed.',


        'file_url.url'
            =>
        'Please enter a valid URL.',


        'sort_order.integer'
            =>
        'Sort order must be a number.',

    ]);

if(!Auth::check()){

    return back()

        ->withInput()

        ->with(
            'error',
            'Your session has expired. Please login again.'
        );

}


    DB::beginTransaction();


    try{


        $imagePath = null;


        if($request->hasFile('image')){


            $imagePath = $request->file('image')
                ->store(
                    'legal_files',
                    'public'
                );

        }





        $pdfPath = null;


        if($request->hasFile('pdf_file')){


            $pdfPath = $request->file('pdf_file')
                ->store(
                    'legal_files/pdf',
                    'public'
                );

        }






        $file = LegalFileCms::create([


            'legal_category_id'
                =>
            $request->legal_category_id,


            'image'
                =>
            $imagePath,


            'pdf_file'
                =>
            $pdfPath,


            'file_url'
                =>
            $request->file_url,


            'status'
                =>
            $request->status,


            'sort_order'
                =>
            $request->sort_order ?? 0,


            'created_by'
                =>
            Auth::id(),


        ]);






        $english = Language::where('code','en')->first();



        if($english){


            LegalFileTranslation::create([


                'legal_file_id'
                    =>
                $file->id,


                'language_id'
                    =>
                $english->id,


                'title'
                    =>
                $request->title,


                'short_description'
                    =>
                $request->short_description,


                'description'
                    =>
                $request->description,


                'meta_title'
                    =>
                $request->meta_title,


                'meta_description'
                    =>
                $request->meta_description,


                'created_by'
                    =>
                Auth::id(),

            ]);

        }





        DB::commit();



        return redirect()

            ->route('admin.legal_files.index')

            ->with(
                'success',
                'Legal file created successfully.'
            );


    }


  catch(\Exception $e){

    DB::rollBack();

    dd($e->getMessage());

}

}
/*
|--------------------------------------------------------------------------
| TRANSLATION
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| TRANSLATION
|--------------------------------------------------------------------------
*/

public function translation(Request $request, $id)
{

    $file = LegalFileCms::findOrFail($id);

    $languages = Language::orderBy('name')->get();


    $selectedLanguageId = $request->get('language_id');

    if (!$selectedLanguageId) {

        $english = Language::where('code', 'en')->first();

        if ($english) {
            $selectedLanguageId = $english->id;
        } else {
            $selectedLanguageId = $languages->first()?->id;
        }
    }


    $translation = LegalFileTranslation::where(
            'legal_file_id',
            $file->id
        )
        ->where(
            'language_id',
            $selectedLanguageId
        )
        ->first();


    return view(

        'admin.legal_files.translation',

        compact(
            'file',
            'languages',
            'translation',
            'selectedLanguageId'
        )

    );

}


/*
|--------------------------------------------------------------------------
| SAVE TRANSLATION
|--------------------------------------------------------------------------
*/


public function saveTranslation(Request $request,$id)
{


    $request->validate([



        'language_id'
            =>
        'required|exists:languages,id',



        'title'
            =>
        'required|string|max:255',



    ],[



        'language_id.required'
            =>
        'Please select language.',




        'title.required'
            =>
        'Please enter title.',



    ]);






LegalFileTranslation::updateOrCreate(

    [
        'legal_file_id' => $id,
        'language_id'   => $request->language_id,
    ],

    [
        'title'             => $request->title,
        'short_description' => $request->short_description,
        'description'       => $request->description,
        'meta_title'        => $request->meta_title,
        'meta_description'  => $request->meta_description,
        'created_by'        => Auth::id(),
    ]

);






    return redirect()



        ->route(



            'admin.legal_files.translation',



            [



                'id'=>$id,



                'language_id'=>$request->language_id



            ]



        )



        ->with(



            'success',



            'Translation saved successfully.'



        );



}




/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{

    $file = LegalFileCms::findOrFail($id);


    $categories = LegalCategoryCms::with('translations')
        ->get();



    return view(

        'admin.legal_files.edit',

        compact(

            'file',

            'categories'

        )

    );

}
/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/

public function update(Request $request,$id)
{

    $file = LegalFileCms::findOrFail($id);



    $request->validate([


        'legal_category_id'
            =>
        'required|exists:legal_categories_cms,id',



        'status'
            =>
        'required|in:draft,published,archived',



        'image'
            =>
        'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',



        'pdf_file'
            =>
        'nullable|mimes:pdf|max:10240',



        'file_url'
            =>
        'nullable|url',



        'sort_order'
            =>
        'nullable|integer',



    ],[


        'legal_category_id.required'
            =>
        'Please select legal category.',


        'status.required'
            =>
        'Please select status.',


        'image.image'
            =>
        'Uploaded file must be an image.',


        'pdf_file.mimes'
            =>
        'Only PDF files are allowed.',


        'file_url.url'
            =>
        'Please enter a valid URL.',


    ]);





    DB::beginTransaction();


    try{


        /*
        |--------------------------------------------------------------------------
        | DELETE OLD IMAGE
        |--------------------------------------------------------------------------
        */


        if($request->hasFile('image')){


            if(
                $file->image &&
                File::exists(
                    storage_path(
                        'app/public/'.$file->image
                    )
                )
            ){

                File::delete(
                    storage_path(
                        'app/public/'.$file->image
                    )
                );

            }



            $file->image =
                $request->file('image')
                ->store(
                    'legal_files',
                    'public'
                );


        }






        /*
        |--------------------------------------------------------------------------
        | DELETE OLD PDF
        |--------------------------------------------------------------------------
        */


        if($request->hasFile('pdf_file')){


            if(
                $file->pdf_file &&
                File::exists(
                    storage_path(
                        'app/public/'.$file->pdf_file
                    )
                )
            ){

                File::delete(
                    storage_path(
                        'app/public/'.$file->pdf_file
                    )
                );

            }




            $file->pdf_file =
                $request->file('pdf_file')
                ->store(
                    'legal_files/pdf',
                    'public'
                );


        }






        $file->update([


            'legal_category_id'
                =>
            $request->legal_category_id,


            'file_url'
                =>
            $request->file_url,


            'status'
                =>
            $request->status,


            'sort_order'
                =>
            $request->sort_order ?? 0,


        ]);






        DB::commit();



        return redirect()

            ->route(
                'admin.legal_files.index'
            )

            ->with(

                'success',

                'Legal file updated successfully.'

            );



    }



    catch(\Exception $e){


        DB::rollBack();


        return back()

            ->withInput()

            ->with(

                'error',

                'Unable to update legal file. Please try again.'

            );


    }


}




/*
|--------------------------------------------------------------------------
| DELETE TRANSLATION
|--------------------------------------------------------------------------
*/


public function deleteTranslation($id)
{


    LegalFileTranslation::findOrFail($id)

        ->delete();





    return back()

        ->with(

            'success',

            'Translation deleted successfully.'

        );



}









/*
|--------------------------------------------------------------------------
| DELETE LEGAL FILE
|--------------------------------------------------------------------------
*/


public function destroy($id)
{


    DB::beginTransaction();



    try{



        $file = LegalFileCms::findOrFail($id);







        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGE
        |--------------------------------------------------------------------------
        */



        if(


            $file->image &&



            File::exists(


                storage_path(


                    'app/public/'.$file->image


                )


            )



        ){



            File::delete(


                storage_path(


                    'app/public/'.$file->image


                )


            );



        }









        /*
        |--------------------------------------------------------------------------
        | DELETE PDF
        |--------------------------------------------------------------------------
        */


        if(


            $file->pdf_file &&



            File::exists(


                storage_path(


                    'app/public/'.$file->pdf_file


                )


            )



        ){



            File::delete(


                storage_path(


                    'app/public/'.$file->pdf_file


                )


            );



        }








        /*
        |--------------------------------------------------------------------------
        | DELETE TRANSLATIONS
        |--------------------------------------------------------------------------
        */


        LegalFileTranslation::where(


            'legal_file_id',


            $id



        )->delete();









        /*
        |--------------------------------------------------------------------------
        | DELETE FILE RECORD
        |--------------------------------------------------------------------------
        */


        $file->delete();








        DB::commit();





        return redirect()

            ->route(

                'admin.legal_files.index'

            )

            ->with(

                'success',

                'Legal file deleted successfully.'

            );




    }


    catch(\Exception $e){



        DB::rollBack();



        return back()

            ->with(

                'error',

                $e->getMessage()

            );



    }



}



}
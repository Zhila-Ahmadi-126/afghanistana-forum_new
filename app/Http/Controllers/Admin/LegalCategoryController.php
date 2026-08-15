<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\LegalCategoryCms;
use App\Models\LegalCategoryTranslation;
use App\Models\LegalDocumentCms;
use App\Models\Language;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;




class LegalCategoryController extends Controller
{



    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $categories = LegalCategoryCms::with([

            'translations.language',
            'document.translations',
            'parent.translations'

        ])
        ->orderBy('sort_order')
        ->latest()
        ->paginate(10);



        return view(

            'admin.legal_categories.index',

            compact('categories')

        );


    }








    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {


        $documents = LegalDocumentCms::with('translations')
            ->get();



        $parents = LegalCategoryCms::with('translations')
            ->get();



        $languages = Language::all();



        return view(

            'admin.legal_categories.create',

            compact(
                'documents',
                'parents',
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

        'legal_document_id' => 'required|exists:legal_documents_cms,id',

        'title'             => 'required|string|max:255',

        'status'            => 'required|in:draft,published,archived',

        'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'pdf_file'          => 'nullable|mimes:pdf|max:10240',

        'sort_order'        => 'nullable|integer|min:0',

    ],[

        'legal_document_id.required' => 'Please select legal document.',

        'title.required'             => 'Please enter title.',

        'status.required'            => 'Please select status.',

        'image.image'                => 'Selected file must be an image.',

        'pdf_file.mimes'             => 'Only PDF file is allowed.',

    ]);



    DB::beginTransaction();

    try{


        $imagePath = null;

        if($request->hasFile('image')){

            $imagePath = $request
                ->file('image')
                ->store('legal_categories','public');

        }



        $pdfPath = null;

        if($request->hasFile('pdf_file')){

            $pdfPath = $request
                ->file('pdf_file')
                ->store('legal_categories/pdf','public');

        }



        $category = LegalCategoryCms::create([

            'legal_document_id' => $request->legal_document_id,

            'parent_id'         => $request->parent_id,

            'image'             => $imagePath,

            'pdf_file'          => $pdfPath,

            'status'            => $request->status,

            'sort_order'        => $request->sort_order ?? 0,

            'created_by'        => Auth::id(),

        ]);



        /*
        |-------------------------------------------------------
        | English Translation (Default)
        |-------------------------------------------------------
        */

        $english = Language::where('code','en')->first();

        if($english){

            LegalCategoryTranslation::create([

                'legal_category_id' => $category->id,

                'language_id'       => $english->id,

                'title'             => $request->title,

                'short_description' => $request->short_description,

                'description'       => $request->description,

                'meta_title'        => $request->meta_title,

                'meta_description'  => $request->meta_description,

                'created_by'        => Auth::id(),

            ]);

        }



        DB::commit();

        return redirect()
            ->route('admin.legal_categories.index')
            ->with('success','Legal Category created successfully.');

    }

    catch(\Exception $e){

        DB::rollBack();

        return back()
            ->withInput()
            ->with('error',$e->getMessage());

    }

}




    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

  public function edit($id)
{

    $category = LegalCategoryCms::with([

        'translations.language'

    ])
    ->findOrFail($id);



    $documents = LegalDocumentCms::with('translations')
        ->get();



    $parents = LegalCategoryCms::where(
        'id',
        '!=',
        $id
    )
    ->with('translations')
    ->get();



    $translation = $category->translations()
        ->whereHas('language',function($q){

            $q->where('code','en');

        })
        ->first();



    return view(

        'admin.legal_categories.edit',

        compact(

            'category',

            'documents',

            'parents',

            'translation'

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

    $category = LegalCategoryCms::findOrFail($id);



    $request->validate([

        'legal_document_id' => 'required|exists:legal_documents_cms,id',

        'status' => 'required|in:draft,published,archived',

        'sort_order' => 'nullable|integer',

        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'pdf_file' => 'nullable|mimes:pdf|max:10240',

    ],[

        'legal_document_id.required'=>'Please select legal document.',

        'status.required'=>'Please select status.',

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

                $category->image &&

                File::exists(
                    storage_path(
                        'app/public/'.$category->image
                    )
                )

            ){

                File::delete(
                    storage_path(
                        'app/public/'.$category->image
                    )
                );


            }



            $category->image =
                $request
                ->file('image')
                ->store(
                    'legal_categories',
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

                $category->pdf_file &&

                File::exists(
                    storage_path(
                        'app/public/'.$category->pdf_file
                    )
                )

            ){

                File::delete(
                    storage_path(
                        'app/public/'.$category->pdf_file
                    )
                );


            }




            $category->pdf_file =
                $request
                ->file('pdf_file')
                ->store(
                    'legal_categories/pdf',
                    'public'
                );


        }







        $category->update([


            'legal_document_id'=>$request->legal_document_id,


            'parent_id'=>$request->parent_id,


            'status'=>$request->status,


            'sort_order'=>$request->sort_order ?? 0,



        ]);





        DB::commit();



        return redirect()

            ->route(
                'admin.legal_categories.index'
            )

            ->with(
                'success',
                'Legal category updated successfully.'
            );



    }
    catch(\Exception $e){


        DB::rollBack();



        return back()

            ->withInput()

            ->with(
                'error',
                $e->getMessage()
            );


    }


}

// translation  

public function translation(Request $request, $id)
{

    $category = LegalCategoryCms::findOrFail($id);



    // لیست تمام زبان ها
    $languages = Language::all();



    $translation = null;



    $languageId = $request->get('language_id');



    if($languageId){


        $translation = LegalCategoryTranslation::where(

            'legal_category_id',

            $id

        )
        ->where(

            'language_id',

            $languageId

        )
        ->first();


    }



    return view(

        'admin.legal_categories.translation',

        compact(

            'category',

            'languages',

            'translation'

        )

    );


}

    /*
    |--------------------------------------------------------------------------
    | SAVE TRANSLATION
    |--------------------------------------------------------------------------
    */

  public function saveTranslation(Request $request, $id)
{

    $request->validate([

        'language_id' => 'required|exists:languages,id',

        'title' => 'required|string|max:255',

    ],[

        'language_id.required'=>'Please select language.',

        'title.required'=>'Please enter title.',

    ]);



    LegalCategoryTranslation::updateOrCreate(

        [

            'legal_category_id'=>$id,

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




    return redirect()

        ->route(

            'admin.legal_categories.translation',

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
    | DELETE TRANSLATION
    |--------------------------------------------------------------------------
    */

    public function deleteTranslation($id)
    {


        LegalCategoryTranslation::findOrFail($id)
            ->delete();



        return back()->with(

            'success',

            'Translation deleted successfully.'

        );


    }









    /*
    |--------------------------------------------------------------------------
    | DELETE CATEGORY
    |--------------------------------------------------------------------------
    */

   /*
|--------------------------------------------------------------------------
| DELETE CATEGORY
|--------------------------------------------------------------------------
*/

public function destroy($id)
{

    DB::beginTransaction();


    try{


        $category = LegalCategoryCms::findOrFail($id);





        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGE
        |--------------------------------------------------------------------------
        */


        if(

            $category->image &&

            File::exists(
                storage_path(
                    'app/public/'.$category->image
                )
            )

        ){


            File::delete(

                storage_path(
                    'app/public/'.$category->image
                )

            );


        }








        /*
        |--------------------------------------------------------------------------
        | DELETE PDF
        |--------------------------------------------------------------------------
        */


        if(

            $category->pdf_file &&

            File::exists(
                storage_path(
                    'app/public/'.$category->pdf_file
                )
            )

        ){


            File::delete(

                storage_path(
                    'app/public/'.$category->pdf_file
                )

            );


        }







        /*
        |--------------------------------------------------------------------------
        | DELETE TRANSLATIONS
        |--------------------------------------------------------------------------
        */


        LegalCategoryTranslation::where(

            'legal_category_id',

            $id

        )->delete();








        /*
        |--------------------------------------------------------------------------
        | DELETE CATEGORY
        |--------------------------------------------------------------------------
        */


        $category->delete();






        DB::commit();




        return redirect()

            ->route(
                'admin.legal_categories.index'
            )

            ->with(
                'success',
                'Legal category deleted successfully.'
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
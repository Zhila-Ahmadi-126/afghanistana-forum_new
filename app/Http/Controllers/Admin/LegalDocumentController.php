<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use App\Models\LegalDocumentCms;
use App\Models\LegalDocumentTranslationCms;
use App\Models\LegalSystemCms;
use App\Models\Language;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


use App\Helpers\AuditHelper;



class LegalDocumentController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {


        $documents = LegalDocumentCms::with([

            'legalSystem',

            'translations.language'

        ]);





        // SEARCH

        if($request->search)
        {

            $documents->whereHas(

                'translations',

                function($query) use($request){

                    $query->where(

                        'title',

                        'like',

                        '%' . $request->search . '%'

                    );

                }

            );

        }






        // STATUS FILTER

        if($request->status)
        {

            $documents->where(

                'status',

                $request->status

            );

        }






        $documents = $documents

            ->latest()

            ->paginate(10)

            ->withQueryString();







        return view(

            'admin.legal_documents.index',

            compact('documents')

        );


    }









    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {


        $legalSystems = LegalSystemCms::with('translations')

            ->where('status','active')

            ->get();



        $languages = Language::where('status','active')

            ->orderByRaw(
                "CASE WHEN code='en' THEN 1 ELSE 2 END"
            )

            ->orderBy('name')

            ->get();





        return view(

            'admin.legal_documents.create',

            compact(

                'legalSystems',

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



            'legal_system_id'=>[

                'required',

                'exists:legal_systems_cms,id'

            ],





            'cover_image'=>[

                'nullable',

                'image',

                'mimes:jpg,jpeg,png,webp',

                'max:2048'

            ],





            'pdf_file'=>[

                'nullable',

                'mimes:pdf',

                'max:10000'

            ],





            'status'=>[

                'required',

                'in:draft,published,archived'

            ],






            'language_id'=>[

                'required',

                'exists:languages,id'

            ],





            'title'=>[

                'required',

                'max:255'

            ]



        ]);








        DB::beginTransaction();




        try{






            $imagePath = null;


            if($request->hasFile('cover_image'))
            {


                $imagePath = $request

                    ->file('cover_image')

                    ->store(

                        'uploads/legal_documents/images',

                        'public'

                    );


            }







            $pdfPath = null;


            if($request->hasFile('pdf_file'))
            {


                $pdfPath = $request

                    ->file('pdf_file')

                    ->store(

                        'uploads/legal_documents/pdf',

                        'public'

                    );


            }







            $document = LegalDocumentCms::create([



                'legal_system_id'=>$request->legal_system_id,


                'cover_image'=>$imagePath,


                'pdf_file'=>$pdfPath,


                'status'=>$request->status,


                'created_by'=>Auth::id()



            ]);








            LegalDocumentTranslationCms::create([



                'legal_document_id'=>$document->id,


                'language_id'=>$request->language_id,


                'title'=>$request->title,


                'summary'=>$request->summary,


                'content'=>$request->content,


                'seo_title'=>$request->seo_title,


                'seo_description'=>$request->seo_description



            ]);








            AuditHelper::log(



                Auth::user(),



                'legal_documents_cms',



                'insert',



                'Legal Documents',



                $document->id,



                $request->title,



                'New legal document created.'



            );








            DB::commit();





            return redirect()

                ->route(

                    'admin.legal_documents.index'

                )

                ->with(

                    'success',

                    'Legal document created successfully.'

                );





        }



        catch(\Exception $e)

        {



            DB::rollBack();



            return back()

                ->withInput()

                ->with(

                    'error',

                    $e->getMessage()

                );


        }



    }
        /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {

        $document = LegalDocumentCms::with('translations')
            ->findOrFail($id);



        $legalSystems = LegalSystemCms::with('translations')
            ->where('status','active')
            ->get();



        return view(
            'admin.legal_documents.edit',
            compact(
                'document',
                'legalSystems'
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


        $request->validate([


            'legal_system_id'=>[
                'required',
                'exists:legal_systems_cms,id'
            ],


            'status'=>[
                'required',
                'in:draft,published,archived'
            ]

        ]);




        DB::beginTransaction();



        try{


            $document = LegalDocumentCms::findOrFail($id);




            if($request->hasFile('cover_image'))
            {


                if(
                    $document->cover_image &&
                    File::exists(
                        public_path(
                            'storage/'.$document->cover_image
                        )
                    )
                ){

                    File::delete(
                        public_path(
                            'storage/'.$document->cover_image
                        )
                    );

                }



                $document->cover_image =
                    $request
                    ->file('cover_image')
                    ->store(
                        'uploads/legal_documents/images',
                        'public'
                    );

            }







            if($request->hasFile('pdf_file'))
            {


                if(
                    $document->pdf_file &&
                    File::exists(
                        public_path(
                            'storage/'.$document->pdf_file
                        )
                    )
                ){

                    File::delete(
                        public_path(
                            'storage/'.$document->pdf_file
                        )
                    );

                }



                $document->pdf_file =
                    $request
                    ->file('pdf_file')
                    ->store(
                        'uploads/legal_documents/pdf',
                        'public'
                    );

            }






            $document->update([


                'legal_system_id'=>$request->legal_system_id,


                'status'=>$request->status


            ]);








            AuditHelper::log(


                Auth::user(),


                'legal_documents_cms',


                'update',


                'Legal Documents',


                $document->id,


                optional(
                    $document->translations->first()
                )->title,


                'Legal document updated.'


            );






            DB::commit();



            return redirect()

                ->route(
                    'admin.legal_documents.index'
                )

                ->with(
                    'success',
                    'Legal document updated successfully.'
                );



        }


        catch(\Exception $e)

        {


            DB::rollBack();


            return back()

                ->withInput()

                ->with(
                    'error',
                    $e->getMessage()
                );


        }


    }









    /*
    |--------------------------------------------------------------------------
    | TRANSLATION
    |--------------------------------------------------------------------------
    */

    public function translation($id, Request $request)
    {


        $document = LegalDocumentCms::findOrFail($id);



        $languages = Language::where('status','active')

            ->orderByRaw(
                "CASE WHEN code='en' THEN 1 ELSE 2 END"
            )

            ->orderBy('name')

            ->get();





        $languageId = $request->language_id;



        if(!$languageId)
        {

            $languageId = Language::where(
                'code',
                'en'
            )->value('id');

        }






        $translation = LegalDocumentTranslationCms::where(

                'legal_document_id',

                $id

            )

            ->where(

                'language_id',

                $languageId

            )

            ->first();






        return view(

            'admin.legal_documents.translation',

            compact(

                'document',

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

    public function saveTranslation(Request $request,$id)
    {


        $request->validate([


            'language_id'=>[
                'required',
                'exists:languages,id'
            ],


            'title'=>[
                'required',
                'max:255'
            ]


        ]);




        LegalDocumentTranslationCms::updateOrCreate(



            [

                'legal_document_id'=>$id,

                'language_id'=>$request->language_id

            ],



            [

                'title'=>$request->title,

                'summary'=>$request->summary,

                'content'=>$request->content,

                'seo_title'=>$request->seo_title,

                'seo_description'=>$request->seo_description

            ]



        );







        return redirect()

            ->route(

                'admin.legal_documents.translation',

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

    public function deleteTranslation($translation)
    {


        $item = LegalDocumentTranslationCms::findOrFail($translation);


        $item->delete();



        return back()

            ->with(

                'success',

                'Translation deleted successfully.'

            );


    }








    /*
    |--------------------------------------------------------------------------
    | DELETE DOCUMENT
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {


        DB::beginTransaction();


        try{


            $document = LegalDocumentCms::findOrFail($id);



            if($document->cover_image)
            {

                File::delete(
                    public_path(
                        'storage/'.$document->cover_image
                    )
                );

            }



            if($document->pdf_file)
            {

                File::delete(
                    public_path(
                        'storage/'.$document->pdf_file
                    )
                );

            }





            LegalDocumentTranslationCms::where(

                'legal_document_id',

                $id

            )->delete();






            $document->delete();







            AuditHelper::log(


                Auth::user(),


                'legal_documents_cms',


                'delete',


                'Legal Documents',


                $id,


                'Legal Document',


                'Legal document deleted.'


            );






            DB::commit();





            return back()

                ->with(

                    'success',

                    'Legal document deleted successfully.'

                );



        }



        catch(\Exception $e)

        {


            DB::rollBack();


            return back()

                ->with(

                    'error',

                    $e->getMessage()

                );


        }



    }


}
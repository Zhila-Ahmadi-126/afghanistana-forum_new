<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\AcademyDepartmentCms;
use App\Models\AcademyDepartmentTranslationCms;
use App\Models\Language;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AcademyDepartmentController extends Controller{


/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index()
{

    $departments = AcademyDepartmentCms::with([

        'translations.language',

        'creator'

    ])

    ->orderBy('id','DESC')

    ->paginate(10);



    return view(

        'admin.academy_departments.index',

        compact(

            'departments'

        )

    );

}










/*
|--------------------------------------------------------------------------
| CREATE
|--------------------------------------------------------------------------
*/

public function create()
{

    $languages = Language::orderBy(

        'name'

    )->get();




    return view(

        'admin.academy_departments.create',

        compact(

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

        'code'
            =>
        'required|string|max:100|unique:academy_departments_cms,code',

        'title'
            =>
        'required|string|max:255',

       'status'
             =>
            'required|in:active,inactive',

        'icon'
            =>
        'nullable|string|max:255',

        'image'
            =>
        'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    ],[

        'code.required'
            =>
        'Please enter department code.',

        'code.unique'
            =>
        'Department code already exists.',

        'title.required'
            =>
        'Please enter department title.',

        'status.required'
            =>
        'Please select status.',

    ]);



    DB::beginTransaction();

    try{


        $imagePath = null;


        if($request->hasFile('image')){

            $imagePath = $request

                ->file('image')

                ->store(

                    'academy_departments',

                    'public'

                );

        }




        $department = AcademyDepartmentCms::create([

            'code'
                =>
            $request->code,

            'icon'
                =>
            $request->icon,

            'image'
                =>
            $imagePath,

            'status'
                =>
            $request->status,

            'is_featured'
                =>
            $request->has('is_featured') ? 1 : 0,

            'created_by'
                =>
            Auth::id(),

        ]);





        $english = Language::where(

            'code',

            'en'

        )->first();




        if($english){

            AcademyDepartmentTranslationCms::create([

                'department_id'
                    =>
                $department->id,

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

            ->route(

                'admin.academy_departments.index'

            )

            ->with(

                'success',

                'Academy department created successfully.'

            );



    }

   catch(\Exception $e){

    DB::rollBack();

    dd($e->getMessage());

}

}
/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{

    $department = AcademyDepartmentCms::findOrFail($id);


    return view(

        'admin.academy_departments.edit',

        compact(

            'department'

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


    $department = AcademyDepartmentCms::findOrFail($id);




    $request->validate([



        'code'
            =>
        'required|string|max:100|unique:academy_departments_cms,code,'.$id,



        'status'
          =>
        'required|in:active,inactive',


        'icon'
            =>
        'nullable|string|max:255',



        'image'
            =>
        'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',



    ],[



        'code.required'
            =>
        'Please enter department code.',



        'status.required'
            =>
        'Please select status.',



    ]);





    DB::beginTransaction();



    try{



        $imagePath = $department->image;





        if($request->hasFile('image')){



            if(

                $department->image &&

                File::exists(

                    storage_path(

                        'app/public/'.$department->image

                    )

                )

            ){


                File::delete(

                    storage_path(

                        'app/public/'.$department->image

                    )

                );


            }






            $imagePath = $request

                ->file('image')

                ->store(

                    'academy_departments',

                    'public'

                );



        }








        $department->update([



            'code'
                =>
            $request->code,



            'icon'
                =>
            $request->icon,



            'image'
                =>
            $imagePath,



            'status'
                =>
            $request->status,



            'is_featured'
                =>
            $request->has('is_featured') ? 1 : 0,



        ]);








        DB::commit();





        return redirect()

            ->route(

                'admin.academy_departments.index'

            )

            ->with(

                'success',

                'Academy department updated successfully.'

            );





    }


    catch(\Exception $e){



        DB::rollBack();



        return back()

            ->withInput()

            ->with(

                'error',

                'Unable to update academy department.'

            );



    }



}
/*
|--------------------------------------------------------------------------
| TRANSLATION
|--------------------------------------------------------------------------
*/

public function translation(Request $request,$id)
{

    $department = AcademyDepartmentCms::findOrFail($id);



    $languages = Language::all();



    $translation = null;



    $languageId = $request->get('language_id');



    if($languageId){


        $translation = AcademyDepartmentTranslationCms::where(

            'department_id',

            $id

        )

        ->where(

            'language_id',

            $languageId

        )

        ->first();


    }



    return view(

        'admin.academy_departments.translation',

        compact(

            'department',

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





    AcademyDepartmentTranslationCms::updateOrCreate(


        [


            'department_id'
                =>
            $id,


            'language_id'
                =>
            $request->language_id,


        ],


        [


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


        ]


    );



    return redirect()

        ->route(

            'admin.academy_departments.translation',

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

    AcademyDepartmentTranslationCms::findOrFail($id)

        ->delete();



    return back()

        ->with(

            'success',

            'Translation deleted successfully.'

        );

}







/*
|--------------------------------------------------------------------------
| DELETE ACADEMY DEPARTMENT
|--------------------------------------------------------------------------
*/

public function destroy($id)
{

    DB::beginTransaction();



    try{


        $department = AcademyDepartmentCms::findOrFail($id);




        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGE
        |--------------------------------------------------------------------------
        */


        if(

            $department->image &&

            File::exists(

                storage_path(

                    'app/public/'.$department->image

                )

            )

        ){


            File::delete(

                storage_path(

                    'app/public/'.$department->image

                )

            );


        }






        /*
        |--------------------------------------------------------------------------
        | DELETE TRANSLATIONS
        |--------------------------------------------------------------------------
        */


        AcademyDepartmentTranslationCms::where(

            'department_id',

            $id

        )->delete();







        /*
        |--------------------------------------------------------------------------
        | DELETE RECORD
        |--------------------------------------------------------------------------
        */


        $department->delete();






        DB::commit();





        return redirect()

            ->route(

                'admin.academy_departments.index'

            )

            ->with(

                'success',

                'Academy department deleted successfully.'

            );



    }


    catch(\Exception $e){



        DB::rollBack();



        return back()

            ->with(

                'error',

                'Unable to delete academy department.'

            );

    }


}
}
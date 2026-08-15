<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use App\Models\AcademyClassCms;
use App\Models\AcademyClassTranslationCms;
use App\Models\AcademyDepartmentCms;
use App\Models\User;
use App\Models\Language;
use App\Models\AcademyTeacherCms;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;



class AcademyClassController extends Controller
{



/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/




public function index(Request $request)
{

    $classes = AcademyClassCms::with([

        'translations.language',
        'department.translations',
        'teacher',
        'creator'

    ]);



    if($request->search){


        $classes->where(

            'class_code',

            'like',

            '%'.$request->search.'%'

        );


    }




    if($request->status){


        $classes->where(

            'status',

            $request->status

        );


    }





    $classes = $classes

        ->latest()

        ->paginate(10)

        ->withQueryString();





    return view(

        'admin.academy_classes.index',

        compact('classes')

    );

}




/*
|--------------------------------------------------------------------------
| CREATE
|--------------------------------------------------------------------------
*/
public function create()
{

    $departments = AcademyDepartmentCms::with('translations')->get();

    $teachers = AcademyTeacherCms::where('status','active')
                    ->orderBy('first_name')
                    ->get();

    return view(
        'admin.academy_classes.create',
        compact(
            'departments',
            'teachers'
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


        'department_id'
            =>
        'required|exists:academy_departments_cms,id',



       'teacher_id'
        =>
        'nullable|exists:academy_teachers_cms,id',



        'class_code'
            =>
        'required|string|max:100|unique:academy_classes_cms,class_code',



        'capacity'
            =>
        'nullable|integer',



        'start_date'
            =>
        'nullable|date',



        'end_date'
            =>
        'nullable|date|after_or_equal:start_date',



        'status'
            =>
        'required|in:active,inactive',



        'title'
            =>
        'required|string|max:255',



    ],[



        'department_id.required'
            =>
        'Please select department.',



        'class_code.required'
            =>
        'Please enter class code.',



        'class_code.unique'
            =>
        'Class code already exists.',



        'title.required'
            =>
        'Please enter class title.',



    ]);






    DB::beginTransaction();



    try{






        $class = AcademyClassCms::create([



            'department_id'
                =>
            $request->department_id,



            'teacher_id'
                =>
            $request->teacher_id,



            'class_code'
                =>
            $request->class_code,



            'capacity'
                =>
            $request->capacity,



            'start_date'
                =>
            $request->start_date,



            'end_date'
                =>
            $request->end_date,



            'schedule'
                =>
            $request->schedule,



            'room'
                =>
            $request->room,



            'status'
                =>
            $request->status,



            'created_by'
                =>
            Auth::id(),



        ]);








        $english = Language::where(

            'code',

            'en'

        )->first();







        if($english){



            AcademyClassTranslationCms::create([



                'class_id'
                    =>
                $class->id,



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

                'admin.academy_classes.index'

            )

            ->with(

                'success',

                'Academy class created successfully.'

            );




    }


    catch(\Exception $e){



        DB::rollBack();



        return back()

            ->withInput()

            ->with(

                'error',

                'Unable to save academy class.'

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

    $class = AcademyClassCms::with('translations')->findOrFail($id);

    $departments = AcademyDepartmentCms::with('translations')->get();

    $teachers = AcademyTeacherCms::where('status','active')
                    ->orderBy('first_name')
                    ->get();

    return view(
        'admin.academy_classes.edit',
        compact(
            'class',
            'departments',
            'teachers'
        )
    );

}







/*
|--------------------------------------------------------------------------
| UPDATE
|--------------------------------------------------------------------------
*/
public function update(Request $request, $id)
{

    $class = AcademyClassCms::findOrFail($id);

    $request->validate([

        'department_id' => 'required|exists:academy_departments_cms,id',

        'teacher_id' => 'nullable|exists:users,id',

        'class_code' => 'required|max:100|unique:academy_classes_cms,class_code,'.$id,

        'capacity' => 'nullable|integer',

        'start_date' => 'nullable|date',

        'end_date' => 'nullable|date',

        'status' => 'required|in:active,inactive',

        'title' => 'required|max:255',

    ]);

    DB::beginTransaction();

    try {

        $class->update([

            'department_id' => $request->department_id,

            'teacher_id' => $request->teacher_id,

            'class_code' => $request->class_code,

            'capacity' => $request->capacity,

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'schedule' => $request->schedule,

            'room' => $request->room,

            'status' => $request->status,

        ]);



        $english = Language::where('code','en')->first();

        if($english){

            AcademyClassTranslationCms::updateOrCreate(

                [

                    'class_id'=>$class->id,

                    'language_id'=>$english->id,

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

        }

        DB::commit();

        return redirect()

            ->route('admin.academy_classes.index')

            ->with('success','Academy class updated successfully.');

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

public function translation(Request $request,$id)
{


    $class = AcademyClassCms::findOrFail($id);



    $languages = Language::where('status','active')
    ->orderBy('name')
    ->get();


    $translation = null;



    $languageId = $request->get('language_id');



    if($languageId){



        $translation = AcademyClassTranslationCms::where(


            'class_id',


            $id


        )

        ->where(


            'language_id',


            $languageId


        )

        ->first();



    }





    return view(


        'admin.academy_classes.translation',


        compact(


            'class',


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








    AcademyClassTranslationCms::updateOrCreate(



        [



            'class_id'
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


            'created_by' => Auth::id(),

            'updated_at' => now(),



        ]



    );







    return redirect()

        ->route(

            'admin.academy_classes.translation',

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


    AcademyClassTranslationCms::findOrFail($id)

        ->delete();




    return back()

        ->with(

            'success',

            'Translation deleted successfully.'

        );


}









/*
|--------------------------------------------------------------------------
| DELETE CLASS
|--------------------------------------------------------------------------
*/

public function destroy($id)
{


    DB::beginTransaction();



    try{



        $class = AcademyClassCms::findOrFail($id);






        /*
        |--------------------------------------------------------------------------
        | DELETE TRANSLATIONS
        |--------------------------------------------------------------------------
        */


        AcademyClassTranslationCms::where(

            'class_id',

            $id

        )->delete();








        /*
        |--------------------------------------------------------------------------
        | DELETE RECORD
        |--------------------------------------------------------------------------
        */


        $class->delete();







        DB::commit();







        return redirect()

            ->route(

                'admin.academy_classes.index'

            )

            ->with(

                'success',

                'Academy class deleted successfully.'

            );



    }


    catch(\Exception $e){



        DB::rollBack();



        return back()

            ->with(

                'error',

                'Unable to delete academy class.'

            );



    }


}
}
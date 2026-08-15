<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;


use App\Models\AcademyTeacherCms;
use App\Models\AcademyDepartmentCms;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;




class AcademyTeacherController extends Controller
{


/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{


    $teachers = AcademyTeacherCms::with([

        'department',

        'creator'

    ]);





    if($request->search){


        $teachers->where(function($query) use($request){


            $query->where(

                'first_name',

                'like',

                '%'.$request->search.'%'

            )


            ->orWhere(

                'last_name',

                'like',

                '%'.$request->search.'%'

            )


            ->orWhere(

                'email',

                'like',

                '%'.$request->search.'%'

            );


        });


    }







    if($request->status){


        $teachers->where(

            'status',

            $request->status

        );


    }






    $teachers = $teachers

        ->latest()

        ->paginate(10)

        ->withQueryString();






    return view(

        'admin.academy_teachers.index',

        compact(

            'teachers'

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


    $departments = AcademyDepartmentCms::with(

        'translations'

    )->get();






    return view(

        'admin.academy_teachers.create',

        compact(

            'departments'

        )

    );


}

public function store(Request $request)
{


    $request->validate([


        'first_name'
            =>
        'required|string|max:100',



        'last_name'
            =>
        'required|string|max:100',



        'gender'
            =>
        'nullable|in:male,female',



        'email'
            =>
        'nullable|email|unique:academy_teachers_cms,email',



        'phone'
            =>
        'nullable|string|max:50',



        'department_id'
            =>
        'nullable|exists:academy_departments_cms,id',



        'status'
            =>
        'required|in:active,inactive',



    ]);





    DB::beginTransaction();



    try {



        $imagePath = null;




        if($request->hasFile('profile_image')){


            $imagePath = $request->file('profile_image')

                ->store(

                    'academy/teachers',

                    'public'

                );


        }







        AcademyTeacherCms::create([



            'first_name'
                =>
            $request->first_name,



            'last_name'
                =>
            $request->last_name,



            'gender'
                =>
            $request->gender,



            'date_of_birth'
                =>
            $request->date_of_birth,



            'email'
                =>
            $request->email,



            'phone'
                =>
            $request->phone,



            'profile_image'
                =>
            $imagePath,



            'position'
                =>
            $request->position,



            'department_id'
                =>
            $request->department_id,



            'biography'
                =>
            $request->biography,



            'education'
                =>
            $request->education,



            'experience'
                =>
            $request->experience,



            'facebook_url'
                =>
            $request->facebook_url,



            'linkedin_url'
                =>
            $request->linkedin_url,



            'youtube_url'
                =>
            $request->youtube_url,



            'website_url'
                =>
            $request->website_url,



            'status'
                =>
            $request->status,



            'created_by'
                =>
            Auth::id(),



        ]);







        DB::commit();





        return redirect()

            ->route('admin.academy_teachers.index')

            ->with(

                'success',

                'Teacher created successfully.'

            );




    }

    catch(\Exception $e){



        DB::rollBack();



        dd($e->getMessage());



    }


}
public function edit($id)
{


    $teacher = AcademyTeacherCms::findOrFail($id);



    $departments = AcademyDepartmentCms::with(

        'translations'

    )->get();






    return view(

        'admin.academy_teachers.edit',

        compact(

            'teacher',

            'departments'

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


    $teacher = AcademyTeacherCms::findOrFail($id);





    $request->validate([



        'first_name'
            =>
        'required|string|max:100',



        'last_name'
            =>
        'required|string|max:100',



        'email'
            =>
        'nullable|email|unique:academy_teachers_cms,email,'.$id,



        'department_id'
            =>
        'nullable|exists:academy_departments_cms,id',



        'status'
            =>
        'required|in:active,inactive',



    ]);







    DB::beginTransaction();



    try {



        $imagePath = $teacher->profile_image;






       if($request->hasFile('profile_image')){

            // حذف عکس قبلی
            if(
                $teacher->profile_image &&
                Storage::disk('public')->exists($teacher->profile_image)
            ){
                Storage::disk('public')->delete($teacher->profile_image);
            }

            // آپلود عکس جدید
            $imagePath = $request->file('profile_image')
                ->store('academy/teachers','public');

        }








        $teacher->update([



            'first_name'
                =>
            $request->first_name,



            'last_name'
                =>
            $request->last_name,



            'gender'
                =>
            $request->gender,



            'date_of_birth'
                =>
            $request->date_of_birth,



            'email'
                =>
            $request->email,



            'phone'
                =>
            $request->phone,



            'profile_image'
                =>
            $imagePath,



            'position'
                =>
            $request->position,



            'department_id'
                =>
            $request->department_id,



            'biography'
                =>
            $request->biography,



            'education'
                =>
            $request->education,



            'experience'
                =>
            $request->experience,



            'facebook_url'
                =>
            $request->facebook_url,



            'linkedin_url'
                =>
            $request->linkedin_url,



            'youtube_url'
                =>
            $request->youtube_url,



            'website_url'
                =>
            $request->website_url,



            'status'
                =>
            $request->status,



        ]);







        DB::commit();





        return redirect()

            ->route(

                'admin.academy_teachers.index'

            )

            ->with(

                'success',

                'Teacher updated successfully.'

            );




    }

    catch(\Exception $e){



        DB::rollBack();



        dd($e->getMessage());



    }


}
public function destroy($id)
{


    DB::beginTransaction();



    try {



        $teacher = AcademyTeacherCms::findOrFail($id);







        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGE
        |--------------------------------------------------------------------------
        */


        if(

            $teacher->profile_image &&

        Storage::disk('public')->exists($teacher->profile_image)

        ){

            Storage::disk('public')->delete(

                $teacher->profile_image

            );

        }







        /*
        |--------------------------------------------------------------------------
        | DELETE RECORD
        |--------------------------------------------------------------------------
        */


        $teacher->delete();







        DB::commit();







        return redirect()

            ->route(

                'admin.academy_teachers.index'

            )

            ->with(

                'success',

                'Teacher deleted successfully.'

            );



    }



    catch(\Exception $e){



        DB::rollBack();



        dd($e->getMessage());


    }



}
}

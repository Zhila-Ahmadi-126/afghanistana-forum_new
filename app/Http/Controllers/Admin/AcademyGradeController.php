<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AcademyGradeCms;
use App\Models\AcademyEnrollmentCms;
use App\Models\AcademyAssignmentCms;
use App\Models\User;
use App\Models\AcademyTeacherCms;

use Illuminate\Support\Facades\Auth;


class AcademyGradeController extends Controller
{


/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{

    $grades = AcademyGradeCms::with([

        'enrollment',

        'assignment',

        'grader',

    ]);


    if($request->search){

        $grades->whereHas(

            'assignment',

            function($query) use($request){

                $query->where(

                    'id',

                    $request->search

                );

            }

        );

    }



    if($request->grade_type){

        $grades->where(

            'grade_type',

            $request->grade_type

        );

    }



    $grades = $grades

        ->latest()

        ->paginate(10)

        ->withQueryString();



    return view(

        'admin.academy_grades.index',

        compact(

            'grades'

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

    $enrollments = AcademyEnrollmentCms::all();


    $assignments = AcademyAssignmentCms::all();


    $teachers = User::all();



    return view(

        'admin.academy_grades.create',

        compact(

            'enrollments',

            'assignments',

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

        'enrollment_id'=>'required',

        'assignment_id'=>'required',

        'grade_type'=>'required|in:assignment,exam,final',

        'score'=>'required|numeric',

        'max_score'=>'required|numeric',

        'grade_date'=>'nullable|date',

    ]);



    AcademyGradeCms::create([

        'enrollment_id'=>$request->enrollment_id,

        'assignment_id'=>$request->assignment_id,

        'grade_type'=>$request->grade_type,

        'score'=>$request->score,

        'max_score'=>$request->max_score,

        'feedback'=>$request->feedback,

        'graded_by'=>$request->graded_by,

        'grade_date'=>$request->grade_date,

        'created_by'=>Auth::id(),

    ]);



    return redirect()

        ->route('admin.academy_grades.index')

        ->with(

            'success',

            __('admin.general.created_successfully')

        );

}




/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{

    $grade = AcademyGradeCms::findOrFail($id);


    $enrollments = AcademyEnrollmentCms::all();


    $assignments = AcademyAssignmentCms::all();


    $teachers = User::all();



    return view(

        'admin.academy_grades.edit',

        compact(

            'grade',

            'enrollments',

            'assignments',

            'teachers'

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

    $grade = AcademyGradeCms::findOrFail($id);



    $request->validate([

        'enrollment_id'=>'required',

        'assignment_id'=>'required',

       'grade_type'=>'required|in:assignment,exam,final',

        'score'=>'required|numeric',

        'max_score'=>'required|numeric',

    ]);



    $grade->update([

        'enrollment_id'=>$request->enrollment_id,

        'assignment_id'=>$request->assignment_id,

        'grade_type'=>$request->grade_type,

        'score'=>$request->score,

        'max_score'=>$request->max_score,

        'feedback'=>$request->feedback,

        'graded_by'=>$request->graded_by,

        'grade_date'=>$request->grade_date,

    ]);



    return redirect()

        ->route('admin.academy_grades.index')

        ->with(

            'success',

            __('admin.general.updated_successfully')

        );

}




/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

public function destroy($id)
{

    $grade = AcademyGradeCms::findOrFail($id);


    $grade->delete();



    return redirect()

        ->route('admin.academy_grades.index')

        ->with(

            'success',

            __('admin.general.deleted_successfully')

        );

}


}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademyEnrollmentCms;
use App\Models\AcademyClassCms;

class AcademyEnrollmentController extends Controller
{
   public function index(Request $request)
{

    $enrollments = AcademyEnrollmentCms::with([

        'student',
        'academyClass.translations',
        'creator'

    ]);



    if($request->search){

        $enrollments->whereHas(

            'student',

            function($query) use($request){

                $query->where('first_name','like','%'.$request->search.'%')
                ->orWhere('last_name','like','%'.$request->search.'%');

            }

        );


    }



    if($request->status){

        $enrollments->where(

            'enrollment_status',

            $request->status

        );

    }



    $enrollments = $enrollments

        ->latest()

        ->paginate(10)

        ->withQueryString();



    return view(

        'admin.academy_enrollments.index',

        compact('enrollments')

    );

}
/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{

    $enrollment = AcademyEnrollmentCms::with([

        'student',
        'academyClass'

    ])->findOrFail($id);



    $classes = AcademyClassCms::with('translations')
        ->get();



    return view(

        'admin.academy_enrollments.edit',

        compact(

            'enrollment',

            'classes'

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

        'class_id' => 'required|exists:academy_classes_cms,id',

        'enrollment_date' => 'required|date',

        'enrollment_status' => 'required',

    ]);



    $enrollment = AcademyEnrollmentCms::findOrFail($id);



    $enrollment->update([

        'class_id' => $request->class_id,

        'enrollment_date' => $request->enrollment_date,

        'enrollment_status' => $request->enrollment_status,

        'final_result' => $request->final_result,

        'notes' => $request->notes,

    ]);



    return redirect()

        ->route('admin.academy_enrollments.index')

        ->with(

            'success',

            'Enrollment updated successfully.'

        );

}
}

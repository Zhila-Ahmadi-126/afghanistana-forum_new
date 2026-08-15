<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AcademyAssignmentCms;
use App\Models\AcademyAssignmentTranslationCms;
use App\Models\AcademyClassCms;
use App\Models\AcademyTeacherCms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AcademyAssignmentController extends Controller
{

/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{

    $assignments = AcademyAssignmentCms::with([

        'translation',
        'academyClass',
        'teacher',
        'creator',

    ]);


    if($request->search){

        $assignments->whereHas(

            'translation',

            function($query) use($request){

                $query->where(

                    'title',

                    'like',

                    '%'.$request->search.'%'

                );

            }

        );

    }


    if($request->status){

        $assignments->where(

            'status',

            $request->status

        );

    }


    $assignments = $assignments

        ->latest()

        ->paginate(10)

        ->withQueryString();


    $classes = AcademyClassCms::orderBy('id')->get();

    $teachers = AcademyTeacherCms::orderBy('id')->get();


    return view(

        'admin.academy_assignments.index',

        compact(

            'assignments',
            'classes',
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

    $classes = AcademyClassCms::orderBy('id')->get();

    $teachers = AcademyTeacherCms::orderBy('id')->get();


    return view(

        'admin.academy_assignments.create',

        compact(

            'classes',
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

        'class_id' => 'required|exists:academy_classes_cms,id',

        'teacher_id' => 'required|exists:academy_teachers_cms,id',

        'attachment' => 'nullable|file|max:10240',

        'due_date' => 'required|date',

        'status' => 'required|in:active,inactive',

    ]);



    $attachment = null;



    if($request->hasFile('attachment')){


        $attachment = $request

            ->file('attachment')

            ->store(

                'academy/assignments',

                'public'

            );

    }



    $assignment = AcademyAssignmentCms::create([


        'class_id' => $request->class_id,


        'teacher_id' => $request->teacher_id,


        'attachment' => $attachment,


        'due_date' => $request->due_date,


        'status' => $request->status,


        'created_by' => Auth::id(),


    ]);



    return redirect()

        ->route(

            'admin.academy_assignments.translation',

            $assignment->id

        );

}
/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{

    $assignment = AcademyAssignmentCms::findOrFail($id);


    $classes = AcademyClassCms::orderBy('id')->get();


    $teachers = AcademyTeacherCms::orderBy('id')->get();



    return view(

        'admin.academy_assignments.edit',

        compact(

            'assignment',

            'classes',

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

    $request->validate([

        'class_id' => 'required|exists:academy_classes_cms,id',

        'teacher_id' => 'required|exists:academy_teachers_cms,id',

        'attachment' => 'nullable|file|max:10240',

        'due_date' => 'nullable|date',

        'status' => 'required|in:active,inactive',

    ]);



    $assignment = AcademyAssignmentCms::findOrFail($id);



    $data = [


        'class_id' => $request->class_id,


        'teacher_id' => $request->teacher_id,


        'due_date' => $request->due_date,


        'status' => $request->status,


    ];




    /*
    |--------------------------------------------------------------------------
    | Replace Attachment
    |--------------------------------------------------------------------------
    */


    if($request->hasFile('attachment')){


        // حذف فایل قبلی

        if($assignment->attachment){


            Storage::disk('public')

                ->delete($assignment->attachment);


        }



        // ذخیره فایل جدید

        $data['attachment'] = $request

            ->file('attachment')

            ->store(

                'academy/assignments',

                'public'

            );


    }



    $assignment->update($data);



    return redirect()

        ->route(

            'admin.academy_assignments.index'

        )

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

    $assignment = AcademyAssignmentCms::findOrFail($id);


    // حذف فایل attachment

    if($assignment->attachment){

        Storage::disk('public')
            ->delete($assignment->attachment);

    }


    // حذف تمام ترجمه های مربوط به همین assignment

    AcademyAssignmentTranslationCms::where(
        'assignment_id',
        $assignment->id
    )->delete();



    // حذف خود assignment

    $assignment->delete();



    return redirect()

        ->route('admin.academy_assignments.index')

        ->with(
            'success',
            __('admin.general.deleted_successfully')
        );

}

}
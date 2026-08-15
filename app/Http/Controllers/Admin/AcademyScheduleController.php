<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AcademyScheduleCms;
use App\Models\AcademyScheduleTranslation;
use App\Models\AcademyClassCms;
use App\Models\AcademyTeacherCms;
use App\Models\Language;


use Illuminate\Http\Request;


class AcademyScheduleController extends Controller
{
    /*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{

    $schedules = AcademyScheduleCms::with([

        'academyClass.translations',

        'teacher',

        'translations.language',

        'creator'

    ]);


    if($request->search){

        $schedules->whereHas(

            'translations',

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

        $schedules->where(

            'status',

            $request->status

        );

    }



    $schedules = $schedules

        ->latest()

        ->paginate(10)

        ->withQueryString();



    return view(

        'admin.academy_schedules.index',

        compact(

            'schedules'

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

    $classes = AcademyClassCms::all();

    $teachers = AcademyTeacherCms::all();

    return view(

        'admin.academy_schedules.create',

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


        'class_id'
            =>
        'required|exists:academy_classes_cms,id',


        'teacher_id'
            =>
        'required|exists:academy_teachers_cms,id',


        'day_of_week'
            =>
        'required',


        'start_time'
            =>
        'required',


        'end_time'
            =>
        'required',


        'schedule_type'
            =>
        'required|in:offline,online,hybrid',


        'status'
            =>
        'required|in:active,inactive',


    ]);





    $schedule = AcademyScheduleCms::create([


        'class_id'
            =>
        $request->class_id,


        'teacher_id'
            =>
        $request->teacher_id,


        'day_of_week'
            =>
        $request->day_of_week,


        'start_time'
            =>
        $request->start_time,


        'end_time'
            =>
        $request->end_time,


        'room'
            =>
        $request->room,


        'meeting_link'
            =>
        $request->meeting_link,


        'schedule_type'
            =>
        $request->schedule_type,


        'status'
            =>
        $request->status,


        'created_by'
            =>
        Auth::id(),


    ]);







    return redirect()

        ->route(

            'admin.academy_schedules.translation',

            $schedule->id

        )

        ->with(

            'success',

            'Schedule created successfully. Please add translation.'

        );


}
/*
|--------------------------------------------------------------------------
| TRANSLATION
|--------------------------------------------------------------------------
*/

public function translation(Request $request,$id)
{

    $schedule = AcademyScheduleCms::findOrFail($id);


    $languages = Language::all();


    $translation = null;


    $languageId = $request->get('language_id');


    if($languageId){


        $translation = AcademyScheduleTranslation::where(

            'schedule_id',

            $id

        )

        ->where(

            'language_id',

            $languageId

        )

        ->first();


    }



    return view(

        'admin.academy_schedules.translation',

        compact(

            'schedule',

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


    AcademyScheduleTranslation::updateOrCreate(

        [

            'schedule_id'
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

            'description'
                =>
            $request->description,

            'created_by'
                =>
            Auth::id(),

        ]

    );


    return redirect()

        ->route(

            'admin.academy_schedules.translation',

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

    AcademyScheduleTranslation::findOrFail($id)

        ->delete();


    return back()

        ->with(

            'success',

            'Translation deleted successfully.'

        );

}
/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{

    $schedule = AcademyScheduleCms::findOrFail($id);


    $classes = AcademyClassCms::with('translations')

        ->orderBy('id')

        ->get();


    $teachers = AcademyTeacherCms::orderBy('first_name')

        ->get();


    return view(

        'admin.academy_schedules.edit',

        compact(

            'schedule',

            'classes',

            'teachers'

        )

    );

}
public function update(Request $request, $id)
{

  $request->validate([

    'class_id'      => 'required|exists:academy_classes_cms,id',

    'teacher_id'    => 'required|exists:academy_teachers_cms,id',

    'day_of_week'   => 'required|string|max:50',

    'start_time'    => 'required',

    'end_time'      => 'required',

    'schedule_type' => 'required|in:offline,online,hybrid',

    'status'        => 'required|in:active,inactive',

    'room'          => 'nullable|string|max:255',

    'meeting_link'  => 'nullable|string|max:500',

    

]);


    $schedule = AcademyScheduleCms::findOrFail($id);



    $schedule->update([

        'class_id'       => $request->class_id,

        'teacher_id'     => $request->teacher_id,

        'day_of_week'    => $request->day_of_week,

        'start_time'     => $request->start_time,

        'end_time'       => $request->end_time,

        'room'           => $request->room,

        'schedule_type'  => $request->schedule_type,

        'meeting_link'   => $request->meeting_link,

        'status'         => $request->status,

     

    ]);



    return redirect()

        ->route('admin.academy_schedules.index')

        ->with('success', 'Schedule updated successfully.');

}
/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

public function destroy($id)
{
    $schedule = AcademyScheduleCms::findOrFail($id);

    // حذف تمام ترجمه‌ها
    AcademyScheduleTranslation::where(
        'schedule_id',
        $schedule->id
    )->delete();

    // حذف رکورد اصلی
    $schedule->delete();

    return redirect()
        ->route('admin.academy_schedules.index')
        ->with(
            'success',
            'Schedule deleted successfully.'
        );
}

}

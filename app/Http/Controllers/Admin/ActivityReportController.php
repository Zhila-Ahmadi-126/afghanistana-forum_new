<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ActivityReport;
use App\Models\ActivityReportTranslation;

use App\Models\Language;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helpers\AuditHelper;


class ActivityReportController extends Controller

{

  // =========================
// INDEX
// =========================

public function index(Request $request)
{

    $query = ActivityReport::with([

        'user',

        'translations' => function($q){

            $q->whereHas('language', function($lang){

                $lang->where('code','en');

            });

        }

    ]);



    // SEARCH

    if($request->filled('search')){


        $search = $request->search;


        $query->whereHas('translations',function($q) use($search){


            $q->where('title','like',"%{$search}%")

            ->orWhere('summary','like',"%{$search}%")

            ->orWhere('completed_activities','like',"%{$search}%");


        });


    }





    // TIME FILTER

    if($request->filled('period')){


        switch($request->period){


            case 'daily':


                $query->whereDate(

                    'report_date',

                    now()->toDateString()

                );

            break;




            case 'weekly':


                $query->whereBetween(

                    'report_date',

                    [

                        now()->startOfWeek(),

                        now()->endOfWeek()

                    ]

                );


            break;




            case 'monthly':


                $query->whereMonth(

                    'report_date',

                    now()->month

                )

                ->whereYear(

                    'report_date',

                    now()->year

                );


            break;




            case 'yearly':


                $query->whereYear(

                    'report_date',

                    now()->year

                );


            break;


        }


    }





    $reports = $query

        ->latest('created_at')

        ->paginate(10)

        ->withQueryString();





    return view(

        'admin.activity_reports.index',

        compact('reports')

    );


}

  // =========================
// CREATE
// =========================

public function create()
{

    $languages = Language::where('status','active')
        ->orderByRaw("CASE WHEN code='en' THEN 1 ELSE 2 END")
        ->orderBy('name')
        ->get();


    return view(
        'admin.activity_reports.create',
        compact('languages')
    );

}


// =========================
// STORE
// =========================

public function store(Request $request)
{

    $request->validate([

        'report_date' => 'required|date',

        'language_id' => [
            'required',
            'exists:languages,id'
        ],

        'title' => [
            'required',
            'max:255'
        ],

        'summary' => [
            'nullable'
        ],

        'completed_activities' => [
            'nullable'
        ],

        'pending_activities' => [
            'nullable'
        ],

        'challenges' => [
            'nullable'
        ],

        'next_plan' => [
            'nullable'
        ]

    ]);



    DB::beginTransaction();


    try {


        // =========================
        // CREATE MAIN REPORT
        // =========================

        $report = ActivityReport::create([

            'user_id' => Auth::id(),

            'report_date' => $request->report_date,

        ]);




        // =========================
        // CREATE TRANSLATION
        // =========================

        ActivityReportTranslation::create([

            'activity_report_id' => $report->id,

            'language_id' => $request->language_id,

            'title' => $request->title,

            'summary' => $request->summary,

            'completed_activities' => $request->completed_activities,

            'pending_activities' => $request->pending_activities,

            'challenges' => $request->challenges,

            'next_plan' => $request->next_plan,

        ]);





        // =========================
        // AUDIT LOG
        // =========================

        AuditHelper::log(

            Auth::user(),

            'activity_reports',

            'insert',

            'Activity Reports',

            $report->id,

            $request->title,

            'New activity report created.'

        );




        DB::commit();



        return redirect()

            ->route('admin.activity_reports.index')

            ->with(

                'success',

                'Activity report created successfully.'

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
// =========================
// TRANSLATION
// =========================

public function translation($id, Request $request)
{

    $report = ActivityReport::findOrFail($id);


    $languages = Language::where('status','active')
        ->orderByRaw("CASE WHEN code='en' THEN 1 ELSE 2 END")
        ->orderBy('name')
        ->get();



    $languageId = $request->language_id 
        ?? Language::where('code','en')->value('id');



    $translation = ActivityReportTranslation::where('activity_report_id',$id)
        ->where('language_id',$languageId)
        ->first();



    return view(
        'admin.activity_reports.translation',
        compact(
            'report',
            'languages',
            'translation',
            'languageId'
        )
    );

}




// =========================
// SAVE TRANSLATION
// =========================

public function saveTranslation(Request $request,$id)
{

    $request->validate([


        'language_id'=>'required|exists:languages,id',


        'title'=>'required|max:255',


        'summary'=>'nullable',


        'completed_activities'=>'nullable',


        'pending_activities'=>'nullable',


        'challenges'=>'nullable',


        'next_plan'=>'nullable'


    ]);





    ActivityReportTranslation::updateOrCreate(

        [

            'activity_report_id'=>$id,

            'language_id'=>$request->language_id

        ],


        [

            'title'=>$request->title,

            'summary'=>$request->summary,

            'completed_activities'=>$request->completed_activities,

            'pending_activities'=>$request->pending_activities,

            'challenges'=>$request->challenges,

            'next_plan'=>$request->next_plan

        ]

    );




return redirect()
    ->route(
        'admin.activity_reports.translation',
        [
            'id' => $id,
            'language_id' => $request->language_id
        ]
    )
    ->with(
        'success',
        'Translation saved successfully.'
    );

}
// =========================
// TRANSLATION PAGE
// =========================
public function translations($id, Request $request)
{

    $report = ActivityReport::findOrFail($id);


    $languages = Language::where('status','active')
        ->orderByRaw("CASE WHEN code='en' THEN 1 ELSE 2 END")
        ->orderBy('name')
        ->get();



    $selectedLanguage = $request->language_id 
        ?? Language::where('code','en')->value('id');



    $translation = ActivityReportTranslation::where(

            'activity_report_id',

            $report->id

        )
        ->where(

            'language_id',

            $selectedLanguage

        )
        ->first();





    return view(

        'admin.activity_reports.translation',

        compact(

            'report',

            'languages',

            'translation',

            'selectedLanguage'

        )

    );

}





// =========================
// TRANSLATION STORE / UPDATE
// =========================

public function translationSave(Request $request, $id)
{

    $request->validate([


        'language_id' => [

            'required',

            'exists:languages,id'

        ],


        'title' => [

            'required',

            'max:255'

        ],


        'summary' => 'nullable',


        'completed_activities' => 'nullable',


        'pending_activities' => 'nullable',


        'challenges' => 'nullable',


        'next_plan' => 'nullable'


    ]);




    DB::beginTransaction();


    try {



        $translation = ActivityReportTranslation::where(

                'activity_report_id',

                $id

            )

            ->where(

                'language_id',

                $request->language_id

            )

            ->first();






        // UPDATE EXISTING TRANSLATION

        if($translation){



            $oldData = $translation->toArray();



            $translation->update([


                'title'=>$request->title,


                'summary'=>$request->summary,


                'completed_activities'=>$request->completed_activities,


                'pending_activities'=>$request->pending_activities,


                'challenges'=>$request->challenges,


                'next_plan'=>$request->next_plan,


            ]);



            $newData = $translation->fresh()->toArray();



            AuditHelper::log(


                Auth::user(),


                'activity_report_translations',


                'update',


                'Activity Report Translation',


                $translation->id,


                $request->title,


                'Activity report translation updated.',


                array_keys($newData),


                $oldData,


                $newData


            );



        }



        // CREATE NEW LANGUAGE

        else {



            $translation = ActivityReportTranslation::create([


                'activity_report_id'=>$id,


                'language_id'=>$request->language_id,


                'title'=>$request->title,


                'summary'=>$request->summary,


                'completed_activities'=>$request->completed_activities,


                'pending_activities'=>$request->pending_activities,


                'challenges'=>$request->challenges,


                'next_plan'=>$request->next_plan,


            ]);





            AuditHelper::log(


                Auth::user(),


                'activity_report_translations',


                'insert',


                'Activity Report Translation',


                $translation->id,


                $request->title,


                'New translation added.'


            );


        }




        DB::commit();




        return redirect()

            ->route(

                'admin.activity_reports.index'

            )

            ->with(

                'success',

                'Translation saved successfully.'

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
    | AJAX SEARCH
    |--------------------------------------------------------------------------
    */

    public function ajax(Request $request)
    {

        $reports = ActivityReport::with('user')

            ->when($request->search, function ($query) use ($request) {

                $query->whereHas('user', function ($q) use ($request) {

                    $q->where('first_name', 'like', "%{$request->search}%")

                      ->orWhere('last_name', 'like', "%{$request->search}%");

                });

            })

            ->latest()

            ->limit(50)

            ->get();


        return response()->json(

            $reports

        );

    }
    // =========================
// EDIT
// =========================

public function edit($id)
{

    $report = ActivityReport::with('translations')
        ->findOrFail($id);



    return view(

        'admin.activity_reports.edit',

        compact('report')

    );

}






// =========================
// UPDATE
// =========================

public function update(Request $request, $id)
{

    $request->validate([


        'report_date' => 'required|date',


        'title' => [

            'required',

            'max:255'

        ],


        'summary' => 'nullable',

        'completed_activities' => 'nullable',

        'pending_activities' => 'nullable',

        'challenges' => 'nullable',

        'next_plan' => 'nullable',


    ]);




    DB::beginTransaction();



    try {



        $report = ActivityReport::findOrFail($id);



        $oldData = $report->toArray();




        $report->update([

            'report_date' => $request->report_date,

        ]);





        $translation = $report->translations()

            ->where('language_id', $request->language_id)

            ->firstOrFail();





        $oldTranslation = $translation->toArray();





        $translation->update([


            'title' => $request->title,

            'summary' => $request->summary,

            'completed_activities' => $request->completed_activities,

            'pending_activities' => $request->pending_activities,

            'challenges' => $request->challenges,

            'next_plan' => $request->next_plan,


        ]);






        AuditHelper::log(

            Auth::user(),

            'activity_reports',

            'update',

            'Activity Reports',

            $report->id,

            $request->title,

            'Activity report updated.',

            [

                'report_date',

                'title',

                'summary',

                'completed_activities',

                'pending_activities',

                'challenges',

                'next_plan'

            ],

            $oldData,

            $report->fresh()->toArray()

        );





        DB::commit();



        return redirect()

            ->route('admin.activity_reports.index')

            ->with(

                'success',

                'Activity report updated successfully.'

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
    | DELETE PAGE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {

        $report = ActivityReport::findOrFail($id);

        return view(

            'admin.activity_reports.delete',

            compact('report')

        );

    }


   // =========================
// DELETE
// =========================

public function destroy($id)
{

    DB::beginTransaction();

    try{

        $report = ActivityReport::findOrFail($id);

        $title = optional($report->translations()->first())->title ?? 'Activity Report';

        ActivityReportTranslation::where(
            'activity_report_id',
            $report->id
        )->delete();

        $report->delete();

        AuditHelper::log(

            Auth::user(),

            'activity_reports',

            'delete',

            'Activity Reports',

            $id,

            $title,

            'Activity report deleted.'

        );

        DB::commit();

        return back()->with(
            'success',
            'Activity report deleted successfully.'
        );

    }

    catch(\Exception $e){

        DB::rollBack();

        return back()->with(
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

  


    /*
    |--------------------------------------------------------------------------
    | TRANSLATION STORE
    |--------------------------------------------------------------------------
    */

    public function translationStore(Request $request, $id)
    {

        $request->validate([

            'language_id' => 'required|exists:languages,id',

            'title' => 'required|max:255',

            'summary' => 'nullable',

            'completed_activities' => 'nullable',

            'pending_activities' => 'nullable',

            'challenges' => 'nullable',

            'next_plan' => 'nullable',

        ]);


        DB::beginTransaction();

        try {

            ActivityReportTranslation::updateOrCreate(

                [

                    'activity_report_id' => $id,

                    'language_id' => $request->language_id,

                ],

                [

                    'title' => $request->title,

                    'summary' => $request->summary,

                    'completed_activities' => $request->completed_activities,

                    'pending_activities' => $request->pending_activities,

                    'challenges' => $request->challenges,

                    'next_plan' => $request->next_plan,

                ]

            );


            AuditHelper::log(

                Auth::user(),

                'activity_report_translations',

                'insert',

                'Activity Report Translation',

                $id,

                $request->title,

                'Activity report translation saved.'

            );


            DB::commit();

            return back()->with(

                'success',

                'Translation saved successfully.'

            );

        }

        catch (\Exception $e) {

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
    | TRANSLATION UPDATE
    |--------------------------------------------------------------------------
    */

    public function translationUpdate(Request $request, $id)
    {

        $translation = ActivityReportTranslation::findOrFail($id);

        $request->validate([

            'title' => 'required|max:255',

            'summary' => 'nullable',

            'completed_activities' => 'nullable',

            'pending_activities' => 'nullable',

            'challenges' => 'nullable',

            'next_plan' => 'nullable',

        ]);


        DB::beginTransaction();

        try {

            $oldData = $translation->toArray();

            $translation->update([

                'title' => $request->title,

                'summary' => $request->summary,

                'completed_activities' => $request->completed_activities,

                'pending_activities' => $request->pending_activities,

                'challenges' => $request->challenges,

                'next_plan' => $request->next_plan,

            ]);


            $newData = $translation->fresh()->toArray();

            $changedFields = [];

            foreach ($newData as $key => $value) {

                if (
                    array_key_exists($key, $oldData) &&
                    $oldData[$key] != $value
                ) {

                    $changedFields[] = $key;

                }

            }


            AuditHelper::log(

                Auth::user(),

                'activity_report_translations',

                'update',

                'Activity Report Translation',

                $translation->id,

                $translation->title,

                'Activity report translation updated.',

                $changedFields,

                $oldData,

                $newData

            );


            DB::commit();

            return back()->with(

                'success',

                'Translation updated successfully.'

            );

        }

        catch (\Exception $e) {

            DB::rollBack();

            return back()

                ->withInput()

                ->with(

                    'error',

                    $e->getMessage()

                );

        }

    }
    

}
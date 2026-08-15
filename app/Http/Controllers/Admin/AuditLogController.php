<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\AuditLog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuditLogController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */


    public function index(Request $request)
    {


        $logs = AuditLog::query();



        // SEARCH

        if($request->search){


            $search = $request->search;



            $logs->where(function($q) use($search){


                $q->where('admin_name','like',"%$search%")

                ->orWhere('admin_lastname','like',"%$search%")

                ->orWhere('module','like',"%$search%")

                ->orWhere('record_title','like',"%$search%")

                ->orWhere('description','like',"%$search%");


            });



        }






        // ACTION FILTER

        if($request->action_type){


            $logs->where(

                'action_type',

                $request->action_type

            );


        }






        // MODULE FILTER


        if($request->module){


            $logs->where(

                'module',

                $request->module

            );


        }






        $logs = $logs

            ->latest('created_at')

            ->paginate(10)

            ->withQueryString();






        return view(

            'admin.audit_logs.index',

            compact('logs')

        );



    }
 // =========================
// CLEAN LOGS BY DATE
// =========================

public function cleanLogs(Request $request)
{

    $request->validate([

        'start_date' => 'required|date',

        'end_date' => 'required|date|after_or_equal:start_date',

    ]);



    AuditLog::whereBetween(
        'created_at',
        [
            $request->start_date,
            $request->end_date
        ]
    )->delete();



    return redirect()

        ->route('admin.audit_logs.index')

        ->with(
            'success',
            'Audit logs cleaned successfully.'
        );

}






    /*
    |--------------------------------------------------------------------------
    | AJAX SEARCH
    |--------------------------------------------------------------------------
    */


    public function ajax(Request $request)
    {


        $logs = AuditLog::where(

            'admin_name',

            'like',

            '%'.$request->search.'%'

        )

        ->orWhere(

            'module',

            'like',

            '%'.$request->search.'%'

        )

        ->latest()

        ->limit(50)

        ->get();





        return response()->json($logs);


    }




}
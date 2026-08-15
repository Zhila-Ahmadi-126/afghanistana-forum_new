<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AcademyCertificateCms;
use App\Models\AcademyStudentCms;
use App\Models\AcademyClassCms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AcademyCertificateController extends Controller
{


/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{

    $certificates = AcademyCertificateCms::with([

        'student',

        'academyClass',

    ]);



    if($request->search){

        $certificates->where(

            'certificate_number',

            'like',

            '%'.$request->search.'%'

        );

    }



    if($request->status){

        $certificates->where(

            'status',

            $request->status

        );

    }



    $certificates = $certificates

        ->latest()

        ->paginate(10)

        ->withQueryString();



    return view(

        'admin.academy_certificates.index',

        compact(

            'certificates'

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

    $students = AcademyStudentCms::orderBy('id')->get();


    $classes = AcademyClassCms::orderBy('id')->get();


    return view(

        'admin.academy_certificates.create',

        compact(

            'students',

            'classes'

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


        'student_id'=>'required',

        'class_id'=>'required',

        'certificate_number'=>'required|unique:academy_certificates_cms,certificate_number',

        'issue_date'=>'required|date',

        'certificate_file'=>'nullable|file|max:10240',

       'status'=>'required|in:issued,pending,revoked',


    ]);



    $file = null;



    if($request->hasFile('certificate_file')){


        $file = $request->file('certificate_file')

            ->store(

                'academy/certificates',

                'public'

            );

    }





    AcademyCertificateCms::create([


        'student_id'=>$request->student_id,

        'class_id'=>$request->class_id,

        'certificate_number'=>$request->certificate_number,

        'issue_date'=>$request->issue_date,

        'certificate_file'=>$file,

        'status'=>$request->status,

        'notes'=>$request->notes,

        'created_by'=>Auth::id(),


    ]);




    return redirect()

        ->route('admin.academy_certificates.index')

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

    $certificate = AcademyCertificateCms::findOrFail($id);


    $students = AcademyStudentCms::orderBy('id')
        ->get();


    $classes = AcademyClassCms::with('translation')
        ->orderBy('id')
        ->get();



    return view(
        'admin.academy_certificates.edit',
        compact(
            'certificate',
            'students',
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

    $certificate = AcademyCertificateCms::findOrFail($id);



    $request->validate([

        'student_id' => 'required',

        'class_id' => 'required',

        'certificate_number' => 'required',

        'issue_date' => 'required|date',

        'certificate_file' => 'nullable|file|max:10240',

        'status' => 'required|in:issued,pending,revoked',

        'notes' => 'nullable|string',

    ]);





    $data = [

        'student_id' => $request->student_id,

        'class_id' => $request->class_id,

        'certificate_number' => $request->certificate_number,

        'issue_date' => $request->issue_date,

        'status' => $request->status,

        'notes' => $request->notes,

        'updated_at' => now(),

    ];







    /*
    |--------------------------------------------------------------------------
    | Replace Certificate File
    |--------------------------------------------------------------------------
    */


    if($request->hasFile('certificate_file')){


        if(
            $certificate->certificate_file &&
            Storage::disk('public')
            ->exists($certificate->certificate_file)
        ){

            Storage::disk('public')
            ->delete($certificate->certificate_file);

        }



        $data['certificate_file'] = $request
            ->file('certificate_file')
            ->store(
                'academy/certificates',
                'public'
            );


    }







    $certificate->update($data);





    return redirect()

        ->route('admin.academy_certificates.index')

        ->with(
            'success',
            __('admin.general.updated_successfully')
        );

}



/*
|--------------------------------------------------------------------------
| DOWNLOAD CERTIFICATE
|--------------------------------------------------------------------------
*/

public function download($id)
{
    $certificate = AcademyCertificateCms::findOrFail($id);

    if (
        !$certificate->certificate_file ||
        !Storage::disk('public')->exists($certificate->certificate_file)
    ) {
        return back()->withErrors([
            'certificate' => __('Certificate file not found.')
        ]);
    }

    return Storage::disk('public')->download(
        $certificate->certificate_file
    );
}

/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

public function destroy($id)
{

    $certificate = AcademyCertificateCms::findOrFail($id);




    if($certificate->certificate_file){


        Storage::disk('public')

            ->delete($certificate->certificate_file);


    }





    $certificate->delete();





    return redirect()

        ->route('admin.academy_certificates.index')

        ->with(

            'success',

            __('admin.general.deleted_successfully')

        );

}



}
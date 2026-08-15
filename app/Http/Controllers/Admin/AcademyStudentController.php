<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademyStudentCms;
use App\Models\User;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class AcademyStudentController extends Controller
{

/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{

    $students = AcademyStudentCms::with([
        'creator',
        'user'
    ]);


    if($request->search){

        $students->where(function($query) use($request){

            $query->where('first_name','like','%'.$request->search.'%')
                  ->orWhere('last_name','like','%'.$request->search.'%')
                  ->orWhere('email','like','%'.$request->search.'%')
                  ->orWhere('phone','like','%'.$request->search.'%');

        });

    }


    if($request->status){

        $students->where('status',$request->status);

    }


    $students = $students
                    ->latest()
                    ->paginate(10)
                    ->withQueryString();


    return view(
        'admin.academy_students.index',
        compact('students')
    );

}
/*
|--------------------------------------------------------------------------
| CREATE
|--------------------------------------------------------------------------
*/

public function create()
{
    $users = User::orderBy('first_name')->get();

    return view(
        'admin.academy_students.create',
        compact('users')
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

        'first_name' => 'required|string|max:255',
        'last_name'  => 'required|string|max:255',
        'email'      => 'nullable|email|max:255',
        'phone'      => 'nullable|string|max:50',
        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    ]);

    $imagePath = null;

    if($request->hasFile('profile_image')){

        $imagePath = $request->file('profile_image')
                            ->store('academy/students','public');

    }

    AcademyStudentCms::create([

        'user_id' => $request->user_id,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'gender' => $request->gender,
        'date_of_birth' => $request->date_of_birth,
        'email' => $request->email,
        'phone' => $request->phone,
        'address' => $request->address,
        'profile_image' => $imagePath,
        'emergency_contact_name' => $request->emergency_contact_name,
        'emergency_contact_phone' => $request->emergency_contact_phone,
        'enrollment_date' => $request->enrollment_date,
        'status' => $request->status,
        'notes' => $request->notes,
        'created_by' => Auth::id(),

    ]);

    return redirect()
        ->route('admin.academy_students.index')
        ->with('success', __('Student created successfully.'));
}

/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{
    $student = AcademyStudentCms::findOrFail($id);

    $users = User::where('status','active')
        ->orderBy('first_name')
        ->get();

    return view(
        'admin.academy_students.edit',
        compact(
            'student',
            'users'
        )
    );
}
public function update(Request $request, $id)
{

    $request->validate([

        'first_name' => 'required|string|max:255',

        'last_name' => 'required|string|max:255',

        'gender' => 'required|in:male,female',

        'date_of_birth' => 'nullable|date',

        'email' => 'nullable|email|max:255',

        'phone' => 'nullable|string|max:50',

        'address' => 'nullable|string',

        'emergency_contact_name' => 'nullable|string|max:255',

        'emergency_contact_phone' => 'nullable|string|max:50',

        'enrollment_date' => 'nullable|date',

        'status' => 'required|in:active,inactive',

        'notes' => 'nullable|string',

        'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

    ]);



    $student = AcademyStudentCms::findOrFail($id);



    $data = [

       

        'first_name' => $request->first_name,

        'last_name' => $request->last_name,

        'gender' => $request->gender,

        'date_of_birth' => $request->date_of_birth,

        'email' => $request->email,

        'phone' => $request->phone,

        'address' => $request->address,

        'emergency_contact_name' => $request->emergency_contact_name,

        'emergency_contact_phone' => $request->emergency_contact_phone,

        'enrollment_date' => $request->enrollment_date,

        'status' => $request->status,

        'notes' => $request->notes,

    ];



if($request->hasFile('profile_image')){


    // حذف عکس قبلی

    if($student->profile_image && Storage::disk('public')->exists($student->profile_image)){

        Storage::disk('public')->delete($student->profile_image);

    }



    // ذخیره عکس جدید مثل Create

    $imagePath = $request->file('profile_image')
                    ->store('academy/students','public');


    $data['profile_image'] = $imagePath;


}

    $student->update($data);



    return redirect()

        ->route('admin.academy_students.index')

        ->with(

            'success',

            'Student updated successfully.'

        );


}


/*
|--------------------------------------------------------------------------
| DELETE
|--------------------------------------------------------------------------
*/

public function destroy($id)
{

    $student = AcademyStudentCms::findOrFail($id);



    // حذف عکس از storage/public
    if($student->profile_image){


        // حالت store() در create
        if(Storage::disk('public')->exists($student->profile_image)){

            Storage::disk('public')->delete($student->profile_image);

        }



        // حالت uploads/students در update
        if(file_exists(public_path($student->profile_image))){

            File::delete(
                public_path($student->profile_image)
            );

        }

    }



    // حذف دانش آموز
    $student->delete();



    return redirect()

        ->route('admin.academy_students.index')

        ->with(

            'success',

            __('Student deleted successfully.')

        );

}
}

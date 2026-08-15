<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AcademyDepartmentCms;
use App\Models\Language;
use App\Models\AcademyClassCms;
use App\Models\AcademyTeacherCms;
use App\Models\AcademyScheduleCms;
use App\Models\AcademyResourceCms;
use App\Models\AcademyStudentCms;
use App\Models\AcademyEnrollmentCms;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\NewAcademyEnrollmentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;




class AcademyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ACADEMY HOME
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $language = Language::where(
            'code',
            app()->getLocale()
        )->first();


        $departments = AcademyDepartmentCms::query()

            ->where('status', 'active')

            ->with([
                'translations' => function ($query) use ($language) {

                    if ($language) {
                        $query->where(
                            'language_id',
                            $language->id
                        );
                    }

                }
            ])

            ->orderBy('id', 'asc')

            ->get();


        return view(
            'website.academy.index',
            compact('departments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PROGRAMS
    |--------------------------------------------------------------------------
    */

  /*
|--------------------------------------------------------------------------
| PROGRAMS / DEPARTMENTS
|--------------------------------------------------------------------------
*/

public function programs()
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();

    $departments = AcademyDepartmentCms::query()

        ->where('status', 'active')

        ->with([
            'translations' => function ($query) use ($language) {

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }

            }
        ])

        ->orderByDesc('is_featured')
        ->orderBy('id', 'asc')

        ->get();


    return view(
        'website.academy.programs',
        compact('departments')
    );
}

/*
|--------------------------------------------------------------------------
| DEPARTMENT DETAILS
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| DEPARTMENT DETAILS
|--------------------------------------------------------------------------
*/

public function departmentShow($id)
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();


    /*
    |--------------------------------------------------------------------------
    | DEPARTMENT
    |--------------------------------------------------------------------------
    */

    $department = AcademyDepartmentCms::query()

        ->where('id', $id)

        ->where('status', 'active')

        ->with([
            'translations' => function ($query) use ($language) {

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }

            }
        ])

        ->firstOrFail();


    /*
    |--------------------------------------------------------------------------
    | CLASSES
    |--------------------------------------------------------------------------
    */

    $classes = AcademyClassCms::query()

        ->where('department_id', $department->id)

        ->where('status', 'active')

        ->with([
            'translations' => function ($query) use ($language) {

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }

            },

            'teacher'

        ])

        ->orderBy('start_date', 'asc')

        ->get();


    /*
    |--------------------------------------------------------------------------
    | TEACHERS
    |--------------------------------------------------------------------------
    */

    $teachers = AcademyTeacherCms::query()

        ->where('department_id', $department->id)

        ->where('status', 'active')

        ->orderBy('first_name', 'asc')

        ->get();


    return view(
        'website.academy.department-show',
        compact(
            'department',
            'classes',
            'teachers'
        )
    );
}


    /*
    |--------------------------------------------------------------------------
    | PROGRAM DETAILS
    |--------------------------------------------------------------------------
    */

    public function programShow($id)
    {
        return view(
            'website.academy.program-show',
            compact('id')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | COURSES
    |--------------------------------------------------------------------------
    */

   /*
|--------------------------------------------------------------------------
| COURSES
|--------------------------------------------------------------------------
*/

public function courses()
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();


    $classes = AcademyClassCms::query()

        ->where('status', 'active')

        ->with([

            'translations' => function ($query) use ($language) {

                if ($language) {

                    $query->where(
                        'language_id',
                        $language->id
                    );

                }

            },

            'department.translations' => function ($query) use ($language) {

                if ($language) {

                    $query->where(
                        'language_id',
                        $language->id
                    );

                }

            },

            'teacher'

        ])

        ->orderBy('start_date', 'asc')

        ->get();


    return view(
        'website.academy.courses',
        compact('classes')
    );
}


    /*
    |--------------------------------------------------------------------------
    | COURSE DETAILS
    |--------------------------------------------------------------------------
    */
/*
|--------------------------------------------------------------------------
| COURSE DETAILS
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| COURSE DETAILS
|--------------------------------------------------------------------------
*/

public function courseShow($id)
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();


    /*
    |--------------------------------------------------------------------------
    | CLASS
    |--------------------------------------------------------------------------
    */

    $class = AcademyClassCms::query()

        ->where('id', $id)

        ->where('status', 'active')

        ->with([
            'translations' => function ($query) use ($language) {

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }

            },

            'department.translations' => function ($query) use ($language) {

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }

            },

            'teacher',

            'schedules.translations' => function ($query) use ($language) {

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }

            }
        ])

        ->firstOrFail();


    /*
    |--------------------------------------------------------------------------
    | CLASS TRANSLATION
    |--------------------------------------------------------------------------
    */

    $translation = $class->translations->first();


    /*
    |--------------------------------------------------------------------------
    | DEPARTMENT TRANSLATION
    |--------------------------------------------------------------------------
    */

    $departmentTranslation =
        $class->department?->translations->first();


    /*
    |--------------------------------------------------------------------------
    | ACTIVE SCHEDULES
    |--------------------------------------------------------------------------
    */

    $schedules = $class->schedules

        ->where('status', 'active')

        ->sortBy('start_time');


    return view(
        'website.academy.course-show',
        compact(
            'class',
            'translation',
            'departmentTranslation',
            'schedules'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | INSTRUCTORS
    |--------------------------------------------------------------------------
    */

/*
|--------------------------------------------------------------------------
| INSTRUCTORS
|--------------------------------------------------------------------------
*/

public function instructors()
{
    $teachers = AcademyTeacherCms::query()

        ->where('status', 'active')

        ->with([
            'department.translations' => function ($query) {

                $language = Language::where(
                    'code',
                    app()->getLocale()
                )->first();

                if ($language) {
                    $query->where(
                        'language_id',
                        $language->id
                    );
                }

            }
        ])

        ->orderBy('first_name', 'asc')

        ->get();


    return view(
        'website.academy.instructors',
        compact('teachers')
    );
}


    /*
    |--------------------------------------------------------------------------
    | INSTRUCTOR PROFILE
    |--------------------------------------------------------------------------
    */

 /*
|--------------------------------------------------------------------------
| INSTRUCTOR PROFILE
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| INSTRUCTOR PROFILE
|--------------------------------------------------------------------------
*/

public function instructorShow($id)
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();


    $teacher = AcademyTeacherCms::query()

        ->where('id', $id)

        ->where('status', 'active')

        ->with([
            'department.translations' => function ($query) use ($language) {

                if ($language) {

                    $query->where(
                        'language_id',
                        $language->id
                    );

                }

            },

            'classes' => function ($query) {

                $query->where('status', 'active')
                    ->with([
                        'translations'
                    ])
                    ->orderBy('start_date', 'asc');

            }
        ])

        ->firstOrFail();


    $departmentTitle =
        $teacher->department?->translations->first()?->title
        ?? '';


    return view(
        'website.academy.instructor-show',
        compact(
            'teacher',
            'departmentTitle'
        )
    );
}

    /*
    |--------------------------------------------------------------------------
    | SCHEDULE
    |--------------------------------------------------------------------------
    */

   /*
|--------------------------------------------------------------------------
| SCHEDULE
|--------------------------------------------------------------------------
*/

public function schedule()
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();


    $schedules = AcademyScheduleCms::query()

        ->where('status', 'active')

        ->with([

            /*
            |--------------------------------------------------------------------------
            | SCHEDULE TRANSLATION
            |--------------------------------------------------------------------------
            */

            'translations' => function ($query) use ($language) {

                if ($language) {

                    $query->where(
                        'language_id',
                        $language->id
                    );

                }

            },


            /*
            |--------------------------------------------------------------------------
            | CLASS
            |--------------------------------------------------------------------------
            */

            'academyClass.translations' => function ($query) use ($language) {

                if ($language) {

                    $query->where(
                        'language_id',
                        $language->id
                    );

                }

            },


            /*
            |--------------------------------------------------------------------------
            | TEACHER
            |--------------------------------------------------------------------------
            */

            'teacher.department.translations' => function ($query) use ($language) {

                if ($language) {

                    $query->where(
                        'language_id',
                        $language->id
                    );

                }

            }

        ])

        ->orderByRaw("
            CASE day_of_week
                WHEN 'Saturday' THEN 1
                WHEN 'Sunday' THEN 2
                WHEN 'Monday' THEN 3
                WHEN 'Tuesday' THEN 4
                WHEN 'Wednesday' THEN 5
                WHEN 'Thursday' THEN 6
                WHEN 'Friday' THEN 7
                ELSE 8
            END
        ")

        ->orderBy('start_time', 'asc')

        ->get();


    return view(
        'website.academy.schedule',
        compact('schedules')
    );
}


    /*
    |--------------------------------------------------------------------------
    | RESOURCES
    |--------------------------------------------------------------------------
    */

 /*
|--------------------------------------------------------------------------
| RESOURCES
|--------------------------------------------------------------------------
*/

public function resources()
{
    $query = AcademyResourceCms::query()
        ->where('status', 'active')
        ->with([
            'department',
            'academyClass'
        ])
        ->orderByDesc('is_featured')
        ->orderByDesc('published_date');

    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

    if (request('search')) {

        $search = request('search');

        $query->where(function ($q) use ($search) {

            $q->where('title', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%")
              ->orWhere('short_description', 'like', "%{$search}%");

        });
    }


    /*
    |--------------------------------------------------------------------------
    | RESOURCE TYPE FILTER
    |--------------------------------------------------------------------------
    */

    if (request('type')) {

        $query->where(
            'resource_type',
            request('type')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DEPARTMENT FILTER
    |--------------------------------------------------------------------------
    */

    if (request('department')) {

        $query->where(
            'department_id',
            request('department')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PAGINATION
    |--------------------------------------------------------------------------
    */

    $resources = $query
        ->paginate(9)
        ->withQueryString();


    /*
    |--------------------------------------------------------------------------
    | FILTER DATA
    |--------------------------------------------------------------------------
    */

    $departments = AcademyDepartmentCms::query()
        ->where('status', 'active')
        ->orderBy('id', 'asc')
        ->get();


    $resourceTypes = AcademyResourceCms::query()
        ->where('status', 'active')
        ->whereNotNull('resource_type')
        ->select('resource_type')
        ->distinct()
        ->orderBy('resource_type')
        ->pluck('resource_type');


    return view(
        'website.academy.resources',
        compact(
            'resources',
            'departments',
            'resourceTypes'
        )
    );
}
/*
|--------------------------------------------------------------------------
| RESOURCE DETAILS
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| RESOURCE DETAILS
|--------------------------------------------------------------------------
*/

public function resourceShow($id)
{
    $resource = AcademyResourceCms::query()

        ->where('id', $id)

        ->where('status', 'active')

        ->with([
            'department.translations',
            'academyClass.translations'
        ])

        ->firstOrFail();


    return view(
        'website.academy.resource-show',
        compact('resource')
    );
}
    /*
    |--------------------------------------------------------------------------
    | APPLY NOW
    |--------------------------------------------------------------------------
    */

 /*
|--------------------------------------------------------------------------
| APPLY NOW
|--------------------------------------------------------------------------
*/

public function applyNow()
{
    $language = Language::where(
        'code',
        app()->getLocale()
    )->first();

    $classes = AcademyClassCms::query()

        ->where('status', 'active')

        ->with([
            'translations' => function ($query) use ($language) {

                if ($language) {

                    $query->where(
                        'language_id',
                        $language->id
                    );

                }

            }
        ])

        ->orderBy('start_date', 'asc')

        ->get();


    return view(
        'website.academy.apply',
        compact('classes')
    );
}


/*
|--------------------------------------------------------------------------
| SUBMIT APPLICATION
|--------------------------------------------------------------------------
*/

public function submitApplication(Request $request)
{
    $validated = $request->validate([

        'first_name' =>
            'required|string|max:100',

        'last_name' =>
            'required|string|max:100',

        'gender' =>
            'required|in:male,female',

        'date_of_birth' =>
            'required|date',

        'email' =>
            'required|email|max:255',
        'password' =>
            'required|string|min:8|confirmed',

        'phone' =>
            'required|string|max:50',

        'address' =>
            'required|string|max:500',

        'emergency_contact_name' =>
            'required|string|max:100',

        'emergency_contact_phone' =>
            'required|string|max:50',

        'class_id' =>
            'required|exists:academy_classes_cms,id',

        'profile_image' =>
            'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'notes' =>
            'nullable|string|max:2000',

    ]);


    /*
    |--------------------------------------------------------------------------
    | CHECK ACTIVE CLASS
    |--------------------------------------------------------------------------
    */

    $class = AcademyClassCms::query()

        ->where('id', $validated['class_id'])

        ->where('status', 'active')

        ->first();


    if (!$class) {

        return back()

            ->withInput()

            ->withErrors([
                'class_id' =>
                    __('The selected class is not currently available.')
            ]);

    }


    /*
    |--------------------------------------------------------------------------
    | TRANSACTION
    |--------------------------------------------------------------------------
    */

    $enrollment = DB::transaction(function () use (
        $validated,
        $request
    ) {

        /*
        |--------------------------------------------------------------------------
        | PROFILE IMAGE
        |--------------------------------------------------------------------------
        */

        $profileImage = null;


        if ($request->hasFile('profile_image')) {

            $profileImage =
                $request
                    ->file('profile_image')
                    ->store(
                        'academy/students',
                        'public'
                    );

        }


        /*
        |--------------------------------------------------------------------------
        | CREATE STUDENT
        |--------------------------------------------------------------------------
        */

        $student = AcademyStudentCms::create([

            'first_name' =>
                $validated['first_name'],

            'last_name' =>
                $validated['last_name'],

            'gender' =>
                $validated['gender'],

            'date_of_birth' =>
                $validated['date_of_birth'],

            'email' =>
                $validated['email'],
                'password' =>
                Hash::make($validated['password']),

            'phone' =>
                $validated['phone'],

            'address' =>
                $validated['address'],

            'profile_image' =>
                $profileImage,

            'emergency_contact_name' =>
                $validated['emergency_contact_name'],

            'emergency_contact_phone' =>
                $validated['emergency_contact_phone'],

            'enrollment_date' =>
                now()->toDateString(),

            'status' =>
                'inactive',

            'notes' =>
                $validated['notes'] ?? null,

            'created_by' =>
                null,

        ]);


        /*
        |--------------------------------------------------------------------------
        | CREATE ENROLLMENT
        |--------------------------------------------------------------------------
        */

        return AcademyEnrollmentCms::create([

            'student_id' =>
                $student->id,

            'class_id' =>
                $validated['class_id'],

            'enrollment_date' =>
                now()->toDateString(),

            'enrollment_status' =>
                'pending',

            'final_result' =>
                null,

            'notes' =>
                $validated['notes'] ?? null,

            'created_by' =>
                null,

        ]);

    });


    /*
    |--------------------------------------------------------------------------
    | SEND ADMIN NOTIFICATION EMAIL
    |--------------------------------------------------------------------------
    */
/*
|--------------------------------------------------------------------------
| SEND ADMIN NOTIFICATION EMAIL
|--------------------------------------------------------------------------
*/

try {

    $adminEmail = config('mail.admin_email');

    if ($adminEmail) {

        Mail::to($adminEmail)
            ->send(
                new NewAcademyEnrollmentMail($enrollment)
            );

    }

} catch (\Throwable $e) {

    \Log::error('Academy enrollment email could not be sent.', [

        'enrollment_id' => $enrollment->id,

        'error' => $e->getMessage(),

    ]);

}
    /*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route('academy.apply.success')
        ->with('application_submitted', true);
}


/*
|--------------------------------------------------------------------------
| APPLICATION SUCCESS
|--------------------------------------------------------------------------
*/

public function applicationSuccess()
{
    if (!session('application_submitted')) {

        return redirect()
            ->route('academy.apply');
    }

    return view(
        'website.academy.application-success'
    );
}

public function studentLogin()
{
    if (session()->has('academy_student_id')) {
        return redirect()->route('academy.student.profile');
    }

    return view('website.academy.student-login');
}
public function studentLoginSubmit(Request $request)
{
    $validated = $request->validate([

        'email' =>
            'required|email',

        'password' =>
            'required|string',

    ]);


    /*
    |--------------------------------------------------------------------------
    | FIND STUDENT BY EMAIL
    |--------------------------------------------------------------------------
    */

    $student = AcademyStudentCms::where(
        'email',
        $validated['email']
    )->first();


    /*
    |--------------------------------------------------------------------------
    | EMAIL NOT FOUND
    |--------------------------------------------------------------------------
    */

    if (!$student) {

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' =>
                    __('The email address you entered is incorrect.')
            ]);

    }


    /*
    |--------------------------------------------------------------------------
    | PASSWORD CHECK
    |--------------------------------------------------------------------------
    */

    if (
        !$student->password ||
        !Hash::check(
            $validated['password'],
            $student->password
        )
    ) {

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'password' =>
                    __('The password you entered is incorrect.')
            ]);

    }


    /*
    |--------------------------------------------------------------------------
    | ACCOUNT NOT ACTIVE
    |--------------------------------------------------------------------------
    */

    if ($student->status !== 'active') {

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' =>
                    __('Dear student, your application has not been approved by the academy administration yet. Please wait until your application is approved. Once your account is activated, you will be able to access your student profile.')
            ]);

    }


    /*
    |--------------------------------------------------------------------------
    | LOGIN SUCCESS
    |--------------------------------------------------------------------------
    */

    session([
        'academy_student_id' => $student->id,
    ]);


    return redirect()
        ->route('academy.student.profile');
}
public function studentLogout(Request $request)
{
    $request->session()->forget('academy_student_id');

    $request->session()->regenerate();

    return redirect()
        ->route('academy.student.login');
}
public function studentProfile()
{
    $studentId = session('academy_student_id');

    if (!$studentId) {

        return redirect()
            ->route('academy.student.login');

    }

   $student = AcademyStudentCms::with([
    'enrollments.academyClass.translations',
    'certificates.academyClass.translations',
])->find($studentId);

    if (!$student) {

        session()->forget('academy_student_id');

        return redirect()
            ->route('academy.student.login')
            ->withErrors([
                'email' => __('Student account not found.')
            ]);

    }


    if ($student->status !== 'active') {

        session()->forget('academy_student_id');

        return redirect()
            ->route('academy.student.login')
            ->withErrors([
                'email' =>
                    __('Your student account is not active yet. Please wait for academy administration approval.')
            ]);

    }


    return view(
        'website.academy.student-profile',
        compact('student')
    );
}
}
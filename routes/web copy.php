<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsTranslationController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\AuditLogController;
use App\Http\Controllers\Admin\ActivityReportController;
use App\Http\Controllers\Admin\LegalSystemCmsController;
use App\Models\LegalSystemCms;
use App\Http\Controllers\Admin\LegalSystemTranslationController;
use App\Http\Controllers\Admin\LegalDocumentController;
use App\Http\Controllers\Admin\LegalCategoryController;
use App\Http\Controllers\Admin\LegalFileController;
use App\Http\Controllers\Admin\AnnouncementCmsController;
use App\Http\Controllers\Admin\AnnouncementTranslationController;
use App\Http\Controllers\Admin\ArchiveCmsController;
use App\Http\Controllers\Admin\ArchiveTranslationController;
use App\Http\Controllers\Admin\MediaCmsController;
use App\Http\Controllers\Admin\MediaTranslationController;
use App\Models\AcademyDepartmentCms;
use App\Models\AcademyDepartmentTranslationCms;
use App\Http\Controllers\Admin\AcademyDepartmentController;
use App\Http\Controllers\Admin\AcademyClassController;
use App\Http\Controllers\Admin\AcademyTeacherController;
use App\Http\Controllers\Admin\AcademyStudentController;
use App\Http\Controllers\Admin\AcademyEnrollmentController;
use App\Http\Controllers\Admin\AcademyScheduleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AcademyAssignmentController;
use App\Http\Controllers\Admin\AcademyAssignmentTranslationController;
use App\Http\Controllers\Admin\AcademyResourceController;
use App\Http\Controllers\Admin\AcademyGradeController;
use App\Http\Controllers\Admin\AcademyCertificateController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\LegalSystemController;

use App\Http\Controllers\Website\LegalDocumentController as WebsiteLegalDocumentController;
use App\Http\Controllers\Website\LegalCategoryController as WebsiteLegalCategoryController;
use App\Http\Controllers\Website\LegalFileController as WebsiteLegalFileController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('index');

Route::get('/about', function () {
    return view('website.about');
})->name('about');


Route::get('/services', function () {
    return view('website.services');
})->name('services');


Route::get('/contact', function () {
    return view('website.contact');
})->name('contact');


// ===============================
// Website Sections
// ===============================

Route::get('/academy', function () {
    return view('website.academy.index');
})->name('academy');


Route::get('/legal-system', [
    LegalSystemController::class,
    'index'
])->name('legal-system');


Route::get('/legal-system/{id}', [
    LegalSystemController::class,
    'show'
])->name('legal-system.show');

Route::get('/legal-document/{id}', [
    WebsiteLegalDocumentController::class,
    'show'
])->name('legal-document.show');

Route::get('/legal-category/{id}', [
    WebsiteLegalCategoryController::class,
    'show'
])->name('legal-category.show');
Route::get('/legal-file/{id}', [
    WebsiteLegalFileController::class,
    'show'
])->name('legal-file.show');

//  start  contact 
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');


Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');
//   end contact 





Route::get('/archive', function () {
    return view('website.archive.index');
})->name('archive');


Route::get('/news', function () {
    return view('website.news.index');
})->name('news');


// Zhila start Admin panel 
//   ترجمه زبان کل 


Route::get('/language/{code}', [LocaleController::class, 'switch'])
    ->name('language.switch');
    




/*
|--------------------------------------------------------------------------
| GUEST
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/admin/login', [LoginController::class, 'showLoginForm'])
        ->name('admin.login');

    Route::post('/admin/login', [LoginController::class, 'login'])
        ->name('admin.login.submit');

    Route::get('/admin/forgot-password', function () {
        return view('admin.auth.forgot-password');
    })->name('password.request');


    Route::post('/admin/forgot-password', function (Request $request) {

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Reset link sent to your email.')
            : back()->withErrors([
                'email' => 'Email not found.',
            ]);

    })->name('password.email');

});



/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {

    Auth::logout();

    request()->session()->invalidate();

    request()->session()->regenerateToken();

    return redirect('/admin/login');

})
->middleware('auth')
->name('logout');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/admin/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth'
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

  
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

    });
            /*
    |--------------------------------------------------------------------------
    | USERS
    |--------------------------------------------------------------------------
    */

   Route::middleware('permission:users')
    ->prefix('admin/users')
    ->name('admin.users.')
    ->group(function () {

            Route::get('/', [UserController::class, 'index'])
                ->name('index');

            Route::get('/create', [UserController::class, 'create'])
                ->name('create');

            Route::post('/store', [UserController::class, 'store'])
                ->name('store');

            Route::get('/edit/{id}', [UserController::class, 'edit'])
                ->name('edit');

            Route::put('/update/{id}', [UserController::class, 'update'])
                ->name('update');

            Route::get('/delete/{id}', [UserController::class, 'delete'])
                ->name('delete');

            Route::delete('/destroy/{id}', [UserController::class, 'destroy'])
                ->name('destroy');

            Route::get('/ajax', [UserController::class, 'ajax'])
                ->name('ajax');

        });

        /*
|--------------------------------------------------------------------------
| LANGUAGES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'permission:languages'])
    ->prefix('admin/languages')
    ->name('admin.languages.')
    ->group(function () {

        Route::get('/', [LanguageController::class, 'index'])
            ->name('index');

        Route::get('/create', [LanguageController::class, 'create'])
            ->name('create');

        Route::post('/store', [LanguageController::class, 'store'])
            ->name('store');

        Route::get('/edit/{id}', [LanguageController::class, 'edit'])
            ->name('edit');

        Route::put('/update/{id}', [LanguageController::class, 'update'])
            ->name('update');

        Route::get('/delete/{id}', [LanguageController::class, 'delete'])
            ->name('delete');

        Route::delete('/destroy/{id}', [LanguageController::class, 'destroy'])
            ->name('destroy');

        Route::get('/ajax', [LanguageController::class, 'ajax'])
            ->name('ajax');

Route::get('/language/{code}', [
    LanguageController::class,
    'switch'
])->name('language.switch');
            

    });


    /*
    |--------------------------------------------------------------------------
    | NEWS
    |--------------------------------------------------------------------------
    */

   Route::middleware(['auth', 'permission:news'])
    ->prefix('admin/news')
    ->name('admin.news.')
    ->group(function () {

            Route::get('/', [NewsController::class, 'index'])
                ->name('index');

            Route::get('/create', [NewsController::class, 'create'])
                ->name('create');

            Route::post('/store', [NewsController::class, 'store'])
                ->name('store');

            Route::get('/edit/{id}', [NewsController::class, 'edit'])
                ->name('edit');

            Route::post('/update/{id}', [NewsController::class, 'update'])
                ->name('update');

       Route::delete('/{news}', [NewsController::class, 'destroy'])
                  ->name('destroy');

            Route::get('/ajax', [NewsController::class, 'ajax'])
                ->name('ajax');

                 // =========================
                // NEWS TRANSLATION
                // =========================

                Route::prefix('/{news}/translation')
                    ->name('translation.')
                    ->group(function () {

                        // نمایش فرم Translation
                        Route::get('/', [NewsTranslationController::class, 'form'])
                            ->name('form');

                        // ذخیره یا ویرایش Translation
                        Route::post('/', [NewsTranslationController::class, 'storeOrUpdate'])
                            ->name('save');

                        // حذف Translation
                        Route::delete('/{translation}', [NewsTranslationController::class, 'destroy'])
                            ->name('destroy');

                    });
        });
      

   



  
   // ==========================================
    // ANNOUNCEMENTS
    // ==========================================
Route::middleware(['auth', 'permission:announcements'])
    ->prefix('admin/announcements')
    ->name('admin.announcements.')
    ->group(function () {


            Route::get('/', [AnnouncementCmsController::class, 'index'])
                ->name('index');


            Route::get('/create', [AnnouncementCmsController::class, 'create'])
                ->name('create');


            Route::post('/store', [AnnouncementCmsController::class, 'store'])
                ->name('store');


            Route::get('/edit/{id}', [AnnouncementCmsController::class, 'edit'])
                ->name('edit');


            Route::post('/update/{id}', [AnnouncementCmsController::class, 'update'])
                ->name('update');


            Route::delete('/{announcement}', [AnnouncementCmsController::class, 'destroy'])
                ->name('destroy');



            // ==========================================
            // TRANSLATIONS
            // ==========================================

            Route::prefix('{announcement}/translations')
                ->name('translations.')
                ->group(function () {


                    Route::get('/', 
                        [AnnouncementTranslationController::class, 'index']
                    )
                    ->name('index');



                    Route::post('/store',
                        [AnnouncementTranslationController::class, 'store']
                    )
                    ->name('store');



                    Route::delete('/{translation}',
                        [AnnouncementTranslationController::class, 'destroy']
                    )
                    ->name('destroy');


                });


        });

  

   

   /*
    |--------------------------------------------------------------------------
    | AUDIT LOGS
    |--------------------------------------------------------------------------
    */

       Route::middleware(['auth', 'permission:audit_logs'])
    ->prefix('admin/audit-logs')
    ->name('admin.audit_logs.')
    ->group(function () {


                Route::get('/', [AuditLogController::class, 'index'])
                    ->name('index');


                Route::delete('/clean', [AuditLogController::class, 'cleanLogs'])
                    ->name('clean');


        });

            /*
|--------------------------------------------------------------------------
| ACTIVITY REPORTS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'permission:activity_reports'])
    ->prefix('admin/activity-reports')
    ->name('admin.activity_reports.')
    ->group(function () {

        // INDEX
        Route::get('/', [ActivityReportController::class, 'index'])
            ->name('index');

        // CREATE
        Route::get('/create', [ActivityReportController::class, 'create'])
            ->name('create');

        // STORE
        Route::post('/store', [ActivityReportController::class, 'store'])
            ->name('store');

        // EDIT
        Route::get('/edit/{id}', [ActivityReportController::class, 'edit'])
            ->name('edit');

        // UPDATE
        Route::put('/update/{id}', [ActivityReportController::class, 'update'])
            ->name('update');

        // DELETE PAGE
        Route::get('/delete/{id}', [ActivityReportController::class, 'delete'])
            ->name('delete');

        // DESTROY
        Route::delete('/destroy/{id}', [ActivityReportController::class, 'destroy'])
            ->name('destroy');

        // TRANSLATION
        Route::get('/translation/{id}', [ActivityReportController::class, 'translation'])
            ->name('translation');

        Route::post('/translation/store/{id}', [ActivityReportController::class, 'translationStore'])
            ->name('translation.store');

        Route::put('/translation/update/{id}', [ActivityReportController::class, 'translationUpdate'])
            ->name('translation.update');
            

          
            Route::get('/{id}/translation', 
                [ActivityReportController::class,'translation']
            )->name('translation');


            Route::post('/{id}/translation',
                [ActivityReportController::class,'saveTranslation']
            )->name('saveTranslation');
            Route::delete('/delete/{id}', [ActivityReportController::class, 'destroy'])
          ->name('destroy');


        // AJAX SEARCH
        Route::get('/ajax', [ActivityReportController::class, 'ajax'])
            ->name('ajax');

    });
});

   // ==================================================
// LEGAL SYSTEMS CMS
// ==================================================
Route::middleware(['auth', 'permission:legal-systems'])
    ->prefix('admin/legal-systems')
    ->name('admin.legal-systems.')
    ->group(function () {

        // Main Legal System

        Route::get('/', [LegalSystemCmsController::class, 'index'])
            ->name('index');


        Route::get('/ajax', [LegalSystemCmsController::class, 'ajax'])
            ->name('ajax');


        Route::get('/create', [LegalSystemCmsController::class, 'create'])
            ->name('create');


        Route::post('/store', [LegalSystemCmsController::class, 'store'])
            ->name('store');


        Route::get('/edit/{id}', [LegalSystemCmsController::class, 'edit'])
            ->name('edit');


        Route::post('/update/{id}', [LegalSystemCmsController::class, 'update'])
            ->name('update');


        Route::delete('/{legalSystem}', [LegalSystemCmsController::class, 'destroy'])
            ->name('destroy');





        // Translation

        Route::prefix('{legalSystem}/translations')
            ->name('translations.')
            ->group(function () {


                Route::get('/', [LegalSystemTranslationController::class, 'index'])
                    ->name('index');


                Route::post('/store', [LegalSystemTranslationController::class, 'store'])
                    ->name('store');


                Route::delete('/{translation}', [LegalSystemTranslationController::class, 'destroy'])
                    ->name('destroy');


            });


    });

  /*
|--------------------------------------------------------------------------
| legal-documents
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','permission:legal_documents'])
->prefix('admin/legal-documents')
->name('admin.legal_documents.')
->group(function () {
        // Index
        Route::get('/', [LegalDocumentController::class, 'index'])
            ->name('index');

        // Create
        Route::get('/create', [LegalDocumentController::class, 'create'])
            ->name('create');

        // Store
        Route::post('/store', [LegalDocumentController::class, 'store'])
            ->name('store');

        // Edit
        Route::get('/edit/{id}', [LegalDocumentController::class, 'edit'])
            ->name('edit');

        // Update
        Route::put('/update/{id}', [LegalDocumentController::class, 'update'])
            ->name('update');

        // Delete
        Route::delete('/delete/{id}', [LegalDocumentController::class, 'destroy'])
            ->name('destroy');

        // Translation
        Route::get('/translation/{id}', [LegalDocumentController::class, 'translation'])
            ->name('translation');

        // Save Translation
        Route::post('/translation/{id}', [LegalDocumentController::class, 'saveTranslation'])
            ->name('translation.store');

        // Update Translation
        Route::put('/translation/{id}', [LegalDocumentController::class, 'updateTranslation'])
            ->name('translation.update');

        // Delete Translation
        Route::delete('/translation/delete/{translation}',
            [LegalDocumentController::class, 'deleteTranslation'])
            ->name('translation.delete');
            Route::post('/translation/save/{id}', [LegalDocumentController::class, 'saveTranslation'])
         ->name('saveTranslation');

         Route::delete('/translation/delete/{id}',
            [LegalDocumentController::class,'deleteTranslation']
        )->name('deleteTranslation');

    });
    /*
|--------------------------------------------------------------------------
| legal-category
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth',
    'permission:legal_categories'
])
->prefix('admin/legal-categories')
->name('admin.legal_categories.')
->group(function () {


        Route::get('/', [LegalCategoryController::class, 'index'])
            ->name('index');



        Route::get('/create', [LegalCategoryController::class, 'create'])
            ->name('create');



        Route::post('/store', [LegalCategoryController::class, 'store'])
            ->name('store');



        Route::get('/edit/{id}', [LegalCategoryController::class, 'edit'])
            ->name('edit');



        Route::put('/update/{id}', [LegalCategoryController::class, 'update'])
            ->name('update');



        Route::get('/translation/{id}', [LegalCategoryController::class, 'translation'])
            ->name('translation');



        Route::post('/translation/save/{id}', [LegalCategoryController::class, 'saveTranslation'])
            ->name('saveTranslation');



        Route::delete('/translation/delete/{id}', [LegalCategoryController::class, 'deleteTranslation'])
            ->name('deleteTranslation');



        Route::delete('/delete/{id}', [LegalCategoryController::class, 'destroy'])
            ->name('destroy');


    });

    /*
|--------------------------------------------------------------------------
| Legal Files CMS
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth',
    'permission:legal_files'
])
->prefix('admin/legal-files')
->name('admin.legal_files.')
->group(function () {


        Route::get('/', 
            [LegalFileController::class,'index']
        )
        ->name('index');



        Route::get('/create', 
            [LegalFileController::class,'create']
        )
        ->name('create');



        Route::post('/store', 
            [LegalFileController::class,'store']
        )
        ->name('store');



        Route::get('/edit/{id}', 
            [LegalFileController::class,'edit']
        )
        ->name('edit');



        Route::put('/update/{id}', 
            [LegalFileController::class,'update']
        )
        ->name('update');



        Route::get('/translation/{id}', 
            [LegalFileController::class,'translation']
        )
        ->name('translation');



        Route::post('/translation/save/{id}', 
            [LegalFileController::class,'saveTranslation']
        )
        ->name('saveTranslation');



        Route::delete('/translation/delete/{id}', 
            [LegalFileController::class,'deleteTranslation']
        )
        ->name('deleteTranslation');



       Route::delete('/delete/{id}', 
            [LegalFileController::class,'destroy']
        )
        ->name('destroy');


    });
    // ==========================================
    // ARCHIVES
    // ==========================================

    Route::middleware([
    'auth',
    'permission:archives'
])
->prefix('admin/archives')
->name('admin.archives.')
->group(function () {

            Route::get('/', 
                [ArchiveCmsController::class, 'index']
            )
            ->name('index');



            Route::get('/create',
                [ArchiveCmsController::class, 'create']
            )
            ->name('create');



            Route::post('/store',
                [ArchiveCmsController::class, 'store']
            )
            ->name('store');



            Route::get('/edit/{id}',
                [ArchiveCmsController::class, 'edit']
            )
            ->name('edit');



            Route::post('/update/{id}',
                [ArchiveCmsController::class, 'update']
            )
            ->name('update');
            Route::delete('/{archive}',
                [ArchiveCmsController::class, 'destroy']
            )
            ->name('destroy');
            // ==========================================
            // TRANSLATIONS
            // ==========================================

            Route::prefix('{archive}/translations')
                ->name('translations.')
                ->group(function () {
                    Route::get('/',
                        [ArchiveTranslationController::class, 'index']
                    )
                    ->name('index');
                    Route::post('/store',
                        [ArchiveTranslationController::class, 'store']
                    )
                    ->name('store');
                    Route::delete('/{translation}',
                        [ArchiveTranslationController::class, 'destroy']
                    )
                    ->name('destroy');
                });
        });
    // ==========================================
    // MEDIA CMS
    // ==========================================
      Route::middleware([
    'auth',
    'permission:media'
])
->prefix('admin/media')
->name('admin.media.')
->group(function () {
            Route::get('/',
                [MediaCmsController::class,'index']
            )
            ->name('index');
            Route::get('/create',
                [MediaCmsController::class,'create']
            )
            ->name('create');
            Route::post('/store',
                [MediaCmsController::class,'store']
            )
            ->name('store');
            Route::get('/edit/{id}',
                [MediaCmsController::class,'edit']
            )
            ->name('edit');
            Route::post('/update/{id}',
                [MediaCmsController::class,'update']
            )

            ->name('update');

            Route::delete('/{media}',

                [MediaCmsController::class,'destroy']

            )

            ->name('destroy');

            // ==========================================
            // TRANSLATIONS
            // ==========================================
            Route::prefix('{media}/translations')
                ->name('translations.')
                ->group(function(){
                    Route::get('/',
                        [MediaTranslationController::class,'index']
                    )
                    ->name('index');
                    Route::post('/store',
                        [MediaTranslationController::class,'store']
                    )
                    ->name('store');
                    Route::delete('/{translation}',

                        [MediaTranslationController::class,'destroy']
                    )

                    ->name('destroy');
                });

        });
        /*
|--------------------------------------------------------------------------
| Academy Departments
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'permission:academy_departments'
])
->prefix('admin/academy-departments')
->name('admin.academy_departments.')
->group(function () {

        Route::get('/',
            [AcademyDepartmentController::class,'index']
        )->name('index');



        Route::get('/create',
            [AcademyDepartmentController::class,'create']
        )->name('create');



        Route::post('/store',
            [AcademyDepartmentController::class,'store']
        )->name('store');



        Route::get('/edit/{id}',
            [AcademyDepartmentController::class,'edit']
        )->name('edit');



        Route::put('/update/{id}',
            [AcademyDepartmentController::class,'update']
        )->name('update');



        Route::get('/translation/{id}',
            [AcademyDepartmentController::class,'translation']
        )->name('translation');



        Route::post('/translation/save/{id}',
            [AcademyDepartmentController::class,'saveTranslation']
        )->name('saveTranslation');



        Route::delete('/translation/delete/{id}',
            [AcademyDepartmentController::class,'deleteTranslation']
        )->name('deleteTranslation');



        Route::delete('/delete/{id}',
            [AcademyDepartmentController::class,'destroy']
        )->name('destroy');

    });
    /*
|--------------------------------------------------------------------------
| Academy Classes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'permission:academy_classes'
])
->prefix('admin/academy-classes')
->name('admin.academy_classes.')
->group(function () {


        Route::get('/',
            [AcademyClassController::class,'index']
        )->name('index');



        Route::get('/create',
            [AcademyClassController::class,'create']
        )->name('create');



        Route::post('/store',
            [AcademyClassController::class,'store']
        )->name('store');



        Route::get('/edit/{id}',
            [AcademyClassController::class,'edit']
        )->name('edit');



        Route::put('/update/{id}',
            [AcademyClassController::class,'update']
        )->name('update');



        Route::get('/translation/{id}',
            [AcademyClassController::class,'translation']
        )->name('translation');



        Route::post('/translation/save/{id}',
            [AcademyClassController::class,'saveTranslation']
        )->name('saveTranslation');



        Route::delete('/translation/delete/{id}',
            [AcademyClassController::class,'deleteTranslation']
        )->name('deleteTranslation');



        Route::delete('/delete/{id}',
            [AcademyClassController::class,'destroy']
        )->name('destroy');
         Route::get(
            '/translation/{id}',
            [AcademyClassController::class,'translation']
        )->name('translation');

        Route::post(
            '/translation/save/{id}',
            [AcademyClassController::class,'saveTranslation']
        )->name('translation.save');

        Route::delete(
            '/translation/delete/{id}',
            [AcademyClassController::class,'deleteTranslation']
        )->name('translation.delete');


    });
  
    // teacher rote 


Route::middleware([
    'auth',
    'permission:academy_teachers'
])
->prefix('academy-teachers')
->name('admin.academy_teachers.')
->group(function(){


        Route::get('/',
        [AcademyTeacherController::class,'index']
        )->name('index');



        Route::get('/create',
        [AcademyTeacherController::class,'create']
        )->name('create');



        Route::post('/store',
        [AcademyTeacherController::class,'store']
        )->name('store');



        Route::get('/edit/{id}',
        [AcademyTeacherController::class,'edit']
        )->name('edit');



        Route::put('/update/{id}',
        [AcademyTeacherController::class,'update']
        )->name('update');



        Route::delete('/delete/{id}',
        [AcademyTeacherController::class,'destroy']
        )->name('destroy');

       


    });

    // student rout 
 Route::middleware([
    'auth',
    'permission:academy_students'
])
->prefix('academy-students')
->name('admin.academy_students.')
->group(function () {

        Route::get('/',
        [AcademyStudentController::class,'index']
        )->name('index');



        Route::get('/create',
        [AcademyStudentController::class,'create']
        )->name('create');



        Route::post('/store',
        [AcademyStudentController::class,'store']
        )->name('store');



        Route::get('/edit/{id}',
        [AcademyStudentController::class,'edit']
        )->name('edit');



        Route::put('/update/{id}',
        [AcademyStudentController::class,'update']
        )->name('update');



        Route::delete('/delete/{id}',
        [AcademyStudentController::class,'destroy']
        )->name('destroy');
       

    });
      

    // AcademyEnrollmentController  
   Route::middleware([
    'auth',
    'permission:academy_enrollments'
])
->prefix('academy-enrollments')
->name('admin.academy_enrollments.')
->group(function () {

        Route::get('/',
        [AcademyEnrollmentController::class,'index']
        )->name('index');



        Route::get('/create',
        [AcademyEnrollmentController::class,'create']
        )->name('create');



        Route::post('/store',
        [AcademyEnrollmentController::class,'store']
        )->name('store');



        Route::get('/edit/{id}',
        [AcademyEnrollmentController::class,'edit']
        )->name('edit');

        

        Route::put('/update/{id}',
        [AcademyEnrollmentController::class,'update']
        )->name('update');



        Route::delete('/delete/{id}',
        [AcademyEnrollmentController::class,'destroy']
        )->name('destroy');

    });

    // academy-schedules 
   Route::middleware([
    'auth',
    'permission:academy_schedules'
])
->prefix('academy-schedules')
->name('admin.academy_schedules.')
->group(function () {

    Route::get('/',
    [AcademyScheduleController::class,'index'])
    ->name('index');

    Route::get('/create',
    [AcademyScheduleController::class,'create'])
    ->name('create');

    Route::post('/store',
    [AcademyScheduleController::class,'store'])
    ->name('store');

    Route::get('/edit/{id}',
    [AcademyScheduleController::class,'edit'])
    ->name('edit');

    Route::put('/update/{id}',
    [AcademyScheduleController::class,'update'])
    ->name('update');

    Route::delete('/delete/{id}',
    [AcademyScheduleController::class,'destroy'])
    ->name('destroy');

    Route::get('/translation/{id}',
    [AcademyScheduleController::class,'translation'])
    ->name('translation');

    Route::post('/translation/save/{id}',
    [AcademyScheduleController::class,'saveTranslation'])
    ->name('translation.save');

    Route::delete('/translation/delete/{id}',
    [AcademyScheduleController::class,'deleteTranslation'])
    ->name('translation.delete');
    
    Route::delete(
    '/delete/{id}',
    [AcademyScheduleController::class, 'destroy']
        )->name('destroy');

});


// academy-assignments

Route::middleware([
    'auth',
    'permission:academy_assignments'
])
->prefix('academy-assignments')
->name('admin.academy_assignments.')
->group(function () {

        Route::get('/', [AcademyAssignmentController::class,'index'])
            ->name('index');

        Route::get('/create', [AcademyAssignmentController::class,'create'])
            ->name('create');

        Route::post('/store', [AcademyAssignmentController::class,'store'])
            ->name('store');

        Route::get('/edit/{id}', [AcademyAssignmentController::class,'edit'])
            ->name('edit');

        Route::put('/update/{id}', [AcademyAssignmentController::class,'update'])
            ->name('update');

        Route::delete('/delete/{id}', [AcademyAssignmentController::class,'destroy'])
            ->name('destroy');

       Route::get(
            '/translation/{id}',
            [AcademyAssignmentTranslationController::class,'index']
        )->name('translation');


        Route::post(
            '/translation/{id}',
            [AcademyAssignmentTranslationController::class,'store']
        )->name('translation.store');


        Route::delete(
            '/translation/{id}',
            [AcademyAssignmentTranslationController::class,'destroy']
        )->name('translation.destroy');
            });


            /*
|--------------------------------------------------------------------------
| academy-resources
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'permission:academy_resources'
])
->prefix('academy-resources')
->name('admin.academy_resources.')
->group(function () {

        Route::get('/', [AcademyResourceController::class,'index'])
            ->name('index');

        Route::get('/create', [AcademyResourceController::class,'create'])
            ->name('create');

        Route::post('/store', [AcademyResourceController::class,'store'])
            ->name('store');

        Route::get('/edit/{id}', [AcademyResourceController::class,'edit'])
            ->name('edit');

        Route::put('/update/{id}', [AcademyResourceController::class,'update'])
            ->name('update');

        Route::delete('/delete/{id}', [AcademyResourceController::class,'destroy'])
            ->name('destroy');

});

// academy-grades 

Route::middleware([
    'auth',
    'permission:academy_grades'
])
->prefix('academy-grades')
->name('admin.academy_grades.')
->group(function () {


        Route::get('/', [AcademyGradeController::class,'index'])
            ->name('index');


        Route::get('/create', [AcademyGradeController::class,'create'])
            ->name('create');


        Route::post('/store', [AcademyGradeController::class,'store'])
            ->name('store');


        Route::get('/edit/{id}', [AcademyGradeController::class,'edit'])
            ->name('edit');


        Route::put('/update/{id}', [AcademyGradeController::class,'update'])
            ->name('update');


        Route::delete('/delete/{id}', [AcademyGradeController::class,'destroy'])
            ->name('destroy');


    });
 
    //  academy-certificates 
Route::middleware([
    'auth',
    'permission:academy_certificates'
])
->prefix('academy-certificates')
->name('admin.academy_certificates.')
->group(function(){


        Route::get('/',
            [AcademyCertificateController::class,'index']
        )->name('index');


        Route::get('/create',
            [AcademyCertificateController::class,'create']
        )->name('create');


        Route::post('/store',
            [AcademyCertificateController::class,'store']
        )->name('store');


        Route::get('/edit/{id}',
            [AcademyCertificateController::class,'edit']
        )->name('edit');


        Route::put('/update/{id}',
            [AcademyCertificateController::class,'update']
        )->name('update');


        Route::delete('/delete/{id}',
            [AcademyCertificateController::class,'destroy']
        )->name('destroy');


    });

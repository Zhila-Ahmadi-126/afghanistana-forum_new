<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AcademyResourceCms;
use App\Models\AcademyDepartmentCms;
use App\Models\AcademyClassCms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AcademyResourceController extends Controller
{

/*
|--------------------------------------------------------------------------
| INDEX
|--------------------------------------------------------------------------
*/

public function index(Request $request)
{

    $resources = AcademyResourceCms::with([

        'department',

        'academyClass',

        'creator',

    ]);


    if($request->search){

        $resources->where(function($query) use($request){

            $query->where(

                'title',

                'like',

                '%'.$request->search.'%'

            )->orWhere(

                'author',

                'like',

                '%'.$request->search.'%'

            );

        });

    }


    if($request->department_id){

        $resources->where(

            'department_id',

            $request->department_id

        );

    }


    if($request->class_id){

        $resources->where(

            'class_id',

            $request->class_id

        );

    }


    if($request->resource_type){

        $resources->where(

            'resource_type',

            $request->resource_type

        );

    }


    if($request->status){

        $resources->where(

            'status',

            $request->status

        );

    }


    $resources = $resources

        ->latest()

        ->paginate(10)

        ->withQueryString();


    $departments = AcademyDepartmentCms::orderBy('id')->get();

    $classes = AcademyClassCms::orderBy('id')->get();


    return view(

        'admin.academy_resources.index',

        compact(

            'resources',

            'departments',

            'classes'

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

    $departments = AcademyDepartmentCms::orderBy('id')->get();

    $classes = AcademyClassCms::orderBy('id')->get();


    return view(

        'admin.academy_resources.create',

        compact(

            'departments',

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

        'department_id' => 'required|exists:academy_departments_cms,id',

        'class_id' => 'required|exists:academy_classes_cms,id',

        'resource_type' => 'required|in:book,pdf,video,link,file,html',

        'title' => 'required|string|max:255',

        'author' => 'nullable|string|max:255',

        'cover_image' => 'nullable|image|max:4096',

        'file_path' => 'nullable|file|max:51200',

        'external_url' => 'nullable|url',

        'html_path' => 'nullable|string|max:255',

        'short_description' => 'nullable|string',

        'description' => 'nullable|string',

        'published_date' => 'nullable|date',

        'status' => 'required|in:active,inactive',

        'is_featured' => 'nullable',

    ]);


    $cover = null;

    $file = null;


    if($request->hasFile('cover_image')){

        $cover = $request

            ->file('cover_image')

            ->store(

                'academy/resources/covers',

                'public'

            );

    }


    if($request->hasFile('file_path')){

        $file = $request

            ->file('file_path')

            ->store(

                'academy/resources/files',

                'public'

            );

    }


    AcademyResourceCms::create([

        'department_id' => $request->department_id,

        'class_id' => $request->class_id,

        'resource_type' => $request->resource_type,

        'title' => $request->title,

        'author' => $request->author,

        'cover_image' => $cover,

        'file_path' => $file,

        'external_url' => $request->external_url,

        'html_path' => $request->html_path,

        'short_description' => $request->short_description,

        'description' => $request->description,

        'published_date' => $request->published_date,

        'status' => $request->status,

        'is_featured' => $request->boolean('is_featured'),

        'created_by' => Auth::id(),

    ]);


    return redirect()

        ->route('admin.academy_resources.index')

        ->with(

            'success',

            __('admin.general.created_successfully')

        );

}/*
|--------------------------------------------------------------------------
| EDIT
|--------------------------------------------------------------------------
*/

public function edit($id)
{

    $resource = AcademyResourceCms::findOrFail($id);


    $departments = AcademyDepartmentCms::orderBy('id')->get();

    $classes = AcademyClassCms::orderBy('id')->get();


    return view(

        'admin.academy_resources.edit',

        compact(

            'resource',

            'departments',

            'classes'

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

        'department_id' => 'required|exists:academy_departments_cms,id',

        'class_id' => 'required|exists:academy_classes_cms,id',

        'resource_type' => 'required|in:book,pdf,video,link,file,html',

        'title' => 'required|string|max:255',

        'author' => 'nullable|string|max:255',

        'cover_image' => 'nullable|image|max:4096',

        'file_path' => 'nullable|file|max:51200',

        'external_url' => 'nullable|url',

        'html_path' => 'nullable|string|max:255',

        'short_description' => 'nullable|string',

        'description' => 'nullable|string',

        'published_date' => 'nullable|date',

        'status' => 'required|in:active,inactive',

    ]);


    $resource = AcademyResourceCms::findOrFail($id);


    $data = [

        'department_id' => $request->department_id,

        'class_id' => $request->class_id,

        'resource_type' => $request->resource_type,

        'title' => $request->title,

        'author' => $request->author,

        'external_url' => $request->external_url,

        'html_path' => $request->html_path,

        'short_description' => $request->short_description,

        'description' => $request->description,

        'published_date' => $request->published_date,

        'status' => $request->status,

        'is_featured' => $request->boolean('is_featured'),

    ];


    /*
    |--------------------------------------------------------------------------
    | Replace Cover Image
    |--------------------------------------------------------------------------
    */

    if($request->hasFile('cover_image')){

        if($resource->cover_image){

            Storage::disk('public')->delete(

                $resource->cover_image

            );

        }

        $data['cover_image'] = $request

            ->file('cover_image')

            ->store(

                'academy/resources/covers',

                'public'

            );

    }



    /*
    |--------------------------------------------------------------------------
    | Replace Resource File
    |--------------------------------------------------------------------------
    */

    if($request->hasFile('file_path')){

        if($resource->file_path){

            Storage::disk('public')->delete(

                $resource->file_path

            );

        }

        $data['file_path'] = $request

            ->file('file_path')

            ->store(

                'academy/resources/files',

                'public'

            );

    }


    $resource->update($data);


    return redirect()

        ->route('admin.academy_resources.index')

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

    $resource = AcademyResourceCms::findOrFail($id);


    if($resource->cover_image){

        Storage::disk('public')->delete(

            $resource->cover_image

        );

    }


    if($resource->file_path){

        Storage::disk('public')->delete(

            $resource->file_path

        );

    }


    $resource->delete();


    return redirect()

        ->route('admin.academy_resources.index')

        ->with(

            'success',

            __('admin.general.deleted_successfully')

        );

}


}
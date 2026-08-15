<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\AuditHelper;

class LanguageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Language::query();

        // Search
        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%");

            });

        }

        // Status
        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $languages = $query
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.languages.index', compact('languages'));
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX SEARCH
    |--------------------------------------------------------------------------
    */

    public function ajax(Request $request)
    {
        $query = Language::query();

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('code', 'LIKE', "%{$search}%");

            });

        }

        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }

        $languages = $query
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return response()->json($languages);
    }
        /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.languages.create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

  public function store(Request $request)
{

    $request->validate([

        'name' => 'required|max:100',

        'code' => 'required|max:10|unique:languages,code',

        'status' => 'required|in:active,inactive',

        'sort_order' => 'nullable|integer',

    ]);


    DB::beginTransaction();


    try {


        $language = Language::create([

            'name' => $request->name,

            'code' => $request->code,

            'status' => $request->status,

            'sort_order' => $request->sort_order ?? 0,

        ]);




        AuditHelper::log(

            $language,

            'languages',

            'insert',

            'Languages',

            $language->id,

            $language->name,

            'New language created.'

        );




        DB::commit();



        return redirect()

            ->route('admin.languages.index')

            ->with('success','Language created successfully.');



    } catch(\Exception $e) {


        DB::rollBack();


        return back()

            ->withInput()

            ->with('error',$e->getMessage());


    }


}



    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {

        $language = Language::findOrFail($id);


        return view(
            'admin.languages.edit',
            compact('language')
        );

    }



    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
{

    $language = Language::findOrFail($id);
    $oldData = $language->toArray();



    $validated = $request->validate([


        'name' => [
            'required',
            'string',
            'max:100'
        ],


        'code' => [
            'required',
            'string',
            'max:10',
            'unique:languages,code,' . $id
        ],


        'status' => [
            'required',
            'in:active,inactive'
        ],


        'sort_order' => [
            'nullable',
            'integer'
        ]


    ]);




    DB::beginTransaction();


    try {



        // Old Data For Audit

        $oldData = $language->toArray();




        $language->update([


            'name'       => $validated['name'],

            'code'       => $validated['code'],

            'status'     => $validated['status'],

            'sort_order' => $validated['sort_order'] ?? 0,


        ]);





AuditHelper::log(

    $language,

    'languages',

    'update',

    'Languages',

    $language->id,

    $language->name,

    'Language information updated.',

    array_keys(array_diff_assoc(
        $language->toArray(),
        $oldData
    )),

    $oldData,

    $language->toArray()

);






        DB::commit();




        return redirect()

            ->route('admin.languages.index')

            ->with('success','Language updated successfully.');





    } catch(\Exception $e) {



        DB::rollBack();



        return back()

            ->withInput()

            ->with('error',$e->getMessage());


    }



}



    /*
    |--------------------------------------------------------------------------
    | DELETE CONFIRM PAGE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {

        $language = Language::findOrFail($id);


        return view(
            'admin.languages.delete',
            compact('language')
        );

    }



    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

  /*
|--------------------------------------------------------------------------
| DESTROY
|--------------------------------------------------------------------------
*/

public function destroy($id)
{

    $language = Language::findOrFail($id);


    DB::beginTransaction();


    try {


        // Save old data for audit

        $oldData = $language->toArray();




        // Audit Log Before Delete

      AuditHelper::log(

    $language,

    'languages',

    'delete',

    'Languages',

    $language->id,

    $language->name,

    'Language deleted.',

    null,

    $language->toArray(),

    null

);




        // Delete Language

        $language->delete();





        DB::commit();




        return redirect()

            ->route('admin.languages.index')

            ->with('success','Language deleted successfully.');




    } catch (\Exception $e) {



        DB::rollBack();



        return back()

            ->with('error',$e->getMessage());


    }



}

}
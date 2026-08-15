<?php

namespace App\Http\Controllers\Admin;

use App\Models\LegalSystemCms;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AuditHelper;
use Illuminate\Support\Facades\Auth;
use App\Models\LegalSystemTranslation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class LegalSystemCmsController extends Controller
{

  public function index(Request $request)
{
    $languageId = $request->language_id;

    $legalSystems = LegalSystemCms::with([
            'translations',
            'translations.language'
        ])
        ->when($languageId, function($query) use ($languageId){

            $query->whereHas('translations', function($q) use ($languageId){

                $q->where('language_id',$languageId);

            });

        })
        ->latest()
        ->paginate(10);


    $languages = \App\Models\Language::orderBy('name')->get();


    return view(
        'admin.legal-systems.index',
        compact(
            'legalSystems',
            'languages'
        )
    );
}



    public function ajax()
    {
        $legalSystems = LegalSystemCms::with('creator')
            ->latest()
            ->get();

        return response()->json($legalSystems);
    }



  public function create()
{
    $languages = \App\Models\Language::orderBy('name')->get();

    return view(
        'admin.legal-systems.create',
        compact('languages')
    );
}





   public function store(Request $request)
{

    $request->validate([

        'language_id' => 'required|exists:languages,id',
        

        'title' => 'required|string|max:255',

        'summary' => 'nullable',

        'content' => 'nullable',

        'image' => 'nullable|image|max:2048',

        'status' => 'required|in:active,inactive',

    ]);





    $imagePath = null;



    if($request->hasFile('image')){


        $imagePath = $request->file('image')
            ->store('legal-systems','public');


    }





$legalSystem = LegalSystemCms::create([

    'type' => $request->title,
     'image' => $imagePath,
    

    'status' => $request->status,

    'created_by' => Auth::id(),

]);







    LegalSystemTranslation::create([


        'legal_system_id' => $legalSystem->id,


        'language_id' => $request->language_id,


        'title' => $request->title,


        'slug' => Str::slug($request->title),


        'summary' => $request->summary,


        'content' => $request->content,


    ]);






    AuditHelper::log(

        Auth::user(),

        'legal_systems_cms',

        'insert',

        'Legal System',

        $legalSystem->id,

        $request->title,

        'Created legal system'

    );






    return redirect()

        ->route('admin.legal-systems.index')

        ->with('success','Legal System created successfully');

}





public function edit($id)
{

    $legalSystem = LegalSystemCms::with([
        'translations.language'
    ])->findOrFail($id);



    $translation = $legalSystem->translations->first();



    return view(
        'admin.legal-systems.edit',
        compact(
            'legalSystem',
            'translation'
        )
    );

}

public function update(Request $request, $id)
{

    $request->validate([

        'title' => 'required|string|max:255',

        'status' => 'required|in:active,inactive',

        'image' => 'nullable|image|max:2048',

    ]);



    $legalSystem = LegalSystemCms::findOrFail($id);



    // Old data for audit

    $oldData = $legalSystem->toArray();





    // Update Image

    if($request->hasFile('image')){


    // Delete old image
    if($legalSystem->image && Storage::disk('public')->exists($legalSystem->image)){

    Storage::disk('public')->delete($legalSystem->image);

    }


    // Upload new image
    $imagePath = $request->file('image')
        ->store('legal-systems','public');


    $legalSystem->image = $imagePath;


}





    // Update main table

    $legalSystem->update([

        'status' => $request->status,

        'image' => $legalSystem->image,

    ]);







    // Update Translation

    $translation = $legalSystem->translations()->first();



    if($translation){


        $translation->update([

            'title' => $request->title,

            'summary' => $request->summary,

            'content' => $request->content,

        ]);


    }








    // Audit Log

    AuditHelper::log(

        Auth::user(),

        'legal_systems_cms',

        'update',

        'Legal System',

        $legalSystem->id,

        $request->title,

        'Updated legal system',

        null,

        $oldData,

        $legalSystem->fresh()->toArray()

    );







    return redirect()

        ->route('admin.legal-systems.index')

        ->with(
            'success',
            'Legal System updated successfully'
        );

}









public function destroy($id)
    {

        $legalSystem = LegalSystemCms::findOrFail($id);



        // Old data for audit
        $oldData = $legalSystem->toArray();





        // Delete Image

        if($legalSystem->image && Storage::disk('public')->exists($legalSystem->image)){


            Storage::disk('public')->delete($legalSystem->image);


        }






        // Delete translations

        $legalSystem->translations()->delete();






        // Delete main record

        $legalSystem->delete();







        // Audit Log

        AuditHelper::log(

            Auth::user(),

            'legal_systems_cms',

            'delete',

            'Legal System',

            $id,

            $legalSystem->type,

            'Deleted legal system',

            null,

            $oldData,

            null

        );







        return redirect()

            ->route('admin.legal-systems.index')

            ->with(
                'success',
                'Deleted successfully'
            );

    }

}
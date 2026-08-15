<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArchiveCms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\ArchiveMember;
class ArchiveCmsController extends Controller
{


   // ==========================================
// INDEX
// ==========================================

public function index(Request $request)
{


$query = ArchiveCms::with([
    'translations',
    'archiveMember'
]);



    // ==========================================
    // SEARCH BY NAME
    // ==========================================

    if($request->search){


        $query->whereHas('translations', function($q) use ($request){


            $q->where('name','like','%'.$request->search.'%');


        });


    }




    // ==========================================
    // FILTER BY YEAR
    // ==========================================

    if($request->year){


        $query->where(
            'archive_year',
            $request->year
        );


    }




    // ==========================================
    // FILTER BY STATUS
    // ==========================================

    if($request->status){


        $query->where(
            'status',
            $request->status
        );


    }





    $archives = $query
        ->orderBy('archive_year','desc')
        ->orderBy('sort_order')
        ->paginate(20)
        ->withQueryString();





    $years = ArchiveCms::select('archive_year')
        ->distinct()
        ->orderBy('archive_year','desc')
        ->pluck('archive_year');




    return view(
        'admin.archives.index',
        compact(
            'archives',
            'years'
        )
    );


}





    // ==========================================
    // CREATE
    // ==========================================

   public function create()
{

    $members = ArchiveMember::orderBy('name')
        ->orderBy('surname')
        ->get();

    return view(
        'admin.archives.create',
        compact('members')
    );

}





    // ==========================================
    // STORE
    // ==========================================

    public function store(Request $request)
    {
            $request->validate([

                'image'=>'nullable|image',

                'pdf_file'=>'nullable|mimes:pdf',

                'archive_year'=>'required|digits:4',

                'status'=>'required',

                'archive_member_id'=>'nullable|exists:archive_members,id',

            ]);



        $data = $request->only([

            'profile_url',

            'archive_year',

            'status',

            'sort_order',
             'archive_member_id',

        ]);



        if($request->hasFile('image')){

            $data['image'] =
                $request->file('image')
                ->store('archives/images','public');

        }



        if($request->hasFile('pdf_file')){

            $data['pdf_file'] =
                $request->file('pdf_file')
                ->store('archives/pdf','public');

        }



        $data['created_by'] = Auth::id();



        ArchiveCms::create($data);



        return redirect()
            ->route('admin.archives.index')
            ->with(
                'success',
                'Archive created successfully'
            );

    }





    // ==========================================
    // EDIT
    // ==========================================


public function edit($id)
{
    $archive = ArchiveCms::findOrFail($id);

    $members = ArchiveMember::orderBy('name')
        ->orderBy('surname')
        ->get();

    return view(
        'admin.archives.edit',
        compact(
            'archive',
            'members'
        )
    );
}





    // ==========================================
    // UPDATE
    // ==========================================

    public function update(Request $request,$id)
    {

        $archive = ArchiveCms::findOrFail($id);


                    $data = $request->only([
                        'profile_url',
                        'archive_year',
                        'status',
                        'sort_order',
                        'archive_member_id',
                    ]);

                    // اگر هیچ عضوی انتخاب نشده باشد، مقدار NULL ذخیره می‌شود
                    $data['archive_member_id'] = $request->input('archive_member_id') ?: null;





        if($request->hasFile('image')){


            if($archive->image){

                Storage::disk('public')
                ->delete($archive->image);

            }


            $data['image'] =
            $request->file('image')
            ->store('archives/images','public');

        }




        if($request->hasFile('pdf_file')){


            if($archive->pdf_file){

                Storage::disk('public')
                ->delete($archive->pdf_file);

            }


            $data['pdf_file'] =
            $request->file('pdf_file')
            ->store('archives/pdf','public');

        }



        $archive->update($data);



        
        return redirect()
        ->route('admin.archives.index')
        ->with(
            'success',
            'Archive updated successfully'
        );

    }





    // ==========================================
    // DELETE
    // ==========================================

    public function destroy($id)
    {

        $archive = ArchiveCms::findOrFail($id);



        if($archive->image){

            Storage::disk('public')
            ->delete($archive->image);

        }



        if($archive->pdf_file){

            Storage::disk('public')
            ->delete($archive->pdf_file);

        }



        $archive->delete();



        return back()->with(
            'success',
            'Archive deleted successfully'
        );

    }


}
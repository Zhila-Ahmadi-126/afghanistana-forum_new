<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\MediaCms;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;



class MediaCmsController extends Controller
{





    // ==========================================
    // INDEX
    // ==========================================


    public function index(Request $request)
    {


        $query = MediaCms::with('translations');




        // ==========================================
        // FILTER BY TYPE
        // ==========================================


        if($request->type){


            $query->where(

                'type',

                $request->type

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






        // ==========================================
        // SEARCH
        // ==========================================


        if($request->search){


            $query->whereHas(

                'translations',

                function($q) use ($request){


                    $q->where(

                        'title',

                        'like',

                        '%'.$request->search.'%'

                    );


                }

            );


        }







        $media = $query

            ->orderByDesc('created_at')

            ->paginate(20)

            ->withQueryString();







        return view(

            'admin.media.index',

            compact(

                'media'

            )

        );



    }








    // ==========================================
    // CREATE
    // ==========================================


    public function create()
    {


        return view(

            'admin.media.create'

        );


    }








    // ==========================================
    // STORE
    // ==========================================


    public function store(Request $request)
    {



        $request->validate([


            'type'=>'required',


            'media_type'=>'required',


            'thumbnail'=>'nullable|image',


            'pdf_file'=>'nullable|mimes:pdf',



        ]);







        $data = $request->except([
            'thumbnail',
            'pdf_file'
        ]);






        // ==========================================
        // UPLOAD THUMBNAIL
        // ==========================================


        if($request->hasFile('thumbnail')){


            $data['thumbnail'] =

                $request->file('thumbnail')

                ->store(

                    'media/images',

                    'public'

                );


        }







        // ==========================================
        // UPLOAD PDF
        // ==========================================


        if($request->hasFile('pdf_file')){


            $data['pdf_file'] =

                $request->file('pdf_file')

                ->store(

                    'media/pdf',

                    'public'

                );


        }







        $data['created_by'] = Auth::id();







        MediaCms::create($data);







        return redirect()

            ->route('admin.media.index')

            ->with(

                'success',

                'Media created successfully'

            );



    }








    // ==========================================
    // EDIT
    // ==========================================


    public function edit($id)
    {



        $media = MediaCms::findOrFail($id);




        return view(

            'admin.media.edit',

            compact(

                'media'

            )

        );


    }









    // ==========================================
    // UPDATE
    // ==========================================


    public function update(Request $request,$id)
    {


        $media = MediaCms::findOrFail($id);






        $request->validate([


            'type'=>'required',


            'media_type'=>'required',



        ]);








        $data = $request->except([

            'thumbnail',

            'pdf_file'

        ]);







        // ==========================================
        // UPDATE IMAGE
        // ==========================================


        if($request->hasFile('thumbnail')){


            if($media->thumbnail){


                Storage::disk('public')

                    ->delete(

                        $media->thumbnail

                    );


            }





            $data['thumbnail'] =

                $request->file('thumbnail')

                ->store(

                    'media/images',

                    'public'

                );


        }







        // ==========================================
        // UPDATE PDF
        // ==========================================


        if($request->hasFile('pdf_file')){


            if($media->pdf_file){


                Storage::disk('public')

                    ->delete(

                        $media->pdf_file

                    );


            }





            $data['pdf_file'] =

                $request->file('pdf_file')

                ->store(

                    'media/pdf',

                    'public'

                );


        }








        $media->update($data);







        return redirect()

            ->route('admin.media.index')

            ->with(

                'success',

                'Media updated successfully'

            );



    }





// ==========================================
// DELETE MEDIA
// ==========================================

public function destroy($id)
{
    $media = MediaCms::findOrFail($id);



    // Delete translations

    $media->translations()->delete();





    // Delete thumbnail

    if($media->thumbnail && Storage::disk('public')->exists($media->thumbnail))
    {
        Storage::disk('public')->delete($media->thumbnail);
    }






    // Delete PDF

    if($media->pdf_file && Storage::disk('public')->exists($media->pdf_file))
    {
        Storage::disk('public')->delete($media->pdf_file);
    }






    // Delete database record

    $media->delete();





    return back()->with(

        'success',

        'Media deleted successfully'

    );
}

}
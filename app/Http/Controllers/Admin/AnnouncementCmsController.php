<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnnouncementCms;
use App\Models\AnnouncementTranslation;
use App\Models\Language;
use App\Helpers\AuditHelper;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnouncementCmsController extends Controller
{
 public function index(Request $request)
{

    $languageId = $request->language_id ?? 1;

    $announcements = AnnouncementCms::with([

        'translations' => function ($q) use ($languageId) {

            $q->where('language_id', $languageId);

        },

        'creator'

    ])
    ->latest()
    ->paginate(10);


    $languages = Language::orderBy('name')->get();


    return view(
        'admin.announcements.index',
        compact(
            'announcements',
            'languages',
            'languageId'
        )
    );

}



public function ajax()
{

    $announcements = AnnouncementCms::latest()->get();

    return response()->json($announcements);

}



public function create()
{

    $languages = Language::orderBy('name')->get();

    return view(
        'admin.announcements.create',
        compact('languages')
    );

}
public function store(Request $request)
{

    $request->validate([

        'language_id' => 'required|exists:languages,id',

        'title' => 'required|string|max:255',

        'short_description' => 'nullable|string',

        'description' => 'nullable|string',

        'meta_title' => 'nullable|string|max:255',

        'meta_description' => 'nullable|string',

        'image' => 'nullable|image|max:2048',

        'pdf_file' => 'nullable|mimes:pdf|max:10240',

        'source_url' => 'nullable|url',

        'publish_date' => 'nullable|date',

        'expiry_date' => 'nullable|date',

        'status' => 'required|in:draft,published,archived',

        'is_featured' => 'nullable|boolean',

        'sort_order' => 'nullable|integer',

    ]);



    $image = null;

    if($request->hasFile('image')){

        $image = $request->file('image')
            ->store('announcements','public');

    }



    $pdf = null;

    if($request->hasFile('pdf_file')){

        $pdf = $request->file('pdf_file')
            ->store('announcements/pdf','public');

    }



    $announcement = AnnouncementCms::create([

        'image' => $image,

        'pdf_file' => $pdf,

        'source_url' => $request->source_url,

        'publish_date' => $request->publish_date,

        'expiry_date' => $request->expiry_date,

        'status' => $request->status,

        'is_featured' => $request->boolean('is_featured'),

        'sort_order' => $request->sort_order ?? 0,

        'created_by' => Auth::id(),

    ]);



    AnnouncementTranslation::create([

        'announcement_id' => $announcement->id,

        'language_id' => $request->language_id,

        'title' => $request->title,

        'short_description' => $request->short_description,

        'description' => $request->description,

        'meta_title' => $request->meta_title,

        'meta_description' => $request->meta_description,

        'created_by' => Auth::id(),

    ]);



    AuditHelper::log(

        Auth::user(),

        'announcements_cms',

        'insert',

        'Announcement',

        $announcement->id,

        $request->title,

        'Created new announcement'

    );



    return redirect()
        ->route('admin.announcements.index')
        ->with(
            'success',
            'Announcement created successfully'
        );

}
// ==========================================
// EDIT ANNOUNCEMENT
// ==========================================

public function edit($id)
{

    $announcement = AnnouncementCms::with([
        'translations'
    ])->findOrFail($id);



    // Get default translation (English)
    $translation = $announcement->translations
        ->where('language_id', 1)
        ->first();



    // If English translation does not exist
    // use first available translation

    if(!$translation){

        $translation = $announcement->translations->first();

    }



    $languages = Language::orderBy('name')->get();



    return view(
        'admin.announcements.edit',
        compact(
            'announcement',
            'translation',
            'languages'
        )
    );

}


// ==========================================
// UPDATE ANNOUNCEMENT
// ==========================================
public function update(Request $request, $id)
{

    $request->validate([

        'title' => 'required|string|max:255',

        'image' => 'nullable|image|max:2048',

        'pdf_file' => 'nullable|mimes:pdf|max:10240',

        'status' => 'required|in:draft,published,archived',

    ]);


    $announcement = AnnouncementCms::findOrFail($id);


    // -------------------------
    // OLD DATA FOR AUDIT
    // -------------------------

    $oldData = $announcement->toArray();



    // -------------------------
    // UPDATE IMAGE
    // -------------------------

    if($request->hasFile('image')){

        if($announcement->image &&
            Storage::disk('public')->exists($announcement->image)){

            Storage::disk('public')->delete($announcement->image);

        }

        $announcement->image = $request->file('image')
            ->store('announcements','public');

    }



    // -------------------------
    // UPDATE PDF
    // -------------------------

    if($request->hasFile('pdf_file')){

        if($announcement->pdf_file &&
            Storage::disk('public')->exists($announcement->pdf_file)){

            Storage::disk('public')->delete($announcement->pdf_file);

        }

        $announcement->pdf_file = $request->file('pdf_file')
            ->store('announcements/pdf','public');

    }



    // -------------------------
    // UPDATE MAIN TABLE
    // -------------------------

    $announcement->update([

        'image' => $announcement->image,

        'pdf_file' => $announcement->pdf_file,

        'source_url' => $request->source_url,

        'publish_date' => $request->publish_date,

        'expiry_date' => $request->expiry_date,

        'status' => $request->status,

        'is_featured' => $request->boolean('is_featured'),

        'sort_order' => $request->sort_order,

    ]);



    // -------------------------
    // UPDATE DEFAULT TRANSLATION
    // -------------------------

    $translation = $announcement->translations()->first();

    if($translation){

        $translation->update([

            'title' => $request->title,

            'short_description' => $request->short_description,

            'description' => $request->description,

            'meta_title' => $request->meta_title,

            'meta_description' => $request->meta_description,

        ]);

    }



    // -------------------------
    // AUDIT LOG
    // -------------------------

    AuditHelper::log(

        Auth::user(),

        'announcements_cms',

        'update',

        'Announcement',

        $announcement->id,

        $request->title,

        'Updated announcement',

        null,

        $oldData,

        $announcement->fresh()->toArray()

    );



    return redirect()
        ->route('admin.announcements.index')
        ->with('success','Announcement updated successfully');

}



// ==========================================
// DELETE ANNOUNCEMENT
// ==========================================

public function destroy($id)
{

    $announcement = AnnouncementCms::findOrFail($id);



    // ==========================
    // SAVE TITLE FOR AUDIT BEFORE DELETE
    // ==========================

    $title = optional(
        $announcement->translations->first()
    )->title ?? 'Announcement';





    // ==========================
    // DELETE IMAGE FROM STORAGE
    // ==========================

    if(
        $announcement->image &&
        Storage::disk('public')->exists($announcement->image)
    ){

        Storage::disk('public')->delete(
            $announcement->image
        );

    }





    // ==========================
    // DELETE PDF FROM STORAGE
    // ==========================

    if(
        $announcement->pdf_file &&
        Storage::disk('public')->exists($announcement->pdf_file)
    ){

        Storage::disk('public')->delete(
            $announcement->pdf_file
        );

    }





    // ==========================
    // DELETE TRANSLATIONS
    // ==========================

    $announcement->translations()->delete();





    // ==========================
    // DELETE MAIN RECORD
    // ==========================

    $announcement->delete();





    // ==========================
    // AUDIT LOG
    // ==========================

    AuditHelper::log(

        Auth::user(),

        'announcements_cms',

        'delete',

        'Announcement',

        $id,

        $title,

        'Deleted announcement'

    );





    return redirect()

        ->route('admin.announcements.index')

        ->with(
            'success',
            'Announcement deleted successfully'
        );

}
}

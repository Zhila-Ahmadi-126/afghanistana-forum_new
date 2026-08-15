<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helpers\AuditHelper;
use App\Models\ArchiveMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArchiveMemberController extends Controller
{
    // ==========================================
    // INDEX
    // ==========================================

    public function index(Request $request)
    {
        $query = ArchiveMember::query();

        // ==========================================
        // SEARCH
        // ==========================================

        if ($request->search) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('surname', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');

            });

        }

        // ==========================================
        // FILTER BY SECTION
        // ==========================================

        if ($request->section) {

            $query->where(
                'section',
                $request->section
            );

        }

        // ==========================================
        // FILTER BY COUNTRY
        // ==========================================

        if ($request->country) {

            $query->where(
                'country',
                $request->country
            );

        }

        // ==========================================
        // GET MEMBERS
        // ==========================================

        $members = $query
            ->orderBy('id', 'desc')
            ->paginate(20)
            ->withQueryString();

        // ==========================================
        // SECTIONS
        // ==========================================

        $sections = ArchiveMember::query()
            ->select('section')
            ->whereNotNull('section')
            ->distinct()
            ->orderBy('section')
            ->pluck('section');

        // ==========================================
        // COUNTRIES
        // ==========================================

        $countries = ArchiveMember::query()
            ->select('country')
            ->whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view(
            'admin.archive_members.index',
            compact(
                'members',
                'sections',
                'countries'
            )
        );
    }


    // ==========================================
    // CREATE
    // ==========================================

    public function create()
    {
        return view(
            'admin.archive_members.create'
        );
    }


    // ==========================================
    // STORE
    // ==========================================

    public function store(Request $request)
    {
      $request->validate([

            'name' => 'required',
            'surname' => 'nullable',
            'section' => 'required',
            'position' => 'nullable',
            'country' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'photo' => 'nullable|image',
            'short_description' => 'nullable',
            'description' => 'nullable',

        ]);


        $data = $request->only([

            'name',
            'surname',
            'section',
            'position',
            'country',
            'phone',
            'email',
            'short_description',
            'description',

        ]);


        // ==========================================
        // PHOTO
        // ==========================================

    if ($request->hasFile('photo')) {

    $photo = $request->file('photo');

    $filename = 'about_' . time() . '_' . Str::random(5)
        . '.' . $photo->getClientOriginalExtension();

    $photo->move(
        public_path('assets/img/about'),
        $filename
    );

    $data['photo'] = '/assets/img/about/' . $filename;
}


        // ==========================================
        // CREATE
        // ==========================================

        $member = ArchiveMember::create($data);


        // ==========================================
        // AUDIT LOG
        // ==========================================

        AuditHelper::log(

            Auth::user(),

            'archive_members',

            'insert',

            'Archive Members',

            $member->id,

            $member->name,

            'Archive member created successfully',

            null,

            null,

            $member->toArray()

        );


        return redirect()
            ->route('admin.archive_members.index')
            ->with(
                'success',
                'Archive member created successfully'
            );
    }


    // ==========================================
    // EDIT
    // ==========================================

    public function edit($id)
    {
        $member = ArchiveMember::findOrFail($id);

        return view(
            'admin.archive_members.edit',
            compact('member')
        );
    }


    // ==========================================
    // UPDATE
    // ==========================================

    public function update(
        Request $request,
        $id
    ) {

        $member = ArchiveMember::findOrFail($id);


        $request->validate([

            'name' => 'required|string|max:150',

            'surname' => 'nullable|string|max:150',

            'section' => 'required',

            'position' => 'nullable|string|max:150',

            'country' => 'nullable|string|max:150',

            'photo' => 'nullable|image',

            'phone' => 'nullable|string|max:50',

            'email' => 'nullable|email|max:150',

            'short_description' => 'nullable|string',

            'description' => 'nullable|string',

        ]);


        $oldData = $member->toArray();


        $data = $request->only([

            'name',
            'surname',
            'section',
            'position',
            'country',
            'phone',
            'email',
            'short_description',
            'description',

        ]);


        // ==========================================
        // PHOTO
        // ==========================================

       if ($request->hasFile('photo')) {

    $photo = $request->file('photo');

    // Delete old photo
    if ($member->photo) {

        $oldPhoto = public_path($member->photo);

        if (file_exists($oldPhoto)) {
            unlink($oldPhoto);
        }
    }

    // New filename
    $filename = 'about_' . time() . '_' . Str::random(5)
        . '.' . $photo->getClientOriginalExtension();

    // Save new photo
    $photo->move(
        public_path('assets/img/about'),
        $filename
    );

    // Save path in database
    $data['photo'] = '/assets/img/about/' . $filename;
}


        // ==========================================
        // UPDATE
        // ==========================================

        $member->update($data);


        $member->refresh();


        // ==========================================
        // CHANGED FIELDS
        // ==========================================

        $changedFields = [];

        foreach ($member->toArray() as $key => $value) {

            if (
                array_key_exists($key, $oldData) &&
                $oldData[$key] != $value
            ) {

                $changedFields[] = $key;

            }

        }


        // ==========================================
        // AUDIT LOG
        // ==========================================

        AuditHelper::log(

            Auth::user(),

            'archive_members',

            'update',

            'Archive Members',

            $member->id,

            $member->name,

            'Archive member updated successfully',

            $changedFields,

            $oldData,

            $member->toArray()

        );


        return redirect()
            ->route('admin.archive_members.index')
            ->with(
                'success',
                'Archive member updated successfully'
            );
    }


    // ==========================================
    // DELETE
    // ==========================================

    public function destroy($id)
    {
        $member = ArchiveMember::findOrFail($id);


        $oldData = $member->toArray();


        // ==========================================
        // DELETE PHOTO
        // ==========================================

       if ($member->photo) {

                $photoPath = public_path(
                    ltrim($member->photo, '/')
                );

                if (file_exists($photoPath)) {

                    unlink($photoPath);

                }
            }

        // ==========================================
        // DELETE MEMBER
        // ==========================================

        $member->delete();


        // ==========================================
        // AUDIT LOG
        // ==========================================

        AuditHelper::log(

            Auth::user(),

            'archive_members',

            'delete',

            'Archive Members',

            $member->id,

            $member->name,

            'Archive member deleted successfully',

            null,

            $oldData,

            null

        );


        return back()
            ->with(
                'success',
                'Archive member deleted successfully'
            );
    }
}
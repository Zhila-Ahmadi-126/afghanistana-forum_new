<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Language;
use App\Models\AcademyAssignmentCms;
use App\Models\AcademyAssignmentTranslationCms;

class AcademyAssignmentTranslationController extends Controller
{

    public function index($id, Request $request)
    {

        $assignment = AcademyAssignmentCms::findOrFail($id);

        $languages = Language::orderBy('id')->get();

        $language_id = $request->language_id ?? 1;

        $translation = AcademyAssignmentTranslationCms::where([
            'assignment_id' => $assignment->id,
            'language_id'   => $language_id,
        ])->first();

        return view(
            'admin.academy_assignments.translation',
            compact(
                'assignment',
                'languages',
                'language_id',
                'translation'
            )
        );

    }



    public function store(Request $request, $id)
    {

        $request->validate([

            'language_id' => 'required|exists:languages,id',

            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'meta_title' => 'nullable|string|max:255',

            'meta_description' => 'nullable|string|max:255',

        ]);


        AcademyAssignmentTranslationCms::updateOrCreate(

            [

                'assignment_id' => $id,

                'language_id'   => $request->language_id,

            ],

            [

                'title' => $request->title,

                'description' => $request->description,

                'meta_title' => $request->meta_title,

                'meta_description' => $request->meta_description,

                'created_by' => Auth::id(),

            ]

        );


        return redirect()->route(
            'admin.academy_assignments.translation',
            [
                'id' => $id,
                'language_id' => $request->language_id
            ]
        )->with('success','Translation saved successfully.');

    }



    public function destroy($id)
    {

        $translation = AcademyAssignmentTranslationCms::findOrFail($id);

        $assignmentId = $translation->assignment_id;

        $languageId = $translation->language_id;

        $translation->delete();

        return redirect()->route(
            'admin.academy_assignments.translation',
            [
                'id' => $assignmentId,
                'language_id' => $languageId
            ]
        )->with('success','Translation deleted successfully.');

    }

}
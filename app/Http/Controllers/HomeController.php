<?php

namespace App\Http\Controllers;

use App\Models\LegalSystemCms;
use App\Models\Language;
use App\Models\ArchiveMember;



use App\Models\ArchiveCms;
use App\Models\News;
use App\Models\AnnouncementCms;
use App\Models\LegalFileCms;
use App\Models\MediaCms;
use App\Models\AcademyResourceCms;

use App\Models\Comment;

class HomeController extends Controller
{
   public function index()
{
    $language = Language::where('code', app()->getLocale())->first();

    // ==========================================
    // LEGAL SYSTEMS
    // ==========================================

    $legalSystems = LegalSystemCms::where('status', 'active')
        ->with([
            'translations' => function ($query) use ($language) {
                if ($language) {
                    $query->where('language_id', $language->id);
                }
            }
        ])
        ->orderBy('id', 'asc')
        ->get();


    // ==========================================
    // ARCHIVE MEMBERS
    // ==========================================

    $members = ArchiveMember::query()
        ->orderBy('id', 'asc')
        ->get();


    // ==========================================
    // WEBSITE STATISTICS / COUNTERS
    // ==========================================

    $membersCount = ArchiveMember::count();

    $archiveFilesCount = ArchiveCms::count();

    $newsCount = News::count();

    $announcementsCount = AnnouncementCms::count();

    $legalFilesCount = LegalFileCms::count();

    $mediaCount = MediaCms::count();

    $academyResourcesCount = AcademyResourceCms::count();

        $comments = Comment::where('status', 'approved')
            ->latest()
            ->get();

    return view(
        'website.index',
        compact(
            'legalSystems',
            'members',
            'membersCount',
            'archiveFilesCount',
            'newsCount',
            'announcementsCount',
            'legalFilesCount',
            'mediaCount',
            
            'academyResourcesCount',
             'comments'
        )
    );
}

    public function legalSystemShow($id)
    {
        $legalSystem = LegalSystemCms::with([
            'translations.language',
            'documents.translations.language'
        ])
        ->where('id', $id)
        ->where('status', 'active')
        ->firstOrFail();

        return view(
            'website.legal-system.show',
            compact('legalSystem')
        );
    }
    public function about()
{
    $members = ArchiveMember::query()
        ->whereIn('section', [
            'Leadership Council of the Association',
            'Supervisory Commission',
            "Director of the Association's Branches",
            'Editorial Board',
            'Other Members and Experienced Legal Professionals',
        ])
        ->orderBy('id', 'asc')
        ->get();

    return view('website.about', compact('members'));
}

}

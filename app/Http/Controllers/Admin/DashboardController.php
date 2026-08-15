<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Language;
use App\Models\News;
use App\Models\MediaCms;
use App\Models\LegalSystemCms;
use App\Models\LegalCategoryCms;
use App\Models\LegalFileCms;
use App\Models\ActivityReport;
use App\Models\ArchiveCms;
use App\Models\AnnouncementCms;

use App\Models\AcademyDepartmentCms;
use App\Models\AcademyTeacherCms;
use App\Models\AcademyStudentCms;
use App\Models\AcademyClassCms;
use App\Models\AcademyScheduleCms;
use App\Models\AcademyAssignmentCms;
use App\Models\AcademyResourceCms;
use App\Models\AcademyGradeCms;
use App\Models\AcademyCertificateCms;
use App\Models\AuditLog;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();

        $languagesCount = Language::count();

        $newsCount = News::count();

        $mediaCount = MediaCms::count();
        $totalLegalSystems = LegalSystemCms::count();

        $totalLegalCategories = LegalCategoryCms::count();

        $totalLegalBranches = LegalCategoryCms::whereNotNull('parent_id')->count();

        $totalLegalFiles = LegalFileCms::count();
        $activityReportsCount = ActivityReport::count();

        $archivesCount = ArchiveCms::count();

        $announcementsCount = AnnouncementCms::count();
        $academyDepartmentsCount = AcademyDepartmentCms::count();

        $academyTeachersCount = AcademyTeacherCms::count();

        $academyStudentsCount = AcademyStudentCms::count();

        $academyClassesCount = AcademyClassCms::count();

        $academySchedulesCount = AcademyScheduleCms::count();

        $academyAssignmentsCount = AcademyAssignmentCms::count();

        $academyResourcesCount = AcademyResourceCms::count();

        $academyGradesCount = AcademyGradeCms::count();

        $academyCertificatesCount = AcademyCertificateCms::count();
        $totalActivitiesCount = AuditLog::count();

        $loginActivitiesCount = AuditLog::where('action_type', 'login')->count();

        $insertActivitiesCount = AuditLog::where('action_type', 'insert')->count();

        $updateActivitiesCount = AuditLog::where('action_type', 'update')->count();

        $deleteActivitiesCount = AuditLog::where('action_type', 'delete')->count();


        return view('admin.Dashboard.index', compact(
            'usersCount',
            'languagesCount',
            'newsCount',
            'mediaCount',
            'totalLegalSystems',
            'totalLegalCategories',
            'totalLegalBranches',
            'totalLegalFiles',
            'activityReportsCount',
            'archivesCount',
            'academyDepartmentsCount',
            'academyTeachersCount',
            'academyStudentsCount',
            'academyClassesCount',
            'academySchedulesCount',
            'academyAssignmentsCount',
            'academyResourcesCount',
            'academyGradesCount',
            'academyCertificatesCount',
            'totalActivitiesCount',
            'loginActivitiesCount',
            'insertActivitiesCount',
            'updateActivitiesCount',
            'deleteActivitiesCount',
            'announcementsCount'
        ));
    }
}
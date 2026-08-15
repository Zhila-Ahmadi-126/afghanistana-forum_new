@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Top Statistics -->
    <div class="row g-3 mb-4">

        <!-- Users -->
        <div class="col-md-3">
            <div class="card border shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                {{ __('dashboard.total_users') }}
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $usersCount }}
                            </h3>
                        </div>


                        <div>
                            <i class="bi bi-people-fill fs-1 text-primary"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <!-- Languages -->
        <div class="col-md-3">
            <div class="card border shadow-sm h-100">
                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                {{ __('dashboard.total_languages') }}
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $languagesCount }}
                            </h3>
                        </div>


                        <div>
                            <i class="bi bi-translate fs-1 text-success"></i>
                        </div>

                    </div>

                </div>
            </div>
        </div>




        <!-- News -->
        <div class="col-md-3">
            <div class="card border shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                {{ __('dashboard.total_news') }}
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $newsCount }}
                            </h3>

                        </div>


                        <div>
                            <i class="bi bi-newspaper fs-1 text-warning"></i>
                        </div>


                    </div>

                </div>

            </div>
        </div>




        <!-- Media -->
        <div class="col-md-3">

            <div class="card border shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">


                        <div>

                            <p class="text-muted mb-1">
                                {{ __('dashboard.total_media') }}
                            </p>


                            <h3 class="fw-bold mb-0">
                                {{ $mediaCount }}
                            </h3>

                        </div>



                        <div>
                            <i class="bi bi-camera-video-fill fs-1 text-danger"></i>
                        </div>



                    </div>

                </div>

            </div>

        </div>


    </div>





    <!-- Legal System -->

    <div class="row g-3 mb-4">

        <div class="col-12">

            <div class="card border shadow-sm">


                <div class="card-header bg-transparent">

                    <h5 class="mb-0">
                        ⚖️ {{ __('dashboard.legal_system') }}
                    </h5>

                </div>




                <div class="card-body">


                    <div class="row g-3">


                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <small class="text-muted">
                                    {{ __('dashboard.total_legal_systems') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $totalLegalSystems }}
                                </h4>


                            </div>

                        </div>




                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.total_legal_categories') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $totalLegalCategories }}
                                </h4>


                            </div>

                        </div>




                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.total_legal_branches') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $totalLegalBranches }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.total_legal_files') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $totalLegalFiles }}
                                </h4>


                            </div>

                        </div>



                    </div>


                </div>


            </div>

        </div>

    </div>
        <!-- Content Overview -->

    <div class="row g-3">


        <div class="col-md-3">

            <div class="card border shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">
                        {{ __('dashboard.activity_reports') }}
                    </h6>

                    <h3 class="fw-bold">
                        {{ $activityReportsCount }}
                    </h3>

                </div>

            </div>

        </div>



        <div class="col-md-3">

            <div class="card border shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">
                        {{ __('dashboard.total_archives') }}
                    </h6>

                    <h3 class="fw-bold">
                        {{ $archivesCount }}
                    </h3>

                </div>

            </div>

        </div>




        <div class="col-md-3">

            <div class="card border shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">
                        {{ __('dashboard.total_announcements') }}
                    </h6>

                    <h3 class="fw-bold">
                        {{ $announcementsCount }}
                    </h3>

                </div>

            </div>

        </div>




        <div class="col-md-3">

            <div class="card border shadow-sm">

                <div class="card-body">

                    <h6 class="text-muted">
                        {{ __('dashboard.academy_sections') }}
                    </h6>

                    <h3 class="fw-bold">
                        10
                    </h3>

                </div>

            </div>

        </div>


    </div>





    <!-- Academy Overview -->

    <div class="row g-3 mt-4">

        <div class="col-12">

            <div class="card border shadow-sm">


                <div class="card-header bg-transparent">

                    <h5 class="mb-0">
                        🎓 {{ __('dashboard.academy') }}
                    </h5>

                </div>



                <div class="card-body">


                    <div class="row g-3">



                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_departments') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $academyDepartmentsCount }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_teachers') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $academyTeachersCount }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_students') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $academyStudentsCount }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_classes') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $academyClassesCount }}
                                </h4>


                            </div>

                        </div>



                    </div>





                    <hr>





                    <div class="row g-3">



                        <div class="col-md-3">

                            <div class="border rounded p-3">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_schedules') }}
                                </small>


                                <h5 class="fw-bold mt-2">
                                    {{ $academySchedulesCount }}
                                </h5>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_assignments') }}
                                </small>


                                <h5 class="fw-bold mt-2">
                                    {{ $academyAssignmentsCount }}
                                </h5>


                            </div>

                        </div>





                        <div class="col-md-6">

                            <div class="border rounded p-3">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_resources') }}
                                </small>


                                <h5 class="fw-bold mt-2">
                                    {{ $academyResourcesCount }}
                                </h5>


                            </div>

                        </div>



                    </div>





                    <hr>





                    <div class="row g-3">



                        <div class="col-md-6">

                            <div class="border rounded p-3">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_grades') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $academyGradesCount }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-6">

                            <div class="border rounded p-3">


                                <small class="text-muted">
                                    {{ __('dashboard.academy_certificates') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $academyCertificatesCount }}
                                </h4>


                            </div>

                        </div>



                    </div>



                </div>


            </div>

        </div>

    </div>





    <!-- Activity Reports -->


    <div class="row g-3 mt-4">


        <div class="col-12">


            <div class="card border shadow-sm">


                <div class="card-header bg-transparent">


                    <h5 class="mb-0">
                        📊 {{ __('dashboard.activity_logs') }}
                    </h5>


                </div>




                <div class="card-body">


                    <div class="row g-3">



                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.total_activities') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $totalActivitiesCount }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.insert_activities') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $insertActivitiesCount }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.update_activities') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $updateActivitiesCount }}
                                </h4>


                            </div>

                        </div>





                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">


                                <small class="text-muted">
                                    {{ __('dashboard.delete_activities') }}
                                </small>


                                <h4 class="fw-bold mt-2">
                                    {{ $deleteActivitiesCount }}
                                </h4>


                            </div>

                        </div>



                    </div>


                </div>


            </div>


        </div>


    </div>



</div>


@endsection
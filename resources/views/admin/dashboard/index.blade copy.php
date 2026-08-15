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
                            <p class="text-muted mb-1">تعداد کاربران</p>
                            <h3 class="fw-bold mb-0">
                                {{ $usersCount }}
                            </h3>
                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-people fs-3 text-primary"></i>
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
                            <p class="text-muted mb-1">تعداد زبان‌ها</p>
                            <h3 class="fw-bold mb-0">
                                {{ $languagesCount }}
                            </h3>
                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-translate fs-3 text-success"></i>
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
                            <p class="text-muted mb-1">تعداد اخبار</p>
                                 <h3 class="fw-bold mb-0">
                                {{ $newsCount }}
                            </h3>
                        </div>

                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-newspaper fs-3 text-warning"></i>
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
                            <p class="text-muted mb-1">تعداد رسانه‌ها</p>
                            <h3 class="fw-bold mb-0">
                                {{ $mediaCount }}
                            </h3>
                        </div>


                        <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-camera-video fs-3 text-danger"></i>
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
                        ⚖️ نظام حقوقی
                    </h5>
                </div>


                <div class="card-body">

                    <div class="row g-3">


                        <div class="col-md-3">
                            <div class="border rounded p-3 text-center">
                                <small class="text-muted">
                                    تعداد نظام حقوقی
                                </small>
                                <h4 class="fw-bold mt-2">
                                    {{ $totalLegalSystems }}
                                </h4>
                            </div>
                        </div>



                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <small class="text-muted">
                                    تعداد دسته‌بندی‌ها
                                </small>

                                <h4 class="fw-bold mt-2">
                                   {{ $totalLegalCategories }}
                                </h4>

                            </div>

                        </div>



                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <small class="text-muted">
                                    تعداد شاخه‌ها
                                </small>

                                <h4 class="fw-bold mt-2">
                                   {{ $totalLegalBranches }}
                                </h4>

                            </div>

                        </div>



                        <div class="col-md-3">

                            <div class="border rounded p-3 text-center">

                                <small class="text-muted">
                                    تعداد فایل‌های حقوقی
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
                        گزارش‌های ۲۴ ساعته
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
                        تعداد آرشیو
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
                        تعداد اعلانات
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
                        بخش‌های آکادمی
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
                    🎓 آکادمی
                </h5>
            </div>


            <div class="card-body">

                <div class="row g-3">


                    <!-- Sections -->
                    <div class="col-md-3">
                        <div class="border rounded p-3 text-center">
                            <small class="text-muted">
                                تعداد دیپارتمنت های  آکادمی
                            </small>

                            <h4 class="fw-bold mt-2">
                                {{ $academyDepartmentsCount }}
                            </h4>
                        </div>
                    </div>



                    <!-- Teachers -->
                    <div class="col-md-3">
                        <div class="border rounded p-3 text-center">

                            <small class="text-muted">
                                تعداد استادان
                            </small>

                            <h4 class="fw-bold mt-2">
                                {{ $academyTeachersCount }}
                            </h4>

                        </div>
                    </div>



                    <!-- Students -->
                    <div class="col-md-3">
                        <div class="border rounded p-3 text-center">

                            <small class="text-muted">
                                تعداد شاگردان
                            </small>

                            <h4 class="fw-bold mt-2">
                                {{ $academyStudentsCount }}
                            </h4>

                        </div>
                    </div>



                    <!-- Classes -->
                    <div class="col-md-3">
                        <div class="border rounded p-3 text-center">

                            <small class="text-muted">
                                تعداد صنف‌ها
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
                                تقسیم اوقات های درسی
                            </small>

                            <h5 class="fw-bold mt-2">
                               {{ $academySchedulesCount }}
                            </h5>

                        </div>
                    </div>



                    <div class="col-md-3">
                        <div class="border rounded p-3">

                            <small class="text-muted">
                                گارخانگی ها
                            </small>

                            <h5 class="fw-bold mt-2">
                               {{ $academyAssignmentsCount }}
                            </h5>

                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="border rounded p-3">

                            <small class="text-muted">
                                منابع آموزشی
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
                                تعداد نمرات ثبت شده
                            </small>

                            <h4 class="fw-bold mt-2">
                                {{ $academyGradesCount }}
                            </h4>

                        </div>

                    </div>



                    <div class="col-md-6">

                        <div class="border rounded p-3">

                            <small class="text-muted">
                                تعداد سرتیفیکت‌ها
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
                    📊 گزارش فعالیت‌ها
                </h5>

            </div>



            <div class="card-body">


                <div class="row g-3">


                    <div class="col-md-3">

                        <div class="border rounded p-3 text-center">

                            <small class="text-muted">
                                کل فعالیت‌ها
                            </small>

                            <h4 class="fw-bold mt-2">
                                {{ $totalActivitiesCount }}
                            </h4>

                        </div>

                    </div>




                    <div class="col-md-3">

                        <div class="border rounded p-3 text-center">

                            <small class="text-muted">
                                ثبت اطلاعات
                            </small>

                            <h4 class="fw-bold mt-2">
                                {{ $insertActivitiesCount }}
                            </h4>

                        </div>

                    </div>





                    <div class="col-md-3">

                        <div class="border rounded p-3 text-center">

                            <small class="text-muted">
                                  ویرایش
                            </small>

                            <h4 class="fw-bold mt-2">
                                {{ $updateActivitiesCount }}
                            </h4>

                        </div>

                    </div>
                     <div class="col-md-3">

                        <div class="border rounded p-3 text-center">

                            <small class="text-muted">
                                حذف  
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
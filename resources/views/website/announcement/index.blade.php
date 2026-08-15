@extends('layouts.website')

@section('content')

<style>

    body {
        background:
            radial-gradient(
                circle at top left,
                rgba(108, 63, 160, 0.08),
                transparent 35%
            ),
            #f8f7fb;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .announcement-page {
        padding: 70px 0;
    }


    .announcement-kicker {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        color: #633b87;
        font-size: .78rem;
        font-weight: 700;

        letter-spacing: .12em;
        text-transform: uppercase;
    }


    .announcement-heading {
        color: #2b173b;
        font-weight: 800;
    }


    .announcement-header-line {
        width: 70px;
        height: 3px;

        margin: 18px auto;

        border-radius: 50px;

        background:
            linear-gradient(
                90deg,
                #633b87,
                #9b6bc3
            );
    }


    /* =========================================================
       FILTER
    ========================================================= */

    .announcement-filter {
        margin-bottom: 45px;

        padding: 18px;

        border-radius: 22px;

        background: rgba(255, 255, 255, .65);

        border: 1px solid rgba(99, 59, 135, .13);

        box-shadow:
            0 15px 40px rgba(55, 30, 80, .08);

        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
    }


    .announcement-filter .form-control,
    .announcement-filter .form-select {
        border-radius: 13px;

        border: 1px solid rgba(99, 59, 135, .16);

        min-height: 45px;

        box-shadow: none;
    }


    .announcement-filter .form-control:focus,
    .announcement-filter .form-select:focus {
        border-color: #79509b;

        box-shadow:
            0 0 0 3px rgba(121, 80, 155, .10);
    }


    .announcement-filter-btn {
        min-height: 45px;

        border: 0;

        border-radius: 13px;

        background: #633b87;

        color: white;

        font-weight: 600;

        transition: .3s ease;
    }


    .announcement-filter-btn:hover {
        background: #4e2b6d;

        transform: translateY(-2px);
    }


    .announcement-reset {
        min-height: 45px;

        border-radius: 13px;

        border: 1px solid rgba(99, 59, 135, .2);

        color: #633b87;

        background: rgba(255,255,255,.5);
    }


    /* =========================================================
       CARD
    ========================================================= */

    .announcement-card {
        position: relative;

        height: 100%;

        overflow: hidden;

        border-radius: 22px;

        border: 1px solid rgba(255,255,255,.85);

        background:
            linear-gradient(
                145deg,
                rgba(255,255,255,.88),
                rgba(245,240,250,.66)
            );

        box-shadow:
            0 12px 35px rgba(53, 28, 75, .09);

        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);

        transition:
            transform .4s cubic-bezier(.2,.8,.2,1),
            box-shadow .4s ease,
            border-color .4s ease;
    }


    .announcement-card::before {
        content: "";

        position: absolute;

        inset: 7px;

        border-radius: 17px;

        border: 1px solid rgba(99,59,135,.06);

        pointer-events: none;

        z-index: 5;
    }


    .announcement-card:hover {
        transform:
            translateY(-8px)
            rotate(-1deg)
            scale(1.015);

        box-shadow:
            0 25px 55px rgba(63, 33, 90, .17);

        border-color:
            rgba(99,59,135,.25);
    }


    /* =========================================================
       IMAGE
    ========================================================= */

    .announcement-image {
        position: relative;

        overflow: hidden;

        height: 175px;

        margin: 8px;

        border-radius: 17px;
    }


    .announcement-image img {
        width: 100%;
        height: 100%;

        object-fit: cover;

        display: block;

        transition:
            transform .6s ease,
            filter .5s ease;
    }


    .announcement-card:hover .announcement-image img {
        transform: scale(1.08);

        filter: saturate(1.08);
    }


    .announcement-image-overlay {
        position: absolute;

        inset: 0;

        background:
            linear-gradient(
                to top,
                rgba(30, 13, 45, .42),
                transparent 60%
            );

        pointer-events: none;
    }


    .announcement-pdf-badge {
        position: absolute;

        top: 12px;
        right: 12px;

        z-index: 3;

        padding: 6px 10px;

        border-radius: 50px;

        background: rgba(255,255,255,.9);

        color: #b42323;

        font-size: .72rem;

        font-weight: 700;

        box-shadow:
            0 5px 15px rgba(0,0,0,.12);
    }


    /* =========================================================
       CARD BODY
    ========================================================= */

    .announcement-card-body {
        padding: 13px 15px 17px;
    }


    .announcement-meta {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 8px;

        margin-bottom: 8px;

        color: #76548e;

        font-size: .72rem;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .04em;
    }


    .announcement-title {
        margin: 0;

        color: #301744;

        font-size: 1rem;

        line-height: 1.45;

        font-weight: 750;
    }


    .announcement-description {
        margin-top: 8px;
        margin-bottom: 0;

        color: #6d6475;

        font-size: .82rem;

        line-height: 1.65;
    }


    .announcement-action {
        display: inline-flex;

        align-items: center;

        gap: 6px;

        margin-top: 13px;

        color: #633b87;

        font-size: .78rem;

        font-weight: 700;

        text-decoration: none;

        transition: .3s ease;
    }


    .announcement-action:hover {
        color: #43265c;

        gap: 10px;
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .announcement-empty {
        padding: 70px 20px;

        border-radius: 25px;

        background: rgba(255,255,255,.7);

        border: 1px solid rgba(99,59,135,.1);

        text-align: center;
    }


    .announcement-empty i {
        font-size: 3.5rem;

        color: #8a64a7;
    }


    /* =========================================================
       PAGINATION
    ========================================================= */

    .announcement-pagination {
        margin-top: 45px;
    }


    .announcement-pagination .pagination {
        gap: 5px;
    }


    .announcement-pagination .page-link {
        border-radius: 10px !important;

        border: 1px solid rgba(99,59,135,.12);

        color: #633b87;

        background: rgba(255,255,255,.8);
    }


    .announcement-pagination .page-item.active .page-link {
        background: #633b87;

        border-color: #633b87;

        color: #fff;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1199.98px) {

        .announcement-image {
            height: 160px;
        }

    }


    @media (max-width: 991.98px) {

        .announcement-page {
            padding: 50px 0;
        }

        .announcement-image {
            height: 190px;
        }

    }


    @media (max-width: 575.98px) {

        .announcement-filter {
            padding: 13px;
        }

        .announcement-image {
            height: 210px;
        }

        .announcement-card-body {
            padding: 14px 16px 18px;
        }

        .announcement-title {
            font-size: 1.05rem;
        }

    }
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
                url("/assets/img/Announcements/Announcements_1.jpg") center center no-repeat;
    background-size: 100% 100%;
}

</style>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 py-5" style="height:300px">
    <div class="container ml-5"   >
        <div style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;   ">
            <h1 class="display-3 text-white mb-3 animated slideInDown"> Official Announcements</h1>
                    <nav aria-label="breadcrumb animated slideInDown p-5">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">Content</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page"> Announcements</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->

<section class="announcement-page">

    <div class="container">


        {{-- =====================================================
             INTRO
        ====================================================== --}}

        <div class="text-center mb-5">

            <span class="announcement-kicker">

                <i class="fas fa-bullhorn"></i>

                Announcements

            </span>


            <h1 class="announcement-heading display-5 mt-2">

                Official Announcements

            </h1>


            <div class="announcement-header-line"></div>


            <p class="text-muted mx-auto mb-0"
               style="max-width: 700px;">

                Explore official announcements, statements,
                messages and publications of the Association.

            </p>

        </div>



        {{-- =====================================================
             FILTER
        ====================================================== --}}

        <form
            method="GET"
            action="{{ route('announcements') }}"
            class="announcement-filter"
        >

            <div class="row g-2 align-items-center">


                {{-- SEARCH --}}

                <div class="col-12 col-lg-5">

                    <div class="input-group">

                        <span class="input-group-text bg-white border-end-0">

                            <i class="fas fa-search text-muted"></i>

                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            class="form-control border-start-0"
                            placeholder="Search announcements..."
                        >

                    </div>

                </div>


                {{-- YEAR --}}

                <div class="col-12 col-sm-6 col-lg-3">

                    <select
                        name="year"
                        class="form-select"
                    >

                        <option value="">
                            All Years
                        </option>

                        @foreach($years as $year)

                            <option
                                value="{{ $year }}"
                                @selected((string) $selectedYear === (string) $year)
                            >

                                {{ $year }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- SEARCH BUTTON --}}

                <div class="col-6 col-sm-3 col-lg-2">

                    <button
                        type="submit"
                        class="btn announcement-filter-btn w-100"
                    >

                        <i class="fas fa-search me-1"></i>

                        Search

                    </button>

                </div>


                {{-- RESET --}}

                <div class="col-6 col-sm-3 col-lg-2">

                    <a
                        href="{{ route('announcements') }}"
                        class="btn announcement-reset w-100"
                    >

                        <i class="fas fa-rotate-left me-1"></i>

                        Reset

                    </a>

                </div>

            </div>

        </form>



        {{-- =====================================================
             RESULTS
        ====================================================== --}}

        @if($announcements->count())


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 g-lg-4">


                @foreach($announcements as $announcement)

                    @php

                        $translation =
                            $announcement->translations->first();

                        $imageUrl = $announcement->image
                            ? asset(
                                'storage/' .
                                ltrim(
                                    $announcement->image,
                                    '/'
                                )
                            )
                            : asset(
                                'assets/img/about/default.jpg'
                            );


                        $hasPdf = !empty(
                            $announcement->pdf_file
                        );


                        $targetUrl = $hasPdf
                            ? asset(
                                'storage/' .
                                ltrim(
                                    $announcement->pdf_file,
                                    '/'
                                )
                            )
                            : route(
                                'website.announcement.show',
                                $announcement->id
                            );

                    @endphp


                    <div class="col">

                        <article class="announcement-card">


                            {{-- IMAGE --}}

                            <a
                                href="{{ $targetUrl }}"
                                @if($hasPdf)
                                    target="_blank"
                                    rel="noopener noreferrer"
                                @endif
                                class="text-decoration-none"
                            >

                                <div class="announcement-image">

                                    <img
                                        src="{{ $imageUrl }}"
                                        alt="{{ $translation?->title ?? 'Announcement' }}"
                                        loading="lazy"
                                    >


                                    <div class="announcement-image-overlay"></div>


                                    @if($hasPdf)

                                        <span class="announcement-pdf-badge">

                                            <i class="fas fa-file-pdf me-1"></i>

                                            PDF

                                        </span>

                                    @endif

                                </div>

                            </a>


                            {{-- BODY --}}

                            <div class="announcement-card-body">


                                <div class="announcement-meta">

                                    <span>

                                        <i class="fas fa-bullhorn me-1"></i>

                                        Announcement

                                    </span>


                                    @if($announcement->publish_date)

                                        <span>

                                            <i class="far fa-calendar-alt me-1"></i>

                                            {{ \Carbon\Carbon::parse(
                                                $announcement->publish_date
                                            )->format('Y') }}

                                        </span>

                                    @endif

                                </div>


                                <h3 class="announcement-title">

                                    {{ $translation?->title ?? 'Announcement' }}

                                </h3>


                                @if($translation?->short_description)

                                    <p class="announcement-description">

                                        {{ \Illuminate\Support\Str::limit(
                                            strip_tags(
                                                $translation->short_description
                                            ),
                                            100
                                        ) }}

                                    </p>

                                @endif


                                <a
                                    href="{{ $targetUrl }}"
                                    @if($hasPdf)
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    @endif
                                    class="announcement-action"
                                >

                                    @if($hasPdf)

                                        <i class="fas fa-file-pdf"></i>

                                        View PDF

                                    @else

                                        <i class="fas fa-arrow-right"></i>

                                        Read Announcement

                                    @endif

                                </a>


                            </div>

                        </article>

                    </div>

                @endforeach

            </div>


        @else


            {{-- EMPTY --}}

            <div class="announcement-empty">

                <i class="fas fa-bullhorn mb-3"></i>

                <h3 class="mt-2">

                    No announcements found.

                </h3>

                <p class="text-muted mb-0">

                    Try another search or select a different year.

                </p>

            </div>

        @endif



        {{-- =====================================================
             PAGINATION
        ====================================================== --}}

        @if($announcements->hasPages())

            <div class="announcement-pagination">

                <div class="d-flex justify-content-center">

                    {{ $announcements->onEachSide(1)->links() }}

                </div>

            </div>

        @endif


    </div>

</section>


@endsection
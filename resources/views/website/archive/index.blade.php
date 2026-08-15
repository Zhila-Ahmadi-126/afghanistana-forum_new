@extends('layouts.website')
  
@section('content')

<style>
    
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("assets/img/archive/archive_2.jpg") center center no-repeat;
       background-size: 100% 100% ;
}
.archive-index-section {
    overflow: hidden;
}


/* =========================================================
   ROW
========================================================= */

.archive-index-row {
    position: relative;
    min-height: 350px;
}


/* =========================================================
   MEMBER VISUAL
========================================================= */

.archive-index-member-visual {
    position: relative;
    width: 100%;
    max-width: 380px;
    margin: auto;
    padding: 25px;
}


.archive-index-image-glass {
    position: relative;
    z-index: 3;
    padding: 10px;
    border-radius: 28px;

    background: rgba(255, 255, 255, 0.55);

    border: 1px solid rgba(255, 255, 255, 0.9);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 20px 55px rgba(0, 0, 0, 0.10);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease;
}


.archive-index-image-frame {
    position: relative;
    overflow: hidden;

    border-radius: 22px;

    aspect-ratio: 4 / 4.5;
}


.archive-index-member-image {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition:
        transform 0.6s ease,
        filter 0.6s ease;
}


.archive-index-member-visual:hover
.archive-index-image-glass {

    transform: translateY(-8px);

    box-shadow:
        0 30px 70px rgba(0, 0, 0, 0.16);
}


.archive-index-member-visual:hover
.archive-index-member-image {

    transform: scale(1.045);
}


/* =========================================================
   DECORATIVE CIRCLES
========================================================= */

.archive-index-circle {
    position: absolute;

    border-radius: 50%;

    z-index: 1;

    transition:
        transform 0.5s ease,
        opacity 0.5s ease;
}


.circle-one {
    width: 95px;
    height: 95px;

    top: 0;
    left: 0;

    background: rgba(13, 110, 253, 0.12);

    border: 1px solid rgba(13, 110, 253, 0.25);
}


.circle-two {
    width: 75px;
    height: 75px;

    bottom: 10px;
    right: 0;

    background: rgba(0, 180, 216, 0.12);

    border: 1px solid rgba(0, 180, 216, 0.25);
}


.circle-three {
    width: 42px;
    height: 42px;

    top: 45%;
    right: -5px;

    background: rgba(13, 110, 253, 0.08);

    border: 1px solid rgba(13, 110, 253, 0.18);
}


.archive-index-member-visual:hover .circle-one {
    transform: scale(1.25) translate(-8px, -8px);
    opacity: 0.8;
}


.archive-index-member-visual:hover .circle-two {
    transform: scale(1.3) translate(8px, 8px);
    opacity: 0.75;
}


.archive-index-member-visual:hover .circle-three {
    transform: scale(1.4);
    opacity: 0.6;
}


/* =========================================================
   CONTENT
========================================================= */

.archive-index-content {
    padding: 20px 10px;
}


.archive-index-label {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;

    font-size: 0.78rem;
    font-weight: 600;

    color: #0d6efd;

    text-transform: uppercase;
    letter-spacing: 0.08em;
}


.archive-index-member-name {
    font-size: 1rem;
    font-weight: 600;

    color: #6c757d;
}


.archive-index-position {
    color: #6c757d;
    font-size: 0.9rem;
}


.archive-index-title {
    font-size: clamp(1.6rem, 2.5vw, 2.35rem);

    font-weight: 700;

    line-height: 1.25;

    color: #172033;

    transition: color 0.3s ease;
}


.archive-index-title:hover {
    color: #0d6efd;
}


.archive-index-description {
    max-width: 650px;

    color: #6c757d;

    line-height: 1.9;

    font-size: 0.98rem;

    margin-top: 15px;
}


/* =========================================================
   SEPARATOR
========================================================= */

.archive-index-separator {
    height: 1px;

    width: 75%;

    margin: 15px auto 50px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(13, 110, 253, 0.18),
            transparent
        );
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 991.98px) {

    .archive-index-row {
        min-height: auto;
        margin-bottom: 30px !important;
    }

    .archive-index-content {
        text-align: center;
        padding: 10px 5px 25px;
    }

    .archive-index-label {
        justify-content: center;
    }

    .archive-index-description {
        margin-left: auto;
        margin-right: auto;
    }

    .archive-index-member-visual {
        max-width: 300px;
    }

    .archive-index-separator {
        width: 90%;
        margin-bottom: 40px;
    }

}


@media (max-width: 575.98px) {

    .archive-index-section {
        padding-left: 10px;
        padding-right: 10px;
    }

    .archive-index-member-visual {
        max-width: 270px;
        padding: 18px;
    }

    .archive-index-title {
        font-size: 1.45rem;
    }

    .archive-index-description {
        font-size: 0.9rem;
        line-height: 1.8;
    }

    .circle-one {
        width: 65px;
        height: 65px;
    }

    .circle-two {
        width: 55px;
        height: 55px;
    }

    .circle-three {
        width: 32px;
        height: 32px;
    }

}
.mystyle{
     background-color: rgba(255, 255, 255, 0.804);
        /* filter: blur(10px); */
        border-radius: 40px;
}
.media-intro {
        position: relative;
      
        background:
            radial-gradient(
                circle at 10% 10%,
                rgba(79, 70, 229, .10),
                transparent 30%
            ),
            radial-gradient(
                circle at 90% 20%,
                rgba(14, 165, 233, .10),
                transparent 30%
            ),
            #ffffff;
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
<div class="container-fluid page-header  py-5">
    <div class="container ml-5 "  >
        <div class="p-5" style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;  ">
            <h1 class="display-3 text-white mb-3 animated slideInDown"> Archives</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                           
                            <li class="breadcrumb-item text-white active" aria-current="page">archives</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->

{{-- =========================================================
     ARCHIVE INDEX
========================================================= --}}

<section class="archive-index-section media-intro py-5">

    <div class="container">

      {{-- =================================================
     PAGE INTRO
================================================= --}}

<div class="text-center mb-4">

    <span class="about-people-kicker text-primary">
        <i class="fas fa-archive me-2"></i>
        Archive
    </span>

    <h1 class="display-5 fw-bold mt-2">
        Archive & Contributions
    </h1>

    <div class="about-people-header-line mx-auto"></div>

    <p class="text-muted mt-3 mx-auto" style="max-width: 700px;">
        Explore archived members, articles, statements and other
        contributions preserved in the Association archive.
    </p>

</div>


{{-- =================================================
     ARCHIVE FILTER
================================================= --}}

<div class="archive-filter-box mb-5">

    <form
        action="{{ route('archive') }}"
        method="GET"
        class="row g-3 align-items-end"
    >

        {{-- SEARCH --}}

        <div class="col-12 col-lg-6">

            <label
                for="archiveSearch"
                class="archive-filter-label"
            >
                Search Archive
            </label>

            <div class="archive-search-wrapper">

                <i class="fas fa-search"></i>

                <input
                    type="text"
                    name="search"
                    id="archiveSearch"
                    value="{{ $search }}"
                    class="form-control archive-filter-input"
                    placeholder="Search member, article or contribution..."
                >

            </div>

        </div>


        {{-- YEAR --}}

        <div class="col-12 col-sm-7 col-lg-4">

            <label
                for="archiveYear"
                class="archive-filter-label"
            >
                Archive Year
            </label>

            <select
                name="year"
                id="archiveYear"
                class="form-select archive-filter-input"
            >

                <option value="all">
                    All Years
                </option>

                @foreach($years as $archiveYear)

                    <option
                        value="{{ $archiveYear }}"
                        {{ (string)$year === (string)$archiveYear ? 'selected' : '' }}
                    >
                        {{ $archiveYear }}
                    </option>

                @endforeach

            </select>

        </div>


        {{-- BUTTON --}}

        <div class="col-12 col-sm-5 col-lg-2">

            <button
                type="submit"
                class="btn archive-filter-button w-100"
            >

                <i class="fas fa-filter me-2"></i>

                Filter

            </button>

        </div>

    </form>


    {{-- ACTIVE FILTER --}}

    @if($search || ($year && $year !== 'all'))

        <div class="archive-active-filter mt-3">

            <span>

                <i class="fas fa-sliders-h me-2"></i>

                Active filter:

            </span>


            @if($search)

                <strong>
                    "{{ $search }}"
                </strong>

            @endif


            @if($year && $year !== 'all')

                <strong>
                    {{ $year }}
                </strong>

            @endif


            <a
                href="{{ route('archive') }}"
                class="archive-clear-filter"
            >

                <i class="fas fa-times me-1"></i>

                Clear

            </a>

        </div>

    @endif

</div>


{{-- =================================================
     ARCHIVE LIST
================================================== --}}

@forelse($members as $index => $member)

    @php

        /*
        |--------------------------------------------------------------------------
        | First archive contribution of this member
        |--------------------------------------------------------------------------
        */

        $archive = $member->archives->first();

        if (!$archive) {
            continue;
        }


        /*
        |--------------------------------------------------------------------------
        | Translation
        |--------------------------------------------------------------------------
        */

        $translation = $archive->translations->first();


        /*
        |--------------------------------------------------------------------------
        | Alternate layout
        |--------------------------------------------------------------------------
        */

        $isRight = $index % 2 !== 0;


        /*
        |--------------------------------------------------------------------------
        | Member photo
        |--------------------------------------------------------------------------
        */

        $memberPhoto = $member->photo
            ? asset(ltrim($member->photo, '/'))
            : asset('assets/img/about/default.jpg');


        /*
        |--------------------------------------------------------------------------
        | ARCHIVE IMAGE
        |--------------------------------------------------------------------------
        | Database:
        | archive/images/example.jpg
        |
        | Public:
        | /storage/archives/images/example.jpg
        */

        $imagePath = $archive->image
            ? str_replace(
                'archive/',
                'archives/',
                ltrim($archive->image, '/')
            )
            : null;


        /*
        |--------------------------------------------------------------------------
        | ARCHIVE PDF
        |--------------------------------------------------------------------------
        | Database:
        | archive/pdf/example.pdf
        |
        | Public:
        | /storage/archives/pdf/example.pdf
        */

        $pdfPath = $archive->pdf_file
            ? str_replace(
                'archive/',
                'archives/',
                ltrim($archive->pdf_file, '/')
            )
            : null;


        /*
        |--------------------------------------------------------------------------
        | MEMBER SINGLE PAGE
        |--------------------------------------------------------------------------
        */

        $memberUrl = route(
            'website.archive-member.show',
            $member->id
        );


        /*
        |--------------------------------------------------------------------------
        | ARCHIVE SINGLE PAGE
        |--------------------------------------------------------------------------
        */

        $archiveUrl = route(
            'website.archive.show',
            $archive->id
        );


        /*
        |--------------------------------------------------------------------------
        | DOCUMENT URL
        |--------------------------------------------------------------------------
        */

        $documentUrl = $pdfPath
            ? asset('storage/' . $pdfPath)
            : $archiveUrl;

    @endphp


    {{-- =================================================
         ARCHIVE ROW
    ================================================== --}}

    <div class="archive-index-card mb-5">

        <div class="row align-items-center g-4 g-lg-4 archive-index-row">


            {{-- =================================================
                 IMAGE
            ================================================== --}}

            <div class="col-12 col-lg-5
                {{ $isRight ? 'order-lg-2' : 'order-lg-1' }}">

                <a
                    href="{{ $memberUrl }}"
                    class="text-decoration-none d-block"
                >

                    <div class="archive-index-member-visual">

                        <div class="archive-index-circle circle-one"></div>
                        <div class="archive-index-circle circle-two"></div>
                        <div class="archive-index-circle circle-three"></div>

                        <div class="archive-index-image-glass">

                            <div class="archive-index-image-frame">

                                <img
                                    src="{{ $memberPhoto }}"
                                    alt="{{ $member->name }} {{ $member->surname }}"
                                    class="archive-index-member-image"
                                    loading="lazy"
                                >

                            </div>

                        </div>

                    </div>

                </a>

            </div>


            {{-- =================================================
                 ARCHIVE INFORMATION
            ================================================== --}}

            <div class="col-12 col-lg-7
                {{ $isRight ? 'order-lg-1' : 'order-lg-2' }}">

                <div class="archive-index-content  p-5">


                    {{-- Small label --}}

                    <div class="archive-index-label mb-3">

                        <span>

                            @if($pdfPath)

                                <i class="fas fa-file-pdf me-2"></i>
                                PDF Document

                            @else

                                <i class="fas fa-file-alt me-2"></i>
                                Archive Contribution

                            @endif

                        </span>


                        @if($archive->archive_year)

                            <span class="ms-2">

                                <i class="far fa-calendar-alt me-1"></i>

                                {{ $archive->archive_year }}

                            </span>

                        @endif

                    </div>


                    {{-- Member name --}}

                    <a
                        href="{{ $memberUrl }}"
                        class="text-decoration-none"
                    >

                        <h4 class="archive-index-member-name mb-2">

                            {{ $member->name }}

                            @if($member->surname)
                                {{ $member->surname }}
                            @endif

                        </h4>

                    </a>


                    {{-- Position --}}

                    @if($member->position)

                        <p class="archive-index-position mb-3">

                            <i class="fas fa-user-tie me-2"></i>

                            {{ $member->position }}

                        </p>

                    @endif


                    {{-- =================================================
                         CONTRIBUTION TITLE
                    ================================================== --}}

                    <a
                        href="{{ $documentUrl }}"
                        @if($pdfPath)
                            target="_blank"
                            rel="noopener noreferrer"
                        @endif
                        class="text-decoration-none"
                    >

                        <h2 class="archive-index-title">

                            {{ $translation?->name ?? 'Archive Contribution' }}

                        </h2>

                    </a>


                    {{-- Short description --}}

                    @if($translation?->short_description)

                        <p class="archive-index-description">

                            {{ $translation->short_description }}

                        </p>

                    @elseif($translation?->description)

                        <p class="archive-index-description">

                            {{ Str::limit(
                                strip_tags($translation->description),
                                220
                            ) }}

                        </p>

                    @endif


                    {{-- =================================================
                         ACTION
                    ================================================== --}}

                    <div class="mt-4">

                        @if($pdfPath)

                            {{-- PDF --}}

                            <a
                                href="{{ $documentUrl }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="btn btn-primary rounded-pill px-4"
                            >

                                <i class="fas fa-file-pdf me-2"></i>

                                View PDF

                            </a>

                        @else

                            {{-- Image / contribution --}}

                            <a
                                href="{{ $archiveUrl }}"
                                class="btn btn-outline-primary rounded-pill px-4"
                            >

                                <i class="fas fa-arrow-right me-2"></i>

                                View Contribution

                            </a>

                        @endif

                    </div>


                </div>

            </div>

        </div>

    </div>


    {{-- =================================================
         SEPARATOR
    ================================================== --}}

    @if(!$loop->last)

        <div class="archive-index-separator"></div>

    @endif


@empty

    {{-- =================================================
         EMPTY STATE
    ================================================== --}}

    <div class="text-center py-5">

        <div class="mb-3">

            <i
                class="fas fa-archive text-primary"
                style="font-size: 4rem;"
            ></i>

        </div>

        <h3>
            No archive contributions found.
        </h3>

        <p class="text-muted">
            There are currently no published archive contributions.
        </p>

    </div>

@endforelse
{{-- =================================================
     PAGINATION
================================================= --}}

@if($members->hasPages())

    <div class="archive-pagination-wrapper">

        {{ $members->onEachSide(1)->links() }}

    </div>

@endif
</div>

</section>


{{-- =========================================================
     ARCHIVE INDEX STYLE
========================================================= --}}


<!-- Back to Top -->

<a
    href="#"
    class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"
>

    <i class="bi bi-arrow-up"></i>

</a>

<style>

    /* =========================================================
       ARCHIVE ROW CARD
    ========================================================= */

    .archive-index-row {
        position: relative;
        background: #ffffff;
        border: 1px solid rgba(30, 80, 150, 0.12);
        border-radius: 28px;
        padding: 8px;
        margin-bottom: 28px !important;

        box-shadow:
            0 15px 45px rgba(20, 55, 100, 0.10),
            0 4px 12px rgba(20, 55, 100, 0.05);

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease,
            border-color 0.35s ease;

        overflow: hidden;
    }


    /* Subtle outline */

    .archive-index-row::before {
        content: "";
        position: absolute;
        inset: 7px;
        border: 1px solid rgba(40, 100, 180, 0.07);
        border-radius: 22px;
        pointer-events: none;
    }


    /* Hover */

    .archive-index-row:hover {
        transform: translateY(-5px);

        box-shadow:
            0 22px 55px rgba(20, 55, 100, 0.16),
            0 6px 18px rgba(20, 55, 100, 0.08);

        border-color: rgba(40, 100, 180, 0.22);
    }


    /* =========================================================
       KEEP IMAGE + CONTENT CLOSE
    ========================================================= */

    .archive-index-row > [class*="col-lg"] {
        position: relative;
        z-index: 2;
    }


    .archive-index-content {
        max-width: 650px;
        padding: 5px 5px;
    }


    /* =========================================================
       IMAGE
    ========================================================= */

    .archive-index-member-visual {
        position: relative;
        width: 100%;
        max-width: 360px;
        margin: auto;
    }


    .archive-index-image-glass {
        position: relative;
        padding: 10px;

        background: rgba(255, 255, 255, 0.72);

        border: 1px solid rgba(255, 255, 255, 0.9);

        border-radius: 24px;

        box-shadow:
            0 15px 35px rgba(20, 60, 110, 0.13),
            inset 0 0 25px rgba(255, 255, 255, 0.75);

        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        transition: transform 0.35s ease;
    }


    .archive-index-row:hover .archive-index-image-glass {
        transform: scale(1.025);
    }


    .archive-index-image-frame {
        position: relative;
        overflow: hidden;
        border-radius: 18px;
    }


    .archive-index-member-image {
        width: 100%;
        height: 280px;
        object-fit: cover;
        display: block;

        filter: grayscale(18%);

        transition:
            transform 0.5s ease,
            filter 0.5s ease;
    }


    .archive-index-row:hover .archive-index-member-image {
        transform: scale(1.04);
        filter: grayscale(0%);
    }


    /* =========================================================
       TEXT
    ========================================================= */

    .archive-index-label {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 7px;

        color: #3976b9;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }


    .archive-index-member-name {
        color: #173b63;
        font-weight: 700;
        font-size: 1.15rem;

        transition: color 0.3s ease;
    }


    .archive-index-member-name:hover {
        color: #3976b9;
    }


    .archive-index-position {
        color: #718096;
        font-size: 0.9rem;
    }


    .archive-index-title {
        color: #173b63;
        font-size: 1.65rem;
        line-height: 1.35;
        font-weight: 700;

        transition:
            color 0.3s ease,
            transform 0.3s ease;
    }


    .archive-index-title:hover {
        color: #3976b9;
        transform: translateX(4px);
    }


    .archive-index-description {
        color: #68788c;
        line-height: 1.8;
        font-size: 0.93rem;
        margin-bottom: 0;
    }


    /* =========================================================
       SEPARATOR
    ========================================================= */

    .archive-index-separator {
        display: none;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 991.98px) {

        .archive-index-row {
            padding: 20px;
            border-radius: 22px;
        }

        .archive-index-content {
            padding: 8px 4px 4px;
            max-width: 100%;
        }

        .archive-index-member-visual {
            max-width: 330px;
        }

        .archive-index-member-image {
            height: 250px;
        }

        .archive-index-title {
            font-size: 1.4rem;
        }
    }


    @media (max-width: 575.98px) {

        .archive-index-row {
            padding: 15px;
            border-radius: 20px;
            margin-bottom: 20px !important;
        }

        .archive-index-member-visual {
            max-width: 100%;
        }

        .archive-index-member-image {
            height: 230px;
        }

        .archive-index-content {
            padding: 10px 5px 3px;
        }

        .archive-index-title {
            font-size: 1.25rem;
        }

        .archive-index-description {
            font-size: 0.88rem;
            line-height: 1.7;
        }
    }
/* =========================================================
   ARCHIVE FILTER
========================================================= */

.archive-filter-box {
    max-width: 1050px;
    margin: 0 auto 45px;

    padding: 20px 22px;

    background: rgba(255, 255, 255, 0.92);

    border: 1px solid rgba(30, 80, 150, 0.12);

    border-radius: 22px;

    box-shadow:
        0 12px 35px rgba(20, 55, 100, 0.08),
        0 3px 10px rgba(20, 55, 100, 0.04);

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}


.archive-filter-label {
    display: block;

    margin-bottom: 7px;

    color: #173b63;

    font-size: 0.78rem;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 0.05em;
}


.archive-search-wrapper {
    position: relative;
}


.archive-search-wrapper > i {
    position: absolute;

    left: 16px;

    top: 50%;

    transform: translateY(-50%);

    color: #3976b9;

    z-index: 2;
}


.archive-filter-input {
    height: 45px;

    border-radius: 12px;

    border: 1px solid rgba(30, 80, 150, 0.15);

    background: #fff;

    color: #173b63;

    font-size: 0.9rem;

    box-shadow: none;

    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease;
}


.archive-search-wrapper .archive-filter-input {
    padding-left: 43px;
}


.archive-filter-input:focus {
    border-color: rgba(57, 118, 185, 0.55);

    box-shadow:
        0 0 0 3px rgba(57, 118, 185, 0.08);

    outline: none;
}


.archive-filter-button {
    height: 45px;

    border: none;

    border-radius: 12px;

    background: #173b63;

    color: #fff;

    font-size: 0.88rem;

    font-weight: 600;

    transition:
        transform 0.25s ease,
        background 0.25s ease,
        box-shadow 0.25s ease;
}


.archive-filter-button:hover {
    background: #3976b9;

    color: #fff;

    transform: translateY(-2px);

    box-shadow:
        0 8px 20px rgba(23, 59, 99, 0.18);
}


.archive-active-filter {
    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 8px;

    padding-top: 12px;

    border-top: 1px solid rgba(30, 80, 150, 0.08);

    color: #718096;

    font-size: 0.82rem;
}


.archive-active-filter strong {
    color: #173b63;

    background: rgba(57, 118, 185, 0.08);

    border-radius: 20px;

    padding: 5px 11px;

    font-weight: 600;
}


.archive-clear-filter {
    margin-left: auto;

    color: #3976b9;

    text-decoration: none;

    font-weight: 600;
}


.archive-clear-filter:hover {
    color: #173b63;
}


/* =========================================================
   SMALLER ARCHIVE CARD
========================================================= */

.archive-index-row {
    max-width: 1050px;

    margin-left: auto !important;
    margin-right: auto !important;

    padding: 5px;

    border-radius: 22px;

    margin-bottom: 22px !important;
}


.archive-index-member-visual {
    max-width: 300px;

    padding: 12px;
}


.archive-index-image-glass {
    padding: 7px;

    border-radius: 20px;
}


.archive-index-image-frame {
    border-radius: 15px;
}


.archive-index-member-image {
    height: 230px;
}


.archive-index-content {
    max-width: 560px;

    padding: 5px 8px;
}


.archive-index-title {
    font-size: 1.45rem;
}


.archive-index-description {
    font-size: 0.9rem;

    line-height: 1.7;

    max-width: 560px;
}


/* =========================================================
   PAGINATION
========================================================= */

.archive-pagination-wrapper {
    display: flex;

    justify-content: center;

    margin-top: 40px;

    padding-top: 25px;

    border-top: 1px solid rgba(13, 110, 253, 0.10);
}


.archive-pagination-wrapper .pagination {
    gap: 5px;
}


.archive-pagination-wrapper .page-link {
    border-radius: 10px !important;

    border: 1px solid rgba(30, 80, 150, 0.12);

    color: #173b63;

    min-width: 38px;

    height: 38px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #fff;

    font-size: 0.85rem;

    transition:
        background 0.25s ease,
        color 0.25s ease,
        transform 0.25s ease;
}


.archive-pagination-wrapper .page-link:hover {
    background: #3976b9;

    color: #fff;

    transform: translateY(-2px);
}


.archive-pagination-wrapper .page-item.active .page-link {
    background: #173b63;

    border-color: #173b63;

    color: #fff;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 991.98px) {

    .archive-index-row {
        max-width: 650px;

        padding: 15px;

        border-radius: 20px;
    }


    .archive-index-member-visual {
        max-width: 280px;
    }


    .archive-index-member-image {
        height: 220px;
    }


    .archive-index-content {
        max-width: 100%;

        padding: 5px 10px 10px;

        text-align: center;
    }


    .archive-index-label {
        justify-content: center;
    }


    .archive-index-description {
        margin-left: auto;
        margin-right: auto;
    }


    .archive-filter-box {
        padding: 18px;

        border-radius: 18px;
    }

}


@media (max-width: 575.98px) {

    .archive-index-row {
        padding: 12px;

        margin-bottom: 18px !important;
    }


    .archive-index-member-visual {
        max-width: 245px;
    }


    .archive-index-member-image {
        height: 205px;
    }


    .archive-index-title {
        font-size: 1.2rem;
    }


    .archive-index-description {
        font-size: 0.86rem;
    }


    .archive-filter-box {
        padding: 15px;
    }


    .archive-active-filter {
        align-items: flex-start;
        flex-direction: column;
    }


    .archive-clear-filter {
        margin-left: 0;
    }


    .archive-pagination-wrapper .page-link {
        min-width: 34px;

        height: 34px;

        font-size: 0.78rem;
    }

}
</style>


@endsection

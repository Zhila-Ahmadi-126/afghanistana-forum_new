{{-- =========================================================
     ARCHIVE CONTRIBUTION / DOCUMENT SHOW
     resources/views/website/archive/show.blade.php
========================================================= --}}

@php

    $member = $archive->archiveMember;

    $translation = $archive->translations->first();

    /*
    |--------------------------------------------------------------------------
    | IMAGE
    |--------------------------------------------------------------------------
    */

    $memberImage = $member && $member->photo
        ? asset(ltrim($member->photo, '/'))
        : asset('assets/img/about/default.jpg');


    /*
    |--------------------------------------------------------------------------
    | ARCHIVE COVER IMAGE
    |--------------------------------------------------------------------------
    */

    $archiveImage = $archive->image
        ? asset(ltrim($archive->image, '/'))
        : $memberImage;


    /*
    |--------------------------------------------------------------------------
    | MEMBER NAME
    |--------------------------------------------------------------------------
    */

    $memberName = $member
        ? trim($member->name . ' ' . ($member->surname ?? ''))
        : 'Archive Contributor';


    /*
    |--------------------------------------------------------------------------
    | TRANSLATED CONTENT
    |--------------------------------------------------------------------------
    */

    $title = $translation?->name ?? 'Archive Contribution';

    $shortDescription = $translation?->short_description;

    $description = $translation?->description;

@endphp


<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'fa' || app()->getLocale() === 'ps' ? 'rtl' : 'ltr' }}">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        {{ $title }} | {{ $memberName }}
    </title>


    {{-- Bootstrap --}}

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    {{-- Font Awesome --}}

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >


    {{-- Google Font --}}

    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cormorant+Garamond:wght@500;600;700&display=swap"
        rel="stylesheet"
    >


    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {

            margin: 0;

            min-height: 100vh;

            background:
                radial-gradient(
                    circle at 15% 15%,
                    rgba(20, 73, 73, .10),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 85% 80%,
                    rgba(201, 163, 73, .12),
                    transparent 30%
                ),
                #f7f4ec;

            color: #183b3b;

            font-family:
                "Amiri",
                Georgia,
                serif;

            overflow-x: hidden;

        }


        /* =====================================================
           PAGE
        ===================================================== */

        .archive-document-page {

            min-height: 100vh;

            padding: 45px 20px 70px;

            position: relative;

        }


        /* =====================================================
           DOCUMENT CONTAINER
        ===================================================== */

        .archive-document-paper {

            width: 100%;

            max-width: 1180px;

            margin: auto;

            position: relative;

            overflow: hidden;

            background:

                radial-gradient(
                    circle at center,
                    rgba(255,255,255,.95),
                    rgba(248,245,237,.98)
                );

            border: 1px solid rgba(190, 155, 70, .55);

            border-radius: 30px;

            box-shadow:

                0 35px 90px rgba(20, 55, 55, .14),

                0 8px 25px rgba(20, 55, 55, .08),

                inset 0 0 0 1px rgba(255,255,255,.8);

        }


        /* =====================================================
           DECORATIVE BACKGROUND
        ===================================================== */

        .archive-document-paper::before {

            content: "";

            position: absolute;

            inset: 15px;

            border: 1px solid rgba(194, 158, 70, .22);

            border-radius: 22px;

            pointer-events: none;

        }


        .archive-document-paper::after {

            content: "";

            position: absolute;

            width: 420px;

            height: 420px;

            right: -220px;

            bottom: -220px;

            border-radius: 50%;

            background: rgba(20, 67, 67, .08);

            pointer-events: none;

        }


        /* =====================================================
           TOP DECORATION
        ===================================================== */

        .archive-top-decoration {

            text-align: center;

            padding-top: 35px;

            color: #c9a34a;

            font-size: 28px;

            position: relative;

            z-index: 2;

        }


        .archive-top-decoration::after {

            content: "";

            display: block;

            width: 150px;

            height: 1px;

            background: linear-gradient(
                to right,
                transparent,
                #c9a34a,
                transparent
            );

            margin: 8px auto 0;

        }


        /* =====================================================
           MAIN CONTENT
        ===================================================== */

        .archive-document-content {

            position: relative;

            z-index: 3;

            padding: 35px 55px 55px;

        }


        /* =====================================================
           MEMBER SIDE
        ===================================================== */

        .archive-member-column {

            position: relative;

        }


        .archive-member-card {

            position: relative;

            background:

                linear-gradient(
                    160deg,
                    #15788e,
                    #1d1d48
                );

            border-radius: 25px 25px 65px 65px;

            padding: 14px;

            border: 2px solid #d2ad58;

            box-shadow:

                0 25px 45px rgba(15, 58, 58, .22),

                0 0 0 6px rgba(201, 163, 73, .07);

            transition: .45s ease;

        }


        .archive-member-card:hover {

            transform: translateY(-8px);

            box-shadow:

                0 35px 60px rgba(15, 58, 58, .27),

                0 0 30px rgba(201, 163, 73, .15);

        }


        .archive-member-photo-wrapper {

            position: relative;

            overflow: hidden;

            border-radius: 18px 18px 45px 45px;

            border: 1px solid rgba(225, 194, 115, .8);

            background: #dcd7c9;

        }


        .archive-member-photo {

            width: 100%;

            height: 350px;

            object-fit: cover;

            display: block;

            transition: transform .7s ease;

        }


        .archive-member-card:hover
        .archive-member-photo {

            transform: scale(1.045);

        }


        .archive-member-photo-wrapper::after {

            content: "";

            position: absolute;

            inset: 0;

            background:
                linear-gradient(
                    135deg,
                    rgba(255,255,255,.15),
                    transparent 45%
                );

            pointer-events: none;

        }


        /* =====================================================
           MEMBER NAME
        ===================================================== */

        .archive-member-card-info {

            text-align: center;

            color: white;

            padding: 18px 10px 25px;

        }


        .archive-member-card-name {

            margin: 0;

            color: #e6c56d;

            font-size: 28px;

            font-weight: 700;

        }


        .archive-member-card-position {

            margin-top: 6px;

            color: rgba(255,255,255,.88);

            font-size: 16px;

        }


        .archive-member-card-divider {

            width: 80px;

            height: 1px;

            margin: 15px auto 0;

            background: linear-gradient(
                to right,
                transparent,
                #d8b45d,
                transparent
            );

        }


        /* =====================================================
           ARCHIVE BADGE
        ===================================================== */

        .archive-document-badge {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 8px 17px;

            border-radius: 50px;

            background: rgba(201, 163, 73, .13);

            border: 1px solid rgba(201, 163, 73, .42);

            color: #836624;

            font-size: 14px;

            margin-bottom: 20px;

        }


        /* =====================================================
           TITLE
        ===================================================== */

        .archive-document-title {

            margin: 0;

            color: #153f40;

            font-family:
                "Amiri",
                Georgia,
                serif;

            font-size: clamp(35px, 4vw, 58px);

            line-height: 1.25;

            font-weight: 700;

        }


        .archive-title-decoration {

            margin: 20px 0 28px;

            display: flex;

            align-items: center;

            gap: 12px;

            color: #c6a14b;

        }


        .archive-title-decoration span {

            height: 1px;

            flex: 1;

            background: linear-gradient(
                to right,
                transparent,
                rgba(198,161,75,.65)
            );

        }


        .archive-title-decoration i {

            font-size: 13px;

        }


        /* =====================================================
           META
        ===================================================== */

        .archive-meta-box {

            display: flex;

            flex-wrap: wrap;

            border: 1px solid rgba(190, 163, 104, .25);

            border-radius: 20px;

            background: rgba(255,255,255,.55);

            box-shadow:
                inset 0 1px 0 rgba(255,255,255,.8);

            overflow: hidden;

            margin-bottom: 28px;

        }


        .archive-meta-item {

            flex: 1 1 30%;

            min-width: 130px;

            text-align: center;

            padding: 17px 12px;

            border-left: 1px solid rgba(190, 163, 104, .20);

        }


        .archive-meta-item:last-child {

            border-left: 0;

        }


        .archive-meta-icon {

            display: block;

            color: #c49c42;

            font-size: 20px;

            margin-bottom: 5px;

        }


        .archive-meta-label {

            display: block;

            color: #7c776b;

            font-size: 12px;

        }


        .archive-meta-value {

            display: block;

            color: #173f40;

            font-weight: 700;

            font-size: 15px;

        }


        /* =====================================================
           QUOTE
        ===================================================== */

        .archive-quote {

            position: relative;

            padding: 25px 32px;

            margin: 25px 0 35px;

            border-radius: 20px;

            background: rgba(255,255,255,.58);

            border: 1px solid rgba(190, 163, 104, .24);

            box-shadow:
                0 12px 25px rgba(31, 60, 60, .05);

            color: #264c4c;

            font-size: 20px;

            line-height: 2;

            text-align: center;

        }


        .archive-quote::before {

            content: "“";

            position: absolute;

            top: -12px;

            left: 18px;

            font-family: Georgia, serif;

            font-size: 65px;

            color: #d3b266;

        }


        .archive-quote::after {

            content: "”";

            position: absolute;

            bottom: -35px;

            right: 18px;

            font-family: Georgia, serif;

            font-size: 65px;

            color: #d3b266;

        }


        /* =====================================================
           BISMILLAH
        ===================================================== */

        .archive-bismillah {

            text-align: center;

            margin: 50px 0 35px;

            color: #183f40;

            font-size: 29px;

            font-weight: 700;

        }


        .archive-bismillah-decoration {

            width: 150px;

            height: 1px;

            margin: 12px auto;

            background: linear-gradient(
                to right,
                transparent,
                #c9a34a,
                transparent
            );

        }


        /* =====================================================
           BODY TEXT
        ===================================================== */

        .archive-document-body {

            position: relative;

            padding: 45px 35px;

            border-radius: 25px;

            background: rgba(255,255,255,.48);

            border: 1px solid rgba(194, 169, 110, .22);

            box-shadow:

                0 20px 45px rgba(22, 54, 54, .07),

                inset 0 1px 0 rgba(255,255,255,.85);

        }


        .archive-document-body p {

            margin: 0 0 25px;

            color: #293f40;

            font-size: 19px;

            line-height: 2.25;

            text-align: justify;

        }


        .archive-document-body p:last-child {

            margin-bottom: 0;

        }


        /* =====================================================
           SIGNATURE
        ===================================================== */

        .archive-signature {

            margin-top: 50px;

            padding-top: 25px;

            border-top: 1px solid rgba(194, 161, 76, .4);

            display: flex;

            justify-content: space-between;

            align-items: end;

            gap: 30px;

        }


        .archive-signature-name {

            color: #163e40;

            font-size: 28px;

            font-weight: 700;

        }


        .archive-signature-position {

            color: #777264;

            font-size: 15px;

        }


        .archive-site {

            text-align: left;

            color: #555d5b;

            font-size: 14px;

        }


        .archive-site i {

            color: #c49d45;

            margin-right: 5px;

        }


        /* =====================================================
           BOTTOM DECORATION
        ===================================================== */

        .archive-bottom-decoration {

            position: relative;

            height: 65px;

            margin-top: 45px;

            overflow: hidden;

            background:  #1f3c51;

            border-top: 2px solid #d0aa55;

        }


        .archive-bottom-decoration::before {

            content: "";

            position: absolute;

            width: 480px;

            height: 180px;

            background: #f7f4ec;

            border-radius: 50%;

            left: 50%;

            top: -130px;

            transform: translateX(-50%);

            border-bottom: 2px solid #d0aa55;

        }


        .archive-bottom-decoration i {

            position: absolute;

            left: 50%;

            top: 17px;

            transform: translateX(-50%);

            color: #d3b263;

            font-size: 18px;

            z-index: 2;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 991.98px) {

            .archive-document-content {

                padding: 35px 30px 45px;

            }

            .archive-member-photo {

                height: 330px;

            }

            .archive-document-title {

                margin-top: 20px;

            }

        }


        @media (max-width: 767.98px) {

            .archive-document-page {

                padding: 15px 10px 35px;

            }

            .archive-document-paper {

                border-radius: 20px;

            }

            .archive-document-paper::before {

                inset: 8px;

                border-radius: 14px;

            }

            .archive-document-content {

                padding: 25px 18px 30px;

            }

            .archive-member-photo {

                height: 290px;

            }

            .archive-member-card-name {

                font-size: 24px;

            }

            .archive-document-title {

                font-size: 34px;

                text-align: center;

            }

            .archive-document-badge {

                display: flex;

                width: fit-content;

                margin-left: auto;

                margin-right: auto;

            }

            .archive-title-decoration {

                margin-top: 15px;

            }

            .archive-meta-item {

                flex: 1 1 50%;

                border-bottom: 1px solid rgba(190, 163, 104, .18);

            }

            .archive-meta-item:last-child {

                flex-basis: 100%;

                border-left: 0;

            }

            .archive-quote {

                padding: 22px 25px;

                font-size: 17px;

            }

            .archive-document-body {

                padding: 30px 20px;

            }

            .archive-document-body p {

                font-size: 17px;

                line-height: 2;

                text-align: right;

            }

            .archive-signature {

                flex-direction: column;

                align-items: center;

                text-align: center;

            }

            .archive-site {

                text-align: center;

            }

        }


        @media (max-width: 420px) {

            .archive-document-content {

                padding-left: 13px;

                padding-right: 13px;

            }

            .archive-member-photo {

                height: 260px;

            }

            .archive-document-title {

                font-size: 29px;

            }

            .archive-document-body p {

                font-size: 16px;

            }

        }

    </style>

</head>


<body>


<div class="archive-document-page">


    <main class="archive-document-paper">


        {{-- =================================================
             TOP ORNAMENT
        ================================================== --}}

        <div class="archive-top-decoration">

             <img src="{{ asset('assets/img/logo/logo-web-2.PNG') }}"  style="width: 100px ;height: 100px;" alt="logo">
             <h1>
                Afghanistan Lawyers Association
             </h1>

        </div>
 

        <div class="archive-document-content">


            <div class="row g-5 align-items-start">
                

                {{-- =================================================
                     MEMBER CARD
                ================================================== --}}

                <div class="col-lg-4 archive-member-column">

                    <div class="archive-member-card">


                        <div class="archive-member-photo-wrapper">
                           


                            <img
                                src="{{ $memberImage }}"
                                alt="{{ $memberName }}"
                                class="archive-member-photo"
                            >

                        </div>


                        <div class="archive-member-card-info">

                            <h2 class="archive-member-card-name">

                                {{ $memberName }} <img src="assets/img/archive/archive_2.jpg" alt="">

                            </h2>


                            @if($member?->position)

                                <div class="archive-member-card-position">

                                    {{ $member->position }}

                                </div>

                            @elseif($member?->section)

                                <div class="archive-member-card-position">

                                    {{ $member->section }}

                                </div>

                            @endif


                            <div class="archive-member-card-divider"></div>

                        </div>

                    </div>

                </div>



                {{-- =================================================
                     DOCUMENT INFORMATION
                ================================================== --}}

                <div class="col-lg-8">


                    <div class="archive-document-badge">

                        <i class="fas fa-folder-open"></i>

                        <span>
                            Archive Document
                        </span>

                    </div>


                    <h1 class="archive-document-title">

                        {{ $title }}

                    </h1>


                    <div class="archive-title-decoration">

                        <span></span>

                        <i class="fas fa-diamond"></i>

                        <span></span>

                    </div>


                    {{-- =================================================
                         META
                    ================================================== --}}

                    <div class="archive-meta-box">


                        @if($archive->archive_year)

                            <div class="archive-meta-item">

                                <span class="archive-meta-icon">
                                    <i class="far fa-calendar-alt"></i>
                                </span>

                                <span class="archive-meta-label">
                                    Year
                                </span>

                                <span class="archive-meta-value">
                                    {{ $archive->archive_year }}
                                </span>

                            </div>

                        @endif


                        <div class="archive-meta-item">

                            <span class="archive-meta-icon">
                                <i class="fas fa-user"></i>
                            </span>

                            <span class="archive-meta-label">
                                Contributor
                            </span>

                            <span class="archive-meta-value">
                                {{ $memberName }}
                            </span>

                        </div>


                        <div class="archive-meta-item">

                            <span class="archive-meta-icon">
                                <i class="fas fa-file-alt"></i>
                            </span>

                            <span class="archive-meta-label">
                                Type
                            </span>

                            <span class="archive-meta-value">

                                @if($archive->pdf_file)

                                    PDF Document

                                @else

                                    Contribution

                                @endif

                            </span>

                        </div>


                    </div>


                    {{-- =================================================
                         SHORT DESCRIPTION / QUOTE
                    ================================================== --}}

                    @if($shortDescription)

                        <div class="archive-quote">

                            {{ $shortDescription }}

                        </div>

                    @endif


                </div>

            </div>



            {{-- =================================================
                 BISMILLAH
            ================================================== --}}

            @if($description)

                <div class="archive-bismillah">

                    <div>
                        بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيمِ
                    </div>

                    <div class="archive-bismillah-decoration"></div>

                </div>


                {{-- =================================================
                     DESCRIPTION
                ================================================== --}}

                <div class="archive-document-body">

                    {!! nl2br(e($description)) !!}


                    {{-- =================================================
                         SIGNATURE
                    ================================================== --}}

                    <div class="archive-signature">


                        <div>

                            <div class="archive-signature-name">

                                {{ $memberName }}

                            </div>


                            @if($member?->position)

                                <div class="archive-signature-position">

                                    {{ $member->position }}

                                </div>

                            @endif

                        </div>


                        <div class="archive-site">

                            <div>

                                <i class="fas fa-globe"></i>

                                Official Archive Contribution

                            </div>

                            <div class="mt-1">

                                Afghanistan Lawyers Association

                            </div>

                        </div>


                    </div>

                </div>

            @endif


        </div>



        {{-- =================================================
             BOTTOM DECORATION
        ================================================== --}}

        <div class="archive-bottom-decoration">

            <i class="fas fa-leaf"></i>

        </div>


    </main>

</div>


</body>

</html>
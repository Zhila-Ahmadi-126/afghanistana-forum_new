@extends('layouts.website')

@section('content')
<style>
    
/* =========================================================
   LEGAL SYSTEM SHOW PAGE
========================================================= */

.legal-show-page {
    background: #f8fafc;
    padding-bottom: 100px;
}

   


/* =========================================================
   PAGE HEADER
========================================================= */
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("{{ asset('storage/' . $category->image) }}") center center no-repeat;
    background-size: 100% 600px;
     min-height: 300px;
}

.legal-show-header::after {
    content: "";
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            135deg,
            rgba(16, 42, 67, 0.20),
            transparent 60%
        );

    pointer-events: none;
}


.legal-header-content {
    position: relative;
    z-index: 2;

    max-width: 900px;

    padding: 35px 45px;

    background: rgba(255, 255, 255, 0.08);

    border: 1px solid rgba(255, 255, 255, 0.35);

    border-radius: 18px;

    backdrop-filter: blur(3px);

    box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.20);
}


.legal-header-eyebrow {
    display: inline-block;

    margin-bottom: 12px;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 3px;

    color: #f4c95d;
}


.legal-header-content h1 {
    margin: 0 0 20px;

    color: #fff;

    font-size: clamp(2.3rem, 5vw, 4.2rem);

    font-weight: 700;

    line-height: 1.15;
}


.legal-breadcrumb {
    margin: 0;
    padding: 0;

    display: flex;
    flex-wrap: wrap;
    gap: 8px;

    list-style: none;
}


.legal-breadcrumb li {
    color: rgba(255,255,255,0.85);

    font-size: 14px;
}


.legal-breadcrumb li:not(:last-child)::after {
    content: "/";
    margin-left: 8px;

    color: rgba(255,255,255,0.5);
}


.legal-breadcrumb a {
    color: #fff;
    text-decoration: none;
}


.legal-breadcrumb a:hover {
    color: #f4c95d;
}


/* =========================================================
   MAIN CONTENT
========================================================= */

.legal-show-content {
    padding-top: 90px;
}


/* =========================================================
   INTRO CARD
========================================================= */

.legal-intro-card {
    position: relative;

    max-width: 1100px;

    margin: 0 auto 80px;

    padding: 50px;

    background: #fff;

    border: 1px solid rgba(16, 42, 67, 0.10);

    border-radius: 22px;

    box-shadow:
        0 18px 45px rgba(16, 42, 67, 0.10);

    overflow: hidden;
}


.legal-intro-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 5px;

    background: linear-gradient(
        90deg,
        #102a43,
        #486581,
        #f4c95d
    );
}
/* =========================================================
   LEGAL CATEGORY SHOW PAGE
========================================================= */

.legal-category-show {
    background: #f7f9fc;
    padding: 90px 0 110px;
}


/* =========================================================
   CATEGORY INTRO CONTAINER
========================================================= */

.legal-category-intro {
    max-width: 1050px;
    margin: 0 auto 75px;
    padding: 55px 65px;

    background: rgba(255, 255, 255, 0.96);

    border: 1px solid rgba(18, 52, 86, 0.25);
    border-radius: 28px;

    box-shadow:
        0 18px 45px rgba(7, 35, 70, 0.14),
        0 5px 15px rgba(7, 35, 70, 0.08);

    position: relative;
    overflow: hidden;

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease,
        border-color 0.45s ease;
}


/* Decorative line */

.legal-category-intro::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 4px;

    background: linear-gradient(
        90deg,
        #092f57,
        #55738f,
        #092f57
    );
}


/* Hover */

.legal-category-intro:hover {
    transform: translateY(-6px);

    border-color: rgba(9, 47, 87, 0.45);

    box-shadow:
        0 28px 65px rgba(5, 32, 70, 0.22),
        0 8px 20px rgba(5, 32, 70, 0.10);
}


/* =========================================================
   CATEGORY LABEL
========================================================= */

.legal-category-label {
    display: inline-block;

    margin-bottom: 14px;

    font-size: 12px;
    font-weight: 800;

    letter-spacing: 3px;

    text-transform: uppercase;

    color: #55738f;

    animation: categoryFadeUp 0.7s ease both;
}


/* =========================================================
   CATEGORY TITLE
========================================================= */

.legal-category-intro h1 {
    margin: 0 0 25px;

    font-size: clamp(2rem, 4vw, 3.2rem);

    font-weight: 700;

    color: #092f57;

    line-height: 1.2;

    animation: categoryFadeUp 0.8s ease both;
}


/* =========================================================
   LONG DESCRIPTION
========================================================= */

.legal-category-description {
    max-width: 850px;

    margin: 0;

    font-size: 16px;

    line-height: 1.9;

    color: #536273;

    animation: categoryFadeUp 0.9s ease both;
}


/* =========================================================
   FILES SECTION
========================================================= */

.legal-files-section {
    max-width: 1100px;

    margin: 0 auto;
}


/* Section heading */

.legal-files-heading {
    text-align: center;

    margin-bottom: 45px;
}


.legal-files-heading span {
    display: block;

    margin-bottom: 8px;

    font-size: 12px;

    font-weight: 800;

    letter-spacing: 3px;

    color: #55738f;
}


.legal-files-heading h2 {
    margin: 0;

    color: #092f57;

    font-size: 2rem;

    font-weight: 700;
}


/* =========================================================
   FILES GRID
========================================================= */















/* =========================================================
   LEGAL FILES - LIGHT GLASS CARDS
========================================================= */
/* =========================================================
   LEGAL FILES - LIGHT ANGULAR IMAGE CARDS
========================================================= */

.legal-files-section {
    padding: 30px 0 90px;
}

.legal-files-heading {
    text-align: center;
    margin-bottom: 45px;
}

.legal-files-heading span {
    display: block;
    color: #1769a8;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 3px;
    margin-bottom: 8px;
}

.legal-files-heading h2 {
    margin: 0;
    color: #17324d;
    font-size: 34px;
    font-weight: 700;
}


/* =========================================================
   GRID
========================================================= */

.legal-files-grid {
    max-width: 1050px;
    margin: 0 auto;

    display: grid;
    grid-template-columns: repeat(3, 1fr);

    gap: 25px;

    justify-content: center;
}


/* =========================================================
   CARD
========================================================= */

.legal-file-card {

    position: relative;

    height: 310px;

    overflow: hidden;

    background: #eaf2f8;

    /* ANGULAR CORNERS */
    clip-path: polygon(
        0 22px,
        22px 0,
        calc(100% - 22px) 0,
        100% 22px,
        100% calc(100% - 22px),
        calc(100% - 22px) 100%,
        22px 100%,
        0 calc(100% - 22px)
    );

    box-shadow:
        0 12px 28px rgba(14, 58, 91, 0.20);

    transition:
        transform .45s ease,
        box-shadow .45s ease;

    cursor: pointer;
}


/* =========================================================
   IMAGE
========================================================= */

.legal-file-image {

    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    overflow: hidden;
}


/* Image itself */

.legal-file-image img {

    position: absolute;

    inset: 0;

    width: 100%;
    height: 100%;

    object-fit: cover;

    object-position: center;

    display: block;

    transform: scale(1.01);

    transition:
        transform .7s ease,
        filter .7s ease;
}


/* =========================================================
   DARK TRANSPARENT OVERLAY
========================================================= */

.legal-file-image::after {

    content: "";

    position: absolute;

    inset: 0;

    z-index: 1;

    background:
        linear-gradient(
            to bottom,
            rgba(4, 25, 43, 0.08),
            rgba(4, 25, 43, 0.18) 35%,
            rgba(4, 25, 43, 0.68) 100%
        );

    transition:
        background .55s ease;
}


/* =========================================================
   HOVER
========================================================= */

.legal-file-card:hover {

    transform:
        translateY(-8px)
        rotate(-1deg);

    box-shadow:
        0 25px 55px rgba(7, 55, 94, 0.34);
}


.legal-file-card:hover .legal-file-image img {

    transform: scale(1.08);

    filter:
        brightness(1.18)
        saturate(1.08);
}


/* overlay becomes lighter */

.legal-file-card:hover .legal-file-image::after {

    background:
        linear-gradient(
            to bottom,
            rgba(255,255,255,0.03),
            rgba(255,255,255,0.08) 40%,
            rgba(5, 35, 58, 0.38) 100%
        );
}


/* =========================================================
   ANGULAR BORDER
========================================================= */

.legal-file-card::before {

    content: "";

    position: absolute;

    inset: 0;

    z-index: 5;

    pointer-events: none;

    clip-path: polygon(
        0 22px,
        22px 0,
        calc(100% - 22px) 0,
        100% 22px,
        100% calc(100% - 22px),
        calc(100% - 22px) 100%,
        22px 100%,
        0 calc(100% - 22px)
    );

    border: 7px solid rgba(255,255,255,0.72);

    transition:
        border-color .45s ease,
        box-shadow .45s ease;
}


/* =========================================================
   DECORATIVE CORNER LINES
========================================================= */

.legal-file-card::after {

    content: "";

    position: absolute;

    top: 12px;
    right: 12px;

    width: 42px;
    height: 42px;

    z-index: 6;

    pointer-events: none;

    border-top: 4px double  darkblue;
    border-right: 4px double  darkblue;

    transition:
        width .4s ease,
        height .4s ease;
}


.legal-file-card:hover::after {

    width: 155px;
    height: 155px;
}


/* =========================================================
   FILE ICON
========================================================= */

.legal-file-icon {

    position: absolute;

    top: 25px;
    left: 25px;

    z-index: 8;

    width: 43px;
    height: 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 11px;

    background: rgba(255,255,255,0.12);

    border: 1px solid rgba(255,255,255,0.72);

    color: #ffffff;

    font-size: 18px;

    box-shadow:
        0 5px 18px rgba(0,0,0,0.16);

    backdrop-filter: blur(3px);

    transition:
        transform .4s ease,
        background .4s ease,
        box-shadow .4s ease;
}


.legal-file-card:hover .legal-file-icon {

    transform:
        rotate(-8deg)
        scale(1.12);

    background: rgba(255,255,255,0.24);

    box-shadow:
        0 8px 25px rgba(30,130,190,0.30);
}


/* =========================================================
   TEXT DIRECTLY ON IMAGE
========================================================= */

.legal-file-number {

    position: absolute;

    left: 27px;
    bottom: 123px;

    z-index: 8;

    color: #8bd8ff;

    font-size: 12px;

    font-weight: 800;

    letter-spacing: 2px;
}


.legal-file-title {

    position: absolute;

    left: 25px;
    right: 25px;
    bottom: 88px;

    z-index: 8;

    margin: 0;

    color: #ffffff;

    font-size: 21px;

    font-weight: 700;

    line-height: 1.35;

    text-shadow:
        0 2px 8px rgba(0,0,0,0.45);
}


.legal-file-short-description {

    position: absolute;

    left: 25px;
    right: 25px;
    bottom: 48px;

    z-index: 8;

    margin: 0;

    color: rgba(255,255,255,0.92);

    font-size: 12px;

    line-height: 1.7;

    display: -webkit-box;

    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;

    overflow: hidden;

    text-shadow:
        0 1px 5px rgba(0,0,0,0.5);
}


/* =========================================================
   READ MORE
========================================================= */

.legal-file-read-more {

    position: absolute;

    left: 25px;
    bottom: 16px;

    z-index: 9;

    display: inline-flex;

    align-items: center;

    gap: 8px;

    color: #ffffff !important;

    font-size: 12px;

    font-weight: 700;

    text-decoration: none !important;

    text-shadow:
        0 1px 5px rgba(0,0,0,0.5);

    transition:
        gap .3s ease,
        color .3s ease;
}


.legal-file-read-more i {

    width: 25px;
    height: 25px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(255,255,255,0.20);

    border: 1px solid rgba(255,255,255,0.65);

    font-size: 10px;

    transition:
        transform .35s ease,
        background .35s ease;
}


.legal-file-card:hover .legal-file-read-more {

    gap: 13px;

    color: #ffffff !important;
}


.legal-file-card:hover .legal-file-read-more i {

    transform: translateX(5px);

    background: rgba(255,255,255,0.35);
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 991px) {

    .legal-files-grid {
        grid-template-columns: repeat(2, 1fr);
    }

}


@media (max-width: 575px) {

    .legal-files-grid {
        grid-template-columns: 1fr;

        max-width: 350px;
    }

}
</style>

<section class="page-header">
    <br><br>

    <div class="container">

        <div class="legal-header-content">

            <span class="legal-header-eyebrow">
                LEGAL CATEGORY
            </span>

            <h3 class="text-light">
                {{ $category->translations->first()->title ?? 'Legal Category' }}
            </h3>

            <ol class="legal-breadcrumb">

                <li>
                    <a href="{{ route('index') }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('legal-system') }}">
                        Legal System
                    </a>
                </li>

                <li>
                    {{ $category->translations->first()->title ?? 'Legal Category' }}
                </li>

            </ol>

        </div>

    </div>

    <br>
</section>
   

<section class="legal-category-section mt-5 legal-show-page pb-5">

    <div class="container">

        {{-- =========================================
             CATEGORY INTRO
        ========================================== --}}

        @php
            $categoryTranslation = $category->translations
                ->firstWhere('language.code', app()->getLocale());

            if (!$categoryTranslation) {
                $categoryTranslation = $category->translations
                    ->firstWhere('language.code', 'en');
            }
        @endphp


        @if($categoryTranslation)

            <div class="legal-category-intro">

                <span class="category-eyebrow">
                    LEGAL CATEGORY
                </span>

                <h1>
                    {{ $categoryTranslation->title }}
                </h1>

                <div class="category-line"></div>

                <div class="category-description">
                    {!! nl2br(e($categoryTranslation->description)) !!}
                </div>

            </div>

        @endif

    </div>
   {{-- =========================================
     LEGAL FILES
========================================= --}}

<div class="legal-files-section">

    <div class="legal-files-heading">

        <span>
            LEGAL FILES
        </span>

        <h2>
            Related Legal Files
        </h2>

    </div>


    @if($files->count())

        <div class="legal-files-grid">

            @foreach($files as $file)

                @php

                    $fileTranslation = $file->translations
                        ->firstWhere(
                            'language.code',
                            app()->getLocale()
                        );

                    if (!$fileTranslation) {

                        $fileTranslation = $file->translations
                            ->firstWhere(
                                'language.code',
                                'en'
                            );

                    }

                @endphp


                @if($fileTranslation)

                   <article class="legal-file-card">

    <div class="legal-file-image">

        @if($file->image)

            <img
                src="{{ asset('storage/' . $file->image) }}"
                alt="{{ $fileTranslation->title }}"
            >

        @else

            <div style="
                width:100%;
                height:100%;
                display:flex;
                align-items:center;
                justify-content:center;
                background:#dce9f2;
            ">
                <i
                    class="fa fa-file-text"
                    style="
                        font-size:55px;
                        color:#1769a8;
                    "
                ></i>
            </div>

        @endif


        {{-- FILE ICON --}}

        <div class="legal-file-icon">
            <i class="bi bi-file-earmark-text"></i>
        </div>


        {{-- NUMBER --}}

        <span class="legal-file-number">
            {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
        </span>


        {{-- TITLE --}}

        <h3 class="legal-file-title">
            {{ $fileTranslation->title }}
        </h3>


        {{-- SHORT DESCRIPTION --}}

        <p class="legal-file-short-description">
            {{ $fileTranslation->short_description }}
        </p>


        {{-- READ MORE --}}

        <a
            href="{{ route('legal-file.show', $file->id) }}"
            class="legal-file-read-more" target="_blank"
        >
            <span>Read More</span>
            <i class="fa fa-arrow-right"></i>
        </a>

    </div>

</article>

                @endif

            @endforeach

        </div>


        {{-- Pagination --}}

        @if($files->hasPages())

            <div class="legal-files-pagination">

                {{ $files->links() }}

            </div>

        @endif


    @else

        <div class="legal-files-empty">

            <i class="fa fa-folder-open"></i>

            <p>
                No legal files are currently available.
            </p>

        </div>

    @endif

</div>

</section>



@endsection
@extends('layouts.website')

@section('content')

<style>

  /* =========================================================
   MEDIA CARDS — LIGHT GLASS / RAINBOW GLASS DESIGN
========================================================= */
/* =========================================================
   MEDIA CARDS — LIGHT GLASS / RAINBOW GLASS DESIGN
========================================================= */

  .media-page {
        background: #ffffff;
        overflow: hidden;
    }


    /* =========================================================
       INTRO SECTION
    ========================================================= */

    .media-intro {
        position: relative;
        padding: 100px 0 70px;
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


    .media-intro-content {
        max-width: 650px;
    }


    .media-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 8px 16px;

        border-radius: 50px;

        background: rgba(37, 99, 235, .08);

        border: 1px solid rgba(37, 99, 235, .15);

        color: #1d4ed8;

        font-size: .78rem;

        font-weight: 700;

        letter-spacing: .08em;

        text-transform: uppercase;
    }


    .media-intro-title {
        margin-top: 20px;

        font-size: clamp(
            2.1rem,
            4vw,
            4rem
        );

        line-height: 1.1;

        font-weight: 800;

        color: #0b1b3a;
    }


    .media-intro-title span {
        background:
            linear-gradient(
                90deg,
                #172554,
                #2563eb,
                #7c3aed
            );

        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }


    .media-intro-text {
        margin-top: 22px;

        color: #64748b;

        line-height: 1.9;

        font-size: 1rem;
    }


    /* =========================================================
       MEDIA KEYWORDS
    ========================================================= */

    .media-keywords {
        display: flex;

        flex-wrap: wrap;

        gap: 10px;

        margin-top: 28px;
    }


    .media-keyword {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding: 8px 13px;

        border-radius: 50px;

        background: rgba(255, 255, 255, .72);

        border: 1px solid rgba(99, 102, 241, .15);

        box-shadow:
            0 8px 25px rgba(30, 41, 59, .06);

        color: #334155;

        font-size: .82rem;

        font-weight: 600;

        backdrop-filter: blur(15px);

        transition: .3s ease;
    }


    .media-keyword:hover {
        transform: translateY(-3px);

        border-color: rgba(99, 102, 241, .35);

        box-shadow:
            0 12px 30px rgba(79, 70, 229, .12);
    }


    .media-keyword i {
        color: #4f46e5;
    }


    /* =========================================================
       FEATURED VIDEO
    ========================================================= */

    .featured-media-box {
        position: relative;

        padding: 14px;

        border-radius: 30px;

        background:
            linear-gradient(
                135deg,
                rgba(37, 99, 235, .14),
                rgba(124, 58, 237, .13),
                rgba(14, 165, 233, .10)
            );

        border: 1px solid rgba(99, 102, 241, .18);

        box-shadow:
            0 30px 80px rgba(30, 41, 59, .13);

        backdrop-filter: blur(20px);
    }


    .featured-media-inner {
        position: relative;

        overflow: hidden;

        border-radius: 22px;

        background: #0b1b3a;

        aspect-ratio: 16 / 10;
    }


    .featured-media-inner img {
        width: 100%;

        height: 100%;

        object-fit: cover;

        display: block;

        transition: transform .7s ease;
    }


    .featured-media-box:hover img {
        transform: scale(1.05);
    }


    .featured-overlay {
        position: absolute;

        inset: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        background:
            linear-gradient(
                135deg,
                rgba(15, 23, 42, .18),
                rgba(37, 99, 235, .20)
            );
    }


    /* =========================================================
       PLAY BUTTON
    ========================================================= */

 



    .media-play-wrap::after {
        animation-delay: 1.2s;
    }


    @keyframes mediaWave {

        0% {
            transform: scale(.65);
            opacity: .85;
        }

        100% {
            transform: scale(1.8);
            opacity: 0;
        }

    }


    .media-play-btn {
        position: relative;

        z-index: 3;

        width: 68px;

        height: 68px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 50%;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #7c3aed
            );

        color: white;

        box-shadow:
            0 15px 35px rgba(37, 99, 235, .35);

        font-size: 1.35rem;

        transition: .35s ease;
    }


    .featured-media-inner:hover .media-play-btn {
        transform: scale(1.12);

        box-shadow:
            0 20px 50px rgba(124, 58, 237, .42);
    }
















/* -----------------------------
   CARD
----------------------------- */

.media-card {
    position: relative;
    height: 100%;
    overflow: hidden;

    border: 1px solid rgba(37, 99, 235, 0.16);
    border-radius: 24px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.96),
            rgba(239, 246, 255, 0.78),
            rgba(245, 243, 255, 0.82)
        );

    box-shadow:
        0 12px 35px rgba(15, 23, 42, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.95);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        border-color 0.45s ease;

    isolation: isolate;
}


/* Rainbow glass glow behind card */

.media-card::before {
    content: "";

    position: absolute;
    width: 170px;
    height: 170px;

    top: -80px;
    right: -70px;

    background:
        radial-gradient(
            circle,
            rgba(99, 102, 241, 0.30),
            rgba(139, 92, 246, 0.16),
            transparent 70%
        );

    filter: blur(12px);

    z-index: -1;

    transition:
        transform 0.7s ease,
        opacity 0.5s ease;
}


/* Second glow */

.media-card::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    bottom: -80px;
    left: -70px;

    background:
        radial-gradient(
            circle,
            rgba(37, 99, 235, 0.22),
            rgba(14, 165, 233, 0.12),
            transparent 70%
        );

    filter: blur(15px);

    z-index: -1;

    transition:
        transform 0.7s ease,
        opacity 0.5s ease;
}


/* Hover */

.media-card:hover {

    transform:
        translateY(-10px)
        rotateX(2deg)
        rotateY(-2deg);

    border-color:
        rgba(79, 70, 229, 0.34);

    box-shadow:
        0 25px 55px rgba(30, 41, 59, 0.14),
        0 0 35px rgba(99, 102, 241, 0.12);

}


.media-card:hover::before {
    transform:
        translate(-35px, 40px)
        scale(1.35);

}


.media-card:hover::after {
    transform:
        translate(40px, -35px)
        scale(1.3);

}


/* =========================================================
   IMAGE
========================================================= */

.media-card-image {

    position: relative;

    width: 100%;
    height: 205px;

    overflow: hidden;

    border-radius:
        20px 20px 0 0;

    background:
        linear-gradient(
            135deg,
            #172554,
            #2563eb,
            #6366f1,
            #7c3aed
        );
}


.media-card-image img {

    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition:
        transform 0.7s cubic-bezier(.2,.8,.2,1),
        filter 0.5s ease;

}


.media-card:hover
.media-card-image img {

    transform: scale(1.07);

    filter:
        brightness(0.88)
        saturate(1.08);

}


/* =========================================================
   TYPE BADGE
========================================================= */

.media-type-badge {

    position: absolute;

    top: 14px;
    left: 14px;

    padding: 6px 11px;

    border-radius: 999px;

    color: #ffffff;

    font-size: 0.70rem;
    font-weight: 700;

    letter-spacing: 0.03em;

    background:
        rgba(15, 23, 42, 0.68);

    border:
        1px solid rgba(255, 255, 255, 0.30);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    box-shadow:
        0 5px 15px rgba(15, 23, 42, 0.20);

    z-index: 4;
}


/* =========================================================
   VIDEO PLAY — ALWAYS VISIBLE
========================================================= */

.media-card-overlay {

    position: absolute;

    inset: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    pointer-events: none;

    background:
        radial-gradient(
            circle at center,
            rgba(15, 23, 42, 0.04),
            transparent 50%
        );

}


/* Play wrapper */

.media-card-play {

    position: relative;

    width: 68px;
    height: 68px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #172554,
            #2563eb,
            #6366f1
        );

    border:
        2px solid rgba(255, 255, 255, 0.85);

    box-shadow:
        0 10px 30px rgba(37, 99, 235, 0.40);

    z-index: 5;

    animation:
        mediaPlayFloat 3s ease-in-out infinite;

}


/* Play icon */

.media-card-play i {

    font-size: 2rem;

    margin-left: 4px;

    filter:
        drop-shadow(
            0 3px 5px rgba(0,0,0,.20)
        );

}


/* =========================================================
   INFINITE WAVE / RINGS
========================================================= */

.media-card-play::before,
.media-card-play::after {

    content: "";

    position: absolute;

    inset: -10px;

    border-radius: 50%;

    border:
        2px solid rgba(37, 99, 235, 0.35);

    animation:
        mediaWave 2.5s ease-out infinite;

}


.media-card-play::after {

    animation-delay:
        1.25s;

    border-color:
        rgba(124, 58, 237, 0.28);

}


/* Extra moving glow */

.media-card-play {

    box-shadow:
        0 0 0 7px rgba(37, 99, 235, 0.08),
        0 0 0 14px rgba(99, 102, 241, 0.05),
        0 12px 35px rgba(37, 99, 235, 0.38);

}


/* Play hover */

.media-card:hover
.media-card-play {

    transform:
        scale(1.08);

    box-shadow:
        0 0 0 8px rgba(37, 99, 235, 0.10),
        0 0 0 17px rgba(124, 58, 237, 0.07),
        0 15px 40px rgba(37, 99, 235, 0.45);

}


/* =========================================================
   CARD BODY
========================================================= */

.media-card-body {

    position: relative;

    padding: 20px 19px 21px;

}


/* Title */

.media-card-title {

    margin: 0 0 10px;

    color: #172554;

    font-size: 1.02rem;

    font-weight: 800;

    line-height: 1.45;

    display: -webkit-box;

    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;

    overflow: hidden;

}


/* Description */

.media-card-description {

    min-height: 44px;

    margin: 0 0 17px;

    color: #64748b;

    font-size: 0.84rem;

    line-height: 1.65;

    display: -webkit-box;

    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;

    overflow: hidden;

}


/* Read More */

.media-read-more {

    display: inline-flex;

    align-items: center;
    gap: 7px;

    color: #4338ca;

    font-size: 0.82rem;

    font-weight: 800;

    text-decoration: none;

    transition:
        gap 0.3s ease,
        color 0.3s ease;

}


.media-read-more i {

    transition:
        transform 0.3s ease;

}


.media-read-more:hover {

    color: #1d4ed8;

    gap: 10px;

}


.media-read-more:hover i {

    transform:
        translateX(3px);

}


/* =========================================================
   FILTER GLASS
========================================================= */

.media-filter-box {

    padding: 18px;

    border-radius: 22px;

    border:
        1px solid rgba(37, 99, 235, 0.13);

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.95),
            rgba(239,246,255,.80),
            rgba(245,243,255,.78)
        );

    box-shadow:
        0 12px 35px rgba(15,23,42,.07);

    backdrop-filter:
        blur(18px);

    -webkit-backdrop-filter:
        blur(18px);

}


/* Filter inputs */

.media-filter-box .form-control,
.media-filter-box .form-select {

    min-height: 44px;

    border:
        1px solid rgba(148, 163, 184, 0.28);

    border-radius: 12px;

    color: #172554;

    background:
        rgba(255,255,255,.82);

    box-shadow:
        none;

}


.media-filter-box .form-control:focus,
.media-filter-box .form-select:focus {

    border-color:
        rgba(79,70,229,.45);

    box-shadow:
        0 0 0 4px rgba(99,102,241,.08);

}


/* Filter button */

.media-filter-btn {

    min-height: 44px;

    border: 0;

    border-radius: 12px;

    color: #ffffff;

    font-weight: 700;

    background:
        linear-gradient(
            135deg,
            #172554,
            #2563eb,
            #6366f1
        );

    box-shadow:
        0 8px 20px rgba(37,99,235,.22);

    transition:
        transform .3s ease,
        box-shadow .3s ease;

}


.media-filter-btn:hover {

    color: #ffffff;

    transform:
        translateY(-2px);

    box-shadow:
        0 12px 27px rgba(37,99,235,.30);

}


/* =========================================================
   FEATURED VIDEO
========================================================= */

.featured-media-box {

    position: relative;

    padding: 9px;

    border-radius: 28px;

    background:
        linear-gradient(
            135deg,
            rgba(37,99,235,.65),
            rgba(99,102,241,.48),
            rgba(124,58,237,.40),
            rgba(14,165,233,.38)
        );

    box-shadow:
        0 20px 55px rgba(37,99,235,.16);

}


.featured-media-inner {

    position: relative;

    overflow: hidden;

    border-radius: 21px;

    background: #172554;

}


.featured-media-inner img {

    width: 100%;
    height: 350px;

    object-fit: cover;

    display: block;

    transition:
        transform .7s ease,
        filter .5s ease;

}


.featured-media-box:hover
.featured-media-inner img {

    transform: scale(1.04);

    filter:
        brightness(.88);

}


/* =========================================================
   FEATURED PLAY
========================================================= */

.media-play-wrap {

    position: absolute;

    inset: 0;

    display: flex;

    align-items: center;
    justify-content: center;

}


.media-play-btn {

    position: relative;

    width: 78px;
    height: 78px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: white;

    background:
        linear-gradient(
            135deg,
            #172554,
            #2563eb,
            #7c3aed
        );

    border:
        2px solid rgba(255,255,255,.9);

    box-shadow:
        0 0 0 8px rgba(37,99,235,.10),
        0 0 0 16px rgba(124,58,237,.07),
        0 15px 40px rgba(15,23,42,.30);

    animation:
        mediaPlayFloat 3s ease-in-out infinite;

}


.media-play-btn i {

    font-size: 2.25rem;

    margin-left: 5px;

}


/* Featured waves */

.media-play-btn::before,
.media-play-btn::after {

    content: "";

    position: absolute;

    inset: -12px;

    border-radius: 50%;

    border:
        2px solid rgba(37,99,235,.38);

    animation:
        mediaWave 2.5s ease-out infinite;

}


.media-play-btn::after {

    animation-delay:
        1.25s;

    border-color:
        rgba(124,58,237,.30);

}


/* =========================================================
   ANIMATIONS
========================================================= */

@keyframes mediaWave {

    0% {

        transform: scale(.75);

        opacity: .75;

    }

    70% {

        transform: scale(1.35);

        opacity: .18;

    }

    100% {

        transform: scale(1.65);

        opacity: 0;

    }

}


@keyframes mediaPlayFloat {

    0%,
    100% {

        transform:
            translateY(0);

    }

    50% {

        transform:
            translateY(-5px);

    }

}


/* =========================================================
   PAGINATION
========================================================= */

.media-pagination {

    display: flex;

    justify-content: center;

    margin-top: 45px;

}


.media-pagination .pagination {

    gap: 7px;

}


.media-pagination .page-link {

    border: 0;

    border-radius: 10px;

    color: #334155;

    background:
        rgba(239,246,255,.75);

    box-shadow:
        0 4px 12px rgba(15,23,42,.05);

}


.media-pagination .page-item.active .page-link {

    color: white;

    background:
        linear-gradient(
            135deg,
            #172554,
            #2563eb,
            #6366f1
        );

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 991.98px) {

    .media-card-image {

        height: 220px;

    }

    .featured-media-inner img {

        height: 300px;

    }

}


@media (max-width: 575.98px) {

    .media-card {

        border-radius: 20px;

    }

    .media-card-image {

        height: 210px;

    }

    .media-card-body {

        padding: 17px;

    }

    .media-card-title {

        font-size: .98rem;

    }

    .featured-media-inner img {

        height: 240px;

    }

    .media-play-btn {

        width: 65px;
        height: 65px;

    }

    .media-card-play {

        width: 58px;
        height: 58px;

    }

}
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
                url("/assets/img/Media/Media_1.jpg") center center no-repeat;
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
            <h1 class="display-3 text-white mb-3 animated slideInDown"> Media</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">Content</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Media</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->

<div class="media-page ">


    {{-- =====================================================
         INTRO + FEATURED VIDEO
    ====================================================== --}}

    <section class="media-intro">

        <div class="container">

            <div class="row align-items-center g-5">

                {{-- LEFT SIDE --}}

                <div class="col-lg-6">

                    <div class="media-intro-content">

                        <span class="media-eyebrow">

                            <i class="bi bi-broadcast"></i>

                            {{ __('Media Center') }}

                        </span>


                        <h1 class="media-intro-title">
                        {{ __('Explore Our') }}

                        <span>
                            Media
                        </span>
                    </h1>


                        <p class="media-intro-text">

                            {{ __('Discover seminars, interviews, live programs, videos, publications and other media content related to the National Association of Afghan Lawyers.') }}

                        </p>


                        <div class="media-keywords">

                            <span class="media-keyword">
                                <i class="bi bi-camera-video"></i>
                                {{ __('Videos') }}
                            </span>

                            <span class="media-keyword">
                                <i class="bi bi-broadcast-pin"></i>
                                {{ __('Live Programs') }}
                            </span>

                            <span class="media-keyword">
                                <i class="bi bi-mic"></i>
                                {{ __('Interviews') }}
                            </span>

                            <span class="media-keyword">
                                <i class="bi bi-easel"></i>
                                {{ __('Seminars') }}
                            </span>

                            <span class="media-keyword">
                                <i class="bi bi-file-earmark-pdf"></i>
                                {{ __('Publications') }}
                            </span>

                        </div>

                    </div>

                </div>


                {{-- RIGHT SIDE --}}

                <div class="col-lg-6">

                    @if($featuredMedia)

                        @php
                            $featuredTranslation =
                                $featuredMedia->translations->first();

                            $featuredTitle =
                                $featuredTranslation?->title
                                ?? __('Featured Media');
                        @endphp


                        <a
                            href="{{ $featuredMedia->youtube_url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="text-decoration-none"
                        >

                            <div class="featured-media-box">

                                <div class="featured-media-inner">

                                    <img
                                        src="{{ asset('storage/' . $featuredMedia->thumbnail) }}"
                                        alt="{{ $featuredTitle }}"
                                    >


                                    <div class="featured-overlay">

                                        <div class="media-play-wrap">

                                            <span class="media-play-btn">

                                                <i class="bi bi-play-fill"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </a>

                    @else

                        <div class="featured-media-box">

                            <div
                                class="featured-media-inner
                                d-flex
                                align-items-center
                                justify-content-center"
                            >

                                <div class="text-center text-white">

                                    <i
                                        class="bi bi-play-circle"
                                        style="font-size:4rem;"
                                    ></i>

                                    <div class="mt-2">

                                        {{ __('Featured media will appear here.') }}

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         FILTER
    ====================================================== --}}

    <section class="media-filter-section">

        <div class="container">

            <div class="media-filter-box">

                <form
                    method="GET"
                    action="{{ route('website.media.index') }}"
                >

                    <div class="row g-3 align-items-center">


                        {{-- SEARCH --}}

                        <div class="col-lg-5">

                            <div class="input-group">

                                <span class="input-group-text bg-white border-end-0">

                                    <i class="bi bi-search text-primary"></i>

                                </span>

                                <input
                                    type="text"
                                    name="search"
                                    value="{{ $search }}"
                                    class="form-control border-start-0"
                                    placeholder="{{ __('Search media...') }}"
                                >

                            </div>

                        </div>


                        {{-- TYPE --}}

                        <div class="col-md-4 col-lg-2">

                            <select
                                name="type"
                                class="form-select"
                            >

                                <option value="">
                                    {{ __('All Types') }}
                                </option>


                                @foreach($types as $type)

                                    <option
                                        value="{{ $type }}"
                                        @selected($selectedType === $type)
                                    >

                                        {{ ucwords(str_replace('_', ' ', $type)) }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- YEAR --}}

                        <div class="col-md-4 col-lg-2">

                            <select
                                name="year"
                                class="form-select"
                            >

                                <option value="">
                                    {{ __('All Years') }}
                                </option>


                                @foreach($years as $year)

                                    <option
                                        value="{{ $year }}"
                                        @selected((int) $selectedYear === (int) $year)
                                    >

                                        {{ $year }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- SEARCH BUTTON --}}

                        <div class="col-md-4 col-lg-2">

                            <button
                                type="submit"
                                class="media-filter-btn w-100"
                            >

                                <i class="bi bi-funnel me-1"></i>

                                {{ __('Filter') }}

                            </button>

                        </div>


                        {{-- RESET --}}

                        <div class="col-lg-1 text-center">

                            <a
                                href="{{ route('website.media.index') }}"
                                class="text-secondary text-decoration-none"
                                title="{{ __('Reset') }}"
                            >

                                <i class="bi bi-arrow-counterclockwise fs-5"></i>

                            </a>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>


    {{-- =====================================================
         MEDIA CARDS
    ====================================================== --}}

    <section class="pb-5">

        <div class="container">

            @if($media->count())

                <div class="row g-4">


                    @foreach($media as $item)

                        @php

                            $translation =
                                $item->translations->first();

                            $title =
                                $translation?->title
                                ?? __('Untitled Media');

                            $shortDescription =
                                $translation?->short_description
                                ?? '';

                            $hasYoutube =
                                !empty($item->youtube_url);

                        @endphp


                        <div class="col-12 col-sm-6 col-lg-3">

                            <article class="media-card">


                                {{-- IMAGE --}}

                                <div class="media-card-image">

                                    @if($item->thumbnail)

                                        <img
                                            src="{{ asset('storage/' . $item->thumbnail) }}"
                                            alt="{{ $title }}"
                                            loading="lazy"
                                        >

                                    @else

                                        <div
                                            class="w-100 h-100 d-flex align-items-center justify-content-center"
                                            style="
                                                background:
                                                linear-gradient(
                                                    135deg,
                                                    #172554,
                                                    #2563eb,
                                                    #7c3aed
                                                );
                                            "
                                        >

                                            <i
                                                class="bi bi-broadcast"
                                                style="
                                                    color:white;
                                                    font-size:3rem;
                                                "
                                            ></i>

                                        </div>

                                    @endif


                                    {{-- TYPE --}}

                                    <span class="media-type-badge">

                                        {{ ucwords(
                                            str_replace(
                                                '_',
                                                ' ',
                                                $item->type
                                            )
                                        ) }}

                                    </span>


                                    {{-- VIDEO PLAY --}}

                                    @if($hasYoutube)

                                        <div class="media-card-overlay">

                                            <span class="media-card-play">

                                                <i class="bi bi-play-fill"></i>

                                            </span>

                                        </div>

                                    @endif

                                </div>


                                {{-- CONTENT --}}

                                <div class="media-card-body">


                                    <h3 class="media-card-title">

                                        {{ $title }}

                                    </h3>


                                    <p class="media-card-description">

                                        {{ $shortDescription }}

                                    </p>


                                    <a
                                        href="{{ route(
                                            'website.media.show',
                                            $item->id
                                        ) }}"
                                        class="media-read-more"
                                    >

                                        {{ __('Read More') }}

                                        <i class="bi bi-arrow-right"></i>

                                    </a>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>


                {{-- =================================================
                     PAGINATION
                ================================================== --}}

                @if($media->hasPages())

                    <div class="media-pagination">

                        {{ $media->links() }}

                    </div>

                @endif


            @else

                <div class="text-center py-5">

                    <div
                        class="mb-3"
                        style="
                            font-size:4rem;
                            color:#94a3b8;
                        "
                    >

                        <i class="bi bi-camera-video-off"></i>

                    </div>


                    <h4 class="fw-bold text-dark">

                        {{ __('No Media Found') }}

                    </h4>


                    <p class="text-secondary">

                        {{ __('No media matched your search or filter.') }}

                    </p>

                </div>

            @endif

        </div>

    </section>


</div>

@endsection
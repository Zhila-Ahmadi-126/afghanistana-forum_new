@extends('layouts.website')

@section('content')
  <style>
    /* =========================================================
   ACADEMY RESOURCES PAGE
========================================================= */

.academy-resources-page {
    position: relative;
    padding: 90px 0 110px;
    overflow: hidden;
}


/* =========================================================
   HEADER
========================================================= */

.academy-resources-header {
    position: relative;
    max-width: 950px;
    margin: 0 auto 65px;
    padding: 45px 50px;
    text-align: center;

    background: linear-gradient(
        135deg,
        rgba(7, 35, 68, 0.72),
        rgba(17, 48, 82, 0.58)
    );

    border: 1px solid rgba(120, 190, 255, 0.28);
    border-radius: 30px;

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 20px 55px rgba(5, 35, 70, 0.20),
        0 0 45px rgba(70, 150, 255, 0.08);

    transition:
        transform .4s ease,
        box-shadow .4s ease,
        border-color .4s ease;
}

.academy-resources-header:hover {
    transform: translateY(-5px);

    border-color: rgba(120, 190, 255, 0.48);

    box-shadow:
        0 28px 70px rgba(5, 35, 70, 0.28),
        0 0 55px rgba(80, 150, 255, 0.14);
}


/* =========================================================
   HEADER OVERLINE
========================================================= */

.academy-resources-overline {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    margin-bottom: 15px;

    color: #8bc7ff;

    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.academy-resources-overline i {
    font-size: 19px;

    animation: resourceIconFloat 3s ease-in-out infinite;
}


/* =========================================================
   HEADER TITLE
========================================================= */

.academy-resources-header h1 {
    margin: 0 0 18px;

    color: #ffffff;

    font-size: clamp(32px, 4vw, 48px);
    font-weight: 800;
    line-height: 1.2;

    text-shadow:
        0 3px 18px rgba(0, 0, 0, .25);
}

.academy-resources-header p {
    max-width: 760px;

    margin: 0 auto;

    color: rgba(235, 245, 255, .82);

    font-size: 16px;
    line-height: 1.9;
}


/* =========================================================
   HEADER FEATURES
========================================================= */

.academy-resources-header-features {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 14px;

    margin-top: 30px;
}

.academy-resource-feature {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 10px 17px;

    background: rgba(255, 255, 255, .055);

    border: 1px solid rgba(150, 205, 255, .18);
    border-radius: 50px;

    color: rgba(235, 247, 255, .88);

    font-size: 13px;

    backdrop-filter: blur(8px);

    transition:
        transform .3s ease,
        background .3s ease,
        border-color .3s ease,
        box-shadow .3s ease;
}

.academy-resource-feature i {
    color: #78bbff;
    font-size: 16px;

    transition: transform .3s ease;
}

.academy-resource-feature:hover {
    transform: translateY(-4px);

    background: rgba(90, 160, 235, .12);

    border-color: rgba(120, 190, 255, .38);

    box-shadow:
        0 10px 25px rgba(60, 130, 220, .14);
}

.academy-resource-feature:hover i {
    transform: scale(1.18) rotate(-6deg);
}


/* =========================================================
   RESOURCE CARD
========================================================= */

.academy-resource-card {
    position: relative;
    height: 100%;
    overflow: hidden;

    background: linear-gradient(
        145deg,
        rgba(8, 38, 70, .78),
        rgba(18, 53, 88, .63)
    );

    border: 1px solid rgba(130, 195, 255, .23);
    border-radius: 24px;

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    box-shadow:
        0 15px 40px rgba(5, 35, 70, .16),
        0 0 30px rgba(70, 150, 255, .04);

    transition:
        transform .4s cubic-bezier(.2,.8,.2,1),
        box-shadow .4s ease,
        border-color .4s ease;
}

.academy-resource-card:hover {
    transform: translateY(-9px);

    border-color: rgba(110, 190, 255, .48);

    box-shadow:
        0 25px 55px rgba(5, 35, 70, .24),
        0 0 45px rgba(80, 155, 255, .13);
}


/* =========================================================
   FEATURED BADGE
========================================================= */

.academy-resource-featured {
    position: absolute;
    top: 17px;
    right: 17px;
    z-index: 5;

    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 7px 12px;

    background: rgba(75, 105, 165, .72);

    border: 1px solid rgba(170, 210, 255, .35);
    border-radius: 30px;

    color: #ffffff;

    font-size: 11px;
    font-weight: 700;

    backdrop-filter: blur(10px);

    box-shadow:
        0 8px 20px rgba(40, 80, 140, .18);
}

.academy-resource-featured i {
    color: #a9d5ff;
}


/* =========================================================
   COVER
========================================================= */

.academy-resource-cover {
    position: relative;
    height: 230px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            rgba(18, 55, 95, .9),
            rgba(35, 72, 112, .72)
        );
}

.academy-resource-cover::after {
    content: "";

    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(5, 25, 48, .52),
            transparent 55%
        );

    pointer-events: none;
}

.academy-resource-cover img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition:
        transform .6s ease,
        filter .5s ease;
}

.academy-resource-card:hover .academy-resource-cover img {
    transform: scale(1.07);

    filter: brightness(1.06);
}


/* =========================================================
   COVER PLACEHOLDER
========================================================= */

.academy-resource-cover-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    background:
        radial-gradient(
            circle at 50% 40%,
            rgba(100, 180, 255, .18),
            transparent 45%
        );

    color: #83c5ff;

    font-size: 65px;

    transition:
        transform .4s ease,
        color .4s ease;
}

.academy-resource-card:hover
.academy-resource-cover-placeholder {
    transform: scale(1.05);

    color: #a9d8ff;
}


/* =========================================================
   CONTENT
========================================================= */

.academy-resource-content {
    padding: 27px 27px 30px;
}


/* =========================================================
   RESOURCE TYPE
========================================================= */

.academy-resource-type {
    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 13px;

    color: #85c5ff;

    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.academy-resource-type i {
    font-size: 17px;
}


/* =========================================================
   TITLE
========================================================= */

.academy-resource-content h2 {
    margin: 0 0 13px;

    color: #ffffff;

    font-size: 22px;
    font-weight: 750;
    line-height: 1.45;

    transition: color .3s ease;
}

.academy-resource-card:hover
.academy-resource-content h2 {
    color: #9ed2ff;
}


/* =========================================================
   AUTHOR
========================================================= */

.academy-resource-author {
    display: flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 14px;

    color: rgba(220, 237, 255, .72);

    font-size: 13px;
}

.academy-resource-author i {
    color: #76b9f5;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.academy-resource-content p {
    margin-bottom: 20px;

    color: rgba(225, 239, 253, .70);

    font-size: 14px;
    line-height: 1.8;
}


/* =========================================================
   META
========================================================= */

.academy-resource-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;

    padding-top: 16px;

    border-top: 1px solid rgba(150, 205, 255, .12);
}

.academy-resource-meta span {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 6px 10px;

    background: rgba(255, 255, 255, .045);

    border: 1px solid rgba(140, 200, 255, .12);
    border-radius: 8px;

    color: rgba(220, 237, 255, .68);

    font-size: 11px;
}

.academy-resource-meta i {
    color: #78baf5;
}


/* =========================================================
   ACTION
========================================================= */

.academy-resource-action {
    margin-top: 22px;
}

.academy-resource-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;

    padding: 11px 18px;

    background: rgba(55, 115, 180, .18);

    border: 1px solid rgba(110, 185, 255, .30);
    border-radius: 12px;

    color: #a8d6ff;

    font-size: 13px;
    font-weight: 700;

    text-decoration: none;

    transition:
        background .3s ease,
        border-color .3s ease,
        color .3s ease,
        transform .3s ease,
        box-shadow .3s ease;
}

.academy-resource-button i {
    transition: transform .3s ease;
}

.academy-resource-button:hover {
    background: rgba(65, 135, 210, .30);

    border-color: rgba(130, 205, 255, .52);

    color: #ffffff;

    transform: translateY(-2px);

    box-shadow:
        0 10px 25px rgba(50, 125, 205, .16);
}

.academy-resource-button:hover i {
    transform: translateX(5px);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.academy-resources-empty {
    max-width: 650px;

    margin: 50px auto;

    padding: 55px 35px;

    text-align: center;

    background: linear-gradient(
        145deg,
        rgba(8, 38, 70, .70),
        rgba(18, 53, 88, .55)
    );

    border: 1px solid rgba(120, 190, 255, .20);
    border-radius: 26px;

    backdrop-filter: blur(15px);

    box-shadow:
        0 18px 45px rgba(5, 35, 70, .16);
}

.academy-resources-empty-icon {
    width: 75px;
    height: 75px;

    margin: 0 auto 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(80, 150, 220, .12);

    border: 1px solid rgba(120, 190, 255, .22);

    color: #83c5ff;

    font-size: 30px;
}

.academy-resources-empty h2 {
    margin-bottom: 10px;

    color: #ffffff;

    font-size: 24px;
}

.academy-resources-empty p {
    margin: 0;

    color: rgba(220, 237, 255, .68);

    line-height: 1.8;
}


/* =========================================================
   ANIMATION
========================================================= */

@keyframes resourceIconFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-5px);
    }

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .academy-resources-page {
        padding: 70px 0 90px;
    }

    .academy-resources-header {
        padding: 38px 30px;
    }

}


@media (max-width: 575px) {

    .academy-resources-header {
        padding: 30px 20px;

        border-radius: 22px;
    }

    .academy-resources-header h1 {
        font-size: 30px;
    }

    .academy-resources-header p {
        font-size: 14px;
    }

    .academy-resources-header-features {
        gap: 9px;
    }

    .academy-resource-feature {
        padding: 8px 12px;
        font-size: 11px;
    }

    .academy-resource-cover {
        height: 205px;
    }

    .academy-resource-content {
        padding: 23px 21px 25px;
    }

}
/* =========================================================
   ACADEMY RESOURCE FILTER
========================================================= */

.academy-resource-filter {
    position: relative;

    width: 100%;
    max-width: 1180px;

    margin: 0 auto 55px;
    padding: 28px 30px;

    background:
        linear-gradient(
            135deg,
            rgba(18, 43, 70, 0.055),
            rgba(72, 126, 175, 0.075)
        );

    border: 1px solid rgba(55, 115, 165, 0.22);

    border-radius: 24px;

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 15px 40px rgba(25, 70, 105, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.75);

    transition:
        transform .35s ease,
        box-shadow .35s ease,
        border-color .35s ease;
}


/* Soft decorative glow */

.academy-resource-filter::before {
    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    top: -55px;
    right: -35px;

    border-radius: 50%;

    background: rgba(73, 145, 205, 0.09);

    filter: blur(25px);

    pointer-events: none;
}


.academy-resource-filter:hover {

    border-color: rgba(60, 125, 180, 0.34);

    box-shadow:
        0 22px 50px rgba(35, 95, 145, 0.14),
        0 0 35px rgba(75, 145, 205, 0.07),
        inset 0 1px 0 rgba(255, 255, 255, 0.85);
}


/* =========================================================
   SEARCH FIELD
========================================================= */

.academy-filter-field {

    position: relative;
    width: 100%;
}


.academy-filter-field i {

    position: absolute;

    left: 18px;
    top: 50%;

    transform: translateY(-50%);

    color: #4d7fa6;

    font-size: 17px;

    z-index: 2;

    transition: all .3s ease;
}


.academy-filter-field input {

    width: 100%;
    height: 54px;

    padding: 0 18px 0 50px;

    border: 1px solid rgba(65, 120, 165, 0.20);

    border-radius: 15px;

    background: rgba(255, 255, 255, 0.72);

    color: #24415c;

    font-size: 14px;

    outline: none;

    box-shadow:
        inset 0 1px 2px rgba(20, 60, 90, 0.025);

    transition:
        all .3s ease;
}


.academy-filter-field input::placeholder {
    color: #8a9eaf;
}


.academy-filter-field input:hover {

    background: rgba(255, 255, 255, 0.88);

    border-color: rgba(60, 120, 170, 0.30);
}


.academy-filter-field input:focus {

    background: rgba(255, 255, 255, 0.96);

    border-color: rgba(55, 125, 190, 0.52);

    box-shadow:
        0 0 0 4px rgba(65, 135, 195, 0.09),
        0 8px 22px rgba(45, 105, 155, 0.08);
}


.academy-filter-field:focus-within i {

    color: #326f9f;

    transform:
        translateY(-50%)
        scale(1.12);
}


/* =========================================================
   SELECT
========================================================= */

.academy-filter-select {

    width: 100%;
    height: 54px;

    padding: 0 42px 0 18px;

    border: 1px solid rgba(65, 120, 165, 0.20);

    border-radius: 15px;

    background-color: rgba(255, 255, 255, 0.72);

    color: #29475f;

    font-size: 14px;

    outline: none;

    cursor: pointer;

    transition:
        all .3s ease;
}


.academy-filter-select:hover {

    background-color: rgba(255, 255, 255, 0.90);

    border-color: rgba(60, 120, 170, 0.30);
}


.academy-filter-select:focus {

    background-color: rgba(255, 255, 255, 0.96);

    border-color: rgba(55, 125, 190, 0.52);

    box-shadow:
        0 0 0 4px rgba(65, 135, 195, 0.09),
        0 8px 22px rgba(45, 105, 155, 0.08);
}


.academy-filter-select option {

    background: #ffffff;

    color: #29475f;
}


/* =========================================================
   FILTER BUTTON
========================================================= */

.academy-filter-button {

    width: 100%;
    height: 54px;

    display: flex;

    align-items: center;
    justify-content: center;

    border: 1px solid rgba(40, 95, 145, 0.35);

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            #234f78,
            #397ba9
        );

    color: #ffffff;

    font-size: 17px;

    cursor: pointer;

    box-shadow:
        0 10px 22px rgba(35, 90, 140, 0.18);

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        background .3s ease;
}


.academy-filter-button:hover {

    color: #ffffff;

    transform: translateY(-3px);

    background:
        linear-gradient(
            135deg,
            #1d456d,
            #326e9d
        );

    box-shadow:
        0 15px 30px rgba(35, 95, 150, 0.26),
        0 0 22px rgba(65, 140, 205, 0.12);
}


.academy-filter-button:active {

    transform: translateY(-1px);
}


.academy-filter-button i {

    transition:
        transform .35s ease;
}


.academy-filter-button:hover i {

    transform:
        rotate(-12deg)
        scale(1.12);
}


/* =========================================================
   RESET
========================================================= */

.academy-filter-reset {

    display: flex;

    justify-content: flex-end;

    margin-top: 18px;

    padding-top: 16px;

    border-top: 1px solid rgba(70, 115, 150, 0.10);
}


.academy-filter-reset a {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 8px 14px;

    border-radius: 10px;

    color: #58758c;

    background: rgba(255, 255, 255, 0.45);

    border: 1px solid rgba(75, 115, 145, 0.13);

    font-size: 13px;
    font-weight: 600;

    text-decoration: none;

    transition:
        all .3s ease;
}


.academy-filter-reset a:hover {

    color: #234f78;

    background: rgba(255, 255, 255, 0.85);

    border-color: rgba(55, 120, 175, 0.25);

    transform: translateY(-2px);

    box-shadow:
        0 8px 18px rgba(40, 90, 135, 0.10);
}


.academy-filter-reset i {

    transition:
        transform .4s ease;
}


.academy-filter-reset a:hover i {

    transform: rotate(-180deg);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .academy-resource-filter {
        padding: 24px;
    }

    .academy-filter-button {
        margin-top: 0;
    }
}


@media (max-width: 767px) {

    .academy-resource-filter {

        padding: 20px;

        margin-bottom: 35px;

        border-radius: 20px;
    }

    .academy-filter-field input,
    .academy-filter-select,
    .academy-filter-button {

        height: 50px;
    }

    .academy-filter-reset {

        justify-content: center;
    }
}
  </style>
<section class="academy-resources-page">


    <div class="container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="academy-resources-header">

            <span class="academy-resources-overline">

                <i class="bi bi-collection-play-fill"></i>

                {{ __('Academy Resources') }}

            </span>

            <h1>

                {{ __('Learning & Research Resources') }}

            </h1>

            <p>

                {{ __('Explore our collection of academic books, research materials, articles, learning resources and other educational materials prepared to support students, instructors and researchers.') }}

            </p>


            <div class="academy-resources-header-features">

                <div class="academy-resource-feature">

                    <i class="bi bi-book-half"></i>

                    <span>{{ __('Academic Books') }}</span>

                </div>


                <div class="academy-resource-feature">

                    <i class="bi bi-journal-richtext"></i>

                    <span>{{ __('Research Materials') }}</span>

                </div>


                <div class="academy-resource-feature">

                    <i class="bi bi-file-earmark-text"></i>

                    <span>{{ __('Learning Materials') }}</span>

                </div>


                <div class="academy-resource-feature">

                    <i class="bi bi-globe2"></i>

                    <span>{{ __('Online Resources') }}</span>

                </div>

            </div>

        </div>




        <form
    action="{{ route('academy.resources') }}"
    method="GET"
    class="academy-resource-filter"
>

    <div class="row g-3">

        {{-- SEARCH --}}

        <div class="col-lg-4">

            <div class="academy-filter-field">

                <i class="bi bi-search"></i>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="{{ __('Search resources...') }}"
                >

            </div>

        </div>


        {{-- TYPE --}}

        <div class="col-lg-2">

            <select
                name="type"
                class="academy-filter-select"
            >

                <option value="">
                    {{ __('All Resource Types') }}
                </option>

                @foreach($resourceTypes as $type)

                    <option
                        value="{{ $type }}"
                        @selected(request('type') == $type)
                    >
                        {{ ucfirst(str_replace('_', ' ', $type)) }}
                    </option>

                @endforeach

            </select>

        </div>


        {{-- DEPARTMENT --}}

        <div class="col-lg-2">

            <select
                name="department"
                class="academy-filter-select"
            >

                <option value="">
                    {{ __('All Departments') }}
                </option>

                @foreach($departments as $department)

                    <option
                        value="{{ $department->id }}"
                        @selected(request('department') == $department->id)
                    >

                        {{ $department->translations->first()?->title ?? $department->code }}

                    </option>

                @endforeach

            </select>

        </div>


        {{-- SUBMIT --}}

        <div class="col-lg-2">

            <button
                type="submit"
                class="academy-filter-button"
                title="{{ __('Filter') }}"
            >

                <i class="bi bi-funnel-fill"></i>

            </button>

        </div>
 <div class="col-lg-2">
         {{-- RESET --}}

            @if(request()->hasAny(['search', 'type', 'department']))

                <div class="academy-filter-button text-light ">

                    <a href="{{ route('academy.resources') }}" class="text-light">

                        <i class="bi bi-arrow-counterclockwise"></i>

                        {{ __('Reset Filters') }}

                    </a>

                </div>

    @endif
        </div>

        

    </div>


   

</form>


        {{-- =====================================================
             RESOURCES
        ====================================================== --}}
        {{-- =====================================================
             RESOURCES
        ====================================================== --}}

        @if($resources->count())

            <div class="row g-4">

                @foreach($resources as $resource)

                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | RESOURCE TYPE
                        |--------------------------------------------------------------------------
                        */

                        $type = strtolower(
                            $resource->resource_type ?? 'resource'
                        );


                        /*
                        |--------------------------------------------------------------------------
                        | ICON
                        |--------------------------------------------------------------------------
                        */

                        $icon = match($type) {

                            'book' =>
                                'bi bi-book-half',

                            'article' =>
                                'bi bi-journal-text',

                            'research' =>
                                'bi bi-search',

                            'pdf' =>
                                'bi bi-file-earmark-pdf-fill',

                            'video' =>
                                'bi bi-play-circle-fill',

                            'course' =>
                                'bi bi-mortarboard-fill',

                            'document' =>
                                'bi bi-file-earmark-text-fill',

                            default =>
                                'bi bi-folder2-open',

                        };


                        /*
                        |--------------------------------------------------------------------------
                        | DEPARTMENT
                        |--------------------------------------------------------------------------
                        */

                        $departmentTitle =
                            $resource->department
                                ?->translations
                                ?->first()
                                ?->title;


                        /*
                        |--------------------------------------------------------------------------
                        | CLASS
                        |--------------------------------------------------------------------------
                        */

                        $classTitle =
                            $resource->academyClass
                                ?->translations
                                ?->first()
                                ?->title;

                    @endphp


                    <div class="col-xl-4 col-lg-4 col-md-6">

                        <article class="academy-resource-card">


                            {{-- =====================================================
                                 FEATURED
                            ====================================================== --}}

                            @if($resource->is_featured)

                                <div class="academy-resource-featured">

                                    <i class="bi bi-star-fill"></i>

                                    {{ __('Featured') }}

                                </div>

                            @endif



                            {{-- =====================================================
                                 COVER
                            ====================================================== --}}

                            <div class="academy-resource-cover">

                                @if($resource->cover_image)

                                    <img
                                        src="{{ asset('storage/' . $resource->cover_image) }}"
                                        alt="{{ $resource->title }}"
                                    >

                                @else

                                    <div class="academy-resource-cover-placeholder">

                                        <i class="{{ $icon }}"></i>

                                    </div>

                                @endif

                            </div>



                            {{-- =====================================================
                                 CONTENT
                            ====================================================== --}}

                            <div class="academy-resource-content">


                                {{-- TYPE --}}

                                <div class="academy-resource-type">

                                    <i class="{{ $icon }}"></i>

                                    <span>

                                        {{ ucfirst($resource->resource_type ?? __('Resource')) }}

                                    </span>

                                </div>



                                {{-- TITLE --}}

                                <h2>

                                    {{ $resource->title }}

                                </h2>



                                {{-- AUTHOR --}}

                                @if($resource->author)

                                    <div class="academy-resource-author">

                                        <i class="bi bi-person-fill"></i>

                                        <span>

                                            {{ $resource->author }}

                                        </span>

                                    </div>

                                @endif



                                {{-- DESCRIPTION --}}

                                @if($resource->short_description)

                                    <p>

                                        {{ $resource->short_description }}

                                    </p>

                                @endif



                                {{-- META --}}

                                <div class="academy-resource-meta">


                                    @if($departmentTitle)

                                        <span>

                                            <i class="bi bi-building"></i>

                                            {{ $departmentTitle }}

                                        </span>

                                    @endif



                                    @if($classTitle)

                                        <span>

                                            <i class="bi bi-book"></i>

                                            {{ $classTitle }}

                                        </span>

                                    @endif



                                    @if($resource->published_date)

                                        <span>

                                            <i class="bi bi-calendar3"></i>

                                            {{ $resource->published_date->format('Y-m-d') }}

                                        </span>

                                    @endif


                                </div>



                                {{-- =====================================================
                                     ACTION
                                ====================================================== --}}

                                <div class="academy-resource-action">

                                    <a
                                        href="{{ route('academy.resource.show', $resource->id) }}"
                                        class="academy-resource-button"
                                    >

                                        {{ __('Explore Resource') }}

                                        <i class="bi bi-arrow-right"></i>

                                    </a>

                                </div>


                            </div>

                        </article>

                    </div>

                @endforeach

            </div>



            {{-- =====================================================
                 PAGINATION
            ====================================================== --}}

            @if($resources->hasPages())

                <div class="academy-resources-pagination">

                    {{ $resources->links() }}

                </div>

            @endif



        @else


            {{-- =====================================================
                 EMPTY STATE
            ====================================================== --}}

            <div class="academy-resources-empty">

                <div class="academy-resources-empty-icon">

                    <i class="bi bi-folder-x"></i>

                </div>


                <h2>

                    {{ __('No Resources Available') }}

                </h2>


                <p>

                    {{ __('There are currently no academic resources available in the academy.') }}

                </p>

            </div>


        @endif


    </div>

</section>

@endsection
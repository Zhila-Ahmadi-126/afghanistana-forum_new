@extends('layouts.website')


@section('content')


@php

    $translation = $department->translations->first();

    $title = $translation?->title
        ?? __('Untitled Department');

    $shortDescription =
        $translation?->short_description ?? '';

    $description =
        $translation?->description ?? '';

    $icon = $department->icon
        ?: 'bi bi-mortarboard-fill';

@endphp

<style>
 /* =========================================================
   ACADEMY DEPARTMENT — DARK BLUE GLASS DESIGN
========================================================= */

.academy-department-page {
    position: relative;
    padding: 55px 0 90px;
    background: #ffffff;
    overflow: hidden;
    color: #10213f;
}

/* Background ambient lights */

.academy-department-page::before,
.academy-department-page::after {
    content: "";
    position: absolute;
    width: 330px;
    height: 330px;
    border-radius: 50%;
    filter: blur(90px);
    opacity: .22;
    pointer-events: none;
}

.academy-department-page::before {
    top: 120px;
    left: -130px;
    background: #315cff;
}

.academy-department-page::after {
    right: -120px;
    bottom: 180px;
    background: #8a4cff;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.academy-department-back {
    position: relative;
    z-index: 5;
    margin-bottom: 28px;
}

.academy-department-back a {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 10px 18px;

    color: #163b73;
    text-decoration: none;

    background: rgba(255,255,255,.70);

    border: 1px solid rgba(38,83,145,.20);
    border-radius: 14px;

    box-shadow:
        0 8px 25px rgba(25,65,120,.10);

    transition:
        transform .35s ease,
        box-shadow .35s ease,
        background .35s ease;
}

.academy-department-back a:hover {
    transform: translateX(-5px);

    background: rgba(235,243,255,.95);

    box-shadow:
        0 12px 30px rgba(31,91,190,.18);
}

.academy-department-back i {
    font-size: 17px;
}


/* =========================================================
   HERO
========================================================= */

       
.academy-department-hero {
    position: relative;
    z-index: 2;

    overflow: hidden;

    padding: 42px;

    border-radius: 30px;

    background:
        linear-gradient(
            135deg,
            rgba(87, 67, 23, 0.149),
            rgba(101, 52, 19, 0.433)
        );

    border: 1px solid rgba(255,255,255,.45);

    box-shadow:
        0 25px 60px rgba(203, 231, 48, 0.156),
        inset 0 1px 0 rgba(241, 210, 210, 0.35);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transition:
        transform .45s ease,
        box-shadow .45s ease;
}

.academy-department-hero:hover {
    transform: translateY(-5px);

    box-shadow:
        0 32px 75px rgba(83, 195, 247, 0.193),
        0 0 45px rgba(255, 228, 55, 0.12),
        inset 0 1px 0 rgba(255,255,255,.45);
}


/* Hero glow */

.academy-department-hero::before {
    content: "";

    position: absolute;

    width: 240px;
    height: 240px;

    right: -70px;
    top: -100px;

    border-radius: 50%;

    background: rgba(132, 88, 0, 0.253);

    filter: blur(35px);
}

.academy-department-hero::after {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    left: -70px;
    bottom: -90px;

    border-radius: 50%;

    background: rgba(99, 61, 1, 0.199);

    filter: blur(35px);
}

/* Hero content */

.academy-department-hero-content {
    position: relative;
    z-index: 3;

    display: flex;
    align-items: center;
    gap: 28px;
}


/* Hero icon */

.academy-department-hero-icon {
    flex: 0 0 90px;

    width: 90px;
    height: 90px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.20),
            rgba(255,255,255,.07)
        );

    border: 1px solid rgba(255,255,255,.38);

    box-shadow:
        0 15px 35px rgba(0,0,0,.20),
        inset 0 1px 0 rgba(255,255,255,.35);

    backdrop-filter: blur(15px);
}

.academy-department-hero-icon i {
    font-size: 40px;

    background:
        linear-gradient(
            135deg,
            #8fc7ff,
            #ffffff
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    transition: transform .45s ease;
}

.academy-department-hero:hover
.academy-department-hero-icon i {
    transform: scale(1.12) rotate(-5deg);
}


/* Hero text */

.academy-department-hero-text {
    color: #ffffff;
}

.academy-department-overline {
    display: block;

    margin-bottom: 5px;

    font-size: 13px;
    font-weight: 600;

    letter-spacing: 2px;
    text-transform: uppercase;

    color: #a9d2ff;
}

.academy-department-hero h1 {
    margin: 0 0 12px;

    font-size: clamp(30px, 4vw, 48px);

    font-weight: 700;

    color: #ffffff;

    letter-spacing: -.5px;
}

.academy-department-hero p {
    max-width: 760px;

    margin: 0;

    color: rgba(255,255,255,.78);

    line-height: 1.8;
}


/* =========================================================
   SECTION HEADINGS
========================================================= */

.academy-section-heading {
    margin-bottom: 28px;
}

.academy-section-heading > span {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 9px;

    color: #3276d3;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.academy-section-heading > span i {
    font-size: 16px;
}

.academy-section-heading h2 {
    margin: 0;

    color: #102b55;

    font-size: 30px;
    font-weight: 700;
}

.academy-section-heading p {
    max-width: 700px;

    margin: 10px 0 0;

    color: #6a7890;

    line-height: 1.8;
}


/* =========================================================
   ABOUT
========================================================= */

.academy-department-about {
    position: relative;
    z-index: 2;

    margin-top: 55px;
}

.academy-department-about-card {
    position: relative;

    padding: 30px 34px;

    overflow: hidden;

    border-radius: 24px;

    background:
        linear-gradient(
            135deg,
            rgba(228,239,255,.76),
            rgba(247,250,255,.88)
        );

    border: 1px solid rgba(69,121,190,.22);

    box-shadow:
        0 18px 45px rgba(32,81,145,.13),
        inset 0 1px 0 rgba(255,255,255,.90);

    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    transition:
        transform .4s ease,
        box-shadow .4s ease;
}

.academy-department-about-card::before {
    content: "";

    position: absolute;

    width: 160px;
    height: 160px;

    right: -70px;
    top: -80px;

    border-radius: 50%;

    background: rgba(62,126,255,.14);

    filter: blur(25px);
}

.academy-department-about-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 25px 55px rgba(30,86,170,.20),
        0 0 30px rgba(63,128,255,.08);
}

.academy-department-about-card p {
    position: relative;
    z-index: 2;

    margin: 0;

    color: #344967;

    line-height: 2;
    font-size: 15px;
}


/* =========================================================
   CLASSES
========================================================= */

.academy-department-classes {
    position: relative;
    z-index: 2;

    margin-top: 65px;
}


/* Class card */

.academy-class-card {
    position: relative;

    display: flex;
    gap: 22px;

    height: 100%;

    padding: 25px;

    overflow: hidden;

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(232,241,255,.82),
            rgba(248,250,255,.94)
        );

    border: 1px solid rgba(53,110,180,.22);

    box-shadow:
        0 18px 42px rgba(25,75,140,.13),
        inset 0 1px 0 rgba(255,255,255,.95);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    transition:
        transform .45s cubic-bezier(.2,.8,.2,1),
        box-shadow .45s ease,
        border-color .45s ease;
}

.academy-class-card::before {
    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    right: -55px;
    top: -55px;

    border-radius: 50%;

    background: rgba(76,133,255,.16);

    filter: blur(25px);

    transition: transform .45s ease;
}

.academy-class-card:hover {
    transform: translateY(-9px);

    border-color: rgba(65,125,220,.40);

    box-shadow:
        0 28px 60px rgba(26,78,155,.22),
        0 0 35px rgba(66,125,255,.13),
        inset 0 1px 0 rgba(255,255,255,1);
}

.academy-class-card:hover::before {
    transform: scale(1.5);
}


/* Class icon */

.academy-class-icon {
    flex: 0 0 55px;

    width: 55px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 17px;

    background:
        linear-gradient(
            135deg,
            rgba(47,112,210,.16),
            rgba(91,78,210,.10)
        );

    border: 1px solid rgba(62,119,205,.20);

    box-shadow:
        0 10px 25px rgba(39,98,181,.13);
}

.academy-class-icon i {
    font-size: 24px;

    color: #357bd4;

    transition:
        transform .4s ease,
        color .4s ease;
}

.academy-class-card:hover
.academy-class-icon i {
    transform: translateY(-4px) rotate(-6deg);

    color: #5d63d9;
}


/* Class content */

.academy-class-content {
    flex: 1;
}

.academy-class-code {
    display: inline-block;

    margin-bottom: 7px;

    padding: 4px 10px;

    border-radius: 8px;

    background: rgba(48,111,207,.10);

    color: #3974bd;

    font-size: 11px;
    font-weight: 700;

    letter-spacing: 1px;
}

.academy-class-content h3 {
    margin: 0 0 8px;

    color: #18365f;

    font-size: 20px;
    font-weight: 700;
}

.academy-class-content p {
    margin: 0 0 15px;

    color: #64748b;

    font-size: 14px;
    line-height: 1.8;
}

.academy-class-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;

    margin-bottom: 18px;
}

.academy-class-meta span {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    color: #526983;

    font-size: 13px;
}

.academy-class-meta i {
    color: #4686d8;
}

.academy-class-link,
.academy-instructor-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    color: #2f72c9;

    font-size: 13px;
    font-weight: 700;

    text-decoration: none;

    transition:
        gap .3s ease,
        color .3s ease;
}

.academy-class-link:hover,
.academy-instructor-link:hover {
    gap: 12px;

    color: #5b5fd4;
}


/* =========================================================
   INSTRUCTORS
========================================================= */

.academy-department-instructors {
    position: relative;
    z-index: 2;

    margin-top: 70px;
}

.academy-instructor-card {
    position: relative;

    height: 100%;

    overflow: hidden;

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(232,241,255,.82),
            rgba(249,250,255,.94)
        );

    border: 1px solid rgba(59,113,181,.22);

    box-shadow:
        0 18px 42px rgba(28,76,140,.13),
        inset 0 1px 0 rgba(255,255,255,.95);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    transition:
        transform .45s ease,
        box-shadow .45s ease;
}

.academy-instructor-card:hover {
    transform: translateY(-9px);

    box-shadow:
        0 28px 60px rgba(29,79,155,.22),
        0 0 35px rgba(75,119,230,.12);
}


/* Instructor image */

.academy-instructor-image {
    position: relative;

    height: 240px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            #dcecff,
            #edf2ff
        );
}

.academy-instructor-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition:
        transform .55s ease,
        filter .55s ease;
}

.academy-instructor-card:hover
.academy-instructor-image img {
    transform: scale(1.06);

    filter: saturate(1.05);
}

.academy-instructor-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;
}

.academy-instructor-placeholder i {
    font-size: 75px;

    color: #7aa8df;
}


/* Instructor content */

.academy-instructor-content {
    padding: 23px;
}

.academy-instructor-content > span {
    color: #4b83c8;

    font-size: 12px;
    font-weight: 700;

    text-transform: uppercase;
    letter-spacing: 1px;
}

.academy-instructor-content h3 {
    margin: 7px 0 17px;

    color: #17365e;

    font-size: 21px;
    font-weight: 700;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.academy-empty-state {
    padding: 55px 25px;

    text-align: center;

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(231,240,255,.70),
            rgba(249,251,255,.90)
        );

    border: 1px solid rgba(62,115,185,.18);

    box-shadow:
        0 18px 40px rgba(28,77,145,.10);
}

.academy-empty-state i {
    display: block;

    margin-bottom: 14px;

    font-size: 42px;

    color: #5790d8;
}

.academy-empty-state h3 {
    margin-bottom: 8px;

    color: #234469;
}

.academy-empty-state p {
    margin: 0;

    color: #718096;
}


/* =========================================================
   APPLY SECTION
========================================================= */

.academy-department-apply {
    position: relative;
    z-index: 2;

    margin-top: 75px;
}

.academy-apply-card {
    position: relative;

    display: flex;
    align-items: center;
    gap: 25px;

    padding: 30px 35px;

    overflow: hidden;

    border-radius: 28px;

    background:
        linear-gradient(
            135deg,
            rgba(18,57,110,.94),
            rgba(37,78,133,.87)
        );

    border: 1px solid rgba(255,255,255,.35);

    box-shadow:
        0 25px 55px rgba(20,61,120,.25),
        inset 0 1px 0 rgba(255,255,255,.30);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    color: #ffffff;

    transition:
        transform .4s ease,
        box-shadow .4s ease;
}

.academy-apply-card::before {
    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    right: -80px;
    top: -100px;

    border-radius: 50%;

    background: rgba(79,141,255,.28);

    filter: blur(35px);
}

.academy-apply-card::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    left: 30%;
    bottom: -100px;

    border-radius: 50%;

    background: rgba(151,72,255,.20);

    filter: blur(30px);
}

.academy-apply-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 32px 70px rgba(20,65,135,.30),
        0 0 40px rgba(66,125,255,.14);
}

.academy-apply-icon {
    position: relative;
    z-index: 2;

    flex: 0 0 65px;

    width: 65px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 19px;

    background: rgba(255,255,255,.12);

    border: 1px solid rgba(255,255,255,.25);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.25);
}

.academy-apply-icon i {
    font-size: 29px;

    color: #a9d4ff;

    transition: transform .4s ease;
}

.academy-apply-card:hover
.academy-apply-icon i {
    transform: scale(1.12) rotate(-5deg);
}

.academy-apply-content {
    position: relative;
    z-index: 2;

    flex: 1;
}

.academy-apply-content > span {
    color: #9fcaff;

    font-size: 12px;
    font-weight: 700;

    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.academy-apply-content h2 {
    margin: 5px 0 7px;

    color: #ffffff;

    font-size: 25px;
}

.academy-apply-content p {
    margin: 0;

    color: rgba(255,255,255,.72);

    line-height: 1.7;
}

.academy-apply-button {
    position: relative;
    z-index: 2;

    flex-shrink: 0;

    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 13px 21px;

    border-radius: 14px;

    background: rgba(255,255,255,.95);

    color: #174477;

    font-weight: 700;

    text-decoration: none;

    box-shadow:
        0 10px 25px rgba(0,0,0,.15);

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        gap .3s ease;
}

.academy-apply-button:hover {
    transform: translateY(-3px);

    gap: 13px;

    color: #315cc1;

    box-shadow:
        0 15px 30px rgba(0,0,0,.20);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .academy-department-hero {
        padding: 32px;
    }

    .academy-apply-card {
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .academy-apply-button {
        margin-left: 90px;
    }

}


@media (max-width: 767px) {

    .academy-department-page {
        padding: 35px 0 65px;
    }

    .academy-department-hero {
        padding: 25px;
        border-radius: 24px;
    }

    .academy-department-hero-content {
        flex-direction: column;
        align-items: flex-start;
    }

    .academy-department-hero-icon {
        width: 70px;
        height: 70px;
        flex-basis: 70px;
    }

    .academy-department-hero-icon i {
        font-size: 30px;
    }

    .academy-department-hero h1 {
        font-size: 32px;
    }

    .academy-class-card {
        flex-direction: column;
    }

    .academy-apply-card {
        padding: 25px;
    }

    .academy-apply-button {
        margin-left: 0;
        width: 100%;
        justify-content: center;
    }

} 
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
                url("/assets/img/academy/academy3.jpg") center center no-repeat;
    background-size: cover;
}
 .academy-cta {
        position: relative;

        margin-top: 90px;

        padding: 55px 45px;

        border-radius: 32px;

        background:
             linear-gradient(
                135deg,
                rgba(2, 3, 72, 0.97),
                rgba(158, 158, 159, 0.777)
            );
        overflow: hidden;

        box-shadow:
            0 25px 55px rgba(7, 65, 130, 0.20);
    }


    .academy-cta::before {
        content: "";

        position: absolute;

        width: 260px;
        height: 260px;

        right: -90px;
        top: -130px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.08);
    }


    .academy-cta::after {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        left: -70px;
        bottom: -90px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.06);
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
<div class="container-fluid page-header py-5" style="height:400px">
    <div class="container ml-5"   >
        <div style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;   ">
            <h1 class="display-3 text-white mb-3 animated slideInDown"> Our Academy</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">Academy</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Department</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->

<section class="academy-department-page">


    <div class="container">


        {{-- =====================================================
             BACK TO DEPARTMENTS
        ====================================================== --}}

        <div class="academy-department-back">

            <a href="{{ route('academy.programs') }}">

                <i class="bi bi-arrow-left"></i>

                {{ __('Back to Departments') }}

            </a>

        </div>



        {{-- =====================================================
             HERO
        ====================================================== --}}

        <div class="academy-department-hero">


            <div class="academy-department-hero-glow"></div>


            <div class="academy-department-hero-content">


                <div class="academy-department-hero-icon text-primary">

                    <i class="{{ $icon }} text-primary"></i>

                </div>


                <div class="academy-department-hero-text">


                    <span class="academy-department-overline text-primary">

                        {{ __('Department of') }}

                    </span>


                    <h1 class="text-primary">

                        {{ $title }}

                    </h1>


                    @if($shortDescription)

                        <p>

                            {{ $shortDescription }}

                        </p>

                    @endif


                </div>


            </div>


        </div>



        {{-- =====================================================
             ABOUT DEPARTMENT
        ====================================================== --}}

        @if($description)

            <section class="academy-department-about">


                <div class="academy-section-heading">

                    <span>

                        <i class="bi bi-journal-text"></i>

                        {{ __('About the Department') }}

                    </span>


                    <h2>

                        {{ __('About This Department') }}

                    </h2>

                </div>


                <div class="academy-department-about-card">

                    <p>

                        {{ $description }}

                    </p>

                </div>


            </section>

        @endif



        {{-- =====================================================
             CLASSES
        ====================================================== --}}

        <section class="academy-department-classes">


            <div class="academy-section-heading">

                <span>

                    <i class="bi bi-book"></i>

                    {{ __('Academic Classes') }}

                </span>


                <h2>

                    {{ __('Classes in This Department') }}

                </h2>


                <p>

                    {{ __('Explore the classes currently offered by this academic department.') }}

                </p>

            </div>



            @if($classes->count())


                <div class="row g-4">


                    @foreach($classes as $class)


                        @php

                            $classTranslation =
                                $class->translations->first();

                            $classTitle =
                                $classTranslation?->title
                                ?? __('Untitled Class');

                            $classShortDescription =
                                $classTranslation?->short_description
                                ?? '';

                        @endphp


                        <div class="col-lg-6">


                            <article class="academy-class-card">


                                <div class="academy-class-icon">

                                    <i class="bi bi-book-half"></i>

                                </div>


                                <div class="academy-class-content">


                                    <div class="academy-class-code">

                                        {{ $class->class_code }}

                                    </div>


                                    <h3>

                                        {{ $classTitle }}

                                    </h3>


                                    @if($classShortDescription)

                                        <p>

                                            {{ $classShortDescription }}

                                        </p>

                                    @endif


                                    <div class="academy-class-meta">


                                        @if($class->teacher)

                                            <span>

                                                <i class="bi bi-person"></i>

                                                {{ $class->teacher->first_name }}
                                                {{ $class->teacher->last_name }}

                                            </span>

                                        @endif


                                        @if($class->room)

                                            <span>

                                                <i class="bi bi-geo-alt"></i>

                                                {{ $class->room }}

                                            </span>

                                        @endif


                                    </div>


                                    <a
                                        href="{{ route('academy.course.show', $class->id) }}"
                                        class="academy-class-link"
                                    >

                                        {{ __('View Class') }}

                                        <i class="bi bi-arrow-right"></i>

                                    </a>


                                </div>


                            </article>


                        </div>


                    @endforeach


                </div>


            @else


                <div class="academy-empty-state">

                    <i class="bi bi-book"></i>

                    <h3>

                        {{ __('No Classes Available') }}

                    </h3>

                    <p>

                        {{ __('There are currently no active classes available in this department.') }}

                    </p>

                </div>


            @endif


        </section>



        {{-- =====================================================
             INSTRUCTORS
        ====================================================== --}}

        <section class="academy-department-instructors">


            <div class="academy-section-heading">

                <span>

                    <i class="bi bi-people"></i>

                    {{ __('Faculty') }}

                </span>


                <h2>

                    {{ __('Our Instructors') }}

                </h2>


                <p>

                    {{ __('Meet the instructors teaching in this academic department.') }}

                </p>

            </div>



            @if($teachers->count())


                <div class="row g-4">


                    @foreach($teachers as $teacher)


                        <div class="col-lg-4 col-md-6">


                            <article class="academy-instructor-card">


                                <div class="academy-instructor-image">


                                    @if($teacher->profile_image)

                                        <img
                                            src="{{ asset('storage/' . $teacher->profile_image) }}"
                                            alt="{{ $teacher->first_name }} {{ $teacher->last_name }}"
                                        >

                                    @else

                                        <div class="academy-instructor-placeholder">

                                            <i class="bi bi-person"></i>

                                        </div>

                                    @endif


                                </div>


                                <div class="academy-instructor-content">


                                    <span>

                                        {{ $teacher->position ?: __('Instructor') }}

                                    </span>


                                    <h3>

                                        {{ $teacher->first_name }}
                                        {{ $teacher->last_name }}

                                    </h3>


                                    <a
                                        href="{{ route('academy.instructor.show', $teacher->id) }}"
                                        class="academy-instructor-link"
                                    >

                                        {{ __('View Profile') }}

                                        <i class="bi bi-arrow-right"></i>

                                    </a>


                                </div>


                            </article>


                        </div>


                    @endforeach


                </div>


            @else


                <div class="academy-empty-state">

                    <i class="bi bi-people"></i>

                    <h3>

                        {{ __('No Instructors Available') }}

                    </h3>

                    <p>

                        {{ __('There are currently no instructors assigned to this department.') }}

                    </p>

                </div>


            @endif


        </section>



        {{-- =====================================================
             APPLY
        ====================================================== --}}

        <section class="academy-department-appnlym ">


            <div class="academy-apply-cardm academy-cta text-light">


                <div class="academy-apply-icon">

                    <i class="bi bi-mortarboard-fill text-light"></i>

                </div>


                <div class="academy-apply-content">

                    <span>

                        {{ __('Join Our Academy') }}

                    </span>


                    <h2>

                        {{ __('Ready to Begin Your Academic Journey?') }}

                    </h2>


                    <p>

                        {{ __('Apply now and take the next step toward your professional and academic development.') }}

                    </p>

                </div>


                <a
                    href="{{ route('academy.apply') }}"
                    class="academy-apply-button"
                >

                    {{ __('Apply Now') }}

                    <i class="bi bi-arrow-right"></i>

                </a>


            </div>


        </section>


    </div>


</section>


@endsection
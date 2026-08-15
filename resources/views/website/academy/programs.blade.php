@extends('layouts.website')

@section('content')

<style>
    /* ==========================================================
   ACADEMY — DEPARTMENTS / PROGRAMS
========================================================== */

.academy-programs-page {
    position: relative;
    overflow: hidden;
    padding: 100px 0 120px;

    background:
        radial-gradient(
            circle at 8% 15%,
            rgba(76, 180, 220, .14),
            transparent 28%
        ),
        radial-gradient(
            circle at 90% 20%,
            rgba(120, 170, 235, .13),
            transparent 30%
        ),
        radial-gradient(
            circle at 50% 100%,
            rgba(100, 200, 190, .10),
            transparent 32%
        ),
        #f3f8fc;
}


/* ==========================================================
   DECORATIVE BACKGROUND
========================================================== */

.academy-programs-page::before,
.academy-programs-page::after {
    content: "";
    position: absolute;

    border-radius: 50%;

    pointer-events: none;

    filter: blur(5px);

    animation: academyFloat 8s ease-in-out infinite;
}

.academy-programs-page::before {
    width: 300px;
    height: 300px;

    top: 80px;
    left: -150px;

    background: rgba(72, 174, 221, .12);
}

.academy-programs-page::after {
    width: 350px;
    height: 350px;

    right: -170px;
    bottom: 50px;

    background: rgba(124, 167, 235, .12);

    animation-delay: -3s;
}


/* ==========================================================
   INTRO
========================================================== */

.academy-programs-intro {
    position: relative;
    z-index: 2;

    max-width: 760px;

    margin: 0 auto 55px;
}


.academy-programs-label {
    display: inline-flex;

    align-items: center;
    gap: 8px;

    padding: 9px 17px;

    border-radius: 30px;

    color: #23658d;

    background: rgba(255, 255, 255, .55);

    border: 1px solid rgba(80, 150, 190, .16);

    box-shadow:
        0 8px 25px rgba(40, 100, 140, .07);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    font-size: 13px;
    font-weight: 600;
}


.academy-programs-label i {
    font-size: 15px;
}


.academy-programs-title {
    margin: 18px 0 12px;

    color: #174666;

    font-size: 42px;
    font-weight: 700;

    letter-spacing: -.5px;
}


.academy-programs-description {
    max-width: 650px;

    margin: auto;

    color: #6c8497;

    font-size: 15px;
    line-height: 1.9;
}


/* ==========================================================
   GRID
========================================================== */

.academy-programs-grid {
    position: relative;
    z-index: 2;
}


/* ==========================================================
   CARD
========================================================== */

.academy-program-card {
    position: relative;
    overflow: hidden;

    height: 100%;

    min-height: 330px;

    padding: 32px;

    border-radius: 28px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.68),
            rgba(235,246,252,.52)
        );

    border: 1px solid rgba(255,255,255,.75);

    box-shadow:
        0 18px 45px rgba(42, 91, 120, .09),
        inset 0 1px 0 rgba(255,255,255,.85);

    backdrop-filter: blur(22px);
    -webkit-backdrop-filter: blur(22px);

    transition:
        transform .45s cubic-bezier(.2,.8,.2,1),
        box-shadow .45s ease,
        border-color .45s ease;
}


/* ==========================================================
   CARD LIGHT EFFECT
========================================================== */

.academy-program-card::before {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    top: -90px;
    right: -70px;

    border-radius: 50%;

    background: rgba(101, 194, 225, .13);

    filter: blur(15px);

    transition:
        transform .5s ease,
        opacity .5s ease;
}


.academy-program-card::after {
    content: "";

    position: absolute;

    width: 110px;
    height: 110px;

    bottom: -60px;
    left: -40px;

    border-radius: 50%;

    background: rgba(136, 177, 235, .10);

    filter: blur(12px);

    transition:
        transform .5s ease;
}


/* ==========================================================
   CARD HOVER
========================================================== */

.academy-program-card:hover {

    transform:
        translateY(-10px);

    border-color:
        rgba(86, 170, 210, .30);

    box-shadow:
        0 28px 65px rgba(36, 96, 130, .16),
        0 0 0 1px rgba(255,255,255,.45),
        inset 0 1px 0 rgba(255,255,255,.95);
}


.academy-program-card:hover::before {
    transform:
        scale(1.45)
        translate(-15px, 15px);

    opacity: .9;
}


.academy-program-card:hover::after {
    transform:
        scale(1.4)
        translate(15px, -10px);
}


/* ==========================================================
   ICON
========================================================== */

.academy-program-icon {

    position: relative;
    z-index: 2;

    width: 66px;
    height: 66px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 25px;

    border-radius: 19px;

    color: #2777a4;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.85),
            rgba(211,237,248,.72)
        );

    border: 1px solid rgba(255,255,255,.9);

    box-shadow:
        0 10px 28px rgba(43, 112, 150, .12),
        inset 0 1px 0 rgba(255,255,255,.95);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    font-size: 25px;

    transition:
        transform .4s ease,
        box-shadow .4s ease;
}


.academy-program-card:hover .academy-program-icon {

    transform:
        translateY(-4px)
        rotate(-3deg);

    box-shadow:
        0 16px 35px rgba(43, 112, 150, .18);
}


/* ==========================================================
   CONTENT
========================================================== */

.academy-program-content {
    position: relative;
    z-index: 2;
}


.academy-program-overline {

    display: block;

    margin-bottom: 6px;

    color: #7a94a5;

    font-size: 11px;

    font-weight: 600;

    letter-spacing: .8px;

    text-transform: uppercase;
}


.academy-program-title {

    margin: 0 0 13px;

    color: #1b4d6c;

    font-size: 25px;

    font-weight: 700;

    line-height: 1.35;

    transition:
        color .3s ease;
}


.academy-program-card:hover .academy-program-title {
    color: #17688f;
}


.academy-program-description {

    min-height: 55px;

    margin: 0 0 22px;

    color: #71899a;

    font-size: 13px;

    line-height: 1.85;
}


/* ==========================================================
   LINK
========================================================== */

.academy-program-link {

    display: inline-flex;

    align-items: center;

    gap: 9px;

    padding: 10px 16px;

    border-radius: 13px;

    color: #27749b;

    background: rgba(255,255,255,.48);

    border: 1px solid rgba(80,150,190,.13);

    box-shadow:
        0 6px 18px rgba(40, 100, 140, .06);

    text-decoration: none;

    font-size: 12px;

    font-weight: 650;

    transition:
        all .35s ease;
}


.academy-program-link i {

    transition:
        transform .35s ease;
}


.academy-program-link:hover {

    color: #155b7d;

    background:
        rgba(255,255,255,.78);

    border-color:
        rgba(70,155,200,.25);

    box-shadow:
        0 10px 25px rgba(40,100,140,.11);

    transform:
        translateY(-2px);
}


.academy-program-link:hover i {

    transform:
        translateX(5px);
}


/* ==========================================================
   EMPTY STATE
========================================================== */

.academy-programs-empty {

    position: relative;
    z-index: 2;

    max-width: 650px;

    margin: 30px auto;

    padding: 55px 30px;

    border-radius: 28px;

    background:
        rgba(255,255,255,.55);

    border:
        1px solid rgba(255,255,255,.8);

    box-shadow:
        0 20px 50px rgba(40,90,120,.08);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}


.academy-programs-empty-icon {

    width: 70px;
    height: 70px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 20px;

    border-radius: 20px;

    color: #28769d;

    background:
        rgba(221,242,250,.75);

    font-size: 27px;
}


.academy-programs-empty h3 {

    margin-bottom: 10px;

    color: #28526d;

    font-size: 20px;
}


.academy-programs-empty p {

    margin: 0;

    color: #7890a0;

    font-size: 13px;
}


/* ==========================================================
   FLOATING BACKGROUND ANIMATION
========================================================== */

@keyframes academyFloat {

    0%,
    100% {
        transform: translateY(0) scale(1);
    }

    50% {
        transform: translateY(-18px) scale(1.04);
    }
}


/* ==========================================================
   RESPONSIVE
========================================================== */

@media (max-width: 991px) {

    .academy-programs-page {
        padding: 80px 0 90px;
    }

    .academy-programs-title {
        font-size: 35px;
    }

    .academy-program-card {
        min-height: 310px;
    }
}


@media (max-width: 767px) {

    .academy-programs-page {
        padding: 60px 12px 75px;
    }

    .academy-programs-intro {
        margin-bottom: 40px;
    }

    .academy-programs-title {
        font-size: 30px;
    }

    .academy-programs-description {
        font-size: 14px;
    }

    .academy-program-card {
        min-height: auto;
        padding: 27px;
        border-radius: 24px;
    }

    .academy-program-title {
        font-size: 22px;
    }
}


@media (max-width: 480px) {

    .academy-programs-title {
        font-size: 26px;
    }

    .academy-program-icon {
        width: 58px;
        height: 58px;
        font-size: 22px;
    }
}











/* ==========================================================
   ACADEMY PROGRAMS / DEPARTMENTS
========================================================== */

.academy-programs-section {
    position: relative;
    padding: 90px 0 110px;
    overflow: hidden;

    background:
        radial-gradient(
            circle at 12% 20%,
            rgba(255, 220, 150, .22),
            transparent 28%
        ),
        radial-gradient(
            circle at 88% 25%,
            rgba(205, 185, 255, .24),
            transparent 30%
        ),
        radial-gradient(
            circle at 50% 95%,
            rgba(255, 190, 160, .18),
            transparent 32%
        ),
        #f7f8fc;
}


/* ==========================================================
   DECORATIVE BACKGROUND CIRCLES
========================================================== */

.academy-programs-section::before,
.academy-programs-section::after {
    content: "";
    position: absolute;

    border-radius: 50%;

    pointer-events: none;

    filter: blur(8px);

    opacity: .65;

    animation:
        academyProgramFloat 8s ease-in-out infinite alternate;
}

.academy-programs-section::before {
    width: 260px;
    height: 260px;

    top: 40px;
    left: -100px;

    background:
        rgba(214, 195, 255, .28);
}

.academy-programs-section::after {
    width: 220px;
    height: 220px;

    right: -70px;
    bottom: 30px;

    background:
        rgba(255, 211, 160, .28);

    animation-delay: -3s;
}


@keyframes academyProgramFloat {

    from {
        transform: translate3d(0, 0, 0);
    }

    to {
        transform: translate3d(18px, -15px, 0);
    }

}


/* ==========================================================
   PROGRAM CARD
========================================================== */

.academy-program-card {

    position: relative;

    height: 100%;

    overflow: hidden;

    padding: 34px;

    border-radius: 28px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.68),
            rgba(255,255,255,.38)
        );

    border:
        1px solid rgba(255,255,255,.75);

    box-shadow:
        0 18px 45px rgba(70, 65, 100, .08),
        inset 0 1px 0 rgba(255,255,255,.85);

    backdrop-filter: blur(22px);
    -webkit-backdrop-filter: blur(22px);

    transition:
        transform .45s cubic-bezier(.2,.8,.2,1),
        box-shadow .45s ease,
        border-color .45s ease;

}


/* ==========================================================
   CARD GLOW
========================================================== */

.academy-program-card::before {

    content: "";

    position: absolute;

    width: 190px;
    height: 190px;

    top: -100px;
    right: -80px;

    border-radius: 50%;

    background:
        rgba(210,190,255,.30);

    filter: blur(25px);

    transition:
        transform .5s ease,
        opacity .5s ease;

    pointer-events: none;
}


.academy-program-card::after {

    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    left: -65px;
    bottom: -65px;

    border-radius: 50%;

    background:
        rgba(255,210,155,.22);

    filter: blur(20px);

    transition:
        transform .5s ease;

    pointer-events: none;
}


/* ==========================================================
   HOVER
========================================================== */

.academy-program-card:hover {

    transform:
        translateY(-10px);

    border-color:
        rgba(255,255,255,.95);

    box-shadow:
        0 30px 70px rgba(70, 65, 100, .14),
        0 0 45px rgba(205,185,255,.12),
        inset 0 1px 0 rgba(255,255,255,.95);
}


.academy-program-card:hover::before {

    transform:
        scale(1.35)
        translate(-15px, 10px);

    opacity: .8;
}


.academy-program-card:hover::after {

    transform:
        scale(1.25)
        translate(15px, -10px);
}


/* ==========================================================
   ICON
========================================================== */

.academy-program-icon {

    position: relative;

    z-index: 2;

    width: 68px;
    height: 68px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin-bottom: 24px;

    border-radius: 21px;

    color: #735d9e;

    background:
        linear-gradient(
            135deg,
            rgba(235,225,255,.72),
            rgba(255,245,225,.60)
        );

    border:
        1px solid rgba(255,255,255,.82);

    box-shadow:
        0 12px 28px rgba(110,90,145,.10),
        inset 0 1px 0 rgba(255,255,255,.95);

    font-size: 27px;

    transition:
        transform .4s ease,
        box-shadow .4s ease;
}


.academy-program-card:hover
.academy-program-icon {

    transform:
        translateY(-4px)
        rotate(-4deg)
        scale(1.06);

    box-shadow:
        0 17px 32px rgba(110,90,145,.15);
}


/* ==========================================================
   TITLE
========================================================== */

.academy-program-card h3 {

    position: relative;

    z-index: 2;

    margin-bottom: 10px;

    color: #3f4050;

    font-size: 21px;

    font-weight: 700;

    letter-spacing: -.2px;

    transition:
        color .3s ease;
}


.academy-program-card:hover h3 {

    color: #5d4d78;
}


/* ==========================================================
   DESCRIPTION
========================================================== */

.academy-program-card p {

    position: relative;

    z-index: 2;

    margin-bottom: 22px;

    color: #777887;

    font-size: 14px;

    line-height: 1.9;
}


/* ==========================================================
   BUTTON
========================================================== */

.academy-program-card .btn {

    position: relative;

    z-index: 3;

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 10px 18px;

    border-radius: 13px;

    color: #675681;

    background:
        rgba(255,255,255,.55);

    border:
        1px solid rgba(255,255,255,.75);

    box-shadow:
        0 8px 20px rgba(70,65,100,.06);

    transition:
        all .35s ease;
}


.academy-program-card .btn:hover {

    color: #55436d;

    background:
        rgba(255,255,255,.85);

    transform:
        translateY(-3px);

    box-shadow:
        0 13px 28px rgba(70,65,100,.12);
}


/* ==========================================================
   CARD NUMBER / DECORATION
========================================================== */

.academy-program-number {

    position: absolute;

    z-index: 1;

    right: 25px;
    top: 20px;

    color: rgba(120,100,150,.07);

    font-size: 75px;

    font-weight: 800;

    line-height: 1;

    pointer-events: none;

    transition:
        transform .45s ease,
        color .45s ease;
}


.academy-program-card:hover
.academy-program-number {

    transform:
        translateY(-5px)
        scale(1.05);

    color:
        rgba(120,100,150,.11);
}


/* ==========================================================
   RESPONSIVE
========================================================== */

@media (max-width: 767px) {

    .academy-programs-section {

        padding: 60px 15px 80px;
    }

    .academy-program-card {

        padding: 27px;

        border-radius: 24px;
    }

    .academy-program-icon {

        width: 60px;
        height: 60px;

        font-size: 24px;
    }

    .academy-program-card h3 {

        font-size: 19px;
    }

}
</style>
<section class="academy-programs-page ">

    <div class="container text-center justify-content-center">

        {{-- =====================================================
             PAGE INTRO
        ====================================================== --}}

        <div class="academy-programs-intro text-center">

            <span class="academy-programs-label">
                <i class="bi bi-mortarboard-fill"></i>
                {{ __('Academic Departments') }}
            </span>

            <h1 class="academy-programs-title">
                {{ __('Explore Our Departments') }}
            </h1>

            <p class="academy-programs-description">
                {{ __('Explore our academic departments and discover opportunities for professional and academic development.') }}
            </p>

        </div>


        {{-- =====================================================
             DEPARTMENTS
        ====================================================== --}}

        @if($departments->count())

            <div class="row g-4 academy-programs-grid justify-content-center">

                @foreach($departments as $department)

                    @php

                        $translation = $department->translations->first();

                        $title = $translation?->title
                            ?? __('Untitled Department');

                        $shortDescription =
                            $translation?->short_description ?? '';

                        $icon = $department->icon
                            ?: 'bi bi-mortarboard-fill';

                    @endphp


                    <div class="col-lg-4 col-md-6">

                        <article class="academy-program-card">


                            {{-- =================================================
                                 ICON
                            ================================================== --}}

                            <div class="academy-program-icon">

                                <i class="{{ $icon }}"></i>

                            </div>


                            {{-- =================================================
                                 CONTENT
                            ================================================== --}}

                            <div class="academy-program-content">

                                <span class="academy-program-overline">
                                    {{ __('Department of') }}
                                </span>


                                <h2 class="academy-program-title">

                                    {{ $title }}

                                </h2>


                                @if($shortDescription)

                                    <p class="academy-program-description">

                                        {{ $shortDescription }}

                                    </p>

                                @endif


                                {{-- =================================================
                                     REAL LINK
                                ================================================== --}}

                         

                                <a
                                   href="{{ route('academy.department.show', $department->id) }}"
                                    class="academy-program-link"
                                >

                                    {{ __('Explore Department') }}

                                    <i class="bi bi-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    </div>

                @endforeach

            </div>

        @else

            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="academy-programs-empty text-center">

                <div class="academy-programs-empty-icon">

                    <i class="bi bi-mortarboard"></i>

                </div>

                <h3>
                    {{ __('No Academic Departments Available') }}
                </h3>

                <p>
                    {{ __('Academic departments will appear here once they are available.') }}
                </p>

            </div>

        @endif

    </div>

</section>

@endsection
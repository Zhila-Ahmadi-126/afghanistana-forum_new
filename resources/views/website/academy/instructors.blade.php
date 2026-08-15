@extends('layouts.website')

@section('content')
<style>
    /* =========================================================
   ACADEMY INSTRUCTORS — PREMIUM INTRO
========================================================= */

.academy-instructors-page {
    position: relative;
    overflow: hidden;
}


/* ---------------------------------------------------------
   INTRO GLASS CONTAINER
--------------------------------------------------------- */

.academy-instructors-page .container > .text-center {
    position: relative;

    max-width: 900px !important;

    margin: 0 auto 60px !important;

    padding: 42px 45px 38px;

    background:
        linear-gradient(
            135deg,
            rgba(224, 241, 253, 0.78),
            rgba(238, 245, 250, 0.68)
        );

    border: 1px solid rgba(74, 145, 194, 0.30);

    border-radius: 30px;

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    box-shadow:
        0 18px 45px rgba(34, 100, 145, 0.12),
        0 0 35px rgba(75, 155, 215, 0.08);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease,
        border-color 0.45s ease;

    overflow: hidden;
}


/* Decorative glow */

.academy-instructors-page .container > .text-center::before {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    top: -90px;
    right: -60px;

    border-radius: 50%;

    background: rgba(75, 157, 222, 0.22);

    filter: blur(25px);

    animation: academyFacultyFloat 5s ease-in-out infinite;

    pointer-events: none;
}


.academy-instructors-page .container > .text-center::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    bottom: -80px;
    left: -50px;

    border-radius: 50%;

    background: rgba(117, 94, 205, 0.14);

    filter: blur(28px);

    animation: academyFacultyFloatReverse 6s ease-in-out infinite;

    pointer-events: none;
}


.academy-instructors-page .container > .text-center:hover {
    transform: translateY(-5px);

    border-color: rgba(61, 135, 190, 0.48);

    box-shadow:
        0 28px 60px rgba(35, 102, 150, 0.18),
        0 0 40px rgba(66, 148, 210, 0.13);
}


/* ---------------------------------------------------------
   FACULTY LABEL
--------------------------------------------------------- */

.academy-instructors-page .container > .text-center
.text-primary {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 8px 17px;

    color: #176fa9 !important;

    background: rgba(220, 239, 252, 0.85);

    border: 1px solid rgba(55, 132, 188, 0.24);

    border-radius: 50px;

    font-size: 12px;
    font-weight: 800;

    letter-spacing: 1.4px;
    text-transform: uppercase;

    box-shadow:
        0 8px 20px rgba(45, 117, 165, 0.10);
}


.academy-instructors-page .container > .text-center
.text-primary i {
    font-size: 16px;

    animation: academyIconFloat 2.8s ease-in-out infinite;
}


/* ---------------------------------------------------------
   TITLE
--------------------------------------------------------- */

.academy-instructors-page .container > .text-center h1 {
    position: relative;
    z-index: 2;

    margin-top: 17px !important;

    color: #102f4e;

    font-size: clamp(34px, 4vw, 50px);

    font-weight: 800;

    letter-spacing: -1px;
}


/* ---------------------------------------------------------
   DESCRIPTION
--------------------------------------------------------- */

.academy-instructors-page .container > .text-center p {
    position: relative;
    z-index: 2;

    max-width: 700px;

    margin: 0 auto !important;

    color: #5e7387 !important;

    font-size: 15px;

    line-height: 1.9;
}


/* ---------------------------------------------------------
   EXTRA FACULTY POINTS
--------------------------------------------------------- */

.academy-instructors-page
.academy-faculty-points {
    position: relative;
    z-index: 2;

    display: flex;

    align-items: center;
    justify-content: center;

    flex-wrap: wrap;

    gap: 12px;

    margin-top: 24px;
}


.academy-faculty-point {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 8px 13px;

    color: #47677f;

    font-size: 12px;
    font-weight: 600;

    background: rgba(255, 255, 255, 0.58);

    border: 1px solid rgba(72, 139, 185, 0.18);

    border-radius: 50px;

    box-shadow:
        0 7px 18px rgba(45, 105, 145, 0.07);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        background 0.3s ease;
}


.academy-faculty-point i {
    color: #3288bd;

    font-size: 14px;
}


.academy-faculty-point:hover {
    transform: translateY(-4px);

    background: rgba(235, 247, 255, 0.90);

    box-shadow:
        0 12px 25px rgba(42, 120, 175, 0.14);
}


/* =========================================================
   TEAM CARDS — SUBTLE PREMIUM FRAME
========================================================= */

.academy-instructors-page .team-item {
    position: relative;

    padding: 7px;

    background:
        linear-gradient(
            145deg,
            rgba(255, 255, 255, 0.88),
            rgba(229, 241, 249, 0.72)
        );

    border: 1px solid rgba(70, 139, 185, 0.24);

    border-radius: 22px;

    box-shadow:
        0 12px 30px rgba(32, 91, 130, 0.10);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-color 0.4s ease;
}


.academy-instructors-page .team-item:hover {
    transform: translateY(-8px);

    border-color: rgba(57, 133, 190, 0.42);

    box-shadow:
        0 24px 48px rgba(30, 105, 155, 0.17),
        0 0 25px rgba(67, 148, 207, 0.09);
}


/* Image rounding */

.academy-instructors-page .team-item
.position-relative {
    border-radius: 17px;

    overflow: hidden;
}


/* Slight image effect */

.academy-instructors-page .team-item img {
    transition:
        transform 0.55s ease,
        filter 0.55s ease;
}


.academy-instructors-page .team-item:hover img {
    transform: scale(1.045);

    filter: saturate(1.05);
}


/* ---------------------------------------------------------
   TEAM TEXT
--------------------------------------------------------- */

.academy-instructors-page .team-text {
    border-radius: 0 0 17px 17px;

    overflow: hidden;
}


/* ---------------------------------------------------------
   ANIMATIONS
--------------------------------------------------------- */

@keyframes academyFacultyFloat {

    0%,
    100% {
        transform: translate(0, 0);
    }

    50% {
        transform: translate(-15px, 12px);
    }
}


@keyframes academyFacultyFloatReverse {

    0%,
    100% {
        transform: translate(0, 0);
    }

    50% {
        transform: translate(15px, -10px);
    }
}


@keyframes academyIconFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-4px);
    }
}


/* ---------------------------------------------------------
   MOBILE
--------------------------------------------------------- */

@media (max-width: 767px) {

    .academy-instructors-page .container > .text-center {
        padding: 32px 22px;

        border-radius: 24px;
    }

    .academy-instructors-page .container > .text-center h1 {
        font-size: 34px;
    }

    .academy-instructors-page
    .academy-faculty-points {
        gap: 8px;
    }

}
</style>
<section class="academy-instructors-page py-5">

    <div class="container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="text-center mx-auto mb-5" style="max-width: 750px;">

            <span class="text-primary fw-bold text-uppercase">
                <i class="bi bi-people-fill me-2"></i>
                {{ __('Academy Faculty') }}
            </span>

            <h1 class="display-5 fw-bold mt-2 mb-3">
                {{ __('Our Instructors') }}
            </h1>

            <p class="text-muted mb-0">
                {{ __('Meet the experienced instructors and legal professionals who contribute to our academic programs.') }}
            </p>
            <div class="academy-faculty-points">

                <span class="academy-faculty-point">
                    <i class="bi bi-patch-check-fill"></i>
                    {{ __('Experienced Professionals') }}
                </span>

                <span class="academy-faculty-point">
                    <i class="bi bi-mortarboard-fill"></i>
                    {{ __('Academic Expertise') }}
                </span>

                <span class="academy-faculty-point">
                    <i class="bi bi-briefcase-fill"></i>
                    {{ __('Professional Experience') }}
                </span>

                <span class="academy-faculty-point">
                    <i class="bi bi-award-fill"></i>
                    {{ __('Quality Education') }}
                </span>

            </div>

        </div>


        {{-- =====================================================
             INSTRUCTORS
        ====================================================== --}}

        @if($teachers->count())

            <div class="row g-4 justify-content-center">

                @foreach($teachers as $teacher)

                    @php

                        $fullName = trim(
                            $teacher->first_name . ' ' .
                            $teacher->last_name
                        );

                        $departmentTitle =
                            $teacher->department?->translations->first()?->title
                            ?? '';

                    @endphp


                    <div class="col-lg-3 col-md-6 wow fadeInUp justify-content-centers"
                         data-wow-delay="{{ ($loop->index + 1) * 0.1 }}s">


                        <div class="team-item justify-content-center">


                            {{-- =================================================
                                 IMAGE
                            ================================================== --}}

                            <div class="position-relative overflow-hidden">

                                @if($teacher->profile_image)

                                    <img
                                        class="img-fluid"
                                        src="{{ asset('storage/' . $teacher->profile_image) }}"
                                        alt="{{ $fullName }}"style="width: 100%; height: 300px;"
                                    >

                                @else

                                    <div
                                        class="img-fluid d-flex align-items-center justify-content-center bg-light"
                                        style="height: 300px;"
                                    >

                                        <i
                                            class="bi bi-person-fill text-primary"
                                            style="font-size: 90px;"
                                        ></i>

                                    </div>

                                @endif

                            </div>


                            {{-- =================================================
                                 TEAM TEXT
                            ================================================== --}}

                            <div class="team-text">


                                {{-- INFO --}}

                                <div class="bg-light">

                                    <h5 class="fw-bold mb-1">

                                        {{ $fullName }}

                                    </h5>


                                    @if($teacher->position)

                                        <small>

                                            {{ $teacher->position }}

                                        </small>

                                    @endif


                                    @if($departmentTitle)

                                        <div class="mt-1">

                                            <small class="text-primary">

                                                {{ $departmentTitle }}

                                            </small>

                                        </div>

                                    @endif

                                </div>


                                {{-- =================================================
                                     SOCIAL + PROFILE
                                ================================================== --}}

                                <div class="bg-primary">


                                    {{-- FACEBOOK --}}

                                    @if($teacher->facebook_url)

                                        <a
                                            class="btn btn-square mx-1"
                                            href="{{ $teacher->facebook_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            aria-label="Facebook"
                                        >

                                            <i class="fab fa-facebook-f"></i>

                                        </a>

                                    @endif


                                    {{-- LINKEDIN --}}

                                    @if($teacher->linkedin_url)

                                        <a
                                            class="btn btn-square mx-1"
                                            href="{{ $teacher->linkedin_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            aria-label="LinkedIn"
                                        >

                                            <i class="fab fa-linkedin-in"></i>

                                        </a>

                                    @endif


                                    {{-- YOUTUBE --}}

                                    @if($teacher->youtube_url)

                                        <a
                                            class="btn btn-square mx-1"
                                            href="{{ $teacher->youtube_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            aria-label="YouTube"
                                        >

                                            <i class="fab fa-youtube"></i>

                                        </a>

                                    @endif


                                    {{-- WEBSITE --}}

                                    @if($teacher->website_url)

                                        <a
                                            class="btn btn-square mx-1"
                                            href="{{ $teacher->website_url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            aria-label="Website"
                                        >

                                            <i class="fas fa-globe"></i>

                                        </a>

                                    @endif


                                    {{-- VIEW PROFILE --}}

                                    <a
                                        class="btn btn-square mx-1"
                                        href="{{ route('academy.instructor.show', $teacher->id) }}"
                                        aria-label="{{ __('View Profile') }}"
                                        title="{{ __('View Profile') }}"
                                    >

                                        <i class="fas fa-user"></i>

                                    </a>


                                </div>


                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


        @else


            {{-- =====================================================
                 EMPTY STATE
            ====================================================== --}}

            <div class="text-center py-5">

                <i
                    class="bi bi-people text-primary"
                    style="font-size: 60px;"
                ></i>

                <h3 class="fw-bold mt-3">

                    {{ __('No Instructors Available') }}

                </h3>

                <p class="text-muted">

                    {{ __('There are currently no active instructors available.') }}

                </p>

            </div>

        @endif

    </div>

</section>

@endsection
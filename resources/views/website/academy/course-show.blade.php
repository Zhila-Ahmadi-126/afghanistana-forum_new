@extends('layouts.website')
  <style>
    /* =========================================================
   ACADEMY — COURSE / CLASS DETAILS
   Glassmorphism — Dark Blue / Soft Glow
========================================================= */

.academy-course-page {
    position: relative;
    padding: 70px 0 100px;
    overflow: hidden;
    background: #ffffff;
    isolation: isolate;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.academy-course-back {
    margin-bottom: 28px;
    position: relative;
    z-index: 5;
}

.academy-course-back a {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 10px 18px;

    color: #17345f;
    text-decoration: none;

    font-size: 14px;
    font-weight: 600;

    background: rgba(255, 255, 255, 0.72);

    border: 1px solid rgba(27, 72, 125, 0.16);
    border-radius: 14px;

    box-shadow:
        0 8px 25px rgba(30, 76, 130, 0.08);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        color 0.35s ease;
}

.academy-course-back a:hover {
    color: #245fa5;

    transform: translateX(-4px);

    box-shadow:
        0 12px 30px rgba(49, 103, 176, 0.18);
}

.academy-course-back i {
    transition: transform 0.35s ease;
}

.academy-course-back a:hover i {
    transform: translateX(-4px);
}


/* =========================================================
   HERO
========================================================= */

.academy-course-hero {
    position: relative;
    overflow: hidden;

    min-height: 270px;

    padding: 48px;

    border-radius: 30px;

    background:
        linear-gradient(
            135deg,
            rgba(17, 19, 124, 0.597),
            rgba(128, 185, 246, 0.88)
        );

    border: 1px solid rgba(255, 255, 255, 0.30);

    box-shadow:
        0 25px 60px rgba(40, 38, 172, 0.22),
        inset 0 1px 0 rgba(235, 199, 128, 0.25);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    isolation: isolate;
}


/* glowing circles */

.academy-course-glow {
    position: absolute;

    border-radius: 50%;

    filter: blur(2px);

    opacity: 0.55;

    pointer-events: none;

    z-index: -1;
}

.academy-course-glow-one {
    width: 230px;
    height: 230px;

    top: -100px;
    right: 8%;

    background: rgba(92, 136, 255, 0.38);

    box-shadow:
        0 0 90px rgba(77, 126, 255, 0.40);
}

.academy-course-glow-two {
    width: 180px;
    height: 180px;

    bottom: -90px;
    left: 12%;

    background: rgba(157, 92, 255, 0.30);

    box-shadow:
        0 0 80px rgba(157, 92, 255, 0.35);
}


/* hero content */

.academy-course-hero-content {
    position: relative;

    display: flex;
    align-items: center;

    gap: 28px;

    z-index: 2;
}


/* hero icon */

.academy-course-icon {
    flex-shrink: 0;

    width: 92px;
    height: 92px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 25px;

    background:
        linear-gradient(
            145deg,
            rgba(255, 255, 255, 0.22),
            rgba(255, 255, 255, 0.07)
        );

    border: 1px solid rgba(255, 255, 255, 0.30);

    box-shadow:
        0 15px 35px rgba(0, 0, 0, 0.18),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease;
}

.academy-course-hero:hover .academy-course-icon {
    transform: translateY(-6px) rotate(-4deg);

    box-shadow:
        0 20px 40px rgba(78, 133, 255, 0.28);
}

.academy-course-icon i {
    font-size: 40px;

    color: #cfe3ff;

    filter:
        drop-shadow(0 0 10px rgba(120, 170, 255, 0.65));
}


/* heading */

.academy-course-heading {
    min-width: 0;
}

.academy-course-overline {
    display: inline-block;

    margin-bottom: 8px;

    color: #bcd6f5;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.academy-course-heading h1 {
    margin: 0;

    color: #ffffff;

    font-size: clamp(30px, 4vw, 48px);

    font-weight: 700;

    line-height: 1.15;

    text-shadow:
        0 4px 20px rgba(0, 0, 0, 0.18);
}

.academy-course-heading p {
    max-width: 760px;

    margin: 15px 0 0;

    color: rgba(255, 255, 255, 0.78);

    font-size: 15px;

    line-height: 1.9;
}


/* department breadcrumb */

.academy-course-breadcrumb {
    display: inline-flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 7px;

    margin-top: 18px;

    color: rgba(255, 255, 255, 0.66);

    font-size: 13px;
}

.academy-course-breadcrumb i {
    color: #a9cbff;
}

.academy-course-breadcrumb strong {
    color: #ffffff;
}


/* class code */

.academy-course-code {
    position: absolute;

    right: 35px;
    bottom: 30px;

    display: flex;
    flex-direction: column;
    align-items: flex-end;

    z-index: 3;
}

.academy-course-code span {
    color: rgba(255, 255, 255, 0.55);

    font-size: 11px;

    text-transform: uppercase;

    letter-spacing: 1px;
}

.academy-course-code strong {
    margin-top: 3px;

    color: #ffffff;

    font-size: 15px;

    letter-spacing: 1px;
}


/* =========================================================
   MAIN CONTENT
========================================================= */

.academy-course-main {
    margin-top: 35px;
}


/* =========================================================
   GLASS CONTENT CARDS
========================================================= */

.academy-course-content-card,
.academy-course-side-card {
    position: relative;

    overflow: hidden;

    margin-bottom: 25px;

    padding: 30px;

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(236, 244, 253, 0.82),
            rgba(255, 255, 255, 0.70)
        );

    border: 1px solid rgba(43, 91, 146, 0.16);

    box-shadow:
        0 15px 45px rgba(29, 74, 126, 0.11),
        inset 0 1px 0 rgba(255, 255, 255, 0.85);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-color 0.4s ease;
}

.academy-course-content-card::before,
.academy-course-side-card::before {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: -80px;
    top: -80px;

    border-radius: 50%;

    background: rgba(92, 145, 255, 0.12);

    filter: blur(10px);

    pointer-events: none;
}

.academy-course-content-card:hover,
.academy-course-side-card:hover {
    transform: translateY(-5px);

    border-color: rgba(72, 125, 196, 0.28);

    box-shadow:
        0 22px 55px rgba(36, 92, 155, 0.17),
        0 0 35px rgba(94, 145, 255, 0.07),
        inset 0 1px 0 rgba(255, 255, 255, 0.95);
}


/* =========================================================
   SECTION TITLE
========================================================= */

.academy-course-section-title {
    display: flex;
    align-items: center;

    gap: 15px;

    margin-bottom: 25px;
}

.academy-course-section-icon {
    flex-shrink: 0;

    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background:
        linear-gradient(
            145deg,
            rgba(53, 104, 169, 0.16),
            rgba(105, 150, 219, 0.08)
        );

    border: 1px solid rgba(57, 105, 167, 0.16);

    box-shadow:
        0 8px 20px rgba(42, 91, 151, 0.10);

    transition: transform 0.35s ease;
}

.academy-course-content-card:hover .academy-course-section-icon {
    transform: rotate(-6deg) scale(1.06);
}

.academy-course-section-icon i {
    color: #315f94;

    font-size: 21px;
}

.academy-course-section-title span {
    display: block;

    margin-bottom: 3px;

    color: #5d7da0;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 1.2px;

    text-transform: uppercase;
}

.academy-course-section-title h2 {
    margin: 0;

    color: #183a62;

    font-size: 23px;

    font-weight: 700;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.academy-course-description {
    color: #4b6078;

    font-size: 15px;

    line-height: 2;

    text-align: justify;
}

.academy-course-muted {
    margin: 0;

    color: #8192a5;

    font-size: 14px;

    line-height: 1.8;
}


/* =========================================================
   SCHEDULE
========================================================= */

.academy-schedule-list {
    display: flex;

    flex-direction: column;

    gap: 12px;
}

.academy-schedule-item {
    display: grid;

    grid-template-columns:
        1.1fr
        1fr
        0.9fr
        1.2fr;

    align-items: center;

    gap: 15px;

    padding: 17px 18px;

    border-radius: 17px;

    background:
        rgba(226, 237, 249, 0.58);

    border: 1px solid rgba(67, 112, 164, 0.12);

    transition:
        transform 0.3s ease,
        background 0.3s ease,
        box-shadow 0.3s ease;
}

.academy-schedule-item:hover {
    transform: translateX(5px);

    background:
        rgba(214, 230, 248, 0.78);

    box-shadow:
        0 10px 25px rgba(52, 103, 165, 0.10);
}

.academy-schedule-item i {
    margin-right: 6px;

    color: #4c79ad;
}

.academy-schedule-day,
.academy-schedule-time,
.academy-schedule-room {
    color: #46617c;

    font-size: 13px;
}

.academy-schedule-day strong {
    color: #21486f;
}

.academy-schedule-title {
    color: #6a7f95;

    font-size: 13px;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.academy-course-empty {
    padding: 35px 20px;

    text-align: center;

    border-radius: 18px;

    background: rgba(225, 237, 249, 0.48);

    border: 1px dashed rgba(68, 111, 160, 0.20);
}

.academy-course-empty i {
    display: block;

    margin-bottom: 12px;

    color: #7596bb;

    font-size: 34px;
}

.academy-course-empty p {
    margin: 0;

    color: #73879b;

    font-size: 14px;
}


/* =========================================================
   SIDEBAR CARDS
========================================================= */

.academy-course-side-card {
    padding: 27px;
}

.academy-course-side-icon {
    width: 46px;
    height: 46px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 13px;

    border-radius: 14px;

    background:
        rgba(48, 95, 151, 0.11);

    border: 1px solid rgba(48, 95, 151, 0.14);
}

.academy-course-side-icon i {
    color: #3f6d9f;

    font-size: 21px;
}

.academy-course-side-label {
    display: block;

    margin-bottom: 18px;

    color: #66819f;

    font-size: 11px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 1.2px;
}


/* =========================================================
   TEACHER
========================================================= */

.academy-course-teacher {
    display: flex;
    align-items: center;

    gap: 13px;

    margin-bottom: 20px;
}

.academy-course-teacher img,
.academy-course-teacher-placeholder {
    width: 62px;
    height: 62px;

    flex-shrink: 0;

    border-radius: 18px;

    object-fit: cover;

    border: 2px solid rgba(255, 255, 255, 0.9);

    box-shadow:
        0 8px 20px rgba(40, 86, 140, 0.13);
}

.academy-course-teacher-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;

    background:
        linear-gradient(
            145deg,
            #dce9f7,
            #eef5fc
        );
}

.academy-course-teacher-placeholder i {
    color: #5a7da5;

    font-size: 26px;
}

.academy-course-teacher h3 {
    margin: 0 0 4px;

    color: #1c426b;

    font-size: 17px;
}

.academy-course-teacher span {
    color: #7a8fa5;

    font-size: 12px;
}


/* =========================================================
   LINKS
========================================================= */

.academy-course-side-link {
    display: flex;
    align-items: center;
    justify-content: space-between;

    padding-top: 16px;

    border-top: 1px solid rgba(56, 102, 157, 0.10);

    color: #32669e;

    font-size: 13px;

    font-weight: 600;

    text-decoration: none;

    transition: color 0.3s ease;
}

.academy-course-side-link:hover {
    color: #214c7d;
}

.academy-course-side-link i {
    transition: transform 0.3s ease;
}

.academy-course-side-link:hover i {
    transform: translateX(5px);
}


/* =========================================================
   INFORMATION
========================================================= */

.academy-course-info-list {
    display: flex;

    flex-direction: column;

    gap: 14px;
}

.academy-course-info-list > div {
    display: grid;

    grid-template-columns: 25px 1fr auto;

    align-items: center;

    gap: 8px;

    padding-bottom: 13px;

    border-bottom: 1px solid rgba(57, 103, 157, 0.09);
}

.academy-course-info-list > div:last-child {
    padding-bottom: 0;

    border-bottom: none;
}

.academy-course-info-list i {
    color: #547fae;
}

.academy-course-info-list span {
    color: #7a8ea3;

    font-size: 12px;
}

.academy-course-info-list strong {
    color: #284f78;

    font-size: 12px;

    text-align: right;
}


/* =========================================================
   APPLY CARD
========================================================= */

.academy-course-apply-card {
    position: relative;

    overflow: hidden;

    padding: 30px;

    border-radius: 25px;

       background:
        linear-gradient(
            135deg,
            rgba(17, 19, 124, 0.597),
            rgba(128, 185, 246, 0.88)
        );

    border: 1px solid rgba(255, 255, 255, 0.30);

    box-shadow:
        0 25px 60px rgba(40, 38, 172, 0.22),
        inset 0 1px 0 rgba(235, 199, 128, 0.25);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    text-align: center;
}

.academy-course-apply-card::before {
    content: "";

    position: absolute;

    width: 140px;
    height: 140px;

    top: -65px;
    right: -55px;

    border-radius: 50%;

    background: rgba(111, 156, 255, 0.22);

    filter: blur(4px);
}

.academy-course-apply-icon {
    position: relative;

    width: 58px;
    height: 58px;

    margin: 0 auto 17px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 18px;

    background: rgba(255, 255, 255, 0.13);

    border: 1px solid rgba(255, 255, 255, 0.20);
}

.academy-course-apply-icon i {
    color: #d7e8ff;

    font-size: 26px;
}

.academy-course-apply-card h3 {
    position: relative;

    margin: 0 0 10px;

    color: #ffffff;

    font-size: 20px;
}

.academy-course-apply-card p {
    position: relative;

    margin: 0 0 22px;

    color: rgba(255, 255, 255, 0.70);

    font-size: 13px;

    line-height: 1.8;
}

.academy-course-apply-button {
    position: relative;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    gap: 9px;

    width: 100%;

    padding: 12px 20px;

    border-radius: 14px;

    background: rgba(255, 255, 255, 0.92);

    color: #234e7d;

    font-size: 13px;

    font-weight: 700;

    text-decoration: none;

    box-shadow:
        0 10px 25px rgba(0, 0, 0, 0.12);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        background 0.3s ease;
}

.academy-course-apply-button:hover {
    transform: translateY(-3px);

    background: #ffffff;

    color: #193f69;

    box-shadow:
        0 15px 30px rgba(0, 0, 0, 0.18);
}

.academy-course-apply-button i {
    transition: transform 0.3s ease;
}

.academy-course-apply-button:hover i {
    transform: translateX(5px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .academy-course-hero {
        padding: 38px;
    }

    .academy-course-code {
        position: static;

        align-items: flex-start;

        margin-top: 25px;

        padding-top: 18px;

        border-top: 1px solid rgba(255, 255, 255, 0.12);
    }

    .academy-schedule-item {
        grid-template-columns: 1fr 1fr;
    }
}


@media (max-width: 767px) {

    .academy-course-page {
        padding: 45px 0 70px;
    }

    .academy-course-hero {
        padding: 30px 24px;

        border-radius: 24px;
    }

    .academy-course-hero-content {
        flex-direction: column;

        align-items: flex-start;

        gap: 20px;
    }

    .academy-course-icon {
        width: 70px;
        height: 70px;

        border-radius: 20px;
    }

    .academy-course-icon i {
        font-size: 30px;
    }

    .academy-course-heading h1 {
        font-size: 30px;
    }

    .academy-course-content-card,
    .academy-course-side-card {
        padding: 23px;

        border-radius: 21px;
    }

    .academy-schedule-item {
        grid-template-columns: 1fr;

        gap: 9px;
    }

    .academy-course-section-title h2 {
        font-size: 20px;
    }
}


@media (max-width: 480px) {

    .academy-course-hero {
        padding: 25px 19px;
    }

    .academy-course-heading h1 {
        font-size: 26px;
    }

    .academy-course-heading p {
        font-size: 14px;
    }

    .academy-course-content-card,
    .academy-course-side-card,
    .academy-course-apply-card {
        padding: 20px;
    }
}
  </style>
@section('content')

@php

    $title = $translation?->title ?? __('Untitled Class');

    $shortDescription =
        $translation?->short_description ?? '';

    $description =
        $translation?->description ?? '';

    $departmentTitle =
        $departmentTranslation?->title
        ?? __('Academic Department');

    $teacherName = $class->teacher
        ? $class->teacher->first_name . ' ' . $class->teacher->last_name
        : __('Instructor Not Assigned');

@endphp


<section class="academy-course-page">

    <div class="container">


        {{-- =====================================================
             BACK
        ====================================================== --}}

        <div class="academy-course-back">

            <a
                href="{{ route('academy.department.show', $class->department_id) }}"
            >

                <i class="bi bi-arrow-left"></i>

                {{ __('Back to Department') }}

            </a>

        </div>



        {{-- =====================================================
             HERO
        ====================================================== --}}

        <div class="academy-course-hero">

            <div class="academy-course-glow academy-course-glow-one"></div>

            <div class="academy-course-glow academy-course-glow-two"></div>


            <div class="academy-course-hero-content">


                <div class="academy-course-icon">

                    <i class="bi bi-book-half"></i>

                </div>


                <div class="academy-course-heading">

                    <span class="academy-course-overline">

                        {{ __('Academic Class') }}

                    </span>


                    <h1>

                        {{ $title }}

                    </h1>


                    @if($shortDescription)

                        <p>

                            {{ $shortDescription }}

                        </p>

                    @endif


                    <div class="academy-course-breadcrumb">

                        <i class="bi bi-building"></i>

                        {{ __('Department of') }}

                        <strong>

                            {{ $departmentTitle }}

                        </strong>

                    </div>

                </div>


            </div>


            @if($class->class_code)

                <div class="academy-course-code">

                    <span>{{ __('Class Code') }}</span>

                    <strong>

                        {{ $class->class_code }}

                    </strong>

                </div>

            @endif

        </div>



        {{-- =====================================================
             MAIN CONTENT
        ====================================================== --}}

        <div class="row g-4 academy-course-main">


            {{-- =================================================
                 DESCRIPTION
            ================================================== --}}

            <div class="col-lg-8">

                <div class="academy-course-content-card">


                    <div class="academy-course-section-title">

                        <div class="academy-course-section-icon">

                            <i class="bi bi-journal-text"></i>

                        </div>

                        <div>

                            <span>

                                {{ __('Course Overview') }}

                            </span>

                            <h2>

                                {{ __('About This Class') }}

                            </h2>

                        </div>

                    </div>


                    @if($description)

                        <div class="academy-course-description">

                            {!! nl2br(e($description)) !!}

                        </div>

                    @else

                        <p class="academy-course-muted">

                            {{ __('No detailed description is currently available for this class.') }}

                        </p>

                    @endif


                </div>



                {{-- =================================================
                     SCHEDULE
                ================================================== --}}

                <div class="academy-course-content-card">


                    <div class="academy-course-section-title">

                        <div class="academy-course-section-icon">

                            <i class="bi bi-calendar-week"></i>

                        </div>

                        <div>

                            <span>

                                {{ __('Class Schedule') }}

                            </span>

                            <h2>

                                {{ __('Schedule & Timetable') }}

                            </h2>

                        </div>

                    </div>


                    @if($schedules->count())


                        <div class="academy-schedule-list">


                            @foreach($schedules as $schedule)

                                @php

                                    $scheduleTranslation =
                                        $schedule->translations->first();

                                @endphp


                                <div class="academy-schedule-item">


                                    <div class="academy-schedule-day">

                                        <i class="bi bi-calendar3"></i>

                                        <strong>

                                            {{ $schedule->day_of_week }}

                                        </strong>

                                    </div>


                                    <div class="academy-schedule-time">

                                        <i class="bi bi-clock"></i>

                                        <span>

                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                            -

                                            {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

                                        </span>

                                    </div>


                                    @if($schedule->room)

                                        <div class="academy-schedule-room">

                                            <i class="bi bi-geo-alt"></i>

                                            {{ $schedule->room }}

                                        </div>

                                    @endif


                                    @if($scheduleTranslation?->title)

                                        <div class="academy-schedule-title">

                                            {{ $scheduleTranslation->title }}

                                        </div>

                                    @endif


                                </div>

                            @endforeach


                        </div>


                    @else

                        <div class="academy-course-empty">

                            <i class="bi bi-calendar-x"></i>

                            <p>

                                {{ __('No schedule has been published for this class yet.') }}

                            </p>

                        </div>

                    @endif


                </div>

            </div>



            {{-- =================================================
                 SIDEBAR
            ================================================== --}}

            <div class="col-lg-4">


                {{-- INSTRUCTOR --}}

                <div class="academy-course-side-card">


                    <div class="academy-course-side-icon">

                        <i class="bi bi-person-badge"></i>

                    </div>


                    <span class="academy-course-side-label">

                        {{ __('Instructor') }}

                    </span>


                    @if($class->teacher)

                        <div class="academy-course-teacher">


                            @if($class->teacher->profile_image)

                                <img
                                    src="{{ asset('storage/' . $class->teacher->profile_image) }}"
                                    alt="{{ $teacherName }}"
                                >

                            @else

                                <div class="academy-course-teacher-placeholder">

                                    <i class="bi bi-person"></i>

                                </div>

                            @endif


                            <div>

                                <h3>

                                    {{ $teacherName }}

                                </h3>

                                <span>

                                    {{ $class->teacher->position ?: __('Instructor') }}

                                </span>

                            </div>

                        </div>


                        <a
                            href="{{ route('academy.instructor.show', $class->teacher->id) }}"
                            class="academy-course-side-link"
                        >

                            {{ __('View Instructor Profile') }}

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    @else

                        <p class="academy-course-muted">

                            {{ __('Instructor information is not available.') }}

                        </p>

                    @endif


                </div>



                {{-- CLASS INFORMATION --}}

                <div class="academy-course-side-card">


                    <div class="academy-course-side-icon">

                        <i class="bi bi-info-circle"></i>

                    </div>


                    <span class="academy-course-side-label">

                        {{ __('Class Information') }}

                    </span>


                    <div class="academy-course-info-list">


                        @if($class->capacity)

                            <div>

                                <i class="bi bi-people"></i>

                                <span>{{ __('Capacity') }}</span>

                                <strong>

                                    {{ $class->capacity }}

                                </strong>

                            </div>

                        @endif


                        @if($class->start_date)

                            <div>

                                <i class="bi bi-calendar-event"></i>

                                <span>{{ __('Start Date') }}</span>

                                <strong>

                                    {{ \Carbon\Carbon::parse($class->start_date)->format('M d, Y') }}

                                </strong>

                            </div>

                        @endif


                        @if($class->end_date)

                            <div>

                                <i class="bi bi-calendar-check"></i>

                                <span>{{ __('End Date') }}</span>

                                <strong>

                                    {{ \Carbon\Carbon::parse($class->end_date)->format('M d, Y') }}

                                </strong>

                            </div>

                        @endif


                        @if($class->room)

                            <div>

                                <i class="bi bi-door-open"></i>

                                <span>{{ __('Room') }}</span>

                                <strong>

                                    {{ $class->room }}

                                </strong>

                            </div>

                        @endif


                    </div>

                </div>



                {{-- APPLY --}}

                <div class="academy-course-apply-card">


                    <div class="academy-course-apply-icon">

                        <i class="bi bi-mortarboard-fill"></i>

                    </div>


                    <h3>

                        {{ __('Interested in This Class?') }}

                    </h3>


                    <p>

                        {{ __('Take the next step toward your academic journey.') }}

                    </p>


                    <a
                        href="{{ route('academy.apply') }}"
                        class="academy-course-apply-button"
                    >

                        {{ __('Apply Now') }}

                        <i class="bi bi-arrow-right"></i>

                    </a>

                </div>


            </div>


        </div>

    </div>

</section>

@endsection
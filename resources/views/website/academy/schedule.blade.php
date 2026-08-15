@extends('layouts.website')

@section('content')
<style>
    /* =========================================================
   ACADEMY — SCHEDULE PAGE
========================================================= */

.academy-schedule-page {
    position: relative;
    padding: 90px 0 110px;
    overflow: hidden;
}


/* =========================================================
   HEADER
========================================================= */

.academy-schedule-header {
    position: relative;
    max-width: 900px;
    margin: 0 auto 60px;
    padding: 42px 45px;
    text-align: center;

    background: linear-gradient(
        135deg,
        rgba(13, 47, 78, 0.08),
        rgba(70, 130, 180, 0.12),
        rgba(255, 255, 255, 0.72)
    );

    border: 1px solid rgba(35, 112, 170, 0.22);
    border-radius: 30px;

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    box-shadow:
        0 18px 50px rgba(20, 80, 130, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.85);

    transition: all 0.4s ease;
}

.academy-schedule-header:hover {
    transform: translateY(-5px);

    box-shadow:
        0 25px 65px rgba(30, 110, 190, 0.18),
        0 0 35px rgba(70, 150, 220, 0.10);
}


.academy-schedule-header::before {
    content: "";
    position: absolute;

    width: 170px;
    height: 170px;

    top: -90px;
    right: -70px;

    background: rgba(70, 160, 235, 0.14);

    border-radius: 50%;

    filter: blur(10px);

    pointer-events: none;
}


.academy-schedule-overline {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 8px 17px;

    border-radius: 30px;

    background: rgba(30, 105, 170, 0.09);

    border: 1px solid rgba(40, 120, 180, 0.18);

    color: #276a9f;

    font-size: 14px;
    font-weight: 700;
    letter-spacing: 0.5px;

    margin-bottom: 18px;
}


.academy-schedule-overline i {
    font-size: 17px;

    animation: scheduleIconFloat 3s ease-in-out infinite;
}


@keyframes scheduleIconFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-4px);
    }

}


.academy-schedule-header h1 {
    margin: 0 0 15px;

    color: #102f4d;

    font-size: clamp(32px, 4vw, 48px);

    font-weight: 800;

    letter-spacing: -0.5px;
}


.academy-schedule-header p {
    max-width: 700px;

    margin: auto;

    color: #526b80;

    font-size: 16px;

    line-height: 1.9;
}


/* =========================================================
   SCHEDULE GRID
========================================================= */

.academy-schedule-grid {
    position: relative;
}


/* =========================================================
   SCHEDULE CARD
========================================================= */

.academy-schedule-card {
    position: relative;

    height: 100%;

    padding: 27px;

    background: linear-gradient(
        145deg,
        rgba(16, 57, 88, 0.09),
        rgba(255, 255, 255, 0.88)
    );

    border: 1px solid rgba(42, 116, 168, 0.25);

    border-radius: 25px;

    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    box-shadow:
        0 12px 35px rgba(24, 83, 125, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);

    overflow: hidden;

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-color 0.4s ease;
}


.academy-schedule-card::before {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    top: -80px;
    right: -60px;

    border-radius: 50%;

    background: rgba(60, 145, 220, 0.13);

    filter: blur(12px);

    transition: all 0.5s ease;

    pointer-events: none;
}


.academy-schedule-card::after {
    content: "";

    position: absolute;

    width: 120px;
    height: 120px;

    bottom: -70px;
    left: -50px;

    border-radius: 50%;

    background: rgba(100, 90, 220, 0.08);

    filter: blur(14px);

    pointer-events: none;
}


.academy-schedule-card:hover {
    transform: translateY(-8px);

    border-color: rgba(45, 130, 195, 0.45);

    box-shadow:
        0 22px 55px rgba(28, 105, 165, 0.17),
        0 0 30px rgba(80, 155, 220, 0.10);
}


.academy-schedule-card:hover::before {
    transform: scale(1.3);
}


/* =========================================================
   TOP AREA
========================================================= */

.academy-schedule-top {
    display: flex;

    align-items: flex-start;

    gap: 18px;

    margin-bottom: 23px;
}


.academy-schedule-icon {
    flex-shrink: 0;

    width: 58px;
    height: 58px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 17px;

    background: linear-gradient(
        135deg,
        rgba(34, 115, 175, 0.18),
        rgba(92, 160, 220, 0.10)
    );

    border: 1px solid rgba(42, 125, 185, 0.22);

    color: #2877ad;

    font-size: 25px;

    box-shadow:
        0 8px 22px rgba(35, 115, 175, 0.12);

    transition: all 0.4s ease;
}


.academy-schedule-card:hover .academy-schedule-icon {
    transform: rotate(-5deg) scale(1.08);

    box-shadow:
        0 10px 28px rgba(40, 125, 195, 0.20);
}


.academy-schedule-title {
    flex: 1;
}


.academy-schedule-code {
    display: inline-block;

    margin-bottom: 6px;

    color: #3980ae;

    font-size: 12px;

    font-weight: 700;

    letter-spacing: 1px;

    text-transform: uppercase;
}


.academy-schedule-title h3 {
    margin: 0;

    color: #183b59;

    font-size: 21px;

    font-weight: 750;

    line-height: 1.4;
}


/* =========================================================
   INFO ROWS
========================================================= */

.academy-schedule-info {
    display: flex;

    flex-direction: column;

    gap: 11px;

    margin-top: 10px;
}


.academy-schedule-info-item {
    display: flex;

    align-items: center;

    gap: 12px;

    padding: 11px 13px;

    background: rgba(255, 255, 255, 0.54);

    border: 1px solid rgba(55, 120, 165, 0.12);

    border-radius: 13px;

    color: #526a7d;

    font-size: 14px;

    transition: all 0.3s ease;
}


.academy-schedule-info-item:hover {
    background: rgba(235, 247, 255, 0.75);

    transform: translateX(4px);

    border-color: rgba(50, 125, 180, 0.20);
}


.academy-schedule-info-item i {
    width: 25px;

    color: #337fad;

    font-size: 16px;

    text-align: center;
}


.academy-schedule-info-item strong {
    color: #294a63;

    font-weight: 700;
}


/* =========================================================
   DAY BADGE
========================================================= */

.academy-schedule-day {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 7px 13px;

    margin-bottom: 12px;

    border-radius: 30px;

    background: rgba(37, 119, 177, 0.10);

    border: 1px solid rgba(40, 120, 180, 0.17);

    color: #286c9d;

    font-size: 13px;

    font-weight: 700;
}


.academy-schedule-day i {
    font-size: 14px;
}


/* =========================================================
   ONLINE MEETING BUTTON
========================================================= */

.academy-schedule-meeting {
    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 8px;

    margin-top: 20px;

    padding: 11px 18px;

    border-radius: 13px;

    background: rgba(30, 105, 165, 0.11);

    border: 1px solid rgba(35, 115, 175, 0.20);

    color: #286d9e;

    font-size: 14px;

    font-weight: 700;

    text-decoration: none;

    transition: all 0.35s ease;
}


.academy-schedule-meeting:hover {
    color: white;

    background: #286d9e;

    transform: translateY(-2px);

    box-shadow:
        0 9px 24px rgba(35, 110, 170, 0.22);
}


/* =========================================================
   NOTES
========================================================= */

.academy-schedule-notes {
    margin-top: 18px;

    padding: 13px 15px;

    border-radius: 14px;

    background: rgba(245, 249, 252, 0.70);

    border-left: 3px solid rgba(50, 125, 180, 0.35);

    color: #617587;

    font-size: 13px;

    line-height: 1.8;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.academy-schedule-empty {
    max-width: 650px;

    margin: 50px auto;

    padding: 55px 30px;

    text-align: center;

    background: rgba(20, 65, 100, 0.06);

    border: 1px solid rgba(45, 120, 175, 0.18);

    border-radius: 28px;

    backdrop-filter: blur(12px);

    box-shadow:
        0 15px 40px rgba(30, 100, 150, 0.08);
}


.academy-schedule-empty i {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    width: 75px;
    height: 75px;

    margin-bottom: 20px;

    border-radius: 22px;

    background: rgba(40, 120, 180, 0.10);

    color: #347fac;

    font-size: 30px;
}


.academy-schedule-empty h3 {
    color: #1c405d;

    font-weight: 750;
}


.academy-schedule-empty p {
    color: #647b8d;

    margin-bottom: 0;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 767px) {

    .academy-schedule-page {
        padding: 55px 0 70px;
    }

    .academy-schedule-header {
        padding: 30px 22px;

        border-radius: 23px;
    }

    .academy-schedule-card {
        padding: 22px;

        border-radius: 21px;
    }

    .academy-schedule-top {
        gap: 13px;
    }

    .academy-schedule-icon {
        width: 50px;
        height: 50px;

        font-size: 21px;
    }

    .academy-schedule-title h3 {
        font-size: 18px;
    }

}
</style>



<section class="academy-schedule-page">

    <div class="container">

        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <div class="academy-schedule-header">

            <span class="academy-schedule-overline">

                <i class="bi bi-calendar3"></i>

                {{ __('Academy Schedule') }}

            </span>


            <h1>
                {{ __('Class Schedule') }}
            </h1>


            <p>
                {{ __('Explore the current academic schedule, class times, instructors, rooms, and available online sessions offered by our academy.') }}
            </p>

        </div>


        {{-- =====================================================
             SCHEDULE LIST
        ====================================================== --}}

        @if($schedules->count())

            <div class="row g-4 academy-schedule-grid">

                @foreach($schedules as $schedule)

                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | SCHEDULE TRANSLATION
                        |--------------------------------------------------------------------------
                        */

                        $scheduleTranslation =
                            $schedule->translations->first();


                        /*
                        |--------------------------------------------------------------------------
                        | CLASS TRANSLATION
                        |--------------------------------------------------------------------------
                        */

                        $classTranslation =
                            $schedule->academyClass?->translations->first();


                        /*
                        |--------------------------------------------------------------------------
                        | CLASS TITLE
                        |--------------------------------------------------------------------------
                        */

                        $classTitle =
                            $classTranslation?->title
                            ?? __('Untitled Class');


                        /*
                        |--------------------------------------------------------------------------
                        | CLASS CODE
                        |--------------------------------------------------------------------------
                        */

                        $classCode =
                            $schedule->academyClass?->class_code
                            ?? null;


                        /*
                        |--------------------------------------------------------------------------
                        | TEACHER
                        |--------------------------------------------------------------------------
                        */

                        $teacherName = null;

                        if ($schedule->teacher) {

                            $teacherName =
                                trim(
                                    $schedule->teacher->first_name
                                    . ' '
                                    . $schedule->teacher->last_name
                                );

                        }


                        /*
                        |--------------------------------------------------------------------------
                        | DEPARTMENT
                        |--------------------------------------------------------------------------
                        */

                        $departmentTitle =
                            $schedule->teacher?->department
                                ?->translations
                                ?->first()
                                ?->title
                            ?? null;

                    @endphp


                    <div class="col-xl-6 col-lg-6 col-md-12">


                        <article class="academy-schedule-card">


                            {{-- =================================================
                                 TOP
                            ================================================== --}}

                            <div class="academy-schedule-top">


                                <div class="academy-schedule-icon">

                                    <i class="bi bi-calendar-week"></i>

                                </div>


                                <div class="academy-schedule-title">


                                    @if($classCode)

                                        <span class="academy-schedule-code">

                                            {{ $classCode }}

                                        </span>

                                    @endif


                                    <h3>

                                        {{ $classTitle }}

                                    </h3>


                                </div>


                            </div>


                            {{-- =================================================
                                 DAY
                            ================================================== --}}

                            @if($schedule->day_of_week)

                                <div class="academy-schedule-day">

                                    <i class="bi bi-calendar-day"></i>

                                    {{ $schedule->day_of_week }}

                                </div>

                            @endif


                            {{-- =================================================
                                 INFORMATION
                            ================================================== --}}

                            <div class="academy-schedule-info">


                                {{-- TIME --}}

                                @if(
                                    $schedule->start_time ||
                                    $schedule->end_time
                                )

                                    <div class="academy-schedule-info-item">

                                        <i class="bi bi-clock"></i>

                                        <span>

                                            <strong>
                                                {{ __('Time') }}:
                                            </strong>

                                            {{ $schedule->start_time }}

                                            @if($schedule->end_time)

                                                -

                                                {{ $schedule->end_time }}

                                            @endif

                                        </span>

                                    </div>

                                @endif


                                {{-- INSTRUCTOR --}}

                                @if($teacherName)

                                    <div class="academy-schedule-info-item">

                                        <i class="bi bi-person-badge"></i>

                                        <span>

                                            <strong>
                                                {{ __('Instructor') }}:
                                            </strong>

                                            {{ $teacherName }}

                                        </span>

                                    </div>

                                @endif


                                {{-- DEPARTMENT --}}

                                @if($departmentTitle)

                                    <div class="academy-schedule-info-item">

                                        <i class="bi bi-mortarboard"></i>

                                        <span>

                                            <strong>
                                                {{ __('Department') }}:
                                            </strong>

                                            {{ $departmentTitle }}

                                        </span>

                                    </div>

                                @endif


                                {{-- ROOM --}}

                                @if($schedule->room)

                                    <div class="academy-schedule-info-item">

                                        <i class="bi bi-geo-alt"></i>

                                        <span>

                                            <strong>
                                                {{ __('Room') }}:
                                            </strong>

                                            {{ $schedule->room }}

                                        </span>

                                    </div>

                                @endif


                                {{-- TYPE --}}

                                @if($schedule->schedule_type)

                                    <div class="academy-schedule-info-item">

                                        <i class="bi bi-display"></i>

                                        <span>

                                            <strong>
                                                {{ __('Class Type') }}:
                                            </strong>

                                            {{ $schedule->schedule_type }}

                                        </span>

                                    </div>

                                @endif


                            </div>


                            {{-- =================================================
                                 TRANSLATION DESCRIPTION
                            ================================================== --}}

                            @if($scheduleTranslation?->description)

                                <div class="academy-schedule-notes">

                                    <i class="bi bi-info-circle me-1"></i>

                                    {{ $scheduleTranslation->description }}

                                </div>

                            @endif


                            {{-- =================================================
                                 NOTES
                            ================================================== --}}

                            @if($schedule->notes)

                                <div class="academy-schedule-notes">

                                    <i class="bi bi-sticky me-1"></i>

                                    {{ $schedule->notes }}

                                </div>

                            @endif


                            {{-- =================================================
                                 ONLINE MEETING
                            ================================================== --}}

                            @if($schedule->meeting_link)

                                <a
                                    href="{{ $schedule->meeting_link }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="academy-schedule-meeting"
                                >

                                    <i class="bi bi-camera-video"></i>

                                    {{ __('Join Online Session') }}

                                    <i class="bi bi-arrow-up-right"></i>

                                </a>

                            @endif


                        </article>


                    </div>


                @endforeach

            </div>


        @else


            {{-- =====================================================
                 EMPTY STATE
            ====================================================== --}}

            <div class="academy-schedule-empty">

                <i class="bi bi-calendar-x"></i>


                <h3>

                    {{ __('No Schedule Available') }}

                </h3>


                <p>

                    {{ __('There are currently no active academic schedules available.') }}

                </p>

            </div>

        @endif


    </div>

</section>

@endsection
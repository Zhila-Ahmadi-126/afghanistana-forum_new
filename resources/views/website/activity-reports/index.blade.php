@extends('layouts.website')

@section('content')

<div class="activity-report-page">

    {{-- =====================================================
         INTRO
    ====================================================== --}}

    <section class="report-intro-section">

        <div class="container">

            <div class="report-intro-glass">

                <div class="row align-items-center g-4">

                    <div class="col-lg-8">

                        <span class="report-eyebrow">

                            <i class="bi bi-clock-history"></i>

                            {{ __('24-Hour Reports') }}

                        </span>

                        <h1 class="report-intro-title">

                            {{ __('Our Work,') }}

                            <span>
                                {{ __('Reported Every Day') }}
                            </span>

                        </h1>

                        <p class="report-intro-text">

                            {{ __('The National Association of Afghan Lawyers documents its activities, achievements, ongoing work, challenges and future plans through regular 24-hour reports.') }}

                        </p>

                        <div class="report-keywords">

                            <span>
                                <i class="bi bi-check2-circle"></i>
                                {{ __('Completed Activities') }}
                            </span>

                            <span>
                                <i class="bi bi-hourglass-split"></i>
                                {{ __('Pending Activities') }}
                            </span>

                            <span>
                                <i class="bi bi-exclamation-circle"></i>
                                {{ __('Challenges') }}
                            </span>

                            <span>
                                <i class="bi bi-arrow-right-circle"></i>
                                {{ __('Next Plans') }}
                            </span>

                        </div>

                    </div>


                    <div class="col-lg-4">

                        <div class="report-intro-visual">

                            <div class="report-orbit orbit-one"></div>

                            <div class="report-orbit orbit-two"></div>

                            <div class="report-visual-icon">

                                <i class="bi bi-file-earmark-bar-graph"></i>

                            </div>

                            <span class="report-visual-label">

                                {{ __('Daily Activity') }}

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =====================================================
         FILTER
    ====================================================== --}}

    <section class="report-filter-section">

        <div class="container">

            <div class="report-filter-glass">

                <form
                    method="GET"
                    action="{{ route('website.activity-reports.index') }}"
                >

                    <div class="row g-3 align-items-center">

                        {{-- SEARCH --}}

                        <div class="col-lg-7">

                            <div class="report-search">

                                <i class="bi bi-search"></i>

                                <input
                                    type="text"
                                    name="search"
                                    value="{{ $search }}"
                                    class="form-control"
                                    placeholder="{{ __('Search reports...') }}"
                                >

                            </div>

                        </div>


                        {{-- YEAR --}}

                        <div class="col-md-6 col-lg-3">

                            <select
                                name="year"
                                class="form-select report-select"
                            >

                                <option value="">

                                    {{ __('All Years') }}

                                </option>

                                @foreach($years as $year)

                                    <option
                                        value="{{ $year }}"
                                        @selected(
                                            (int) $selectedYear === (int) $year
                                        )
                                    >

                                        {{ $year }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- FILTER BUTTON --}}

                        <div class="col-md-4 col-lg-2">

                            <button
                                type="submit"
                                class="report-filter-button w-100"
                            >

                                <i class="bi bi-funnel"></i>

                                {{ __('Filter') }}

                            </button>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </section>


    {{-- =====================================================
         REPORT CARDS
    ====================================================== --}}

    <section class="report-list-section">

        <div class="container">

            @if($reports->count())

                <div class="row g-4">

                    @foreach($reports as $report)

                        @php

                            $translation = $report->translations->first();

                            $title =
                                $translation?->title
                                ?? __('Untitled Report');

                            $summary =
                                $translation?->summary
                                ?? '';

                        @endphp

                        <div class="col-12 col-sm-6 col-lg-3">

                            <article class="report-card">

                                {{-- Decorative glow --}}
                                <div class="report-card-glow"></div>

                                {{-- ICON AREA --}}
                                <div class="report-card-visual">

                                    <div class="report-icon-orbit"></div>

                                    <div class="report-card-icon">

                                        <i class="bi bi-file-earmark-bar-graph"></i>

                                    </div>

                                    <span class="report-card-date">

                                        <i class="bi bi-calendar3"></i>

                                        {{ \Carbon\Carbon::parse($report->report_date)->format('Y') }}

                                    </span>

                                </div>


                                {{-- BODY --}}
                                <div class="report-card-body">

                                    <h3 class="report-card-title">

                                        {{ $title }}

                                    </h3>


                                    <p class="report-card-summary">

                                        {{ \Illuminate\Support\Str::limit(
                                            $summary,
                                            125
                                        ) }}

                                    </p>


                                    <a
                                        href="{{ route(
                                            'website.activity-reports.show',
                                            $report->id
                                        ) }}"
                                        class="report-read-more"
                                    >

                                        <span>{{ __('Read More') }}</span>

                                        <span class="report-read-icon">

                                            <i class="bi bi-arrow-right"></i>

                                        </span>

                                    </a>

                                </div>

                            </article>

                        </div>

                    @endforeach

                </div>


                {{-- =================================================
                     PAGINATION
                ================================================== --}}

                @if($reports->hasPages())

                    <div class="report-pagination">

                        {{ $reports->links() }}

                    </div>

                @endif


            @else

                <div class="report-empty">

                    <div class="report-empty-icon">

                        <i class="bi bi-file-earmark-x"></i>

                    </div>

                    <h3>

                        {{ __('No Reports Found') }}

                    </h3>

                    <p>

                        {{ __('No activity report matched your search or selected year.') }}

                    </p>

                </div>

            @endif

        </div>

    </section>

</div>


{{-- =========================================================
     PAGE CSS
========================================================= --}}

<style>

.activity-report-page {
    background: #ffffff;
    min-height: 100vh;
}


/* =========================================================
   INTRO
========================================================= */

.report-intro-section {
    padding: 70px 0 35px;
}

.report-intro-glass {
    position: relative;
    overflow: hidden;

    padding: 55px;

    border-radius: 34px;

    background:
        linear-gradient(
            135deg,
            rgba(239, 246, 255, .92),
            rgba(255, 255, 255, .96) 45%,
            rgba(245, 243, 255, .94)
        );

    border: 1px solid rgba(37, 99, 235, .16);

    box-shadow:
        0 25px 70px rgba(30, 64, 175, .10),
        0 10px 30px rgba(124, 58, 237, .06);

    backdrop-filter: blur(20px);
}

.report-intro-glass::before {
    content: "";

    position: absolute;

    width: 300px;
    height: 300px;

    right: -100px;
    top: -130px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(59, 130, 246, .18),
            rgba(124, 58, 237, .06),
            transparent 70%
        );

    pointer-events: none;
}

.report-intro-glass::after {
    content: "";

    position: absolute;

    width: 240px;
    height: 240px;

    left: -120px;
    bottom: -130px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(14, 165, 233, .13),
            transparent 70%
        );

    pointer-events: none;
}


.report-eyebrow {
    display: inline-flex;

    align-items: center;
    gap: 8px;

    padding: 8px 15px;

    border-radius: 50px;

    color: #1d4ed8;

    background: rgba(219, 234, 254, .72);

    border: 1px solid rgba(37, 99, 235, .12);

    font-size: .82rem;
    font-weight: 700;
    letter-spacing: .04em;
}


.report-intro-title {
    margin: 20px 0 15px;

    color: #0f172a;

    font-size: clamp(
        2rem,
        4vw,
        3.4rem
    );

    font-weight: 800;

    line-height: 1.1;
}

.report-intro-title span {
    display: block;

    background:
        linear-gradient(
            90deg,
            #1d4ed8,
            #2563eb,
            #7c3aed
        );

    -webkit-background-clip: text;
    background-clip: text;

    color: transparent;
}


.report-intro-text {
    max-width: 720px;

    margin-bottom: 25px;

    color: #64748b;

    font-size: 1rem;

    line-height: 1.9;
}


.report-keywords {
    display: flex;

    flex-wrap: wrap;

    gap: 10px;
}

.report-keywords span {
    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 8px 13px;

    border-radius: 50px;

    color: #334155;

    background: rgba(255,255,255,.72);

    border: 1px solid rgba(148,163,184,.22);

    font-size: .8rem;

    transition: .3s ease;
}

.report-keywords span:hover {
    transform: translateY(-3px);

    color: #1d4ed8;

    box-shadow:
        0 10px 25px rgba(37,99,235,.10);
}


/* =========================================================
   VISUAL
========================================================= */

.report-intro-visual {
    position: relative;

    width: 280px;
    height: 280px;

    margin: auto;

    display: flex;

    align-items: center;
    justify-content: center;
}


.report-visual-icon {
    position: relative;

    z-index: 3;

    width: 115px;
    height: 115px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 32px;

    color: white;

    font-size: 3.2rem;

    background:
        linear-gradient(
            135deg,
            #1d4ed8,
            #2563eb,
            #7c3aed
        );

    box-shadow:
        0 25px 50px rgba(37,99,235,.30);

    transform: rotate(-4deg);

    animation: reportFloat 4s ease-in-out infinite;
}


.report-visual-label {
    position: absolute;

    z-index: 4;

    bottom: 15px;

    padding: 8px 16px;

    border-radius: 50px;

    background: rgba(255,255,255,.85);

    border: 1px solid rgba(37,99,235,.12);

    color: #1e3a8a;

    font-size: .8rem;

    font-weight: 700;

    box-shadow:
        0 10px 30px rgba(15,23,42,.08);
}


.report-orbit {
    position: absolute;

    border-radius: 50%;

    border: 1px solid rgba(37,99,235,.15);

    animation: reportOrbit 8s linear infinite;
}

.orbit-one {
    width: 210px;
    height: 210px;
}

.orbit-two {
    width: 270px;
    height: 270px;

    border-color: rgba(124,58,237,.12);

    animation-duration: 12s;

    animation-direction: reverse;
}


@keyframes reportFloat {

    0%, 100% {
        transform: translateY(0) rotate(-4deg);
    }

    50% {
        transform: translateY(-10px) rotate(3deg);
    }

}

@keyframes reportOrbit {

    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }

}


/* =========================================================
   FILTER
========================================================= */

.report-filter-section {
    padding: 25px 0 35px;
}

.report-filter-glass {
    padding: 18px;

    border-radius: 22px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.90),
            rgba(239,246,255,.78),
            rgba(245,243,255,.80)
        );

    border: 1px solid rgba(37,99,235,.12);

    box-shadow:
        0 15px 45px rgba(30,64,175,.08);

    backdrop-filter: blur(16px);
}


.report-search {
    position: relative;
}

.report-search i {
    position: absolute;

    left: 16px;
    top: 50%;

    transform: translateY(-50%);

    color: #2563eb;

    z-index: 3;
}

.report-search .form-control {
    padding-left: 45px;
}


.report-filter-glass .form-control,
.report-filter-glass .form-select {
    min-height: 48px;

    border-radius: 13px;

    border: 1px solid rgba(148,163,184,.25);

    background: rgba(255,255,255,.72);

    box-shadow: none;
}


.report-filter-button {
    min-height: 48px;

    border: 0;

    border-radius: 13px;

    color: white;

    font-weight: 700;

    background:
        linear-gradient(
            135deg,
            #1d4ed8,
            #2563eb,
            #7c3aed
        );

    box-shadow:
        0 10px 25px rgba(37,99,235,.20);

    transition: .3s ease;
}

.report-filter-button:hover {
    transform: translateY(-2px);

    box-shadow:
        0 15px 32px rgba(37,99,235,.30);
}

/* =========================================================
   ACTIVITY REPORT GLASS CARDS
========================================================= */

.report-card {
    position: relative;
    height: 100%;
    min-height: 390px;
    overflow: hidden;

    padding: 0;

    border: 1px solid rgba(37, 99, 235, 0.16);
    border-radius: 26px;

    background:
        linear-gradient(
            145deg,
            rgba(255, 255, 255, 0.92),
            rgba(239, 246, 255, 0.82),
            rgba(250, 245, 255, 0.86)
        );

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 18px 45px rgba(30, 64, 175, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease,
        border-color 0.45s ease;
}


/* Soft colorful glow */

.report-card-glow {
    position: absolute;

    width: 170px;
    height: 170px;

    top: -80px;
    right: -70px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(37, 99, 235, 0.28),
            rgba(124, 58, 237, 0.16),
            transparent 70%
        );

    filter: blur(8px);

    transition:
        transform 0.6s ease,
        opacity 0.5s ease;
}


/* Hover card */

.report-card:hover {
    transform: translateY(-10px);

    border-color: rgba(37, 99, 235, 0.35);

    box-shadow:
        0 28px 65px rgba(37, 99, 235, 0.18),
        0 10px 25px rgba(124, 58, 237, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 1);
}

.report-card:hover .report-card-glow {
    transform: scale(1.7);
    opacity: 1;
}


/* =========================================================
   VISUAL / ICON
========================================================= */

.report-card-visual {
    position: relative;

    min-height: 155px;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            rgba(23, 37, 84, 0.96),
            rgba(37, 99, 235, 0.92),
            rgba(124, 58, 237, 0.82)
        );
}


/* Bottom colorful fade */

.report-card-visual::after {
    content: "";

    position: absolute;

    left: 0;
    right: 0;
    bottom: 0;

    height: 55px;

    background:
        linear-gradient(
            to top,
            rgba(255, 255, 255, 0.12),
            transparent
        );
}


/* Icon circle */

.report-card-icon {
    position: relative;
    z-index: 3;

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
            rgba(255, 255, 255, 0.24),
            rgba(255, 255, 255, 0.08)
        );

    border: 1px solid rgba(255, 255, 255, 0.45);

    box-shadow:
        0 0 0 10px rgba(255, 255, 255, 0.06),
        0 0 35px rgba(96, 165, 250, 0.55),
        inset 0 1px 0 rgba(255, 255, 255, 0.5);

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}


.report-card-icon i {
    font-size: 2rem;
}


.report-card:hover .report-card-icon {
    transform: scale(1.08) rotate(-3deg);

    box-shadow:
        0 0 0 14px rgba(255, 255, 255, 0.07),
        0 0 45px rgba(96, 165, 250, 0.75),
        0 0 75px rgba(168, 85, 247, 0.28);
}


/* Animated orbit */

.report-icon-orbit {
    position: absolute;

    width: 115px;
    height: 115px;

    border-radius: 50%;

    border: 1px solid rgba(255, 255, 255, 0.22);

    animation: reportOrbit 7s linear infinite;
}

.report-icon-orbit::before,
.report-icon-orbit::after {
    content: "";

    position: absolute;

    width: 8px;
    height: 8px;

    border-radius: 50%;

    background: #ffffff;

    box-shadow:
        0 0 15px rgba(255, 255, 255, 0.9);
}

.report-icon-orbit::before {
    top: 5px;
    left: 50%;
}

.report-icon-orbit::after {
    bottom: 7px;
    right: 10px;
}


@keyframes reportOrbit {

    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }

}


/* =========================================================
   DATE
========================================================= */

.report-card-date {
    position: absolute;

    top: 16px;
    right: 16px;

    z-index: 5;

    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 7px 11px;

    border-radius: 999px;

    color: white;

    font-size: 0.75rem;
    font-weight: 600;

    background: rgba(255, 255, 255, 0.13);

    border: 1px solid rgba(255, 255, 255, 0.25);

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}


/* =========================================================
   CARD BODY
========================================================= */

.report-card-body {
    position: relative;
    z-index: 3;

    display: flex;
    flex-direction: column;

    min-height: 235px;

    padding: 23px 21px 21px;
}


.report-card-title {
    margin: 0 0 11px;

    color: #172554;

    font-size: 1.12rem;
    font-weight: 800;

    line-height: 1.45;
}


.report-card-summary {
    margin: 0;

    color: #64748b;

    font-size: 0.88rem;

    line-height: 1.75;

    flex-grow: 1;
}


/* =========================================================
   READ MORE BUTTON
========================================================= */

.report-read-more {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-top: 20px;

    padding: 11px 13px 11px 17px;

    border-radius: 13px;

    color: white !important;

    text-decoration: none;

    font-size: 0.84rem;
    font-weight: 700;

    background:
        linear-gradient(
            100deg,
            #172554,
            #2563eb,
            #7c3aed
        );

    background-size: 200% 200%;

    box-shadow:
        0 8px 20px rgba(37, 99, 235, 0.22);

    transition:
        background-position 0.6s ease,
        transform 0.35s ease,
        box-shadow 0.35s ease;
}


.report-read-more:hover {
    color: white !important;

    background-position: 100% 50%;

    transform: translateY(-2px);

    box-shadow:
        0 12px 28px rgba(124, 58, 237, 0.30);
}


.report-read-icon {
    width: 30px;
    height: 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: rgba(255, 255, 255, 0.16);

    transition:
        transform 0.35s ease,
        background 0.35s ease;
}


.report-read-more:hover .report-read-icon {
    transform: translateX(4px);

    background: rgba(255, 255, 255, 0.27);
}


/* =========================================================
   PAGINATION
========================================================= */

.report-pagination {
    display: flex;
    justify-content: center;

    margin-top: 45px;
}

.report-pagination .pagination {
    gap: 7px;
}

.report-pagination .page-link {
    border: 0;

    border-radius: 10px;

    color: #172554;

    background: rgba(239, 246, 255, 0.85);

    box-shadow: 0 5px 15px rgba(37, 99, 235, 0.08);

    transition: 0.3s ease;
}

.report-pagination .page-link:hover {
    color: white;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #7c3aed
        );

    transform: translateY(-2px);
}

.report-pagination .active .page-link {
    color: white;

    border-color: transparent;

    background:
        linear-gradient(
            135deg,
            #172554,
            #2563eb,
            #7c3aed
        );

    box-shadow:
        0 7px 18px rgba(37, 99, 235, 0.25);
}

/* =========================================================
   PAGINATION
========================================================= */

.report-pagination {

    display: flex;

    justify-content: center;

    margin-top: 50px;
}

.report-pagination .pagination {
    gap: 7px;
}

.report-pagination .page-link {

    border: 1px solid rgba(37,99,235,.12);

    border-radius: 10px !important;

    color: #334155;

    background: rgba(255,255,255,.80);

    min-width: 40px;

    text-align: center;

    transition: .3s ease;
}

.report-pagination .page-link:hover {

    color: white;

    background: #2563eb;

    transform: translateY(-2px);
}


.report-pagination .active .page-link {

    color: white;

    border-color: transparent;

    background:
        linear-gradient(
            135deg,
            #1d4ed8,
            #7c3aed
        );
}


/* =========================================================
   EMPTY
========================================================= */

.report-empty {

    padding: 80px 20px;

    text-align: center;
}


.report-empty-icon {

    width: 90px;
    height: 90px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 20px;

    border-radius: 25px;

    color: #2563eb;

    background:
        linear-gradient(
            135deg,
            rgba(219,234,254,.85),
            rgba(237,233,254,.85)
        );

    font-size: 2.5rem;
}


.report-empty h3 {

    color: #0f172a;

    font-weight: 800;
}


.report-empty p {

    color: #64748b;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991.98px) {

    .report-intro-glass {
        padding: 35px;
    }

    .report-intro-visual {
        width: 220px;
        height: 220px;
    }

}


@media (max-width: 575.98px) {

    .report-intro-section {
        padding-top: 35px;
    }

    .report-intro-glass {
        padding: 25px 20px;

        border-radius: 25px;
    }

    .report-intro-title {
        font-size: 2rem;
    }

    .report-intro-visual {
        width: 190px;
        height: 190px;
    }

    .report-visual-icon {
        width: 85px;
        height: 85px;

        font-size: 2.3rem;
    }

    .orbit-one {
        width: 150px;
        height: 150px;
    }

    .orbit-two {
        width: 185px;
        height: 185px;
    }

    .report-card {
        border-radius: 20px;
    }

}

</style>

@endsection
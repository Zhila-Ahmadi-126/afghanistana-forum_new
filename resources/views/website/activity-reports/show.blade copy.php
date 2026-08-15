@extends('layouts.website')

@section('content')

@php
    $translation = $report->translations->first();

    $title = $translation?->title ?? __('Untitled Report');
    $summary = $translation?->summary ?? '';
    $completedActivities = $translation?->completed_activities ?? '';
    $pendingActivities = $translation?->pending_activities ?? '';
    $challenges = $translation?->challenges ?? '';
    $nextPlan = $translation?->next_plan ?? '';
@endphp

<style>
/* =========================================================
   REPORT PAGE
========================================================= */

.single-report-page {
    position: relative;
    overflow: hidden;
    padding: 65px 0 90px;
    background:
        radial-gradient(circle at 8% 12%, rgba(124,58,237,.09), transparent 25%),
        radial-gradient(circle at 92% 18%, rgba(37,99,235,.09), transparent 27%),
        radial-gradient(circle at 50% 90%, rgba(168,85,247,.06), transparent 28%),
        #fff;
}


/* =========================================================
   BACK
========================================================= */

.single-report-back {
    margin-bottom: 25px;
}

.single-report-back a {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 17px;
    border-radius: 14px;

    color: #172554;
    text-decoration: none;

    background: rgba(255,255,255,.62);
    border: 1px solid rgba(37,99,235,.12);

    box-shadow: 0 8px 25px rgba(23,37,84,.06);

    backdrop-filter: blur(18px);
    transition: .3s ease;
}

.single-report-back a:hover {
    color: #2563eb;
    transform: translateX(-4px);
    box-shadow: 0 12px 30px rgba(37,99,235,.12);
}


/* =========================================================
   MAIN REPORT SHEET
========================================================= */

.report-print-area {
    position: relative;
}


/* =========================================================
   HEADER
========================================================= */

.single-report-header {
    position: relative;
    overflow: hidden;

    padding: 42px 45px;

    border-radius: 30px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.78),
            rgba(239,246,255,.65),
            rgba(250,245,255,.72)
        );

    border: 1px solid rgba(255,255,255,.9);

    box-shadow:
        0 25px 70px rgba(23,37,84,.08),
        inset 0 1px 0 rgba(255,255,255,.95);

    backdrop-filter: blur(25px);
}


/* soft floating circles */

.single-report-header::before {
    content: "";
    position: absolute;

    width: 260px;
    height: 260px;

    top: -150px;
    right: -60px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(139,92,246,.16),
            rgba(139,92,246,.04) 50%,
            transparent 72%
        );

    pointer-events: none;
}

.single-report-header::after {
    content: "";
    position: absolute;

    width: 190px;
    height: 190px;

    bottom: -120px;
    left: -55px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(37,99,235,.13),
            transparent 70%
        );

    pointer-events: none;
}


.single-report-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 8px 15px;

    border-radius: 50px;

    color: #3157b7;

    font-size: .76rem;
    font-weight: 700;
    letter-spacing: .6px;
    text-transform: uppercase;

    background:
        linear-gradient(
            135deg,
            rgba(219,234,254,.62),
            rgba(237,233,254,.62)
        );

    border: 1px solid rgba(99,102,241,.10);

    backdrop-filter: blur(12px);
}


.single-report-title {
    position: relative;
    z-index: 2;

    margin: 18px 0 13px;

    color: #172554;

    font-size: clamp(2rem, 4vw, 3.1rem);
    font-weight: 800;

    line-height: 1.15;
}


.single-report-date {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;
    gap: 8px;

    color: #64748b;
    font-size: .92rem;
}

.single-report-date i {
    color: #2563eb;
}


/* =========================================================
   SUMMARY
========================================================= */

.single-report-summary {
    position: relative;
    z-index: 5;

    margin-top: 30px;

    /*
       مهم:
       ارتفاع این بخش فقط به اندازه متن خواهد بود.
    */
}


.summary-glass {
    position: relative;
    overflow: hidden;

    padding: 30px 34px;

    border-radius: 25px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.82),
            rgba(239,246,255,.58),
            rgba(250,245,255,.60)
        );

    border: 1px solid rgba(255,255,255,.95);

    box-shadow:
        0 20px 55px rgba(23,37,84,.075),
        inset 0 1px 0 rgba(255,255,255,.9);

    backdrop-filter: blur(25px);
}


/* purple soft glow */

.summary-glass::before {
    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    top: -130px;
    right: -70px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(168,85,247,.18),
            rgba(168,85,247,.05) 50%,
            transparent 72%
        );

    pointer-events: none;
}


/* blue soft glow */

.summary-glass::after {
    content: "";

    position: absolute;

    width: 170px;
    height: 170px;

    bottom: -120px;
    left: -60px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(37,99,235,.13),
            transparent 70%
        );

    pointer-events: none;
}


.summary-header {
    position: relative;
    z-index: 2;

    display: flex;
    align-items: center;
    gap: 14px;

    margin-bottom: 15px;
}


.summary-icon {
    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 14px;

    color: #fff;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #8b5cf6
        );

    box-shadow:
        0 10px 25px rgba(99,102,241,.18);
}


.summary-title {
    margin: 0;

    color: #172554;

    font-size: 1.15rem;
    font-weight: 750;
}


.summary-text {
    position: relative;
    z-index: 2;

    margin: 0;

    color: #475569;

    font-size: .98rem;
    line-height: 1.9;

    white-space: pre-line;
}


/* =========================================================
   FLOATING DETAIL CARDS
========================================================= */

.report-floating-grid {
    position: relative;

    z-index: 10;

    margin-top: -25px;
    padding: 0 22px;
}


.report-floating-card {
    position: relative;
    overflow: hidden;

    height: 100%;

    padding: 25px 23px;

    border-radius: 22px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.72),
            rgba(255,255,255,.42)
        );

    border: 1px solid rgba(255,255,255,.90);

    box-shadow:
        0 18px 45px rgba(23,37,84,.10),
        inset 0 1px 0 rgba(255,255,255,.9);

    backdrop-filter: blur(24px);

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}


.report-floating-card:hover {
    transform: translateY(-7px);

    box-shadow:
        0 25px 55px rgba(37,99,235,.13),
        inset 0 1px 0 rgba(255,255,255,.95);
}


.report-floating-card::after {
    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    right: -60px;
    bottom: -65px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(139,92,246,.13),
            transparent 70%
        );

    pointer-events: none;
}


.report-floating-header {
    display: flex;
    align-items: center;
    gap: 12px;

    margin-bottom: 15px;
}


.report-floating-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 13px;

    color: #fff;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #6366f1
        );

    box-shadow:
        0 9px 22px rgba(37,99,235,.15);
}


.report-floating-title {
    margin: 0;

    color: #172554;

    font-size: 1rem;
    font-weight: 750;
}


.report-floating-text {
    position: relative;
    z-index: 2;

    margin: 0;

    color: #526174;

    font-size: .91rem;
    line-height: 1.85;

    white-space: pre-line;
}


/* individual soft colors */

.report-completed .report-floating-icon {
    background:
        linear-gradient(
            135deg,
            #059669,
            #34d399
        );
}

.report-pending .report-floating-icon {
    background:
        linear-gradient(
            135deg,
            #d97706,
            #fbbf24
        );
}

.report-challenges .report-floating-icon {
    background:
        linear-gradient(
            135deg,
            #dc2626,
            #fb7185
        );
}

.report-next-plan .report-floating-icon {
    background:
        linear-gradient(
            135deg,
            #7c3aed,
            #a78bfa
        );
}


/* =========================================================
   SIGNATURE
========================================================= */

.single-report-signature {

    margin-top: 45px;

    padding: 25px;

    text-align: center;

    border-radius: 22px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.68),
            rgba(239,246,255,.45),
            rgba(250,245,255,.55)
        );

    border: 1px solid rgba(255,255,255,.9);

    box-shadow:
        0 15px 40px rgba(23,37,84,.06);

    backdrop-filter: blur(20px);
}


.single-report-signature-icon {

    width: 48px;
    height: 48px;

    margin: 0 auto 12px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #4f46e5;

    background:
        linear-gradient(
            135deg,
            rgba(219,234,254,.72),
            rgba(237,233,254,.72)
        );

    border: 1px solid rgba(99,102,241,.10);
}


.single-report-signature strong {

    display: block;

    color: #172554;

    font-size: .95rem;
}


.single-report-signature span {

    color: #94a3b8;

    font-size: .82rem;
}


/* =========================================================
   PRINT
========================================================= */

.single-report-actions {
    display: flex;
    justify-content: center;

    margin-top: 25px;
}


.single-report-print {

    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 10px 18px;

    border: 0;
    border-radius: 13px;

    color: #3157b7;

    background:
        rgba(255,255,255,.72);

    border: 1px solid rgba(37,99,235,.12);

    box-shadow:
        0 8px 22px rgba(23,37,84,.06);

    transition: .3s ease;
}


.single-report-print:hover {

    color: #fff;

    background:
        linear-gradient(
            135deg,
            #4f46e5,
            #8b5cf6
        );

    transform: translateY(-3px);
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .single-report-page {
        padding: 45px 0 65px;
    }

    .single-report-header {
        padding: 30px 22px;
        border-radius: 23px;
    }

    .single-report-title {
        font-size: 2rem;
    }

    .summary-glass {
        padding: 25px 21px;
    }

    .report-floating-grid {
        margin-top: 20px;
        padding: 0;
    }

}


/* =========================================================
   A4 PRINT
========================================================= */

@media print {

    @page {
        size: A4 portrait;
        margin: 15mm;
    }

    /*
       فقط محتوای گزارش چاپ می‌شود.
       Navbar / Footer / Back / Print مخفی می‌شوند.
    */

    body {
        background: #fff !important;
    }

    nav,
    footer,
    header:not(.single-report-header),
    .single-report-back,
    .single-report-actions {
        display: none !important;
    }

    .single-report-page {
        padding: 0 !important;
        margin: 0 !important;

        background: #fff !important;
    }

    .report-print-area {
        width: 100%;
    }

    .single-report-header,
    .summary-glass,
    .report-floating-card,
    .single-report-signature {
        box-shadow: none !important;

        border: 1px solid #d8dee8 !important;

        backdrop-filter: none !important;

        break-inside: avoid;
        page-break-inside: avoid;
    }

    .single-report-header {
        padding: 25px !important;
    }

    .single-report-summary {
        margin-top: 18px !important;
    }

    .report-floating-grid {
        margin-top: 15px !important;
        padding: 0 !important;
    }

    .report-floating-card {
        padding: 20px !important;
    }

    .single-report-signature {
        margin-top: 25px !important;
    }

    .single-report-page * {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }
}
</style>


<section class="single-report-page">

    <div class="container">

        {{-- BACK --}}

        <div class="single-report-back">

            <a href="{{ route('website.activity-reports.index') }}">

                <i class="bi bi-arrow-left"></i>

                {{ __('Back to Reports') }}

            </a>

        </div>


        {{-- EVERYTHING INSIDE THIS AREA IS THE REPORT --}}

        <div class="report-print-area">


            {{-- =================================================
                 HEADER
            ================================================== --}}

            <header class="single-report-header">

                <span class="single-report-label">

                    <i class="bi bi-file-earmark-text"></i>

                    {{ __('24-Hour Activity Report') }}

                </span>


                <h1 class="single-report-title">

                    {{ $title }}

                </h1>


                <div class="single-report-date">

                    <i class="bi bi-calendar3"></i>

                    {{ \Carbon\Carbon::parse($report->report_date)->format('F d, Y') }}

                </div>

            </header>


            {{-- =================================================
                 SUMMARY
            ================================================== --}}

            @if($summary)

                <div class="single-report-summary">

                    <div class="summary-glass">

                        <div class="summary-header">

                            <div class="summary-icon">

                                <i class="bi bi-journal-text"></i>

                            </div>

                            <h2 class="summary-title">

                                {{ __('Summary') }}

                            </h2>

                        </div>


                        <p class="summary-text">

                            {{ $summary }}

                        </p>

                    </div>

                </div>

            @endif


            {{-- =================================================
                 FLOATING DETAILS
            ================================================== --}}

            <div class="row g-4 report-floating-grid">


                {{-- COMPLETED --}}

                @if($completedActivities)

                    <div class="col-lg-6">

                        <div class="report-floating-card report-completed">

                            <div class="report-floating-header">

                                <div class="report-floating-icon">

                                    <i class="bi bi-check2-circle"></i>

                                </div>

                                <h2 class="report-floating-title">

                                    {{ __('Completed Activities') }}

                                </h2>

                            </div>


                            <p class="report-floating-text">

                                {{ $completedActivities }}

                            </p>

                        </div>

                    </div>

                @endif


                {{-- PENDING --}}

                @if($pendingActivities)

                    <div class="col-lg-6">

                        <div class="report-floating-card report-pending">

                            <div class="report-floating-header">

                                <div class="report-floating-icon">

                                    <i class="bi bi-hourglass-split"></i>

                                </div>

                                <h2 class="report-floating-title">

                                    {{ __('Pending Activities') }}

                                </h2>

                            </div>


                            <p class="report-floating-text">

                                {{ $pendingActivities }}

                            </p>

                        </div>

                    </div>

                @endif


                {{-- CHALLENGES --}}

                @if($challenges)

                    <div class="col-lg-6">

                        <div class="report-floating-card report-challenges">

                            <div class="report-floating-header">

                                <div class="report-floating-icon">

                                    <i class="bi bi-exclamation-triangle"></i>

                                </div>

                                <h2 class="report-floating-title">

                                    {{ __('Challenges') }}

                                </h2>

                            </div>


                            <p class="report-floating-text">

                                {{ $challenges }}

                            </p>

                        </div>

                    </div>

                @endif


                {{-- NEXT PLAN --}}

                @if($nextPlan)

                    <div class="col-lg-6">

                        <div class="report-floating-card report-next-plan">

                            <div class="report-floating-header">

                                <div class="report-floating-icon">

                                    <i class="bi bi-calendar-check"></i>

                                </div>

                                <h2 class="report-floating-title">

                                    {{ __('Next Plan') }}

                                </h2>

                            </div>


                            <p class="report-floating-text">

                                {{ $nextPlan }}

                            </p>

                        </div>

                    </div>

                @endif


            </div>


            {{-- =================================================
                 SIGNATURE
            ================================================== --}}

            <div class="single-report-signature">

                <div class="single-report-signature-icon">

                    <i class="bi bi-bank"></i>

                </div>


                <strong>

                    {{ __('National Association of Afghan Lawyers') }}

                </strong>


                <span>

                    {{ __('Official 24-Hour Activity Report') }}

                </span>

            </div>

        </div>


        {{-- PRINT BUTTON IS OUTSIDE PRINT AREA --}}

        <div class="single-report-actions">

            <button
                type="button"
                onclick="window.print()"
                class="single-report-print"
            >

                <i class="bi bi-printer"></i>

                {{ __('Print Report') }}

            </button>

        </div>

    </div>

</section>

@endsection


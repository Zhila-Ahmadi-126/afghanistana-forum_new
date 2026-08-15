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
   24 HOURS REPORT — GLASS DOCUMENT DESIGN
   ========================================================= */

.single-report-page {
    position: relative;
    min-height: 100vh;
    padding: 70px 0 100px;
    background:
        radial-gradient(circle at 8% 15%, rgba(37, 99, 235, 0.13), transparent 180px),
        radial-gradient(circle at 92% 18%, rgba(147, 51, 234, 0.12), transparent 190px),
        radial-gradient(circle at 12% 82%, rgba(249, 115, 22, 0.10), transparent 170px),
        radial-gradient(circle at 88% 82%, rgba(30, 64, 175, 0.12), transparent 200px),
        #ffffff;
    overflow: hidden;
}


/* ---------------------------------------------------------
   DECORATIVE LIGHT ORBS
   --------------------------------------------------------- */

.single-report-page::before,
.single-report-page::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(55px);
    opacity: .75;
    z-index: 0;
}

.single-report-page::before {
    width: 210px;
    height: 210px;
    top: 120px;
    left: -70px;
    background: rgba(37, 99, 235, .22);
}

.single-report-page::after {
    width: 240px;
    height: 240px;
    right: -80px;
    bottom: 120px;
    background: rgba(124, 58, 237, .18);
}


/* ---------------------------------------------------------
   CONTAINER
   --------------------------------------------------------- */

.single-report-page > .container {
    position: relative;
    z-index: 2;
}


/* ---------------------------------------------------------
   BACK BUTTON
   --------------------------------------------------------- */

.single-report-back {
    margin-bottom: 28px;
}

.single-report-back a {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 10px 17px;

    color: #1e3a8a;
    background: rgba(255, 255, 255, .62);

    border: 1px solid rgba(30, 64, 175, .14);
    border-radius: 14px;

    box-shadow:
        0 8px 25px rgba(30, 64, 175, .08),
        inset 0 1px 0 rgba(255,255,255,.8);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    text-decoration: none;
    font-size: .92rem;
    font-weight: 600;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        background .3s ease;
}

.single-report-back a:hover {
    color: #1d4ed8;
    background: rgba(255,255,255,.9);

    transform: translateX(-4px);

    box-shadow:
        0 12px 30px rgba(30, 64, 175, .14);
}


/* =========================================================
   MAIN REPORT — A4 GLASS DOCUMENT
   ========================================================= */

.report-print-area {
    position: relative;

    max-width: 920px;
    margin: 0 auto;

    padding: 58px 62px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.84),
            rgba(248,250,252,.67)
        );

    border: 1px solid rgba(255,255,255,.9);
    border-radius: 30px;

    box-shadow:
        0 35px 90px rgba(15, 23, 42, .12),
        0 10px 35px rgba(30, 64, 175, .08),
        inset 0 1px 0 rgba(255,255,255,.95);

    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);

    overflow: hidden;

    transition:
        transform .5s cubic-bezier(.2,.8,.2,1),
        box-shadow .5s ease;
}


/* subtle document outline */

.report-print-area::before {
    content: "";
    position: absolute;
    inset: 8px;

    border: 1px solid rgba(30, 64, 175, .08);
    border-radius: 23px;

    pointer-events: none;
}


/* glowing corners */

.report-print-area::after {
    content: "";
    position: absolute;

    width: 260px;
    height: 260px;

    top: -150px;
    right: -110px;

    background: rgba(59, 130, 246, .10);

    border-radius: 50%;
    filter: blur(20px);

    pointer-events: none;
}

.report-print-area:hover {
    transform: translateY(-5px);

    box-shadow:
        0 45px 110px rgba(15, 23, 42, .15),
        0 15px 45px rgba(30, 64, 175, .11),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* =========================================================
   HEADER
   ========================================================= */

.single-report-header {
    position: relative;
    text-align: center;

    padding-bottom: 38px;
    margin-bottom: 35px;

    border-bottom: 1px solid rgba(30, 64, 175, .10);
}


/* little document label */

.single-report-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 8px 15px;

    color: #1e40af;

    background: rgba(239, 246, 255, .72);

    border: 1px solid rgba(59, 130, 246, .15);
    border-radius: 30px;

    font-size: .78rem;
    font-weight: 700;
    letter-spacing: .04em;
    text-transform: uppercase;

    box-shadow:
        0 5px 18px rgba(37, 99, 235, .07);

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    animation: reportFadeDown .7s ease both;
}


.single-report-label i {
    font-size: 1rem;
}


/* title */

.single-report-title {
    max-width: 760px;

    margin: 21px auto 14px;

    color: #0f172a;

    font-size: clamp(1.8rem, 3vw, 2.65rem);
    line-height: 1.25;
    font-weight: 800;
    letter-spacing: -.025em;

    animation: reportFadeUp .7s .08s ease both;
}


/* date */

.single-report-date {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    color: #64748b;

    font-size: .9rem;
    font-weight: 500;

    animation: reportFadeUp .7s .16s ease both;
}

.single-report-date i {
    color: #2563eb;
}


/* =========================================================
   SUMMARY
   ========================================================= */

.single-report-summary {
    margin-bottom: 34px;
}

.summary-glass {
    position: relative;

    padding: 27px 30px;

    background:
        linear-gradient(
            135deg,
            rgba(239,246,255,.74),
            rgba(255,255,255,.58)
        );

    border: 1px solid rgba(59, 130, 246, .13);
    border-radius: 22px;

    box-shadow:
        0 15px 35px rgba(30, 64, 175, .06),
        inset 0 1px 0 rgba(255,255,255,.85);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    transition:
        transform .35s ease,
        box-shadow .35s ease,
        border-color .35s ease;
}

.summary-glass:hover {
    transform: translateY(-3px);

    border-color: rgba(59, 130, 246, .25);

    box-shadow:
        0 20px 45px rgba(30, 64, 175, .10),
        inset 0 1px 0 rgba(255,255,255,.95);
}


/* header inside summary */

.summary-header {
    display: flex;
    align-items: center;
    gap: 13px;

    margin-bottom: 17px;
}

.summary-icon {
    width: 43px;
    height: 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #2563eb;

    background: rgba(219,234,254,.8);

    border: 1px solid rgba(59,130,246,.15);
    border-radius: 13px;

    box-shadow:
        0 7px 18px rgba(37,99,235,.10);

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}

.summary-glass:hover .summary-icon {
    transform: rotate(-5deg) scale(1.08);

    box-shadow:
        0 10px 25px rgba(37,99,235,.18);
}

.summary-title {
    margin: 0;

    color: #172554;

    font-size: 1.15rem;
    font-weight: 750;
}

.summary-text {
    margin: 0;

    color: #475569;

    font-size: .96rem;
    line-height: 1.9;
}


/* =========================================================
   DETAILS GRID
   ========================================================= */

.report-floating-grid {
    margin-top: 0;
}


/* =========================================================
   DETAIL CARDS
   ========================================================= */

.report-floating-card {
    position: relative;

    height: 100%;

    padding: 25px 26px;

    background: rgba(255,255,255,.62);

    border: 1px solid rgba(148,163,184,.18);
    border-radius: 21px;

    box-shadow:
        0 12px 30px rgba(15,23,42,.055),
        inset 0 1px 0 rgba(255,255,255,.9);

    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    overflow: hidden;

    transition:
        transform .4s cubic-bezier(.2,.8,.2,1),
        box-shadow .4s ease,
        border-color .4s ease;
}


/* top accent line */

.report-floating-card::before {
    content: "";

    position: absolute;

    left: 22px;
    right: 22px;
    top: 0;

    height: 2px;

    border-radius: 0 0 10px 10px;

    background: linear-gradient(
        90deg,
        rgba(37,99,235,.75),
        rgba(59,130,246,.12)
    );

    opacity: .7;

    transition:
        left .4s ease,
        right .4s ease,
        opacity .4s ease;
}


.report-floating-card:hover {
    transform: translateY(-6px);

    border-color: rgba(59,130,246,.22);

    box-shadow:
        0 22px 45px rgba(15,23,42,.10),
        0 8px 25px rgba(37,99,235,.07),
        inset 0 1px 0 rgba(255,255,255,1);
}


.report-floating-card:hover::before {
    left: 12px;
    right: 12px;
    opacity: 1;
}


/* ---------------------------------------------------------
   CARD HEADER
   --------------------------------------------------------- */

.report-floating-header {
    display: flex;
    align-items: center;
    gap: 13px;

    margin-bottom: 18px;
}


.report-floating-icon {
    width: 43px;
    height: 43px;

    flex: 0 0 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    font-size: 1.05rem;

    transition:
        transform .4s cubic-bezier(.2,.8,.2,1),
        box-shadow .4s ease;
}


.report-floating-card:hover .report-floating-icon {
    transform: translateY(-2px) scale(1.08) rotate(-4deg);
}


/* ---------------------------------------------------------
   COMPLETED
   --------------------------------------------------------- */

.report-completed {
    border-color: rgba(16,185,129,.14);
}

.report-completed .report-floating-icon {
    color: #059669;

    background: rgba(209,250,229,.78);

    border: 1px solid rgba(16,185,129,.15);

    box-shadow:
        0 7px 20px rgba(16,185,129,.10);
}

.report-completed::before {
    background: linear-gradient(
        90deg,
        #10b981,
        rgba(16,185,129,.05)
    );
}


/* ---------------------------------------------------------
   PENDING
   --------------------------------------------------------- */

.report-pending {
    border-color: rgba(245,158,11,.14);
}

.report-pending .report-floating-icon {
    color: #d97706;

    background: rgba(254,243,199,.82);

    border: 1px solid rgba(245,158,11,.15);

    box-shadow:
        0 7px 20px rgba(245,158,11,.10);
}

.report-pending::before {
    background: linear-gradient(
        90deg,
        #f59e0b,
        rgba(245,158,11,.05)
    );
}


/* ---------------------------------------------------------
   CHALLENGES
   --------------------------------------------------------- */

.report-challenges {
    border-color: rgba(239,68,68,.13);
}

.report-challenges .report-floating-icon {
    color: #dc2626;

    background: rgba(254,226,226,.78);

    border: 1px solid rgba(239,68,68,.14);

    box-shadow:
        0 7px 20px rgba(239,68,68,.09);
}

.report-challenges::before {
    background: linear-gradient(
        90deg,
        #ef4444,
        rgba(239,68,68,.05)
    );
}


/* ---------------------------------------------------------
   NEXT PLAN
   --------------------------------------------------------- */

.report-next-plan {
    border-color: rgba(124,58,237,.13);
}

.report-next-plan .report-floating-icon {
    color: #7c3aed;

    background: rgba(237,233,254,.80);

    border: 1px solid rgba(124,58,237,.14);

    box-shadow:
        0 7px 20px rgba(124,58,237,.09);
}

.report-next-plan::before {
    background: linear-gradient(
        90deg,
        #7c3aed,
        rgba(124,58,237,.05)
    );
}


/* ---------------------------------------------------------
   CARD TITLE
   --------------------------------------------------------- */

.report-floating-title {
    margin: 0;

    color: #1e293b;

    font-size: 1rem;
    line-height: 1.4;
    font-weight: 750;
}


/* ---------------------------------------------------------
   CARD TEXT
   --------------------------------------------------------- */

.report-floating-text {
    margin: 0;

    color: #64748b;

    font-size: .91rem;
    line-height: 1.85;
}


/* =========================================================
   SIGNATURE / FOOTER
   ========================================================= */

.single-report-signature {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;

    text-align: center;

    margin-top: 42px;
    padding-top: 32px;

    border-top: 1px solid rgba(30,64,175,.09);
}


.single-report-signature-icon {
    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 12px;

    color: #1e40af;

    background: rgba(239,246,255,.75);

    border: 1px solid rgba(59,130,246,.13);
    border-radius: 15px;

    box-shadow:
        0 8px 20px rgba(37,99,235,.08);

    transition:
        transform .4s ease,
        box-shadow .4s ease;
}


.single-report-signature:hover .single-report-signature-icon {
    transform: translateY(-3px) scale(1.06);

    box-shadow:
        0 12px 28px rgba(37,99,235,.14);
}


.single-report-signature strong {
    color: #1e3a8a;

    font-size: .92rem;
    font-weight: 750;
}


.single-report-signature span {
    margin-top: 5px;

    color: #94a3b8;

    font-size: .78rem;
}


/* =========================================================
   PRINT BUTTON
   ========================================================= */

.single-report-actions {
    display: flex;
    justify-content: center;

    margin-top: 28px;
}


.single-report-print {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;

    padding: 12px 21px;

    color: #ffffff;

    background: linear-gradient(
        135deg,
        #1e40af,
        #2563eb
    );

    border: 1px solid rgba(30,64,175,.2);
    border-radius: 14px;

    box-shadow:
        0 10px 25px rgba(37,99,235,.20);

    font-size: .88rem;
    font-weight: 700;

    cursor: pointer;

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        filter .3s ease;
}


.single-report-print:hover {
    color: #ffffff;

    transform: translateY(-3px);

    filter: brightness(1.05);

    box-shadow:
        0 15px 32px rgba(37,99,235,.28);
}


.single-report-print:active {
    transform: translateY(-1px);
}


/* =========================================================
   ANIMATIONS
   ========================================================= */

@keyframes reportFadeUp {
    from {
        opacity: 0;
        transform: translateY(18px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


@keyframes reportFadeDown {
    from {
        opacity: 0;
        transform: translateY(-12px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 991.98px) {

    .single-report-page {
        padding: 50px 0 80px;
    }

    .report-print-area {
        padding: 45px 40px;
        border-radius: 25px;
    }

}


@media (max-width: 767.98px) {

    .single-report-page {
        padding: 35px 0 60px;
    }

    .report-print-area {
        padding: 34px 22px;

        border-radius: 21px;
    }

    .report-print-area::before {
        inset: 6px;
        border-radius: 16px;
    }

    .single-report-title {
        font-size: 1.65rem;
    }

    .single-report-header {
        padding-bottom: 28px;
        margin-bottom: 27px;
    }

    .summary-glass {
        padding: 22px 20px;
        border-radius: 18px;
    }

    .report-floating-card {
        padding: 22px 20px;
        border-radius: 18px;
    }

    .report-floating-title {
        font-size: .94rem;
    }

    .report-floating-text,
    .summary-text {
        font-size: .88rem;
    }

}


@media (max-width: 480px) {

    .single-report-page > .container {
        padding-left: 14px;
        padding-right: 14px;
    }

    .report-print-area {
        padding: 28px 17px;
        border-radius: 18px;
    }

    .single-report-label {
        font-size: .68rem;
        padding: 7px 11px;
    }

    .single-report-title {
        font-size: 1.4rem;
    }

    .single-report-date {
        font-size: .8rem;
    }

    .summary-header,
    .report-floating-header {
        gap: 10px;
    }

    .summary-icon,
    .report-floating-icon {
        width: 39px;
        height: 39px;
        flex-basis: 39px;
    }

}

/* =========================================================
   PRINT — REPORT ONLY
   ========================================================= */

@media print {

    /* -----------------------------------------
       Hide EVERYTHING from the website
       except the report page
    ----------------------------------------- */

    body * {
        visibility: hidden !important;
    }

    .single-report-page,
    .single-report-page * {
        visibility: visible !important;
    }


    /* -----------------------------------------
       Make the report occupy the print page
    ----------------------------------------- */

    .single-report-page {
        position: absolute !important;

        left: 0 !important;
        top: 0 !important;

        width: 100% !important;
        min-height: auto !important;

        margin: 0 !important;
        padding: 0 !important;

        background: #ffffff !important;

        overflow: visible !important;
    }


    /* -----------------------------------------
       Hide navigation / back / print button
    ----------------------------------------- */

    .single-report-back,
    .single-report-actions {
        display: none !important;
        visibility: hidden !important;
    }


    /* -----------------------------------------
       Report document
    ----------------------------------------- */

    .report-print-area {
        position: relative !important;

        width: 100% !important;
        max-width: none !important;

        margin: 0 !important;
        padding: 30px !important;

        background: #ffffff !important;

        border: none !important;
        border-radius: 0 !important;

        box-shadow: none !important;

        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;

        transform: none !important;

        overflow: visible !important;
    }


    /* -----------------------------------------
       Remove decorative glass effects
       when printing
    ----------------------------------------- */

    .report-print-area::before,
    .report-print-area::after,
    .single-report-page::before,
    .single-report-page::after {
        display: none !important;
        content: none !important;
    }


    /* -----------------------------------------
       Keep report sections clean
    ----------------------------------------- */

    .summary-glass,
    .report-floating-card {
        background: #ffffff !important;

        box-shadow: none !important;

        backdrop-filter: none !important;
        -webkit-backdrop-filter: none !important;

        transform: none !important;

        break-inside: avoid;
        page-break-inside: avoid;
    }


    /* -----------------------------------------
       Don't split individual cards
    ----------------------------------------- */

    .single-report-summary,
    .report-floating-card,
    .single-report-signature {
        break-inside: avoid;
        page-break-inside: avoid;
    }


    /* -----------------------------------------
       Header should stay with report
    ----------------------------------------- */

    .single-report-header {
        break-after: avoid;
        page-break-after: avoid;
    }


    /* -----------------------------------------
       Prevent unwanted animation during print
    ----------------------------------------- */

    .single-report-header *,
    .summary-glass *,
    .report-floating-card *,
    .single-report-signature * {
        animation: none !important;
        transition: none !important;
    }


    /* -----------------------------------------
       Make sure text remains visible
    ----------------------------------------- */

    .single-report-title,
    .single-report-label,
    .single-report-date,
    .summary-title,
    .summary-text,
    .report-floating-title,
    .report-floating-text,
    .single-report-signature strong,
    .single-report-signature span {
        visibility: visible !important;
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


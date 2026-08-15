@extends('layouts.website')

@section('content')

@php

    $translation = $media->translations->first();

    $title = $translation?->title
        ?? __('Untitled Media');

    $shortDescription = $translation?->short_description
        ?? '';

    $description = $translation?->description
        ?? '';

    $type = ucwords(
        str_replace(
            '_',
            ' ',
            $media->type
        )
    );

    $isYoutube = !empty($media->youtube_url);

    $isPdf = !empty($media->pdf_file);

    $isExternal = !empty($media->external_url);

@endphp


<style>

/* =========================================================
   MEDIA SINGLE PAGE
========================================================= */

.media-show-page {
    padding: 70px 0 90px;
    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(37, 99, 235, .07),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 20%,
            rgba(124, 58, 237, .08),
            transparent 30%
        ),
        #ffffff;
}


/* =========================================================
   MAIN GLASS CARD
========================================================= */

.media-show-card {

    position: relative;

    padding: 35px;

    border-radius: 28px;

    border: 1px solid rgba(255,255,255,.75);

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.88),
            rgba(239,246,255,.72),
            rgba(245,243,255,.80)
        );

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 25px 70px rgba(15,23,42,.10),
        inset 0 1px 0 rgba(255,255,255,.9);

    overflow: hidden;
}


/* =========================================================
   DECORATIVE LIGHT
========================================================= */

.media-show-card::before {

    content: "";

    position: absolute;

    width: 240px;
    height: 240px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(59,130,246,.18),
            transparent 70%
        );

    top: -100px;
    left: -100px;

    pointer-events: none;
}


.media-show-card::after {

    content: "";

    position: absolute;

    width: 260px;
    height: 260px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(124,58,237,.14),
            transparent 70%
        );

    bottom: -120px;
    right: -100px;

    pointer-events: none;
}


/* =========================================================
   IMAGE
========================================================= */

.media-show-image-wrap {

    position: relative;

    border-radius: 22px;

    overflow: hidden;

    border: 1px solid rgba(37,99,235,.15);

    background: #f8fafc;

    box-shadow:
        0 18px 45px rgba(15,23,42,.12);
}


.media-show-image-wrap img {

    display: block;

    width: 100%;

    height: auto;

    max-height: 520px;

    object-fit: contain;

    background: #f8fafc;

    transition:
        transform .6s ease;
}


.media-show-image-wrap:hover img {

    transform: scale(1.015);

}


/* =========================================================
   MEDIA TYPE
========================================================= */

.media-show-type {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 7px 14px;

    border-radius: 999px;

    color: #1e3a8a;

    background:
        rgba(219,234,254,.75);

    border:
        1px solid rgba(59,130,246,.18);

    font-size: .78rem;

    font-weight: 700;

    letter-spacing: .4px;

    margin-bottom: 16px;
}


/* =========================================================
   TITLE
========================================================= */

.media-show-title {

    color: #172554;

    font-weight: 800;

    line-height: 1.25;

    font-size: clamp(
        1.8rem,
        3vw,
        2.8rem
    );

    margin-bottom: 18px;
}


/* =========================================================
   SHORT DESCRIPTION
========================================================= */

.media-show-short {

    color: #475569;

    font-size: 1.05rem;

    line-height: 1.9;

    font-weight: 500;

    margin-bottom: 25px;
}


/* =========================================================
   LONG DESCRIPTION
========================================================= */

.media-show-description {

    color: #64748b;

    line-height: 2;

    font-size: .98rem;

}


.media-show-description p {

    margin-bottom: 16px;

}


/* =========================================================
   META
========================================================= */

.media-show-meta {

    display: flex;

    flex-wrap: wrap;

    gap: 10px;

    margin-top: 25px;

}


.media-show-meta-item {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    padding: 8px 13px;

    border-radius: 12px;

    background: rgba(255,255,255,.72);

    border: 1px solid rgba(148,163,184,.18);

    color: #475569;

    font-size: .82rem;

}


.media-show-meta-item i {

    color: #2563eb;

}


/* =========================================================
   ACTIONS
========================================================= */

.media-show-actions {

    display: flex;

    flex-wrap: wrap;

    gap: 12px;

    margin-top: 30px;

}


/* =========================================================
   ACTION BUTTON
========================================================= */

.media-show-action {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 9px;

    padding: 12px 19px;

    border-radius: 14px;

    text-decoration: none;

    font-weight: 700;

    font-size: .9rem;

    transition:
        transform .3s ease,
        box-shadow .3s ease;
}


.media-show-action:hover {

    transform:
        translateY(-3px);

}


.media-show-youtube {

    color: white;

    background:
        linear-gradient(
            135deg,
            #172554,
            #2563eb
        );

    box-shadow:
        0 10px 25px rgba(37,99,235,.22);
}


.media-show-pdf {

    color: #7f1d1d;

    background:
        rgba(254,226,226,.75);

    border:
        1px solid rgba(239,68,68,.15);
}


.media-show-external {

    color: #4c1d95;

    background:
        rgba(237,233,254,.8);

    border:
        1px solid rgba(124,58,237,.15);
}


/* =========================================================
   BACK BUTTON
========================================================= */

.media-show-back {

    display: inline-flex;

    align-items: center;

    gap: 7px;

    color: #475569;

    text-decoration: none;

    font-size: .9rem;

    font-weight: 600;

    margin-bottom: 22px;

    transition:
        color .25s ease,
        transform .25s ease;
}


.media-show-back:hover {

    color: #2563eb;

    transform:
        translateX(-3px);
}


/* =========================================================
   YOUTUBE VISUAL
========================================================= */

.media-youtube-preview {

    position: relative;

    margin-top: 25px;

    border-radius: 20px;

    overflow: hidden;

    border:
        1px solid rgba(37,99,235,.15);

    background:
        linear-gradient(
            135deg,
            #172554,
            #1d4ed8,
            #7c3aed
        );

    min-height: 250px;

    display: flex;

    align-items: center;

    justify-content: center;
}


.media-youtube-play {

    position: relative;

    width: 82px;
    height: 82px;

    border-radius: 50%;

    display: flex;

    align-items: center;
    justify-content: center;

    background:
        rgba(255,255,255,.94);

    color: #2563eb;

    font-size: 2.2rem;

    box-shadow:
        0 0 0 12px rgba(255,255,255,.10),
        0 0 0 25px rgba(59,130,246,.08);

    animation:
        mediaPulse 2s infinite;
}


.media-youtube-play::before,
.media-youtube-play::after {

    content: "";

    position: absolute;

    inset: -12px;

    border-radius: 50%;

    border: 1px solid rgba(255,255,255,.35);

    animation:
        mediaWave 2.5s infinite;
}


.media-youtube-play::after {

    inset: -25px;

    animation-delay: .8s;

}


@keyframes mediaPulse {

    0%,100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.07);
    }

}


@keyframes mediaWave {

    0% {
        transform: scale(.75);
        opacity: .8;
    }

    100% {
        transform: scale(1.35);
        opacity: 0;
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 767px) {

    .media-show-page {

        padding:
            40px 0 60px;

    }

    .media-show-card {

        padding: 20px;

        border-radius: 21px;

    }

    .media-show-title {

        font-size: 1.8rem;

    }

    .media-show-short {

        font-size: .95rem;

    }

    .media-show-actions {

        flex-direction: column;

    }

    .media-show-action {

        width: 100%;

    }

}







.media-show-image-wrap {
    position: relative;
    width: 100%;
    overflow: hidden;

    border-radius: 24px;

    border: 1px solid rgba(37, 99, 235, 0.18);

    background: #f8fafc;

    box-shadow:
        0 20px 50px rgba(23, 37, 84, 0.12),
        0 8px 25px rgba(37, 99, 235, 0.08);
}


.media-show-image {
    display: block;

    width: 100%;
    height: auto;

    max-height: 520px;

    object-fit: contain;

    border-radius: 24px;
}


/* =====================================================
   PLAY OVERLAY - روی خود عکس
===================================================== */

.media-show-play-overlay {

    position: absolute;

    inset: 0;

    z-index: 10;

    display: flex;

    align-items: center;
    justify-content: center;

    text-decoration: none;

    background: rgba(15, 23, 42, 0.06);

    transition:
        background .35s ease;
}


/* =====================================================
   PLAY BUTTON
===================================================== */

.media-show-play-button {

    position: relative;

    width: 82px;
    height: 82px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #fff;

    background:
        linear-gradient(
            135deg,
            rgba(37, 99, 235, .90),
            rgba(124, 58, 237, .85)
        );

    border:
        2px solid rgba(255,255,255,.7);

    backdrop-filter: blur(10px);

    box-shadow:
        0 0 0 10px rgba(37,99,235,.10),
        0 0 0 20px rgba(124,58,237,.06),
        0 15px 40px rgba(37,99,235,.30);

    animation:
        mediaPlayPulse 2s infinite;
}


.media-show-play-button i {

    font-size: 2.5rem;

    margin-left: 5px;

}


/* =====================================================
   MOVING WAVES
===================================================== */

.media-show-play-button::before,
.media-show-play-button::after {

    content: "";

    position: absolute;

    width: 82px;
    height: 82px;

    border-radius: 50%;

    border:
        1px solid rgba(37,99,235,.35);

    animation:
        mediaPlayWave 2.5s infinite ease-out;

}


.media-show-play-button::after {

    animation-delay: 1.25s;

}


/* =====================================================
   ANIMATIONS
===================================================== */

@keyframes mediaPlayPulse {

    0%, 100% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.06);
    }

}


@keyframes mediaPlayWave {

    0% {

        transform: scale(1);

        opacity: .7;

    }

    100% {

        transform: scale(1.9);

        opacity: 0;

    }

}


/* =====================================================
   HOVER
===================================================== */

.media-show-play-overlay:hover {

    background:
        rgba(15,23,42,.02);

}


.media-show-play-overlay:hover
.media-show-play-button {

    transform: scale(1.10);

    box-shadow:
        0 0 0 12px rgba(37,99,235,.13),
        0 0 0 25px rgba(124,58,237,.08),
        0 20px 50px rgba(37,99,235,.40);

}

</style>


<section class="media-show-page">

    <div class="container">

        {{-- BACK --}}

        <a
            href="{{ route('website.media.index') }}"
            class="media-show-back"
        >

            <i class="bi bi-arrow-left"></i>

            {{ __('Back to Media') }}

        </a>


        <article class="media-show-card">

            <div class="row g-5 align-items-start">

                {{-- =================================================
                     IMAGE
                ================================================== --}}

<div class="col-lg-6">

    @if($media->thumbnail)

        <div class="media-show-image-wrap">

            <img
                src="{{ asset('storage/' . $media->thumbnail) }}"
                alt="{{ $title }}"
                class="media-show-image"
            >

            {{-- YOUTUBE PLAY OVERLAY --}}
            @if($isYoutube)

                <a
                    href="{{ $media->youtube_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="media-show-play-overlay"
                    aria-label="{{ __('Watch on YouTube') }}"
                >

                    <span class="media-show-play-button">

                        <i class="bi bi-play-fill"></i>

                    </span>

                </a>

            @endif

        </div>

    @endif

</div>




                {{-- =================================================
                     CONTENT
                ================================================== --}}

                <div class="col-lg-6">

                    <span class="media-show-type">

                        <i class="bi bi-broadcast"></i>

                        {{ $type }}

                    </span>


                    <h1 class="media-show-title">

                        {{ $title }}

                    </h1>


                    @if($shortDescription)

                        <div class="media-show-short">

                            {{ $shortDescription }}

                        </div>

                    @endif


                    @if($description)

                        <div class="media-show-description">

                            {!! nl2br(e($description)) !!}

                        </div>

                    @endif


                    {{-- META --}}

                    <div class="media-show-meta">

                        @if($media->start_date)

                            <span class="media-show-meta-item">

                                <i class="bi bi-calendar-event"></i>

                                {{ \Carbon\Carbon::parse(
                                    $media->start_date
                                )->format('d M Y') }}

                            </span>

                        @endif


                        <span class="media-show-meta-item">

                            <i class="bi bi-eye"></i>

                            {{ number_format($media->views) }}

                            {{ __('Views') }}

                        </span>


                        <span class="media-show-meta-item">

                            <i class="bi bi-broadcast-pin"></i>

                            {{ $type }}

                        </span>

                    </div>


                    {{-- ACTIONS --}}

                    <div class="media-show-actions">


                        @if($isYoutube)

                            <a
                                href="{{ $media->youtube_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="media-show-action media-show-youtube"
                            >

                                <i class="bi bi-youtube"></i>

                                {{ __('Watch on YouTube') }}

                            </a>

                        @endif


                        @if($isPdf)

                            <a
                                href="{{ asset('storage/' . $media->pdf_file) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="media-show-action media-show-pdf"
                            >

                                <i class="bi bi-file-earmark-pdf"></i>

                                {{ __('Open PDF') }}

                            </a>

                        @endif


                        @if($isExternal)

                            <a
                                href="{{ $media->external_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="media-show-action media-show-external"
                            >

                                <i class="bi bi-box-arrow-up-right"></i>

                                {{ __('Open External Page') }}

                            </a>

                        @endif

                    </div>

                </div>

            </div>

        </article>

    </div>

</section>

@endsection

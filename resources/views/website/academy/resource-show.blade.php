@extends('layouts.website')

@section('content')

@php

    $resourceType = strtolower(
        $resource->resource_type ?? 'resource'
    );

    $resourceIcon = match($resourceType) {

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

    $departmentTitle =
        $resource->department
            ?->translations
            ?->first()
            ?->title;

    $classTitle =
        $resource->academyClass
            ?->translations
            ?->first()
            ?->title;

@endphp

<style>
/* =========================================================
   ACADEMY — RESOURCE SHOW PAGE
   Premium Glass / Dark Blue / Animated
========================================================= */

.academy-resource-show-page {
    position: relative;
    padding: 55px 0 100px;
    overflow: hidden;
    background:
        radial-gradient(circle at 8% 12%, rgba(23, 105, 170, .08), transparent 28%),
        radial-gradient(circle at 92% 35%, rgba(0, 145, 210, .07), transparent 30%),
        linear-gradient(180deg, #f8fbfd 0%, #eef4f8 100%);
}


/* =========================================================
   DECORATIVE BACKGROUND
========================================================= */

.academy-resource-show-page::before,
.academy-resource-show-page::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(2px);
}

.academy-resource-show-page::before {
    width: 320px;
    height: 320px;
    top: 160px;
    left: -170px;
    background: rgba(23, 105, 170, .055);
}

.academy-resource-show-page::after {
    width: 380px;
    height: 380px;
    right: -200px;
    bottom: 300px;
    background: rgba(0, 174, 239, .05);
}


/* =========================================================
   BACK
========================================================= */

.academy-resource-show-back {
    position: relative;
    z-index: 2;
    margin-bottom: 25px;
}

.academy-resource-show-back a {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 10px 17px;
    border: 1px solid rgba(16, 52, 82, .13);
    border-radius: 12px;
    background: rgba(255, 255, 255, .68);
    color: #193b5a;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    transition: all .35s ease;
}

.academy-resource-show-back a i {
    transition: transform .35s ease;
}

.academy-resource-show-back a:hover {
    color: #fff;
    background: #173d5e;
    border-color: #173d5e;
    transform: translateX(-4px);
    box-shadow: 0 12px 30px rgba(16, 52, 82, .18);
}

.academy-resource-show-back a:hover i {
    transform: translateX(-4px);
}


/* =========================================================
   HERO
========================================================= */

.academy-resource-show-hero {
    position: relative;
    z-index: 1;
    overflow: hidden;
    padding: 42px;
    border: 1px solid rgba(255, 255, 255, .72);
    border-radius: 30px;
    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.88),
            rgba(239,246,250,.72)
        );
    box-shadow:
        0 25px 70px rgba(22, 52, 78, .12),
        inset 0 1px 0 rgba(255,255,255,.95);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    transition: all .45s ease;
}

.academy-resource-show-hero:hover {
    border-color: rgba(23, 105, 170, .20);
    box-shadow:
        0 32px 85px rgba(22, 52, 78, .16),
        inset 0 1px 0 rgba(255,255,255,.98);
}


/* =========================================================
   HERO GLOW
========================================================= */

.academy-resource-show-glow {
    position: absolute;
    width: 420px;
    height: 420px;
    top: -230px;
    right: -150px;
    border-radius: 50%;
    background: rgba(21, 122, 180, .08);
    filter: blur(5px);
    pointer-events: none;
    animation: resourceGlow 7s ease-in-out infinite;
}

@keyframes resourceGlow {

    0%,
    100% {
        transform: translate(0, 0) scale(1);
    }

    50% {
        transform: translate(-30px, 30px) scale(1.12);
    }
}


/* =========================================================
   COVER
========================================================= */

.academy-resource-show-cover {
    position: relative;
    height: 500px;
    overflow: hidden;
    border-radius: 24px;
    background:
        linear-gradient(
            145deg,
            #0e2f4b,
            #174e73
        );
    border: 1px solid rgba(255,255,255,.25);
    box-shadow:
        0 25px 55px rgba(12, 43, 68, .22),
        inset 0 1px 0 rgba(255,255,255,.15);
    isolation: isolate;
}

.academy-resource-show-cover::before {
    content: "";
    position: absolute;
    z-index: 2;
    inset: 0;
    background:
        linear-gradient(
            180deg,
            transparent 45%,
            rgba(5, 26, 43, .30) 100%
        );
    pointer-events: none;
}

.academy-resource-show-cover::after {
    content: "";
    position: absolute;
    z-index: 3;
    width: 150px;
    height: 150px;
    right: -55px;
    top: -55px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.18);
    box-shadow:
        0 0 0 25px rgba(255,255,255,.025),
        0 0 0 50px rgba(255,255,255,.018);
    pointer-events: none;
}

.academy-resource-show-cover img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition:
        transform .8s cubic-bezier(.2,.7,.2,1),
        filter .5s ease;
}

.academy-resource-show-hero:hover
.academy-resource-show-cover img {
    transform: scale(1.055);
    filter: saturate(1.08);
}


/* =========================================================
   COVER PLACEHOLDER
========================================================= */

.academy-resource-show-cover-placeholder {
    position: relative;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    color: rgba(255,255,255,.92);
    font-size: 88px;
    background:
        radial-gradient(
            circle at 50% 40%,
            rgba(255,255,255,.13),
            transparent 35%
        ),
        linear-gradient(
            145deg,
            #0b2b46,
            #185b82
        );
}

.academy-resource-show-cover-placeholder::before,
.academy-resource-show-cover-placeholder::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.10);
}

.academy-resource-show-cover-placeholder::before {
    width: 230px;
    height: 230px;
    animation: resourceOrbit 8s linear infinite;
}

.academy-resource-show-cover-placeholder::after {
    width: 320px;
    height: 320px;
    animation: resourceOrbit 12s linear infinite reverse;
}

.academy-resource-show-cover-placeholder i {
    position: relative;
    z-index: 2;
    animation: resourceIconFloat 3.5s ease-in-out infinite;
    filter: drop-shadow(0 12px 25px rgba(0,0,0,.25));
}

@keyframes resourceIconFloat {
    0%,100% {
        transform: translateY(0) scale(1);
    }

    50% {
        transform: translateY(-12px) scale(1.04);
    }
}

@keyframes resourceOrbit {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}


/* =========================================================
   FEATURED BADGE
========================================================= */

.academy-resource-show-featured {
    position: absolute;
    z-index: 5;
    left: 18px;
    bottom: 18px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 14px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 30px;
    background: rgba(9, 34, 54, .72);
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    box-shadow: 0 8px 25px rgba(0,0,0,.15);
}

.academy-resource-show-featured i {
    color: #b9dff5;
    animation: featuredStar 2s ease-in-out infinite;
}

@keyframes featuredStar {
    0%,100% {
        transform: scale(1) rotate(0);
    }

    50% {
        transform: scale(1.18) rotate(8deg);
    }
}


/* =========================================================
   CONTENT
========================================================= */

.academy-resource-show-content {
    position: relative;
    z-index: 2;
    padding: 12px 8px;
}

.academy-resource-show-type {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 18px;
    padding: 9px 15px;
    border: 1px solid rgba(23, 105, 170, .15);
    border-radius: 30px;
    background: rgba(23, 105, 170, .07);
    color: #17619a;
    font-size: 13px;
    font-weight: 700;
    transition: all .3s ease;
}

.academy-resource-show-type i {
    font-size: 17px;
}

.academy-resource-show-type:hover {
    background: rgba(23, 105, 170, .12);
    transform: translateY(-2px);
}


/* =========================================================
   TITLE
========================================================= */

.academy-resource-show-content h1 {
    max-width: 850px;
    margin: 0 0 18px;
    color: #102f4b;
    font-size: clamp(34px, 4vw, 54px);
    line-height: 1.12;
    font-weight: 800;
    letter-spacing: -.7px;
}


/* =========================================================
   SHORT DESCRIPTION
========================================================= */

.academy-resource-show-short {
    max-width: 780px;
    margin: 0 0 28px;
    color: #5b7083;
    font-size: 16px;
    line-height: 1.9;
}


/* =========================================================
   META
========================================================= */

.academy-resource-show-meta {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
    margin-top: 25px;
}

.academy-resource-show-meta-item {
    display: flex;
    align-items: center;
    gap: 12px;
    min-height: 68px;
    padding: 12px 14px;
    border: 1px solid rgba(23, 61, 91, .09);
    border-radius: 15px;
    background: rgba(255,255,255,.62);
    transition: all .35s ease;
}

.academy-resource-show-meta-item:hover {
    transform: translateY(-4px);
    border-color: rgba(23, 105, 170, .20);
    background: rgba(255,255,255,.86);
    box-shadow: 0 12px 28px rgba(18, 55, 82, .09);
}

.academy-resource-show-meta-icon {
    flex: 0 0 42px;
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    background: #e9f2f8;
    color: #17639a;
    font-size: 17px;
    transition: all .35s ease;
}

.academy-resource-show-meta-item:hover
.academy-resource-show-meta-icon {
    background: #173f60;
    color: #fff;
    transform: rotate(-5deg);
}

.academy-resource-show-meta-item span {
    display: block;
    margin-bottom: 3px;
    color: #8091a0;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .6px;
}

.academy-resource-show-meta-item strong {
    display: block;
    color: #254762;
    font-size: 13px;
    line-height: 1.4;
}


/* =========================================================
   ACTIONS
========================================================= */

.academy-resource-show-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 30px;
}

.academy-resource-show-primary-button,
.academy-resource-show-secondary-button {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 49px;
    padding: 12px 21px;
    border-radius: 13px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    overflow: hidden;
    transition: all .35s ease;
}

.academy-resource-show-primary-button {
    border: 1px solid #173f60;
    background: #173f60;
    color: #fff;
    box-shadow: 0 10px 25px rgba(23,63,96,.18);
}

.academy-resource-show-primary-button::before {
    content: "";
    position: absolute;
    width: 70px;
    height: 150%;
    left: -100px;
    top: -25%;
    transform: rotate(20deg);
    background: rgba(255,255,255,.13);
    transition: left .55s ease;
}

.academy-resource-show-primary-button:hover {
    color: #fff;
    background: #0d2c47;
    transform: translateY(-4px);
    box-shadow: 0 15px 32px rgba(23,63,96,.25);
}

.academy-resource-show-primary-button:hover::before {
    left: 120%;
}

.academy-resource-show-primary-button i {
    transition: transform .35s ease;
}

.academy-resource-show-primary-button:hover i {
    transform: translateX(4px);
}


.academy-resource-show-secondary-button {
    border: 1px solid rgba(23,63,96,.15);
    background: rgba(255,255,255,.62);
    color: #234966;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
}

.academy-resource-show-secondary-button:hover {
    background: #eaf2f7;
    color: #173f60;
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(23,63,96,.10);
}


/* =========================================================
   SECTION HEADINGS
========================================================= */

.academy-resource-show-description,
.academy-resource-show-information {
    position: relative;
    z-index: 1;
    margin-top: 75px;
}

.academy-resource-show-section-heading {
    margin-bottom: 25px;
    text-align: center;
}

.academy-resource-show-section-heading span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 9px;
    color: #17639a;
    font-size: 13px;
    font-weight: 700;
}

.academy-resource-show-section-heading h2 {
    margin: 0;
    color: #173b59;
    font-size: 30px;
    font-weight: 800;
}


/* =========================================================
   DESCRIPTION CARD
========================================================= */

.academy-resource-show-description-card {
    position: relative;
    padding: 32px 35px;
    border: 1px solid rgba(255,255,255,.85);
    border-radius: 22px;
    background: rgba(255,255,255,.72);
    color: #52697b;
    font-size: 15px;
    line-height: 2;
    box-shadow:
        0 18px 45px rgba(21,55,79,.08),
        inset 0 1px 0 rgba(255,255,255,.95);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
    transition: all .4s ease;
}

.academy-resource-show-description-card:hover {
    transform: translateY(-4px);
    border-color: rgba(23,105,170,.16);
    box-shadow:
        0 25px 55px rgba(21,55,79,.12),
        inset 0 1px 0 rgba(255,255,255,.98);
}


/* =========================================================
   INFORMATION CARDS
========================================================= */

.academy-resource-info-card {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 22px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,.88);
    border-radius: 19px;
    background: rgba(255,255,255,.68);
    box-shadow: 0 15px 38px rgba(21,55,79,.07);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    transition: all .4s cubic-bezier(.2,.7,.2,1);
}

.academy-resource-info-card::after {
    content: "";
    position: absolute;
    width: 100px;
    height: 100px;
    right: -45px;
    top: -45px;
    border-radius: 50%;
    background: rgba(23,105,170,.06);
    transition: all .4s ease;
}

.academy-resource-info-card:hover {
    transform: translateY(-7px);
    border-color: rgba(23,105,170,.18);
    box-shadow: 0 22px 48px rgba(21,55,79,.13);
}

.academy-resource-info-card:hover::after {
    transform: scale(1.6);
}

.academy-resource-info-icon {
    position: relative;
    z-index: 2;
    flex: 0 0 50px;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 14px;
    background: #eaf3f8;
    color: #17639a;
    font-size: 20px;
    transition: all .4s ease;
}

.academy-resource-info-card:hover
.academy-resource-info-icon {
    background: #173f60;
    color: #fff;
    transform: rotate(-6deg) scale(1.06);
}

.academy-resource-info-card span {
    position: relative;
    z-index: 2;
    display: block;
    margin-bottom: 4px;
    color: #8292a0;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.academy-resource-info-card strong {
    position: relative;
    z-index: 2;
    display: block;
    color: #24465f;
    font-size: 14px;
    line-height: 1.45;
}


/* =========================================================
   CTA
========================================================= */

.academy-resource-show-cta {
    margin-top: 80px;
}

.academy-resource-show-cta-card {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 25px;
    padding: 35px 38px;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 24px;
    background:
        linear-gradient(
            135deg,
            #221657,
            #e8d9c548
        );
    box-shadow: 0 25px 55px rgba(171, 206, 236, 0.18);
}
.academy-resource-show-cta-card::before {
    content: "";
    position: absolute;
    width: 260px;
    height: 260px;
    right: -100px;
    top: -120px;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,.10);
    box-shadow:
        0 0 0 35px rgba(255,255,255,.025),
        0 0 0 70px rgba(255,255,255,.015);
}

.academy-resource-show-cta-icon {
    position: relative;
    z-index: 2;
    flex: 0 0 65px;
    width: 65px;
    height: 65px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 18px;
    background: rgba(255,255,255,.09);
    color: #fff;
    font-size: 27px;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    animation: ctaFloat 4s ease-in-out infinite;
}

@keyframes ctaFloat {
    0%,100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-7px);
    }
}

.academy-resource-show-cta-content {
    position: relative;
    z-index: 2;
    flex: 1;
}

.academy-resource-show-cta-content span {
    display: block;
    margin-bottom: 6px;
    color: rgba(255,255,255,.60);
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.academy-resource-show-cta-content h2 {
    margin: 0 0 8px;
    color: #fff;
    font-size: 25px;
    font-weight: 800;
}

.academy-resource-show-cta-content p {
    max-width: 720px;
    margin: 0;
    color: rgba(255,255,255,.68);
    font-size: 14px;
    line-height: 1.8;
}

.academy-resource-show-cta-button {
    position: relative;
    z-index: 2;
    display: inline-flex;
    align-items: center;
    gap: 9px;
    white-space: nowrap;
    padding: 13px 20px;
    border: 1px solid rgba(255,255,255,.18);
    border-radius: 12px;
    background: rgba(255,255,255,.10);
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    transition: all .35s ease;
}

.academy-resource-show-cta-button:hover {
    background: #fff;
    color: #173f60;
    transform: translateY(-3px);
    box-shadow: 0 12px 28px rgba(0,0,0,.16);
}

.academy-resource-show-cta-button i {
    transition: transform .3s ease;
}

.academy-resource-show-cta-button:hover i {
    transform: translateX(4px);
}


/* =========================================================
   RESPONSIVE — TABLET
========================================================= */

@media (max-width: 991.98px) {

    .academy-resource-show-page {
        padding: 45px 0 80px;
    }

    .academy-resource-show-hero {
        padding: 28px;
        border-radius: 25px;
    }

    .academy-resource-show-cover {
        height: 430px;
    }

    .academy-resource-show-content {
        padding: 5px;
    }

    .academy-resource-show-content h1 {
        font-size: 40px;
    }

    .academy-resource-show-meta {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .academy-resource-show-cta-card {
        flex-wrap: wrap;
    }

    .academy-resource-show-cta-content {
        flex-basis: calc(100% - 100px);
    }
}


/* =========================================================
   RESPONSIVE — MOBILE
========================================================= */

@media (max-width: 767.98px) {

    .academy-resource-show-page {
        padding: 30px 0 60px;
    }

    .academy-resource-show-back {
        margin-bottom: 18px;
    }

    .academy-resource-show-hero {
        padding: 16px;
        border-radius: 20px;
    }

    .academy-resource-show-cover {
        height: 330px;
        border-radius: 18px;
    }

    .academy-resource-show-cover-placeholder {
        font-size: 65px;
    }

    .academy-resource-show-featured {
        left: 12px;
        bottom: 12px;
    }

    .academy-resource-show-content h1 {
        font-size: 30px;
        line-height: 1.2;
    }

    .academy-resource-show-short {
        font-size: 14px;
        line-height: 1.85;
    }

    .academy-resource-show-meta {
        grid-template-columns: 1fr;
    }

    .academy-resource-show-actions {
        flex-direction: column;
    }

    .academy-resource-show-primary-button,
    .academy-resource-show-secondary-button {
        width: 100%;
    }

    .academy-resource-show-description,
    .academy-resource-show-information {
        margin-top: 55px;
    }

    .academy-resource-show-section-heading h2 {
        font-size: 25px;
    }

    .academy-resource-show-description-card {
        padding: 23px;
        font-size: 14px;
        line-height: 1.9;
    }

    .academy-resource-show-cta {
        margin-top: 60px;
    }

    .academy-resource-show-cta-card {
        padding: 25px;
        gap: 18px;
    }

    .academy-resource-show-cta-icon {
        flex-basis: 55px;
        width: 55px;
        height: 55px;
        font-size: 22px;
    }

    .academy-resource-show-cta-content {
        flex-basis: calc(100% - 75px);
    }

    .academy-resource-show-cta-content h2 {
        font-size: 21px;
    }

    .academy-resource-show-cta-content p {
        font-size: 13px;
    }

    .academy-resource-show-cta-button {
        width: 100%;
        justify-content: center;
        margin-top: 8px;
    }
}


/* =========================================================
   RESPONSIVE — SMALL MOBILE
========================================================= */

@media (max-width: 575.98px) {

    .academy-resource-show-page {
        padding-top: 22px;
    }

    .academy-resource-show-back a {
        padding: 9px 13px;
        font-size: 12px;
    }

    .academy-resource-show-cover {
        height: 270px;
    }

    .academy-resource-show-content h1 {
        font-size: 26px;
    }

    .academy-resource-show-type {
        font-size: 12px;
    }

    .academy-resource-show-meta-item {
        min-height: 62px;
    }

    .academy-resource-show-section-heading h2 {
        font-size: 22px;
    }

    .academy-resource-show-description-card {
        padding: 20px;
    }

    .academy-resource-show-cta-card {
        padding: 21px;
    }
}
</style>

<section class="academy-resource-show-page">

    <div class="container">

        {{-- =====================================================
             BACK TO RESOURCES
        ====================================================== --}}

        <div class="academy-resource-show-back">

            <a href="{{ route('academy.resources') }}">

                <i class="bi bi-arrow-left"></i>

                {{ __('Back to Resources') }}

            </a>

        </div>


        {{-- =====================================================
             RESOURCE HERO
        ====================================================== --}}

        <div class="academy-resource-show-hero">

            <div class="academy-resource-show-glow"></div>


            <div class="row align-items-center g-5">

                {{-- =================================================
                     COVER
                ================================================== --}}

                <div class="col-lg-5">

                    <div class="academy-resource-show-cover">

                        @if($resource->cover_image)

                            <img
                                src="{{ asset('storage/' . $resource->cover_image) }}"
                                alt="{{ $resource->title }}"
                            >

                        @else

                            <div class="academy-resource-show-cover-placeholder">

                              

                                <i class="{{ $resourceIcon }}"></i>

                            </div>

                        @endif


                        @if($resource->is_featured)

                            <div class="academy-resource-show-featured">

                                <i class="bi bi-star-fill"></i>

                                {{ __('Featured Resource') }}

                            </div>

                        @endif

                    </div>

                </div>


                {{-- =================================================
                     INFORMATION
                ================================================== --}}

                <div class="col-lg-7">

                    <div class="academy-resource-show-content">


                        {{-- RESOURCE TYPE --}}

                        <div class="academy-resource-show-type">

                            <i class="{{ $resourceIcon }}"></i>

                            <span>

                                {{ ucfirst(
                                    str_replace(
                                        '_',
                                        ' ',
                                        $resource->resource_type ?? __('Resource')
                                    )
                                ) }}

                            </span>

                        </div>


                        {{-- TITLE --}}

                        <h1>

                            {{ $resource->title }}

                        </h1>


                        {{-- SHORT DESCRIPTION --}}

                        @if($resource->short_description)

                            <p class="academy-resource-show-short">

                                {{ $resource->short_description }}

                            </p>

                        @endif


                        {{-- META --}}

                        <div class="academy-resource-show-meta">


                            {{-- AUTHOR --}}

                            @if($resource->author)

                                <div class="academy-resource-show-meta-item">

                                    <div class="academy-resource-show-meta-icon">

                                        <i class="bi bi-person-fill"></i>

                                    </div>

                                    <div>

                                        <span>

                                            {{ __('Author') }}

                                        </span>

                                        <strong>

                                            {{ $resource->author }}

                                        </strong>

                                    </div>

                                </div>

                            @endif



                            {{-- DATE --}}

                            @if($resource->published_date)

                                <div class="academy-resource-show-meta-item">

                                    <div class="academy-resource-show-meta-icon">

                                        <i class="bi bi-calendar3"></i>

                                    </div>

                                    <div>

                                        <span>

                                            {{ __('Published') }}

                                        </span>

                                        <strong>

                                            {{ $resource->published_date->format('Y-m-d') }}

                                        </strong>

                                    </div>

                                </div>

                            @endif



                            {{-- DEPARTMENT --}}

                           


                            @if($departmentTitle)

                                <div class="academy-resource-show-meta-item">

                                    <div class="academy-resource-show-meta-icon">

                                        <i class="bi bi-building"></i>

                                    </div>

                                    <div>

                                        <span>

                                            {{ __('Department') }}

                                        </span>

                                        <strong>

                                            {{ $departmentTitle }}

                                        </strong>

                                    </div>

                                </div>

                            @endif



                            {{-- CLASS --}}

                           

                            @if($classTitle)

                                <div class="academy-resource-show-meta-item">

                                    <div class="academy-resource-show-meta-icon">

                                        <i class="bi bi-book"></i>

                                    </div>

                                    <div>

                                        <span>

                                            {{ __('Class') }}

                                        </span>

                                        <strong>

                                            {{ $classTitle }}

                                        </strong>

                                    </div>

                                </div>

                            @endif

                        </div>


                        {{-- ACTION --}}

                        <div class="academy-resource-show-actions">

                            @if($resource->external_url)

                                <a
                                    href="{{ $resource->external_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="academy-resource-show-primary-button"
                                >

                                    <i class="bi bi-box-arrow-up-right"></i>

                                    {{ __('Open Resource') }}

                                </a>

                            @elseif($resource->file_path)

                                <a
                                    href="{{ asset('storage/' . $resource->file_path) }}"
                                    target="_blank"
                                    class="academy-resource-show-primary-button"
                                >

                                    <i class="bi bi-journal-text"></i>

                                    {{ __('Open Resource') }}

                                </a>

                            @elseif($resource->html_path)

                                <a
                                    href="{{ asset($resource->html_path) }}"
                                    target="_blank"
                                    class="academy-resource-show-primary-button"
                                >

                                    <i class="bi bi-file-earmark-text"></i>

                                    {{ __('Open Resource') }}

                                </a>

                            @endif


                            <a
                                href="{{ route('academy.resources') }}"
                                class="academy-resource-show-secondary-button"
                            >

                                <i class="bi bi-grid"></i>

                                {{ __('All Resources') }}

                            </a>

                        </div>


                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             DESCRIPTION
        ====================================================== --}}

        @if($resource->description)

            <section class="academy-resource-show-description">

                <div class="academy-resource-show-section-heading">

                    <span>

                        <i class="bi bi-journal-text"></i>

                        {{ __('Resource Details') }}

                    </span>

                    <h2>

                        {{ __('About This Resource') }}

                    </h2>

                </div>


                <div class="academy-resource-show-description-card">

                    {!! nl2br(e($resource->description)) !!}

                </div>

            </section>

        @endif



        {{-- =====================================================
             RESOURCE INFORMATION
        ====================================================== --}}

        <section class="academy-resource-show-information">

            <div class="academy-resource-show-section-heading">

                <span>

                    <i class="bi bi-info-circle"></i>

                    {{ __('Additional Information') }}

                </span>

                <h2>

                    {{ __('Resource Information') }}

                </h2>

            </div>


            <div class="row g-4">


                {{-- RESOURCE TYPE --}}

                <div class="col-lg-4 col-md-6">

                    <div class="academy-resource-info-card">

                        <div class="academy-resource-info-icon">

                            <i class="{{ $resourceIcon }}"></i>

                        </div>

                        <div>

                            <span>

                                {{ __('Resource Type') }}

                            </span>

                            <strong>

                                {{ ucfirst(
                                    str_replace(
                                        '_',
                                        ' ',
                                        $resource->resource_type ?? __('Resource')
                                    )
                                ) }}

                            </strong>

                        </div>

                    </div>

                </div>



                {{-- DEPARTMENT --}}

                @if($departmentTitle)

                    <div class="col-lg-4 col-md-6">

                        <div class="academy-resource-info-card">

                            <div class="academy-resource-info-icon">

                                <i class="bi bi-building"></i>

                            </div>

                            <div>

                                <span>

                                    {{ __('Department') }}

                                </span>

                                <strong>

                                    {{ $departmentTitle }}

                                </strong>

                            </div>

                        </div>

                    </div>

                @endif



                {{-- AUTHOR --}}

                @if($resource->author)

                    <div class="col-lg-4 col-md-6">

                        <div class="academy-resource-info-card">

                            <div class="academy-resource-info-icon">

                                <i class="bi bi-person-badge"></i>

                            </div>

                            <div>

                                <span>

                                    {{ __('Author') }}

                                </span>

                                <strong>

                                    {{ $resource->author }}

                                </strong>

                            </div>

                        </div>

                    </div>

                @endif


            </div>

        </section>



        {{-- =====================================================
             BOTTOM CTA
        ====================================================== --}}

        <section class="academy-resource-show-cta">

            <div class="academy-resource-show-cta-card">

                <div class="academy-resource-show-cta-icon">

                    <i class="bi bi-mortarboard-fill"></i>

                </div>


                <div class="academy-resource-show-cta-content">

                    <span>

                        {{ __('Academy Resources') }}

                    </span>

                    <h2>

                        {{ __('Explore More Academic Resources') }}

                    </h2>

                    <p>

                        {{ __('Discover more books, research materials, articles, courses and academic resources from our academy.') }}

                    </p>

                </div>


                <a
                    href="{{ route('academy.resources') }}"
                    class="academy-resource-show-cta-button"
                >

                    {{ __('Explore Resources') }}

                    <i class="bi bi-arrow-right"></i>

                </a>

            </div>

        </section>


    </div>

</section>

@endsection
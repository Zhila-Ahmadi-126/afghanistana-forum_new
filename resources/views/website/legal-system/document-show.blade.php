@extends('layouts.website')

@section('content')

<style>

    /* =========================================
       LEGAL CATEGORY SECTION
    ========================================= */

    .legal-category-section {
        padding: 90px 0;
        background: #ffffff;
    }

   .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("{{ asset('storage/' . $document->cover_image) }}") center center no-repeat;
    background-size: 100% 600px;
     min-height: 300px;
}
    .legal-category-heading {
        text-align: center;
        max-width: 850px;
        margin: 0 auto 60px;
    }

.document-page-header::before {

    content: "";

    position: absolute;

    inset: 0;

    background:
        radial-gradient(
            circle at 20% 50%,
            rgba(255,255,255,0.12),
            transparent 35%
        );

    pointer-events: none;
}


/* Glass Header Box */

.document-header-glass {

    position: relative;

    max-width: 850px;

    padding: 38px 45px;

    background: rgba(255,255,255,0.08);

    border: 1px solid rgba(255,255,255,0.35);

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    border-radius: 4px;

    box-shadow:
        0 15px 45px rgba(0, 25, 60, 0.35);
}


.document-header-label {

    display: inline-block;

    font-size: 13px;

    letter-spacing: 3px;

    text-transform: uppercase;

    color: #f4c542;

    margin-bottom: 12px;
}


    .legal-category-heading span {
        display: inline-block;
        color: #0b3d78;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 3px;
        margin-bottom: 15px;
    }


    .legal-category-heading h2 {
        font-size: 42px;
        font-weight: 700;
        color: #102a43;
        margin-bottom: 20px;
    }


    .legal-category-heading p {
        font-size: 16px;
        line-height: 1.9;
        color: #68778a;
    }


    /* =========================================
       CATEGORY GRID
    ========================================= */

    .legal-category-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
    }


    /* =========================================
       CATEGORY CARD
    ========================================= */

    .legal-category-card {
        position: relative;
        overflow: hidden;

        background: #ffffff;

        border: 1px double rgba(11, 61, 120, 0.35);

        border-radius: 20px;

        box-shadow:
            0 12px 35px rgba(7, 42, 85, 0.16);

        transition:
            transform 0.4s ease,
            box-shadow 0.4s ease,
            border-color 0.4s ease;
    }


    .legal-category-card:hover {

        transform: translateY(-10px);

        border-color: rgba(11, 61, 120, 0.7);

        box-shadow:
            0 25px 60px rgba(7, 42, 85, 0.30);
    }


    /* =========================================
       CATEGORY IMAGE
    ========================================= */

    .legal-category-image {
        height: 220px;
        overflow: hidden;
    }


    .legal-category-image img {

        width: 100%;
        height: 100%;

        object-fit: cover;

        transition:
            transform 0.6s ease;
    }


    .legal-category-card:hover
    .legal-category-image img {

        transform: scale(1.07);
    }


    /* =========================================
       CATEGORY CONTENT
    ========================================= */

    .legal-category-content {

        padding: 28px;
    }


    .legal-category-number {

        display: block;

        font-size: 13px;
        font-weight: 700;

        color: #0b3d78;

        letter-spacing: 2px;

        margin-bottom: 12px;
    }


    .legal-category-content h3 {

        font-size: 23px;

        color: #102a43;

        font-weight: 700;

        margin-bottom: 14px;
    }


    .legal-category-content p {

        color: #68778a;

        font-size: 15px;

        line-height: 1.8;

        margin-bottom: 22px;
    }


    /* =========================================
       READ MORE
    ========================================= */

    .legal-category-read-more {

        display: inline-flex;

        align-items: center;

        gap: 12px;

        text-decoration: none !important;

        color: #0b3d78;

        font-weight: 600;
    }


    .legal-category-read-more .read-more-icon {

        width: 38px;
        height: 38px;

        display: inline-flex;

        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #0b3d78;

        color: #ffffff;

        transition:
            transform 0.35s ease,
            box-shadow 0.35s ease;
    }


    .legal-category-read-more:hover {

        color: #062b59;
    }


    .legal-category-read-more:hover
    .read-more-icon {

        transform: translateX(6px);

        box-shadow:
            0 8px 22px rgba(5, 35, 80, 0.45);
    }


    /* =========================================
       EMPTY STATE
    ========================================= */

    .legal-category-empty {

        text-align: center;

        padding: 50px;

        color: #68778a;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 991px) {

        .legal-category-grid {
            grid-template-columns: repeat(2, 1fr);
        }

    }


    @media (max-width: 767px) {

        .legal-category-grid {
            grid-template-columns: 1fr;
        }

        .legal-category-heading h2 {
            font-size: 32px;
        }

    }

.legal-show-header::after {
    content: "";
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            135deg,
            rgba(16, 42, 67, 0.20),
            transparent 60%
        );

    pointer-events: none;
}


.legal-header-content {
    position: relative;
    z-index: 2;

    max-width: 900px;

    padding: 35px 45px;

    background: rgba(255, 255, 255, 0.08);

    border: 1px solid rgba(255, 255, 255, 0.35);

    border-radius: 18px;

    backdrop-filter: blur(3px);

    box-shadow:
        0 20px 50px rgba(0, 0, 0, 0.20);
}


.legal-header-eyebrow {
    display: inline-block;

    margin-bottom: 12px;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 3px;

    color: #f4c95d;
}


.legal-header-content h1 {
    margin: 0 0 20px;

    color: #fff;

    font-size: clamp(2.3rem, 5vw, 4.2rem);

    font-weight: 700;

    line-height: 1.15;
}


.legal-breadcrumb {
    margin: 0;
    padding: 0;

    display: flex;
    flex-wrap: wrap;
    gap: 8px;

    list-style: none;
}


.legal-breadcrumb li {
    color: rgba(255,255,255,0.85);

    font-size: 14px;
}


.legal-breadcrumb li:not(:last-child)::after {
    content: "/";
    margin-left: 8px;

    color: rgba(255,255,255,0.5);
}


.legal-breadcrumb a {
    color: #fff;
    text-decoration: none;
}


.legal-breadcrumb a:hover {
    color: #f4c95d;
}


/* =========================================================
   MAIN CONTENT
========================================================= */

.legal-show-content {
    padding-top: 90px;
}


/* =========================================================
   INTRO CARD
========================================================= */

.legal-intro-card {
    position: relative;

    max-width: 1100px;

    margin: 0 auto 80px;

    padding: 50px;

    background: #fff;

    border: 1px solid rgba(16, 42, 67, 0.10);

    border-radius: 22px;

    box-shadow:
        0 18px 45px rgba(16, 42, 67, 0.10);

    overflow: hidden;
}












/* =====================================================
   LEGAL CATEGORY SECTION
===================================================== */

.legal-category-section {
    padding: 100px 0 120px;
    background: #ffffff;
}


/* =====================================================
   INTRO CONTAINER
===================================================== */

.legal-category-intro {

    max-width: 1000px;

    margin: 0 auto 75px;

    padding: 45px 55px;

    text-align: center;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.98),
            rgba(245,248,252,0.95)
        );

    border: 1px double rgba(11, 61, 120, 0.35);

    border-radius: 28px;

    box-shadow:
        0 18px 50px rgba(8, 35, 75, 0.14);

    position: relative;

    overflow: hidden;

    transition:
        transform .5s ease,
        box-shadow .5s ease,
        border-color .5s ease;
}


.legal-category-intro::before {

    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    top: -100px;
    right: -80px;

    border-radius: 50%;

    background:
        rgba(11, 61, 120, 0.07);

    transition:
        transform .7s ease;
}


.legal-category-intro:hover {

    transform: translateY(-6px);

    border-color:
        rgba(11, 61, 120, 0.65);

    box-shadow:
        0 28px 70px rgba(8, 35, 75, 0.23);
}


.legal-category-intro:hover::before {

    transform: scale(1.7);
}


/* =====================================================
   LABEL
===================================================== */

.legal-category-label {

    display: inline-block;

    padding: 7px 18px;

    margin-bottom: 18px;

    border-radius: 30px;

    background:
        rgba(11, 61, 120, 0.08);

    border:
        1px solid rgba(11, 61, 120, 0.20);

    color: #0b3d78;

    font-size: 12px;

    font-weight: 700;

    letter-spacing: 3px;

    transition:
        letter-spacing .4s ease,
        transform .4s ease;
}


.legal-category-intro:hover
.legal-category-label {

    letter-spacing: 5px;

    transform: translateY(-2px);
}


/* =====================================================
   TITLE
===================================================== */

.legal-category-intro h1 {

    margin: 0 0 22px;

    color: #102a43;

    font-size: 40px;

    font-weight: 700;

    letter-spacing: .3px;

    transition:
        transform .5s ease,
        letter-spacing .5s ease;
}


.legal-category-intro:hover h1 {

    transform: translateY(-3px);

    letter-spacing: .8px;
}


/* =====================================================
   LONG DESCRIPTION
===================================================== */

.legal-category-description {

    max-width: 780px;

    margin: auto;

    color: #64748b;

    font-size: 16px;

    line-height: 2;

    transition:
        transform .5s ease,
        color .5s ease;
}


.legal-category-intro:hover
.legal-category-description {

    color: #41566d;

    transform: translateY(-2px);
}


/* =====================================================
   CATEGORY CARDS WRAPPER
===================================================== */

.legal-category-cards {

    display: flex;

    justify-content: center;

    align-items: stretch;

    flex-wrap: wrap;

    gap: 28px;

    max-width: 1050px;

    margin: 0 auto;
}


/* =====================================================
   CARD
===================================================== */

.category-item {

    width: 285px;

    background: #ffffff;

    border-radius: 22px;

    overflow: hidden;

    border:
        1px double rgba(11, 61, 120, 0.28);

    box-shadow:
        0 12px 35px rgba(7, 42, 85, 0.17);

    position: relative;

    transition:
        transform .55s cubic-bezier(.2,.8,.2,1),
        box-shadow .5s ease,
        border-color .5s ease;
}


/* =====================================================
   CARD HOVER
===================================================== */

.category-item:hover {

    transform:
        translateY(-14px)
        rotate(-1.5deg)
        scale(1.025);

    border-color:
        rgba(11, 61, 120, 0.70);

    box-shadow:
        0 28px 65px rgba(5, 35, 80, 0.34);
}


/* =====================================================
   IMAGE
===================================================== */

.category-item-image {

    height: 175px;

    position: relative;

    overflow: hidden;
}


.category-item-image img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    transition:
        transform .7s cubic-bezier(.2,.8,.2,1);
}


.category-item:hover
.category-item-image img {

    transform:
        scale(1.10)
        rotate(1deg);
}


/* =====================================================
   IMAGE OVERLAY
===================================================== */

.category-image-overlay {

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(4,25,52,.55),
            transparent 60%
        );

    transition:
        opacity .5s ease;
}


.category-item:hover
.category-image-overlay {

    opacity: .65;
}


/* =====================================================
   NUMBER
===================================================== */

.category-number {

    position: absolute;

    top: 15px;

    left: 15px;

    width: 38px;

    height: 38px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background:
        rgba(255,255,255,.90);

    color: #0b3d78;

    font-size: 12px;

    font-weight: 700;

    box-shadow:
        0 6px 18px rgba(0,0,0,.18);

    transition:
        transform .45s ease;
}


.category-item:hover
.category-number {

    transform:
        rotate(12deg)
        scale(1.12);
}


/* =====================================================
   CONTENT
===================================================== */

.category-item-content {

    padding: 23px 23px 25px;
}


.category-item-content h3 {

    margin: 0 0 12px;

    color: #102a43;

    font-size: 20px;

    font-weight: 700;

    transition:
        transform .4s ease,
        color .4s ease;
}


.category-item:hover
.category-item-content h3 {

    color: #0b3d78;

    transform: translateX(3px);
}


.category-item-content p {

    margin: 0 0 20px;

    color: #718096;

    font-size: 14px;

    line-height: 1.8;

    display: -webkit-box;

    -webkit-line-clamp: 3;

    -webkit-box-orient: vertical;

    overflow: hidden;
}


/* =====================================================
   EXPLORE BUTTON
===================================================== */

.category-read-more {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    padding: 8px 13px 8px 16px;

    border-radius: 30px;

    background:
        rgba(11, 61, 120, 0.07);

    border:
        1px solid rgba(11, 61, 120, 0.18);

    color: #0b3d78;

    font-size: 13px;

    font-weight: 700;

    text-decoration: none !important;

    transition:
        background .4s ease,
        color .4s ease,
        transform .4s ease,
        box-shadow .4s ease;
}


.category-read-more i {

    width: 29px;

    height: 29px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background: #0b3d78;

    color: #ffffff;

    font-size: 11px;

    transition:
        transform .45s ease;
}


.category-read-more:hover {

    background: #0b3d78;

    color: #ffffff;

    transform: translateX(4px);

    box-shadow:
        0 10px 25px rgba(5, 35, 80, 0.28);
}


.category-read-more:hover i {

    background: #ffffff;

    color: #0b3d78;

    transform:
        translateX(4px)
        rotate(-8deg);
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 991px) {

    .legal-category-intro {

        padding: 38px 30px;
    }

    .category-item {

        width: 280px;
    }

}


@media (max-width: 767px) {

    .legal-category-section {

        padding: 70px 0;
    }

    .legal-category-intro {

        padding: 35px 22px;

        border-radius: 22px;
    }

    .legal-category-intro h1 {

        font-size: 30px;
    }

    .legal-category-cards {

        gap: 22px;
    }

    .category-item {

        width: 100%;

        max-width: 340px;
    }

}

</style>


<div class="legal-document-page">


    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <section class="page-header">
<br><br>
        <div class="container">

             <div class="legal-header-content">

            <span class="legal-header-eyebrow">
                LEGAL SYSTEM
            </span>

            <h3 class="text-light">
                {{ $translation?->title ?? 'Legal Category' }}
            </h3>

            <ol class="legal-breadcrumb">

                <li>
                    <a href="{{ route('index') }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('legal-system') }}">
                        Legal System
                    </a>
                </li>

                <li>
                    Lagal Category
                </li>

            </ol>
            

        </div>
        <br>

    </section>

<section class="legal-category-section">

    <div class="container">

        {{-- =========================================
             CATEGORY INTRO CARD
        ========================================== --}}

        <div class="legal-category-intro">

            <div class="legal-category-label">
                LEGAL CATEGORY
            </div>

            <h1>
                {{ $translation?->title ?? 'Legal Category' }}
            </h1>

            @if($translation && $translation->content)
                <div class="legal-category-description">
                    {!! $translation->content !!}
                </div>
            @endif

        </div>


        {{-- =========================================
             CHILD CATEGORIES
        ========================================== --}}

        @if($document->categories->count())

            <div class="legal-category-cards">

                @foreach($document->categories as $category)

                    @if($category->currentTranslation)

                        <article class="category-item">

                            {{-- IMAGE --}}

                            <div class="category-item-image">

                                @if($category->image)

                                    <img
                                        src="{{ asset('storage/' . $category->image) }}"
                                        alt="{{ $category->currentTranslation->title }}"
                                    >

                                @endif

                                <div class="category-image-overlay"></div>

                                <span class="category-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                            </div>


                            {{-- CONTENT --}}

                            <div class="category-item-content">

                                <h3>
                                    {{ $category->currentTranslation->title }}
                                </h3>


                                @if($category->currentTranslation->short_description)

                                    <p>
                                        {{ $category->currentTranslation->short_description }}
                                    </p>

                                @endif


                                <a
                                    href="{{ route('legal-category.show', $category->id) }}"
                                    class="category-read-more"
                                >

                                    <span>
                                        Explore
                                    </span>

                                    <i class="fa fa-arrow-right"></i>

                                </a>

                            </div>

                        </article>

                    @endif

                @endforeach

            </div>

        @endif

    </div>

</section>

@endsection
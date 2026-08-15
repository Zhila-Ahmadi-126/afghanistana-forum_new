@extends('layouts.website')
  
@section('content')
<style>
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("assets/img/lagal_system/lagal_system.jpg") center center no-repeat;
    background-size: cover;
}
/* =========================================
   LEGAL SYSTEM SECTION
========================================= */

.legal-system-section {
    position: relative;
    padding: 100px 0;
    background: #ffffff;
    overflow: hidden;
}


/* -----------------------------------------
   Heading
----------------------------------------- */

.legal-system-heading {
    max-width: 760px;
    margin: 0 auto 60px;
    text-align: center;
}

.legal-system-eyebrow {
    display: inline-block;
    margin-bottom: 12px;

    font-size: 12px;
    font-weight: 700;
    letter-spacing: 3px;

    color: #0b315f;
}

.legal-system-heading h1 {
    margin-bottom: 18px;

    font-size: 42px;
    line-height: 1.2;
    font-weight: 700;

    color: #102f55;
}

.legal-system-heading p {
    max-width: 650px;
    margin: 0 auto;

    font-size: 16px;
    line-height: 1.8;

    color: #68778a;
}



/* -----------------------------------------
   Main Layout
----------------------------------------- */

.legal-system-layout {
    display: grid;

    grid-template-columns:
        minmax(0, 1.35fr)
        70px
        minmax(0, 1fr);

    gap: 35px;

    align-items: stretch;
}



/* -----------------------------------------
   Main Afghanistan Card
----------------------------------------- */

.main-legal-card {
    position: relative;

    background: #ffffff;

    border: 1px solid #e6ebf2;

    border-radius: 24px;

    overflow: hidden;

    box-shadow:
        0 18px 50px rgba(16, 47, 85, 0.08);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
        border: 1px solid rgba(16, 42, 67, 0.10);
border-radius: 18px;
box-shadow: 0 15px 40px rgba(16, 42, 67, 0.12);
overflow: hidden;
}

.main-legal-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 25px 65px rgba(16, 47, 85, 0.14);
}



/* -----------------------------------------
   Main Image
----------------------------------------- */

.main-legal-image {
    position: relative;

    height: 330px;

    overflow: hidden;
}

.main-legal-image img {
    width: 100%;
    height: 100%;

    /* object-fit: contain; */

    transition: transform 0.6s ease;
}

.main-legal-card:hover .main-legal-image img {
    transform: scale(1.05);
}


.image-overlay {
    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(8, 30, 55, 0.65),
            rgba(8, 30, 55, 0.05) 65%
        );
}


.country-badge {
    position: absolute;

    left: 25px;
    bottom: 22px;

    padding: 8px 15px;

    border-radius: 30px;

    background: rgba(255, 255, 255, 0.92);

    color: #0b315f;

    font-size: 12px;
    font-weight: 700;

    letter-spacing: 1px;
}



/* -----------------------------------------
   Main Content
----------------------------------------- */

.main-legal-content {
    position: relative;

    padding: 35px;
}

.legal-card-number {
    display: block;

    margin-bottom: 10px;

    font-size: 12px;
    font-weight: 700;

    color: #d08b28;

    letter-spacing: 2px;
}

.main-legal-content h2 {
    margin-bottom: 15px;

    font-size: 27px;
    font-weight: 700;

    color: #102f55;
}

.main-legal-content p {
    margin-bottom: 25px;

    font-size: 15px;
    line-height: 1.8;

    color: #6b7888;
}



/* -----------------------------------------
   Read More
----------------------------------------- */

.legal-read-more {
    display: inline-flex;

    align-items: center;
    gap: 12px;

    text-decoration: none;

    font-size: 14px;
    font-weight: 700;

    color: #0b315f;

    transition: gap 0.3s ease;
}

.legal-read-more span {
    display: flex;

    align-items: center;
    justify-content: center;

    width: 35px;
    height: 35px;

    border-radius: 50%;

    background: #0b315f;

    color: #ffffff;

    transition:
       
        transform 0.3s ease;
}

.legal-read-more:hover {
    gap: 17px;
}

.legal-read-more:hover span {
    background: #d08b28;

    transform: translateX(3px);
}



/* -----------------------------------------
   Vertical Divider
----------------------------------------- */

.legal-system-divider {
    position: relative;

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: space-around;

    padding: 25px 0;
}


/* Main vertical line */

.legal-system-divider::before {
    content: "";

    position: absolute;

    top: 0;
    bottom: 0;

    left: 50%;

    width: 1px;

    background:
        linear-gradient(
            to bottom,
            transparent,
            #d6dee8 15%,
            #d6dee8 85%,
            transparent
        );
}


/* Connector dots */

.legal-system-divider span {
    position: relative;
    z-index: 2;

    width: 12px;
    height: 12px;

    border-radius: 50%;

    background: #ffffff;

    border: 2px solid #d08b28;

    box-shadow:
        0 0 0 5px #ffffff;
}



/* -----------------------------------------
   Right Side Cards
----------------------------------------- */

.legal-system-side {
    display: flex;

    flex-direction: column;

    justify-content: space-between;

    gap: 20px;
}


.legal-mini-card {
    display: grid;

    grid-template-columns: 125px 1fr;

    min-height: 145px;

    text-decoration: none;

    background: #f8fafc;

    border: 1px solid #e5eaf0;

    border-radius: 18px;

    overflow: hidden;

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        border-color 0.3s ease;
        border: 1px solid rgba(16, 42, 67, 0.08);
border-radius: 14px;
box-shadow: 0 10px 28px rgba(16, 42, 67, 0.10);
overflow: hidden;
transition: all 0.35s ease;
}


.legal-mini-card:hover {
    transform: translateX(6px);

    border-color: #d5dee9;

    box-shadow:
        0 15px 35px rgba(16, 47, 85, 0.09);
      
    transform: translateY(-5px);
    box-shadow: 0 18px 40px rgba(16, 42, 67, 0.18);

}



/* Mini image */

.mini-card-image {
    position: relative;

    overflow: hidden;
}

.mini-card-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform 0.5s ease;
}

.legal-mini-card:hover .mini-card-image img {
    transform: scale(1.08);
}



/* Mini content */

.mini-card-content {
    position: relative;

    display: flex;

    flex-direction: column;

    justify-content: center;

    padding: 22px;
}

.mini-card-content span {
    margin-bottom: 8px;

    font-size: 11px;
    font-weight: 700;

    color: #d08b28;

    letter-spacing: 2px;
}

.mini-card-content h4 {
    margin: 0;

    max-width: 180px;

    font-size: 18px;
    line-height: 1.35;
    font-weight: 700;

    color: #102f55;
}

.mini-card-content > i {
    position: absolute;

    right: 20px;
    bottom: 20px;

    font-size: 13px;

    color: #0b315f;

    transition:
        color 0.3s ease,
        transform 0.3s ease;
}

.legal-mini-card:hover .mini-card-content > i {
    color: #d08b28;

    transform: translateX(4px);
}



/* -----------------------------------------
   Responsive
----------------------------------------- */

@media (max-width: 991px) {

    .legal-system-layout {
        grid-template-columns: 1fr;
        gap: 35px;
    }

    .legal-system-divider {
        display: none;
    }

    .legal-system-side {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 18px;
    }

    .legal-mini-card {
        display: block;
    }

    .mini-card-image {
        height: 150px;
    }

    .mini-card-content {
        min-height: 130px;
    }

}


@media (max-width: 767px) {

    .legal-system-section {
        padding: 70px 0;
    }

    .legal-system-heading h1 {
        font-size: 32px;
    }

    .main-legal-image {
        height: 250px;
    }

    .main-legal-content {
        padding: 25px;
    }

    .legal-system-side {
        grid-template-columns: 1fr;
    }

    .legal-mini-card {
        display: grid;

        grid-template-columns: 110px 1fr;
    }

    .mini-card-image {
        height: auto;
    }

}
/* =========================================
   WORLD LEGAL SYSTEM CARD
========================================= */

.world-legal-card {
    display: grid;

    grid-template-columns: 38% 1fr;

    margin-top: 55px;

    background: #ffffff;

    border: 1px solid #e6ebf2;

    border-radius: 24px;

    overflow: hidden;

    box-shadow:
        0 18px 50px rgba(16, 47, 85, 0.08);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
        border: 1px solid rgba(16, 42, 67, 0.10);
border-radius: 18px;
box-shadow: 0 15px 40px rgba(16, 42, 67, 0.12);
overflow: hidden;
}

.world-legal-card:hover {
    transform: translateY(-5px);
 transform: translateY(-5px);
    box-shadow: 0 22px 50px rgba(16, 42, 67, 0.20);
    box-shadow:
        0 25px 65px rgba(16, 47, 85, 0.13);
}


/* Image */

.world-legal-image {
    position: relative;

    min-height: 280px;

    overflow: hidden;
}

.world-legal-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform 0.6s ease;
}

.world-legal-card:hover .world-legal-image img {
    transform: scale(1.05);
}


/* Content */

.world-legal-content {
    display: flex;

    flex-direction: column;

    justify-content: center;

    padding: 45px;
}

.world-legal-content h2 {
    margin-bottom: 15px;

    font-size: 28px;
    line-height: 1.3;
    font-weight: 700;

    color: #102f55;
}

.world-legal-content p {
    max-width: 700px;

    margin-bottom: 25px;

    font-size: 15px;
    line-height: 1.8;

    color: #6b7888;
}


/* -----------------------------------------
   Responsive World Card
----------------------------------------- */

@media (max-width: 767px) {

    .world-legal-card {
        grid-template-columns: 1fr;

        margin-top: 35px;
    }

    .world-legal-image {
        height: 230px;

        min-height: auto;
    }

    .world-legal-content {
        padding: 28px;
    }

    .world-legal-content h2 {
        font-size: 24px;
    }

}
.main-legal-card,
.legal-mini-card,
.world-legal-card {
    border: 1px solid #102a43;
    border-radius: 18px;
    position: relative;
    overflow: hidden;
}

/* خط دوم ظریف داخل Border */
.main-legal-card::before,
.legal-mini-card::before,
.world-legal-card::before {
    content: "";
    position: absolute;
    inset: 5px;
    border: 1px solid rgba(148, 163, 184, 0.65);
    border-radius: 14px;
    pointer-events: none;
    z-index: 5;
}

</style>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 py-5">
    <div class="container ml-5"  >
        <div style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;  ">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Lagal System</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">lagle System</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">lagal system</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->

<!-- =========================================
     LEGAL SYSTEM PAGE
========================================= -->

<section class="legal-system-section">

    <div class="container">

        <!-- =========================================
             PAGE HEADING
        ========================================== -->

        <div class="legal-system-heading">

            <span class="legal-system-eyebrow">
                LEGAL SYSTEM
            </span>

            <h1>
                Legal System
            </h1>

            <p>
                Legal systems establish the framework of laws, rights,
                responsibilities, and institutions within a country.
                They are shaped by a nation’s constitution, history,
                culture, religion, and legal traditions.
            </p>

        </div>


        <!-- =========================================
             LEGAL SYSTEMS LOOP
        ========================================== -->

        @foreach($legalSystems as $legalSystem)

            @php

                /*
                |--------------------------------------------------------------------------
                | Current Language Translation
                |--------------------------------------------------------------------------
                */

                $translation = $legalSystem->translations
                    ->where('language_id', $currentLanguageId)
                    ->first();


                /*
                |--------------------------------------------------------------------------
                | English Fallback
                |--------------------------------------------------------------------------
                */

                if (!$translation) {

                    $translation = $legalSystem->translations
                        ->where('language_id', $englishLanguageId)
                        ->first();

                }

            @endphp


            @if($translation)


                <!-- =====================================
                     FIRST LEGAL SYSTEM
                     MAIN CARD + DOCUMENTS
                ====================================== -->

                @if($loop->first)

                    <div class="legal-system-layout">


                        <!-- =================================
                             MAIN LEGAL SYSTEM CARD
                        ================================== -->

                        <div class="main-legal-card">

                            <div class="main-legal-image">

                                <img
                                    src="{{ asset('storage/' . $legalSystem->image) }}"
                                    alt="{{ $translation->title }}"
                                >

                                <div class="image-overlay"></div>

                                <span class="country-badge">
                                    {{ $translation->title }}
                                </span>

                            </div>


                            <div class="main-legal-content">

                                <span class="legal-card-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <h2>
                                    {{ $translation->title }}
                                </h2>

                                <p>
                                    {{ $translation->summary }}
                                </p>


                                <a
                                    href="{{ route('legal-system.show', $legalSystem->id) }}"
                                    class="legal-read-more"
                                >

                                    Read More

                                    <span>
                                        <i class="fa fa-arrow-right"></i>
                                    </span>

                                </a>

                            </div>

                        </div>



                        <!-- =================================
                             VERTICAL DIVIDER
                        ================================== -->

                        <div class="legal-system-divider">

                            <span></span>
                            <span></span>
                            <span></span>

                        </div>



                        <!-- =================================
                             LEGAL DOCUMENTS
                        ================================== -->

                        <div class="legal-system-side">

                            @foreach($legalSystem->documents as $document)

                                @php

                                    /*
                                    |--------------------------------------------------------------------------
                                    | Document Translation
                                    |--------------------------------------------------------------------------
                                    */

                                    $documentTranslation =
                                        $document->translations
                                            ->where('language_id', $currentLanguageId)
                                            ->first();


                                    /*
                                    |--------------------------------------------------------------------------
                                    | English Fallback
                                    |--------------------------------------------------------------------------
                                    */

                                    if (!$documentTranslation) {

                                        $documentTranslation =
                                            $document->translations
                                                ->where('language_id', $englishLanguageId)
                                                ->first();

                                    }

                                @endphp


                                @if($documentTranslation)

                                    <a
                                        href="#"
                                        class="legal-mini-card"
                                    >

                                        <div class="mini-card-image">

                                            <img
                                                src="{{ asset('storage/' . $document->cover_image) }}"
                                                alt="{{ $documentTranslation->title }}"
                                            >

                                        </div>


                                        <div class="mini-card-content">

                                            <span>
                                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                            </span>

                                            <h4>
                                                {{ $documentTranslation->title }}
                                            </h4>

                                            <i class="fa fa-arrow-right"></i>

                                        </div>

                                    </a>

                                @endif

                            @endforeach

                        </div>

                    </div>


                <!-- =====================================
                     OTHER LEGAL SYSTEMS
                     COUNTRIES / WORLD
                ====================================== -->

                @else


                    <div class="world-legal-card">


                        <!-- ===============================
                             IMAGE
                        ================================ -->

                        <div class="world-legal-image">

                            <img
                                src="{{ asset('storage/' . $legalSystem->image) }}"
                                alt="{{ $translation->title }}"
                            >

                            <div class="image-overlay"></div>

                            <span class="country-badge">
                                {{ $translation->title }}
                            </span>

                        </div>



                        <!-- ===============================
                             CONTENT
                        ================================ -->

                        <div class="world-legal-content">

                            <div>

                                <span class="legal-card-number">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>

                                <h2>
                                    {{ $translation->title }}
                                </h2>

                                <p>
                                    {{ $translation->summary }}
                                </p>

                            </div>


                            <a
                                href="{{ route('legal-system.show', $legalSystem->id) }}"
                                class="legal-read-more"
                            >

                                Read More

                                <span>
                                    <i class="fa fa-arrow-right"></i>
                                </span>

                            </a>

                        </div>


                    </div>

                @endif

            @endif

        @endforeach


    </div>

</section>


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>


@endsection
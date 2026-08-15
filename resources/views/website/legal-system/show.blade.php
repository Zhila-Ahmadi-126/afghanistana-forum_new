@extends('layouts.website')

@section('content')

<style>

/* =========================================================
   LEGAL SYSTEM SHOW PAGE
========================================================= */

.legal-show-page {
    background: #f8fafc;
    padding-bottom: 100px;
}


/* =========================================================
   PAGE HEADER
========================================================= */
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("{{ asset('storage/' . $legalSystem->image) }}") center center no-repeat;
    background-size: 100% 600px;
     min-height: 300px;
}
/* .legal-show-header {
    position: relative;
    min-height: 300px;

    background:
        linear-gradient(
            rgba(7, 24, 39, 0.58),
            rgba(7, 24, 39, 0.72)
        ),
        url('{{ asset('storage/' . $legalSystem->image) }}')
        center center / cover no-repeat;

    display: flex;
    align-items: center;
} */


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


.legal-intro-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 5px;

    background: linear-gradient(
        90deg,
        #102a43,
        #486581,
        #f4c95d
    );
}


.legal-intro-label {
    display: inline-block;

    margin-bottom: 12px;

    color: #486581;

    font-size: 13px;
    font-weight: 700;

    letter-spacing: 2px;

    text-transform: uppercase;
}


.legal-intro-card h2 {
    margin-bottom: 25px;

    color: #102a43;

    font-size: clamp(2rem, 4vw, 3rem);

    font-weight: 700;
}


.legal-long-description {
    color: #52667a;

    font-size: 17px;

    line-height: 2;

    margin: 0;
}


/* =========================================================
   DOCUMENTS HEADING
========================================================= */

.legal-documents-heading {
    max-width: 1100px;

    margin: 0 auto 40px;

    text-align: center;
}


.legal-documents-heading span {
    display: block;

    margin-bottom: 10px;

    color: #486581;

    font-size: 13px;

    font-weight: 700;

    letter-spacing: 3px;
}


.legal-documents-heading h3 {
    margin: 0;

    color: #102a43;

    font-size: 32px;

    font-weight: 700;
}


.legal-documents-heading p {
    max-width: 700px;

    margin: 15px auto 0;

    color: #718096;

    line-height: 1.8;
}


/* =========================================================
   DOCUMENT GRID
========================================================= */

.legal-documents-grid {
    max-width: 1100px;

    margin: 0 auto;

    display: grid;

    grid-template-columns:
        repeat(3, minmax(0, 1fr));

    gap: 28px;
}


/* =========================================================
   DOCUMENT CARD
========================================================= */

.legal-document-card {
    position: relative;

    display: flex;

    flex-direction: column;

    background: #fff;

    border: 1px solid rgba(16, 42, 67, 0.10);

    border-radius: 18px;

    overflow: hidden;

    text-decoration: none;

    box-shadow:
        0 12px 32px rgba(16, 42, 67, 0.09);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        border-color 0.35s ease;
}


.legal-document-card:hover {

    transform: translateY(-9px);

    border-color: rgba(16, 42, 67, 0.25);

    box-shadow:
        0 25px 55px rgba(16, 42, 67, 0.18);
}


/* =========================================================
   DOCUMENT IMAGE
========================================================= */

.legal-document-image {
    position: relative;

    height: 240px;

    overflow: hidden;
}


.legal-document-image img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition:
        transform 0.6s ease;
}


.legal-document-card:hover
.legal-document-image img {

    transform: scale(1.08);
}


.legal-document-image::after {
    content: "";

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            to top,
            rgba(7, 24, 39, 0.50),
            transparent 55%
        );
}


/* =========================================================
   DOCUMENT NUMBER
========================================================= */

.legal-document-number {

    position: absolute;

    z-index: 3;

    top: 18px;
    left: 18px;

    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(16, 42, 67, 0.90);

    border: 1px solid rgba(255,255,255,0.45);

    color: #fff;

    font-size: 13px;

    font-weight: 700;
}


/* =========================================================
   DOCUMENT CONTENT
========================================================= */

.legal-document-content {

    display: flex;

    flex-direction: column;

    flex: 1;

    padding: 28px;
}


.legal-document-content h4 {

    margin: 0 0 14px;

    color: #102a43;

    font-size: 21px;

    font-weight: 700;

    line-height: 1.4;
}


.legal-document-content p {

    margin: 0 0 25px;

    color: #718096;

    font-size: 14px;

    line-height: 1.8;
}


/* =========================================================
   READ MORE
========================================================= */

.legal-document-read-more {

    margin-top: auto;

    display: inline-flex;

    align-items: center;

    justify-content: space-between;

    color: #102a43;

    font-size: 14px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 1px;
}


.legal-document-read-more span {

    width: 38px;
    height: 38px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #102a43;

    color: #fff;

    transition:
        transform 0.3s ease,
        background 0.3s ease;
}


.legal-document-card:hover
.legal-document-read-more span {

    transform: translateX(5px);

    background: #486581;
}


/* =========================================================
   EMPTY DOCUMENTS
========================================================= */

.legal-empty-documents {

    max-width: 700px;

    margin: 0 auto;

    padding: 40px;

    text-align: center;

    background: #fff;

    border: 1px dashed rgba(16, 42, 67, 0.20);

    border-radius: 18px;

    color: #718096;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .legal-documents-grid {

        grid-template-columns:
            repeat(2, minmax(0, 1fr));
    }

    .legal-header-content {

        padding: 30px;
    }

}


@media (max-width: 767px) {

    .legal-show-header {

        min-height: 360px;
    }

    .legal-header-content {

        padding: 25px;

    }

    .legal-intro-card {

        padding: 30px 25px;

    }

    .legal-documents-grid {

        grid-template-columns: 1fr;

    }

}













/* =========================================
   LEGAL SYSTEM SHOW - PAGE HEADER
========================================= */





/* Hover */
.legal-document-card:hover {
    transform: translateY(-8px);

    border-color: rgba(15, 45, 85, 0.55);

    box-shadow:
        0 20px 50px rgba(5, 30, 75, 0.48);
}


/* =========================================
   CARD IMAGE
========================================= */

.legal-document-card img {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition: transform 0.5s ease;
}


.legal-document-card:hover img {
    transform: scale(1.05);
}


/* =========================================
   READ MORE
========================================= */

.legal-read-more {
    display: inline-flex;

    align-items: center;
    gap: 10px;

    text-decoration: none !important;

    color: #0b3d78 !important;

    font-weight: 600;

    text-transform: none !important;

    transition: all 0.3s ease;
}


/* Circle Arrow */
.legal-read-more .read-more-icon {
    width: 42px;
    height: 42px;

    border-radius: 50%;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    background: #0b3d78;

    color: white;

    transition: all 0.35s ease;
}


/* Hover */
.legal-read-more:hover {
    color: #062b59 !important;
}


.legal-read-more:hover .read-more-icon {
    transform: translateX(6px);

    box-shadow:
        0 8px 20px rgba(5, 35, 80, 0.45);
}
</style>


<!-- =========================================================
     PAGE HEADER
========================================================= -->

<section class="page-header">
  <br><br>
    <div class="container">

        <div class="legal-header-content">

            <span class="legal-header-eyebrow">
                LEGAL SYSTEM
            </span>

            <h3 class="text-light">
                {{ $legalSystem->translations->first()->title ?? 'Legal System' }}
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
                    {{ $legalSystem->translations->first()->title ?? 'Legal System' }}
                </li>

            </ol>

        </div>

    </div>
<br>
</section>



<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<section class="legal-show-page">
    

    <div class="container legal-show-content">


        <!-- =================================================
             LEGAL SYSTEM INTRO
        ================================================== -->

        @php

            $translation =
                $legalSystem->translations->first();

        @endphp


        @if($translation)

            <div class="legal-intro-card">

                <span class="legal-intro-label">
                    Legal System Overview
                </span>

                <h2>
                    {{ $translation->title }}
                </h2>

                @if($translation->content)

                    <div class="legal-long-description">
                        {!! $translation->content !!}
                    </div>

                @elseif($translation->summary)

                    <p class="legal-long-description">
                        {{ $translation->summary }}
                    </p>

                @endif

            </div>

        @endif



        <!-- =================================================
             LEGAL DOCUMENTS
        ================================================== -->

        <div class="legal-documents-heading">
          



            <span>
                LEGAL STRUCTURE
            </span>

            <h3>
                Main Areas of the Legal System
            </h3>

            <p>
                Explore the main legal areas and branches associated
                with this legal system.
            </p>

        </div>



        @if($legalSystem->documents->count())


            <div class="legal-documents-grid">


                @foreach($legalSystem->documents as $document)

                    @php

                        $documentTranslation =
                            $document->translations->first();

                    @endphp


                    @if($documentTranslation)

                        <a
                           href="{{ route('legal-document.show', $document->id) }}"
                            class="legal-document-card"
                        >


                            <!-- IMAGE -->

                            <div class="legal-document-image">

                                <img
                                    src="{{ asset('storage/' . $document->cover_image) }}"
                                    alt="{{ $documentTranslation->title }}"
                                >


                                <span class="legal-document-number">

                                    {{ str_pad(
                                        $loop->iteration,
                                        2,
                                        '0',
                                        STR_PAD_LEFT
                                    ) }}

                                </span>

                            </div>



                            <!-- CONTENT -->

                            <div class="legal-document-content">

                                <h4>
                                    {{ $documentTranslation->title }}
                                </h4>


                                @if($documentTranslation->summary)

                                    <p>
                                        {{ $documentTranslation->summary }}
                                    </p>

                                @endif


                                <div class="legal-document-read-more">

                                   
                                    <p style="color:darkblue;"> Read More <i class="fa fa-arrow-right"></i>
                                  
                                        </p> 
                                </div>

                            </div>


                        </a>

                    @endif

                @endforeach


            </div>


        @else

            <div class="legal-empty-documents">

                No legal documents are available for this legal system yet.

            </div>

        @endif


    </div>

</section>


<!-- =========================================================
     BACK TO TOP
========================================================= -->

<a
    href="#"
    class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"
>
    <i class="bi bi-arrow-up"></i>
</a>


@endsection
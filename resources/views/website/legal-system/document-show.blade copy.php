@extends('layouts.website')

@section('content')

<style>

/* =========================================================
   LEGAL DOCUMENT SINGLE PAGE
========================================================= */

.legal-document-page {
    background: #ffffff;
    padding-bottom: 80px;
}


/* =========================================================
   PAGE HEADER
========================================================= */


/* =========================================================
   PAGE HEADER
========================================================= */
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("{{ asset('storage/' . $document->cover_image) }}") center center no-repeat;
    background-size: 100% 600px;
     min-height: 300px;
}
/* 
.document-page-header {

    min-height: 390px;

    display: flex;
    align-items: center;

    position: relative;

    background:
        linear-gradient(
            rgba(4, 25, 55, 0.48),
            rgba(4, 25, 55, 0.48)
        ),
        url("{{ asset('storage/' . $document->cover_image) }}")
        center center / cover no-repeat;

    overflow: hidden;
} */


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


.document-header-glass h1 {

    color: #ffffff;

    font-size: clamp(32px, 5vw, 58px);

    font-weight: 700;

    margin-bottom: 15px;
}


.document-header-glass p {

    color: rgba(255,255,255,0.88);

    margin: 0;

    max-width: 700px;

    line-height: 1.8;
}


/* =========================================================
   MAIN CONTENT
========================================================= */

.document-content-wrapper {

    max-width: 1100px;

    margin: 70px auto 0;

}


/* Intro */

.document-intro {

    margin-bottom: 55px;
}


.document-eyebrow {

    color: #0b3d78;

    font-size: 13px;

    font-weight: 700;

    letter-spacing: 3px;

    text-transform: uppercase;

    margin-bottom: 10px;
}


.document-intro h2 {

    color: #102a43;

    font-size: 34px;

    font-weight: 700;

    margin-bottom: 20px;
}


.document-intro .document-summary {

    font-size: 18px;

    line-height: 1.9;

    color: #536579;

    max-width: 900px;
}


/* =========================================================
   CONTENT CARD
========================================================= */

.document-main-card {

    position: relative;

    background: #ffffff;

    padding: 45px;

    border-radius: 18px;

    border: 1px solid rgba(15, 45, 85, 0.15);

    box-shadow:
        0 15px 40px rgba(8, 35, 75, 0.18);

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}


.document-main-card:hover {

    transform: translateY(-5px);

    box-shadow:
        0 25px 60px rgba(5, 30, 75, 0.28);
}


.document-main-card::before {

    content: "";

    position: absolute;

    left: 0;
    top: 30px;
    bottom: 30px;

    width: 4px;

    background: #0b3d78;

    border-radius: 0 5px 5px 0;
}


.document-main-card h3 {

    color: #102a43;

    font-size: 26px;

    margin-bottom: 20px;
}


.document-main-card p {

    color: #526579;

    line-height: 1.95;

    font-size: 16px;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.document-back {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    margin-top: 35px;

    color: #0b3d78;

    font-weight: 600;

    text-decoration: none;

    transition: .3s ease;
}


.document-back:hover {

    color: #062b59;

    transform: translateX(-5px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .document-page-header {

        min-height: 330px;
    }

    .document-header-glass {

        padding: 28px 25px;
    }

    .document-content-wrapper {

        margin-top: 45px;

        padding: 0 18px;
    }

    .document-main-card {

        padding: 30px 25px;
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

            <div class="document-header-glass">

                <span class="document-header-label">
                    Legal Category
                </span>

                <h1>
                    {{ $translation->title }}
                </h1>

                @if($translation->summary)

                    <p>
                        {{ $translation->summary }}
                    </p>

                @endif

            </div>

        </div>
        <br>

    </section>



    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <section class="document-content-wrapper">


        <!-- Intro -->

        <div class="document-intro">

            <div class="document-eyebrow">
                Legal Category
            </div>

            <h2>
                {{ $translation->title }}
            </h2>

            @if($translation->summary)

                <div class="document-summary">
                    {{ $translation->summary }}
                </div>

            @endif

        </div>



        <!-- Long Description -->

        @if($translation->content)

            <div class="document-main-card">

                <h3>
                    {{ $translation->title }}
                </h3>

                <div>
                    {!! $translation->content !!}
                </div>

            </div>

        @endif



        <!-- Back -->

        <a
            href="{{ route('legal-system.show', $document->legal_system_id) }}"
            class="document-back"
        >

            <i class="fa fa-arrow-left"></i>

            <span>
                Back to Legal System
            </span>

        </a>


    </section>

</div>

@endsection
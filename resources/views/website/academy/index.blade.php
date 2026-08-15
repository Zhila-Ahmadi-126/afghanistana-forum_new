@extends('layouts.website')


@section('content')


<style>

    /* =========================================================
       ACADEMY HOME
    ========================================================= */

    .academy-page {
        position: relative;
        overflow: hidden;
        padding: 80px 0 100px;
        background: #ffffff;
    }


    /* =========================================================
       BACKGROUND GLOW
    ========================================================= */

    .academy-page::before,
    .academy-page::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        filter: blur(90px);
        pointer-events: none;
        z-index: 0;
    }

    .academy-page::before {
        width: 320px;
        height: 320px;
        background: rgba(0, 70, 180, 0.16);
        top: 80px;
        left: -120px;
    }

    .academy-page::after {
        width: 300px;
        height: 300px;
        background: rgba(110, 40, 200, 0.13);
        right: -100px;
        top: 420px;
    }


    .academy-container {
        position: relative;
        z-index: 1;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .academy-hero {
        position: relative;
        padding: 75px 55px;
        margin-bottom: 80px;

        border-radius: 35px;

        background:
            linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.88),
                rgba(240, 247, 255, 0.72)
            );

        border: 1px solid rgba(255, 255, 255, 0.9);

        box-shadow:
            0 25px 70px rgba(0, 50, 120, 0.10),
            inset 0 1px 0 rgba(255, 255, 255, 0.95);

        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);

        overflow: hidden;
    }


    .academy-hero::before {
        content: "";
        position: absolute;

        width: 260px;
        height: 260px;

        right: -100px;
        top: -100px;

        border-radius: 50%;

        background: rgba(0, 86, 179, 0.12);

        filter: blur(5px);
    }


    .academy-hero::after {
        content: "";
        position: absolute;

        width: 180px;
        height: 180px;

        left: -80px;
        bottom: -80px;

        border-radius: 50%;

        background: rgba(120, 50, 200, 0.10);

        filter: blur(5px);
    }


    .academy-hero-content {
        position: relative;
        z-index: 2;
        max-width: 850px;
    }


    .academy-label {
        display: inline-flex;
        align-items: center;
        gap: 9px;

        padding: 9px 17px;

        border-radius: 50px;

        background: rgba(0, 70, 150, 0.08);

        border: 1px solid rgba(0, 70, 150, 0.14);

        color: #0754a6;

        font-size: 14px;
        font-weight: 600;

        letter-spacing: 0.5px;

        margin-bottom: 22px;
    }


    .academy-label i {
        font-size: 17px;
    }


    .academy-hero-title {
        margin: 0 0 20px;

        font-size: clamp(38px, 5vw, 64px);

        font-weight: 800;

        line-height: 1.08;

        color: #10233f;

        letter-spacing: -1.5px;
    }


    .academy-hero-title span {
        color: #0754a6;
    }


    .academy-hero-text {
        max-width: 760px;

        margin: 0 0 32px;

        font-size: 18px;

        line-height: 1.9;

        color: #5d6b7e;
    }


    .academy-hero-actions {
        display: flex;
        flex-wrap: wrap;
        gap: 14px;
    }


    .academy-btn-primary,
    .academy-btn-secondary {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;

        padding: 13px 23px;

        border-radius: 50px;

        text-decoration: none;

        font-weight: 600;

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            background 0.3s ease;
    }


    .academy-btn-primary {
        color: #ffffff;
        background: #0754a6;

        box-shadow:
            0 10px 25px rgba(7, 84, 166, 0.25);
    }


    .academy-btn-primary:hover {
        color: #ffffff;
        transform: translateY(-3px);

        box-shadow:
            0 15px 32px rgba(7, 84, 166, 0.32);
    }


    .academy-btn-secondary {
        color: #0754a6;

        background: rgba(255, 255, 255, 0.7);

        border: 1px solid rgba(7, 84, 166, 0.18);
    }


    .academy-btn-secondary:hover {
        color: #0754a6;

        transform: translateY(-3px);

        background: #ffffff;

        box-shadow:
            0 10px 25px rgba(0, 40, 100, 0.08);
    }


    /* =========================================================
       SECTION HEADING
    ========================================================= */

    .academy-section-heading {
        margin-bottom: 40px;
    }


    .academy-section-label {
        display: inline-block;

        margin-bottom: 10px;

        color: #0754a6;

        font-size: 14px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: 1.5px;
    }


    .academy-section-title {
        margin: 0;

        color: #10233f;

        font-size: 36px;

        font-weight: 750;
    }


    .academy-section-description {
        max-width: 720px;

        margin: 14px 0 0;

        color: #697789;

        line-height: 1.8;
    }


    /* =========================================================
       PROGRAM CARDS
    ========================================================= */

   .academy-program-card {
    position: relative;
    height: 100%;
    padding: 32px;

    border-radius: 28px;

    background: rgba(255, 255, 255, 0.48);

    border: 1px solid rgba(255, 255, 255, 0.85);

    box-shadow:
        0 18px 45px rgba(13, 35, 75, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    overflow: hidden;

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        border-color 0.45s ease;
}


/* Colored Glow */

.academy-program-card::before {
    content: "";

    position: absolute;

    width: 170px;
    height: 170px;

    right: -80px;
    top: -80px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(45, 110, 255, 0.20) 0%,
            rgba(45, 110, 255, 0.08) 35%,
            transparent 72%
        );

    filter: blur(8px);

    transition:
        transform 0.5s ease,
        opacity 0.5s ease;
}


/* Second Glow */

.academy-program-card::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    left: -70px;
    bottom: -75px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(150, 65, 220, 0.16) 0%,
            rgba(255, 130, 50, 0.08) 40%,
            transparent 72%
        );

    filter: blur(12px);

    transition:
        transform 0.5s ease,
        opacity 0.5s ease;
}


/* Hover */

.academy-program-card:hover {

    transform:
        translateY(-12px)
        scale(1.015);

    border-color:
        rgba(120, 150, 220, 0.55);

    box-shadow:
        0 28px 65px rgba(20, 55, 120, 0.14),
        0 0 35px rgba(80, 100, 220, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 1);
}


.academy-program-card:hover::before {
    transform:
        scale(1.35)
        translate(-10px, 10px);
}


.academy-program-card:hover::after {
    transform:
        scale(1.35)
        translate(15px, -10px);
}

   .academy-program-icon {
    position: relative;
    z-index: 2;

    width: 64px;
    height: 64px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 23px;

    border-radius: 20px;

    background:
        linear-gradient(
            135deg,
            rgba(35, 95, 210, 0.12),
            rgba(135, 60, 210, 0.10)
        );

    border: 1px solid rgba(255, 255, 255, 0.8);

    box-shadow:
        0 10px 25px rgba(30, 70, 150, 0.10);

    color: #173f91;

    font-size: 27px;

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        background 0.45s ease;
}


.academy-program-card:hover .academy-program-icon {

    transform:
        translateY(-5px)
        rotate(-6deg)
        scale(1.12);

    background:
        linear-gradient(
            135deg,
            rgba(45, 110, 255, 0.18),
            rgba(160, 70, 220, 0.17)
        );

    box-shadow:
        0 12px 30px rgba(65, 85, 190, 0.18),
        0 0 20px rgba(120, 70, 220, 0.12);
}


    .academy-program-title {
        position: relative;

        margin: 0 0 12px;

        color: #142942;

        font-size: 23px;

        font-weight: 700;
    }


    .academy-program-description {
        position: relative;

        margin: 0;

        color: #68778a;

        line-height: 1.8;

        font-size: 15px;
    }


    .academy-program-link {
        position: relative;

        display: inline-flex;
        align-items: center;
        gap: 7px;

        margin-top: 22px;

        color: #0754a6;

        font-size: 14px;

        font-weight: 700;

        text-decoration: none;
    }


    .academy-program-link i {
        transition: transform 0.3s ease;
    }


    .academy-program-link:hover {
        color: #0754a6;
    }


    .academy-program-card:hover .academy-program-link i {
        transform: translateX(5px);
    }


    /* =========================================================
       WHY ACADEMY
    ========================================================= */

    .academy-features {
        margin-top: 90px;
    }


    .academy-feature {
        height: 100%;

        padding: 27px;

        border-radius: 24px;

        background: rgba(255, 255, 255, 0.65);

        border: 1px solid rgba(220, 230, 242, 0.9);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease;
    }


    .academy-feature:hover {
        transform: translateY(-6px);

        box-shadow:
            0 18px 40px rgba(20, 55, 100, 0.09);
    }


    .academy-feature-icon {
        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 18px;

        border-radius: 16px;

        background: rgba(7, 84, 166, 0.08);

        color: #0754a6;

        font-size: 22px;
    }


    .academy-feature h3 {
        margin-bottom: 9px;

        color: #172b46;

        font-size: 19px;

        font-weight: 700;
    }


    .academy-feature p {
        margin: 0;

        color: #718095;

        font-size: 14px;

        line-height: 1.75;
    }


    /* =========================================================
       CALL TO ACTION
    ========================================================= */

    .academy-cta {
        position: relative;

        margin-top: 90px;

        padding: 55px 45px;

        border-radius: 32px;

        background:
             linear-gradient(
                135deg,
                rgba(2, 3, 72, 0.97),
                rgba(158, 158, 159, 0.777)
            );
        overflow: hidden;

        box-shadow:
            0 25px 55px rgba(7, 65, 130, 0.20);
    }


    .academy-cta::before {
        content: "";

        position: absolute;

        width: 260px;
        height: 260px;

        right: -90px;
        top: -130px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.08);
    }


    .academy-cta::after {
        content: "";

        position: absolute;

        width: 180px;
        height: 180px;

        left: -70px;
        bottom: -90px;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.06);
    }


    .academy-cta-content {
        position: relative;
        z-index: 2;
    }


    .academy-cta h2 {
        margin: 0 0 12px;

        color: #ffffff;

        font-size: 32px;

        font-weight: 750;
    }


    .academy-cta p {
        max-width: 680px;

        margin: 0 0 25px;

        color: rgba(255, 255, 255, 0.82);

        line-height: 1.8;
    }


    .academy-cta .academy-btn-secondary {
        background: #ffffff;

        border-color: #ffffff;

        color: #0754a6;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 768px) {

        .academy-page {
            padding: 50px 0 70px;
        }

        .academy-hero {
            padding: 45px 28px;
            border-radius: 27px;
            margin-bottom: 60px;
        }

        .academy-hero-title {
            font-size: 39px;
        }

        .academy-hero-text {
            font-size: 16px;
        }

        .academy-section-title {
            font-size: 29px;
        }

        .academy-cta {
            padding: 40px 28px;
        }

        .academy-cta h2 {
            font-size: 27px;
        }

    }
/* =========================================================
   ACADEMY PROGRAM / DEPARTMENT CARDS
   LIGHT DARK-BLUE GLASS
   ========================================================= */

.academy-program-card {
    position: relative;
    height: 100%;

    padding: 32px;

    border-radius: 28px;

    /* Light Dark-Blue Glass */
    background:
        linear-gradient(
            145deg,
            rgba(28, 66, 115, 0.13),
            rgba(15, 52, 100, 0.08)
        );

    border: 1px solid rgba(55, 105, 165, 0.25);

    box-shadow:
        0 12px 30px rgba(20, 65, 120, 0.10),
        0 0 22px rgba(55, 115, 190, 0.07),
        inset 0 1px 0 rgba(255, 255, 255, 0.75),
        inset 0 -1px 0 rgba(25, 65, 115, 0.06);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    overflow: hidden;

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        border-color 0.45s ease,
        background 0.45s ease;
}


/* Blue / Purple Glow */

.academy-program-card::before {
    content: "";

    position: absolute;

    width: 190px;
    height: 190px;

    top: -100px;
    right: -80px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(45, 110, 220, 0.25) 0%,
            rgba(65, 90, 200, 0.13) 38%,
            transparent 72%
        );

    filter: blur(10px);

    pointer-events: none;

    transition:
        transform 0.6s ease,
        opacity 0.5s ease;
}


/* Bottom Purple / Blue Glow */

.academy-program-card::after {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    bottom: -105px;
    left: -80px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(95, 75, 205, 0.18) 0%,
            rgba(60, 120, 210, 0.10) 40%,
            transparent 72%
        );

    filter: blur(12px);

    pointer-events: none;

    transition:
        transform 0.6s ease,
        opacity 0.5s ease;
}


/* Hover */

.academy-program-card:hover {

    transform:
        translateY(-10px)
        scale(1.015);

    background:
        linear-gradient(
            145deg,
            rgba(25, 67, 120, 0.17),
            rgba(15, 55, 105, 0.11)
        );

    border-color:
        rgba(45, 105, 180, 0.38);

    box-shadow:
        0 25px 55px rgba(20, 65, 125, 0.16),
        0 0 35px rgba(55, 110, 210, 0.12),
        0 0 70px rgba(90, 80, 200, 0.06),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);
}


.academy-program-card:hover::before {
    transform:
        scale(1.35)
        translate(-10px, 10px);
}


.academy-program-card:hover::after {
    transform:
        scale(1.35)
        translate(15px, -15px);
}


/* =========================================================
   PROGRAM ICON
   ========================================================= */

.academy-program-icon {

    position: relative;
    z-index: 2;

    width: 64px;
    height: 64px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 23px;

    border-radius: 20px;

    background:
        linear-gradient(
            135deg,
            rgba(40, 105, 205, 0.18),
            rgba(95, 75, 190, 0.13)
        );

    border: 1px solid rgba(70, 120, 190, 0.22);

    color: #174f91;

    font-size: 27px;

    box-shadow:
        0 8px 22px rgba(30, 75, 145, 0.12),
        inset 0 1px 0 rgba(255, 255, 255, 0.75);

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        background 0.45s ease;
}


.academy-program-card:hover .academy-program-icon {

    transform:
        translateY(-5px)
        rotate(-6deg)
        scale(1.1);

    background:
        linear-gradient(
            135deg,
            rgba(40, 110, 220, 0.25),
            rgba(120, 70, 205, 0.20)
        );

    box-shadow:
        0 12px 30px rgba(45, 90, 180, 0.20),
        0 0 22px rgba(100, 75, 205, 0.13);
}


/* =========================================================
   PROGRAM TEXT
   ========================================================= */

.academy-program-title {
    position: relative;
    z-index: 2;

    margin: 0 0 12px;

    color: #16375d;

    font-size: 23px;

    font-weight: 700;
}


.academy-program-description {
    position: relative;
    z-index: 2;

    margin: 0;

    color: #536a83;

    line-height: 1.8;

    font-size: 15px;
}


.academy-program-link {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;
    gap: 7px;

    margin-top: 22px;

    color: #18599e;

    font-size: 14px;

    font-weight: 700;

    text-decoration: none;

    transition:
        color 0.3s ease,
        transform 0.3s ease;
}


.academy-program-link:hover {
    color: #6845ad;
}


.academy-program-link i {
    transition: transform 0.3s ease;
}


.academy-program-card:hover .academy-program-link i {
    transform: translateX(6px);
}
/* =========================================================
   ACADEMY FEATURE CARDS
   LIGHT DARK-BLUE GLASS
   ========================================================= */

.academy-feature {

    position: relative;

    height: 100%;

    padding: 30px;

    border-radius: 26px;

    background:
        linear-gradient(
            145deg,
            rgba(28, 66, 115, 0.12),
            rgba(15, 52, 100, 0.075)
        );

    border: 1px solid rgba(55, 105, 165, 0.23);

    box-shadow:
        0 12px 30px rgba(20, 65, 120, 0.09),
        0 0 25px rgba(55, 115, 190, 0.06),
        inset 0 1px 0 rgba(255, 255, 255, 0.75);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    overflow: hidden;

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        border-color 0.45s ease,
        background 0.45s ease;
}


/* Glow */

.academy-feature::before {

    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: -70px;
    top: -70px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(45, 110, 220, 0.22),
            rgba(70, 90, 190, 0.08) 45%,
            transparent 72%
        );

    filter: blur(9px);

    pointer-events: none;

    transition:
        transform 0.6s ease;
}


/* Bottom Glow */

.academy-feature::after {

    content: "";

    position: absolute;

    width: 140px;
    height: 140px;

    left: -65px;
    bottom: -70px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(100, 70, 200, 0.15),
            rgba(45, 110, 210, 0.07) 45%,
            transparent 72%
        );

    filter: blur(10px);

    pointer-events: none;

    transition:
        transform 0.6s ease;
}


/* Hover */

.academy-feature:hover {

    transform:
        translateY(-9px)
        scale(1.012);

    background:
        linear-gradient(
            145deg,
            rgba(25, 67, 120, 0.16),
            rgba(15, 55, 105, 0.10)
        );

    border-color:
        rgba(50, 105, 180, 0.36);

    box-shadow:
        0 24px 50px rgba(20, 65, 125, 0.15),
        0 0 35px rgba(55, 110, 210, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);
}


.academy-feature:hover::before {
    transform:
        scale(1.35)
        translate(-10px, 10px);
}


.academy-feature:hover::after {
    transform:
        scale(1.35)
        translate(12px, -12px);
}


/* =========================================================
   FEATURE ICON
   ========================================================= */

.academy-feature-icon {

    position: relative;
    z-index: 2;

    width: 56px;
    height: 56px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 20px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            rgba(40, 105, 205, 0.17),
            rgba(100, 70, 195, 0.12)
        );

    border: 1px solid rgba(65, 115, 185, 0.20);

    color: #205a9c;

    font-size: 23px;

    box-shadow:
        0 8px 22px rgba(30, 75, 145, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.75);

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        background 0.45s ease;
}


.academy-feature:hover .academy-feature-icon {

    transform:
        translateY(-4px)
        rotate(5deg)
        scale(1.1);

    background:
        linear-gradient(
            135deg,
            rgba(40, 110, 220, 0.24),
            rgba(125, 70, 205, 0.19)
        );

    box-shadow:
        0 12px 28px rgba(45, 90, 180, 0.18),
        0 0 20px rgba(100, 75, 205, 0.11);
}


/* =========================================================
   FEATURE TEXT
   ========================================================= */

.academy-feature h3 {

    position: relative;
    z-index: 2;

    margin-bottom: 10px;

    color: #17395f;

    font-size: 20px;

    font-weight: 700;
}


.academy-feature p {

    position: relative;
    z-index: 2;

    margin: 0;

    color: #596f87;

    font-size: 14px;

    line-height: 1.8;
}
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("assets/img/academy/academy1.jpg") center center no-repeat;
       background-size: 100% 100% ;
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
<div class="container-fluid page-header mb-5 py-5" style="height:400px">
    <div class="container ml-5"   >
        <div style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;   ">
            <h1 class="display-3 text-white mb-3 animated slideInDown"> Our Academy</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">Academy</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Our Academy</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->

<section class="academy-page">

    <div class="container academy-container">


        {{-- =====================================================
             HERO
        ====================================================== --}}

        <section class="academy-hero">

            <div class="academy-hero-content">

                <div class="academy-label">

                    <i class="bi bi-mortarboard-fill"></i>

                    {{ __('Afghanistan Legal Academy') }}

                </div>


                <h1 class="academy-hero-title">

                    {{ __('Learn Law.') }}

                    <span>{{ __('Build Your Future.') }}</span>

                </h1>


                <p class="academy-hero-text">

                    {{ __(
                        'A professional educational platform dedicated to legal knowledge, practical training, and academic development.'
                    ) }}

                </p>


                <div class="academy-hero-actions">

                    <a href="{{ route('academy.programs') }}" class="academy-btn-primary">

                        <i class="bi bi-grid-3x3-gap"></i>

                        {{ __('Explore Programs') }}

                    </a>


                    <a href="{{ route('academy.apply') }}" class="academy-btn-secondary">

                        <i class="bi bi-person-plus"></i>

                        {{ __('Apply Now') }}

                    </a>

                </div>

            </div>

        </section>



        {{-- =====================================================
             PROGRAMS
        ====================================================== --}}

        <section class="academy-programs">


            <div class="academy-section-heading text-center">

                <span class="academy-section-label">

                    {{ __('Academic Departments') }}

                </span>


                <h2 class="academy-section-title">

                    {{ __('Explore Our Departments') }}

                </h2>


                <p class=" text-center">

                    {{ __(
                        'Explore our academic departments and discover opportunities for professional and academic development.'
                    ) }}

                </p>

            </div>



            <div class="row g-4 justify-content-center">


                @forelse($departments as $department)

                    @php

                        $translation = $department->translations->first();

                        $departmentTitle =
                            $translation?->title
                            ?? $department->code;

                        $departmentDescription =
                            $translation?->short_description
                            ?? '';

                    @endphp


                    <div class="col-lg-4 col-md-6  ">


                        <article class="academy-program-card ">


                            <div class="academy-program-icon">

                                @if($department->icon)

                                    <i class="{{ $department->icon }}"></i>

                                @else

                                    <i class="bi bi-mortarboard"></i>

                                @endif

                            </div>

                            <h6> Department of</h6>
                            <h3 class="academy-program-title">
                             
                                

                                {{ $departmentTitle }} 

                            </h3>


                            @if($departmentDescription)

                                <p class="academy-program-description">

                                    {{ $departmentDescription }}

                                </p>

                            @endif


                          <a
                            href="{{ route('academy.department.show', $department->id) }}"
                            class="academy-program-link"
                        >
                            {{ __('Explore Department') }}

                            <i class="bi bi-arrow-right"></i>
                        </a>


                        </article>


                    </div>


                @empty

                    <div class="col-12">

                        <div class="academy-program-card text-center">

                            <div class="academy-program-icond mx-auto">

                                <i class="bi bi-mortarboarddd"></i>

                            </div>


                            <h3 class="academy-program-title">

                                {{ __('Programs Coming Soon') }}

                            </h3>


                            <p class="academy-program-description">

                                {{ __(
                                    'Our academic programs are currently being prepared. Please check back soon.'
                                ) }}

                            </p>

                        </div>

                    </div>

                @endforelse


            </div>

        </section>



        {{-- =====================================================
             WHY ACADEMY
        ====================================================== --}}

        <section class="academy-features   text-center">


            <div class="academy-section-heading">

                <span class="academy-section-label">

                    {{ __('Why Choose Our Academy') }}

                </span>


                <h2 class="academy-section-title">

                    {{ __('Learn. Practice. Grow.') }}

                </h2>

            </div>



            <div class="row g-4">


                <div class="col-lg-4 col-md-6">

                    <div class="academy-feature">

                        <div class="academy-feature-icon">

                            <i class="bi bi-book-half"></i>

                        </div>


                        <h3>

                            {{ __('Professional Education') }}

                        </h3>


                        <p>

                            {{ __(
                                'Structured legal education designed to develop strong academic and professional foundations.'
                            ) }}

                        </p>

                    </div>

                </div>



                <div class="col-lg-4 col-md-6">

                    <div class="academy-feature">

                        <div class="academy-feature-icon">

                            <i class="bi bi-briefcase"></i>

                        </div>


                        <h3>

                            {{ __('Practical Learning') }}

                        </h3>


                        <p>

                            {{ __(
                                'Connect legal knowledge with practical skills and real-world professional challenges.'
                            ) }}

                        </p>

                    </div>

                </div>



                <div class="col-lg-4 col-md-6">

                    <div class="academy-feature">

                        <div class="academy-feature-icon">

                            <i class="bi bi-award"></i>

                        </div>


                        <h3>

                            {{ __('Academic Development') }}

                        </h3>


                        <p>

                            {{ __(
                                'Build your knowledge, strengthen your skills, and progress toward your professional goals.'
                            ) }}

                        </p>

                    </div>

                </div>


            </div>

        </section>



        {{-- =====================================================
             CALL TO ACTION
        ====================================================== --}}

        <section class="academy-cta">

            <div class="academy-cta-content">

                <h2>

                    {{ __('Ready to Begin Your Legal Journey?') }}

                </h2>


                <p>

                    {{ __(
                        'Explore our programs and take the next step toward building your legal knowledge and professional future.'
                    ) }}

                </p>


                <a href="{{ route('academy.programs') }}" class="academy-btn-secondary">

                    <i class="bi bi-arrow-right-circle"></i>

                    {{ __('Explore Programs') }}

                </a>

            </div>

        </section>


    </div>

</section>


@endsection
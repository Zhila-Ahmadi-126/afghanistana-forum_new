@extends('layouts.website')

@section('content')

<style>
/* ==========================================================
   SCIENTIFIC MEETING — 03 MARCH 2012
   PREMIUM GLASSMORPHISM DESIGN
========================================================== */

 .meeting-page {
    position: relative;
    overflow: hidden;
    padding: 110px 0 100px;

    color: darkblue;
    min-height: 100vh;
}

/* Decorative glowing lights */

.meeting-page::before,
.meeting-page::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    pointer-events: none;
}

.meeting-page::before {
    width: 350px;
    height: 350px;
    background: rgba(92, 178, 255, 0.18);
    top: -100px;
    left: -120px;
}

.meeting-page::after {
    width: 400px;
    height: 400px;
    background: rgba(177, 109, 255, 0.15);
    right: -150px;
    bottom: -100px;
}

.meeting-wrapper {
    position: relative;
    z-index: 2;
}


/* ==========================================================
   HEADER
========================================================== */

.meeting-header {
    text-align: center;
    max-width: 950px;
    color: darkblue;
    margin: 0 auto 50px;
}

.meeting-date {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    padding: 10px 22px;
    margin-bottom: 24px;

    border-radius: 50px;

    color: darkblue;
    font-size: 14px;
    font-weight: 600;

    background:
        linear-gradient(
            135deg,
            rgba(65, 168, 255, 0.20),
            rgba(150, 100, 255, 0.15)
        );

    border: 1px solid rgba(117, 207, 255, 0.35);

    box-shadow:
        0 0 25px rgba(50, 165, 255, 0.12),
        inset 0 1px 0 rgba(255,255,255,0.18);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
}

.meeting-date i {
    color: #9bdfff;
}

.meeting-title {
    margin: 0;

    color: darkblue;

    font-size: 42px;
    font-weight: 700;

    line-height: 1.35;

    text-shadow:
        0 4px 25px rgba(0,0,0,0.35);
}

.meeting-title span {
    display: inline-block;

    background:
        linear-gradient(
            90deg,
            #78d9ff,
            #d3c4ff,
            #f4d98a
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.meeting-divider {
    width: 170px;
    height: 1px;

    margin: 25px auto 20px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(117, 211, 255, 0.8),
            rgba(218, 190, 111, 0.8),
            transparent
        );

    position: relative;
}

.meeting-divider i {
    position: absolute;

    left: 50%;
    top: 50%;

    transform: translate(-50%, -50%);

    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #dceeff;

    background: #0b2851;

    border: 1px solid rgba(115, 205, 255, 0.35);

    box-shadow: 0 0 20px rgba(73, 182, 255, 0.18);
}

.meeting-subtitle {
    max-width: 700px;
    margin: 0 auto;

    color: darkblue;

    font-size: 15px;
    line-height: 1.9;
}


/* ==========================================================
   INTRO GLASS
========================================================== */

.meeting-intro {
    max-width: 900px;
    margin: 0 auto 55px;

    padding: 30px 38px;

    text-align: center;

    background:
        linear-gradient(
            135deg,
            rgba(65, 151, 255, 0.13),
            rgba(135, 94, 210, 0.12),
            rgba(246, 210, 111, 0.06)
        );

    border: 1px solid rgba(126, 207, 255, 0.25);

    border-radius: 24px;
    

    box-shadow:
        0 20px 55px rgba(0, 0, 0, 0.20),
        inset 0 1px 0 rgba(255,255,255,0.14);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
}

.meeting-intro-icon {
    width: 52px;
    height: 52px;

    margin: -55px auto 18px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #c9eeff;

    background:
        linear-gradient(
            135deg,
            rgba(45, 151, 255, 0.35),
            rgba(142, 87, 255, 0.28)
        );

    border: 1px solid rgba(130, 218, 255, 0.35);

    box-shadow:
        0 0 30px rgba(67, 171, 255, 0.15);
}

.meeting-intro p {
    margin: 0;

    color: darkblue;

    font-size: 15px;
    line-height: 2;
}


/* ==========================================================
   DOCUMENT GRID
========================================================== */

.meeting-documents {
    display: grid;

    grid-template-columns: repeat(3, minmax(0, 1fr));

    gap: 26px;

    max-width: 1150px;

    margin: 0 auto;
}


/* ==========================================================
   CARD
========================================================== */

.meeting-document-card {
    position: relative;

    min-height: 275px;

    padding: 34px 28px 28px;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;

    text-align: center;

    overflow: hidden;

    border-radius: 25px;

    background:
        linear-gradient(
            145deg,
            rgba(61, 143, 255, 0.22),
            rgba(107, 75, 184, 0.18),
            rgba(238, 204, 104, 0.08)
        );

    border: 1px solid rgba(130, 207, 255, 0.28);

    box-shadow:
        0 18px 45px rgba(0, 0, 0, 0.24),
        inset 0 1px 0 rgba(255,255,255,0.15);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        border-color 0.45s ease;
        color: darkblue;
}

/* glowing corner */

.meeting-document-card::before {
    content: "";

    position: absolute;

    width: 170px;
    height: 170px;

    top: -90px;
    right: -90px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(112, 207, 255, 0.28),
            rgba(112, 207, 255, 0)
        );

    transition: 0.5s ease;
}

/* bottom glow */

.meeting-document-card::after {
    content: "";

    position: absolute;

    width: 180px;
    height: 100px;

    bottom: -70px;
    left: 50%;

    transform: translateX(-50%);

    background: rgba(119, 93, 255, 0.22);

    filter: blur(45px);

    transition: 0.5s ease;
}

.meeting-document-card:hover {
    transform: translateY(-10px) scale(1.015);

    border-color: rgba(119, 213, 255, 0.55);

    box-shadow:
        0 28px 65px rgba(0, 0, 0, 0.34),
        0 0 35px rgba(54, 171, 255, 0.10),
        inset 0 1px 0 rgba(255,255,255,0.22);
}

.meeting-document-card:hover::before {
    transform: scale(1.5);
}

.meeting-document-card:hover::after {
    opacity: 1.4;
}


/* ==========================================================
   CARD ICON
========================================================== */

.meeting-document-icon {
    position: relative;
    z-index: 2;

    width: 62px;
    height: 62px;

    margin-bottom: 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 18px;

    color: #c9edff;

    font-size: 22px;

    background:
        linear-gradient(
            135deg,
            rgba(55, 163, 255, 0.30),
            rgba(145, 87, 255, 0.28)
        );

    border: 1px solid rgba(135, 216, 255, 0.35);

    box-shadow:
        0 8px 25px rgba(22, 100, 180, 0.18),
        inset 0 1px 0 rgba(255,255,255,0.16);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease;
}

.meeting-document-card:hover .meeting-document-icon {
    transform: translateY(-4px) rotate(3deg);

    box-shadow:
        0 12px 32px rgba(47, 169, 255, 0.24),
        0 0 25px rgba(130, 91, 255, 0.12);
}


/* ==========================================================
   CARD TEXT
========================================================== */

.meeting-document-title {
    position: relative;
    z-index: 2;

    color: darkblue;

    width: 100%;

    margin: 0 auto 25px;

    color: #f4f9ff;

    font-size: 16px;
    font-weight: 600;

    line-height: 1.9;

    text-align: center;
}


/* ==========================================================
   READ MORE
========================================================== */

.meeting-document-footer {
    position: relative;
    z-index: 3;

    width: 100%;

    display: flex;
    justify-content: center;

    margin-top: auto;
}

.meeting-multiple-files {
    gap: 10px;
}

.meeting-read-more {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 9px;

    padding: 10px 20px;

    min-width: 125px;

    border-radius: 50px;

    text-decoration: none;

    color: #e8f8ff;

    font-size: 12px;
    font-weight: 600;

    background:
        linear-gradient(
            135deg,
            rgba(57, 157, 255, 0.20),
            rgba(128, 85, 225, 0.18)
        );

    border: 1px solid rgba(117, 209, 255, 0.35);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,0.12);

    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);

    transition:
        all 0.35s ease;
}

.meeting-read-more:hover {
    color: #ffffff;

    transform: translateY(-2px);

    background:
        linear-gradient(
            135deg,
            rgba(55, 169, 255, 0.40),
            rgba(132, 91, 236, 0.35)
        );

    border-color: rgba(150, 225, 255, 0.65);

    box-shadow:
        0 8px 25px rgba(41, 155, 230, 0.16);
}

.meeting-read-more i {
    transition: transform 0.3s ease;
}

.meeting-read-more:hover i {
    transform: translateX(-4px);
}


/* ==========================================================
   LAST CARD — CENTER
========================================================== */

.meeting-document-card:last-child {
    grid-column: 2;
}


/* ==========================================================
   BOTTOM DECORATION
========================================================== */

.meeting-bottom-divider {
    width: 180px;
    height: 1px;

    margin: 65px auto 0;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(104, 198, 255, 0.5),
            rgba(230, 198, 105, 0.5),
            transparent
        );
}


/* ==========================================================
   TABLET
========================================================== */

@media (max-width: 991.98px) {

    .meeting-title {
        font-size: 34px;
    }

    .meeting-documents {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .meeting-document-card:last-child {
        grid-column: 1 / -1;

        max-width: 370px;

        width: 100%;

        justify-self: center;
    }
}


/* ==========================================================
   MOBILE
========================================================== */

@media (max-width: 767.98px) {

    .meeting-page {
        padding: 75px 0 70px;
    }

    .meeting-title {
        font-size: 27px;
        line-height: 1.55;
    }

    .meeting-subtitle {
        font-size: 13px;
    }

    .meeting-intro {
        margin-top: 45px;
        padding: 28px 20px 24px;
        border-radius: 20px;
    }

    .meeting-intro p {
        font-size: 13px;
        line-height: 2;
        color: darkblue;
    }

    .meeting-documents {
        grid-template-columns: 1fr;

        gap: 20px;
    }

    .meeting-document-card {
        min-height: 255px;

        padding: 30px 22px 25px;

        border-radius: 22px;
    }

    .meeting-document-card:last-child {
        grid-column: auto;

        max-width: none;
    }

    .meeting-document-title {
        font-size: 15px;
        line-height: 1.9;
        color: darkblue;
    }
}


/* ==========================================================
   SMALL MOBILE
========================================================== */

@media (max-width: 420px) {

    .meeting-title {
        font-size: 23px;
    }

    .meeting-date {
        font-size: 12px;
        padding: 9px 17px;
    }

    .meeting-document-card {
        min-height: 245px;
    }
}
</style>


<section class="meeting-page">

    <div class="container meeting-wrapper">

        <!-- HEADER -->
        <div class="meeting-header">

            <div class="meeting-date">
                <i class="far fa-calendar-alt"></i>
                04 October 2014
            </div>

           <h1 class="meeting-title">
                    The Second General Assembly of the
                    <span>Association of Afghan Lawyers in Europe</span>
                </h1>

            <div class="meeting-divider">
                <i class="fas fa-balance-scale"></i>
            </div>

            <p class="meeting-subtitle">
                The Second General Assembly of the Association of Afghan Lawyers in 
                Europe was held with the participation of Afghan lawyers residing in Europe
            </p>

        </div>


        <!-- INTRO -->
        <div class="meeting-intro">

            <div class="meeting-intro-icon">
                <i class="far fa-file-alt"></i>
            </div>

            <p>
               The Second General Assembly of the Association of Afghan Lawyers in Europe was held on October 4, 2014. During the assembly, members discussed the Association’s legal activities, objectives, and future plans, and shared their views 
               and recommendations aimed at strengthening cooperation among Afghan lawyers in Europe.
            </p>

        </div>


        <!-- DOCUMENT CARDS -->
        <div class="meeting-documents">


            <!-- 01 -->
            <article class="meeting-document-card" >

                <div class="meeting-document-icon">
                    <i class="far fa-file-pdf"></i>
                </div>

                <h3 class="meeting-document-title" style=" color: darkblue;">
                   Messages presented at the meeting title
                </h3>

                <div class="meeting-document-footer">

                    <a href="{{ asset('assets/img/about/files/payamha121214.pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="meeting-read-more">

                        Read More
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </article>


            <!-- 02 -->
            <article class="meeting-document-card">

                <div class="meeting-document-icon">
                    <i class="far fa-file-pdf"></i>
                </div>

                <h3 class="meeting-document-title" style=" color: darkblue;">
                    Message from the Afghanistan Civil Society and Human Rights Network
                </h3>

                <div class="meeting-document-footer">

                    <a href="{{ asset('assets/img/about/files/payam121214.pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="meeting-read-more">

                        Read More
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </article>


            <!-- 03 -->
            <article class="meeting-document-card">

                <div class="meeting-document-icon">
                    <i class="far fa-file-pdf"></i>
                </div>

                <h3 class="meeting-document-title" style=" color: darkblue;">
                  Membership of the Association in the Afghanistan Civil Society and Human Rights Network
                </h3>

                <div class="meeting-document-footer">

                    <a href="{{ asset('assets/img/about/files/membership121214.pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="meeting-read-more">

                        Read More
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </article>


            <!-- 04 -->
            <article class="meeting-document-card">

                <div class="meeting-document-icon">
                    <i class="far fa-file-pdf"></i>
                </div>

                <h3 class="meeting-document-title" style=" color: darkblue;">
                    Notice <br>

                    Regarding the Organization of the Second Conference of the Association of Afghan Lawyers in Europe
                </h3>

                <div class="meeting-document-footer">

                    <a href="{{ asset('assets/img/about/files/etlaya300914.pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="meeting-read-more">

                        Read More
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </article>


            <!-- 05 -->
            <article class="meeting-document-card">

                <div class="meeting-document-icon">
                    <i class="far fa-file-pdf"></i>
                </div>

                <h3 class="meeting-document-title" style=" color: darkblue;">
                  Venue Address 
                <br>
                    The Second General Assembly of the Association, held on October 25, 2014, in Hamburg, Germany
                </h3>

                <div class="meeting-document-footer">

                    <a href="{{ asset('assets/img/about/files/adres-131014.pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="meeting-read-more">

                        Read More
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </article>


        


            <!-- 07 -->
            <article class="meeting-document-card">

                <div class="meeting-document-icon">
                    <i class="far fa-file-pdf"></i>
                </div>
<h3 class="meeting-document-title" style=" color: darkblue;">
                   Information Regarding the Organization of the Second Conference of the Association
                </h3>

                <div class="meeting-document-footer">

                   <a href="{{ asset('assets/img/about/files/program171014.pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="meeting-read-more">

                        Read More
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>

            </article>


    



       
        <div class="meeting-bottom-divider"></div>

    </div>

</section>

@endsection
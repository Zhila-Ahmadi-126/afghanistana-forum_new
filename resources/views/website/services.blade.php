@extends('layouts.website')

@section('content')



<style>
    /* =========================================================
   SERVICES SECTION
========================================================= */


   .page-header {
 background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("/assets/img/services/services.jpg") center center no-repeat;
    background-size: 100% 100%;
     min-height: 300px;
}


.services-section {
    
    position: relative;
    padding: 110px 0 120px;
    background:
        radial-gradient(
            circle at 10% 20%,
            rgba(38, 102, 153, 0.08),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 80%,
            rgba(244, 201, 93, 0.08),
            transparent 30%
        ),
        #f8fafc;
    overflow: hidden;
}


.services-container {
    width: min(1200px, 92%);
    margin: auto;
}


/* =========================================================
   HEADING
========================================================= */

.services-heading {
    text-align: center;
    max-width: 750px;
    margin: 0 auto 70px;
    animation: serviceFadeUp 1s ease both;
}


.services-eyebrow {
    display: inline-block;
    margin-bottom: 12px;

    font-size: 12px;
    font-weight: 800;
    letter-spacing: 4px;

    color: #1e5d8c;
}


.services-heading h2 {
    margin: 0;

    font-family: Georgia, serif;

    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;

    color: #102a43;
}


.services-heading p {
    margin: 20px auto 0;

    max-width: 650px;

    font-size: 15px;
    line-height: 1.9;

    color: #64748b;
}


.services-heading-line {
    display: flex;
    align-items: center;
    justify-content: center;

    gap: 12px;

    margin-top: 25px;
}


.services-heading-line span {
    width: 65px;
    height: 1px;

    background: #b7c9d8;
}


.services-heading-line i {
    width: 35px;
    height: 35px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #1e5d8c;
    background: #fff;

    border: 1px solid rgba(30, 93, 140, .2);

    box-shadow:
        0 5px 20px rgba(16, 42, 67, .08);
}


/* =========================================================
   GRID
========================================================= */

.services-grid {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 28px;
}


/* =========================================================
   CARD
========================================================= */

.service-card {
    position: relative;

    min-height: 270px;

    padding: 38px 38px 35px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.96),
            rgba(247,250,252,.88)
        );

    border: 1px solid rgba(30, 93, 140, .13);

    border-radius: 24px;

    overflow: hidden;

    box-shadow:
        0 15px 45px rgba(16, 42, 67, .07);

    transition:
        transform .55s cubic-bezier(.2,.8,.2,1),
        box-shadow .55s ease,
        border-color .4s ease;

    animation: serviceFadeUp .8s ease both;
}


/* Decorative glow */

.service-card::before {
    content: "";

    position: absolute;

    width: 180px;
    height: 180px;

    top: -90px;
    right: -90px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(45, 125, 180, .14),
            transparent 70%
        );

    transition: .6s ease;
}


.service-card::after {
    content: "";

    position: absolute;

    left: 0;
    bottom: 0;

    width: 0;
    height: 3px;

    background:
        linear-gradient(
            90deg,
            #1e5d8c,
            #6fa8c9,
            #f4c95d
        );

    transition: width .5s ease;
}


.service-card:hover {
    transform:
        translateY(-12px)
        rotateX(2deg)
        rotateY(-2deg);

    border-color: rgba(30, 93, 140, .3);

    box-shadow:
        0 28px 65px rgba(16, 42, 67, .15);
}


.service-card:hover::before {
    transform: scale(2.2);
}


.service-card:hover::after {
    width: 100%;
}


/* =========================================================
   NUMBER
========================================================= */

.service-number {
    position: absolute;

    top: 25px;
    right: 30px;

    font-family: Georgia, serif;

    font-size: 42px;
    font-weight: 700;

    color: rgba(30, 93, 140, 0.47);

    transition: .4s ease;
}


.service-card:hover .service-number {
     color: rgba(151, 77, 34, 0.85);
     

    transform: translateY(-5px);
}


/* =========================================================
   ICON
========================================================= */

.service-icon {
    width: 62px;
    height: 62px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 25px;

    border-radius: 18px;

    color: #fff;

    background:
        linear-gradient(
            135deg,
            #123d5a,
            #2879a8
        );

    box-shadow:
        0 12px 28px rgba(30, 93, 140, .22);

    transition:
        transform .5s ease,
        border-radius .5s ease,
        box-shadow .5s ease;
}


.service-icon i {
    font-size: 22px;
}


.service-card:hover .service-icon {
    transform:
        rotate(-8deg)
        scale(1.08);
 background:
        linear-gradient(
            135deg,
            #9c4617,
            #e4b02f
        );
    border-radius: 50%;

    box-shadow:
        0 15px 35px rgba(30, 93, 140, .3);
}


/* =========================================================
   CONTENT
========================================================= */

.service-content {
    position: relative;
    z-index: 2;

    max-width: 500px;
}


.service-content h3 {
    margin: 0 0 14px;

    color: #102a43;

    font-size: 21px;
    font-weight: 700;

    line-height: 1.4;

    transition: color .4s ease;
}


.service-card:hover .service-content h3 {
    color: #1e5d8c;
}


.service-content p {
    margin: 0;

    color: #64748b;

    font-size: 14px;

    line-height: 1.9;
}


/* =========================================================
   ARROW
========================================================= */

.service-arrow {
    position: absolute;

    right: 32px;
    bottom: 30px;

    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #1e5d8c;

    background: rgba(30, 93, 140, .07);

    transition:
        transform .45s ease,
        background .45s ease,
        color .45s ease;
}


.service-card:hover .service-arrow {
    color: #fff;

    background: #1e5d8c;

    transform:
        translateX(5px)
        rotate(-10deg);
}


/* =========================================================
   ANIMATION
========================================================= */

@keyframes serviceFadeUp {

    from {
        opacity: 0;
        transform: translateY(35px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 768px) {

    .services-section {
        padding: 80px 0;
    }

    .services-grid {
        grid-template-columns: 1fr;
    }

    .service-card {
        min-height: 250px;
        padding: 30px;
    }

    .service-number {
        font-size: 34px;
        right: 22px;
    }

}


@media (max-width: 480px) {

    .services-container {
        width: 90%;
    }

    .services-heading {
        margin-bottom: 45px;
    }

    .service-card {
        padding: 26px;
        border-radius: 20px;
    }

    .service-content h3 {
        font-size: 19px;
    }

    .service-content p {
        font-size: 13px;
    }

    .service-arrow {
        right: 22px;
        bottom: 22px;
    }

}
 
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
   
    align-items: center;
    gap: 9px;

    padding: 10px 22px;
   

    

   
 background:
        radial-gradient(circle at 10% 15%, rgba(167, 193, 239, 0.19), transparent 30%),
        radial-gradient(circle at 90% 20%, rgba(237, 212, 100, 0.173), transparent 30%),
        radial-gradient(circle at 50% 90%, rgba(105, 198, 241, 0.13), transparent 35%),
        linear-gradient(
            135deg,
            #0142b31b 0%,
            #def9661f 28%,
            #3ebff62d 52%,
            #face551a 76%,
            #647bed37 100%
        );


    border: 1px solid rgba(117, 207, 255, 0.35);

    box-shadow:
        0 0 25px rgba(50, 165, 255, 0.12),
        inset 0 1px 0 rgba(255,255,255,0.18);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
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
<div class="container-fluid page-header " style="height:400px;padding-top:100px;">
    <div class="container ml-5"   >
        <div style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white; padding:20px;  ">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Services</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                           
                            <li class="breadcrumb-item text-white active" aria-current="page">Services</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>

<section class="services-section meeting-page meeting-date m-0">

    <div class="services-container">

        {{-- Section Heading --}}
        <div class="services-heading">

            <span class="services-eyebrow">
                WHAT WE PROVIDE
            </span>

            <h2>
                Our Services
            </h2>

            <p>
                Professional legal resources, education, research and information
                provided by The Nationwide Association of Afghan Jurists in Europe.
            </p>

            <div class="services-heading-line">
                <span></span>
                <i class="fa fa-balance-scale"></i>
                <span></span>
            </div>

        </div>


        {{-- Services Grid --}}
        <div class="services-grid">


            {{-- 01 --}}
            <div class="service-card">

                <div class="service-number">01</div>

                <div class="service-icon">
                    <i class="fa fa-book"></i>
                </div>

                <div class="service-content">

                    <h3>
                        Legal Resources & Information
                    </h3>

                    <p>
                        The Nationwide Association of Afghan Jurists in Europe provides
                        accessible legal information, laws, legal systems,
                        documents and academic resources for lawyers,
                        students and everyone interested in the field of law.
                    </p>

                </div>

                

            </div>



            {{-- 02 --}}
            <div class="service-card">

                <div class="service-number">02</div>

                <div class="service-icon">
                    <i class="fa fa-balance-scale"></i>
                </div>

                <div class="service-content">

                    <h3>
                        Legal Systems of Afghanistan & the World
                    </h3>

                    <p>
                        Explore the legal system of Afghanistan and other
                        countries, including their structures, laws,
                        legal documents and distinctive characteristics.
                    </p>

                </div>

                

            </div>



            {{-- 03 --}}
            <div class="service-card">

                <div class="service-number">03</div>

                <div class="service-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>

                <div class="service-content">

                    <h3>
                        Legal Academy & Education
                    </h3>

                    <p>
                        Our Legal Academy supports the development of legal
                        knowledge through educational materials, academic
                        articles, study resources and specialized content.
                    </p>

                </div>

                

            </div>



            {{-- 04 --}}
            <div class="service-card">

                <div class="service-number">04</div>

                <div class="service-icon">
                    <i class="fa fa-laptop"></i>
                </div>

                <div class="service-content">

                    <h3>
                        Digital Library & Electronic Resources
                    </h3>

                    <p>
                        Access a digital collection of legal books,
                        academic articles, legal documents and electronic
                        resources for research and educational purposes.
                    </p>

                </div>

                

            </div>



            {{-- 05 --}}
            <div class="service-card">

                <div class="service-number">05</div>

                <div class="service-icon">
                    <i class="fa fa-archive"></i>
                </div>

                <div class="service-content">

                    <h3>
                        Legal Documents & Activities Archive
                    </h3>

                    <p>
                        Our archive preserves historical information,
                        biographies of lawyers, academic activities,
                        announcements, articles and documents related
                        to the Association.
                    </p>

                </div>

                

            </div>



            {{-- 06 --}}
            <div class="service-card">

                <div class="service-number">06</div>
                {{-- 06 --}}
                <div class="service-icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="service-content">

                    <h3>
                        Legal News & Events
                    </h3>

                    <p>
                        Stay informed about the latest legal news,
                        events and developments related to the legal
                        and academic fields in Afghanistan and around
                        the world.
                    </p>

                </div>

                

            </div>



            {{-- 07 --}}
            <div class="service-card">

                <div class="service-number">07</div>

              <div class="service-icon">
                <i class="bi bi-bar-chart-line-fill"></i>
            </div>

                <div class="service-content">

                    <h3>
                        Legal Reports & Information
                    </h3>

                    <p>
                        Our reports section provides information about
                        important events, activities and daily developments
                        related to law and society.
                    </p>

                </div>

                

            </div>



            {{-- 08 --}}
            <div class="service-card">

                <div class="service-number">08</div>

                {{-- 08 --}}
                <div class="service-icon">
                  <i class="bi bi-journal-text"></i>
                </div>

                <div class="service-content">

                    <h3>
                        Legal Articles & Academic Research
                    </h3>

                    <p>
                        The Association provides a platform for publishing
                        legal articles, research and academic studies,
                        allowing specialists to share their knowledge
                        and experience with the legal community.
                    </p>

                </div>

                

            </div>



            {{-- 09 --}}
            <div class="service-card">

                <div class="service-number">09</div>

                {{-- 09 --}}
            <div class="service-icon">
                <i class="fa fa-users"></i>
            </div>

                <div class="service-content">

                    <h3>
                        Cooperation & Networking for Lawyers
                    </h3>

                    <p>
                        We promote communication and cooperation among
                        Afghan lawyers, researchers and legal professionals
                        both inside Afghanistan and abroad.
                    </p>

                </div>

                

            </div>



            {{-- 10 --}}
            <div class="service-card">

                <div class="service-number">10</div>

                <div class="service-icon">
                    <i class="fa fa-info-circle"></i>
                </div>

                <div class="service-content">

                    <h3>
                        Legal Awareness & Guidance
                    </h3>

                    <p>
                        We provide legal information and awareness resources
                        to help individuals better understand legal matters,
                        concepts and issues.
                    </p>

                </div>

               

            </div>


        </div>

    </div>

</section>

<!-- Back to Top -->
<a href="#"
   class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top">

    <i class="bi bi-arrow-up"></i>

</a>

  

@endsection
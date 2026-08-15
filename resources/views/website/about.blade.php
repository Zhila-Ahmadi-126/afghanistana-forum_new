@extends('layouts.website')
  
@section('content')
<style>
  /* body{
    background-image: url("assets/img/about/bac2.jpg");
    background-size: 100%  ;
     background-repeat: repeat;
      justify-content: center;
    border-radius: 25px;
} */
     body{
    background-image: url("assets/img/bg/bac2.jpg");
    background-size: 100% 100% ;
     /* background-repeat: repeat; */
      /* justify-content: center; */
    
  
}
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("assets/img/about/about_us.jpg") center center no-repeat;
       background-size: 100% 100% ;
}
/* =========================================
   ABOUT INTRODUCTION
========================================= */

.about-introduction {

    position: relative;

    padding: 10px 0;

    overflow: hidden;

}


.about-content-card {

    position: relative;

    max-width: 1000px;

    margin: auto;

    padding: 55px;

    background: rgba(255,255,255,0.72);

    backdrop-filter: blur(20px);

    -webkit-backdrop-filter: blur(20px);

    border: 1px solid rgba(255,255,255,0.8);

    border-radius: 30px;

    box-shadow:
        0 25px 70px rgba(0,0,0,0.08),
        inset 0 1px 0 rgba(255,255,255,0.8);

    transition: all .5s ease;

}


.about-content-card:hover {

    transform: translateY(-8px);

    box-shadow:
        0 35px 90px rgba(0,0,0,0.13),
        inset 0 1px 0 rgba(255,255,255,0.9);

}


.about-icon-box {

    width: 65px;

    height: 65px;

    display: flex;

    align-items: center;

    justify-content: center;

    margin-bottom: 25px;

    border-radius: 18px;

    background: linear-gradient(
        135deg,
        #0d6efd,
        #084298
    );

    color: white;

    font-size: 25px;

    box-shadow:
        0 12px 30px rgba(13,110,253,.25);

}


.about-small-title {

    display: block;

    margin-bottom: 10px;

    font-size: 14px;

    font-weight: 700;

    letter-spacing: 1.5px;

    text-transform: uppercase;

    color: #0d6efd;

}


.about-content-card h2 {

    margin-bottom: 15px;

    font-size: 44px;

    font-weight: 800;

    color: #171b26;

}


.about-line {

    width: 80px;

    height: 4px;

    margin-bottom: 30px;

    border-radius: 20px;

    background: linear-gradient(
        90deg,
        #0d6efd,
        #6ea8fe
    );

}


.about-content-card p {

    color: #687080;

    font-size: 16px;

    line-height: 2;

}


/* =========================================
   DECORATIONS
========================================= */

.about-section-decoration {

    position: absolute;

    border-radius: 50%;

    filter: blur(2px);

    opacity: .15;

    pointer-events: none;

}


.decoration-one {

    width: 300px;

    height: 300px;

    top: 20px;

    left: -100px;

    background: #0d6efd;

}


.decoration-two {

    width: 250px;

    height: 250px;

    right: -80px;

    bottom: 0;

    background: #6f42c1;

}






















/* =========================================================
   ABOUT PEOPLE — GLASSMORPHISM
========================================================= */

.about-people-section {

    --about-blue: #aac8f586;
     --about-purple: #270575d8;
    --about-pink: #171ffc3e;
    --about-orange: #f974162d;
    --about-yellow: #15e3fa3f;


    position: relative;

    width: 100%;

    padding: 90px 24px 120px;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 10% 15%,
            rgba(138, 92, 246, 0.037),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 30%,
            rgba(249, 245, 22, 0.07),
            transparent 30%
        );

}


/* =========================================================
   HEADER
========================================================= */

.about-people-header {

    max-width: 720px;

    margin: 0 auto 50px;

    text-align: center;

}


.about-people-kicker {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 16px;

    color: var(--about-blue);

    font-size: 12px;

    font-weight: 700;

    letter-spacing: 1.5px;

    text-transform: uppercase;

}


.about-people-kicker i {

    font-size: 14px;

}


.about-people-header h2 {

    margin: 0;

    color: #171a22;

    font-size: 36px;

    font-weight: 800;

    line-height: 1.4;

}


.about-people-header-line {

    width: 70px;

    height: 3px;

    margin: 17px auto;

    border-radius: 20px;

    background:
        linear-gradient(
            90deg,
            var(--about-purple),
            var(--about-pink),
            var(--about-orange)
        );

}


.about-people-header p {

    margin: 0;

    color: #7b8190;

    font-size: 15px;

}


/* =========================================================
   GRID
========================================================= */

.about-people-grid {

    width: 100%;

    max-width: 1120px;

    margin-left: auto;
    margin-right: auto;

    display: grid;

    grid-template-columns: repeat(3, 285px);

    justify-content: center;

    align-items: start;

    gap: 30px;

}



/* =========================================================
   CARD
========================================================= */

.about-person-card {

    position: relative;

    width: 285px;

    min-height: 390px;

    padding: 1px;

    perspective: 1000px;
  text-align: center;
    justify-content: center;
    border-radius: 25px;

   background:
        linear-gradient(
            135deg,
            rgba(13, 217, 253, 0.127),
            rgba(138, 92, 246, 0.049),
            rgba(72, 236, 206, 0.13),
            rgba(230, 249, 22, 0.151)
        );

    box-shadow:
        0 15px 35px rgba(31, 38, 135, 0.23);

    transition:
        box-shadow .45s ease,
        transform .2s ease;

}

.about-person-cardm {

    position: relative;

    width: 285px;

     min-height: 390px;

    padding: 1px;

    perspective: 1000px;
  text-align: center;
    justify-content: center;
    border-radius: 25px;

   background:
        linear-gradient(
            135deg,
            rgba(13, 217, 253, 0.127),
            rgba(138, 92, 246, 0.049),
            rgba(72, 236, 206, 0.13),
            rgba(230, 249, 22, 0.151)
        );

    box-shadow:
        0 15px 35px rgba(31, 38, 135, 0.23);

    transition:
        box-shadow .45s ease,
        transform .2s ease;

}


/* =========================================================
   MOVING COLOR GLOW
========================================================= */

.about-person-glow {

    position: absolute;

    width: 170px;

    height: 170px;

    left: var(--mouse-x, 50%);

    top: var(--mouse-y, 50%);

    transform: translate(-50%, -50%);

    border-radius: 50%;

    pointer-events: none;

  background:
        radial-gradient(
            circle,
            rgba(221, 120, 12, 0.37) 0%,
            rgba(72, 217, 236, 0.297) 30%,
            rgba(18, 161, 213, 0.378) 52%,
            transparent 72%
        );


    filter: blur(25px);

    opacity: 0;

    transition: opacity .35s ease;

    z-index: 1;

}


.about-person-card:hover .about-person-glow {

    opacity: 1;

}


/* =========================================================
   GLASS BODY
========================================================= */

.about-person-inner {

    position: relative;

    z-index: 2;

    width: 100%;

    height: 100%;

    overflow: hidden;

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.70),
            rgba(255,255,255,.35)
        );



    backdrop-filter: blur(22px);

    -webkit-backdrop-filter: blur(22px);

    border: 1px solid rgba(255,255,255,.72);

    outline: 1px solid rgba(255,255,255,.22);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.85),
        inset 0 -1px 0 rgba(255,255,255,.15);

}


/* =========================================================
   TOP HIGHLIGHT
========================================================= */

.about-person-inner::before {

    content: "";

    position: absolute;

    top: 0;

    left: 12%;

    width: 76%;

    height: 1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.95),
            transparent
        );

    z-index: 5;

}


/* =========================================================
   IMAGE
========================================================= */

.about-person-image {

    position: relative;

    width: 300px;

    height: 300px;

    margin: 11px;

    overflow: hidden;

    border-radius: 18px;

    border: 1px solid rgba(255,255,255,.8);

    outline: 1px solid rgba(13,110,253,.08);

    background: #e7e9ed;

}


.about-person-image::after {

    content: "";

    position: absolute;

    inset: 0;

    pointer-events: none;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.18),
            transparent 40%
        );

}


.about-person-image img {

    width: 250px;

    height: 300px;

    display: block;

    object-fit: cover;

    object-position: center;

    filter: none !important;

    transform: scale(1);

    transition:
        transform .8s cubic-bezier(.2,.75,.2,1);

}


/* فقط مقدار بسیار کم */

.about-person-card:hover .about-person-image img {

    transform: scale(1.055);

}


/* =========================================================
   INFO
========================================================= */

.about-person-info {

    position: relative;

    padding: 8px 22px 24px;

    text-align: center;

}


.about-person-role {

    display: inline-flex;

    align-items: center;

    gap: 6px;

    margin-bottom: 7px;

    color: var(--about-purple);

    font-size: 10px;

    font-weight: 800;

    letter-spacing: .8px;

}


.about-person-role i {

    font-size: 10px;

}


.about-person-info h3 {

    margin: 0;

    color: #1d212b;

    font-size: 17px;

    font-weight: 750;

    line-height: 1.6;

}


.about-person-email {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 7px;

    max-width: 100%;

    margin-top: 12px;

    padding-top: 11px;

    border-top: 1px solid rgba(0,0,0,.07);

    color: #596273;

    font-size: 11px;

    font-weight: 600;

    text-decoration: none;

    overflow-wrap: anywhere;

    transition:
        color .3s ease,
        transform .3s ease;

}


.about-person-email i {

    color: var(--about-blue);

}


.about-person-email:hover {

    color: var(--about-purple);

    transform: translateY(-1px);

}


/* =========================================================
   SUBSECTIONS
========================================================= */

.about-people-subsection {

    margin-top: 115px;

}


.about-people-grid-small {

    grid-template-columns:
        repeat(4, 285px);

}


/* =========================================================
   CARD HOVER BORDER
========================================================= */

.about-person-card::before {

    content: "";

    position: absolute;

    inset: -1px;

    border-radius: 26px;

    padding: 2px;

    background:
        linear-gradient(
            135deg,
            var(--about-blue),
            var(--about-purple),
            var(--about-pink),
            var(--about-orange),
            var(--about-yellow)
        );

    background-size: 300% 300%;

    opacity: 0;

    z-index: 0;

    transition: opacity .45s ease;

    animation: aboutBorderMove 5s linear infinite;

}


.about-person-card:hover::before {

    opacity: 1;

}


@keyframes aboutBorderMove {

    0% {

        background-position: 0% 50%;

    }

    50% {

        background-position: 100% 50%;

    }

    100% {

        background-position: 0% 50%;

    }

}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .about-people-grid,
    .about-people-grid-small {

        grid-template-columns:
            repeat(2, 285px);

    }

}


@media (max-width: 680px) {

    .about-people-section {

        padding-left: 15px;

        padding-right: 15px;

    }


    .about-people-grid,
    .about-people-grid-small {

        grid-template-columns:
            minmax(0, 285px);

    }


    .about-person-card {

        width: 285px;

    }


    .about-people-header h2 {

        font-size: 29px;

    }

}


@media (max-width: 340px) {

    .about-person-card {

        width: 100%;

    }


    .about-person-image {

        height: 220px;

    }

}
.about-people-grid {
    width: 100%;
    max-width: 1120px;
    margin: 0 auto;

    display: flex;
    flex-wrap: wrap;
    justify-content: center;

    gap: 30px;
}


/* کارت‌ها */

.about-people-grid .about-person-card {
    flex: 0 0 285px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1100px) {

    .about-people-grid {
        max-width: 650px;
    }

}


@media (max-width: 680px) {

    .about-people-grid {
        max-width: 320px;
    }

    .about-people-grid .about-person-card {
        flex: 0 0 285px;
    }

}

.MyImggg{
     background-image: url("assets/img/about/4.jpg");
    background-size: 100% 100% ;
     /* background-color: red; */
}
.MyImggg2{
     background-color: rgba(0, 0, 0, 0.18);
}
.MyImgg{
     background-image: url("assets/img/about/3.jpg");
    background-size: 100% 100% ;
     /* background-color: red; */
}
.MyImgg22{
     background-image: url("assets/img/about/2.jpg");
    background-size: 100% 100% ;
    
     /* background-color: red; */
}
.MyImgg223{
     background-image: url("assets/img/about/1.jpg");
    background-size: 100% 100% ;
    
     /* background-color: red; */
}
.MyImgg15{
     background-image: url("assets/img/about/5.jpg");
    background-size: 100% 100% ;
    
     /* background-color: red; */
}

.MyImgg1{
      background-color: rgba(0, 0, 0, 0.438);
}
.mydivIMG{
    background-color: rgba(255, 247, 247, 0.532);
      color: black;
       border-radius: 30px;
  border: 1px solid white;
    font-size: 12px;
}
.textColorme{
   color:gold;
}









/* =========================================
   DARK BLUE GLASS READ MORE
========================================= */

.mini-glass-readmore {
    position: relative;
    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 7px 9px 7px 15px;

    color: #ffffff;
    text-decoration: none;

    /* Dark Blue Glass */
    background: rgba(10, 35, 62, 0.68);

    border: 1px solid rgba(120, 180, 220, 0.38);
    border-radius: 10px;

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    box-shadow:
        0 6px 20px rgba(5, 30, 55, 0.20),
        inset 0 1px 0 rgba(255, 255, 255, 0.22);

    overflow: hidden;

    transition:
        transform .35s ease,
        background .35s ease,
        box-shadow .35s ease,
        border-color .35s ease;
}


/* Glass Shine */
.mini-glass-readmore::before {
    content: "";
    position: absolute;

    top: -50%;
    left: -90%;

    width: 45%;
    height: 200%;

    background: linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.28),
        transparent
    );

    transform: skewX(-22deg);

    transition: left .7s ease;
}


/* Text */
.mini-glass-readmore span {
    position: relative;
    z-index: 2;

    color: #ffffff;

    font-size: 12px;
    font-weight: 600;

    letter-spacing: .3px;

    transition: letter-spacing .3s ease;
}


/* Arrow */
.mini-glass-readmore i {
    position: relative;
    z-index: 2;

    width: 25px;
    height: 25px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 10px;

    color: #ffffff;

    background: rgba(65, 125, 170, 0.42);

    border: 1px solid rgba(180, 220, 245, 0.40);
    border-radius: 7px;

    box-shadow:
        inset 0 1px 3px rgba(255,255,255,.15),
        0 3px 10px rgba(0,30,60,.20);

    transition:
        transform .35s ease,
        background .35s ease,
        box-shadow .35s ease;
}


/* Hover */
.mini-glass-readmore:hover {

    color: #ffffff;

    background: rgba(15, 55, 90, 0.78);

    border-color: rgba(150, 210, 240, 0.65);

    transform: translateY(-3px);

    box-shadow:
        0 12px 28px rgba(5, 35, 65, .28),
        0 0 18px rgba(65, 145, 200, .16),
        inset 0 1px 0 rgba(255,255,255,.28);
}


/* Moving Glass Light */
.mini-glass-readmore:hover::before {
    left: 140%;
}


/* Arrow Animation */
.mini-glass-readmore:hover i {

    transform:
        translateX(3px)
        rotate(-4deg);

    background: rgba(75, 145, 195, 0.65);

    box-shadow:
        0 0 12px rgba(100, 190, 235, .30),
        inset 0 1px 4px rgba(255,255,255,.22);
}


/* Text Animation */
.mini-glass-readmore:hover span {
    letter-spacing: .6px;
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
            <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a class="text-white" href="#">Pages</a>
                            </li>
                            <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->

{{-- ============================= --}}
{{-- ABOUT US CONTENT --}}
{{-- ============================= --}}

<section class="about-introduction mt-0 mb-0 ">

    <div class="about-section-decoration decoration-one"></div>
    <div class="about-section-decoration decoration-two"></div>

    <div class="about-content-card mt-0 ">

        <div class="about-icon-box">
            <i class="fas fa-balance-scale"></i>
        </div>

        <span class="about-small-title">
           The Nationwide Association of Afghan Jurists in Europe
        </span>

        <h2>
            About Us
        </h2>

        <div class="about-line"></div>

        <div class="about-us-content">

    <p>
        The <strong>Association of Afghan Lawyers in Europe</strong> was established on
        <strong>11 May 2009</strong>, following a meeting attended by seven members of
        the Leadership Council and the Chairperson of the Supervisory Commission,
        under the leadership of <strong>Professor Dr. Ghulam Sakhi Masoon</strong>,
        President of the Association.
    </p>

    <p>
        The meeting focused on several important matters concerning the future
        development and organization of the Association, including its
        <strong>Statute, departmental structure, official symbol, membership fees,
        website and its name, and the future work plan of the Leadership Council</strong>.
        After extensive discussion, the following decisions were adopted:
    </p>

    <div class="about-highlight-box">
        <h5>
            <i class="bi bi-journal-text me-2"></i>
            Establishment and Approval of the Statute
        </h5>

        <p>
            The <strong>Statute of the Association of Afghan Lawyers in Europe</strong>,
            which had been approved in principle at the General Assembly held on
            <strong>28 February 2009</strong> in the city of
            <strong>Hamburg</strong>, was referred to a five-member committee for
            revision and completion.
        </p>

        <p>
            Following the necessary revisions and completion, the Statute was
            submitted to the Leadership Council for approval. After discussion,
            the Leadership Council approved the Statute
            <strong>unanimously by the members present at the meeting</strong>.
        </p>

        <p>
            The Executive Committee was also instructed to undertake the
            <strong>translation, registration, and official filing of the Statute
            in various European languages</strong>.
        </p>
    </div>

    <div class="about-highlight-box">
        <h5>
            <i class="bi bi-people me-2"></i>
            Membership and Leadership Council
        </h5>

        <p>
            In accordance with <strong>Article 23, Paragraph 2</strong> of the
            Statute, the membership of <strong>Ms. Wahida Wahdat</strong> in the
            Leadership Council and <strong>Mr. Abdul Fahim Qayoumi</strong> in the
            Supervisory Commission was suspended until the next General Assembly,
            due to their absence from meetings and their written declaration
            indicating a lack of cooperation with the Association.
        </p>

        <p>
            <strong>Mr. Ghulam Sakhi Samim</strong> was appointed as a member of
            the Leadership Council. In addition, <strong>Mr. Kaveh Kavian</strong>
            was appointed as an advisory member of the Leadership Council,
            representing young Afghan lawyers, a matter that had also been
            discussed during the General Assembly.
        </p>
    </div>

    <div class="about-highlight-box">
        <h5>
            <i class="bi bi-diagram-3 me-2"></i>
            Specialized Departments
        </h5>

        <p>
            In order to effectively manage and advance the Association's activities,
            several specialized departments were established in the following areas:
        </p>

        <ul class="about-departments">
            <li>
                <i class="bi bi-check-circle-fill"></i>
                <strong>International Relations</strong>
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                <strong>Organization and Administration</strong>
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                <strong>Publications and Communications</strong>
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                <strong>Research and Study</strong>
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                <strong>Islamic Jurisprudence (Fiqh)</strong>
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                <strong>Legal Advisory Services</strong>
                <span>
                    including matters related to asylum and integration
                </span>
            </li>

            <li>
                <i class="bi bi-check-circle-fill"></i>
                <strong>Family Affairs</strong>
            </li>
        </ul>
    </div>

    <div class="about-highlight-box">
        <h5>
            <i class="bi bi-person-workspace me-2"></i>
            Departmental Responsibilities
        </h5>

        <p>
            To advance the work of these departments, respected members
            <strong>Abdul Hadi Abawi, Samim, Mohammad Akbar, Mohammad Rasul,
            Shirin Afzal, Sadat, Dehzad, Wathiq, and Gul Ahmad</strong>
            were assigned to work with other distinguished Afghan lawyers
            to strengthen and expand the activities of each department,
            based on their respective areas of
            <strong>professional expertise and experience</strong>.
        </p>
    </div>

    <div class="about-closing">
        <p>
            These decisions marked an important step in strengthening the
            organizational structure of the Association and establishing a
            professional framework for cooperation, legal research, advisory
            services, and the advancement of Afghan legal professionals in Europe.
            <div class="meeting-document-footer">

                    <a href="{{ asset('assets/img/about/files/dehzad-5-2-12.[1].pdf') }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="mini-glass-readmore">

                        Read More
                        <i class="fas fa-arrow-right"></i>

                    </a>

                </div>
        </p>
    </div>

     <div class="about-closing">
        <h6>The General Assembly of the Association of Afghan Lawyers in Europe, held on March 3, 2012.
            <a href="{{ route('about.meeting.2012') }}" target="_blank" class="mini-glass-readmore">
                <span>Read More</span>
                <i class="fas fa-arrow-right"></i>
            </a>
    </h6>
        <h6>The Second General Assembly of the Association of Afghan Lawyers in Europe, held on October 4, 2014.
             <a href="{{ route('about.meeting.2014') }}" class="mini-glass-readmore" target="_blank">
                <span>Read More</span>
                <i class="fas fa-arrow-right"></i>
             </a>


        </h6>
    </div>

</div>

    </div>
   <!-- Service Start -->
         <div class="p-2">
            <div class="container-fluid py-5 px-2 px-lg-0">
                <div class="row g-0">
                    <div class="col-lg-3 d-none d-lg-flex MyImggg">
                        <div class="d-flex align-items-center  justify-content-center MyImggg2  w-100 h-100">
                            <h1 class="display-3 text-light m-0" style="transform: rotate(-90deg);">
                                OFFICIAL<br>
                            DOCUMENTS
                            </h1>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-9">
                        <div class="ms-lg-5 ps-lg-1">
                            <div class="text-center text-lg-start wow fadeInUp " data-wow-delay="0.1s">
                                <h6 class="text-secondary text-uppercase"> Association Documents </h6>
                                <h1 class="mb-5">Official Documents & Resources</h1>
                            </div>
                            <div class="owl-carousel  service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                                  <div class="MyImgg223 ">
                                 
                                    <div class="MyImgg1 p-3">
                                       <article class="about-person-card text-light text-lg-start p-2  ">

                                            <div class="about-person-glow"></div>
                                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                            <i class="fas fa-pen-nib fa-2x text-light"></i>
                                            </div>
                                            <h4 class="mb-3 text-light">Statute of the Association of Afghan Lawyers in Europe – Persian/English Version</h4>
                                           <div class="mydivIMG p-2">
                                             <p>The association’s statute in English.</p>
                                           </div>
                                        <p class=" fw- p-2medium textColorme"><i class="fa fa-check text-success me-2"></i>Legal Framework</p>
                                        <p class=" fw-medium textColorme"><i class="fa fa-check text-success me-2"></i>Organizational Structure</p>
                                        <p class=" fw- p-2medium textColorme"><i class="fa fa-check text-success me-2"></i>Association Rules</p>

                          
                                            

                                        </article>
                                        <a href="{{ asset('assets/img/about//files/STATUTE (english).pdf') }}" target="_blank" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>

                                    </div>
                                </div>
                                <div class="MyImgg ">
                                 
                                    <div class="MyImgg1 p-3">
                                       <article class="about-person-card text-light text-lg-start p-2  ">

                                            <div class="about-person-glow"></div>
                                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                            <i class="fas fa-pen-nib fa-2x text-light"></i>
                                            </div>
                                            <h4 class="mb-3 text-light">Statute of the Association of Afghan Lawyers in Europe – Pashto Version</h4>
                                           <div class="mydivIMG p-2">
                                             <p>The association’s statute in Pashto</p>
                                           </div>
                                               <p class=" fw- p-2medium textColorme"><i class="fa fa-check text-success me-2"></i>Legal Framework</p>
                                        <p class=" fw-medium textColorme"><i class="fa fa-check text-success me-2"></i>Organizational Structure</p>
                                        <p class=" fw- p-2medium textColorme"><i class="fa fa-check text-success me-2"></i>Association Rules</p>
                                            

                                        </article>
                                        <a href="{{ asset('assets/img/about//files/asa-pashto.pdf') }}" target="_blank" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>

                                    </div>
                                </div>


                                <div class="MyImgg22 ">
                                 
                                    <div class="MyImgg1 p-3">
                                       <article class="about-person-card text-light text-lg-start p-2  ">

                                            <div class="about-person-glow"></div>
                                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                            <i class="fas fa-pen-nib fa-2x text-light"></i>
                                            </div>
                                            <h4 class="mb-3 text-light">Statute of the Association of Afghan Lawyers in Europe – Persian/Dari Version</h4>
                                           <div class="mydivIMG p-2">
                                             <p>The association’s statute in Dari.</p>
                                           </div>
                                        <p class=" fw- p-2medium textColorme"><i class="fa fa-check text-success me-2"></i>Legal Framework</p>
                                        <p class=" fw-medium textColorme"><i class="fa fa-check text-success me-2"></i>Organizational Structure</p>
                                        <p class=" fw- p-2medium textColorme"><i class="fa fa-check text-success me-2"></i>Association Rules</p>

                          
                                            

                                        </article>
                                        <a href="{{ asset('assets/img/about//files/dari-hoqooq.pdf') }}" target="_blank" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>

                                    </div>
                                </div>
                               


                                <div class="MyImgg " >
                                 
                                    <div class="MyImgg1 p-3">
                                       <article class="about-person-card text-light text-lg-start p-2  ">

                                            <div class="about-person-glow mb-5"></div>
                                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                            <i class="fas fa-pen-nib fa-2x text-light"></i>
                                            </div>
                                            <h4 class=" text-light">Membership Application Form for the Association of Afghan Lawyers in Europe <br> <br></h4>
                                           <div class="mydivIMG p-2 mb-5">
                                        
                                             <p>Dear Mr/Mrs, if you would like to join the Association,
                                                 please complete this form and submit it through the Membership Application Form.</p>
                                           </div>
                                         
                                        </article>
                                       
                                    
                                        <a href="{{ route('member.application') }}" target="_blank" class="btn bg-white text-primary w-100 ">Membership Application<i class="fa fa-arrow-right text-secondary ms-2"></i></a>

                          
                                    </div>
                                </div>

                                <div class="MyImgg15 ">
                                 
                                    <div class="MyImgg1 p-3">
                                       <article class="about-person-card text-light text-lg-start p-2  ">

                                            <div class="about-person-glow"></div>
                                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                            <i class="fas fa-pen-nib fa-2x text-light"></i>
                                            </div>
                                            <br> <br>
                                            <h4 class="mb-3 text-light">Brochure of the Association of Afghan Lawyers in Europe</h4>
                                           <div class="mydivIMG p-2">
                                             <p>A brief overview of the Association, including its history and establishment, objectives, duties, rights, 
                                                activities, and role in supporting Afghan lawyers in Europe..</p>
                                           </div>
                                       <br><br>
                                            

                                        </article>
                                        <a href="{{ asset('assets/img/about//files/broshur.pdf') }}" target="_blank" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                                                <br>
                                    </div>
                                </div>

                              
                                
                               
                                
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Service End -->
</section>


<section class="about-people-section justify-content-center">

    {{-- =========================================================
         LEADERSHIP COUNCIL
    ========================================================== --}}

    <div class="about-people-header">

        <span class="about-people-kicker text-dark">
            <i class="fas fa-balance-scale"></i>
           The Nationwide Association of Afghan Jurists in Europe
        </span>

        <h2>
            Leadership Council of the Association
        </h2>

        <div class="about-people-header-line"></div>

    </div>


    {{-- =========================================================
         PRESIDENT — FIRST ROW / CENTER
    ========================================================== --}}
@php
    $leadershipMembers = $members->where(
        'section',
        'Leadership Council of the Association'
    );

    // Founder / Honorary President — first priority
    $founder = $leadershipMembers->first(function ($member) {

        $position = strtolower(trim($member->position ?? ''));

        return str_contains($position, 'founder')
            && str_contains($position, 'honorary president');
    });

    // President — second priority
    $president = $leadershipMembers->firstWhere(
        'position',
        'President of the Association'
    );

    // Remove Founder and President from the remaining members
    $otherLeadershipMembers = $leadershipMembers->filter(
        function ($member) use ($founder, $president) {

            if ($founder && $member->id === $founder->id) {
                return false;
            }

            if ($president && $member->id === $president->id) {
                return false;
            }

            return true;
        }
    );
@endphp


   @if($founder || $president)

    <div class="about-people-grid justify-content-center">

        {{-- FOUNDER --}}
        @if($founder)

            <article
                class="about-person-card"
                onclick="window.location.href='{{ route('website.archive-member.show', $founder->id) }}'"
                style="cursor: pointer;"
            >

                <div class="about-person-glow"></div>

                <div class="about-person-inner">

                    <div class="about-person-image">

                        <img
                            src="{{ $founder->photo
                                ? asset(ltrim($founder->photo, '/'))
                                : asset('assets/img/about/default.jpg') }}"
                            alt="{{ $founder->name }} {{ $founder->surname }}"
                        >

                    </div>

                    <div class="about-person-info">

                        <span class="about-person-role">
                            <i class="fas fa-landmark"></i>
                            Leadership Council of the Association
                        </span>

                        @if($founder->position)

                            <p class="about-person-role">
                                <i class="fas fa-user"></i>
                                {{ $founder->position }}
                            </p>

                        @endif

                        <h3>
                            {{ $founder->name }}
                            {{ $founder->surname }}
                        </h3>

                        @if($founder->email)

                            <a
                                href="mailto:{{ $founder->email }}"
                                class="about-person-email"
                                onclick="event.stopPropagation();"
                            >
                                <i class="fas fa-envelope"></i>
                                {{ $founder->email }}
                            </a>

                        @endif

                        @if($founder->phone)

                            <a
                                href="tel:{{ $founder->phone }}"
                                class="about-person-email"
                                onclick="event.stopPropagation();"
                            >
                                <i class="fas fa-phone"></i>
                                {{ $founder->phone }}
                            </a>

                        @endif

                    </div>

                </div>

            </article>

        @endif


        {{-- PRESIDENT --}}
        @if($president)

            <article
                class="about-person-card"
                onclick="window.location.href='{{ route('website.archive-member.show', $president->id) }}'"
                style="cursor: pointer;"
            >

                <div class="about-person-glow"></div>

                <div class="about-person-inner">

                    <div class="about-person-image">

                        <img
                            src="{{ $president->photo
                                ? asset(ltrim($president->photo, '/'))
                                : asset('assets/img/about/default.jpg') }}"
                            alt="{{ $president->name }} {{ $president->surname }}"
                        >

                    </div>

                    <div class="about-person-info">

                        <span class="about-person-role">
                            <i class="fas fa-landmark"></i>
                            Leadership Council of the Association
                        </span>

                        @if($president->position)

                            <p class="about-person-role">
                                <i class="fas fa-user"></i>
                                {{ $president->position }}
                            </p>

                        @endif

                        <h3>
                            {{ $president->name }}
                            {{ $president->surname }}
                        </h3>

                        @if($president->email)

                            <a
                                href="mailto:{{ $president->email }}"
                                class="about-person-email"
                                onclick="event.stopPropagation();"
                            >
                                <i class="fas fa-envelope"></i>
                                {{ $president->email }}
                            </a>

                        @endif

                        @if($president->phone)

                            <a
                                href="tel:{{ $president->phone }}"
                                class="about-person-email"
                                onclick="event.stopPropagation();"
                            >
                                <i class="fas fa-phone"></i>
                                {{ $president->phone }}
                            </a>

                        @endif

                    </div>

                </div>

            </article>

        @endif

    </div>

@endif

    {{-- =========================================================
         OTHER LEADERSHIP MEMBERS
    ========================================================== --}}

    <div class="about-people-grid justify-content-center">

        @foreach($otherLeadershipMembers as $member)

            <article
                class="about-person-card"
                onclick="window.location.href='{{ route('website.archive-member.show', $member->id) }}'"
                style="cursor: pointer;"
            >

                <div class="about-person-glow"></div>

                <div class="about-person-inner">

                    <div class="about-person-image">

                        <img
                            src="{{ $member->photo
                                ? asset(ltrim($member->photo, '/'))
                                : asset('assets/img/about/default.jpg') }}"
                            alt="{{ $member->name }} {{ $member->surname }}"
                        >

                    </div>

                    <div class="about-person-info">

                        <span class="about-person-role">
                            <i class="fas fa-landmark"></i>
                            Leadership Council of the Association
                        </span>

                        @if($member->position)

                            <p class="about-person-role">
                                <i class="fas fa-user"></i>
                                {{ $member->position }}
                            </p>

                        @endif

                        <h3>
                            {{ $member->name }}
                            {{ $member->surname }}
                        </h3>

                        @if($member->email)

                            <a
                                href="mailto:{{ $member->email }}"
                                class="about-person-email"
                                onclick="event.stopPropagation();"
                            >
                                <i class="fas fa-envelope"></i>
                                {{ $member->email }}
                            </a>

                        @endif

                        @if($member->phone)

                            <a
                                href="tel:{{ $member->phone }}"
                                class="about-person-email"
                                onclick="event.stopPropagation();"
                            >
                                <i class="fas fa-phone"></i>
                                {{ $member->phone }}
                            </a>

                        @endif

                    </div>

                </div>

            </article>

        @endforeach

    </div>



    {{-- =========================================================
         SUPERVISORY COMMISSION
    ========================================================== --}}

    <div class="about-people-subsection">

        <div class="about-people-header">

            <span class="about-people-kicker">
                <i class="fas fa-shield-alt"></i>
                Oversight
            </span>

            <h2>
                Supervisory Commission
            </h2>

            <div class="about-people-header-line"></div>

        </div>


        @php
            $supervisoryMembers = $members->where(
                'section',
                'Supervisory Commission'
            );

            $chairperson = $supervisoryMembers->firstWhere(
                'position',
                'Chairperson'
            );

            $otherSupervisoryMembers = $supervisoryMembers->filter(
                fn ($member) => !$chairperson || $member->id !== $chairperson->id
            );
        @endphp


        {{-- =====================================================
             CHAIRPERSON — FIRST ROW / CENTER
        ====================================================== --}}

        @if($chairperson)

            <div class="about-people-grid about-people-grid-small justify-content-center">

                <article
                    class="about-person-card"
                    onclick="window.location.href='{{ route('website.archive-member.show', $chairperson->id) }}'"
                    style="cursor: pointer;"
                >

                    <div class="about-person-glow"></div>

                    <div class="about-person-inner">

                        <div class="about-person-image">

                            <img
                                src="{{ $chairperson->photo
                                    ? asset(ltrim($chairperson->photo, '/'))
                                    : asset('assets/img/about/default.jpg') }}"
                                alt="{{ $chairperson->name }} {{ $chairperson->surname }}"
                            >

                        </div>

                        <div class="about-person-info">

                            <span class="about-person-role">
                                <i class="fas fa-shield-alt"></i>
                                Supervisory Commission
                            </span>

                            @if($chairperson->position)

                                <p class="about-person-role">
                                    <i class="fas fa-user"></i>
                                    {{ $chairperson->position }}
                                </p>

                            @endif

                            <h3>
                                {{ $chairperson->name }}
                                {{ $chairperson->surname }}
                            </h3>

                        </div>

                    </div>

                </article>

            </div>

        @endif


        {{-- =====================================================
             OTHER COMMISSION MEMBERS
        ====================================================== --}}

        <div class="about-people-grid about-people-grid-small">

            @foreach($otherSupervisoryMembers as $member)

                <article
                    class="about-person-card"
                    onclick="window.location.href='{{ route('website.archive-member.show', $member->id) }}'"
                    style="cursor: pointer;"
                >

                    <div class="about-person-glow"></div>

                    <div class="about-person-inner">

                        <div class="about-person-image">

                            <img
                                src="{{ $member->photo
                                    ? asset(ltrim($member->photo, '/'))
                                    : asset('assets/img/about/default.jpg') }}"
                                alt="{{ $member->name }} {{ $member->surname }}"
                            >

                        </div>

                        <div class="about-person-info">

                            <span class="about-person-role">
                                <i class="fas fa-shield-alt"></i>
                                Supervisory Commission
                            </span>

                            @if($member->position)

                                <p class="about-person-role">
                                    <i class="fas fa-user"></i>
                                    {{ $member->position }}
                                </p>

                            @endif

                            <h3>
                                {{ $member->name }}
                                {{ $member->surname }}
                            </h3>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>



    {{-- =========================================================
         BRANCHES
    ========================================================== --}}

    <div class="about-people-subsection">

        <div class="about-people-header">

            <span class="about-people-kicker text-primary">
                <i class="fas fa-code-branch"></i>
                Branches
            </span>

            <h2>
                Director of the Association's Branches
            </h2>

            <div class="about-people-header-line"></div>

        </div>

        <div class="about-people-grid about-people-grid-small">

            @foreach(
                $members->where(
                    'section',
                    "Director of the Association's Branches"
                ) as $member
            )

                <article
                    class="about-person-card"
                    onclick="window.location.href='{{ route('website.archive-member.show', $member->id) }}'"
                    style="cursor: pointer;"
                >

                    <div class="about-person-glow"></div>

                    <div class="about-person-inner">

                        <div class="about-person-image">

                            <img
                                src="{{ $member->photo ? asset(ltrim($member->photo, '/')) : asset('assets/img/about/default.jpg') }}"
                                alt="{{ $member->name }} {{ $member->surname }}"
                            >

                        </div>

                        <div class="about-person-info">

                            @if($member->country)

                                <p class="about-person-role">
                                    <i class="fa fa-map-marker-alt"></i>
                                    {{ $member->country }}
                                </p>

                            @endif

                            <h3>
                                {{ $member->name }}
                                {{ $member->surname }}
                            </h3>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>



    {{-- =========================================================
         EDITORIAL BOARD
    ========================================================== --}}

    <div class="about-people-subsection">

        <div class="about-people-header">

            <span class="about-people-kicker">
                <i class="fas fa-pen-nib"></i>
                Editorial Board
            </span>

            <h2>
                Editorial Board
            </h2>

            <div class="about-people-header-line"></div>

        </div>

        <div class="about-people-grid about-people-grid-small">

            @foreach(
                $members->where(
                    'section',
                    'Editorial Board'
                ) as $member
            )

                <article
                    class="about-person-card"
                    onclick="window.location.href='{{ route('website.archive-member.show', $member->id) }}'"
                    style="cursor: pointer;"
                >

                    <div class="about-person-glow"></div>

                    <div class="about-person-inner">

                        <div class="about-person-image">

                            <img
                                src="{{ $member->photo ? asset(ltrim($member->photo, '/')) : asset('assets/img/about/default.jpg') }}"
                                alt="{{ $member->name }} {{ $member->surname }}"
                            >

                        </div>

                        <div class="about-person-info">

                            <span class="about-person-role">
                                <i class="fas fa-pen-nib"></i>
                                Editorial Board
                            </span>

                            <h3>
                                {{ $member->name }}
                                {{ $member->surname }}
                            </h3>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>



    {{-- =========================================================
         OTHER MEMBERS
    ========================================================== --}}

    <div class="about-people-subsection">

        <div class="about-people-header">

            <span class="about-people-kicker">
                <i class="fas fa-users"></i>
                Members
            </span>

            <h2>
                Other Members and Experienced Legal Professionals
            </h2>

            <div class="about-people-header-line"></div>

        </div>

        <div class="about-people-grid about-people-grid-small">

            @foreach(
                $members->where(
                    'section',
                    'Other Members and Experienced Legal Professionals'
                ) as $member
            )

                <article
                    class="about-person-card"
                    onclick="window.location.href='{{ route('website.archive-member.show', $member->id) }}'"
                    style="cursor: pointer;"
                >

                    <div class="about-person-glow"></div>

                    <div class="about-person-inner">

                        <div class="about-person-image">

                            <img
                                src="{{ $member->photo ? asset(ltrim($member->photo, '/')) : asset('assets/img/about/default.jpg') }}"
                                alt="{{ $member->name }} {{ $member->surname }}"
                            >

                        </div>

                        <div class="about-person-info">

                            <p class="about-person-role">
                                <i class="fas fa-user"></i>
                                {{ $member->position ?? 'Member' }}
                            </p>

                            <h3>
                                {{ $member->name }}
                                {{ $member->surname }}
                            </h3>

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

</section>

<script>
document.querySelectorAll('.about-person-card').forEach(card => {

    card.addEventListener('mousemove', function (e) {

        const rect = card.getBoundingClientRect();

        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateY = ((x - centerX) / centerX) * 5;
        const rotateX = ((centerY - y) / centerY) * 5;

        card.style.setProperty('--mouse-x', `${x}px`);
        card.style.setProperty('--mouse-y', `${y}px`);

        card.style.transform =
            `perspective(1000px)
             rotateX(${rotateX}deg)
             rotateY(${rotateY}deg)
             translateY(-6px)`;

    });


    card.addEventListener('mouseleave', function () {

        card.style.transform =
            'perspective(1000px) rotateX(0deg) rotateY(0deg) translateY(0)';

        card.style.setProperty('--mouse-x', '50%');
        card.style.setProperty('--mouse-y', '50%');

    });

});
</script>
<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>


@endsection
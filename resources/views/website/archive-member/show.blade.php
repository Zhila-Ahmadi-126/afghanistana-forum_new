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
    background-image: url("../assets/img/bg/13.jpg");
    background-size: 100% 700px ;
     /* background-repeat: repeat; */
      /* justify-content: center; */
       background-attachment: fixed;
  
}
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("../assets/img/about/2.jpg") center center no-repeat;
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



<style>

.archive-member-profile-section {
    position: relative;
    overflow: hidden;
}


/* ==========================================
   IMAGE AREA
========================================== */

.archive-member-visual {
    position: relative;
    min-height: 430px;
    display: flex;
    align-items: center;
    justify-content: center;
}


.archive-member-image-glass {
    position: relative;
    z-index: 5;

    padding: 12px;

    border-radius: 32px;

    background: rgba(255,255,255,.18);

    border: 1px solid rgba(255,255,255,.55);

    box-shadow:
        0 25px 70px rgba(0,0,0,.16),
        inset 0 1px 0 rgba(255,255,255,.65);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    transition:
        transform .5s ease,
        box-shadow .5s ease;
}


.archive-member-image-frame {
    width: 300px;
    height: 380px;

    overflow: hidden;

    border-radius: 25px;

    position: relative;

    background: #f5f5f5;
}


.archive-member-image {
    width: 100%;
    height: 100%;

    object-fit: cover;

    display: block;

    transition:
        transform .7s cubic-bezier(.2,.8,.2,1),
        filter .5s ease;
}


/* ==========================================
   IMAGE HOVER
========================================== */

.archive-member-image-glass:hover {

    transform:
        translateY(-8px)
        scale(1.015);

    box-shadow:
        0 35px 90px rgba(0,0,0,.22),
        0 0 35px rgba(255,255,255,.35);

}


.archive-member-image-glass:hover .archive-member-image {

    transform: scale(1.07);

}


/* ==========================================
   FLOATING CIRCLES
========================================== */

.archive-member-orbit {

    position: absolute;

    border-radius: 50%;

    z-index: 1;

    border: 1px solid rgba(255,255,255,.65);

    background:
        radial-gradient(
            circle,
            rgba(255,255,255,.45),
            rgba(255,255,255,.04)
        );

    box-shadow:
        0 10px 35px rgba(0,0,0,.08);

    backdrop-filter: blur(8px);

    transition:
        transform .6s ease,
        opacity .6s ease;
}


.orbit-one {

    width: 115px;
    height: 115px;

    top: 20px;
    left: 12%;

    animation: archiveFloatOne 5s ease-in-out infinite;
}


.orbit-two {

    width: 75px;
    height: 75px;

    bottom: 35px;
    right: 10%;

    animation: archiveFloatTwo 4s ease-in-out infinite;
}


.orbit-three {

    width: 45px;
    height: 45px;

    top: 38%;
    right: 6%;

    animation: archiveFloatThree 3.5s ease-in-out infinite;
}


.archive-member-visual:hover .archive-member-orbit {

    opacity: .9;

}


.archive-member-visual:hover .orbit-one {

    transform: scale(.72) translate(-25px, 15px);
}


.archive-member-visual:hover .orbit-two {

    transform: scale(1.35) translate(15px, -15px);
}


.archive-member-visual:hover .orbit-three {

    transform: scale(.65) translate(10px, 10px);
}


@keyframes archiveFloatOne {

    0%,100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-18px);
    }

}


@keyframes archiveFloatTwo {

    0%,100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(14px);
    }

}


@keyframes archiveFloatThree {

    0%,100% {
        transform: translate(0,0);
    }

    50% {
        transform: translate(8px,-12px);
    }

}


/* ==========================================
   MEMBER INFORMATION
========================================== */

.archive-member-information {
    padding: 15px 5px;
}


.archive-member-kicker {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 8px 15px;

    border-radius: 50px;

    font-size: .78rem;

    font-weight: 600;

    letter-spacing: .5px;

    background: rgba(13,110,253,.08);

    border: 1px solid rgba(13,110,253,.15);

    color: var(--bs-primary);

    margin-bottom: 18px;

}


.archive-member-name {

    font-size: clamp(2rem, 4vw, 3.4rem);

    font-weight: 700;

    line-height: 1.15;

    margin-bottom: 25px;

}


.archive-member-detail {

    display: flex;

    align-items: center;

    gap: 13px;

    margin-bottom: 12px;

}


.archive-member-detail-icon {

    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 12px;

    background: rgba(13,110,253,.08);

    color: var(--bs-primary);

}


.archive-member-detail small {

    display: block;

    color: #888;

    font-size: .72rem;

}


.archive-member-detail strong,
.archive-member-detail a {

    display: block;

    color: inherit;

    text-decoration: none;

}


.archive-member-description {

    margin-top: 25px;

    padding: 20px 22px;

    border-radius: 20px;

    background: rgba(255,255,255,.55);

    border: 1px solid rgba(255,255,255,.8);

    box-shadow: 0 15px 45px rgba(0,0,0,.06);

    backdrop-filter: blur(12px);

}


.archive-description-title {

    font-weight: 700;

    margin-bottom: 8px;

    display: flex;

    align-items: center;

    gap: 8px;

}


.archive-member-description p {

    margin: 0;

    line-height: 1.9;

    color: #666;

}


/* ==========================================
   DOCUMENTS
========================================== */

.archive-member-documents-header {

    margin-bottom: 20px;

}


.archive-document-card {

    height: 100%;

}


.archive-document-card .about-person-inner {

    height: 100%;

    display: flex;

    flex-direction: column;

}


.archive-document-card .about-person-image {

    height: 220px;

}


.archive-document-card .about-person-info {

    flex: 1;

}


.archive-document-year {

    font-size: .85rem;

    color: #777;

}


.archive-document-description {

    font-size: .9rem;

    color: #777;

    line-height: 1.7;

}


.archive-document-placeholder {

    width: 100%;

    height: 100%;

    display: flex;

    align-items: center;

    justify-content: center;

    background: linear-gradient(
        135deg,
        rgba(13,110,253,.08),
        rgba(255,255,255,.7)
    );

}


.archive-document-placeholder i {

    font-size: 4rem;

    color: var(--bs-primary);

}


/* ==========================================
   RESPONSIVE
========================================== */

@media (max-width: 991px) {

    .archive-member-visual {
        min-height: 390px;
    }

}


@media (max-width: 575px) {

    .archive-member-image-frame {

        width: 250px;
        height: 320px;

    }

    .archive-member-visual {

        min-height: 350px;

    }

}
.mystyle{
     background-color: rgba(255, 255, 255, 0.504);
        /* filter: blur(10px); */
        border-radius: 40px;
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
 {{-- =========================================================
ARCHIVE MEMBER PROFILE
========================================================= --}}

<section class="archive-member-profile-section py-5">


<div class="container">

    {{-- =================================================
         MEMBER PROFILE
    ================================================== --}}

    <div class="row g-4 g-lg-5 align-items-center">

        {{-- MEMBER IMAGE --}}
        <div class="col-lg-5">

            <div class="archive-member-visual">

                <div class="archive-member-orbit orbit-one"></div>
                <div class="archive-member-orbit orbit-two"></div>
                <div class="archive-member-orbit orbit-three"></div>

                <div class="archive-member-image-glass">

                    <div class="archive-member-image-frame">

                        <img
                            src="{{ $member->photo
                                ? asset(ltrim($member->photo, '/'))
                                : asset('assets/img/about/default.jpg') }}"
                            alt="{{ $member->name }} {{ $member->surname }}"
                            class="archive-member-image"
                        >

                    </div>

                </div>

            </div>

        </div>


        {{-- MEMBER INFORMATION --}}
        <div class="col-lg-7 mystyle">

            <div class="archive-member-information ">

                {{-- SECTION --}}
                @if($member->section)

                    <span class="archive-member-kicker">

                        <i class="fas fa-balance-scale"></i>

                        {{ $member->section }}

                    </span>

                @endif


                {{-- NAME --}}
                <h1 class="archive-member-name">

                    {{ $member->name }}

                    @if($member->surname)
                        {{ $member->surname }}
                    @endif

                </h1>


                {{-- POSITION --}}
                @if($member->position)

                    <div class="archive-member-detail">

                        <span class="archive-member-detail-icon">
                            <i class="fas fa-user-tie"></i>
                        </span>

                        <div>
                            <small>Position</small>

                            <strong>
                                {{ $member->position }}
                            </strong>
                        </div>

                    </div>

                @endif


                {{-- COUNTRY --}}
                @if($member->country)

                    <div class="archive-member-detail">

                        <span class="archive-member-detail-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>

                        <div>
                            <small>Country</small>

                            <strong>
                                {{ $member->country }}
                            </strong>
                        </div>

                    </div>

                @endif


                {{-- EMAIL --}}
                @if($member->email)

                    <div class="archive-member-detail">

                        <span class="archive-member-detail-icon">
                            <i class="fas fa-envelope"></i>
                        </span>

                        <div>
                            <small>Email</small>

                            <a href="mailto:{{ $member->email }}">
                                {{ $member->email }}
                            </a>

                        </div>

                    </div>

                @endif


                {{-- PHONE --}}
                @if($member->phone)

                    <div class="archive-member-detail">

                        <span class="archive-member-detail-icon">
                            <i class="fas fa-phone"></i>
                        </span>

                        <div>
                            <small>Phone</small>

                            <a href="tel:{{ $member->phone }}">
                                {{ $member->phone }}
                            </a>

                        </div>

                    </div>

                @endif


                {{-- SHORT DESCRIPTION --}}
                @if($member->short_description)

                    <div class="archive-member-description">

                        <div class="archive-description-title">

                            <i class="fas fa-star"></i>

                            About This Member

                        </div>

                        <p>
                            {{ $member->short_description }}
                        </p>

                    </div>

                @endif


                {{-- DESCRIPTION --}}
                @if($member->description)

                    <div class="archive-member-description">

                        <div class="archive-description-title">

                            <i class="fas fa-check-circle"></i>

                            Professional Profile

                        </div>

                        <p>
                            {{ $member->description }}
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =================================================
         ARCHIVE DOCUMENTS & CONTRIBUTIONS
    ================================================== --}}

    @if($member->archives->count())

        <div class="archive-member-documents mt-5 pt-5">

            {{-- OUTER DOCUMENT CONTAINER --}}
            <div class="archive-documents-glass-container mystyle  p-4 p-lg-5">

                <div class="archive-member-documents-header">

                    <span class="about-people-kicker">

                        <i class="fas fa-folder-open"></i>

                        Archive

                    </span>

                    <h2>
                        Documents and Contributions
                    </h2>

                    <div class="about-people-header-line"></div>

                    <p class="text-muted mt-3 mb-0">
                        Documents, statements, articles and other
                        contributions associated with this member.
                    </p>

                </div>


                {{-- =================================================
                     DOCUMENT CARDS
                     5 CARDS PER ROW ON LARGE SCREENS
                ================================================== --}}

               <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-3 g-lg-4 mt-3">


@foreach($member->archives as $archive)

    @php

        $translation = $archive->translations->first();

        /*
         * IMAGE
         *
         * Database:
         * archive/images/example.jpg
         *
         * Public:
         * /storage/archives/images/example.jpg
         */

        $imagePath = $archive->image
            ? str_replace(
                'archive/',
                'archives/',
                ltrim($archive->image, '/')
            )
            : null;


        /*
         * PDF
         *
         * Database:
         * archive/pdf/example.pdf
         *
         * Public:
         * /storage/archives/pdf/example.pdf
         */

        $pdfPath = $archive->pdf_file
            ? str_replace(
                'archive/',
                'archives/',
                ltrim($archive->pdf_file, '/')
            )
            : null;

    @endphp


    <div class="col">

        <article
            class="about-person-card archive-document-card h-100"
            style="cursor: {{ $pdfPath ? 'pointer' : 'default' }};"
            @if($pdfPath)
                onclick="window.open('{{ asset('storage/' . $pdfPath) }}', '_blank')"
            @endif
        >

            <div class="about-person-glow"></div>


            <div class="about-person-inner h-100 d-flex flex-column">


                {{-- =========================================
                     COVER IMAGE
                ========================================== --}}

                <div class="about-person-image">

                    @if($imagePath)

                        <img
                            src="{{ asset('storage/' . $imagePath) }}"
                            alt="{{ $translation?->name ?? 'Archive Document' }}"
                            loading="lazy"
                        >

                    @else

                        <div class="archive-document-placeholder">

                            @if($pdfPath)
                                <i class="fas fa-file-pdf"></i>
                            @else
                                <i class="fas fa-file-alt"></i>
                            @endif

                        </div>

                    @endif

                </div>


                {{-- =========================================
                     DOCUMENT INFORMATION
                ========================================== --}}

                <div class="about-person-info flex-grow-1">


                    {{-- TYPE --}}

                    <p class="about-person-role">

                        @if($pdfPath)

                            <i class="fas fa-file-pdf"></i>

                            PDF Document

                        @else

                            <i class="fas fa-image"></i>

                            Archive Contribution

                        @endif

                    </p>


                    {{-- NAME --}}

                    <h3>

                        {{ $translation?->name ?? 'Archive Document' }}

                    </h3>


                    {{-- YEAR --}}

                    @if($archive->archive_year)

                        <p class="archive-document-year">

                            <i class="far fa-calendar-alt"></i>

                            {{ $archive->archive_year }}

                        </p>

                    @endif


                    {{-- SHORT DESCRIPTION --}}

                    @if($translation?->short_description)

                        <p class="archive-document-description">

                            {{ $translation->short_description }}

                        </p>

                    @endif


                    {{-- =====================================
                         ACTION
                    ====================================== --}}

                    @if($pdfPath)

                        <div class="mt-2">

                            <span class="badge rounded-pill bg-danger px-3 py-2">

                                <i class="fas fa-file-pdf me-1"></i>

                                PDF Available

                            </span>

                        </div>

                    @else

                        <div class="mt-2">

                            <a
                                href="{{ route('website.archive.show', $archive->id) }}"
                                class="badge rounded-pill bg-primary px-3 py-2 text-decoration-none"
                                onclick="event.stopPropagation();"
                            >

                                <i class="fas fa-eye me-1"></i>

                                View Contribution

                            </a>

                        </div>

                    @endif


                </div>

            </div>

        </article>

    </div>

@endforeach


</div>

{{-- =========================================================
PAGINATION
========================================================= --}}

@if($member->archives->hasPages())


<div class="d-flex justify-content-center mt-5">

    {{ $member->archives->onEachSide(1)->links() }}

</div>


@endif


            </div>

        </div>

    @endif

</div>

</section>


{{-- =========================================================
     ARCHIVE MEMBER PAGE STYLE
========================================================= --}}


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top">
    <i class="bi bi-arrow-up"></i>
</a>


@endsection
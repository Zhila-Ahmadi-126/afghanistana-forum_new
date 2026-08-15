@extends('layouts.website')

@section('content')
<style>
    /* =========================================================
   ABOUT NEWS - GLASS SECTION
========================================================= */

.about-news-section {
    position: relative;
    padding: 100px 0;
    overflow: hidden;
    background: #ffffff;
}


/* =========================================================
   MAIN GLASS CONTAINER
========================================================= */

.about-news-glass {
    position: relative;
    overflow: hidden;
    padding: 65px;
    border: 1px solid rgba(31, 61, 99, 0.10);
    border-radius: 38px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.82),
            rgba(244, 249, 255, 0.72)
        );

    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);

    box-shadow:
        0 25px 70px rgba(30, 60, 100, 0.09),
        inset 0 1px 0 rgba(255, 255, 255, 0.95);

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}

.about-news-glass:hover {
    transform: translateY(-5px);

    box-shadow:
        0 35px 90px rgba(30, 60, 100, 0.14),
        inset 0 1px 0 rgba(255, 255, 255, 1);
}


/* =========================================================
   BACKGROUND ORBS
========================================================= */

.about-news-orb {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(2px);
    transition: all 1s cubic-bezier(.2,.8,.2,1);
}

.orb-one {
    width: 280px;
    height: 280px;
    top: -130px;
    right: -70px;

    background:
        radial-gradient(
            circle,
            rgba(153, 191, 255, 0.20),
            rgba(153, 191, 255, 0)
        );
}

.orb-two {
    width: 240px;
    height: 240px;
    bottom: -110px;
    left: 25%;

    background:
        radial-gradient(
            circle,
            rgba(197, 173, 255, 0.17),
            rgba(197, 173, 255, 0)
        );
}

.orb-three {
    width: 180px;
    height: 180px;
    top: 40%;
    left: 42%;

    background:
        radial-gradient(
            circle,
            rgba(255, 221, 130, 0.13),
            rgba(255, 221, 130, 0)
        );
}

.about-news-glass:hover .orb-one {
    transform: translate(-25px, 25px) scale(1.15);
}

.about-news-glass:hover .orb-two {
    transform: translate(30px, -20px) scale(1.18);
}

.about-news-glass:hover .orb-three {
    transform: translate(20px, -25px) scale(1.2);
}


/* =========================================================
   IMAGE / VISUAL AREA
========================================================= */

.about-news-visual {
    position: relative;
    min-height: 570px;
    display: flex;
    align-items: center;
    justify-content: center;
}


/* =========================================================
   MAIN IMAGE CARD
========================================================= */

.news-main-image {
    position: relative;
    z-index: 3;

    width: 78%;
    height: 455px;

    overflow: hidden;

    border-radius: 34px;

    border: 1px solid rgba(255, 255, 255, 0.95);

    box-shadow:
        0 25px 55px rgba(30, 55, 90, 0.17),
        0 8px 20px rgba(30, 55, 90, 0.07);

    transform: rotate(-2deg);

    transition:
        transform 0.7s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.7s ease;
}

.news-main-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;

    transition:
        transform 0.8s cubic-bezier(.2,.8,.2,1),
        filter 0.6s ease;
}

.news-main-image .image-overlay {
    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            145deg,
            rgba(255, 255, 255, 0.08),
            rgba(27, 60, 105, 0.22)
        );

    pointer-events: none;
}

.about-news-glass:hover .news-main-image {
    transform: rotate(0deg) translateY(-8px) scale(1.015);

    box-shadow:
        0 35px 70px rgba(30, 55, 90, 0.23),
        0 12px 30px rgba(30, 55, 90, 0.10);
}

.about-news-glass:hover .news-main-image img {
    transform: scale(1.07);
}


/* =========================================================
   IMAGE BADGE
========================================================= */

.news-image-badge {
    position: absolute;
    left: 22px;
    bottom: 22px;

    display: flex;
    align-items: center;
    gap: 10px;

    padding: 11px 17px;

    border-radius: 50px;

    color: #19395f;
    background: rgba(255, 255, 255, 0.84);

    border: 1px solid rgba(255, 255, 255, 0.95);

    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    box-shadow: 0 10px 30px rgba(20, 50, 90, 0.13);

    font-size: 13px;
    font-weight: 600;
}

.news-image-badge i {
    font-size: 15px;
}


/* =========================================================
   FLOATING IMAGE
========================================================= */

.news-floating-image {
    position: absolute;
    z-index: 5;

    right: 3%;
    bottom: 4%;

    width: 145px;
    height: 145px;

    padding: 7px;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(180, 210, 255, 0.9),
            rgba(220, 204, 255, 0.8),
            rgba(255, 232, 167, 0.75)
        );

    box-shadow:
        0 20px 45px rgba(40, 70, 110, 0.18);

    transition:
        transform 0.7s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.7s ease;
}

.news-floating-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;

    border-radius: 50%;

    border: 4px solid rgba(255, 255, 255, 0.92);
}

.about-news-glass:hover .news-floating-image {
    transform: translate(7px, -12px) rotate(8deg) scale(1.06);

    box-shadow:
        0 25px 55px rgba(40, 70, 110, 0.25);
}


/* =========================================================
   FLOATING ICON
========================================================= */

.news-floating-icon {
    position: absolute;
    z-index: 6;

    left: 7%;
    bottom: 9%;

    width: 62px;
    height: 62px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 20px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.9),
            rgba(237, 244, 255, 0.82)
        );

    border: 1px solid rgba(255, 255, 255, 0.95);

    box-shadow:
        0 15px 35px rgba(30, 60, 100, 0.14);

    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    color: #315c8d;

    transition:
        transform 0.6s ease,
        box-shadow 0.6s ease;
}

.news-floating-icon i {
    font-size: 23px;
}

.about-news-glass:hover .news-floating-icon {
    transform: translateY(-10px) rotate(-8deg);
    box-shadow: 0 22px 45px rgba(30, 60, 100, 0.20);
}


/* =========================================================
   DECORATIVE CIRCLES
========================================================= */

.visual-circle {
    position: absolute;
    z-index: 1;

    border-radius: 50%;

    border: 1px solid rgba(80, 130, 190, 0.12);

    transition:
        transform 1s cubic-bezier(.2,.8,.2,1),
        border-color 0.7s ease;
}

.circle-one {
    width: 390px;
    height: 390px;
    left: 6%;
    top: 9%;
}

.circle-two {
    width: 300px;
    height: 300px;
    left: 16%;
    top: 18%;

    border-color: rgba(178, 157, 231, 0.13);
}

.circle-three {
    width: 210px;
    height: 210px;
    left: 27%;
    top: 26%;

    border-color: rgba(239, 198, 91, 0.14);
}

.about-news-glass:hover .circle-one {
    transform: scale(1.08) rotate(10deg);
}

.about-news-glass:hover .circle-two {
    transform: scale(0.92) rotate(-12deg);
}

.about-news-glass:hover .circle-three {
    transform: scale(1.12) translate(10px, -8px);
}


/* =========================================================
   CONTENT
========================================================= */

.about-news-content {
    position: relative;
    z-index: 4;

    padding: 15px 10px 15px 35px;
}


/* Section Label */

.section-label {
    display: flex;
    align-items: center;
    gap: 12px;

    margin-bottom: 15px;

    color: #416a96;

    font-size: 12px;
    font-weight: 700;

    letter-spacing: 3px;
}

.label-line {
    width: 35px;
    height: 2px;

    border-radius: 20px;

    background:
        linear-gradient(
            90deg,
            #9ebff0,
            #cdb8ef
        );
}


/* Main Heading */

.about-news-title {
    margin-bottom: 22px;

    font-family:
        "Plus Jakarta Sans",
        "Inter",
        "Segoe UI",
        sans-serif;

    font-size: clamp(2.2rem, 4vw, 3.5rem);

    line-height: 1.12;

    font-weight: 700;

    letter-spacing: -1.5px;

    color: #17385e;
}

.about-news-title span {
    display: inline;

    background:
        linear-gradient(
            90deg,
            #5e83b1,
            #8e78bd,
            #6f9cc9
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}


/* Intro */

.about-news-intro {
    max-width: 780px;

    margin-bottom: 28px;

    color: #607087;

    font-size: 15px;

    line-height: 1.9;
}


/* =========================================================
   FEATURE GRID
========================================================= */

.news-feature-grid {
    display: grid;

    grid-template-columns: repeat(2, minmax(0, 1fr));

    gap: 13px;

    margin-top: 25px;
}


/* Feature Card */

.news-feature-card {
    position: relative;

    display: flex;
    align-items: flex-start;

    gap: 14px;

    min-height: 130px;

    padding: 18px;

    overflow: hidden;

    border-radius: 21px;

    border: 1px solid rgba(89, 124, 166, 0.10);

    background:
        linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.75),
            rgba(244, 248, 255, 0.55)
        );

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 10px 30px rgba(38, 69, 105, 0.055);

    transition:
        transform 0.45s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.45s ease,
        border-color 0.45s ease;
}


/* Gradient glow inside card */

.news-feature-card::before {
    content: "";

    position: absolute;

    width: 100px;
    height: 100px;

    right: -45px;
    bottom: -45px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(177, 201, 239, 0.24),
            transparent 70%
        );

    transition:
        transform 0.6s ease;
}

.news-feature-card:hover {
    transform: translateY(-7px);

    border-color: rgba(97, 136, 184, 0.20);

    box-shadow:
        0 18px 40px rgba(40, 70, 105, 0.11);
}

.news-feature-card:hover::before {
    transform: scale(2.2);
}


/* =========================================================
   FEATURE ICON
========================================================= */

.feature-icon {
    flex: 0 0 auto;

    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            rgba(213, 229, 251, 0.85),
            rgba(229, 216, 248, 0.72)
        );

    border: 1px solid rgba(255, 255, 255, 0.95);

    color: #426b98;

    box-shadow:
        0 8px 20px rgba(54, 83, 119, 0.08);

    transition:
        transform 0.45s ease,
        border-radius 0.45s ease;
}

.feature-icon i {
    font-size: 18px;
}

.news-feature-card:hover .feature-icon {
    transform: rotate(-7deg) scale(1.08);

    border-radius: 18px;
}


/* Feature Text */

.feature-text {
    padding-right: 18px;
}

.feature-text h5 {
    margin: 2px 0 7px;

    color: #244a72;

    font-size: 14px;

    font-weight: 700;
}

.feature-text p {
    margin: 0;

    color: #748195;

    font-size: 12px;

    line-height: 1.7;
}


/* Arrow */

.feature-arrow {
    position: absolute;

    top: 17px;
    right: 17px;

    width: 27px;
    height: 27px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #6f8eae;

    background: rgba(255, 255, 255, 0.65);

    opacity: 0;

    transform: translate(-5px, 5px);

    transition:
        opacity 0.4s ease,
        transform 0.4s ease;
}

.news-feature-card:hover .feature-arrow {
    opacity: 1;

    transform: translate(0, 0);
}


/* =========================================================
   BUTTONS
========================================================= */

.about-news-actions {
    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 13px;

    margin-top: 30px;
}


/* Main Button */

.news-about-btn {
    display: inline-flex;

    align-items: center;

    gap: 14px;

    padding: 13px 20px;

    border-radius: 50px;

    color: #ffffff;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    background:
        linear-gradient(
            110deg,
            #4f79a8,
            #8176b3,
            #668db8
        );

    box-shadow:
        0 12px 28px rgba(79, 121, 168, 0.20);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease;
}

.news-about-btn i {
    transition: transform 0.4s ease;
}

.news-about-btn:hover {
    color: #ffffff;

    transform: translateY(-4px);

    box-shadow:
        0 18px 38px rgba(79, 121, 168, 0.28);
}

.news-about-btn:hover i {
    transform: translateX(5px);
}


/* Secondary Button */

.news-secondary-btn {
    display: inline-flex;

    align-items: center;

    gap: 9px;

    padding: 12px 18px;

    border-radius: 50px;

    color: #4f6681;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    background: rgba(255, 255, 255, 0.68);

    border: 1px solid rgba(76, 112, 150, 0.13);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    transition:
        transform 0.4s ease,
        background 0.4s ease,
        box-shadow 0.4s ease;
}

.news-secondary-btn:hover {
    color: #355879;

    transform: translateY(-4px);

    background: rgba(240, 246, 255, 0.85);

    box-shadow:
        0 12px 28px rgba(50, 80, 110, 0.09);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1199px) {

    .about-news-glass {
        padding: 45px;
    }

    .about-news-content {
        padding-left: 20px;
    }

    .news-main-image {
        width: 82%;
    }

}


@media (max-width: 991px) {

    .about-news-section {
        padding: 70px 0;
    }

    .about-news-glass {
        padding: 40px 30px;
    }

    .about-news-visual {
        min-height: 500px;
        margin-bottom: 25px;
    }

    .about-news-content {
        padding: 15px 5px;
    }

    .news-main-image {
        width: 70%;
        height: 430px;
    }

    .news-floating-image {
        right: 12%;
    }

    .news-floating-icon {
        left: 12%;
    }

}


@media (max-width: 767px) {

    .about-news-section {
        padding: 50px 0;
    }

    .about-news-glass {
        padding: 25px 18px;
        border-radius: 28px;
    }

    .about-news-visual {
        min-height: 420px;
    }

    .news-main-image {
        width: 78%;
        height: 360px;
    }

    .news-floating-image {
        width: 110px;
        height: 110px;

        right: 4%;
        bottom: 2%;
    }

    .news-floating-icon {
        width: 52px;
        height: 52px;

        left: 4%;
        bottom: 7%;
    }

    .circle-one {
        width: 300px;
        height: 300px;
    }

    .circle-two {
        width: 230px;
        height: 230px;
    }

    .circle-three {
        width: 160px;
        height: 160px;
    }

    .about-news-title {
        font-size: 2.2rem;
    }

    .news-feature-grid {
        grid-template-columns: 1fr;
    }

    .about-news-actions {
        align-items: stretch;
        flex-direction: column;
    }

    .news-about-btn,
    .news-secondary-btn {
        justify-content: center;
    }

}


@media (max-width: 480px) {

    .about-news-visual {
        min-height: 360px;
    }

    .news-main-image {
        width: 82%;
        height: 310px;
    }

    .news-floating-image {
        width: 90px;
        height: 90px;
    }

    .news-floating-icon {
        width: 46px;
        height: 46px;
    }

    .news-image-badge {
        left: 12px;
        bottom: 12px;
        padding: 8px 12px;
        font-size: 11px;
    }

    .about-news-title {
        font-size: 1.9rem;
    }

    .about-news-intro {
        font-size: 13px;
    }

}
/* =========================================================
   ABOUT ARCHIVE - GLASS DESIGN
========================================================= */

.about-archive-section {
    position: relative;
    overflow: hidden;
    isolation: isolate;
}


/* =========================================================
   GLASS CONTENT
========================================================= */

.archive-glass-content {
    position: relative;
    padding: 38px;
    border-radius: 32px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.90),
            rgba(255, 248, 230, 0.72),
            rgba(244, 238, 255, 0.72),
            rgba(232, 246, 255, 0.78)
        );

    border: 1px solid rgba(115, 93, 170, 0.16);

    box-shadow:
        0 25px 70px rgba(48, 39, 85, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.95);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}

.archive-glass-content:hover {
    transform: translateY(-6px);

    box-shadow:
        0 35px 85px rgba(48, 39, 85, 0.15),
        0 0 50px rgba(245, 190, 90, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 1);
}


/* =========================================================
   EYEBROW
========================================================= */

.archive-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;

    margin-bottom: 12px;

    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2.5px;

    color: #6d5a9e;
}

.archive-eyebrow-line {
    width: 34px;
    height: 2px;

    border-radius: 50px;

    background:
        linear-gradient(
            90deg,
            #f0b84f,
            #a88bd8,
            #75b9dc
        );
}


/* =========================================================
   TITLE
========================================================= */

.archive-title {
    margin-bottom: 18px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: clamp(30px, 3vw, 43px);
    font-weight: 700;
    line-height: 1.18;

    color: #1f2940;
}

.archive-title span {
    display: inline-block;

    background:
        linear-gradient(
            90deg,
            #8064b5,
            #c58a46,
            #d99b48
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.archive-description {
    margin-bottom: 25px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 15px;
    line-height: 1.9;

    color: #667085;
}


/* =========================================================
   FEATURE CARDS
========================================================= */

.archive-feature-card {
    position: relative;

    display: flex;
    align-items: flex-start;
    gap: 16px;

    margin-bottom: 13px;
    padding: 15px 17px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.75),
            rgba(255,248,229,0.50),
            rgba(245,239,255,0.52)
        );

    border: 1px solid rgba(112, 91, 159, 0.13);

    box-shadow:
        0 8px 25px rgba(60, 50, 90, 0.055);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    overflow: hidden;

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-color 0.4s ease;
}

.archive-feature-card::before {
    content: "";

    position: absolute;
    left: 0;
    top: 0;

    width: 3px;
    height: 100%;

    border-radius: 10px;

    background:
        linear-gradient(
            180deg,
            #e4a94f,
            #a98ad6,
            #73b6d9
        );

    transform: scaleY(0);
    transform-origin: top;

    transition: transform 0.4s ease;
}

.archive-feature-card:hover {
    transform: translateX(7px);

    border-color: rgba(207, 157, 76, 0.28);

    box-shadow:
        0 15px 35px rgba(60, 50, 90, 0.10),
        0 0 25px rgba(237, 180, 76, 0.07);
}

.archive-feature-card:hover::before {
    transform: scaleY(1);
}


/* =========================================================
   FEATURE ICON
========================================================= */

.archive-feature-icon {
    flex: 0 0 45px;

    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background:
        linear-gradient(
            135deg,
            rgba(244, 194, 91, 0.22),
            rgba(174, 140, 213, 0.20),
            rgba(112, 184, 218, 0.18)
        );

    border: 1px solid rgba(170, 126, 62, 0.14);

    color: #7560a5;

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease,
        background 0.4s ease;
}

.archive-feature-card:hover .archive-feature-icon {
    transform: rotate(-6deg) scale(1.1);

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(241, 187, 70, 0.34),
            rgba(171, 135, 215, 0.30)
        );
}


/* =========================================================
   FEATURE TEXT
========================================================= */

.archive-feature-text h6 {
    margin: 2px 0 5px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 14px;
    font-weight: 700;

    color: #29334a;
}

.archive-feature-text p {
    margin: 0;

    font-size: 13px;
    line-height: 1.65;

    color: #737b8b;
}


/* =========================================================
   ACTION BUTTON
========================================================= */

.archive-action {
    margin-top: 25px;
}

.archive-view-btn {
    position: relative;

    display: inline-flex;
    align-items: center;
    gap: 12px;

    padding: 13px 21px;

    border-radius: 50px;

    text-decoration: none;

    font-size: 13px;
    font-weight: 600;

    color: #ffffff;

    background:
        linear-gradient(
            100deg,
            #7661a5,
            #9b78bd,
            #d39a4b
        );

    box-shadow:
        0 10px 25px rgba(121, 94, 157, 0.20);

    overflow: hidden;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}

.archive-view-btn::before {
    content: "";

    position: absolute;
    top: 0;
    left: -100%;

    width: 70%;
    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.35),
            transparent
        );

    transform: skewX(-20deg);

    transition: left 0.6s ease;
}

.archive-view-btn:hover {
    color: #ffffff;

    transform: translateY(-3px);

    box-shadow:
        0 15px 35px rgba(121, 94, 157, 0.28);
}

.archive-view-btn:hover::before {
    left: 140%;
}

.archive-view-btn i {
    transition: transform 0.35s ease;
}

.archive-view-btn:hover i {
    transform: translateX(5px);
}


/* =========================================================
   IMAGE AREA
========================================================= */

.archive-image-column {
    min-height: 530px;
}

.archive-visual {
    position: relative;

    width: 100%;
    height: 100%;
    min-height: 500px;

    display: flex;
    align-items: center;
    justify-content: center;
}


/* =========================================================
   FLOATING ORBS
========================================================= */

.archive-orb {
    position: absolute;

    border-radius: 50%;

    filter: blur(1px);

    transition:
        transform 0.7s cubic-bezier(.2,.8,.2,1),
        opacity 0.5s ease;
}

.archive-orb-one {
    width: 155px;
    height: 155px;

    top: 30px;
    right: 15px;

    background:
        radial-gradient(
            circle,
            rgba(222, 169, 72, 0.28),
            rgba(222, 169, 72, 0)
        );
}

.archive-orb-two {
    width: 210px;
    height: 210px;

    bottom: 25px;
    left: 5px;

    background:
        radial-gradient(
            circle,
            rgba(143, 106, 190, 0.21),
            rgba(143, 106, 190, 0)
        );
}

.archive-orb-three {
    width: 125px;
    height: 125px;

    top: 50%;
    left: 10%;

    background:
        radial-gradient(
            circle,
            rgba(100, 181, 218, 0.19),
            rgba(100, 181, 218, 0)
        );
}


/* =========================================================
   DECORATIVE SHAPES
========================================================= */

.archive-decoration {
    position: absolute;

    border-radius: 28px;

    filter: blur(0.3px);

    transition:
        transform 0.6s ease,
        border-radius 0.6s ease;
}

.archive-decoration-one {
    width: 115px;
    height: 115px;

    top: 12%;
    left: 5%;

    background:
        linear-gradient(
            135deg,
            rgba(244, 188, 70, 0.19),
            rgba(218, 136, 88, 0.12)
        );

    transform: rotate(20deg);
}

.archive-decoration-two {
    width: 90px;
    height: 90px;

    right: 4%;
    bottom: 15%;

    background:
        linear-gradient(
            135deg,
            rgba(132, 101, 183, 0.18),
            rgba(93, 177, 218, 0.15)
        );

    transform: rotate(-15deg);
}


/* =========================================================
   IMAGE GLASS CARD
========================================================= */

.archive-image-card {
    position: relative;

    width: 82%;
    height: 450px;

    padding: 12px;

    border-radius: 35px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,0.86),
            rgba(255,246,221,0.60),
            rgba(239,231,252,0.68),
            rgba(228,244,252,0.64)
        );

    border: 1px solid rgba(115, 93, 166, 0.18);

    box-shadow:
        0 30px 70px rgba(56, 48, 83, 0.15),
        0 10px 30px rgba(229, 169, 73, 0.07),
        inset 0 1px 0 rgba(255,255,255,0.95);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    transform: rotate(2deg);

    transition:
        transform 0.6s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.6s ease;
}

.archive-image-card:hover {
    transform:
        rotate(0deg)
        translateY(-8px)
        scale(1.015);

    box-shadow:
        0 40px 85px rgba(56, 48, 83, 0.18),
        0 15px 40px rgba(229, 169, 73, 0.12),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* =========================================================
   IMAGE
========================================================= */

.archive-image-inner {
    position: relative;

    width: 100%;
    height: 100%;

    overflow: hidden;

    border-radius: 27px;
}

.archive-image-inner::after {
    content: "";

    position: absolute;
    inset: 0;

    background:
        linear-gradient(
            135deg,
            rgba(111, 82, 155, 0.10),
            transparent 45%,
            rgba(226, 165, 70, 0.14)
        );

    pointer-events: none;
}

.archive-image-inner img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform 0.8s cubic-bezier(.2,.8,.2,1),
        filter 0.6s ease;
}

.archive-image-card:hover .archive-image-inner img {
    transform: scale(1.07);

    filter: saturate(1.08);
}


/* =========================================================
   FLOATING MINI CARD
========================================================= */

.archive-mini-card {
    position: absolute;

    left: -35px;
    bottom: 35px;

    display: flex;
    align-items: center;
    gap: 11px;

    padding: 12px 17px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.90),
            rgba(255,246,220,0.78),
            rgba(242,235,252,0.80)
        );

    border: 1px solid rgba(125, 99, 166, 0.16);

    box-shadow:
        0 15px 35px rgba(58, 49, 83, 0.13);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transform: rotate(-3deg);

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}

.archive-image-card:hover .archive-mini-card {
    transform:
        rotate(0deg)
        translateY(-7px);

    box-shadow:
        0 20px 45px rgba(58, 49, 83, 0.17);
}

.archive-mini-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background:
        linear-gradient(
            135deg,
            rgba(228, 170, 72, 0.25),
            rgba(144, 110, 187, 0.22)
        );

    color: #7960a6;
}

.archive-mini-card span {
    font-size: 12px;
    font-weight: 700;

    color: #394158;
}


/* =========================================================
   VISUAL HOVER ANIMATION
========================================================= */

.archive-visual:hover .archive-orb-one {
    transform: translate(18px, -15px) scale(1.12);
}

.archive-visual:hover .archive-orb-two {
    transform: translate(-15px, 15px) scale(1.08);
}

.archive-visual:hover .archive-orb-three {
    transform: translate(10px, -12px) scale(1.15);
}

.archive-visual:hover .archive-decoration-one {
    transform:
        rotate(32deg)
        translate(-8px, -10px);
}

.archive-visual:hover .archive-decoration-two {
    transform:
        rotate(-28deg)
        translate(8px, 10px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .about-archive-section {
        padding: 35px 20px !important;
    }

    .archive-glass-content {
        padding: 30px;
        margin-bottom: 30px;
    }

    .archive-image-column {
        min-height: 500px;
    }

    .archive-image-card {
        width: 78%;
    }

}


@media (max-width: 575px) {

    .about-archive-section {
        padding: 25px 12px !important;
    }

    .archive-glass-content {
        padding: 22px;
        border-radius: 25px;
    }

    .archive-title {
        font-size: 29px;
    }

    .archive-description {
        font-size: 14px;
    }

    .archive-feature-card {
        padding: 13px;
    }

    .archive-feature-icon {
        flex-basis: 40px;
        width: 40px;
        height: 40px;
    }

    .archive-image-column {
        min-height: 420px;
    }

    .archive-visual {
        min-height: 420px;
    }

    .archive-image-card {
        width: 86%;
        height: 380px;
    }

    .archive-mini-card {
        left: -5px;
        bottom: 20px;
    }

    .archive-orb-one {
        right: 0;
    }

    .archive-orb-two {
        left: -10px;
    }
}

/* =========================================================
   ABOUT MEDIA
========================================================= */

.about-media-section {
    position: relative;
    overflow: hidden;
    isolation: isolate;
}


/* =========================================================
   GLASS CONTENT
========================================================= */

.media-glass-content {
    position: relative;

    padding: 38px;

    border-radius: 32px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 255, 255, 0.92),
            rgba(231, 247, 255, 0.72),
            rgba(240, 235, 255, 0.72),
            rgba(255, 250, 235, 0.72)
        );

    border: 1px solid rgba(74, 133, 177, 0.18);

    box-shadow:
        0 25px 70px rgba(45, 76, 104, 0.11),
        0 8px 25px rgba(107, 85, 155, 0.05),
        inset 0 1px 0 rgba(255, 255, 255, 0.96);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}

.media-glass-content:hover {
    transform: translateY(-6px);

    box-shadow:
        0 35px 85px rgba(45, 76, 104, 0.15),
        0 0 45px rgba(81, 172, 213, 0.07),
        inset 0 1px 0 rgba(255, 255, 255, 1);
}


/* =========================================================
   EYEBROW
========================================================= */

.media-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;

    margin-bottom: 12px;

    font-size: 12px;
    font-weight: 700;
    letter-spacing: 2.5px;

    color: #477ea1;
}

.media-eyebrow-line {
    width: 34px;
    height: 2px;

    border-radius: 50px;

    background:
        linear-gradient(
            90deg,
            #54afd1,
            #7771b7,
            #e1ae59
        );
}


/* =========================================================
   TITLE
========================================================= */

.media-title {
    margin-bottom: 18px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: clamp(30px, 3vw, 43px);

    font-weight: 700;

    line-height: 1.18;

    color: #1e2d43;
}

.media-title span {
    display: inline-block;

    background:
        linear-gradient(
            90deg,
            #397fa7,
            #6c68a9,
            #a47bc1
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    background-clip: text;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.media-description {
    margin-bottom: 25px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 15px;

    line-height: 1.9;

    color: #667789;
}


/* =========================================================
   FEATURE CARDS
========================================================= */

.media-feature-card {
    position: relative;

    display: flex;
    align-items: flex-start;

    gap: 16px;

    margin-bottom: 13px;

    padding: 15px 17px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.78),
            rgba(230,247,255,0.56),
            rgba(241,236,255,0.55)
        );

    border: 1px solid rgba(77, 139, 178, 0.14);

    box-shadow:
        0 8px 25px rgba(45, 82, 110, 0.055);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    overflow: hidden;

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-color 0.4s ease;
}

.media-feature-card::before {
    content: "";

    position: absolute;

    left: 0;
    top: 0;

    width: 3px;
    height: 100%;

    border-radius: 10px;

    background:
        linear-gradient(
            180deg,
            #55b4d5,
            #7773b7,
            #d8a854
        );

    transform: scaleY(0);

    transform-origin: top;

    transition: transform 0.4s ease;
}

.media-feature-card:hover {
    transform: translateX(7px);

    border-color: rgba(70, 151, 194, 0.28);

    box-shadow:
        0 15px 35px rgba(45, 82, 110, 0.10),
        0 0 25px rgba(76, 172, 213, 0.07);
}

.media-feature-card:hover::before {
    transform: scaleY(1);
}


/* =========================================================
   FEATURE ICON
========================================================= */

.media-feature-icon {
    flex: 0 0 45px;

    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background:
        linear-gradient(
            135deg,
            rgba(74, 175, 211, 0.22),
            rgba(115, 107, 180, 0.20),
            rgba(225, 174, 83, 0.12)
        );

    border: 1px solid rgba(70, 145, 182, 0.15);

    color: #4d7fa6;

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease,
        background 0.4s ease;
}

.media-feature-card:hover .media-feature-icon {
    transform:
        rotate(-6deg)
        scale(1.1);

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(71, 174, 212, 0.34),
            rgba(111, 102, 179, 0.30)
        );
}


/* =========================================================
   FEATURE TEXT
========================================================= */

.media-feature-text h6 {
    margin: 2px 0 5px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 14px;

    font-weight: 700;

    color: #29394d;
}

.media-feature-text p {
    margin: 0;

    font-size: 13px;

    line-height: 1.65;

    color: #748393;
}


/* =========================================================
   BUTTON
========================================================= */

.media-action {
    margin-top: 25px;
}

.media-view-btn {
    position: relative;

    display: inline-flex;
    align-items: center;

    gap: 12px;

    padding: 13px 21px;

    border-radius: 50px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    color: #ffffff;

    background:
        linear-gradient(
            100deg,
            #397fa7,
            #6967a9,
            #8b70b5
        );

    box-shadow:
        0 10px 25px rgba(65, 120, 155, 0.22);

    overflow: hidden;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}

.media-view-btn::before {
    content: "";

    position: absolute;

    top: 0;
    left: -100%;

    width: 70%;
    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.38),
            transparent
        );

    transform: skewX(-20deg);

    transition: left 0.6s ease;
}

.media-view-btn:hover {
    color: #ffffff;

    transform: translateY(-3px);

    box-shadow:
        0 15px 35px rgba(65, 120, 155, 0.30);
}

.media-view-btn:hover::before {
    left: 140%;
}

.media-view-btn i {
    transition: transform 0.35s ease;
}

.media-view-btn:hover i {
    transform: translateX(5px);
}


/* =========================================================
   IMAGE AREA
========================================================= */

.media-image-column {
    min-height: 530px;
}

.media-visual {
    position: relative;

    width: 100%;
    height: 100%;

    min-height: 500px;

    display: flex;
    align-items: center;
    justify-content: center;
}


/* =========================================================
   ORBS
========================================================= */

.media-orb {
    position: absolute;

    border-radius: 50%;

    transition:
        transform 0.7s cubic-bezier(.2,.8,.2,1),
        opacity 0.5s ease;
}

.media-orb-one {
    width: 170px;
    height: 170px;

    top: 25px;
    left: 5px;

    background:
        radial-gradient(
            circle,
            rgba(68, 181, 218, 0.25),
            rgba(68, 181, 218, 0)
        );
}

.media-orb-two {
    width: 210px;
    height: 210px;

    bottom: 20px;
    right: 0;

    background:
        radial-gradient(
            circle,
            rgba(111, 96, 184, 0.22),
            rgba(111, 96, 184, 0)
        );
}

.media-orb-three {
    width: 130px;
    height: 130px;

    top: 48%;
    right: 12%;

    background:
        radial-gradient(
            circle,
            rgba(228, 178, 79, 0.15),
            rgba(228, 178, 79, 0)
        );
}


/* =========================================================
   DECORATIONS
========================================================= */

.media-decoration {
    position: absolute;

    border-radius: 28px;

    transition:
        transform 0.6s ease,
        border-radius 0.6s ease;
}

.media-decoration-one {
    width: 110px;
    height: 110px;

    top: 10%;
    right: 8%;

    background:
        linear-gradient(
            135deg,
            rgba(75, 180, 216, 0.18),
            rgba(111, 98, 182, 0.13)
        );

    transform: rotate(22deg);
}

.media-decoration-two {
    width: 90px;
    height: 90px;

    bottom: 12%;
    left: 4%;

    background:
        linear-gradient(
            135deg,
            rgba(107, 101, 181, 0.17),
            rgba(77, 181, 215, 0.12)
        );

    transform: rotate(-18deg);
}


/* =========================================================
   IMAGE CARD
========================================================= */

.media-image-card {
    position: relative;

    width: 82%;
    height: 450px;

    padding: 12px;

    border-radius: 35px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,0.90),
            rgba(224,246,255,0.64),
            rgba(238,233,255,0.70),
            rgba(255,248,225,0.62)
        );

    border: 1px solid rgba(72, 132, 174, 0.19);

    box-shadow:
        0 30px 70px rgba(43, 74, 102, 0.15),
        0 10px 30px rgba(71, 164, 207, 0.08),
        inset 0 1px 0 rgba(255,255,255,0.96);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    transform: rotate(-2deg);

    transition:
        transform 0.6s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.6s ease;
}

.media-image-card:hover {
    transform:
        rotate(0deg)
        translateY(-8px)
        scale(1.015);

    box-shadow:
        0 40px 85px rgba(43, 74, 102, 0.19),
        0 15px 40px rgba(71, 164, 207, 0.12),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* =========================================================
   IMAGE
========================================================= */

.media-image-inner {
    position: relative;

    width: 100%;
    height: 100%;

    overflow: hidden;

    border-radius: 27px;
}

.media-image-inner img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform 0.8s cubic-bezier(.2,.8,.2,1),
        filter 0.6s ease;
}

.media-image-inner::after {
    content: "";

    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            135deg,
            rgba(45, 130, 170, 0.12),
            transparent 45%,
            rgba(105, 90, 176, 0.14)
        );

    pointer-events: none;
}

.media-image-card:hover .media-image-inner img {
    transform: scale(1.07);

    filter: saturate(1.08);
}


/* =========================================================
   PLAY ICON
========================================================= */

.media-image-overlay {
    position: absolute;

    inset: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    pointer-events: none;
}

.media-play-icon {
    width: 65px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            rgba(61, 153, 194, 0.88),
            rgba(105, 92, 173, 0.88)
        );

    border: 1px solid rgba(255,255,255,0.45);

    box-shadow:
        0 15px 35px rgba(40, 87, 119, 0.25);

    backdrop-filter: blur(10px);

    transform: scale(0.85);

    opacity: 0.85;

    transition:
        transform 0.45s ease,
        opacity 0.45s ease;
}

.media-image-card:hover .media-play-icon {
    transform: scale(1);

    opacity: 1;
}


/* =========================================================
   FLOATING MINI CARD
========================================================= */

.media-mini-card {
    position: absolute;

    right: -35px;
    bottom: 35px;

    display: flex;
    align-items: center;

    gap: 11px;

    padding: 12px 17px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.91),
            rgba(226,247,255,0.79),
            rgba(241,235,255,0.81)
        );

    border: 1px solid rgba(75, 137, 176, 0.17);

    box-shadow:
        0 15px 35px rgba(43, 74, 102, 0.14);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transform: rotate(3deg);

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}

.media-image-card:hover .media-mini-card {
    transform:
        rotate(0deg)
        translateY(-7px);

    box-shadow:
        0 20px 45px rgba(43, 74, 102, 0.18);
}

.media-mini-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background:
        linear-gradient(
            135deg,
            rgba(71, 177, 214, 0.25),
            rgba(107, 97, 180, 0.23)
        );

    color: #4f7ea3;
}

.media-mini-title {
    display: block;

    font-size: 12px;

    font-weight: 700;

    color: #354458;
}

.media-mini-card small {
    display: block;

    margin-top: 2px;

    font-size: 10px;

    color: #7b8998;
}


/* =========================================================
   HOVER BACKGROUND ANIMATION
========================================================= */

.media-visual:hover .media-orb-one {
    transform:
        translate(-15px, -15px)
        scale(1.12);
}

.media-visual:hover .media-orb-two {
    transform:
        translate(15px, 15px)
        scale(1.08);
}

.media-visual:hover .media-orb-three {
    transform:
        translate(10px, -12px)
        scale(1.15);
}

.media-visual:hover .media-decoration-one {
    transform:
        rotate(34deg)
        translate(8px, -10px);
}

.media-visual:hover .media-decoration-two {
    transform:
        rotate(-30deg)
        translate(-8px, 10px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .about-media-section {
        padding: 35px 20px !important;
    }

    .media-glass-content {
        padding: 30px;

        margin-top: 30px;
    }

    .media-image-column {
        min-height: 500px;
    }

    .media-image-card {
        width: 78%;
    }
}


@media (max-width: 575px) {

    .about-media-section {
        padding: 25px 12px !important;
    }

    .media-glass-content {
        padding: 22px;

        border-radius: 25px;
    }

    .media-title {
        font-size: 29px;
    }

    .media-description {
        font-size: 14px;
    }

    .media-feature-card {
        padding: 13px;
    }

    .media-feature-icon {
        flex-basis: 40px;

        width: 40px;
        height: 40px;
    }

    .media-image-column {
        min-height: 420px;
    }

    .media-visual {
        min-height: 420px;
    }

    .media-image-card {
        width: 86%;
        height: 380px;
    }

    .media-mini-card {
        right: -5px;
        bottom: 20px;
    }
}
/* =========================================================
   ABOUT ANNOUNCEMENTS
========================================================= */

.about-announcement-section {
    position: relative;

    width: 100%;

    padding: 70px 0 110px;

    overflow: hidden;

    isolation: isolate;
}


/* =========================================================
   FULL WIDTH BANNER
========================================================= */

.announcement-banner {
    position: relative;

    width: 100%;

    height: 380px;

    overflow: hidden;

    border-radius: 0;

    box-shadow:
        0 25px 60px rgba(44, 52, 74, 0.12);
}

.announcement-banner img {
    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform 1.2s cubic-bezier(.2,.8,.2,1),
        filter 0.8s ease;
}

.about-announcement-section:hover
.announcement-banner img {
    transform: scale(1.045);

    filter: saturate(1.05);
}


/* =========================================================
   IMAGE OVERLAY
========================================================= */

.announcement-image-overlay {
    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            90deg,
            rgba(32, 48, 72, 0.48),
            rgba(73, 81, 131, 0.20),
            rgba(224, 175, 85, 0.12)
        );

    pointer-events: none;
}


/* =========================================================
   FLOATING LABEL
========================================================= */

.announcement-floating-label {
    position: absolute;

    top: 28px;
    left: 35px;

    display: flex;
    align-items: center;

    gap: 10px;

    padding: 9px 14px 9px 9px;

    border-radius: 50px;

    background:
        rgba(255, 255, 255, 0.18);

    border: 1px solid rgba(255,255,255,0.35);

    color: #ffffff;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 1.8px;

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    box-shadow:
        0 10px 30px rgba(25, 35, 55, 0.12);

    transition:
        transform 0.5s ease,
        background 0.5s ease;
}

.about-announcement-section:hover
.announcement-floating-label {
    transform: translateY(-4px);

    background:
        rgba(255, 255, 255, 0.25);
}

.announcement-label-icon {
    width: 31px;
    height: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(232, 183, 79, 0.95),
            rgba(122, 105, 181, 0.90)
        );

    color: #ffffff;
}


/* =========================================================
   CONTENT WRAPPER
========================================================= */

.announcement-content-wrapper {
    position: relative;

    width: 100%;

    margin-top: -205px;

    padding: 0 7%;

    z-index: 5;
}


/* =========================================================
   GLASS CARD
========================================================= */

.announcement-glass-card {
    position: relative;

    padding: 38px 42px 35px;

    border-radius: 32px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.91),
            rgba(239,247,255,0.78),
            rgba(243,237,255,0.78),
            rgba(255,247,224,0.72)
        );

    border: 1px solid rgba(255,255,255,0.85);

    box-shadow:
        0 30px 80px rgba(39, 51, 75, 0.16),
        0 8px 30px rgba(116, 91, 160, 0.08),
        inset 0 1px 0 rgba(255,255,255,0.98);

    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);

    overflow: hidden;

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}

.announcement-glass-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 3px;

    background:
        linear-gradient(
            90deg,
            #6e82b8,
            #8c72b1,
            #e2ad55,
            #66aeca
        );
}

.announcement-glass-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 40px 95px rgba(39, 51, 75, 0.20),
        0 10px 35px rgba(116, 91, 160, 0.10),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* =========================================================
   SCROLL REVEAL
========================================================= */

.announcementReveal {
    opacity: 0;

    transform:
        translateY(100px)
        scale(0.97);

    transition:
        opacity 0.9s cubic-bezier(.2,.8,.2,1),
        transform 1s cubic-bezier(.2,.8,.2,1);
}

.announcementReveal.announcement-visible {
    opacity: 1;

    transform:
        translateY(0)
        scale(1);
}


/* =========================================================
   HEADING
========================================================= */

.announcement-heading {
    max-width: 900px;

    margin: 0 auto 25px;

    text-align: center;
}

.announcement-eyebrow {
    display: flex;
    align-items: center;
    justify-content: center;

    gap: 10px;

    margin-bottom: 10px;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 2.5px;

    color: #6778a2;
}

.announcement-line {
    width: 32px;
    height: 2px;

    border-radius: 50px;

    background:
        linear-gradient(
            90deg,
            #6d82b6,
            #8e6fb0,
            #dda94e
        );
}

.announcement-heading h1 {
    margin-bottom: 16px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: clamp(30px, 4vw, 45px);

    font-weight: 700;

    line-height: 1.15;

    color: #202c42;
}

.announcement-heading h1 span {
    background:
        linear-gradient(
            90deg,
            #6579ae,
            #896fb0,
            #d39a48
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    background-clip: text;
}

.announcement-intro {
    max-width: 780px;

    margin: 0 auto;

    font-size: 14px;

    line-height: 1.85;

    color: #697689;
}


/* =========================================================
   FEATURES GRID
========================================================= */

.announcement-features {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 15px;

    margin-top: 25px;
}


/* =========================================================
   FEATURE CARD
========================================================= */

.announcement-feature {
    position: relative;

    display: flex;

    align-items: flex-start;

    gap: 13px;

    padding: 17px;

    min-height: 135px;

    border-radius: 20px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,0.78),
            rgba(239,247,255,0.58),
            rgba(244,239,255,0.55)
        );

    border: 1px solid rgba(96, 111, 157, 0.12);

    box-shadow:
        0 8px 25px rgba(45, 54, 79, 0.055);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    overflow: hidden;

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-radius 0.4s ease;
}

.announcement-feature::after {
    content: "";

    position: absolute;

    width: 75px;
    height: 75px;

    right: -25px;
    bottom: -30px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(222, 174, 80, 0.16),
            transparent 70%
        );

    transition:
        transform 0.5s ease;
}

.announcement-feature:hover {
    transform:
        translateY(-7px);

    border-radius: 24px;

    box-shadow:
        0 18px 38px rgba(45, 54, 79, 0.11);
}

.announcement-feature:hover::after {
    transform: scale(1.5);
}


/* =========================================================
   FEATURE ICON
========================================================= */

.announcement-feature-icon {
    flex: 0 0 45px;

    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background:
        linear-gradient(
            135deg,
            rgba(104, 125, 177, 0.23),
            rgba(139, 109, 174, 0.20),
            rgba(226, 173, 75, 0.18)
        );

    border: 1px solid rgba(107, 117, 164, 0.14);

    color: #6878a7;

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease;
}

.announcement-feature:hover
.announcement-feature-icon {
    transform:
        rotate(-8deg)
        scale(1.1);

    border-radius: 50%;
}


/* =========================================================
   FEATURE TEXT
========================================================= */

.announcement-feature h6 {
    margin: 2px 0 6px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 13px;

    font-weight: 700;

    color: #29354a;
}

.announcement-feature p {
    margin: 0;

    font-size: 12px;

    line-height: 1.7;

    color: #758092;
}


/* =========================================================
   BUTTON
========================================================= */

.announcement-action {
    display: flex;

    justify-content: center;

    margin-top: 27px;
}

.announcement-btn {
    position: relative;

    display: inline-flex;

    align-items: center;

    gap: 12px;

    padding: 13px 23px;

    border-radius: 50px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    color: #ffffff;

    background:
        linear-gradient(
            100deg,
            #6278ac,
            #866eae,
            #d19b4c
        );

    box-shadow:
        0 12px 30px rgba(92, 103, 154, 0.23);

    overflow: hidden;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}

.announcement-btn::before {
    content: "";

    position: absolute;

    top: 0;
    left: -110%;

    width: 70%;
    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.4),
            transparent
        );

    transform: skewX(-20deg);

    transition: left 0.65s ease;
}

.announcement-btn:hover {
    color: #ffffff;

    transform: translateY(-4px);

    box-shadow:
        0 18px 40px rgba(92, 103, 154, 0.30);
}

.announcement-btn:hover::before {
    left: 145%;
}

.announcement-btn i {
    transition:
        transform 0.35s ease;
}

.announcement-btn:hover i {
    transform:
        translateX(5px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .about-announcement-section {
        padding-top: 50px;
        padding-bottom: 90px;
    }

    .announcement-banner {
        height: 350px;
    }

    .announcement-content-wrapper {
        margin-top: -160px;

        padding: 0 5%;
    }

    .announcement-features {
        grid-template-columns: 1fr;
    }

}


@media (max-width: 575px) {

    .about-announcement-section {
        padding-top: 35px;
        padding-bottom: 60px;
    }

    .announcement-banner {
        height: 300px;
    }

    .announcement-floating-label {
        left: 18px;
        top: 18px;

        font-size: 8px;
    }

    .announcement-content-wrapper {
        margin-top: -100px;

        padding: 0 12px;
    }

    .announcement-glass-card {
        padding: 27px 19px 25px;

        border-radius: 25px;
    }

    .announcement-heading h1 {
        font-size: 29px;
    }

    .announcement-intro {
        font-size: 13px;
    }

    .announcement-feature {
        min-height: auto;

        padding: 14px;
    }

    .announcement-feature-icon {
        flex-basis: 40px;

        width: 40px;
        height: 40px;
    }

}

/* =========================================================
   ABOUT ACADEMY
========================================================= */

.about-academy-section {
    position: relative;

    width: 100%;

    padding: 70px 0 110px;

    overflow: hidden;

    isolation: isolate;
}


/* =========================================================
   FULL WIDTH BANNER
========================================================= */

.academy-banner {
    position: relative;

    width: 100%;

    height: 400px;

    overflow: hidden;

    box-shadow:
        0 25px 60px rgba(38, 55, 82, 0.12);
}

.academy-banner img {
    width: 100%;
    height: 400px;

    display: block;

    

    transition:
        transform 1.2s cubic-bezier(.2,.8,.2,1),
        filter 0.8s ease;
}

.about-academy-section:hover
.academy-banner img {
    transform: scale(1.045);

    filter: saturate(1.06);
}


/* =========================================================
   IMAGE OVERLAY
========================================================= */

.academy-image-overlay {
    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            100deg,
            rgba(31, 58, 88, 0.54),
            rgba(57, 98, 132, 0.24),
            rgba(103, 84, 150, 0.22),
            rgba(220, 171, 79, 0.10)
        );

    pointer-events: none;
}


/* =========================================================
   FLOATING LABEL
========================================================= */

.academy-floating-label {
    position: absolute;

    top: 28px;
    left: 35px;

    display: flex;
    align-items: center;

    gap: 10px;

    padding: 9px 15px 9px 9px;

    border-radius: 50px;

    background:
        rgba(255,255,255,0.18);

    border: 1px solid rgba(255,255,255,0.35);

    color: #ffffff;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 1.8px;

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    box-shadow:
        0 10px 30px rgba(25, 40, 65, 0.12);

    transition:
        transform 0.5s ease,
        background 0.5s ease;
}

.about-academy-section:hover
.academy-floating-label {
    transform: translateY(-4px);

    background:
        rgba(255,255,255,0.25);
}

.academy-label-icon {
    width: 31px;
    height: 31px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(70, 164, 204, 0.95),
            rgba(103, 91, 166, 0.95)
        );

    color: #ffffff;
}


/* =========================================================
   CONTENT WRAPPER
========================================================= */

.academy-content-wrapper {
    position: relative;

    width: 100%;

    margin-top: -205px;

    padding: 0 7%;

    z-index: 5;
}


/* =========================================================
   GLASS CARD
========================================================= */

.academy-glass-card {
    position: relative;

    padding: 40px 42px 35px;

    border-radius: 32px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.92),
            rgba(232,247,255,0.78),
            rgba(240,235,255,0.80),
            rgba(255,249,227,0.74)
        );

    border: 1px solid rgba(255,255,255,0.88);

    box-shadow:
        0 30px 80px rgba(39, 53, 78, 0.16),
        0 8px 30px rgba(76, 105, 143, 0.07),
        inset 0 1px 0 rgba(255,255,255,0.98);

    backdrop-filter: blur(25px);
    -webkit-backdrop-filter: blur(25px);

    overflow: hidden;

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease;
}

.academy-glass-card::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 3px;

    background:
        linear-gradient(
            90deg,
            #4b9ec4,
            #6d72b2,
            #9671b0,
            #dca850
        );
}

.academy-glass-card:hover {
    transform: translateY(-6px);

    box-shadow:
        0 40px 95px rgba(39, 53, 78, 0.20),
        0 10px 35px rgba(76, 105, 143, 0.10),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* =========================================================
   SCROLL REVEAL
========================================================= */

.academyReveal {
    opacity: 0;

    transform:
        translateY(100px)
        scale(0.97);

    transition:
        opacity 0.9s cubic-bezier(.2,.8,.2,1),
        transform 1s cubic-bezier(.2,.8,.2,1);
}

.academyReveal.academy-visible {
    opacity: 1;

    transform:
        translateY(0)
        scale(1);
}


/* =========================================================
   HEADING
========================================================= */

.academy-heading {
    max-width: 900px;

    margin: 0 auto 27px;

    text-align: center;
}

.academy-eyebrow {
    display: flex;
    align-items: center;
    justify-content: center;

    gap: 10px;

    margin-bottom: 10px;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 2.5px;

    color: #5c79a2;
}

.academy-line {
    width: 30px;
    height: 2px;

    border-radius: 50px;

    background:
        linear-gradient(
            90deg,
            #4d9fc4,
            #7770ae,
            #dba650
        );
}

.academy-line-right {
    transform: scaleX(-1);
}

.academy-heading h1 {
    margin-bottom: 16px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: clamp(31px, 4vw, 46px);

    font-weight: 700;

    line-height: 1.15;

    color: #202d43;
}

.academy-heading h1 span {
    background:
        linear-gradient(
            90deg,
            #418cad,
            #7669ae,
            #a778b5
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    background-clip: text;
}

.academy-intro {
    max-width: 820px;

    margin: 0 auto;

    font-size: 14px;

    line-height: 1.9;

    color: #69788b;
}


/* =========================================================
   FEATURES
========================================================= */

.academy-features {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 15px;

    margin-top: 25px;
}


/* =========================================================
   FEATURE CARD
========================================================= */

.academy-feature {
    position: relative;

    display: flex;

    align-items: flex-start;

    gap: 13px;

    padding: 17px;

    min-height: 140px;

    border-radius: 20px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,0.80),
            rgba(231,247,255,0.58),
            rgba(243,238,255,0.57)
        );

    border: 1px solid rgba(84, 117, 155, 0.12);

    box-shadow:
        0 8px 25px rgba(45, 58, 83, 0.055);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    overflow: hidden;

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-radius 0.4s ease;
}

.academy-feature::after {
    content: "";

    position: absolute;

    width: 85px;
    height: 85px;

    right: -30px;
    bottom: -35px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(70, 166, 204, 0.15),
            transparent 70%
        );

    transition:
        transform 0.5s ease;
}

.academy-feature:hover {
    transform:
        translateY(-7px);

    border-radius: 24px;

    box-shadow:
        0 18px 38px rgba(45, 58, 83, 0.11);
}

.academy-feature:hover::after {
    transform: scale(1.6);
}


/* =========================================================
   FEATURE ICON
========================================================= */

.academy-feature-icon {
    flex: 0 0 45px;

    width: 45px;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background:
        linear-gradient(
            135deg,
            rgba(67, 161, 200, 0.23),
            rgba(112, 104, 177, 0.21),
            rgba(224, 173, 77, 0.14)
        );

    border: 1px solid rgba(78, 135, 173, 0.14);

    color: #537da2;

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease,
        background 0.4s ease;
}

.academy-feature:hover
.academy-feature-icon {
    transform:
        rotate(-8deg)
        scale(1.1);

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(67, 166, 207, 0.34),
            rgba(116, 101, 180, 0.29)
        );
}


/* =========================================================
   FEATURE TEXT
========================================================= */

.academy-feature h6 {
    margin: 2px 0 6px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 13px;

    font-weight: 700;

    color: #29374c;
}

.academy-feature p {
    margin: 0;

    font-size: 12px;

    line-height: 1.7;

    color: #748193;
}


/* =========================================================
   ACADEMY HIGHLIGHT
========================================================= */

.academy-highlight {
    display: flex;

    align-items: center;

    gap: 15px;

    margin-top: 19px;

    padding: 15px 18px;

    border-radius: 18px;

    background:
        linear-gradient(
            100deg,
            rgba(70, 163, 201, 0.09),
            rgba(111, 101, 177, 0.08),
            rgba(222, 171, 76, 0.08)
        );

    border: 1px solid rgba(92, 116, 154, 0.11);
}

.academy-highlight-icon {
    flex: 0 0 43px;

    width: 43px;
    height: 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background:
        linear-gradient(
            135deg,
            #5ba9ca,
            #756caf
        );

    color: #ffffff;

    box-shadow:
        0 8px 20px rgba(78, 128, 166, 0.18);
}

.academy-highlight strong {
    display: block;

    margin-bottom: 3px;

    font-size: 13px;

    color: #344259;
}

.academy-highlight span {
    display: block;

    font-size: 11px;

    line-height: 1.6;

    color: #778294;
}


/* =========================================================
   BUTTON
========================================================= */

.academy-action {
    display: flex;

    justify-content: center;

    margin-top: 27px;
}

.academy-btn {
    position: relative;

    display: inline-flex;

    align-items: center;

    gap: 12px;

    padding: 13px 23px;

    border-radius: 50px;

    text-decoration: none;

    font-size: 13px;

    font-weight: 600;

    color: #ffffff;

    background:
        linear-gradient(
            100deg,
            #4d8fac,
            #6d69aa,
            #9471ae
        );

    box-shadow:
        0 12px 30px rgba(75, 118, 154, 0.23);

    overflow: hidden;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}

.academy-btn::before {
    content: "";

    position: absolute;

    top: 0;
    left: -110%;

    width: 70%;
    height: 100%;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,0.4),
            transparent
        );

    transform: skewX(-20deg);

    transition:
        left 0.65s ease;
}

.academy-btn:hover {
    color: #ffffff;

    transform:
        translateY(-4px);

    box-shadow:
        0 18px 40px rgba(75, 118, 154, 0.30);
}

.academy-btn:hover::before {
    left: 145%;
}

.academy-btn i {
    transition:
        transform 0.35s ease;
}

.academy-btn:hover i {
    transform:
        translateX(5px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .about-academy-section {
        padding-top: 50px;

        padding-bottom: 90px;
    }

    .academy-banner {
        height: 350px;
    }

    .academy-content-wrapper {
        margin-top: -160px;

        padding: 0 5%;
    }

    .academy-features {
        grid-template-columns: 1fr;
    }

}


@media (max-width: 575px) {

    .about-academy-section {
        padding-top: 35px;

        padding-bottom: 60px;
    }

    .academy-banner {
        height: 300px;
    }

    .academy-floating-label {
        left: 18px;

        top: 18px;

        font-size: 8px;
    }

    .academy-content-wrapper {
        margin-top: -100px;

        padding: 0 12px;
    }

    .academy-glass-card {
        padding: 27px 19px 25px;

        border-radius: 25px;
    }

    .academy-heading h1 {
        font-size: 29px;
    }

    .academy-intro {
        font-size: 13px;
    }

    .academy-feature {
        min-height: auto;

        padding: 14px;
    }

    .academy-feature-icon {
        flex-basis: 40px;

        width: 40px;
        height: 40px;
    }

    .academy-highlight {
        align-items: flex-start;
    }

}
/* =========================================================
   LEGAL SYSTEMS — AREAS COVERED
========================================================= */

.legal-systems-section {
    position: relative;

    width: 100%;

    padding: 90px 0 110px;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 8% 20%,
            rgba(112, 154, 205, 0.08),
            transparent 28%
        ),
        radial-gradient(
            circle at 92% 75%,
            rgba(218, 177, 89, 0.09),
            transparent 28%
        );
}


/* =========================================================
   BACKGROUND DECORATIONS
========================================================= */

.legal-systems-section::before {
    content: "";

    position: absolute;

    width: 300px;
    height: 300px;

    top: -130px;
    right: -100px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(128, 106, 181, 0.10),
            transparent 70%
        );

    pointer-events: none;
}

.legal-systems-section::after {
    content: "";

    position: absolute;

    width: 260px;
    height: 260px;

    bottom: -120px;
    left: -90px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(222, 178, 76, 0.10),
            transparent 70%
        );

    pointer-events: none;
}


/* =========================================================
   HEADER
========================================================= */

.legal-systems-header {
    position: relative;

    max-width: 900px;

    margin: 0 auto 45px;

    text-align: center;

    z-index: 2;
}

.legal-systems-eyebrow {
    display: flex;

    align-items: center;

    justify-content: center;

    gap: 11px;

    margin-bottom: 13px;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 2.6px;

    color: #687aa4;
}

.legal-header-line {
    width: 34px;
    height: 2px;

    border-radius: 50px;

    background:
        linear-gradient(
            90deg,
            #5b9cbd,
            #8371ad,
            #d9a54c
        );
}

.legal-systems-header h1 {
    margin: 0 auto 15px;

    max-width: 800px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: clamp(30px, 4vw, 45px);

    line-height: 1.18;

    font-weight: 700;

    color: #202c42;
}

.legal-systems-header h1 span {
    background:
        linear-gradient(
            90deg,
            #568eae,
            #7869aa,
            #c49348
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    background-clip: text;
}

.legal-systems-header p {
    max-width: 650px;

    margin: 0 auto;

    font-size: 14px;

    line-height: 1.85;

    color: #748093;
}


/* =========================================================
   LEGAL SYSTEM CARD
========================================================= */

.legal-system-card {
    position: relative;

    height: 100%;

    overflow: hidden;

    border-radius: 30px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,0.95),
            rgba(237,247,255,0.84),
            rgba(244,239,255,0.84),
            rgba(255,249,229,0.78)
        );

    border: 1px solid rgba(255,255,255,0.95);

    box-shadow:
        0 20px 55px rgba(43, 55, 80, 0.10),
        0 5px 20px rgba(82, 99, 137, 0.06),
        inset 0 1px 0 rgba(255,255,255,1);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    transition:
        transform 0.55s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.55s ease,
        border-radius 0.55s ease;
}

.legal-system-card:hover {

    transform:
        translateY(-10px);

    border-radius: 34px;

    box-shadow:
        0 35px 80px rgba(43, 55, 80, 0.16),
        0 10px 35px rgba(82, 99, 137, 0.10),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* =========================================================
   IMAGE
========================================================= */

.legal-system-image {
    position: relative;

    width: 100%;

    height: 310px;

    overflow: hidden;
}

.legal-system-image img {
    width: 100%;
  
    height: 310px;
    display: block;

   

    transition:
        transform 1s cubic-bezier(.2,.8,.2,1),
        filter 0.7s ease;
}

.legal-system-card:hover
.legal-system-image img {

    transform:
        scale(1.08);

    filter:
        saturate(1.08)
        contrast(1.02);
}


/* =========================================================
   IMAGE OVERLAY
========================================================= */

.legal-image-overlay {
    position: absolute;

    inset: 0;

    background:
        linear-gradient(
            180deg,
            rgba(32,48,72,0.08) 0%,
            rgba(32,48,72,0.02) 35%,
            rgba(31,42,65,0.55) 100%
        );

    pointer-events: none;

    transition:
        background 0.5s ease;
}

.legal-system-card:hover
.legal-image-overlay {

    background:
        linear-gradient(
            180deg,
            rgba(74,96,139,0.10) 0%,
            rgba(78,74,126,0.08) 35%,
            rgba(31,42,65,0.62) 100%
        );
}


/* =========================================================
   BADGE
========================================================= */

.legal-system-badge {
    position: absolute;

    top: 20px;
    left: 20px;

    display: flex;

    align-items: center;

    gap: 9px;

    padding: 7px 13px 7px 7px;

    border-radius: 50px;

    background:
        rgba(255,255,255,0.17);

    border:
        1px solid rgba(255,255,255,0.35);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    color: #ffffff;

    box-shadow:
        0 10px 25px rgba(25, 35, 55, 0.12);

    transition:
        transform 0.4s ease,
        background 0.4s ease;
}

.legal-system-card:hover
.legal-system-badge {

    transform:
        translateY(-3px);

    background:
        rgba(255,255,255,0.24);
}

.legal-system-badge span {

    width: 30px;
    height: 30px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(91,160,194,0.95),
            rgba(116,95,167,0.95)
        );
}

.legal-system-badge small {

    font-size: 9px;

    font-weight: 700;

    letter-spacing: 1.4px;
}


/* =========================================================
   NUMBER
========================================================= */

.legal-system-number {

    position: absolute;

    right: 22px;
    bottom: 18px;

    font-family:
        "Poppins",
        sans-serif;

    font-size: 42px;

    font-weight: 700;

    line-height: 1;

    color:
        rgba(255,255,255,0.42);

    transition:
        transform 0.5s ease,
        color 0.5s ease;
}

.legal-system-card:hover
.legal-system-number {

    transform:
        translateY(-5px);

    color:
        rgba(255,255,255,0.65);
}


/* =========================================================
   CONTENT
========================================================= */

.legal-system-content {

    position: relative;

    padding: 27px 28px 25px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.70),
            rgba(241,248,255,0.60),
            rgba(247,243,255,0.62)
        );
}


/* =========================================================
   CONTENT TOP
========================================================= */

.legal-system-content-top {

    display: flex;

    align-items: flex-start;

    justify-content: space-between;

    gap: 20px;
}

.legal-system-label {

    display: block;

    margin-bottom: 6px;

    font-size: 9px;

    font-weight: 700;

    letter-spacing: 2px;

    color: #7786a5;
}

.legal-system-content h3 {

    margin: 0;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 23px;

    font-weight: 700;

    line-height: 1.3;

    color: #27354c;

    transition:
        color 0.35s ease;
}

.legal-system-card:hover
.legal-system-content h3 {

    color: #6670a8;
}


/* =========================================================
   CONTENT ICON
========================================================= */

.legal-system-icon {

    flex-shrink: 0;

    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            rgba(85,157,191,0.17),
            rgba(121,103,175,0.18),
            rgba(224,175,76,0.13)
        );

    border:
        1px solid rgba(95,115,157,0.12);

    color: #6678a6;

    box-shadow:
        0 8px 20px rgba(72,90,125,0.06);

    transition:
        transform 0.45s ease,
        border-radius 0.45s ease,
        background 0.45s ease;
}

.legal-system-card:hover
.legal-system-icon {

    transform:
        rotate(-8deg)
        scale(1.08);

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(85,157,191,0.27),
            rgba(121,103,175,0.25),
            rgba(224,175,76,0.19)
        );
}


/* =========================================================
   DESCRIPTION
========================================================= */

.legal-system-description {

    margin: 18px 0 21px;

    min-height: 50px;

    font-size: 13px;

    line-height: 1.8;

    color: #748093;
}


/* =========================================================
   FOOTER
========================================================= */

.legal-system-footer {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    padding-top: 17px;

    border-top:
        1px solid rgba(92,110,147,0.10);
}

.legal-system-explore {

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 1px;

    color: #6b7892;

    transition:
        color 0.35s ease,
        transform 0.35s ease;
}

.legal-system-card:hover
.legal-system-explore {

    color: #6673a5;

    transform:
        translateX(3px);
}


/* =========================================================
   ARROW BUTTON
========================================================= */

.legal-system-arrow {

    width: 43px;
    height: 43px;

    display: flex;

    align-items: center;

    justify-content: center;

    flex-shrink: 0;

    border-radius: 14px;

    text-decoration: none;

    background:
        linear-gradient(
            135deg,
            #608ead,
            #756da9,
            #b88a4e
        );

    color: #ffffff;

    box-shadow:
        0 9px 22px rgba(78,99,137,0.18);

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease,
        box-shadow 0.4s ease;
}

.legal-system-arrow:hover {

    color: #ffffff;

    transform:
        translateX(5px)
        scale(1.07);

    border-radius: 50%;

    box-shadow:
        0 13px 28px rgba(78,99,137,0.26);
}

.legal-system-arrow i {

    transition:
        transform 0.35s ease;
}

.legal-system-arrow:hover i {

    transform:
        translateX(2px);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.legal-empty-state {

    max-width: 550px;

    margin: 20px auto;

    padding: 45px 30px;

    text-align: center;

    border-radius: 25px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.85),
            rgba(238,247,255,0.75),
            rgba(246,240,255,0.75)
        );

    border:
        1px solid rgba(255,255,255,0.90);

    box-shadow:
        0 20px 50px rgba(44,56,81,0.08);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
}

.legal-empty-icon {

    width: 58px;
    height: 58px;

    display: flex;

    align-items: center;
    justify-content: center;

    margin: 0 auto 15px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            #6099b7,
            #7770a9
        );

    color: #ffffff;
}

.legal-empty-state h5 {

    margin-bottom: 8px;

    color: #303d53;
}

.legal-empty-state p {

    margin: 0;

    font-size: 13px;

    color: #7a8595;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .legal-systems-section {

        padding:
            70px 0 90px;
    }

    .legal-system-image {

        height: 290px;
    }

}


@media (max-width: 767px) {

    .legal-systems-section {

        padding:
            60px 0 75px;
    }

    .legal-systems-header {

        margin-bottom: 32px;
    }

    .legal-system-image {

        height: 300px;
    }

    .legal-system-content {

        padding:
            24px 22px 22px;
    }

}


@media (max-width: 575px) {

    .legal-systems-header h1 {

        font-size: 29px;
    }

    .legal-systems-header p {

        font-size: 13px;
    }

    .legal-system-image {
        width: 100%;
        background-size: 100% 100%;

        height: 100%;
    }

    .legal-system-content h3 {

        font-size: 20px;
    }

    .legal-system-description {

        font-size: 12px;
    }

    .legal-system-card {

        border-radius: 25px;
    }

}
/* =========================================================
   ABOUT US SECTION
========================================================= */

.about-us-section {
    position: relative;

    width: 100%;

    padding: 95px 0 110px;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 8% 30%,
            rgba(82, 157, 196, 0.07),
            transparent 27%
        ),
        radial-gradient(
            circle at 92% 70%,
            rgba(220, 173, 77, 0.08),
            transparent 28%
        );
}


/* =========================================================
   CONTENT
========================================================= */

.about-us-content {
    position: relative;

    z-index: 3;
}


/* =========================================================
   EYEBROW
========================================================= */

.about-us-eyebrow {

    display: flex;

    align-items: center;

    gap: 10px;

    margin-bottom: 13px;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 2.7px;

    color: #687aa2;
}

.about-eyebrow-line {

    width: 34px;
    height: 2px;

    border-radius: 50px;

    background:
        linear-gradient(
            90deg,
            #5b9fc1,
            #796dad,
            #d7a34e
        );
}


/* =========================================================
   TITLE
========================================================= */

.about-us-title {

    max-width: 650px;

    margin-bottom: 20px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: clamp(32px, 4vw, 47px);

    font-weight: 700;

    line-height: 1.16;

    color: #202c41;
}

.about-us-title span {

    display: block;

    background:
        linear-gradient(
            90deg,
            #4d91b3,
            #7669a9,
            #ad79a8,
            #c7964d
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    background-clip: text;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.about-us-description {

    max-width: 680px;

    margin-bottom: 27px;

    font-size: 14px;

    line-height: 1.95;

    color: #718095;
}


/* =========================================================
   FEATURE GRID
========================================================= */

.about-features {

    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 13px;

    max-width: 720px;
}


/* =========================================================
   FEATURE CARD
========================================================= */

.about-feature-card {

    position: relative;

    display: flex;

    align-items: flex-start;

    gap: 12px;

    min-height: 108px;

    padding: 16px;

    overflow: hidden;

    border-radius: 19px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.86),
            rgba(235,247,255,0.72),
            rgba(245,239,255,0.70),
            rgba(255,249,229,0.60)
        );

    border:
        1px solid rgba(89,111,149,0.11);

    box-shadow:
        0 9px 28px rgba(47,59,83,0.055),
        inset 0 1px 0 rgba(255,255,255,0.9);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-radius 0.4s ease,
        border-color 0.4s ease;
}


/* decorative glow */

.about-feature-card::after {

    content: "";

    position: absolute;

    width: 100px;
    height: 100px;

    right: -45px;
    bottom: -50px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(93,157,194,0.13),
            transparent 70%
        );

    transition:
        transform 0.5s ease;
}


.about-feature-card:hover {

    transform:
        translateY(-6px);

    border-radius: 23px;

    border-color:
        rgba(101,127,167,0.19);

    box-shadow:
        0 17px 38px rgba(47,59,83,0.10),
        inset 0 1px 0 rgba(255,255,255,1);
}


.about-feature-card:hover::after {

    transform:
        scale(1.65);
}


/* =========================================================
   FEATURE ICON
========================================================= */

.about-feature-icon {

    flex-shrink: 0;

    width: 42px;
    height: 42px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 13px;

    background:
        linear-gradient(
            135deg,
            rgba(77,158,196,0.20),
            rgba(116,102,176,0.18),
            rgba(221,171,75,0.14)
        );

    border:
        1px solid rgba(84,117,156,0.12);

    color: #5c79a0;

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease,
        background 0.4s ease;
}


.about-feature-card:hover
.about-feature-icon {

    transform:
        rotate(-8deg)
        scale(1.1);

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(77,158,196,0.30),
            rgba(116,102,176,0.26),
            rgba(221,171,75,0.20)
        );
}


/* =========================================================
   FEATURE TEXT
========================================================= */

.about-feature-text h6 {

    margin:
        1px 0 5px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 12px;

    font-weight: 700;

    color: #2e3c53;
}


.about-feature-text p {

    margin: 0;

    font-size: 11px;

    line-height: 1.65;

    color: #758195;
}


/* =========================================================
   ACTION BUTTONS
========================================================= */

.about-us-actions {

    display: flex;

    align-items: center;

    flex-wrap: wrap;

    gap: 12px;

    margin-top: 27px;
}


.about-action-btn {

    display: inline-flex;

    align-items: center;

    justify-content: center;

    gap: 10px;

    min-height: 47px;

    padding: 12px 20px;

    border-radius: 50px;

    text-decoration: none;

    font-size: 12px;

    font-weight: 600;

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        background 0.35s ease;
}


/* Primary */

.about-btn-primary {

    color: #ffffff;

    background:
        linear-gradient(
            100deg,
            #4e91af,
            #6d6baa,
            #9270aa
        );

    box-shadow:
        0 11px 28px rgba(74,111,148,0.20);
}


.about-btn-primary:hover {

    color: #ffffff;

    transform:
        translateY(-4px);

    box-shadow:
        0 17px 36px rgba(74,111,148,0.29);
}


.about-btn-primary i {

    transition:
        transform 0.35s ease;
}


.about-btn-primary:hover i {

    transform:
        translateX(4px);
}


/* Secondary */

.about-btn-secondary {

    color: #66738b;

    background:
        rgba(255,255,255,0.70);

    border:
        1px solid rgba(91,112,148,0.15);

    box-shadow:
        0 7px 22px rgba(50,65,90,0.06);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}


.about-btn-secondary:hover {

    color: #626b9d;

    transform:
        translateY(-4px);

    background:
        rgba(246,240,255,0.85);

    box-shadow:
        0 13px 30px rgba(50,65,90,0.10);
}


.about-btn-secondary i {

    color: #bd7c91;

    transition:
        transform 0.35s ease;
}


.about-btn-secondary:hover i {

    transform:
        scale(1.2);
}


/* =========================================================
   VISUAL AREA
========================================================= */

.about-visual {

    position: relative;

    width: 100%;

    height: 500px;

    z-index: 1;
}


/* =========================================================
   DECORATIVE BLOBS
========================================================= */

.about-blob {

    position: absolute;

    border-radius: 50%;

    pointer-events: none;

    filter: blur(1px);

    transition:
        transform 0.8s cubic-bezier(.2,.8,.2,1),
        opacity 0.6s ease;
}


/* Blue */

.about-blob-one {

    width: 230px;
    height: 230px;

    top: 15px;
    right: 10px;

    background:
        radial-gradient(
            circle,
            rgba(72,158,198,0.16),
            rgba(72,158,198,0.02) 70%,
            transparent
        );
}


/* Purple */

.about-blob-two {

    width: 190px;
    height: 190px;

    bottom: 30px;
    left: 20px;

    background:
        radial-gradient(
            circle,
            rgba(119,100,178,0.14),
            rgba(119,100,178,0.02) 70%,
            transparent
        );
}


/* Gold */

.about-blob-three {

    width: 140px;
    height: 140px;

    top: 160px;
    left: 50px;

    background:
        radial-gradient(
            circle,
            rgba(222,174,73,0.13),
            rgba(222,174,73,0.01) 70%,
            transparent
        );
}


/* Hover animation */

.about-visual:hover
.about-blob-one {

    transform:
        translate(15px,-12px)
        scale(1.08);
}


.about-visual:hover
.about-blob-two {

    transform:
        translate(-12px,13px)
        scale(1.10);
}


.about-visual:hover
.about-blob-three {

    transform:
        translate(8px,-10px)
        scale(1.15);
}


/* =========================================================
   MAIN IMAGE
========================================================= */

.about-main-image {

    position: absolute;

    top: 0;
    right: 0;

    width: calc(100% - 85px);

    height: 410px;

    overflow: hidden;

    border-radius: 20px;

    border:
        8px solid rgba(255,255,255,0.80);

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.9),
            rgba(235,246,255,0.7)
        );

    box-shadow:
        0 25px 60px rgba(40,53,77,0.15),
        0 8px 25px rgba(70,100,135,0.08),
        0 0 0 1px rgba(90,112,148,0.08);

    backdrop-filter:
        blur(12px);

    transition:
        transform 0.65s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.65s ease,
        border-radius 0.65s ease;
}


.about-main-image img {

    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    transition:
        transform 1s cubic-bezier(.2,.8,.2,1),
        filter 0.7s ease;
}


.about-visual:hover
.about-main-image {

    transform:
        translateY(-6px);

    border-radius: 25px;

    box-shadow:
        0 35px 80px rgba(40,53,77,0.20),
        0 10px 30px rgba(70,100,135,0.12),
        0 0 0 1px rgba(90,112,148,0.12);
}


.about-visual:hover
.about-main-image img {

    transform:
        scale(1.055);

    filter:
        saturate(1.06);
}


/* =========================================================
   IMAGE GLOW
========================================================= */

.about-image-glow {

    position: absolute;

    inset: 0;

    pointer-events: none;

    background:
        linear-gradient(
            135deg,
            rgba(78,151,187,0.07),
            transparent 45%,
            rgba(214,168,76,0.08)
        );

    opacity: 0;

    transition:
        opacity 0.6s ease;
}


.about-visual:hover
.about-image-glow {

    opacity: 1;
}


/* =========================================================
   SMALL CIRCULAR IMAGE
========================================================= */

.about-small-image {

    position: absolute;

    left: 0;
    bottom: 5px;

    width: 205px;
    height: 205px;

    padding: 8px;

    overflow: hidden;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.95),
            rgba(237,247,255,0.88),
            rgba(244,238,255,0.88),
            rgba(255,248,226,0.90)
        );

    border:
        1px solid rgba(255,255,255,0.95);

    box-shadow:
        0 22px 55px rgba(40,53,77,0.18),
        0 5px 20px rgba(74,97,130,0.09);

    z-index: 5;

    transition:
        transform 0.65s cubic-bezier(.2,.8,.2,1),
        box-shadow 0.65s ease;
}


.about-small-image img {

    width: 100%;
    height: 100%;

    display: block;

    object-fit: cover;

    border-radius: 50%;

    border:
        3px solid rgba(255,255,255,0.90);

    transition:
        transform 0.8s cubic-bezier(.2,.8,.2,1);
}


.about-visual:hover
.about-small-image {

    transform:
        translateY(-10px)
        rotate(-4deg)
        scale(1.04);

    box-shadow:
        0 30px 65px rgba(40,53,77,0.23);
}


.about-visual:hover
.about-small-image img {

    transform:
        scale(1.08);
}


/* =========================================================
   FLOATING ICON
========================================================= */

.about-floating-icon {

    position: absolute;

    right: 15px;
    bottom: 30px;

    width: 57px;
    height: 57px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            #5a99b7,
            #7569aa,
            #b78b4e
        );

    border:
        3px solid rgba(255,255,255,0.75);

    color: #ffffff;

    box-shadow:
        0 14px 35px rgba(59,79,111,0.20);

    z-index: 7;

    transition:
        transform 0.5s ease,
        border-radius 0.5s ease;
}


.about-visual:hover
.about-floating-icon {

    transform:
        translateY(-8px)
        rotate(7deg);

    border-radius: 50%;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .about-us-section {

        padding:
            75px 0 90px;
    }

    .about-us-content {

        margin-bottom: 20px;
    }

    .about-visual {

        height: 490px;
    }

    .about-main-image {

        width: calc(100% - 65px);

        height: 400px;
    }

}


@media (max-width: 767px) {

    .about-us-section {

        padding:
            65px 0 75px;
    }

    .about-features {

        grid-template-columns: 1fr;
    }

    .about-us-title {

        font-size: 34px;
    }

    .about-visual {

        height: 450px;
    }

    .about-main-image {

        width: calc(100% - 50px);

        height: 365px;
    }

    .about-small-image {

        width: 180px;
        height: 180px;
    }

}


@media (max-width: 575px) {

    .about-us-section {

        padding:
            55px 0 65px;
    }

    .about-us-title {

        font-size: 30px;
    }

    .about-us-description {

        font-size: 13px;
    }

    .about-visual {

        height: 390px;
    }

    .about-main-image {

        width: calc(100% - 35px);

        height: 320px;

        border-width: 6px;

        border-radius: 16px;
    }

    .about-small-image {

        width: 150px;
        height: 150px;

        padding: 6px;
    }

    .about-floating-icon {

        width: 48px;
        height: 48px;

        right: 5px;
        bottom: 25px;
    }

    .about-us-actions {

        width: 100%;
    }

    .about-action-btn {

        flex: 1;

        min-width: 135px;
    }

}

/* =========================================================
   ASSOCIATION VIDEO SECTION
========================================================= */

.association-video-section {
    position: relative;
}


/* =========================================================
   VIDEO CAPTION
========================================================= */

.association-video-caption {

    position: relative;

    z-index: 3;

    max-width: 850px;

    margin: 0 auto;

    padding:
        0 25px;

    text-align: center;
}


.association-video-caption h1 {

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size:
        clamp(30px, 4vw, 48px);

    font-weight: 700;

    line-height: 1.2;
}


.association-video-caption h1 span {

    display: block;

    background:
        linear-gradient(
            90deg,
            #ffffff,
            #e8ddff,
            #ffe7b0
        );

    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;

    background-clip: text;
}


.association-video-caption h3 {

    font-size: 16px;

    font-weight: 400;

    opacity: 0.9;

}


/* =========================================================
   VIDEO BADGE
========================================================= */

.association-video-badge {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding:
        8px 15px;

    margin-bottom: 15px;

    border-radius: 50px;

    border:
        1px solid rgba(255,255,255,0.30);

    background:
        rgba(255,255,255,0.10);

    backdrop-filter:
        blur(12px);

    -webkit-backdrop-filter:
        blur(12px);

    color: #ffffff;

    font-size: 11px;

    letter-spacing: 1.5px;

    text-transform: uppercase;

    box-shadow:
        0 8px 25px rgba(0,0,0,0.08);
}


.association-video-badge i {

    font-size: 10px;

    width: 22px;
    height: 22px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background:
        rgba(255,255,255,0.20);
}


/* =========================================================
   CARD WRAPPER
========================================================= */

.association-card-wrapper {

    margin-top: -6rem;

    z-index: 10;
}


/* =========================================================
   MAIN GLASS CARD
========================================================= */

.association-glass-card {

    position: relative;

    overflow: hidden;

    padding: 42px;

    border-radius: 30px;

    border:
        1px solid rgba(255,255,255,0.85);

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.88),
            rgba(238,247,255,0.78),
            rgba(246,240,255,0.80),
            rgba(255,249,231,0.76)
        );

    backdrop-filter:
        blur(25px);

    -webkit-backdrop-filter:
        blur(25px);

    box-shadow:
        0 30px 80px rgba(39,53,76,0.15),
        0 10px 30px rgba(67,92,122,0.08),
        inset 0 1px 0 rgba(255,255,255,0.95);

    transition:
        transform 0.5s ease,
        box-shadow 0.5s ease,
        border-radius 0.5s ease;
}


.association-glass-card:hover {

    transform:
        translateY(-5px);

    border-radius: 34px;

    box-shadow:
        0 40px 95px rgba(39,53,76,0.20),
        0 12px 35px rgba(67,92,122,0.10),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* =========================================================
   DECORATIVE ORBS
========================================================= */

.association-card-orb {

    position: absolute;

    border-radius: 50%;

    pointer-events: none;

    transition:
        transform 0.8s ease;
}


.association-orb-one {

    width: 180px;
    height: 180px;

    right: -80px;
    top: -80px;

    background:
        radial-gradient(
            circle,
            rgba(81,157,198,0.17),
            transparent 70%
        );
}


.association-orb-two {

    width: 160px;
    height: 160px;

    left: -80px;
    bottom: -80px;

    background:
        radial-gradient(
            circle,
            rgba(124,104,179,0.14),
            transparent 70%
        );
}


.association-orb-three {

    width: 100px;
    height: 100px;

    right: 30%;
    bottom: -60px;

    background:
        radial-gradient(
            circle,
            rgba(220,171,72,0.14),
            transparent 70%
        );
}


.association-glass-card:hover
.association-orb-one {

    transform:
        translate(-20px,20px)
        scale(1.15);
}


.association-glass-card:hover
.association-orb-two {

    transform:
        translate(20px,-20px)
        scale(1.15);
}


/* =========================================================
   CARD HEADER
========================================================= */

.association-card-header {

    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    gap: 18px;

    margin-bottom: 30px;
}


.association-card-icon {

    flex-shrink: 0;

    width: 60px;
    height: 60px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 19px;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #5c9ab7,
            #7569aa,
            #bc8d4d
        );

    box-shadow:
        0 12px 30px rgba(76,103,137,0.18);

    transition:
        transform 0.5s ease,
        border-radius 0.5s ease;
}


.association-glass-card:hover
.association-card-icon {

    transform:
        rotate(-7deg)
        scale(1.06);

    border-radius: 50%;
}


.association-card-label {

    display: block;

    margin-bottom: 4px;

    font-size: 10px;

    font-weight: 700;

    letter-spacing: 2px;

    text-transform: uppercase;

    color: #71809a;
}


.association-card-header h2 {

    margin: 0;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 25px;

    font-weight: 700;

    color: #27364d;
}


/* =========================================================
   INFO BOXES
========================================================= */

.association-info-box {

    position: relative;

    height: 100%;

    display: flex;

    gap: 15px;

    padding: 21px;

    border-radius: 21px;

    border:
        1px solid rgba(88,112,148,0.10);

    background:
        rgba(255,255,255,0.48);

    backdrop-filter:
        blur(15px);

    -webkit-backdrop-filter:
        blur(15px);

    box-shadow:
        0 8px 25px rgba(50,65,90,0.045);

    transition:
        transform 0.4s ease,
        box-shadow 0.4s ease,
        border-radius 0.4s ease;
}


.association-info-box:hover {

    transform:
        translateY(-5px);

    border-radius: 25px;

    box-shadow:
        0 17px 35px rgba(50,65,90,0.09);
}


/* =========================================================
   INFO ICONS
========================================================= */

.association-info-icon {

    flex-shrink: 0;

    width: 44px;
    height: 44px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 14px;

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease;
}


.video-icon {

    color: #568ead;

    background:
        rgba(83,157,194,0.13);
}


.feedback-icon {

    color: #8a719e;

    background:
        rgba(139,112,167,0.13);
}


.association-info-box:hover
.association-info-icon {

    transform:
        rotate(-7deg)
        scale(1.08);

    border-radius: 50%;
}


.association-info-box h5 {

    margin:
        0 0 7px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 14px;

    font-weight: 700;

    color: #2d3b52;
}


.association-info-box p {

    margin: 0;

    font-size: 11px;

    line-height: 1.75;

    color: #748095;
}


/* =========================================================
   INFO LINK
========================================================= */

.association-info-link {

    display: flex;

    align-items: center;

    gap: 7px;

    margin-top: 10px;

    font-size: 10px;

    font-weight: 600;

    color: #6b7890;
}


.association-info-link i {

    color: #5b92af;

    animation:
        associationArrow 1.8s infinite ease-in-out;
}


@keyframes associationArrow {

    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-4px);
    }

}


/* =========================================================
   MEMBERSHIP AREA
========================================================= */

.association-membership {

    position: relative;

    z-index: 2;

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 25px;

    margin-top: 25px;

    padding:
        20px 22px;

    border-radius: 21px;

    border:
        1px solid rgba(88,112,148,0.10);

    background:
        linear-gradient(
            110deg,
            rgba(233,245,252,0.72),
            rgba(244,239,255,0.68),
            rgba(255,248,228,0.62)
        );

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,0.8);

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease;
}


.association-membership:hover {

    transform:
        translateY(-4px);

    border-radius: 25px;
}


/* =========================================================
   MEMBERSHIP CONTENT
========================================================= */

.membership-content {

    display: flex;

    align-items: center;

    gap: 15px;
}


.membership-icon {

    flex-shrink: 0;

    width: 48px;
    height: 48px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 15px;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #5c9ab7,
            #7469a6
        );

    box-shadow:
        0 9px 22px rgba(77,102,135,0.16);

    transition:
        transform 0.4s ease,
        border-radius 0.4s ease;
}


.association-membership:hover
.membership-icon {

    transform:
        scale(1.08);

    border-radius: 50%;
}


.membership-content span {

    display: block;

    margin-bottom: 3px;

    font-size: 9px;

    font-weight: 700;

    letter-spacing: 1.5px;

    text-transform: uppercase;

    color: #71809a;
}


.membership-content h4 {

    margin:
        0 0 3px;

    font-family:
        "Poppins",
        "Segoe UI",
        sans-serif;

    font-size: 14px;

    font-weight: 700;

    color: #2d3b52;
}


.membership-content p {

    margin: 0;

    font-size: 10px;

    line-height: 1.6;

    color: #778297;
}


/* =========================================================
   MEMBERSHIP BUTTON
========================================================= */

.membership-btn {

    flex-shrink: 0;

    display: inline-flex;

    align-items: center;

    gap: 10px;

    padding:
        12px 18px;

    border-radius: 50px;

    color: #ffffff;

    text-decoration: none;

    font-size: 11px;

    font-weight: 600;

    background:
        linear-gradient(
            100deg,
            #5794b0,
            #716aa5,
            #a17b9e
        );

    box-shadow:
        0 10px 25px rgba(76,101,136,0.18);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}


.membership-btn:hover {

    color: #ffffff;

    transform:
        translateY(-3px);

    box-shadow:
        0 15px 32px rgba(76,101,136,0.25);
}


.membership-btn i {

    transition:
        transform 0.35s ease;
}


.membership-btn:hover i {

    transform:
        translateX(4px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .association-card-wrapper {

        margin-top: -4rem;
    }

    .association-glass-card {

        padding: 30px;
    }

    .association-membership {

        align-items: flex-start;

        flex-direction: column;
    }

    .membership-btn {

        width: 100%;

        justify-content: center;
    }

}


@media (max-width: 767px) {

    .association-card-wrapper {

        margin-top: -3rem;
    }

    .association-glass-card {

        padding: 24px;

        border-radius: 24px;
    }

    .association-card-header {

        align-items: flex-start;
    }

    .association-card-header h2 {

        font-size: 21px;
    }

    .association-video-caption h1 {

        font-size: 30px;
    }

    .association-video-caption h3 {

        font-size: 14px;
    }

}


@media (max-width: 575px) {

    .association-glass-card {

        padding: 18px;

        border-radius: 20px;
    }

    .association-card-header {

        gap: 12px;
    }

    .association-card-icon {

        width: 48px;
        height: 48px;

        border-radius: 15px;
    }

    .association-card-header h2 {

        font-size: 18px;
    }

    .association-info-box {

        padding: 16px;
    }

    .membership-content {

        align-items: flex-start;
    }

    .association-video-caption h1 {

        font-size: 25px;
    }

}
/* =========================================================
   YouTube Subscribe Button
   ========================================================= */

.btn-youtube-subscribe {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 420px;
    max-width: 90%;
    min-height: 68px;

    padding: 16px 30px !important;

    color: #fff !important;
    text-decoration: none !important;

    font-size: 15px;
    font-weight: 700;
    letter-spacing: .3px;

    border: 1px solid rgba(255,255,255,.55);
    border-radius: 22px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 120, 120, .95),
            rgba(255, 65, 65, .9),
            rgba(95, 70, 180, .9)
        );

    box-shadow:
        0 15px 35px rgba(100, 70, 150, .20),
        inset 0 1px 0 rgba(255,255,255,.45);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    overflow: hidden;

    transition:
        transform .45s ease,
        box-shadow .45s ease,
        border-radius .45s ease;
}

/* Glass shine */
.btn-youtube-subscribe::before {
    content: "";
    position: absolute;
    top: 0;
    left: -120%;

    width: 80%;
    height: 100%;

    background: linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.35),
        transparent
    );

    transform: skewX(-20deg);
    transition: left .7s ease;
}

/* Hover */
.btn-youtube-subscribe:hover {
    transform: translateY(-7px) scale(1.025);

    border-radius: 28px;

    box-shadow:
        0 22px 45px rgba(90, 65, 160, .28),
        0 0 30px rgba(255, 100, 100, .16),
        inset 0 1px 0 rgba(255,255,255,.65);
}

.btn-youtube-subscribe:hover::before {
    left: 140%;
}

/* YouTube icon */
.btn-youtube-subscribe .fa-youtube {
    font-size: 25px;
    transition: transform .4s ease;
}

.btn-youtube-subscribe:hover .fa-youtube {
    transform: scale(1.18) rotate(-5deg);
}

/* Arrow */
.btn-youtube-subscribe .fa-arrow-right {
    transition: transform .4s ease;
}

.btn-youtube-subscribe:hover .fa-arrow-right {
    transform: translateX(6px);
}


/* Responsive */
@media (max-width: 576px) {

    .btn-youtube-subscribe {
        min-width: 0;
        width: 100%;
        max-width: 100%;
        font-size: 13px;
        padding: 15px 18px !important;
    }

}
/* =========================================================
   TESTIMONIAL — GLASSMORPHISM DESIGN
   ========================================================= */

.testimonial-carousel {
    padding: 30px 10px 45px;
}

/* Each testimonial */
.testimonial-carousel .testimonial-item {
    position: relative;
    padding: 10px 12px 25px;
    transition: transform .45s ease;
}

/* The main glass text card */
.testimonial-carousel .testimonial-text {
    position: relative;

    min-height: 145px;
    padding: 30px 28px !important;

    border-radius: 26px !important;

    /* Soft multi-color glass gradient */
    background:
        radial-gradient(
            circle at 15% 20%,
            rgba(255, 214, 110, .25),
            transparent 32%
        ),
        radial-gradient(
            circle at 85% 25%,
            rgba(170, 130, 255, .20),
            transparent 34%
        ),
        radial-gradient(
            circle at 50% 100%,
            rgba(95, 190, 255, .20),
            transparent 38%
        ),
        linear-gradient(
            135deg,
            rgba(255, 255, 255, .82),
            rgba(248, 244, 255, .68)
        ) !important;

    border: 1px solid rgba(255, 255, 255, .78);

    box-shadow:
        0 15px 40px rgba(55, 75, 130, .10),
        inset 0 1px 0 rgba(255, 255, 255, .90);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    overflow: hidden;

    transition:
        transform .45s ease,
        box-shadow .45s ease,
        border-radius .45s ease,
        background .45s ease;
}

/* Decorative blurred circles */
.testimonial-carousel .testimonial-text::before {
    content: "";
    position: absolute;

    width: 95px;
    height: 95px;

    top: -45px;
    right: -25px;

    border-radius: 50%;

    background: rgba(255, 190, 70, .20);

    filter: blur(4px);

    transition:
        transform .6s ease,
        background .6s ease;
}

.testimonial-carousel .testimonial-text::after {
    content: "";
    position: absolute;

    width: 75px;
    height: 75px;

    bottom: -30px;
    left: -15px;

    border-radius: 50%;

    background: rgba(125, 175, 255, .18);

    filter: blur(5px);

    transition:
        transform .6s ease,
        background .6s ease;
}


/* Text */
.testimonial-carousel .testimonial-text p {
    position: relative;
    z-index: 2;

    color: #526079;
    font-size: 15px;
    line-height: 1.9;

    transition: color .4s ease;
}


/* =========================================================
   ACTIVE SLIDE
   ========================================================= */

.testimonial-carousel .owl-item.active.center .testimonial-text {

    transform: translateY(-7px);

    background:
        radial-gradient(
            circle at 12% 18%,
            rgba(255, 205, 90, .30),
            transparent 34%
        ),
        radial-gradient(
            circle at 88% 20%,
            rgba(177, 130, 245, .24),
            transparent 35%
        ),
        radial-gradient(
            circle at 55% 105%,
            rgba(90, 190, 245, .24),
            transparent 40%
        ),
        linear-gradient(
            135deg,
            rgba(255, 255, 255, .90),
            rgba(247, 242, 255, .76)
        ) !important;

    border-color: rgba(170, 145, 220, .32);

    box-shadow:
        0 25px 55px rgba(80, 75, 140, .16),
        0 5px 18px rgba(255, 190, 80, .08),
        inset 0 1px 0 rgba(255, 255, 255, 1);

    border-radius: 30px !important;
}

.testimonial-carousel .owl-item.active.center .testimonial-text p {
    color: #47556f;
}


/* Active decorative circles */
.testimonial-carousel .owl-item.active.center
.testimonial-text::before {
    transform: scale(1.35) translate(-5px, 5px);
    background: rgba(255, 190, 70, .28);
}

.testimonial-carousel .owl-item.active.center
.testimonial-text::after {
    transform: scale(1.4) translate(8px, -5px);
    background: rgba(105, 175, 245, .25);
}


/* =========================================================
   PHOTO
   ========================================================= */

.testimonial-carousel .testimonial-item img {
    position: relative;
    z-index: 5;

    border: 3px solid rgba(255, 255, 255, .85) !important;

    box-shadow:
        0 10px 25px rgba(50, 65, 110, .12);

    transition:
        transform .45s ease,
        box-shadow .45s ease;
}

.testimonial-carousel .owl-item.active.center
.testimonial-item img {
    transform: scale(1.08);

    box-shadow:
        0 15px 35px rgba(70, 70, 130, .18);
}


/* =========================================================
   STARS
   ========================================================= */

.testimonial-carousel .testimonial-item .fa-star {
    color: #e8b84f !important;

    transition:
        transform .3s ease,
        color .3s ease;
}

.testimonial-carousel .owl-item.active.center
.testimonial-item .fa-star {
    transform: scale(1.08);
}


/* =========================================================
   NAME + PROFESSION
   ========================================================= */

.testimonial-carousel .testimonial-item h5 {
    color: #34415d;
    font-weight: 700;

    transition: color .35s ease;
}

.testimonial-carousel .testimonial-item > p {
    color: #8791a5;
}


/* =========================================================
   HOVER
   ========================================================= */

.testimonial-carousel .testimonial-item:hover .testimonial-text {
    transform: translateY(-9px);

    box-shadow:
        0 25px 50px rgba(70, 75, 130, .16),
        inset 0 1px 0 rgba(255, 255, 255, 1);

    border-radius: 32px !important;
}

.testimonial-carousel .testimonial-item:hover img {
    transform: scale(1.07);
}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 767px) {

    .testimonial-carousel {
        padding-left: 0;
        padding-right: 0;
    }

    .testimonial-carousel .testimonial-text {
        padding: 25px 20px !important;
    }

    .testimonial-carousel .testimonial-text p {
        font-size: 14px;
        line-height: 1.8;
    }
}
/* Active testimonial text color */
.testimonial-carousel .owl-item.active.center .testimonial-text p {
    color: #243b64 !important;
}

/* Active testimonial name */
.testimonial-carousel .owl-item.active.center .testimonial-item h5 {
    color: #243b64 !important;
}

/* Active testimonial profession */
.testimonial-carousel .owl-item.active.center .testimonial-item > p {
    color: #52627d !important;
}
/* =========================================================
   COMMENT SECTION
   ========================================================= */

.comment-intro {
    position: relative;
    padding: 25px 15px;
}

.comment-badge {
    display: inline-flex;
    align-items: center;

    padding: 9px 17px;

    border-radius: 50px;

    background: linear-gradient(
        135deg,
        rgba(255, 198, 92, .15),
        rgba(157, 124, 224, .13),
        rgba(91, 181, 238, .13)
    );

    border: 1px solid rgba(160, 140, 200, .18);

    color: #52627d;

    font-size: 13px;
    font-weight: 600;
}

.comment-title {
    color: #243b64;
    font-weight: 700;
    line-height: 1.25;
}

.comment-description {
    color: #66738a;
    line-height: 1.9;
    font-size: 15px;
}


/* Information box */

.comment-info-box {
    display: flex;
    align-items: center;

    gap: 15px;

    margin-top: 25px;
    padding: 17px 20px;

    border-radius: 20px;

    background:
        linear-gradient(
            135deg,
            rgba(255, 211, 105, .13),
            rgba(176, 137, 235, .10),
            rgba(100, 190, 240, .10)
        );

    border: 1px solid rgba(150, 140, 190, .16);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    box-shadow:
        0 12px 30px rgba(60, 70, 110, .07);

    transition: .4s ease;
}

.comment-info-box:hover {
    transform: translateY(-4px);

    box-shadow:
        0 18px 35px rgba(60, 70, 110, .12);
}

.comment-info-icon {
    width: 48px;
    height: 48px;

    min-width: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background: linear-gradient(
        135deg,
        rgba(255, 193, 72, .75),
        rgba(229, 153, 73, .65)
    );

    color: white;

    box-shadow:
        0 8px 20px rgba(220, 160, 70, .18);
}

.comment-info-box h6 {
    color: #344563;
    font-weight: 700;
}

.comment-info-box p {
    color: #7b8699;
    font-size: 13px;
}


/* =========================================================
   GLASS FORM CARD
   ========================================================= */

.comment-glass-card {
    position: relative;

    padding: 35px;

    border-radius: 30px;

    overflow: hidden;

    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(255, 204, 93, .18),
            transparent 30%
        ),
        radial-gradient(
            circle at 90% 15%,
            rgba(168, 126, 235, .17),
            transparent 32%
        ),
        radial-gradient(
            circle at 70% 100%,
            rgba(91, 188, 239, .17),
            transparent 35%
        ),
        rgba(255, 255, 255, .72);

    border: 1px solid rgba(255, 255, 255, .8);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);

    box-shadow:
        0 25px 60px rgba(55, 70, 115, .12),
        inset 0 1px 0 rgba(255,255,255,.95);

    transition: .45s ease;
}

.comment-glass-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 30px 70px rgba(55, 70, 115, .16),
        inset 0 1px 0 rgba(255,255,255,1);
}


/* Decorative circles */

.comment-glass-card::before {
    content: "";

    position: absolute;

    width: 130px;
    height: 130px;

    top: -65px;
    right: -40px;

    border-radius: 50%;

    background: rgba(255, 194, 75, .13);

    filter: blur(3px);

    pointer-events: none;
}

.comment-glass-card::after {
    content: "";

    position: absolute;

    width: 100px;
    height: 100px;

    bottom: -50px;
    left: -35px;

    border-radius: 50%;

    background: rgba(135, 120, 230, .11);

    filter: blur(4px);

    pointer-events: none;
}


/* =========================================================
   HEADER
   ========================================================= */

.comment-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-bottom: 28px;
}

.comment-small-title {
    color: #8b94a7;

    font-size: 12px;
    font-weight: 600;

    text-transform: uppercase;
    letter-spacing: 1.5px;
}

.comment-card-header h3 {
    color: #243b64;
    font-weight: 700;
}

.comment-header-icon {
    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 17px;

    background: linear-gradient(
        135deg,
        rgba(255, 201, 83, .75),
        rgba(145, 118, 222, .65)
    );

    color: white;

    font-size: 20px;

    box-shadow:
        0 10px 25px rgba(110, 100, 160, .15);
}


/* =========================================================
   INPUTS
   ========================================================= */

.comment-label {
    display: block;

    margin-bottom: 8px;

    color: #53617a;

    font-size: 13px;
    font-weight: 600;
}

.comment-input-wrapper {
    position: relative;
}

.comment-input-wrapper > i {
    position: absolute;

    left: 17px;
    top: 50%;

    transform: translateY(-50%);

    color: #8b96aa;

    z-index: 2;

    transition: .3s ease;
}
.comment-input {
    width: 100%;

    height: 55px;

    padding: 0 18px 0 45px;

    border-radius: 15px;

    background: rgba(248, 252, 255, .88);

    /* Visible but elegant border */
    border: 1px solid rgba(100, 140, 180, .30);

    color: #35445f;

    outline: none;

    box-shadow:
        inset 0 1px 2px rgba(70, 110, 150, .03);

    transition:
        border-color .3s ease,
        box-shadow .3s ease,
        background .3s ease;
}

.comment-input:hover {
    border-color: rgba(90, 145, 195, .45);
}

.comment-input:focus {
    background: rgba(255,255,255,.96);

    border-color: rgba(86, 151, 205, .55);

    box-shadow:
        0 0 0 4px rgba(86, 151, 205, .08),
        0 5px 18px rgba(80, 130, 180, .06);
}

.comment-input::placeholder {
    color: #a0a9b8;
}


.comment-input-wrapper:focus-within > i {
    color: #647eb0;
}

/* =========================================================
   RATING — PROGRESSIVE STAR SELECTOR
   ========================================================= */

.rating-selector {
    display: flex;
    align-items: center;
    gap: 3px;

    min-height: 58px;
    padding: 8px 14px;

    border-radius: 15px;

    /* More visible border */
    background: rgba(245, 250, 255, .82);

    border: 1px solid rgba(105, 145, 190, .28);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.9),
        0 5px 15px rgba(80, 130, 180, .05);

    transition: .3s ease;
}

.rating-selector:hover {
    border-color: rgba(90, 145, 200, .42);

    box-shadow:
        0 8px 20px rgba(80, 130, 180, .08);
}

.rating-selector label {
    cursor: pointer;

    position: relative;

    display: inline-flex;
}

.rating-selector input {
    display: none;
}

.rating-selector span {
    display: inline-block;

    color: #c7d0dc;

    font-size: 27px;
    line-height: 1;

    transition:
        color .25s ease,
        transform .25s ease,
        filter .25s ease;
}


/* Hover: show rating direction */

.rating-selector label:hover span {
    color: #f0c75e;

    transform: scale(1.12);
}


/* =========================================================
   IMPORTANT:
   When a star is selected, all stars before it become gold.
   ========================================================= */

.rating-selector label:has(input:checked) span,
.rating-selector label:has(input:checked) ~ label span {
    color: #c7d0dc;
}


/* Selected star itself */
.rating-selector label:has(input:checked) span {
    color: #e8b84f;

    filter:
        drop-shadow(0 3px 5px rgba(220, 175, 70, .18));
}


/* =========================================================
   Since HTML is ordered 1 → 5,
   use :has() + previous labels through a small JS class.
   ========================================================= */

.rating-selector.has-rating .star-active {
    color: #e8b84f !important;

    filter:
        drop-shadow(0 3px 5px rgba(220, 175, 70, .18));
}

.rating-selector.has-rating .star-active:hover {
    transform: scale(1.12);
}


/* Rating helper text */

.rating-selector small {
    margin-left: 12px;

    color: #71839a;

    font-size: 11px;
    font-weight: 500;

    white-space: nowrap;
}
/* =========================================================
   TEXTAREA
   ========================================================= */

.comment-textarea-wrapper {
    position: relative;
}

.comment-textarea-wrapper > i {
    top: 20px;

    transform: none;
}

.comment-textarea {
    height: 125px;

    padding-top: 16px;

    resize: vertical;
}


/* =========================================================
   SUBMIT
   ========================================================= */

.comment-submit-btn {
    width: 100%;

    border: none;

    min-height: 55px;

    border-radius: 16px;

    background:
        linear-gradient(
            135deg,
            #e6ad48,
            #d89a59 45%,
            #8275c5
        );

    color: white;

    font-weight: 600;

    letter-spacing: .2px;

    box-shadow:
        0 12px 28px rgba(125, 105, 165, .17);

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}

.comment-submit-btn:hover {
    transform: translateY(-3px);

    box-shadow:
        0 18px 35px rgba(125, 105, 165, .25);
}

.comment-submit-btn i {
    transition: transform .35s ease;
}

.comment-submit-btn:hover i {
    transform: translateX(4px) rotate(-8deg);
}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 767px) {

    .comment-glass-card {
        padding: 25px 20px;
        border-radius: 24px;
    }

    .comment-title {
        font-size: 30px;
    }

    .comment-card-header h3 {
        font-size: 23px;
    }

    .rating-selector small {
        display: none;
    }
}
/* =========================================================
   GLASS ACTION BUTTONS
   ========================================================= */

.glass-action-btn {
    position: relative;
    overflow: hidden;

    border: 1px solid rgba(255, 255, 255, 0.45) !important;
    border-radius: 30px !important;

    color: #ffffff !important;

    background:
        linear-gradient(
            135deg,
            rgba(91, 155, 213, 0.72),
            rgba(67, 180, 180, 0.55),
            rgba(139, 92, 246, 0.45)
        ) !important;

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    box-shadow:
        0 8px 30px rgba(40, 90, 130, 0.18),
        inset 0 1px 0 rgba(255, 255, 255, 0.35);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease,
        background 0.35s ease;
}


/* Light glass reflection */

.glass-action-btn::before {
    content: "";
    position: absolute;

    width: 80px;
    height: 180px;

    top: -50px;
    left: -100px;

    background: rgba(255, 255, 255, 0.22);

    transform: rotate(25deg);

    filter: blur(12px);

    transition: left 0.6s ease;
}


/* Hover */

.glass-action-btn:hover {
    color: #ffffff !important;

    transform: translateY(-5px);

    box-shadow:
        0 14px 35px rgba(40, 90, 130, 0.25),
        inset 0 1px 0 rgba(255, 255, 255, 0.45);
}

.glass-action-btn:hover::before {
    left: 120%;
}


/* Academy */

.academy-btn {
    background:
        linear-gradient(
            135deg,
            rgba(75, 145, 205, 0.78),
            rgba(80, 180, 190, 0.58),
            rgba(100, 120, 220, 0.48)
        ) !important;
}


/* Donate */

.donate-btn {
    background:
        linear-gradient(
            135deg,
            rgba(76, 145, 205, 0.72),
            rgba(116, 105, 210, 0.52),
            rgba(215, 145, 100, 0.38)
        ) !important;
}


/* Icons */

.glass-action-btn i {
    transition: transform 0.35s ease;
}

.glass-action-btn:hover i {
    transform: scale(1.15) rotate(-5deg);
}
/* =========================================================
   HERO GLASS CARD
   ========================================================= */

.hero-glass-card {
    position: relative;
    overflow: hidden;

    padding: 30px 35px;

    border-radius: 40px;

    border: 1px solid rgba(255, 255, 255, 0.35);

    background:
        linear-gradient(
            135deg,
            rgba(38, 83, 105, 0.58),
            rgba(75, 105, 125, 0.38),
            rgba(93, 76, 125, 0.32)
        );

    backdrop-filter: blur(3px);
    -webkit-backdrop-filter: blur(3px);

    box-shadow:
        0 15px 45px rgba(20, 40, 60, 0.22),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
}


/* Soft glass circles */

.hero-glass-card::before,
.hero-glass-card::after {
    content: "";
    position: absolute;

    border-radius: 50%;

    filter: blur(5px);

    pointer-events: none;
}

.hero-glass-card::before {
    width: 150px;
    height: 150px;

    top: -70px;
    right: -50px;

    background: rgba(120, 190, 220, 0.16);
}

.hero-glass-card::after {
    width: 120px;
    height: 120px;

    bottom: -60px;
    left: -40px;

    background: rgba(150, 120, 210, 0.14);
}


/* Keep content above decorative effects */

.hero-glass-card > * {
    position: relative;
    z-index: 2;
}


/* =========================================================
   HERO BUTTONS
   ========================================================= */

.hero-glass-btn {
    position: relative;
    overflow: hidden;

    color: #ffffff !important;

    border-radius: 30px !important;

    border: 1px solid rgba(255, 255, 255, 0.25) !important;

    backdrop-filter: blur(7px);
    -webkit-backdrop-filter: blur(7px);

    box-shadow:
        0 8px 25px rgba(20, 50, 70, 0.18),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}


.hero-about-btn {
    background:
        linear-gradient(
            135deg,
            rgba(80, 155, 205, 0.32),
            rgba(74, 180, 190, 0.28)
        ) !important;
}


.hero-donate-btn {
    background:
        linear-gradient(
            135deg,
            rgba(90, 120, 205, 0.68),
            rgba(125, 100, 190, 0.48)
        ) !important;
}


.hero-glass-btn:hover {
    color: #ffffff !important;

    transform: translateY(-5px);

    box-shadow:
        0 15px 35px rgba(20, 50, 70, 0.28),
        inset 0 1px 0 rgba(255, 255, 255, 0.45);
}


.hero-glass-btn i {
    transition: transform 0.3s ease;
}


.hero-glass-btn:hover i {
    transform: scale(1.15);
}
/* =========================================================
   LEGAL RESOURCES HERO CARD
   ========================================================= */

.legal-resources-card {
    background:
        linear-gradient(
            135deg,
            rgba(63, 105, 125, 0.55),
            rgba(88, 92, 130, 0.38),
            rgba(112, 95, 145, 0.30)
        );

    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);

    box-shadow:
        0 15px 45px rgba(25, 45, 65, 0.20),
        inset 0 1px 0 rgba(255, 255, 255, 0.25);
}


/* Resources Button */

.resources-btn {
    background:
        linear-gradient(
            135deg,
            rgba(65, 145, 190, 0.72),
            rgba(78, 175, 185, 0.50)
        ) !important;
}


/* Resources Button Hover */

.resources-btn:hover {
    background:
        linear-gradient(
            135deg,
            rgba(75, 160, 205, 0.82),
            rgba(85, 185, 195, 0.60)
        ) !important;
}
 .fact{
            background-image: url("assets/img/index_img/heder.jpg");
            background-size: 100% 100%;
        }
.video{
    background-image: url("assets/img/index_img/index44.jpg");
            background-size: 100% 100%;
}
/* =========================================================
   LEGAL SYSTEM CARDS — MOBILE RESPONSIVE FIX
   ========================================================= */

@media (max-width: 767.98px) {

    .legal-system-card {
        width: 100%;
        height: auto;
        min-height: 0;
    }

    .legal-system-image {
        width: 100%;
        height: 220px !important;
        min-height: 220px !important;
        max-height: 220px !important;
        overflow: hidden;
        position: relative;
    }

    .legal-system-image img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        display: block;
    }

    .legal-system-content {
        height: auto;
        min-height: 0;
    }

}
</style>


<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


  




    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" style="width: 100%; height: 700px;" src="assets/img/index_img//home_122.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start" >
                <div class="col-10 col-lg-8 hero-glass-card">

                    <h5 class="text-white text-uppercase mb-3 mt-3 animated slideInDown">
                        Welcome to the
                    </h5>

                    <h1 class="display-6 text-white animated slideInDown mb-4">
                        The Nationwide Association of Afghan Jurists in Europe
                    </h1>

                    <p class="fs-5 fw-medium text-white mb-4 pb-2">
                        Your trusted gateway to Afghanistan's laws, legal systems,
                        and professional legal services, promoting easy access to
                        reliable legal information and public legal awareness.
                    </p>

                    <div class="d-flex flex-wrap gap-3">

                        <a href="{{ route('about') }}"
                        class="btn hero-glass-btn hero-about-btn py-md-3 px-md-5 animated mb-3 slideInLeft">
                            <i class="fa fa-info-circle me-2"></i>
                            Read More
                        </a>

                        <a href="{{ route('donation') }}"
                        class="btn hero-glass-btn hero-donate-btn py-md-3 px-md-5 animated mb-3 slideInRight">
                            <i class="fa fa-heart me-2"></i>
                            Donate
                        </a>

                    </div>

                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" style="width: 100%; height: 700px;" src="assets/img/index_img//home_11.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                           <div class="col-10 col-lg-8 hero-glass-card legal-resources-card">

                                <h5 class="text-white text-uppercase mb-3 mt-3 animated slideInDown">
                                    Legal Resources
                                </h5>

                                <h1 class="display-5 text-white animated slideInDown mb-4">
                                    News, Documents & Research
                                </h1>

                                <p class="fs-5 fw-medium text-white mb-4 pb-2">
                                    Stay informed with the latest legal news, official documents,
                                    research papers, and trusted academic resources—all in one place.
                                </p>

                                <div class="d-flex flex-wrap gap-3">

                                    <a href="{{ route('news.index') }}"
                                    class="btn hero-glass-btn resources-btn py-md-3 px-md-5 animated mb-3 slideInLeft">
                                        <i class="fa fa-book-open me-2"></i>
                                        Explore Resources
                                    </a>

                                    <a href="{{ route('donation') }}"
                                    class="btn hero-glass-btn hero-donate-btn py-md-3 px-md-5 animated mb-3 slideInRight">
                                        <i class="fa fa-heart me-2"></i>
                                        Donate
                                    </a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" style="width: 100%; height: 700px;" src="assets/img/index_img//acdemy.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8 hero-glass-card" style="background-color:rgba(209, 205, 86, 0.134);border-radius: 40px;border: 1px solid white;">
                                <h5 class="text-white text-uppercase mb-3  mt-3 animated slideInDown"> Legal Academy</h5>
                                <h1 class="display-5 text-white animated slideInDown mb-4">Professional Legal Education</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Advance your legal knowledge and professional skills through specialized courses, workshops,
                                     and educational programs designed for legal professionals.</p>
                              <a href="{{ route('academy.apply') }}"
                                class="btn glass-action-btn academy-btn py-md-3 px-md-5 me-3 animated mb-3 slideInLeft">
                                    <i class="fa fa-graduation-cap me-2"></i>
                                    Join Academy
                                </a>

                                <a href="{{ route('donation') }}"
                                class="btn glass-action-btn donate-btn py-md-3 px-md-5 mb-3 animated slideInRight">
                                    <i class="fa fa-heart me-2"></i>
                                    Donate
                                </a>
                           
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    

  <!-- =========================================================
     ABOUT US
========================================================= -->

<section class="about-us-section">

    <div class="container">

        <div class="row g-5 align-items-center">


            <!-- =================================================
                 TEXT SIDE
            ================================================== -->

            <div class="col-lg-6 wow fadeInUp"
                 data-wow-delay="0.1s">

                <div class="about-us-content">


                    <!-- Eyebrow -->
                    <div class="about-us-eyebrow">

                        <span class="about-eyebrow-line"></span>

                        <span>ABOUT US</span>

                    </div>


                    <!-- Title -->
                    <h1 class="about-us-title">
                        Afghanistan
                        <span>Lawyers Association</span>
                    </h1>


                    <!-- Description -->
                    <p class="about-us-description">

                        The The Nationwide Association of Afghan Jurists in Europe is a dedicated
                        platform for legal knowledge, education, information,
                        and professional development. It brings together
                        legal resources, academic materials, news, and
                        institutional information in one trusted space,
                        helping legal professionals, students, researchers,
                        and members of the public access valuable knowledge
                        more easily.

                    </p>


                    <!-- =================================================
                         FEATURE CARDS
                    ================================================== -->

                    <div class="about-features">


                        <!-- Feature 01 -->
                        <div class="about-feature-card">

                            <div class="about-feature-icon">
                                <i class="fa fa-balance-scale"></i>
                            </div>

                            <div class="about-feature-text">

                                <h6>
                                    Legal Resources
                                </h6>

                                <p>
                                    Laws, legal documents, legal categories,
                                    and information about different legal
                                    systems.
                                </p>

                            </div>

                        </div>


                        <!-- Feature 02 -->
                        <div class="about-feature-card">

                            <div class="about-feature-icon">
                                <i class="fa fa-newspaper"></i>
                            </div>

                            <div class="about-feature-text">

                                <h6>
                                    News & Announcements
                                </h6>

                                <p>
                                    Official announcements, legal news,
                                    activities, and the latest updates
                                    from the Association.
                                </p>

                            </div>

                        </div>


                        <!-- Feature 03 -->
                        <div class="about-feature-card">

                            <div class="about-feature-icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>

                            <div class="about-feature-text">

                                <h6>
                                    Legal Academy
                                </h6>

                                <p>
                                    Educational programs and professional
                                    learning opportunities for students
                                    and legal professionals.
                                </p>

                            </div>

                        </div>


                        <!-- Feature 04 -->
                        <div class="about-feature-card">

                            <div class="about-feature-icon">
                                <i class="fa fa-users"></i>
                            </div>

                            <div class="about-feature-text">

                                <h6>
                                    Legal Community
                                </h6>

                                <p>
                                    Connecting legal professionals,
                                    academics, students, and members of
                                    the wider legal community.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         ACTION BUTTONS
                    ================================================== -->

                    <div class="about-us-actions">

                        <!-- About Page -->
                        <a href="{{ route('about') }}" class="about-action-btn about-btn-primary">

                            <span>Explore About</span>

                            <i class="fa fa-arrow-right"></i>

                        </a>


                        <!-- Donation -->
                        <a href="{{ route('donation') }}"
                        class="about-action-btn about-btn-secondary">

                            <i class="fa fa-heart"></i>

                            <span>Donation</span>

                        </a>

                    </div>


                </div>

            </div>



            <!-- =================================================
                 IMAGE SIDE
            ================================================== -->

            <div class="col-lg-6 pt-4"
                 style="min-height: 520px;">

                <div class="about-visual wow fadeInUp"
                     data-wow-delay="0.5s">


                    <!-- Decorative Background Blobs -->

                    <div class="about-blob about-blob-one"></div>

                    <div class="about-blob about-blob-two"></div>

                    <div class="about-blob about-blob-three"></div>


                    <!-- Main Image -->

                    <div class="about-main-image">

                        <img
                            src="assets/img/index_img/home_122.jpg"
                            alt="The Nationwide Association of Afghan Jurists in Europe"
                        >

                        <div class="about-image-glow"></div>

                    </div>


                    <!-- Small Circular Image -->

                    <div class="about-small-image">

                        <img
                            src="assets/img/index_img/home_1.jpg"
                            alt="The Nationwide Association of Afghan Jurists in Europe"
                        >

                    </div>


                    <!-- Floating Icon -->

                    <div class="about-floating-icon">

                        <i class="fa fa-balance-scale"></i>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>
 <!-- =========================================================
     ASSOCIATION VIDEO & COMMUNITY SECTION
========================================================= -->

<div class="container-fluid my-5 px-0 association-video-section">

    <!-- =========================
         VIDEO AREA
    ========================== -->

    <div class="video wow fadeInUp"
         data-wow-delay="0.1s">

        <!-- KEEP VIDEO BUTTON -->
         <a href="https://youtu.be/pFnzEMJnBrs?si=IiRJw3D2PJHrV5Kr"  target="_blank">

        
        <button type="button"
                class="btn-play"
                
                data-src="#"
                >

            <span></span>

        </button>
         </a>


        <!-- =========================
             VIDEO MODAL
        ========================== -->

        <div class="modal fade"
             id="videoModal"
             tabindex="-1"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content rounded-0">

                    <div class="modal-header">

                        <h5 class="modal-title"
                            id="exampleModalLabel">
                            Association Video
                        </h5>

                        <button type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close">
                        </button>

                    </div>

                    <div class="modal-body">

                        <div class="ratio ratio-16x9">

                            <iframe
                                class="embed-responsive-item"
                                src=""
                                id="video"
                                allowfullscreen
                                allowscriptaccess="always"
                                allow="autoplay">
                            </iframe>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================
             VIDEO TEXT
        ========================== -->

        <div class="association-video-caption">

            <div class="association-video-badge">
                <i class="fa fa-play"></i>
                <span>Association Media</span>
            </div>

            <h1 class="text-white mb-3">
                Discover the Work of the
                <span>The Nationwide Association of Afghan Jurists in Europe</span>
            </h1>

            <h3 class="text-white mb-0">
                Watch our events, activities, and special programs
            </h3>
            <!-- YouTube Subscribe CTA -->
            <div class="mt-4 d-flex justify-content-center">
                <a href="https://www.youtube.com/live/oFJ-tx55_cA?si=0VhWCntmH1ehjAlZ"
                class="btn btn-youtube-subscribe px-5 py-3">
                    <i class="fab fa-youtube me-2"></i>
                    Subscribe to Our YouTube Channel
                    <i class="fa fa-arrow-right ms-3"></i>
                </a>
            </div>

        </div>

    </div>



    <!-- =========================================================
         GLASS COMMUNITY CARD
    ========================================================== -->

    <div class="container position-relative association-card-wrapper wow fadeInUp"
         data-wow-delay="0.1s">

        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-10">

                <div class="association-glass-card">


                    <!-- Decorative elements -->

                    <div class="association-card-orb association-orb-one"></div>
                    <div class="association-card-orb association-orb-two"></div>
                    <div class="association-card-orb association-orb-three"></div>


                    <!-- =========================
                         CARD HEADER
                    ========================== -->

                    <div class="association-card-header">

                        <div class="association-card-icon">

                            <i class="fa fa-landmark"></i>

                        </div>

                        <div>

                            <span class="association-card-label">
                                The Nationwide Association of Afghan Jurists in Europe
                            </span>

                            <h2>
                                Connect, Participate & Stay Informed
                            </h2>

                        </div>

                    </div>


                    <!-- =========================
                         CARD CONTENT
                    ========================== -->

                    <div class="row g-4 association-card-content">


                        <!-- VIDEO -->
                        <div class="col-lg-6">

                            <div class="association-info-box">

                                <div class="association-info-icon video-icon">

                                    <i class="fa fa-video"></i>

                                </div>

                                <div>

                                    <h5>
                                        Watch Our Activities
                                    </h5>

                                    <p>
                                        Explore videos from the Association’s
                                        events, meetings, educational programs,
                                        and professional activities. Discover
                                        the people and initiatives shaping our
                                        legal community.
                                    </p>

                                    <div class="association-info-link">

                                        <span>
                                            Press the play button above
                                            to watch the video
                                        </span>

                                        <i class="fa fa-arrow-up"></i>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <!-- FEEDBACK -->
                        <div class="col-lg-6">

                            <div class="association-info-box">

                                <div class="association-info-icon feedback-icon">

                                    <i class="fa fa-comment-dots"></i>

                                </div>

                                <div>

                                    <h5>
                                        Share Your Thoughts
                                    </h5>

                                    <p>
                                        Your thoughts and feedback matter to us.
                                        If you would like to share your opinion,
                                        suggestions, or comments about the
                                        The Nationwide Association of Afghan Jurists in Europe,
                                        we would be glad to hear from you.
                                    </p>

                                </div>

                            </div>

                        </div>


                    </div>


                    <!-- =========================
                         MEMBERSHIP CTA
                    ========================== -->

                    <div class="association-membership">

                        <div class="membership-content">

                            <div class="membership-icon">

                                <i class="fa fa-user-plus"></i>

                            </div>

                            <div>

                                <span>
                                    Become Part of Our Community
                                </span>

                                <h4>
                                    Interested in joining the
                                    The Nationwide Association of Afghan Jurists in Europe?
                                </h4>

                                <p>
                                    Complete the membership application form
                                    to begin your journey with our professional
                                    legal community.
                                </p>

                            </div>

                        </div>


                   
                      <!-- Membership Application -->
                        <a href="{{ route('member.application') }}"
                        class="membership-btn">

                            <span>
                                Apply for Membership
                            </span>

                            <i class="fa fa-arrow-right"></i>

                        </a>

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>

<!-- =========================================================
     ABOUT US END
========================================================= -->


    <!-- Fact Start -->
<div class="container-fluid fact bg-dark my-5 py-5 bg-warning">

    <div class="container">

        <div class="row g-4">

            <!-- Association Members -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.1s">

                <i class="fa fa-users fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $membersCount }}
                </h2>

                <p class="text-white mb-0">
                    Association Members
                </p>

            </div>


            <!-- News -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.3s">

                <i class="fa fa-newspaper fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $newsCount }}
                </h2>

                <p class="text-white mb-0">
                    News
                </p>

            </div>


            <!-- Announcements -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.5s">

                <i class="fa fa-bullhorn fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $announcementsCount }}
                </h2>

                <p class="text-white mb-0">
                    Announcements
                </p>

            </div>


            <!-- Archive Files -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.7s">

                <i class="fa fa-folder-open fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $archiveFilesCount }}
                </h2>

                <p class="text-white mb-0">
                    Archive Files
                </p>

            </div>

        </div>

    </div>

</div>
<!-- Fact End -->

<!-- Donation Start -->
<section class="container-xxl py-5">

    <div class="container">

        <div
            class="donation-section position-relative overflow-hidden"
            style="
                border-radius: 30px;
                padding: 70px 55px;
                background:
                    radial-gradient(circle at 10% 20%, rgba(13,110,253,.12), transparent 30%),
                    radial-gradient(circle at 90% 80%, rgba(255,193,7,.12), transparent 30%),
                    linear-gradient(135deg, #f8fbff, #eef6ff);
                border: 1px solid rgba(13,110,253,.10);
                box-shadow: 0 20px 60px rgba(13, 72, 120, .10);
            "
        >

            {{-- Decorative Glass Circles --}}
            <div
                class="position-absolute"
                style="
                    width: 160px;
                    height: 160px;
                    border-radius: 50%;
                    background: rgba(13,110,253,.07);
                    top: -70px;
                    left: -50px;
                    filter: blur(2px);
                "
            ></div>

            <div
                class="position-absolute"
                style="
                    width: 120px;
                    height: 120px;
                    border-radius: 35px;
                    background: rgba(255,193,7,.08);
                    bottom: -45px;
                    right: 18%;
                    transform: rotate(25deg);
                "
            ></div>


            <div class="row align-items-center g-5 position-relative">

                {{-- Text --}}
                <div class="col-lg-7 wow fadeInLeft" data-wow-delay="0.1s">

                    <div class="mb-3">

                        <span
                            style="
                                display: inline-flex;
                                align-items: center;
                                gap: 8px;
                                padding: 8px 18px;
                                border-radius: 50px;
                                background: rgba(13,110,253,.08);
                                color: #0d6efd;
                                font-weight: 600;
                                font-size: 14px;
                            "
                        >
                            <i class="fa fa-heart"></i>
                            SUPPORT OUR MISSION
                        </span>

                    </div>


                    <h2
                        class="mb-3"
                        style="
                            font-weight: 700;
                            color: #123b63;
                            line-height: 1.3;
                        "
                    >
                        Support the Future of Legal Knowledge
                    </h2>


                    <p
                        class="mb-4"
                        style="
                            color: #64748b;
                            font-size: 16px;
                            line-height: 1.9;
                            max-width: 650px;
                        "
                    >
                        Your support helps us preserve legal resources,
                        expand educational programs, publish valuable
                        information and make legal knowledge more accessible
                        to everyone.
                    </p>


                    {{-- Donation Features --}}
                    <div class="row g-3 mb-4">

                        <div class="col-sm-6">

                            <div
                                class="d-flex align-items-center p-3"
                                style="
                                    background: rgba(255,255,255,.65);
                                    border: 1px solid rgba(13,110,253,.08);
                                    border-radius: 18px;
                                    backdrop-filter: blur(10px);
                                "
                            >

                                <div
                                    class="d-flex align-items-center justify-content-center me-3"
                                    style="
                                        width: 45px;
                                        height: 45px;
                                        border-radius: 14px;
                                        background: rgba(13,110,253,.09);
                                    "
                                >
                                    <i class="fa fa-book text-primary"></i>
                                </div>

                                <div>
                                    <strong style="color:#123b63;">
                                        Legal Resources
                                    </strong>

                                    <small class="d-block text-muted">
                                        Preserve valuable knowledge
                                    </small>
                                </div>

                            </div>

                        </div>


                        <div class="col-sm-6">

                            <div
                                class="d-flex align-items-center p-3"
                                style="
                                    background: rgba(255,255,255,.65);
                                    border: 1px solid rgba(13,110,253,.08);
                                    border-radius: 18px;
                                    backdrop-filter: blur(10px);
                                "
                            >

                                <div
                                    class="d-flex align-items-center justify-content-center me-3"
                                    style="
                                        width: 45px;
                                        height: 45px;
                                        border-radius: 14px;
                                        background: rgba(255,193,7,.12);
                                    "
                                >
                                    <i class="fa fa-graduation-cap text-warning"></i>
                                </div>

                                <div>
                                    <strong style="color:#123b63;">
                                        Legal Education
                                    </strong>

                                    <small class="d-block text-muted">
                                        Support learning & research
                                    </small>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- Button --}}
                   <a
                        href="{{ route('donation') }}"
                        class="btn px-4 py-3"
                        style="
                            border-radius: 14px;
                            background: linear-gradient(135deg, #0d6efd, #1769aa);
                            color: white;
                            font-weight: 600;
                            box-shadow: 0 10px 25px rgba(13,110,253,.20);
                        "
                    >
                        <i class="fa fa-heart me-2"></i>
                        Support Our Association
                        <i class="fa fa-arrow-right ms-2"></i>
                    </a>

                </div>


                {{-- Donation Image --}}
                <div class="col-lg-5 wow fadeInRight" data-wow-delay="0.3s">

                    <div
                        class="position-relative mx-auto"
                        style="
                            max-width: 420px;
                            min-height: 350px;
                            border-radius: 30px;
                            overflow: hidden;
                            background:
                                linear-gradient(
                                    135deg,
                                    rgba(13,110,253,.12),
                                    rgba(255,193,7,.10)
                                );
                            border: 1px solid rgba(255,255,255,.8);
                            box-shadow: 0 20px 50px rgba(13,72,120,.12);
                            backdrop-filter: blur(15px);
                        "
                    >

                        {{-- Decorative Elements --}}
                        <div
                            class="position-absolute"
                            style="
                                width: 90px;
                                height: 90px;
                                border-radius: 50%;
                                background: rgba(13,110,253,.10);
                                top: 25px;
                                right: 25px;
                            "
                        ></div>

                        <div
                            class="position-absolute"
                            style="
                                width: 65px;
                                height: 65px;
                                border-radius: 20px;
                                background: rgba(255,193,7,.12);
                                bottom: 30px;
                                left: 25px;
                                transform: rotate(20deg);
                            "
                        ></div>


                        {{-- YOUR DONATION IMAGE --}}
                        <img
                            src="/assets/img/donation/1.jpg"
                            alt="Support the National Association of Afghan Lawyers"
                            class="w-100 h-100 position-absolute"
                            style="
                                object-fit: cover;
                                opacity: .92;
                            "
                        >


                        {{-- Glass Icon --}}
                        <div
                            class="position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center"
                            style="
                                width: 90px;
                                height: 90px;
                                border-radius: 28px;
                                background: rgba(255,255,255,.72);
                                backdrop-filter: blur(15px);
                                box-shadow: 0 15px 35px rgba(0,0,0,.12);
                            "
                        >
                            <i
                                class="fa fa-heart"
                                style="
                                    font-size: 35px;
                                    color: #0d6efd;
                                "
                            ></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- Donation End -->
 <!-- =========================================================
     LEGAL SYSTEMS — AREAS COVERED
========================================================= -->

<section class="legal-systems-section">

    <div class="container">

        <!-- SECTION HEADER -->
        <div class="legal-systems-header wow fadeInUp"
             data-wow-delay="0.1s">

            <div class="legal-systems-eyebrow">
                <span class="legal-header-line"></span>

                <span>LEGAL AREAS COVERED</span>

                <span class="legal-header-line"></span>
            </div>

            <h1>
                Legal System of
                <span>Afghanistan</span>
                and Other Countries
            </h1>

            <p>
                Explore legal systems and discover their structures,
                principles, and key areas through our comprehensive
                legal resources.
            </p>

        </div>


        <!-- LEGAL SYSTEM CARDS -->
        <div class="row g-4 justify-content-center">

            @forelse($legalSystems as $legalSystem)

                @php
                    $translation = $legalSystem->translations->first();
                @endphp

                @if($translation)

                    <div class="col-lg-6 col-md-6">

                        <article class="legal-system-card wow fadeInUp"
                                 data-wow-delay="0.1s">


                            <!-- IMAGE -->
                            <div class="legal-system-image">

                                <img
                                    src="{{ asset('storage/' . $legalSystem->image) }}"
                                    alt="{{ $translation->title }}"
                                    style="width: 100%; height: 100%;"
                                >

                                <div class="legal-image-overlay"></div>


                                <!-- TOP BADGE -->
                                <div class="legal-system-badge">

                                    <span>
                                        <i class="fa fa-balance-scale"></i>
                                    </span>

                                    <small>LEGAL SYSTEM</small>

                                </div>


                                <!-- IMAGE NUMBER -->
                                <div class="legal-system-number">
                                    {{ sprintf('%02d', $loop->iteration) }}
                                </div>

                            </div>


                            <!-- CARD CONTENT -->
                            <div class="legal-system-content">

                                <div class="legal-system-content-top">

                                    <div>

                                        <span class="legal-system-label">
                                            LEGAL JURISDICTION
                                        </span>

                                        <h3>
                                            {{ $translation->title }}
                                        </h3>

                                    </div>


                                    <!-- ICON -->
                                    <div class="legal-system-icon">

                                        <i class="fa fa-gavel"></i>

                                    </div>

                                </div>


                                <!-- DESCRIPTION -->
                                <p class="legal-system-description">
                                    {{ Str::limit($translation->summary, 120) }}
                                </p>


                                <!-- BOTTOM -->
                                <div class="legal-system-footer">

                                    <span class="legal-system-explore">
                                        Explore Legal System
                                    </span>


                                    <!-- Single Page -->
                                    <a
                                        href="{{ route('legal-system.show', $translation->legal_system_id) }}"
                                        class="legal-system-arrow"
                                        aria-label="Explore {{ $translation->title }}"
                                    >
                                        <i class="fa fa-arrow-right"></i>
                                    </a>

                                </div>

                            </div>

                        </article>

                    </div>

                @endif

            @empty

                <div class="col-12">

                    <div class="legal-empty-state">

                        <div class="legal-empty-icon">
                            <i class="fa fa-balance-scale"></i>
                        </div>

                        <h5>No Legal Systems Available</h5>

                        <p>
                            Legal system information will be available here
                            once it has been added.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</section>
    <!-- Service End -->

      
          <!-- =========================
     ABOUT NEWS SECTION
========================= -->
<section class="about-news-section">
    <div class="container-fluid px-lg-5">

        <div class="about-news-glass wow fadeInUp" data-wow-delay="0.1s">

            <!-- Decorative Background Shapes -->
            <span class="about-news-orb orb-one"></span>
            <span class="about-news-orb orb-two"></span>
            <span class="about-news-orb orb-three"></span>

            <div class="row align-items-center g-0">

                <!-- =========================
                     IMAGE AREA
                ========================= -->
                <div class="col-lg-5">

                    <div class="about-news-visual">

                        <!-- Floating decorative circles -->
                        <span class="visual-circle circle-one"></span>
                        <span class="visual-circle circle-two"></span>
                        <span class="visual-circle circle-three"></span>

                        <!-- Main Image Card -->
                        <div class="news-main-image">

                            <img
                                src="{{ asset('assets/img/News/news.jpg') }}"
                                alt="Latest News and Developments"
                            >

                            <div class="image-overlay"></div>

                            <!-- Image Badge -->
                            <div class="news-image-badge">
                                <i class="fa-solid fa-newspaper"></i>
                                <span>Latest News</span>
                            </div>

                        </div>

                        <!-- Small Floating Image -->
                        <div class="news-floating-image">
                            <img
                                src="{{ asset('assets/img/News/1.jpg') }}"
                                alt="Legal News"
                            >
                        </div>

                        <!-- Floating Icon -->
                        <div class="news-floating-icon">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>

                    </div>

                </div>


                <!-- =========================
                     CONTENT AREA
                ========================= -->
                <div class="col-lg-7">

                    <div class="about-news-content">

                        <div class="section-label">
                            <span class="label-line"></span>
                            <span>ABOUT NEWS</span>
                        </div>

                        <h2 class="about-news-title">
                            Latest News
                            <span>& Developments</span>
                        </h2>

                        <p class="about-news-intro">
                            Stay informed with the latest legal, social, and
                            educational developments shaping Afghanistan and
                            the wider world. Discover important updates,
                            professional activities, institutional changes,
                            and key events that matter to the legal community.
                        </p>


                        <!-- =========================
                             FEATURE CARDS
                        ========================= -->
                        <div class="news-feature-grid">

                            <!-- Feature 1 -->
                            <div class="news-feature-card">

                                <div class="feature-icon">
                                    <i class="fa-solid fa-scale-balanced"></i>
                                </div>

                                <div class="feature-text">
                                    <h5>Legal Systems & Institutions</h5>

                                    <p>
                                        Follow important developments,
                                        legal reforms, institutional changes,
                                        and discussions shaping Afghanistan's
                                        legal systems.
                                    </p>
                                </div>

                                <span class="feature-arrow">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </span>

                            </div>


                            <!-- Feature 2 -->
                            <div class="news-feature-card">

                                <div class="feature-icon">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>

                                <div class="feature-text">
                                    <h5>Legal Professionals & Events</h5>

                                    <p>
                                        Discover activities, achievements,
                                        professional events, and important
                                        contributions from lawyers and
                                        legal experts.
                                    </p>
                                </div>

                                <span class="feature-arrow">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </span>

                            </div>


                            <!-- Feature 3 -->
                            <div class="news-feature-card">

                                <div class="feature-icon">
                                    <i class="fa-brands fa-youtube"></i>
                                </div>

                                <div class="feature-text">
                                    <h5>Full Videos & Coverage</h5>

                                    <p>
                                        Watch complete coverage of important
                                        events, interviews, discussions,
                                        seminars, and programs through our
                                        YouTube channel.
                                    </p>
                                </div>

                                <span class="feature-arrow">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </span>

                            </div>


                            <!-- Feature 4 -->
                            <div class="news-feature-card">

                                <div class="feature-icon">
                                    <i class="fa-solid fa-book-open"></i>
                                </div>

                                <div class="feature-text">
                                    <h5>Explore the Full Story</h5>

                                    <p>
                                        Read complete news stories and
                                        explore additional details,
                                        related information, and relevant
                                        content surrounding each event.
                                    </p>
                                </div>

                                <span class="feature-arrow">
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                </span>

                            </div>

                        </div>


                        <!-- =========================
                             ACTION BUTTONS
                        ========================= -->
                        <div class="about-news-actions">

                            <a href="{{ route('about') }}" class="news-about-btn">
                                <span>Discover More About Us</span>
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>

                            <a href="{{ route('news.index') }}" class="news-secondary-btn">
                                <i class="fa-regular fa-newspaper"></i>
                                <span>View All News</span>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>
     
    <!-- Statistics Start -->
<div class="container-fluid fact bg-dark my-5 py-5 bg-warning">

    <div class="container">

        <div class="row g-4">

            <!-- Announcements -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.1s">

                <i class="fa fa-bullhorn fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $announcementsCount }}
                </h2>

                <p class="text-white mb-0">
                    Announcements
                </p>

            </div>


            <!-- Legal System Files -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.3s">

                <i class="fa fa-balance-scale fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $legalFilesCount }}
                </h2>

                <p class="text-white mb-0">
                    Legal System Files
                </p>

            </div>


            <!-- Media -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.5s">

                <i class="fa fa-photo-video fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $mediaCount }}
                </h2>

                <p class="text-white mb-0">
                    Media
                </p>

            </div>


            <!-- Academy Resources -->
            <div class="col-md-6 col-lg-3 text-center wow fadeIn"
                 data-wow-delay="0.7s">

                <i class="fa fa-graduation-cap fa-2x text-white mb-3"></i>

                <h2 class="text-white mb-2"
                    data-toggle="counter-up">
                    {{ $academyResourcesCount }}
                </h2>

                <p class="text-white mb-0">
                    Academy Resources
                </p>

            </div>

        </div>

    </div>

</div>
<!-- Statistics End -->
<!-- =========================
     ABOUT ARCHIVE
========================= -->
<div class="row p-5 about-archive-section align-items-center">

    <!-- TEXT SIDE -->
    <div class="col-lg-7 ps-lg-5 wow fadeInUp" data-wow-delay="0.1s">

        <div class="archive-glass-content">

            <div class="archive-eyebrow">
                <span class="archive-eyebrow-line"></span>
                <span>ABOUT ARCHIVE</span>
            </div>

            <h1 class="archive-title">
                Members & Activities
                <span>Archive</span>
            </h1>

            <p class="archive-description">
                Explore the history of the Association through a carefully
                organized archive of its former and current members, their
                publications, professional achievements, academic activities,
                and contributions throughout the years.
            </p>

            <!-- Feature 01 -->
            <div class="archive-feature-card">
                <div class="archive-feature-icon">
                    <i class="fa fa-users"></i>
                </div>

                <div class="archive-feature-text">
                    <h6>Members & Their Activities</h6>
                    <p>
                        Discover former and current members of the Association
                        and explore their activities and contributions across
                        different periods.
                    </p>
                </div>
            </div>

            <!-- Feature 02 -->
            <div class="archive-feature-card">
                <div class="archive-feature-icon">
                    <i class="fa fa-book-open"></i>
                </div>

                <div class="archive-feature-text">
                    <h6>Articles & Publications</h6>
                    <p>
                        Access articles, publications, academic achievements,
                        and professional activities associated with the
                        Association's members.
                    </p>
                </div>
            </div>

            <!-- Feature 03 -->
            <div class="archive-feature-card">
                <div class="archive-feature-icon">
                    <i class="fa fa-clock"></i>
                </div>

                <div class="archive-feature-text">
                    <h6>Search by Year & Period</h6>
                    <p>
                        Browse and search members' records and Association
                        activities by year and period of service.
                    </p>
                </div>
            </div>

            <!-- Button -->
           <div class="archive-action">
                <a href="{{ route('archive') }}" class="archive-view-btn">
                    <span>Explore Archive</span>
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>

        </div>

    </div>


    <!-- IMAGE SIDE -->
    <div class="col-lg-5 archive-image-column wow fadeInUp"
         data-wow-delay="0.3s">

        <div class="archive-visual">

            <!-- Background shapes -->
            <div class="archive-orb archive-orb-one"></div>
            <div class="archive-orb archive-orb-two"></div>
            <div class="archive-orb archive-orb-three"></div>

            <!-- Decorative gradient cards -->
            <div class="archive-decoration archive-decoration-one"></div>
            <div class="archive-decoration archive-decoration-two"></div>

            <!-- Main glass image card -->
            <div class="archive-image-card">

                <div class="archive-image-inner">
                    <img src="assets/img/archive/archive.jpg"
                         alt="Members and Activities Archive">
                </div>

                <!-- Small floating image -->
                <div class="archive-mini-card">
                    <div class="archive-mini-icon">
                        <i class="fa fa-archive"></i>
                    </div>
                    <span>Our History</span>
                </div>

            </div>

        </div>

    </div>

</div>


          <!-- =========================================================
     ABOUT ANNOUNCEMENTS
========================================================= -->
<div class="about-announcement-section">

    <!-- FULL WIDTH IMAGE -->
    <div class="announcement-banner wow fadeInUp"
         data-wow-delay="0.1s">

        <img src="assets/img/Announcements/Announcements.jpg"
             alt="Official Announcements">

        <div class="announcement-image-overlay"></div>

        <!-- Floating label -->
        <div class="announcement-floating-label">
            <span class="announcement-label-icon">
                <i class="fa fa-bullhorn"></i>
            </span>

            <span>OFFICIAL COMMUNICATION</span>
        </div>

    </div>


    <!-- OVERLAPPING GLASS CARD -->
    <div class="announcement-content-wrapper">

        <div class="announcement-glass-card wow announcementReveal"
             data-wow-delay="0.2s">

            <!-- Heading -->
            <div class="announcement-heading">

                <div class="announcement-eyebrow">
                    <span class="announcement-line"></span>
                    <span>ABOUT ANNOUNCEMENTS</span>
                </div>

                <h1>
                    Official
                    <span>Announcements</span>
                </h1>

                <p class="announcement-intro">
                    Stay informed with the official announcements, calls,
                    programs, statements, and important communications of
                    the Afghanistan National Association of Legal Professionals.
                    This section brings together the latest information about
                    the Association's activities and public positions.
                </p>

            </div>


            <!-- FEATURES -->
            <div class="announcement-features">

                <!-- Feature 01 -->
                <div class="announcement-feature">

                    <div class="announcement-feature-icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>

                    <div>
                        <h6>Official Notices & Calls</h6>

                        <p>
                            Follow official announcements, calls, and important
                            notices concerning the Association's programs,
                            activities, and initiatives.
                        </p>
                    </div>

                </div>


                <!-- Feature 02 -->
                <div class="announcement-feature">

                    <div class="announcement-feature-icon">
                        <i class="fa fa-calendar"></i>
                    </div>

                    <div>
                        <h6>Events & Programs</h6>

                        <p>
                            Discover seminars, meetings, programs, and online
                            or in-person events organized by the Association.
                        </p>
                    </div>

                </div>


                <!-- Feature 03 -->
                <div class="announcement-feature">

                    <div class="announcement-feature-icon">
                        <i class="fa fa-gavel"></i>
                    </div>

                    <div>
                        <h6>Official Statements</h6>

                        <p>
                            Read the Association's official views, positions,
                            and statements concerning important legal and
                            social matters.
                        </p>
                    </div>

                </div>

            </div>


            <!-- ACTION -->
            <div class="announcement-action">

                <!-- Replace ONLY the route name below with your exact
                     Announcement route when you send the routes. -->
               <a href="{{ route('announcements') }}" class="announcement-btn">

                    <span>View All Announcements</span>

                    <i class="fa fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</div>
        <!-- </div> -->
    <!-- </div> -->
    <!-- About End -->

      <!-- =========================
     ABOUT MEDIA
========================= -->
<div class="row p-5 m-0 about-media-section align-items-center">

    <!-- IMAGE SIDE -->
    <div class="col-lg-5 media-image-column wow fadeInUp"
         data-wow-delay="0.3s">

        <div class="media-visual">

            <!-- Floating background orbs -->
            <div class="media-orb media-orb-one"></div>
            <div class="media-orb media-orb-two"></div>
            <div class="media-orb media-orb-three"></div>

            <!-- Decorative shapes -->
            <div class="media-decoration media-decoration-one"></div>
            <div class="media-decoration media-decoration-two"></div>

            <!-- Main image glass card -->
            <div class="media-image-card">

                <div class="media-image-inner">

                    <img src="assets/img/Media/Media.jpg"
                         alt="Afghanistan National Association of Legal Professionals Media">

                    <!-- Image overlay -->
                    <div class="media-image-overlay">
                        <div class="media-play-icon">
                            <i class="fa fa-play"></i>
                        </div>
                    </div>

                </div>

                <!-- Floating media badge -->
                <div class="media-mini-card">
                    <div class="media-mini-icon">
                        <i class="fa fa-video"></i>
                    </div>

                    <div>
                        <span class="media-mini-title">Media & Press</span>
                        <small>Our public presence</small>
                    </div>
                </div>

            </div>

        </div>

    </div>

    


    <!-- TEXT SIDE -->
    <div class="col-lg-7 ps-lg-5 wow fadeInUp"
         data-wow-delay="0.1s">

        <div class="media-glass-content">

            <!-- Eyebrow -->
            <div class="media-eyebrow">
                <span class="media-eyebrow-line"></span>
                <span>ABOUT MEDIA</span>
            </div>

            <!-- Title -->
            <h1 class="media-title">
                Media, Press &
                <span>Public Presence</span>
            </h1>

            <!-- Description -->
            <p class="media-description">
                Explore the public presence of the Afghanistan National
                Association of Legal Professionals through media coverage,
                visual stories, interviews, programs, and reports that
                highlight the Association's activities and its contribution
                to the legal community.
            </p>


            <!-- Feature 01 -->
            <div class="media-feature-card">

                <div class="media-feature-icon">
                    <i class="fa fa-newspaper"></i>
                </div>

                <div class="media-feature-text">
                    <h6>Media Coverage & Recognition</h6>

                    <p>
                        Follow coverage of the Association's activities,
                        achievements, and public engagement through
                        reputable media outlets.
                    </p>
                </div>

            </div>


            <!-- Feature 02 -->
            <div class="media-feature-card">

                <div class="media-feature-icon">
                    <i class="fa fa-youtube-play"></i>
                </div>

                <div class="media-feature-text">
                    <h6>Videos & Official Programs</h6>

                    <p>
                        Watch interviews, programs, events, and other
                        visual content through the Association's official
                        YouTube presence.
                    </p>
                </div>

            </div>


            <!-- Feature 03 -->
            <div class="media-feature-card">

                <div class="media-feature-icon">
                    <i class="fa fa-tv"></i>
                </div>

                <div class="media-feature-text">
                    <h6>Television & Public Media</h6>

                    <p>
                        Discover the Association's presence across television
                        and public media platforms, including coverage by
                        outlets such as Amu TV.
                    </p>
                </div>

            </div>


            <!-- Button -->
            <div class="media-action">

                <!-- Route will be inserted here after checking your actual routes -->
              <a href="{{ route('website.media.index') }}" class="media-view-btn">

                <span>Explore Media</span>

                <i class="fa fa-arrow-right"></i>

            </a>

            </div>

        </div>

    </div>

</div>



<!-- =========================================================
     ABOUT ACADEMY
========================================================= -->
<div class="about-academy-section">

    <!-- FULL WIDTH ACADEMY BANNER -->
    <div class="academy-banner wow fadeInUp"
         data-wow-delay="0.1s">

        <img src="assets/img/academy/academy.jpg"
             alt="Academy - Legal Education and Professional Development">

        <div class="academy-image-overlay"></div>

        <!-- Floating Academy Label -->
        <div class="academy-floating-label">

            <span class="academy-label-icon">
                <i class="fa fa-graduation-cap"></i>
            </span>

            <span>LEGAL EDUCATION & DEVELOPMENT</span>

        </div>

    </div>


    <!-- OVERLAPPING GLASS CARD -->
    <div class="academy-content-wrapper">

        <div class="academy-glass-card academyReveal"
             data-wow-delay="0.2s">


            <!-- HEADING -->
            <div class="academy-heading">

                <div class="academy-eyebrow">

                    <span class="academy-line"></span>

                    <span>ABOUT THE ACADEMY</span>

                    <span class="academy-line academy-line-right"></span>

                </div>


                <h1>
                    Learn.
                    <span>Develop.</span>
                    Lead.
                </h1>


                <p class="academy-intro">
                    The Academy is an educational and professional development
                    platform designed to connect instructors and students
                    through structured learning opportunities. With a strong
                    focus on legal education and the Legal Systems Department,
                    the Academy provides an organized path from learning and
                    practical development to assessment and certification,
                    helping students and legal professionals strengthen their
                    knowledge, skills, and understanding of the law.
                </p>

            </div>


            <!-- ACADEMY FEATURES -->
            <div class="academy-features">


                <!-- FEATURE 01 -->
                <div class="academy-feature">

                    <div class="academy-feature-icon">
                        <i class="fa fa-book"></i>
                    </div>

                    <div>

                        <h6>Courses & Specialized Learning</h6>

                        <p>
                            Explore educational courses and specialized
                            departments designed to expand knowledge and
                            develop practical professional skills.
                        </p>

                    </div>

                </div>


                <!-- FEATURE 02 -->
                <div class="academy-feature">

                    <div class="academy-feature-icon">
                        <i class="fa fa-user"></i>
                    </div>

                    <div>

                        <h6>Instructors & Students</h6>

                        <p>
                            Bring qualified instructors and motivated students
                            together in an organized, interactive, and
                            supportive learning environment.
                        </p>

                    </div>

                </div>


                <!-- FEATURE 03 -->
                <div class="academy-feature">

                    <div class="academy-feature-icon">
                        <i class="fa fa-tasks"></i>
                    </div>

                    <div>

                        <h6>Structured Academic Journey</h6>

                        <p>
                            Manage subjects, curricula, schedules, assignments,
                            assessments, grades, and certification throughout
                            the learning process.
                        </p>

                    </div>

                </div>


            </div>


            <!-- ACADEMY HIGHLIGHT -->
            <div class="academy-highlight">

                <div class="academy-highlight-icon">
                    <i class="fa fa-graduation-cap"></i>
                </div>

                <div>

                    <strong>
                        Building knowledge for the future of the legal profession
                    </strong>

                    <span>
                        Learn from structured programs, develop specialized
                        skills, and take the next step in your professional journey.
                    </span>

                </div>

            </div>


            <!-- ACTION -->
            <div class="academy-action">

                <!-- Replace with your real Academy route -->
               <a href="{{ route('academy') }}" class="academy-btn">

                    <span>Explore the Academy</span>

                     <i class="fa fa-arrow-right"></i>

                 </a>

            </div>


        </div>

    </div>

</div>
            
  

<!-- =========================================================
     ASSOCIATION VIDEO & COMMUNITY SECTION END
========================================================= -->


  <!-- Service Start -->
<div class="container-fluid py-5 px-4 px-lg-0">
    <div class="row g-0">

        {{-- Left Side --}}
        <div class="col-lg-3 d-none d-lg-flex">

            <div
                class="d-flex align-items-center justify-content-center w-100 h-100"
                style="
                   background:
                        radial-gradient(circle at 20% 20%, rgba(158, 119, 3, 0.3), transparent 35%),
                        radial-gradient(circle at 80% 80%, rgba(255, 160, 7, 0.527), transparent 35%),
                        linear-gradient(145deg, #098fd76f, #1f42e07a);
                ">

                <h1
                    class="display-3 text-white m-0"
                    style="
                        transform: rotate(-90deg);
                        white-space: nowrap;
                        letter-spacing: 2px;
                    "
                >
                    Our Services
                </h1>

            </div>

        </div>


        {{-- Services Content --}}
        <div class="col-md-12 col-lg-9">

            <div class="ms-lg-5 ps-lg-5">

                {{-- Heading --}}
                <div
                    class="text-center text-lg-start wow fadeInUp"
                    data-wow-delay="0.1s"
                >

                    <h6 class="text-secondary text-uppercase">
                        What We Provide
                    </h6>

                    <h1 class="mb-5">
                        Explore Our Services
                    </h1>

                </div>


                {{-- Carousel --}}
                <div
                    class="owl-carousel service-carousel position-relative wow fadeInUp"
                    data-wow-delay="0.1s"
                >


                    {{-- 01 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-book fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal Resources & Information
                        </h4>

                        <p>
                            Access reliable legal information, laws, documents
                            and academic resources in one place.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Information
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Laws & Documents
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Academic Resources
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 02 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-balance-scale fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal Systems of Afghanistan & the World
                        </h4>

                        <p>
                            Explore Afghanistan's legal system and legal systems
                            from countries around the world.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Afghanistan Law
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            World Legal Systems
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Documents
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 03 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-graduation-cap fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal Academy & Education
                        </h4>

                        <p>
                            Develop legal knowledge through educational materials,
                            study resources and specialized academic content.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Education
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Study Resources
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Academic Content
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 04 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-laptop fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Digital Library & Electronic Resources
                        </h4>

                        <p>
                            Explore digital books, legal documents, articles
                            and electronic resources for research.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Digital Library
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Books
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Research Resources
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 05 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-archive fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal Documents & Activities Archive
                        </h4>

                        <p>
                            Discover archived biographies, activities,
                            articles, announcements and legal documents.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Archive
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Member Profiles
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Historical Records
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 06 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-globe fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal News & Events
                        </h4>

                        <p>
                            Stay informed about the latest legal news,
                            events and developments in Afghanistan and worldwide.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Latest News
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Events
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Current Updates
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 07 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="bi bi-bar-chart-line-fill fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal Reports & Information
                        </h4>

                        <p>
                            Follow important reports, activities and developments
                            related to law and society.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Reports
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Daily Activities
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Important Updates
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 08 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="bi bi-journal-text fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal Articles & Academic Research
                        </h4>

                        <p>
                            A platform for publishing legal articles,
                            research and academic studies by specialists.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Articles
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Academic Research
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Expert Knowledge
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 09 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-users fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Cooperation & Networking for Lawyers
                        </h4>

                        <p>
                            Connect Afghan lawyers, researchers and legal
                            professionals inside Afghanistan and abroad.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Professional Network
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Cooperation
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Professional Community
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>



                    {{-- 10 --}}
                    <div class="bg-light p-4">

                        <div
                            class="d-flex align-items-center justify-content-center border border-5 border-white mb-4"
                            style="width: 75px; height: 75px;"
                        >
                            <i class="fa fa-info-circle fa-2x text-primary"></i>
                        </div>

                        <h4 class="mb-3">
                            Legal Awareness & Guidance
                        </h4>

                        <p>
                            Learn more about legal matters, concepts and
                            important issues through accessible resources.
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Awareness
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Legal Guidance
                        </p>

                        <p class="text-primary fw-medium">
                            <i class="fa fa-check text-success me-2"></i>
                            Public Information
                        </p>

                        <a
                            href="{{ route('services') }}"
                            class="btn bg-white text-primary w-100 mt-2"
                        >
                            Read More
                            <i class="fa fa-arrow-right text-secondary ms-2"></i>
                        </a>

                    </div>


                </div>
                {{-- Carousel End --}}

            </div>

        </div>

    </div>
</div>
<!-- Service End -->


    <!-- Testimonial Start -->
  
            @if($comments->count() > 0)

            <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">

                <div class="container">

                    {{-- Section Heading --}}
                    <div class="text-center">

                        <h6 class="text-secondary text-uppercase">
                            What Our Users Say
                        </h6>

                        <h1 class="mb-5">
                            Comments From Our Website Users
                        </h1>

                    </div>


                    {{-- Comments Carousel --}}
                    <div
                        class="owl-carousel testimonial-carousel position-relative wow fadeInUp"
                        data-wow-delay="0.1s"
                    >

                        @foreach($comments as $comment)

                            <div class="testimonial-item text-center">

                                {{-- Comment --}}
                                <div class="testimonial-text bg-light text-center p-4 mb-4">

                                    <p class="mb-0">
                                        {{ $comment->message }}
                                    </p>

                                </div>


                                {{-- Static Avatar --}}
                                <img
                                    class="bg-light rounded-circle p-2 mx-auto mb-2"
                                    src="{{ asset('assets/img/testimonial-avatar.jpg') }}"
                                    style="width: 80px; height: 80px; object-fit: cover;"
                                    alt="{{ $comment->name }}"
                                >


                                {{-- Rating --}}
                                <div class="mb-2">

                                    @for($star = 1; $star <= 5; $star++)

                                        @if($star <= $comment->rating)

                                            <small class="fa fa-star text-secondary"></small>

                                        @else

                                            <small class="fa fa-star text-muted"></small>

                                        @endif

                                    @endfor

                                </div>


                                {{-- User Name --}}
                                <h5 class="mb-1">
                                    {{ $comment->name }}
                                </h5>


                                {{-- User Type --}}
                                <p class="m-0">
                                    Website User
                                </p>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

            @endif

    <!-- Testimonial End -->


    <!-- Comment Form Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">

            {{-- Left Side: Introduction --}}
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">

                <div class="comment-intro">

                    <span class="comment-badge">
                        <i class="fa fa-comments me-2"></i>
                        Share Your Opinion
                    </span>

                    <h1 class="comment-title mt-3">
                        We Value Your Feedback
                    </h1>

                    <p class="comment-description">
                        Your opinion matters to us. If you have a comment,
                        suggestion, or any feedback about the Afghanistan
                        Lawyers Association website, we would be happy to
                        hear from you.
                    </p>

                    <p class="comment-description">
                        Please take a moment to complete the form and share
                        your experience with us. Your feedback helps us
                        improve our website and provide better services
                        to our visitors.
                    </p>

                    <div class="comment-info-box">

                        <div class="comment-info-icon">
                            <i class="fa fa-star"></i>
                        </div>

                        <div>
                            <h6 class="mb-1">Rate Your Experience</h6>
                            <p class="mb-0">
                                Choose a rating from 1 to 5 stars
                                and tell us what you think.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Right Side: Comment Form --}}
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">

                <div class="comment-glass-card">

                    <div class="comment-card-header">

                        <div>
                            <span class="comment-small-title">
                                Your Feedback
                            </span>

                            <h3 class="mb-0">
                                Leave a Comment
                            </h3>
                        </div>

                        <div class="comment-header-icon">
                            <i class="fa fa-comment-dots"></i>
                        </div>

                    </div>


<form action="{{ route('comments.store') }}" method="POST">

    @csrf

    <div class="row g-3">

        {{-- Name --}}
        <div class="col-md-6">

            <label class="comment-label">
                Your Name
            </label>

            <div class="comment-input-wrapper">

                <i class="fa fa-user"></i>

                <input
                    type="text"
                    name="name"
                    class="comment-input"
                    placeholder="Enter your name"
                    value="{{ old('name') }}"
                    required
                >

            </div>

        </div>


        {{-- Email --}}
        <div class="col-md-6">

            <label class="comment-label">
                Your Email
            </label>

            <div class="comment-input-wrapper">

                <i class="fa fa-envelope"></i>

                <input
                    type="email"
                    name="email"
                    class="comment-input"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                >

            </div>

        </div>


        {{-- Rating --}}
        <div class="col-12">

            <label class="comment-label">
                Your Rating
            </label>

            <div class="rating-selector">

                <label>
                    <input
                        type="radio"
                        name="rating"
                        value="1"
                        {{ old('rating') == 1 ? 'checked' : '' }}
                        required
                    >
                    <span>★</span>
                </label>

                <label>
                    <input
                        type="radio"
                        name="rating"
                        value="2"
                        {{ old('rating') == 2 ? 'checked' : '' }}
                    >
                    <span>★</span>
                </label>

                <label>
                    <input
                        type="radio"
                        name="rating"
                        value="3"
                        {{ old('rating') == 3 ? 'checked' : '' }}
                    >
                    <span>★</span>
                </label>

                <label>
                    <input
                        type="radio"
                        name="rating"
                        value="4"
                        {{ old('rating') == 4 ? 'checked' : '' }}
                    >
                    <span>★</span>
                </label>

                <label>
                    <input
                        type="radio"
                        name="rating"
                        value="5"
                        {{ old('rating') == 5 ? 'checked' : '' }}
                    >
                    <span>★</span>
                </label>

                <small>
                    Select from 1 to 5 stars
                </small>

            </div>

        </div>


        {{-- Message --}}
        <div class="col-12">

            <label class="comment-label">
                Your Comment
            </label>

            <div class="comment-input-wrapper comment-textarea-wrapper">

                <i class="fa fa-comment-alt"></i>

                <textarea
                    name="message"
                    class="comment-input comment-textarea"
                    placeholder="Write your comment or feedback..."
                    required
                >{{ old('message') }}</textarea>

            </div>

        </div>


        {{-- Submit --}}
        <div class="col-12">

            <button
                type="submit"
                class="comment-submit-btn"
            >

                <span>
                    Submit Comment
                </span>

                <i class="fa fa-paper-plane ms-2"></i>

            </button>

        </div>

    </div>

</form>

                </div>

            </div>

        </div>
    </div>
</div>
<!-- Comment Form End -->


   


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


</body>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const announcementCard =
        document.querySelector(".announcementReveal");

    if (!announcementCard) return;

    const announcementObserver =
        new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add(
                            "announcement-visible"
                        );

                        announcementObserver.unobserve(
                            entry.target
                        );
                    }

                });

            },
            {
                threshold: 0.18
            }
        );

    announcementObserver.observe(announcementCard);

});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const academyCard =
        document.querySelector(".academyReveal");

    if (!academyCard) return;

    const academyObserver =
        new IntersectionObserver(
            function (entries) {

                entries.forEach(function (entry) {

                    if (entry.isIntersecting) {

                        entry.target.classList.add(
                            "academy-visible"
                        );

                        academyObserver.unobserve(
                            entry.target
                        );
                    }

                });

            },
            {
                threshold: 0.18
            }
        );

    academyObserver.observe(academyCard);

});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const rating = document.querySelector('.rating-selector');

    if (!rating) return;

    const labels = rating.querySelectorAll('label');

    labels.forEach((label, index) => {

        label.addEventListener('click', function () {

            rating.classList.add('has-rating');

            labels.forEach((item, i) => {

                const star = item.querySelector('span');

                if (i <= index) {
                    star.classList.add('star-active');
                } else {
                    star.classList.remove('star-active');
                }

            });

        });

        /* Preview rating while hovering */
        label.addEventListener('mouseenter', function () {

            labels.forEach((item, i) => {

                const star = item.querySelector('span');

                if (i <= index) {
                    star.style.color = '#e8b84f';
                } else {
                    star.style.color = '#c7d0dc';
                }

            });

        });

    });


    /* Restore selected rating after mouse leaves */

    rating.addEventListener('mouseleave', function () {

        const checked = rating.querySelector(
            'input[name="rating"]:checked'
        );

        if (!checked) return;

        const selectedIndex =
            Array.from(labels).findIndex(label =>
                label.querySelector('input').checked
            );

        labels.forEach((item, i) => {

            const star = item.querySelector('span');

            if (i <= selectedIndex) {
                star.style.color = '#e8b84f';
            } else {
                star.style.color = '#c7d0dc';
            }

        });

    });

});
</script>
</html>
@endsection
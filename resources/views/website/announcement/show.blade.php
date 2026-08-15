@extends('layouts.website')

@section('content')

@php
$translation = $announcement->translations->first();


/*
|--------------------------------------------------------------------------
| IMAGE URL
|--------------------------------------------------------------------------
*/
$imageUrl = $announcement->image
    ? asset('storage/' . ltrim($announcement->image, '/'))
    : asset('assets/img/about/default.jpg');

/*
|--------------------------------------------------------------------------
| DATE
|--------------------------------------------------------------------------
*/
$announcementDate = $announcement->publish_date
    ? \Carbon\Carbon::parse($announcement->publish_date)->format('F d, Y')
    : null;

/*
|--------------------------------------------------------------------------
| SHARE URL
|--------------------------------------------------------------------------
*/
$shareUrl = urlencode(url()->current());

$shareTitle = urlencode(
    $translation?->title ?? 'Announcement'
);


@endphp

<style>

/* =========================================================
   ANNOUNCEMENT SINGLE PAGE
========================================================= */

.announcement-single-page {
    background:
        linear-gradient(
            180deg,
            #f7faff 0%,
            #ffffff 45%,
            #f8fafc 100%
        );

    min-height: 100vh;
    padding: 70px 0 90px;
}


/* =========================================================
   MAIN CARD
========================================================= */

.announcement-single-card {

    max-width: 1050px;
    margin: 0 auto;

    background: rgba(255, 255, 255, 0.94);

    border: 1px solid rgba(23, 59, 99, 0.12);

    border-radius: 28px;

    padding: 55px 65px;

    box-shadow:
        0 25px 70px rgba(20, 55, 100, 0.10),
        0 5px 20px rgba(20, 55, 100, 0.05);

    position: relative;

    overflow: hidden;
}


/* Decorative glow */

.announcement-single-card::before {

    content: "";

    position: absolute;

    width: 280px;
    height: 280px;

    top: -150px;
    right: -100px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(13, 110, 253, 0.09),
            transparent 70%
        );

    pointer-events: none;
}


/* =========================================================
   CATEGORY LABEL
========================================================= */

.announcement-single-kicker {

    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 7px 17px;

    border-radius: 30px;

    background: linear-gradient(
        135deg,
        #b8862c,
        #d9aa45
    );

    color: #fff;

    font-size: 0.75rem;

    font-weight: 700;

    letter-spacing: 0.08em;

    text-transform: uppercase;

    box-shadow:
        0 6px 18px rgba(184, 134, 44, 0.22);
}


/* =========================================================
   TITLE
========================================================= */

.announcement-single-title {

    max-width: 850px;

    margin: 22px auto 15px;

    color: #173b63;

    font-size: clamp(
        2rem,
        4vw,
        3.25rem
    );

    line-height: 1.2;

    font-weight: 800;

    text-align: center;
}


/* =========================================================
   GOLD DIVIDER
========================================================= */

.announcement-single-divider {

    width: 90px;

    height: 3px;

    margin: 22px auto;

    background: linear-gradient(
        90deg,
        #b8862c,
        #e1b957
    );

    border-radius: 10px;

    position: relative;
}


.announcement-single-divider::after {

    content: "";

    position: absolute;

    width: 9px;
    height: 9px;

    background: #d4a640;

    transform: rotate(45deg);

    left: 50%;
    top: -3px;

    margin-left: -4px;

    border-radius: 2px;
}


/* =========================================================
   DATE
========================================================= */

.announcement-single-date {

    display: flex;

    justify-content: center;

    align-items: center;

    gap: 8px;

    color: #718096;

    font-size: 0.92rem;

    margin-bottom: 35px;
}


.announcement-single-date i {

    color: #b8862c;
}


/* =========================================================
   IMAGE
========================================================= */

.announcement-single-image-wrapper {

    max-width: 100%;
     height: 300px;
    margin: 0 auto 38px;

    padding: 8px;

    border-radius: 22px;

    border: 1px solid rgba(184, 134, 44, 0.45);

    background:
        linear-gradient(
            135deg,
            rgba(184, 134, 44, 0.12),
            rgba(255, 255, 255, 0.9)
        );

    box-shadow:
        0 18px 45px rgba(20, 55, 100, 0.12);
}


.announcement-single-image {

    width: 100%;


    max-height: 300px;

    /* object-fit: cover; */

    display: block;

    border-radius: 16px;

    transition:
        transform 0.5s ease,
        filter 0.5s ease;
}


.announcement-single-image-wrapper:hover
.announcement-single-image {

    transform: scale(1.108);

    filter: brightness(1.32);
}


/* =========================================================
   SHORT DESCRIPTION
========================================================= */

.announcement-single-short {

    max-width: 900px;

    margin: 0 auto 40px;

    padding: 22px 28px;

    background:
        linear-gradient(
            135deg,
            rgba(237, 244, 253, 0.95),
            rgba(247, 250, 255, 0.95)
        );

    border-left: 4px solid #b8862c;

    border-radius: 0 14px 14px 0;

    color: #304b68;

    font-size: 1.02rem;

    line-height: 1.9;

    position: relative;
}


.announcement-single-short i {

    color: #b8862c;

    font-size: 1.5rem;

    margin-right: 8px;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.announcement-single-description {

    max-width: 900px;

    margin: 0 auto;

    color: #43566c;

    font-size: 1rem;

    line-height: 2;

}


.announcement-single-description p {

    margin-bottom: 18px;
}


.announcement-single-description img {

    max-width: 100%;

    height: auto;

    border-radius: 14px;
}


/* =========================================================
   ASSOCIATION SIGNATURE
========================================================= */

.announcement-single-signature {

    max-width: 450px;

    margin: 55px auto 10px;

    text-align: center;
}


.announcement-single-signature-line {

    display: flex;

    align-items: center;

    gap: 15px;

    margin-bottom: 18px;
}


.announcement-single-signature-line::before,
.announcement-single-signature-line::after {

    content: "";

    height: 1px;

    flex: 1;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(184, 134, 44, 0.6)
        );
}


.announcement-single-signature-line::after {

    background:
        linear-gradient(
            90deg,
            rgba(184, 134, 44, 0.6),
            transparent
        );
}


.announcement-single-signature-icon {

    width: 44px;

    height: 44px;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    color: #b8862c;

    border: 1px solid rgba(184, 134, 44, 0.35);

    background: rgba(184, 134, 44, 0.07);

    font-size: 1.15rem;
}


.announcement-single-signature small {

    display: block;

    color: #718096;

    margin-bottom: 5px;
}


.announcement-single-signature strong {

    color: #173b63;

    font-size: 1.05rem;
}


/* =========================================================
   SHARE
========================================================= */

.announcement-single-share {

    max-width: 900px;

    margin: 45px auto 0;

    padding-top: 25px;

    border-top: 1px solid rgba(23, 59, 99, 0.10);

    text-align: center;
}


.announcement-single-share-title {

    color: #173b63;

    font-size: 0.75rem;

    font-weight: 700;

    letter-spacing: 0.09em;

    text-transform: uppercase;

    margin-bottom: 17px;
}


.announcement-single-share-buttons {

    display: flex;

    justify-content: center;

    align-items: center;

    gap: 12px;

    flex-wrap: wrap;
}


.announcement-share-btn {

    width: 43px;

    height: 43px;

    display: inline-flex;

    align-items: center;

    justify-content: center;

    border-radius: 50%;

    text-decoration: none;

    color: #fff;

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease;
}


.announcement-share-btn:hover {

    color: #fff;

    transform:
        translateY(-5px)
        rotate(-5deg);

    box-shadow:
        0 10px 22px rgba(20, 55, 100, 0.18);
}


.announcement-share-facebook {

    background: #1877f2;
}


.announcement-share-twitter {

    background: #1da1f2;
}


.announcement-share-linkedin {

    background: #0a66c2;
}


.announcement-share-email {

    background: #a67c2d;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991.98px) {

    .announcement-single-page {

        padding: 45px 15px 65px;
    }

    .announcement-single-card {

        padding: 40px 35px;

        border-radius: 24px;
    }

}


@media (max-width: 767.98px) {

    .announcement-single-page {

        padding: 30px 12px 50px;
    }

    .announcement-single-card {

        padding: 30px 20px;

        border-radius: 20px;
    }

    .announcement-single-title {

        font-size: 1.8rem;

        line-height: 1.35;
    }

    .announcement-single-image-wrapper {

        padding: 5px;

        border-radius: 17px;
    }

    .announcement-single-image {

        border-radius: 12px;

        max-height: 300px;
    }

    .announcement-single-short {

        padding: 17px 18px;

        font-size: 0.93rem;
    }

    .announcement-single-description {

        font-size: 0.93rem;

        line-height: 1.9;
    }

}


@media (max-width: 575.98px) {

    .announcement-single-kicker {

        font-size: 0.68rem;

        padding: 6px 13px;
    }

    .announcement-single-title {

        font-size: 1.55rem;
    }

    .announcement-single-date {

        font-size: 0.82rem;
    }

    .announcement-single-image {

        max-height: 300px;
    }

    .announcement-single-share-buttons {

        gap: 9px;
    }

    .announcement-share-btn {

        width: 40px;

        height: 40px;
    }

}

</style>

<section class="announcement-single-page">


<div class="container">

    <article class="announcement-single-card">


        {{-- =================================================
             HEADER
        ================================================== --}}

        <div class="text-center">

            <span class="announcement-single-kicker">

                <i class="fas fa-bullhorn"></i>

                Announcement

            </span>


            <h1 class="announcement-single-title">

                {{ $translation?->title ?? 'Announcement' }}

            </h1>


            <div class="announcement-single-divider"></div>


            @if($announcementDate)

                <div class="announcement-single-date">

                    <i class="far fa-calendar-alt"></i>

                    <span>
                        {{ $announcementDate }}
                    </span>

                </div>

            @endif

        </div>


        {{-- =================================================
             IMAGE
        ================================================== --}}

        <div class="announcement-single-image-wrapper" >

            <img
                src="{{ $imageUrl }}"
                alt="{{ $translation?->title ?? 'Announcement' }}"
                class="announcement-single-image "
            >

        </div>


        {{-- =================================================
             SHORT DESCRIPTION
        ================================================== --}}

        @if($translation?->short_description)

            <div class="announcement-single-short">

                <i class="fas fa-quote-left"></i>

                {{ $translation->short_description }}

            </div>

        @endif


        {{-- =================================================
             LONG DESCRIPTION
        ================================================== --}}

        @if($translation?->description)

            <div class="announcement-single-description">

                {!! $translation->description !!}

            </div>

        @endif


        {{-- =================================================
             ASSOCIATION SIGNATURE
        ================================================== --}}

        <div class="announcement-single-signature">

            <div class="announcement-single-signature-line">

                <div class="announcement-single-signature-icon">

                    <i class="fas fa-landmark"></i>

                </div>

            </div>


            <small>
                Best Regards
            </small>

            <strong>
                Afghanistan Lawyers Association

            </strong>

        </div>


    </article>


    {{-- =====================================================
         SHARE
    ====================================================== --}}

    <div class="announcement-single-share">

        <div class="announcement-single-share-title">

            Share this announcement

        </div>


        <div class="announcement-single-share-buttons">


            {{-- Facebook --}}

            <a
                href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                target="_blank"
                rel="noopener noreferrer"
                class="announcement-share-btn announcement-share-facebook"
                aria-label="Share on Facebook"
            >

                <i class="fab fa-facebook-f"></i>

            </a>


            {{-- Twitter / X --}}

            <a
                href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                target="_blank"
                rel="noopener noreferrer"
                class="announcement-share-btn announcement-share-twitter"
                aria-label="Share on Twitter"
            >

                <i class="fab fa-twitter"></i>

            </a>


            {{-- LinkedIn --}}

            <a
                href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
                target="_blank"
                rel="noopener noreferrer"
                class="announcement-share-btn announcement-share-linkedin"
                aria-label="Share on LinkedIn"
            >

                <i class="fab fa-linkedin-in"></i>

            </a>


            {{-- Email --}}

            <a
                href="mailto:?subject={{ $shareTitle }}&body={{ $shareUrl }}"
                class="announcement-share-btn announcement-share-email"
                aria-label="Share by email"
            >

                <i class="fas fa-envelope"></i>

            </a>

        </div>

    </div>

</div>


</section>

{{-- =========================================================
BACK TO TOP
========================================================= --}}

<a
href="#"
class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"

>


<i class="bi bi-arrow-up"></i>


</a>

@endsection

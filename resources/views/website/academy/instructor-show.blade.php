@extends('layouts.website')

@section('content')
<style>
    /* =========================================================
   ACADEMY — INSTRUCTOR PROFILE
========================================================= */

.academy-instructor-profile-page {
    position: relative;
    padding: 80px 0 100px;
    overflow: hidden;
    background: transparent;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.academy-instructor-profile-page > .container > div:first-child a {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    color: #315b8f;
    font-weight: 600;
    transition: all .35s ease;
}

.academy-instructor-profile-page > .container > div:first-child a:hover {
    color: #0d6efd;
    transform: translateX(-5px);
}


/* =========================================================
   PROFILE IMAGE CARD
========================================================= */

.academy-profile-image-card {
    position: relative;
    height: 100%;
    min-height: 520px;

    padding: 14px;

    overflow: hidden;

    border-radius: 28px;

    background:
        linear-gradient(
            145deg,
            rgba(20, 55, 90, .20),
            rgba(255, 255, 255, .38)
        );

    border: 1px solid rgba(60, 120, 180, .28);

    box-shadow:
        0 25px 60px rgba(20, 70, 120, .16),
        0 0 35px rgba(80, 160, 255, .08);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    transition:
        transform .5s ease,
        box-shadow .5s ease;
}

.academy-profile-image-card:hover {
    transform: translateY(-8px);

    box-shadow:
        0 30px 70px rgba(20, 70, 120, .24),
        0 0 45px rgba(80, 160, 255, .16);
}


.academy-profile-image-card img {
    width: 100%;
    height: 100%;
    min-height: 490px;

    object-fit: cover;

    border-radius: 22px;

    display: block;

    transition: transform .7s ease;
}

.academy-profile-image-card:hover img {
    transform: scale(1.035);
}


/* =========================================================
   IMAGE OVERLAY
========================================================= */

.academy-profile-image-overlay {
    position: absolute;

    left: 14px;
    right: 14px;
    bottom: 14px;

    height: 35%;

    border-radius: 0 0 22px 22px;

    background:
        linear-gradient(
            to top,
            rgba(5, 28, 55, .72),
            rgba(5, 28, 55, 0)
        );

    pointer-events: none;
}


/* =========================================================
   PLACEHOLDER
========================================================= */

.academy-profile-placeholder {
    min-height: 490px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 22px;

    background:
        linear-gradient(
            145deg,
            rgba(19, 54, 91, .25),
            rgba(220, 235, 250, .55)
        );

    color: #376b9e;

    font-size: 90px;
}


/* =========================================================
   PROFILE INFORMATION CARD
========================================================= */

.academy-profile-info-card {
    height: 100%;
    min-height: 520px;

    padding: 48px;

    position: relative;
    overflow: hidden;

    border-radius: 28px;

    background:
        linear-gradient(
            135deg,
            rgba(13, 43, 73, .12),
            rgba(255, 255, 255, .52)
        );

    border: 1px solid rgba(55, 110, 165, .30);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 25px 60px rgba(20, 70, 120, .13),
        0 0 35px rgba(65, 140, 220, .07);

    transition: all .5s ease;
}

.academy-profile-info-card::before {
    content: "";

    position: absolute;

    width: 220px;
    height: 220px;

    right: -80px;
    top: -90px;

    border-radius: 50%;

    background: rgba(75, 155, 235, .14);

    filter: blur(25px);

    pointer-events: none;
}

.academy-profile-info-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 30px 70px rgba(20, 70, 120, .20),
        0 0 45px rgba(70, 145, 230, .13);
}


/* =========================================================
   POSITION
========================================================= */

.academy-profile-position {
    display: inline-flex;
    align-items: center;

    padding: 8px 16px;

    margin-bottom: 18px;

    border-radius: 50px;

    background: rgba(30, 93, 150, .10);

    border: 1px solid rgba(45, 110, 175, .20);

    color: #275d91;

    font-size: 14px;
    font-weight: 700;
}


/* =========================================================
   NAME
========================================================= */

.academy-profile-info-card h1 {
    margin: 0 0 15px;

    color: #092d52;

    font-size: clamp(34px, 4vw, 52px);

    font-weight: 800;

    line-height: 1.15;

    letter-spacing: -.5px;
}


/* =========================================================
   DEPARTMENT
========================================================= */

.academy-profile-department {
    display: flex;
    align-items: center;
    gap: 10px;

    margin-bottom: 30px;

    color: #356991;

    font-size: 16px;
    font-weight: 600;
}

.academy-profile-department i {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: rgba(70, 145, 220, .12);

    color: #2878bd;

    transition: transform .4s ease;
}

.academy-profile-department:hover i {
    transform: rotate(-8deg) scale(1.08);
}


/* =========================================================
   META INFORMATION
========================================================= */

.academy-profile-meta {
    display: grid;

    grid-template-columns: repeat(2, 1fr);

    gap: 14px;

    margin-top: 25px;
}

.academy-profile-meta-item {
    display: flex;
    align-items: center;
    gap: 13px;

    padding: 15px;

    border-radius: 16px;

    background: rgba(255, 255, 255, .38);

    border: 1px solid rgba(70, 125, 175, .15);

    transition: all .35s ease;
}

.academy-profile-meta-item:hover {
    background: rgba(225, 240, 252, .65);

    transform: translateY(-3px);

    box-shadow:
        0 10px 25px rgba(45, 110, 175, .10);
}

.academy-profile-meta-item > i {
    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    background: rgba(44, 117, 180, .12);

    color: #2676b5;

    font-size: 17px;
}

.academy-profile-meta-item small {
    display: block;

    margin-bottom: 3px;

    color: #68829b;

    font-size: 11px;

    text-transform: uppercase;

    letter-spacing: .7px;
}

.academy-profile-meta-item strong {
    display: block;

    color: #173f65;

    font-size: 14px;

    font-weight: 700;
}


/* =========================================================
   SOCIAL LINKS
========================================================= */

.academy-profile-socials {
    display: flex;
    align-items: center;

    gap: 10px;

    margin-top: 30px;
}

.academy-profile-socials a {
    width: 43px;
    height: 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    text-decoration: none;

    color: #315d83;

    background: rgba(255, 255, 255, .45);

    border: 1px solid rgba(55, 110, 165, .18);

    box-shadow:
        0 7px 20px rgba(25, 75, 120, .08);

    transition: all .35s ease;
}

.academy-profile-socials a:hover {
    color: white;

    background: #1d6098;

    transform: translateY(-5px) scale(1.06);

    box-shadow:
        0 10px 25px rgba(25, 100, 170, .25);
}


/* =========================================================
   CONTENT CARDS
========================================================= */

.academy-profile-content-card {
    position: relative;

    padding: 35px;

    border-radius: 24px;

    background:
        linear-gradient(
            145deg,
            rgba(16, 52, 84, .10),
            rgba(255, 255, 255, .48)
        );

    border: 1px solid rgba(55, 110, 165, .22);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    box-shadow:
        0 18px 45px rgba(20, 70, 120, .10);

    transition: all .45s ease;
}

.academy-profile-content-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 25px 55px rgba(25, 85, 140, .17);
}


/* =========================================================
   SECTION TITLE
========================================================= */

.academy-profile-section-title {
    display: flex;
    align-items: center;
    gap: 15px;

    margin-bottom: 25px;
}

.academy-profile-section-title > i {
    width: 52px;
    height: 52px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 15px;

    background: rgba(45, 120, 190, .12);

    color: #2475b4;

    font-size: 22px;

    transition: all .4s ease;
}

.academy-profile-content-card:hover
.academy-profile-section-title > i {
    transform: rotate(-6deg) scale(1.08);
}

.academy-profile-section-title span {
    display: block;

    color: #62809a;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 1px;
}

.academy-profile-section-title h2 {
    margin: 3px 0 0;

    color: #123c61;

    font-size: 25px;

    font-weight: 800;
}


/* =========================================================
   TEXT
========================================================= */

.academy-profile-text {
    color: #4d6478;

    font-size: 15px;

    line-height: 1.9;
}


/* =========================================================
   CLASSES HEADING
========================================================= */

.academy-profile-section-heading {
    margin-bottom: 30px;
}

.academy-profile-section-heading span {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 8px;

    color: #2874ad;

    font-size: 13px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 1px;
}

.academy-profile-section-heading h2 {
    margin: 0 0 8px;

    color: #123c61;

    font-size: 30px;

    font-weight: 800;
}

.academy-profile-section-heading p {
    margin: 0;

    color: #71879a;

    max-width: 700px;
}


/* =========================================================
   CLASS CARDS
========================================================= */

.academy-profile-class-card {
    height: 100%;

    display: flex;
    gap: 18px;

    padding: 25px;

    border-radius: 22px;

    background:
        linear-gradient(
            145deg,
            rgba(17, 54, 87, .09),
            rgba(255, 255, 255, .48)
        );

    border: 1px solid rgba(60, 120, 175, .20);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);

    box-shadow:
        0 15px 35px rgba(20, 70, 120, .08);

    transition: all .4s ease;
}

.academy-profile-class-card:hover {
    transform: translateY(-6px);

    border-color: rgba(50, 120, 190, .35);

    box-shadow:
        0 22px 45px rgba(30, 100, 165, .15),
        0 0 25px rgba(60, 140, 220, .08);
}

.academy-profile-class-icon {
    width: 52px;
    height: 52px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background: rgba(45, 120, 190, .12);

    color: #2778b7;

    font-size: 21px;
}

.academy-profile-class-card > div:last-child > span {
    display: inline-block;

    margin-bottom: 5px;

    color: #7690a5;

    font-size: 11px;

    font-weight: 700;

    letter-spacing: 1px;
}

.academy-profile-class-card h3 {
    margin: 0 0 8px;

    color: #173f63;

    font-size: 20px;

    font-weight: 800;
}

.academy-profile-class-card p {
    margin-bottom: 12px;

    color: #647b8f;

    font-size: 14px;

    line-height: 1.7;
}

.academy-profile-class-card a {
    color: #2774ae;

    font-size: 13px;

    font-weight: 700;

    text-decoration: none;

    transition: all .3s ease;
}

.academy-profile-class-card a:hover {
    color: #124e7d;
}


/* =========================================================
   APPLY SECTION
========================================================= */

.academy-profile-apply {
    display: flex;
    align-items: center;
    gap: 22px;

    padding: 30px;

    border-radius: 25px;

    background:
        linear-gradient(
            135deg,
            rgba(15, 55, 90, .13),
            rgba(225, 239, 250, .60)
        );

    border: 1px solid rgba(50, 110, 170, .22);

    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    box-shadow:
        0 18px 45px rgba(20, 70, 120, .10);
}

.academy-profile-apply > div:first-child {
    width: 60px;
    height: 60px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 18px;

    background: rgba(40, 115, 180, .12);

    color: #2877b6;

    font-size: 25px;
}

.academy-profile-apply > div:nth-child(2) {
    flex: 1;
}

.academy-profile-apply span {
    color: #668198;

    font-size: 12px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: 1px;
}

.academy-profile-apply h2 {
    margin: 4px 0;

    color: #123c61;

    font-size: 23px;

    font-weight: 800;
}

.academy-profile-apply p {
    margin: 0;

    color: #647b8e;

    font-size: 14px;
}

.academy-profile-apply > a {
    display: inline-flex;
    align-items: center;

    padding: 13px 22px;

    border-radius: 14px;

    color: white;

    background: #174f7c;

    text-decoration: none;

    font-weight: 700;

    white-space: nowrap;

    box-shadow:
        0 10px 25px rgba(20, 75, 120, .18);

    transition: all .35s ease;
}

.academy-profile-apply > a:hover {
    background: #0e426a;

    transform: translateY(-3px);

    box-shadow:
        0 15px 30px rgba(20, 75, 120, .25);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .academy-profile-image-card,
    .academy-profile-info-card {
        min-height: auto;
    }

    .academy-profile-image-card img,
    .academy-profile-placeholder {
        min-height: 450px;
    }

    .academy-profile-info-card {
        padding: 35px;
    }

}


@media (max-width: 767px) {

    .academy-instructor-profile-page {
        padding: 50px 0 70px;
    }

    .academy-profile-info-card {
        padding: 28px;
    }

    .academy-profile-meta {
        grid-template-columns: 1fr;
    }

    .academy-profile-content-card {
        padding: 25px;
    }

    .academy-profile-apply {
        flex-direction: column;
        align-items: flex-start;
    }

    .academy-profile-apply > a {
        width: 100%;
        justify-content: center;
    }

}


@media (max-width: 575px) {

    .academy-profile-image-card {
        padding: 10px;
        border-radius: 22px;
    }

    .academy-profile-image-card img,
    .academy-profile-placeholder {
        min-height: 360px;
        border-radius: 17px;
    }

    .academy-profile-info-card {
        border-radius: 22px;
        padding: 22px;
    }

    .academy-profile-info-card h1 {
        font-size: 32px;
    }

    .academy-profile-class-card {
        padding: 20px;
    }

}
</style>

<section class="academy-instructor-profile-page">

    <div class="container">


        {{-- =====================================================
             BACK
        ====================================================== --}}

        <div class="mb-4">

            <a
                href="{{ route('academy.instructors') }}"
                class="text-decoration-none"
            >

                <i class="bi bi-arrow-left me-2"></i>

                {{ __('Back to Instructors') }}

            </a>

        </div>



        {{-- =====================================================
             PROFILE HERO
        ====================================================== --}}

        <div class="row g-4 align-items-stretch">


            {{-- =================================================
                 PROFILE IMAGE
            ================================================== --}}

            <div class="col-lg-4">

                <div class="academy-profile-image-card">

                    @if($teacher->profile_image)

                        <img
                            src="{{ asset('storage/' . $teacher->profile_image) }}"
                            alt="{{ $teacher->first_name }} {{ $teacher->last_name }}"
                        >

                    @else

                        <div class="academy-profile-placeholder">

                            <i class="bi bi-person-fill"></i>

                        </div>

                    @endif


                    <div class="academy-profile-image-overlay"></div>

                </div>

            </div>



            {{-- =================================================
                 PROFILE INFORMATION
            ================================================== --}}

            <div class="col-lg-8">

                <div class="academy-profile-info-card">


                    @if($teacher->position)

                        <span class="academy-profile-position">

                            <i class="bi bi-award-fill me-2"></i>

                            {{ $teacher->position }}

                        </span>

                    @endif


                    <h1>

                        {{ $teacher->first_name }}

                        {{ $teacher->last_name }}

                    </h1>


                    @if($departmentTitle)

                        <div class="academy-profile-department">

                            <i class="bi bi-mortarboard-fill"></i>

                            <span>

                                {{ __('Department of') }}

                                {{ $departmentTitle }}

                            </span>

                        </div>

                    @endif


                    {{-- =================================================
                         QUICK INFORMATION
                    ================================================== --}}

                    <div class="academy-profile-meta">


                        @if($teacher->experience)

                            <div class="academy-profile-meta-item">

                                <i class="bi bi-briefcase-fill"></i>

                                <div>

                                    <small>
                                        {{ __('Experience') }}
                                    </small>

                                    <strong>
                                        {{ $teacher->experience }}
                                    </strong>

                                </div>

                            </div>

                        @endif


                        @if($teacher->education)

                            <div class="academy-profile-meta-item">

                                <i class="bi bi-book-half"></i>

                                <div>

                                    <small>
                                        {{ __('Education') }}
                                    </small>

                                    <strong>
                                        {{ $teacher->education }}
                                    </strong>

                                </div>

                            </div>

                        @endif


                        @if($teacher->email)

                            <div class="academy-profile-meta-item">

                                <i class="bi bi-envelope-fill"></i>

                                <div>

                                    <small>
                                        {{ __('Email') }}
                                    </small>

                                    <strong>
                                        {{ $teacher->email }}
                                    </strong>

                                </div>

                            </div>

                        @endif


                    </div>



                    {{-- =================================================
                         SOCIAL LINKS
                    ================================================== --}}

                    <div class="academy-profile-socials">


                        @if($teacher->facebook_url)

                            <a
                                href="{{ $teacher->facebook_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                title="Facebook"
                            >

                                <i class="fab fa-facebook-f"></i>

                            </a>

                        @endif


                        @if($teacher->linkedin_url)

                            <a
                                href="{{ $teacher->linkedin_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                title="LinkedIn"
                            >

                                <i class="fab fa-linkedin-in"></i>

                            </a>

                        @endif


                        @if($teacher->youtube_url)

                            <a
                                href="{{ $teacher->youtube_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                title="YouTube"
                            >

                                <i class="fab fa-youtube"></i>

                            </a>

                        @endif


                        @if($teacher->website_url)

                            <a
                                href="{{ $teacher->website_url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                title="Website"
                            >

                                <i class="fas fa-globe"></i>

                            </a>

                        @endif

                    </div>


                </div>

            </div>

        </div>



        {{-- =====================================================
             BIOGRAPHY + EDUCATION
        ====================================================== --}}

        <div class="row g-4 mt-4">


            {{-- =================================================
                 BIOGRAPHY
            ================================================== --}}

            @if($teacher->biography)

                <div class="col-lg-7">

                    <div class="academy-profile-content-card">

                        <div class="academy-profile-section-title">

                            <i class="bi bi-person-lines-fill"></i>

                            <div>

                                <span>
                                    {{ __('About the Instructor') }}
                                </span>

                                <h2>
                                    {{ __('Biography') }}
                                </h2>

                            </div>

                        </div>


                        <div class="academy-profile-text">

                            {!! nl2br(e($teacher->biography)) !!}

                        </div>

                    </div>

                </div>

            @endif



            {{-- =================================================
                 EDUCATION
            ================================================== --}}

            @if($teacher->education)

                <div class="col-lg-5">

                    <div class="academy-profile-content-card">

                        <div class="academy-profile-section-title">

                            <i class="bi bi-mortarboard-fill"></i>

                            <div>

                                <span>
                                    {{ __('Academic Background') }}
                                </span>

                                <h2>
                                    {{ __('Education') }}
                                </h2>

                            </div>

                        </div>


                        <div class="academy-profile-text">

                            {!! nl2br(e($teacher->education)) !!}

                        </div>

                    </div>

                </div>

            @endif

        </div>



        {{-- =====================================================
             EXPERIENCE
        ====================================================== --}}

        @if($teacher->experience)

            <div class="academy-profile-content-card mt-4">

                <div class="academy-profile-section-title">

                    <i class="bi bi-briefcase-fill"></i>

                    <div>

                        <span>
                            {{ __('Professional Background') }}
                        </span>

                        <h2>
                            {{ __('Experience') }}
                        </h2>

                    </div>

                </div>


                <div class="academy-profile-text">

                    {!! nl2br(e($teacher->experience)) !!}

                </div>

            </div>

        @endif



        {{-- =====================================================
             CLASSES
        ====================================================== --}}

        @if($teacher->classes->count())

            <section class="mt-5">

                <div class="academy-profile-section-heading">

                    <span>

                        <i class="bi bi-journal-bookmark-fill"></i>

                        {{ __('Academic Classes') }}

                    </span>

                    <h2>

                        {{ __('Classes Taught by This Instructor') }}

                    </h2>

                    <p>

                        {{ __('Explore the academic classes currently taught by this instructor.') }}

                    </p>

                </div>


                <div class="row g-4">

                    @foreach($teacher->classes as $class)

                        @php

                            $classTranslation =
                                $class->translations->first();

                        @endphp


                        <div class="col-lg-6">

                            <div class="academy-profile-class-card">

                                <div class="academy-profile-class-icon">

                                    <i class="bi bi-book-half"></i>

                                </div>


                                <div>

                                    <span>

                                        {{ $class->class_code }}

                                    </span>


                                    <h3>

                                        {{ $classTranslation?->title
                                            ?? __('Untitled Class') }}

                                    </h3>


                                    @if($classTranslation?->short_description)

                                        <p>

                                            {{ $classTranslation->short_description }}

                                        </p>

                                    @endif


                                    <a
                                        href="{{ route('academy.course.show', $class->id) }}"
                                    >

                                        {{ __('View Class') }}

                                        <i class="bi bi-arrow-right ms-2"></i>

                                    </a>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            </section>

        @endif



        {{-- =====================================================
             APPLY
        ====================================================== --}}

        <div class="academy-profile-apply mt-5">

            <div>

                <i class="bi bi-mortarboard-fill"></i>

            </div>

            <div>

                <span>
                    {{ __('Join Our Academy') }}
                </span>

                <h2>
                    {{ __('Start Your Academic Journey') }}
                </h2>

                <p>
                    {{ __('Explore our academic programs and take the next step toward your professional development.') }}
                </p>

            </div>

            <a href="{{ route('academy.apply') }}">

                {{ __('Apply Now') }}

                <i class="bi bi-arrow-right ms-2"></i>

            </a>

        </div>


    </div>

</section>

@endsection
@extends('layouts.website')
<style>
    /* =========================================================
   ACADEMY COURSES PAGE
========================================================= */

.academy-courses-page {
    position: relative;
    padding: 70px 0 90px;
    overflow: hidden;
    background: #ffffff;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.academy-courses-back {
    margin-bottom: 30px;
}

.academy-courses-back a {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 10px 18px;

    color: #123b68;
    text-decoration: none;

    background: rgba(255, 255, 255, 0.72);
    border: 1px solid rgba(20, 76, 130, 0.18);
    border-radius: 14px;

    box-shadow:
        0 8px 25px rgba(30, 90, 150, 0.08);

    transition: all 0.35s ease;
}

.academy-courses-back a:hover {
    transform: translateX(-5px);

    color: #0b3157;

    box-shadow:
        0 12px 30px rgba(45, 105, 180, 0.18);
}


/* =========================================================
   HEADER
========================================================= */

.academy-courses-header {
    position: relative;

    display: flex;
    align-items: center;
    gap: 28px;

    max-width: 1000px;
    margin: 0 auto 70px;
    padding: 38px 42px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            rgba(12, 48, 82, 0.10),
            rgba(35, 93, 145, 0.07)
        );

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    border: 1px solid rgba(30, 78, 125, 0.20);
    border-radius: 28px;

    box-shadow:
        0 20px 55px rgba(20, 65, 110, 0.13),
        inset 0 1px 0 rgba(255, 255, 255, 0.85);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease;
}

.academy-courses-header:hover {
    transform: translateY(-5px);

    box-shadow:
        0 28px 70px rgba(35, 92, 155, 0.20),
        0 0 35px rgba(82, 124, 190, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.9);
}


/* HEADER GLOW */

.academy-courses-header-glow {
    position: absolute;

    width: 230px;
    height: 230px;

    top: -120px;
    right: -70px;

    background: rgba(71, 104, 190, 0.18);

    border-radius: 50%;

    filter: blur(45px);

    pointer-events: none;
}


/* HEADER ICON */

.academy-courses-header-icon {
    position: relative;
    z-index: 2;

    flex: 0 0 90px;

    width: 90px;
    height: 90px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 25px;

    background:
        linear-gradient(
            145deg,
            rgba(20, 63, 105, 0.90),
            rgba(43, 99, 150, 0.76)
        );

    border: 1px solid rgba(255, 255, 255, 0.45);

    box-shadow:
        0 15px 35px rgba(20, 72, 125, 0.28),
        inset 0 1px 1px rgba(255, 255, 255, 0.35);

    transition: all 0.4s ease;
}

.academy-courses-header:hover .academy-courses-header-icon {
    transform: rotate(-5deg) scale(1.07);

    box-shadow:
        0 18px 40px rgba(48, 100, 175, 0.32),
        0 0 25px rgba(91, 132, 210, 0.22);
}

.academy-courses-header-icon i {
    font-size: 38px;
    color: #dcecff;
}


/* HEADER TEXT */

.academy-courses-header-content {
    position: relative;
    z-index: 2;
}

.academy-courses-header-content > span {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 8px;

    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;

    color: #315f8d;
}

.academy-courses-header-content h1 {
    margin: 0 0 12px;

    font-size: clamp(32px, 4vw, 48px);
    font-weight: 800;

    color: #102f4d;
    letter-spacing: -0.5px;
}

.academy-courses-header-content p {
    max-width: 720px;
    margin: 0;

    font-size: 16px;
    line-height: 1.9;

    color: #526b82;
}


/* =========================================================
   SECTION HEADING
========================================================= */

.academy-courses-section {
    position: relative;
}

.academy-section-heading {
    max-width: 760px;
    margin: 0 auto 45px;
    text-align: center;
}

.academy-section-heading > span {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 10px;

    font-size: 13px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;

    color: #3d6f9e;
}

.academy-section-heading h2 {
    margin: 0 0 12px;

    font-size: 32px;
    font-weight: 800;

    color: #102f4d;
}

.academy-section-heading p {
    margin: 0;

    color: #687d91;
    line-height: 1.8;
}


/* =========================================================
   COURSE CARD
========================================================= */

.academy-course-card {
    position: relative;

    display: flex;
    gap: 24px;

    height: 100%;
    min-height: 290px;

    padding: 30px;

    overflow: hidden;

    background:
        linear-gradient(
            145deg,
            rgba(18, 55, 91, 0.095),
            rgba(255, 255, 255, 0.82)
        );

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    border: 1px solid rgba(28, 76, 122, 0.20);
    border-radius: 25px;

    box-shadow:
        0 14px 40px rgba(23, 70, 115, 0.11),
        inset 0 1px 0 rgba(255, 255, 255, 0.90);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease,
        border-color 0.45s ease;
}


/* COLORED GLOW */

.academy-course-card::before {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    top: -70px;
    right: -50px;

    border-radius: 50%;

    background: rgba(79, 113, 192, 0.15);

    filter: blur(35px);

    transition: all 0.45s ease;

    pointer-events: none;
}


/* SMALL ORANGE GLOW */

.academy-course-card::after {
    content: "";

    position: absolute;

    width: 90px;
    height: 90px;

    bottom: -45px;
    left: 20px;

    border-radius: 50%;

    background: rgba(235, 153, 77, 0.09);

    filter: blur(30px);

    pointer-events: none;
}


/* HOVER */

.academy-course-card:hover {
    transform: translateY(-10px);

    border-color: rgba(48, 104, 165, 0.32);

    box-shadow:
        0 25px 55px rgba(30, 83, 140, 0.18),
        0 0 35px rgba(74, 117, 190, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.95);
}

.academy-course-card:hover::before {
    transform: scale(1.5);

    background: rgba(72, 111, 202, 0.22);
}


/* =========================================================
   COURSE ICON
========================================================= */

.academy-course-icon {
    position: relative;
    z-index: 2;

    flex: 0 0 62px;

    width: 62px;
    height: 62px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 19px;

    background:
        linear-gradient(
            145deg,
            rgba(22, 69, 113, 0.90),
            rgba(50, 105, 157, 0.78)
        );

    border: 1px solid rgba(255, 255, 255, 0.55);

    box-shadow:
        0 10px 25px rgba(24, 72, 120, 0.23),
        inset 0 1px 1px rgba(255, 255, 255, 0.30);

    transition:
        transform 0.45s ease,
        box-shadow 0.45s ease;
}

.academy-course-card:hover .academy-course-icon {
    transform: translateY(-5px) rotate(-6deg) scale(1.08);

    box-shadow:
        0 15px 30px rgba(42, 94, 165, 0.30),
        0 0 22px rgba(91, 130, 200, 0.18);
}

.academy-course-icon i {
    font-size: 27px;
    color: #dcecff;
}


/* =========================================================
   COURSE CONTENT
========================================================= */

.academy-course-content {
    position: relative;
    z-index: 2;

    flex: 1;
}

.academy-course-department {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    margin-bottom: 8px;

    font-size: 12px;
    font-weight: 700;

    color: #52779a;
}

.academy-course-code {
    display: inline-block;

    margin-bottom: 10px;
    padding: 5px 11px;

    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;

    color: #365f84;

    background: rgba(75, 119, 164, 0.09);

    border: 1px solid rgba(65, 110, 158, 0.13);
    border-radius: 8px;
}

.academy-course-content h3 {
    margin: 0 0 10px;

    font-size: 23px;
    font-weight: 800;

    color: #173c5e;

    transition: color 0.3s ease;
}

.academy-course-card:hover .academy-course-content h3 {
    color: #245b8d;
}

.academy-course-content > p {
    margin: 0 0 18px;

    font-size: 14px;
    line-height: 1.8;

    color: #60778b;
}


/* =========================================================
   COURSE META
========================================================= */

.academy-course-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;

    margin-bottom: 22px;
}

.academy-course-meta span {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 7px 10px;

    font-size: 12px;

    color: #557086;

    background: rgba(255, 255, 255, 0.48);

    border: 1px solid rgba(40, 87, 132, 0.11);
    border-radius: 9px;
}

.academy-course-meta i {
    color: #4479a8;
}


/* =========================================================
   VIEW COURSE
========================================================= */

.academy-course-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    font-size: 13px;
    font-weight: 700;

    color: #245c8e;
    text-decoration: none;

    transition: all 0.3s ease;
}

.academy-course-link i {
    transition: transform 0.3s ease;
}

.academy-course-link:hover {
    color: #123e65;
}

.academy-course-link:hover i {
    transform: translateX(5px);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.academy-courses-empty {
    max-width: 620px;
    margin: 20px auto 70px;
    padding: 55px 35px;

    text-align: center;

    background:
        linear-gradient(
            145deg,
            rgba(18, 55, 91, 0.075),
            rgba(255, 255, 255, 0.82)
        );

    backdrop-filter: blur(15px);

    border: 1px solid rgba(30, 77, 123, 0.17);
    border-radius: 25px;

    box-shadow:
        0 15px 40px rgba(30, 80, 130, 0.10);
}

.academy-courses-empty-icon {
    width: 75px;
    height: 75px;

    margin: 0 auto 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 22px;

    background: rgba(31, 78, 122, 0.10);

    color: #356b98;
}

.academy-courses-empty-icon i {
    font-size: 32px;
}

.academy-courses-empty h3 {
    color: #183d5e;
    font-weight: 800;
}

.academy-courses-empty p {
    color: #6b7f90;
}


/* =========================================================
   EMPTY BUTTON
========================================================= */

.academy-courses-empty-button {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-top: 15px;
    padding: 11px 20px;

    color: white;
    text-decoration: none;

    background: #234f78;

    border-radius: 12px;

    box-shadow:
        0 10px 25px rgba(32, 78, 124, 0.20);

    transition: all 0.3s ease;
}

.academy-courses-empty-button:hover {
    color: white;

    transform: translateY(-3px);

    box-shadow:
        0 15px 30px rgba(39, 91, 148, 0.28);
}


/* =========================================================
   CTA
========================================================= */

.academy-courses-cta {
    position: relative;

    display: flex;
    align-items: center;
    gap: 25px;

    margin-top: 80px;
    padding: 35px 40px;

    overflow: hidden;

    background:
        linear-gradient(
            135deg,
            rgba(19, 56, 92, 0.13),
            rgba(65, 105, 150, 0.08)
        );

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    border: 1px solid rgba(34, 83, 132, 0.19);
    border-radius: 26px;

    box-shadow:
        0 18px 45px rgba(25, 72, 118, 0.12);
}

.academy-courses-cta-glow {
    position: absolute;

    width: 220px;
    height: 220px;

    right: -90px;
    bottom: -120px;

    border-radius: 50%;

    background: rgba(82, 108, 190, 0.13);

    filter: blur(45px);
}

.academy-courses-cta-icon {
    position: relative;
    z-index: 2;

    flex: 0 0 65px;

    width: 65px;
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 20px;

    background: rgba(25, 69, 109, 0.90);

    box-shadow:
        0 12px 28px rgba(24, 72, 120, 0.23);
}

.academy-courses-cta-icon i {
    font-size: 28px;
    color: #e0efff;
}

.academy-courses-cta-content {
    position: relative;
    z-index: 2;

    flex: 1;
}

.academy-courses-cta-content span {
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 1.3px;
    text-transform: uppercase;

    color: #4b7599;
}

.academy-courses-cta-content h2 {
    margin: 5px 0 7px;

    font-size: 25px;
    font-weight: 800;

    color: #173c5c;
}

.academy-courses-cta-content p {
    margin: 0;

    color: #61778a;
    line-height: 1.7;
}


/* =========================================================
   CTA BUTTON
========================================================= */

.academy-courses-cta-button {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;
    gap: 9px;

    flex-shrink: 0;

    padding: 13px 22px;

    color: white;
    text-decoration: none;

    background:
        linear-gradient(
            135deg,
            #234f78,
            #356e9e
        );

    border: 1px solid rgba(255, 255, 255, 0.35);
    border-radius: 13px;

    box-shadow:
        0 12px 28px rgba(30, 77, 124, 0.22);

    transition: all 0.35s ease;
}

.academy-courses-cta-button:hover {
    color: white;

    transform: translateY(-4px);

    box-shadow:
        0 18px 35px rgba(40, 92, 150, 0.30);
}

.academy-courses-cta-button i {
    transition: transform 0.3s ease;
}

.academy-courses-cta-button:hover i {
    transform: translateX(5px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 991px) {

    .academy-courses-header {
        padding: 32px;
    }

    .academy-course-card {
        min-height: auto;
    }

    .academy-courses-cta {
        flex-wrap: wrap;
    }

}


@media (max-width: 767px) {

    .academy-courses-page {
        padding: 45px 0 60px;
    }

    .academy-courses-header {
        flex-direction: column;
        align-items: flex-start;

        padding: 28px;
        margin-bottom: 50px;
    }

    .academy-courses-header-icon {
        width: 72px;
        height: 72px;
        flex-basis: 72px;
    }

    .academy-courses-header-icon i {
        font-size: 30px;
    }

    .academy-course-card {
        flex-direction: column;
        padding: 25px;
    }

    .academy-course-icon {
        width: 58px;
        height: 58px;
        flex-basis: 58px;
    }

    .academy-courses-cta {
        align-items: flex-start;
        padding: 28px;
    }

    .academy-courses-cta-button {
        width: 100%;
        justify-content: center;
    }

}


@media (max-width: 480px) {

    .academy-courses-header-content h1 {
        font-size: 31px;
    }

    .academy-section-heading h2 {
        font-size: 27px;
    }

    .academy-course-content h3 {
        font-size: 21px;
    }

    .academy-course-meta {
        flex-direction: column;
        align-items: flex-start;
    }

}
</style>

@section('content')


<section class="academy-courses-page">


    <div class="container">


        {{-- =====================================================
             BACK TO ACADEMY
        ====================================================== --}}

        <div class="academy-courses-back">

            <a href="{{ route('academy') }}">

                <i class="bi bi-arrow-left"></i>

                {{ __('Back to Academy') }}

            </a>

        </div>



        {{-- =====================================================
             HERO / PAGE HEADER
        ====================================================== --}}

        <div class="academy-courses-header">


            <div class="academy-courses-header-glow"></div>


            <div class="academy-courses-header-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>


            <div class="academy-courses-header-content">

                <span>

                    <i class="bi bi-book-half"></i>

                    {{ __('Academy') }}

                </span>


                <h1>

                    {{ __('Academic Courses') }}

                </h1>


                <p>

                    {{ __('Explore the courses currently offered by our academic departments and discover opportunities for learning and professional development.') }}

                </p>

            </div>


        </div>



        {{-- =====================================================
             COURSES
        ====================================================== --}}

        <section class="academy-courses-section">


            <div class="academy-section-heading">

                <span>

                    <i class="bi bi-journal-bookmark-fill"></i>

                    {{ __('Our Courses') }}

                </span>


                <h2>

                    {{ __('Explore Our Courses') }}

                </h2>


                <p>

                    {{ __('Discover our available academic courses and find the program that matches your goals.') }}

                </p>

            </div>



            @if($classes->count())


                <div class="row g-4">


                    @foreach($classes as $class)


                        @php

                            $translation =
                                $class->translations->first();

                            $title =
                                $translation?->title
                                ?? __('Untitled Course');

                            $shortDescription =
                                $translation?->short_description
                                ?? '';

                            $departmentTranslation =
                                $class->department?->translations->first();

                            $departmentTitle =
                                $departmentTranslation?->title
                                ?? __('Academic Department');

                        @endphp


                        <div class="col-lg-6">


                            <article class="academy-course-card">


                                {{-- CARD ICON --}}

                                <div class="academy-course-icon">

                                    <i class="bi bi-book-half"></i>

                                </div>



                                {{-- COURSE CONTENT --}}

                                <div class="academy-course-content">


                                    {{-- DEPARTMENT --}}

                                    <div class="academy-course-department">

                                        <i class="bi bi-diagram-3"></i>

                                        {{ $departmentTitle }}

                                    </div>



                                    {{-- COURSE CODE --}}

                                    @if($class->class_code)

                                        <div class="academy-course-code">

                                            {{ $class->class_code }}

                                        </div>

                                    @endif



                                    {{-- TITLE --}}

                                    <h3>

                                        {{ $title }}

                                    </h3>



                                    {{-- DESCRIPTION --}}

                                    @if($shortDescription)

                                        <p>

                                            {{ $shortDescription }}

                                        </p>

                                    @endif



                                    {{-- META --}}

                                    <div class="academy-course-meta">


                                        @if($class->teacher)

                                            <span>

                                                <i class="bi bi-person-badge"></i>

                                                {{ $class->teacher->first_name }}
                                                {{ $class->teacher->last_name }}

                                            </span>

                                        @endif



                                        @if($class->start_date)

                                            <span>

                                                <i class="bi bi-calendar3"></i>

                                                {{ \Carbon\Carbon::parse($class->start_date)->format('M d, Y') }}

                                            </span>

                                        @endif



                                        @if($class->room)

                                            <span>

                                                <i class="bi bi-geo-alt"></i>

                                                {{ $class->room }}

                                            </span>

                                        @endif


                                    </div>



                                    {{-- VIEW COURSE --}}

                                    <a
                                        href="{{ route('academy.course.show', $class->id) }}"
                                        class="academy-course-link"
                                    >

                                        {{ __('View Course') }}

                                        <i class="bi bi-arrow-right"></i>

                                    </a>


                                </div>


                            </article>


                        </div>


                    @endforeach


                </div>


            @else


                {{-- =================================================
                     EMPTY STATE
                ================================================== --}}

                <div class="academy-courses-empty">


                    <div class="academy-courses-empty-icon">

                        <i class="bi bi-journal-x"></i>

                    </div>


                    <h3>

                        {{ __('No Courses Available') }}

                    </h3>


                    <p>

                        {{ __('There are currently no active courses available.') }}

                    </p>


                    <a
                        href="{{ route('academy') }}"
                        class="academy-courses-empty-button"
                    >

                        {{ __('Back to Academy') }}

                        <i class="bi bi-arrow-right"></i>

                    </a>


                </div>


            @endif


        </section>



        {{-- =====================================================
             BOTTOM CTA
        ====================================================== --}}

        <section class="academy-courses-cta">


            <div class="academy-courses-cta-glow"></div>


            <div class="academy-courses-cta-icon">

                <i class="bi bi-mortarboard-fill"></i>

            </div>


            <div class="academy-courses-cta-content">

                <span>

                    {{ __('Start Your Academic Journey') }}

                </span>


                <h2>

                    {{ __('Ready to Learn With Us?') }}

                </h2>


                <p>

                    {{ __('Explore our academic opportunities and take the next step toward your professional development.') }}

                </p>

            </div>


            <a
                href="{{ route('academy.apply') }}"
                class="academy-courses-cta-button"
            >

                {{ __('Apply Now') }}

                <i class="bi bi-arrow-right"></i>

            </a>


        </section>


    </div>


</section>


@endsection
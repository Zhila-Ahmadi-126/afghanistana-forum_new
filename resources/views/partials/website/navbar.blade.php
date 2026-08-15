<!-- Navbar Start -->

<style>

    /* =========================================================
       GLASS NAVBAR
    ========================================================= */

     .glass-box {
        background:  rgba(2, 9, 112, 0.289);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        border: 1px solid rgba(255, 255, 255, 0.7);
        border-radius: 20px;

        box-shadow:
            0 20px 55px rgba(0, 0, 0, 0.356),
            inset 0 1px 0 rgba(255, 255, 255, 0.421);

        padding: 30px;
        color: white;
    }

    /* =========================================================
       NAVBAR POSITION
    ========================================================= */

    .mynavbarr {
        position: fixed;
        top: 70px;
        left: 0;
        width: 100%;
        z-index: 1100;

        transition: top 0.4s ease;
    }

    .mynavbarr.nav-scrolled {
        top: 0;
    }


    /* =========================================================
       NORMAL NAV LINKS
    ========================================================= */

    .mynavbarr .nav-link {
        color: #ffffff !important;
        font-weight: 500;

        border-radius: 18px;
        padding: 10px 14px !important;

        transition:
            color 0.3s ease,
            background 0.3s ease,
            box-shadow 0.3s ease,
            transform 0.3s ease;
    }


    /* Hover */

    .mynavbarr .nav-link:hover {
        color: #ffffff !important;

        background:
            linear-gradient(
                135deg,
                rgba(62, 142, 197, 0.32),
                rgba(91, 76, 150, 0.32)
            );

        transform: translateY(-1px);
    }


    /* =========================================================
       ACTIVE NAV LINK
       Blue + Dark Blue + Soft Purple
    ========================================================= */

    .mynavbarr .nav-link.active,
    .mynavbarr .nav-link.content-active {

        color: #ffffff !important;

        background:
            linear-gradient(
                135deg,
                rgba(35, 112, 168, 0.92),
                rgba(30, 65, 105, 0.92),
                rgba(91, 76, 150, 0.90)
            );

        border: 1px solid rgba(255,255,255,0.35);

        box-shadow:
            0 7px 20px rgba(25, 75, 120, 0.28);

        font-weight: 600;
    }


    /* =========================================================
       DROPDOWN
    ========================================================= */

    .mynavbarr .dropdown-menu {
        background: rgba(18, 28, 42, 0.96);

        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        border: 1px solid rgba(255,255,255,0.25);
        border-radius: 15px;

        box-shadow:
            0 15px 35px rgba(0,0,0,0.25);

        padding: 8px;
    }


    .mynavbarr .dropdown-item {
        color: white;

        border-radius: 10px;
        padding: 9px 14px;

        transition:
            background 0.3s ease,
            color 0.3s ease,
            transform 0.3s ease;
    }


    .mynavbarr .dropdown-item:hover {
        color: white;

        background:
            linear-gradient(
                135deg,
                rgba(45, 117, 170, 0.45),
                rgba(92, 77, 150, 0.45)
            );

        transform: translateX(3px);
    }


    /* =========================================================
       ACTIVE DROPDOWN TITLE
    ========================================================= */

    .mynavbarr .dropdown > .nav-link.active {
        color: white !important;

        background:
            linear-gradient(
                135deg,
                rgba(35, 112, 168, 0.92),
                rgba(30, 65, 105, 0.92),
                rgba(91, 76, 150, 0.90)
            );
    }


    /* =========================================================
       DONATION BUTTON
    ========================================================= */

    .donation-nav-btn {

        display: inline-flex;
        align-items: center;
        gap: 7px;

        color: white !important;

        background:
            linear-gradient(
                135deg,
                #2777a8,
                #214d79,
                #66558f
            );

        border: 1px solid rgba(255,255,255,0.55);

        border-radius: 30px;

        padding: 9px 17px;

        font-weight: 600;

        box-shadow:
            0 8px 22px rgba(30, 70, 110, 0.25);

        transition:
            transform 0.3s ease,
            box-shadow 0.3s ease,
            background 0.3s ease;
    }


    .donation-nav-btn:hover,
    .donation-nav-btn.active {

        color: white !important;

        background:
            linear-gradient(
                135deg,
                #328cc1,
                #234f7d,
                #735fa0
            );

        transform: translateY(-2px);

        box-shadow:
            0 12px 28px rgba(45, 100, 150, 0.30);
    }


    /* =========================================================
       MY PROFILE
       NO ORANGE / NO YELLOW
    ========================================================= */

    .my-profile-box {

        border-radius: 40px;

        border: 2px solid rgba(255,255,255,0.8);

        background:
            linear-gradient(
                135deg,
                #102a43 0%,
                #1769aa 30%,
                #328cc1 50%,
                #62558d 72%,
                #4d4078 100%
            );

        box-shadow:
            0 10px 30px rgba(0,0,0,0.20);
    }


    .profile-trigger {
        color: white !important;
    }


    .profile-trigger p {
        color: white !important;
    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 991.98px) {

        .mynavbarr {
            position: relative;
            top: 0;
        }

        .mynavbarr.nav-scrolled {
            top: 0;
        }

        .glass-box {
            padding: 15px;
        }

        .my-profile-box {
            margin-top: 15px;
            margin-right: 0 !important;
        }

        .donation-nav-btn {
            margin-top: 8px;
            margin-bottom: 8px;
        }

    }

</style>


<div class="container-fluid nav-bar text-light mynavbarr">

    <nav
        class="navbar navbar-expand-lg p-3 py-lg-0 px-lg-4 glass-box text-light"
        style="border-radius: 40px; border: 2px solid white;"
    >

        <!-- Mobile Logo -->

        


        <!-- Mobile Toggle -->

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
        >

            <span class="fa fa-bars text-white"></span>

        </button>


        <div class="collapse navbar-collapse" id="navbarCollapse">


            <div class="navbar-nav me-auto">


                <!-- HOME -->

                <a
                    href="{{ route('index') }}"
                    class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}"
                >
                    {{ __('navbar_website.home') }}
                </a>


                <!-- ABOUT -->

                <a
                    href="{{ route('about') }}"
                    class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}"
                >
                    {{ __('navbar_website.about') }}
                </a>


                <!-- SERVICES -->

                <a
                    href="{{ route('services') }}"
                    class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}"
                >
                    {{ __('navbar_website.services') }}
                </a>


                <!-- =====================================================
                     ACADEMY DROPDOWN — RESTORED
                ====================================================== -->

                <div class="nav-item dropdown">

                    <a
                        href="{{ route('academy') }}"
                        class="nav-link dropdown-toggle
                        {{ request()->routeIs('academy*') ? 'active' : '' }}"
                        data-bs-toggle="dropdown"
                    >

                        {{ __('navbar_website.academy') }}

                    </a>


                    <div class="dropdown-menu fade-up m-0">


                        <!-- Academy Home -->

                        <a
                            href="{{ route('academy') }}"
                            class="dropdown-item"
                        >
                            Home
                        </a>


                        <!-- Programs / Departments -->

                        <a
                            href="{{ route('academy.programs') }}"
                            class="dropdown-item"
                        >
                            Departments
                        </a>


                        <!-- Courses -->

                        <a
                            href="{{ route('academy.courses') }}"
                            class="dropdown-item"
                        >
                            courses
                        </a>


                        <!-- Instructors -->

                        <a
                            href="{{ route('academy.instructors') }}"
                            class="dropdown-item"
                        >
                            instructors
                        </a>


                        <!-- Schedule -->

                        <a
                            href="{{ route('academy.schedule') }}"
                            class="dropdown-item"
                        >
                            schedule
                        </a>


                        <!-- Resources -->

                        <a
                            href="{{ route('academy.resources') }}"
                            class="dropdown-item"
                        >
                            resources
                        </a>


                        <!-- Apply -->

                        <a
                            href="{{ route('academy.apply') }}"
                            class="dropdown-item"
                        >
                            apply_now
                        </a>


                    </div>

                </div>


                <!-- =====================================================
                     LEGAL SYSTEM DROPDOWN — RESTORED
                ====================================================== -->

                 <a
                    href="{{ route('legal-system') }}"
                    class="nav-item nav-link {{ request()->routeIs('legal-system*') ? 'active' : '' }}"
                >
                     {{ __('navbar_website.legal_system') }}
                </a>

               


                <!-- =====================================================
                     CONTENT DROPDOWN
                ====================================================== -->

                <div class="nav-item dropdown">

                    <a
                        href="#"
                        class="nav-link dropdown-toggle
                        {{
                            request()->routeIs('news.*')
                            || request()->routeIs('website.media.*')
                            || request()->routeIs('announcements')
                            || request()->routeIs('website.announcement.*')
                            || request()->routeIs('website.activity-reports.*')
                            ? 'content-active'
                            : ''
                        }}"
                        data-bs-toggle="dropdown"
                    >

                        Content

                    </a>


                    <div class="dropdown-menu fade-up m-0">


                        <!-- News -->

                        <a
                            href="{{ route('news.index') }}"
                            class="dropdown-item"
                        >
                            <i class="fa fa-newspaper me-2"></i>
                            News
                        </a>


                        <!-- Media -->

                        <a
                            href="{{ route('website.media.index') }}"
                            class="dropdown-item"
                        >
                            <i class="fa fa-photo-video me-2"></i>
                            Media
                        </a>


                        <!-- Announcements -->

                        <a
                            href="{{ route('announcements') }}"
                            class="dropdown-item"
                        >
                            <i class="fa fa-bullhorn me-2"></i>
                            Announcements
                        </a>


                        <!-- 24 Hour Reports -->

                        <a
                            href="{{ route('website.activity-reports.index') }}"
                            class="dropdown-item"
                        >
                            <i class="fa fa-chart-line me-2"></i>
                            24-Hour Reports
                        </a>


                    </div>

                </div>


                <!-- ARCHIVE -->

                <a
                    href="{{ route('archive') }}"
                    class="nav-item nav-link
                    {{
                        request()->routeIs('archive*')
                        || request()->routeIs('website.archive*')
                        ? 'active'
                        : ''
                    }}"
                >
                    {{ __('navbar_website.archive') }}
                </a>


                <!-- CONTACT -->

                <a
                    href="{{ route('contact') }}"
                    class="nav-item nav-link {{ request()->routeIs('contact*') ? 'active' : '' }}"
                >
                    {{ __('navbar_website.contact') }}
                </a>


                <!-- DONATION -->

                <a
                    href="{{ route('donation') }}"
                    class="donation-nav-btn
                    {{
                        request()->routeIs('donation*')
                        ? 'active'
                        : ''
                    }}"
                >

                    <i class="fa fa-heart"></i>

                    <span>Donation</span>

                </a>


            </div>

           


            <!-- =========================================================
                 MY PROFILE
            ========================================================== -->

            <div
                class="dropdown mt-4 mt-lg-0 me-lg-n4 py-3 px-4 my-profile-box"
            >


                <!-- PROFILE BUTTON -->

                <button
                    type="button"
                    class="btn p-0 d-flex align-items-center border-0 shadow-none profile-trigger"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >

                    <div
                        class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white"
                        style="
                            width:45px;
                            height:45px;
                            border-radius:50%;
                        "
                    >

                        <i class="fa fa-user text-primary"></i>

                    </div>


                    <div class="ms-3 text-start">

                        <p class="mb-1">
                            {{ __('My Profile') }}
                        </p>

                    </div>

                </button>


                <!-- PROFILE DROPDOWN -->

                <ul
                    class="dropdown-menu dropdown-menu-end shadow border-0 mt-3"
                    style="
                        min-width:180px;
                        border-radius:15px;
                        padding:8px;
                    "
                >


                    <!-- LOGIN -->

                    @if(!session()->has('academy_student_id'))

                        <li>

                            <a
                                href="{{ route('academy.student.login') }}"
                                class="dropdown-item rounded py-2"
                            >

                                <i class="fa fa-sign-in-alt text-primary me-2"></i>

                                {{ __('Login') }}

                            </a>

                        </li>

                    @endif


                    <!-- PROFILE -->

                    @if(session()->has('academy_student_id'))

                        <li>

                            <a
                                href="{{ route('academy.student.profile') }}"
                                class="dropdown-item rounded py-2"
                            >

                                <i class="fa fa-user text-primary me-2"></i>

                                {{ __('My Profile') }}

                            </a>

                        </li>

                    @endif


                    <!-- LOGOUT -->

                    @if(session()->has('academy_student_id'))

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form
                                action="{{ route('academy.student.logout') }}"
                                method="POST"
                                class="m-0"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item rounded py-2 text-danger"
                                >

                                    <i class="fa fa-sign-out-alt me-2"></i>

                                    {{ __('Logout') }}

                                </button>

                            </form>

                        </li>

                    @endif


                </ul>

            </div>


        </div>

    </nav>

</div>


<!-- =========================================================
     NAVBAR SCROLL
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const navbar = document.querySelector('.mynavbarr');

    if (!navbar) return;

    function handleNavbarScroll() {

        if (window.scrollY > 50) {

            navbar.classList.add('nav-scrolled');

        } else {

            navbar.classList.remove('nav-scrolled');

        }

    }

    handleNavbarScroll();

    window.addEventListener('scroll', handleNavbarScroll);

});

</script>

<!-- Navbar End -->
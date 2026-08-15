<!-- Topbar Start -->

<style>

    /* ==============================
       HEADER / TOPBAR
    ============================== */

    .myherder {
        position: relative;
        top: 0;
        width: 100%;
        /* min-height: 120px; */
        height: 100px;

        background: url('/assets/img/index_img/main_heder-removebg-preview.PNG');
        background-size: 100% 100px;
        background-repeat: no-repeat;
        background-position: center;

        z-index: 1000;

        display: flex;
        align-items: center;
    }


    /* ==============================
       HEADER ROW
    ============================== */

    .myherder .top-bar {
        min-height: 120px;
        padding: 10px 0;
    }


    /* ==============================
       LOGO + WEBSITE NAME
    ============================== */

    .myherder .navbar-brand {
        display: inline-flex;
        align-items: center;
        max-width: 100%;
    }


    .myherder .site-brand-title {
        display: flex;
        align-items: center;
        gap: 12px;

        color: white;
        font-weight: 700;

        font-size: clamp(1.55rem, 1vw, 1rem);
        line-height: 1.2;

        text-shadow:
            1px 2px 3px rgba(0, 0, 0, 0.75),
            0 0 8px rgba(255, 255, 255, 0.18);

        white-space: normal;
    }


    .myherder .site-logo {
        width: 70px;
        height: 70px;

        object-fit: contain;
        flex-shrink: 0;
    }


    /* ==============================
       INFORMATION AREA
    ============================== */

    .myherder .header-info {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 12px 20px;
    }


    .myherder .header-info-item {
        display: inline-flex;
        align-items: center;

        color: white;
        font-size: 0.95rem;

        text-shadow:
            1px 2px 3px rgba(0, 0, 0, 0.75);
    }


    .myherder .header-info-item i {
        color: white;
        margin-right: 8px;

        text-shadow:
            1px 2px 3px rgba(0, 0, 0, 0.75);
    }


    .myherder .header-info-item a {
        color: white;
        text-decoration: none;

        text-shadow:
            1px 2px 3px rgba(0, 0, 0, 0.75);
    }


    /* ==============================
       SOCIAL BUTTONS
    ============================== */

    .myherder .header-social {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }


    .myherder .header-social a {
        width: 34px;
        height: 34px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: rgba(255, 255, 255, 0.95);
        color: #1769aa;

        transition:
            transform 0.25s ease,
            background 0.25s ease,
            color 0.25s ease;
    }


    .myherder .header-social a:hover {
        transform: translateY(-3px) scale(1.05);

        background: #ffffff;
        color: #0d6efd;
    }


    /* =====================================================
       TABLET
    ===================================================== */

    @media (max-width: 1199.98px) {

        .myherder {
            min-height: 95px;
        }

        .myherder .top-bar {
            min-height: 95px;
            padding: 8px 15px;
        }

        .myherder .site-logo {
            width: 58px;
            height: 58px;
        }

        .myherder .site-brand-title {
            font-size: 1.25rem;
            gap: 8px;
        }

    }


    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 991.98px) {

        .myherder {
            min-height: 82px;
            height: auto;
        }

        .myherder .top-bar {
            min-height: 82px;
            padding: 6px 12px;
        }


        /* Logo section */

        .myherder .col-lg-3 {
            width: 100%;
        }


        .myherder .navbar-brand {
            width: 100%;
            justify-content: center;
        }


        .myherder .site-brand-title {
            font-size: clamp(0.9rem, 3.8vw, 1.25rem);
            gap: 7px;

            text-align: center;

            line-height: 1.15;
        }


        .myherder .site-logo {
            width: clamp(42px, 10vw, 55px);
            height: clamp(42px, 10vw, 55px);
        }


        /* Hide desktop information on mobile */

        .myherder .col-lg-9 {
            display: none;
        }

    }


    /* =====================================================
       VERY SMALL MOBILE
    ===================================================== */

    @media (max-width: 575.98px) {

        .myherder {
            min-height: 70px;
        }

        .myherder .top-bar {
            min-height: 70px;
            padding: 5px 8px;
        }


        .myherder .site-brand-title {
            font-size: 0.82rem;
            gap: 6px;
        }


        .myherder .site-logo {
            width: 38px;
            height: 38px;
        }

    }

</style>


<div class="container-fluid myherder">

    <div class="row align-items-center top-bar w-100">


        <!-- ==============================
             LOGO
        ============================== -->

        <div class="col-lg-6 col-md-12 text-center text-lg-start">

            <a
                href="{{ route('index') }}"
                class="navbar-brand m-0 p-0"
            >

                <h1 class="m-0 site-brand-title">

                    <img
                        src="{{ asset('storage/logo/logo-web-2.PNG') }}"
                        class="site-logo"
                        alt="{{ __('topbar_website.site_name') }}"
                    >

                    <span>
                        {{ __('topbar_website.site_name') }}
                    </span>

                </h1>

            </a>

        </div>


        <!-- ==============================
             INFORMATION
        ============================== -->

        <div class="col-lg-6 col-md-12 text-end">

            <div class="header-info">


                <!-- Address -->

                <div class="header-info-item">

                    <i class="fa fa-map-marker-alt"></i>

                    <span>
                        {{ __('topbar_website.address') }}
                    </span>

                </div>


                <!-- Email -->

                <div class="header-info-item">

                    <i class="far fa-envelope-open"></i>

                    <a
                        href="mailto:{{ __('topbar_website.email') }}"
                    >
                        {{ __('topbar_website.email') }}
                    </a>

                </div>


                <!-- Social Media -->

                <div class="header-social">

                    <!-- Facebook -->

                    <a
                        href="{{ __('topbar_website.facebook') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Facebook"
                    >
                        <i class="fab fa-facebook-f"></i>
                    </a>


                    <!-- YouTube -->

                    <a
                        href="https://www.youtube.com/live/oFJ-tx55_cA?si=0VhWCntmH1ehjAlZ"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="YouTube"
                    >
                        <i class="fab fa-youtube"></i>
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Topbar End -->
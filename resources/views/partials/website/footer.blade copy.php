<!-- Footer Start -->

<style>

    /* =========================================================
       FOOTER
    ========================================================= */

    .site-footer {
        position: relative;
        width: 100%;
        overflow: hidden;
        color: #fff;
        background:
            
            url('/assets/img/index_img/main_footer-removebg-preview.PNG');

        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;

        padding: 35px 0 0;
    }


    /* Main Glass Container */

    .footer-glass-container {
        position: relative;
        width: calc(100% - 50px);
        max-width: 1350px;
        min-height: 300px;
        margin: 0 auto;

        padding: 28px 35px;

        background: rgba(15, 2, 100, 0.289);

        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);

        border: 1px solid rgba(21, 20, 20, 0.48);
        border-radius: 30px;

        box-shadow:
            0 15px 45px rgba(0, 0, 0, 0.408),
            inset 0 1px 0 rgba(8, 4, 55, 0.478);

        transition: .4s ease;
    }

    .footer-glass-container:hover {
        background: rgba(2, 9, 112, 0.289);

        box-shadow:
            0 20px 55px rgba(0, 0, 0, 0.356),
            inset 0 1px 0 rgba(255, 255, 255, 0.421);
    }


    /* =========================================================
       FOOTER GRID
    ========================================================= */

    .footer-grid {
        display: grid;

        grid-template-columns:
            1.25fr
            1fr
            1fr
            1.25fr;

        gap: 35px;

        align-items: start;
    }


    /* =========================================================
       FOOTER SECTION
    ========================================================= */

    .footer-section {
        position: relative;
    }


    .footer-section-title {
        display: flex;
        align-items: center;
        gap: 10px;

        margin-bottom: 17px;

        color: darkblue;

        font-size: 18px;
        font-weight: 700;
        letter-spacing: .3px;

        text-transform: uppercase;

        text-shadow:
            0 2px 8px rgba(0, 0, 0, .35);
    }


    .footer-section-title i {
        display: flex;

        align-items: center;
        justify-content: center;

        width: 34px;
        height: 34px;

        border-radius: 10px;

        background: rgba(255, 255, 255, .18);

        border: 1px solid rgba(255, 255, 255, .35);

        color: #fff;

        transition: .35s ease;
    }


    .footer-section:hover
    .footer-section-title i {

        transform: translateY(-3px) rotate(-4deg);

        background: rgba(255, 255, 255, .28);

        box-shadow:
            0 8px 20px rgba(0, 0, 0, .15);
    }


    /* Small line under title */

    .footer-title-line {
        width: 45px;
        height: 2px;

        margin-bottom: 15px;

        border-radius: 20px;

        background: linear-gradient(
            90deg,
            #ffffff,
            rgba(255,255,255,.15)
        );
    }


    /* =========================================================
       TEXT
    ========================================================= */

    .footer-text {
        color: rgba(255, 255, 255, .90);

        font-size: 14px;
        line-height: 1.75;

        margin-bottom: 9px;

        transition: .3s ease;
    }


    .footer-text i {
        width: 20px;
        color: #fff;
    }


    .footer-text a {
        color: #fff;
        text-decoration: none;

        transition: .3s ease;
    }


    .footer-text a:hover {
        color: #ffe49a;
        padding-left: 4px;
    }


    /* =========================================================
       SOCIAL BUTTONS
    ========================================================= */

    .footer-social {
        display: flex;
        gap: 8px;

        margin-top: 15px;
    }


    .footer-social a {
        display: flex;

        align-items: center;
        justify-content: center;

        width: 38px;
        height: 38px;

        border-radius: 12px;

        color: #fff;

        text-decoration: none;

        background: rgba(255, 255, 255, .14);

        border: 1px solid rgba(255, 255, 255, .35);

        transition:
            transform .35s ease,
            background .35s ease,
            box-shadow .35s ease;
    }


    .footer-social a:hover {
        transform: translateY(-5px);

        background: rgba(255, 255, 255, .28);

        box-shadow:
            0 10px 20px rgba(0, 0, 0, .20);
    }


    /* =========================================================
       FOOTER LINKS
    ========================================================= */

    .footer-links {
        display: grid;

        grid-template-columns: 1fr 1fr;

        column-gap: 15px;
        row-gap: 5px;
    }


    .footer-link {
        position: relative;

        display: inline-flex;
        align-items: center;

        color: rgba(255, 255, 255, .88);

        text-decoration: none;

        font-size: 14px;

        padding: 4px 0;

        transition: .3s ease;
    }


    .footer-link::before {
        content: "›";

        margin-right: 7px;

        opacity: .6;

        transition: .3s ease;
    }


    .footer-link:hover {
        color: #fff;

        transform: translateX(5px);

        text-shadow:
            0 0 12px rgba(255,255,255,.45);
    }


    .footer-link:hover::before {
        opacity: 1;
        transform: translateX(3px);
    }


    /* =========================================================
       DONATION
    ========================================================= */

    .footer-donation {
        margin-top: 18px;

        padding: 14px 16px;

        border-radius: 18px;

        background:
            linear-gradient(
                135deg,
                rgba(82, 64, 150, .45),
                rgba(30, 100, 170, .40)
            );

        border: 1px solid rgba(255,255,255,.30);

        transition: .4s ease;
    }


    .footer-donation:hover {
        transform: translateY(-4px);

        background:
            linear-gradient(
                135deg,
                rgba(95, 75, 175, .58),
                rgba(35, 115, 190, .52)
            );

        box-shadow:
            0 12px 28px rgba(0,0,0,.18);
    }


    .footer-donation h5 {
        margin: 0 0 5px;

        font-size: 15px;

        color: #fff;
    }


    .footer-donation p {
        margin: 0 0 10px;

        font-size: 13px;

        color: rgba(255,255,255,.88);
    }


    .footer-donation-btn {
        display: inline-flex;

        align-items: center;
        gap: 7px;

        padding: 7px 14px;

        border-radius: 20px;

        color: #fff;

        text-decoration: none;

        font-size: 13px;
        font-weight: 600;

        background: rgba(255,255,255,.18);

        border: 1px solid rgba(255,255,255,.35);

        transition: .35s ease;
    }


    .footer-donation-btn:hover {
        color: #fff;

        background: rgba(255,255,255,.30);

        transform: translateX(4px);
    }


    /* =========================================================
       EMAIL / NOTIFICATION
    ========================================================= */

    .footer-notification-text {
        color: rgba(255,255,255,.90);

        font-size: 13px;
        line-height: 1.7;

        margin-bottom: 13px;
    }


    .footer-email-box {
        position: relative;
    }


    .footer-email-box input {
        width: 100%;

        height: 45px;

        padding: 0 105px 0 15px;

        border-radius: 14px;

        border: 1px solid rgba(255,255,255,.35);

        outline: none;

        color: #fff;

        background: rgba(255,255,255,.13);

        backdrop-filter: blur(5px);

        transition: .3s ease;
    }


    .footer-email-box input::placeholder {
        color: rgba(255,255,255,.72);
    }


    .footer-email-box input:focus {
        border-color: rgba(255,255,255,.75);

        background: rgba(255,255,255,.19);

        box-shadow:
            0 0 18px rgba(255,255,255,.10);
    }


    .footer-email-box button {
        position: absolute;

        top: 5px;
        right: 5px;

        height: 35px;

        padding: 0 13px;

        border: none;

        border-radius: 10px;

        color: #fff;

        font-size: 12px;
        font-weight: 600;

        background:
            linear-gradient(
                135deg,
                #285fa7,
                #564b9c
            );

        transition: .3s ease;
    }


    .footer-email-box button:hover {
        transform: translateY(-2px);

        box-shadow:
            0 7px 18px rgba(0,0,0,.20);
    }


    /* =========================================================
       LOGO
    ========================================================= */

    .footer-logo {
        display: flex;

        align-items: center;

        gap: 12px;

        margin-top: 15px;
    }


    .footer-logo img {
        width: 58px;
        height: 58px;

        object-fit: contain;

        filter:
            drop-shadow(0 5px 10px rgba(0,0,0,.25));

        transition: .4s ease;
    }


    .footer-logo:hover img {
        transform: scale(1.06) rotate(-2deg);
    }


    .footer-logo span {
        color: #fff;

        font-size: 13px;
        font-weight: 600;

        line-height: 1.5;
    }


    /* =========================================================
       COPYRIGHT
    ========================================================= */

    .footer-bottom {
        width: 100%;

        margin-top: 25px;

        padding: 13px 20px;

        border-top: 1px solid rgba(255,255,255,.20);

        background: rgba(0,0,0,.12);
    }


    .footer-bottom-inner {
        max-width: 1350px;

        margin: auto;

        display: flex;

        align-items: center;
        justify-content: space-between;

        gap: 15px;

        font-size: 12px;

        color: rgba(255,255,255,.80);
    }


    .footer-bottom a {
        color: #fff;

        text-decoration: none;

        transition: .3s ease;
    }


    .footer-bottom a:hover {
        color: #ffe49a;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 991px) {

        .site-footer {
            padding-top: 25px;
        }

        .footer-glass-container {
            width: calc(100% - 30px);

            padding: 25px;
        }

        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

    }


    @media (max-width: 767px) {

        .footer-glass-container {
            width: calc(100% - 20px);

            padding: 22px;

            border-radius: 24px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 25px;
        }

        .footer-links {
            grid-template-columns: 1fr 1fr;
        }

        .footer-bottom-inner {
            flex-direction: column;

            text-align: center;
        }

    }


    @media (max-width: 450px) {

        .footer-links {
            grid-template-columns: 1fr;
        }

        .footer-section-title {
            font-size: 16px;
        }

    }

</style>


<footer class="site-footer">

    <div class="footer-glass-container">

        <div class="footer-grid">


            <!-- =====================================================
                 CONTACT & LOCATION
            ====================================================== -->

            <div class="footer-section">

                <div class="footer-section-title">
                    <i class="fa fa-map-marker-alt"></i>
                    Contact & Location
                </div>

                <div class="footer-title-line"></div>


                <p class="footer-text">
                    <i class="fa fa-map-marker-alt me-2"></i>

                    Van Someren-Downerlaan 46,
                    5707 KL Helmond, Nederland
                </p>


                <p class="footer-text">

                    <i class="fa fa-envelope me-2"></i>

                    <a href="mailto:hoqooq.eu@nt17.unceuro.com">
                        hoqooq.eu@nt17.unceuro.com
                    </a>

                </p>


                <div class="footer-social">

                    <a
                        href="#"
                        target="_blank"
                        aria-label="Facebook"
                    >
                        <i class="fab fa-facebook-f"></i>
                    </a>


                    <a
                        href="https://www.youtube.com/live/oFJ-tx55_cA?si=0VhWCntmH1ehjAlZ"
                        target="_blank"
                        aria-label="YouTube"
                    >
                        <i class="fab fa-youtube"></i>
                    </a>

                </div>


                <div class="footer-logo">

                    <img
                        src="{{ asset('storage/logo/logo-web-2.PNG') }}"
                        alt="{{ __('footer_website.site_name') }}"
                    >

                    <span>
                        {{ __('footer_website.site_name') }}
                    </span>

                </div>

            </div>



            <!-- =====================================================
                 DONATION
            ====================================================== -->

            <div class="footer-section">

                <div class="footer-section-title">
                    <i class="fa fa-heart"></i>
                    Support Our Work
                </div>

                <div class="footer-title-line"></div>


                <p class="footer-text">
                    Your support helps us develop legal education,
                    research, resources and public legal awareness.
                </p>


                <div class="footer-donation">

                    <h5>
                        Make a Difference
                    </h5>

                    <p>
                        Every contribution helps us continue our work.
                    </p>


                    <a
                        href="{{ route('donation') }}"
                        class="footer-donation-btn"
                    >
                        <i class="fa fa-heart"></i>
                        Donate Now
                        <i class="fa fa-arrow-right"></i>
                    </a>

                </div>

            </div>



            <!-- =====================================================
                 WEBSITE SECTIONS
            ====================================================== -->

            <div class="footer-section">

                <div class="footer-section-title">
                    <i class="fa fa-compass"></i>
                    Explore
                </div>

                <div class="footer-title-line"></div>


                <div class="footer-links">

                    <a
                        class="footer-link"
                        href="{{ route('index') }}"
                    >
                        Home
                    </a>


                    <a
                        class="footer-link"
                        href="{{ route('about') }}"
                    >
                        About
                    </a>


                    <a
                        class="footer-link"
                        href="{{ route('services') }}"
                    >
                        Services
                    </a>


                    <a
                        class="footer-link"
                        href="{{ route('academy') }}"
                    >
                        Academy
                    </a>


                    <a
                        class="footer-link"
                        href="{{ route('legal-system') }}"
                    >
                        Legal System
                    </a>


                    <a
                        class="footer-link"
                        href="{{ route('news.index') }}"
                    >
                        News
                    </a>


                    <a
                        class="footer-link"
                        href="{{ route('archive') }}"
                    >
                        Archive
                    </a>


                    <a
                        class="footer-link"
                        href="{{ route('contact') }}"
                    >
                        Contact
                    </a>

                </div>

            </div>



            <!-- =====================================================
                 LATEST UPDATES
            ====================================================== -->

            <div class="footer-section">

                <div class="footer-section-title">
                    <i class="fa fa-bell"></i>
                    Stay Connected
                </div>

                <div class="footer-title-line"></div>


                <p class="footer-notification-text">

                    Stay informed about the latest legal news,
                    announcements, reports, seminars and important
                    updates from our Association.

                </p>


                <div class="footer-email-box">

                    <input
                        type="email"
                        placeholder="Your Email"
                    >


                    <button type="button">
                        Submit
                    </button>

                </div>

            </div>


        </div>

    </div>


    <!-- =========================================================
         COPYRIGHT
    ========================================================== -->

    <div class="footer-bottom">

        <div class="footer-bottom-inner">

            <div>

                &copy;

                <a href="{{ route('index') }}">
                    {{ __('footer_website.site_name') }}
                </a>

                {{ __('footer_website.rights') }}

            </div>


            <div>

                Designed by

                <a href="mailto:zhilaahmadi128@gmail.com">
                    Zhila Ahmadi
                </a>

            </div>

        </div>

    </div>

</footer>

<!-- Footer End -->
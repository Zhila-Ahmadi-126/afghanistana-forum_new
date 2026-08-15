@extends('layouts.website')

@section('content')


<style>
/* =========================================================
   ACADEMY APPLICATION SUCCESS
   LIGHT / BLUE / DARK BLUE THEME
   ========================================================= */

.academy-application-success {
    position: relative;
    min-height: 100vh;
    padding: 90px 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    background:
        radial-gradient(
            circle at 15% 20%,
            rgba(66, 180, 255, 0.10),
            transparent 30%
        ),
        radial-gradient(
            circle at 85% 80%,
            rgba(10, 91, 145, 0.08),
            transparent 32%
        ),
        #f8fcff;

    overflow: hidden;
}


/* =========================================================
   DECORATIVE LINES
   ========================================================= */

.academy-application-success::before,
.academy-application-success::after {
    content: "";
    position: absolute;

    border: 1px solid rgba(30, 144, 210, 0.13);
    border-radius: 50%;

    pointer-events: none;
}

.academy-application-success::before {
    width: 480px;
    height: 480px;

    top: -260px;
    left: -180px;
}

.academy-application-success::after {
    width: 520px;
    height: 520px;

    right: -260px;
    bottom: -280px;
}


/* =========================================================
   MAIN CARD
   ========================================================= */

.academy-success-card {
    position: relative;
    z-index: 2;

    width: 100%;
    max-width: 850px;

    padding: 65px 60px;

    text-align: center;

    background: rgba(255, 255, 255, 0.88);

    border: 1px solid rgba(28, 132, 190, 0.18);

    border-radius: 30px;

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 25px 70px rgba(15, 92, 135, 0.10),
        0 0 35px rgba(64, 180, 240, 0.06);

    animation: successCardEnter 0.8s ease forwards;

    transition: all 0.4s ease;
}

.academy-success-card:hover {
    transform: translateY(-5px);

    border-color: rgba(30, 144, 210, 0.30);

    box-shadow:
        0 30px 80px rgba(15, 92, 135, 0.14),
        0 0 45px rgba(64, 180, 240, 0.10);
}


/* =========================================================
   SUCCESS ICON
   ========================================================= */

.academy-success-icon {
    width: 95px;
    height: 95px;

    margin: 0 auto 30px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #ffffff;

    background:
        linear-gradient(
            135deg,
            #168bd0,
            #075f9c
        );

    border: 5px solid rgba(46, 164, 219, 0.12);

    box-shadow:
        0 12px 35px rgba(20, 126, 181, 0.20),
        0 0 0 10px rgba(54, 166, 220, 0.06);

    animation: successIconFloat 3s ease-in-out infinite;
}

.academy-success-icon i {
    font-size: 42px;
}


/* =========================================================
   SMALL LABEL
   ========================================================= */

.academy-success-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-bottom: 15px;

    color: #1683bd;

    font-size: 14px;
    font-weight: 700;

    letter-spacing: 0.5px;

    text-transform: uppercase;
}


/* =========================================================
   TITLE
   ========================================================= */

.academy-success-card h1 {
    margin-bottom: 18px;

    color: #073b60;

    font-size: 38px;
    font-weight: 800;

    line-height: 1.3;
}


/* =========================================================
   MAIN MESSAGE
   ========================================================= */

.academy-success-message {
    max-width: 650px;

    margin: 0 auto 35px;

    color: #58758b;

    font-size: 17px;
    line-height: 1.9;
}


/* =========================================================
   STATUS BOX
   ========================================================= */

.academy-success-status {
    display: flex;
    align-items: center;

    gap: 18px;

    max-width: 650px;

    margin: 0 auto 30px;

    padding: 20px 24px;

    text-align: left;

    background: rgba(237, 248, 255, 0.75);

    border: 1px solid rgba(31, 142, 204, 0.18);

    border-left: 4px solid #168bd0;

    border-radius: 16px;

    transition: all 0.35s ease;
}

.academy-success-status:hover {
    background: rgba(230, 245, 255, 0.95);

    transform: translateX(4px);

    box-shadow:
        0 10px 30px rgba(30, 136, 190, 0.08);
}

.academy-success-status-icon {
    min-width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 12px;

    color: #0d78b2;

    background: rgba(41, 160, 218, 0.10);
}

.academy-success-status-icon i {
    font-size: 22px;
}

.academy-success-status strong {
    display: block;

    margin-bottom: 4px;

    color: #124d70;

    font-size: 16px;
}

.academy-success-status span {
    color: #6b8496;

    font-size: 14px;

    line-height: 1.7;
}


/* =========================================================
   EMAIL NOTICE
   ========================================================= */

.academy-success-email {
    margin: 25px auto 35px;

    color: #668195;

    font-size: 14px;

    line-height: 1.8;
}

.academy-success-email i {
    margin-right: 6px;

    color: #168bd0;
}


/* =========================================================
   BUTTON
   ========================================================= */

.academy-success-button {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 10px;

    min-width: 210px;

    padding: 14px 28px;

    color: #ffffff !important;

    background:
        linear-gradient(
            135deg,
            #168bd0,
            #075f9c
        );

    border-radius: 14px;

    border: 1px solid rgba(6, 82, 130, 0.15);

    font-weight: 600;

    text-decoration: none;

    box-shadow:
        0 10px 28px rgba(19, 126, 182, 0.18);

    transition: all 0.35s ease;
}

.academy-success-button:hover {
    color: #ffffff !important;

    transform: translateY(-3px);

    background:
        linear-gradient(
            135deg,
            #0d96df,
            #064f84
        );

    box-shadow:
        0 16px 35px rgba(19, 126, 182, 0.25);
}

.academy-success-button i {
    transition: transform 0.3s ease;
}

.academy-success-button:hover i {
    transform: translateX(5px);
}


/* =========================================================
   ANIMATIONS
   ========================================================= */

@keyframes successCardEnter {

    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}

@keyframes successIconFloat {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-6px);
    }

}


/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 768px) {

    .academy-application-success {
        padding: 50px 15px;
    }

    .academy-success-card {
        padding: 45px 22px;

        border-radius: 22px;
    }

    .academy-success-icon {
        width: 78px;
        height: 78px;
    }

    .academy-success-icon i {
        font-size: 34px;
    }

    .academy-success-card h1 {
        font-size: 28px;
    }

    .academy-success-message {
        font-size: 15px;
    }

    .academy-success-status {
        align-items: flex-start;

        padding: 17px;
    }

    .academy-success-button {
        width: 100%;
    }
}
</style>

{{-- ============================================================
     APPLICATION SUCCESS PAGE
============================================================ --}}

<section class="academy-application-success-page">

    <div class="academy-success-background">

        <span class="academy-success-orb academy-success-orb-one"></span>

        <span class="academy-success-orb academy-success-orb-two"></span>

        <span class="academy-success-orb academy-success-orb-three"></span>

    </div>


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-9 col-md-11">


                {{-- =================================================
                     SUCCESS CARD
                ================================================== --}}

                <div class="academy-success-card">


                    {{-- CLOSE BUTTON --}}

                    <a
                        href="{{ route('academy') }}"
                        class="academy-success-close"
                        title="{{ __('Back to Academy') }}"
                    >

                        <i class="bi bi-x-lg"></i>

                    </a>



                    {{-- =================================================
                         SUCCESS ICON
                    ================================================== --}}

                    <div class="academy-success-icon-wrapper">

                        <div class="academy-success-icon-ring">

                            <div class="academy-success-icon">

                                <i class="bi bi-check-lg"></i>

                            </div>

                        </div>


                        <span class="academy-success-spark spark-one">
                            ✦
                        </span>

                        <span class="academy-success-spark spark-two">
                            ✧
                        </span>

                        <span class="academy-success-spark spark-three">
                            ✦
                        </span>

                    </div>



                    {{-- =================================================
                         OVERLINE
                    ================================================== --}}

                    <div class="academy-success-overline">

                        <i class="bi bi-mortarboard-fill"></i>

                        {{ __('Academy Admissions') }}

                    </div>



                    {{-- =================================================
                         TITLE
                    ================================================== --}}

                    <h1 class="academy-success-title">

                        {{ __('Thank You for Applying!') }}

                    </h1>



                    {{-- =================================================
                         MAIN MESSAGE
                    ================================================== --}}

                    <p class="academy-success-message">

                        {{ __('Your application has been successfully submitted and is now pending review by our academy administration.') }}

                    </p>



                    {{-- =================================================
                         STATUS
                    ================================================== --}}

                    <div class="academy-success-status">

                        <div class="academy-success-status-icon">

                            <i class="bi bi-hourglass-split"></i>

                        </div>


                        <div class="academy-success-status-content">

                            <strong>

                                {{ __('Application Under Review') }}

                            </strong>

                            <span>

                                {{ __('Our administration team will carefully review your application before making a final decision.') }}

                            </span>

                        </div>

                    </div>



                    {{-- =================================================
                         INFORMATION BOXES
                    ================================================== --}}

                    <div class="row g-4 academy-success-info-row">


                        {{-- PROFILE ACCESS --}}

                        <div class="col-md-6">

                            <div class="academy-success-info-card">

                                <div class="academy-success-info-icon">

                                    <i class="bi bi-shield-lock-fill"></i>

                                </div>


                                <div>

                                    <h3>

                                        {{ __('Profile Access') }}

                                    </h3>

                                    <p>

                                        {{ __('Your student profile will remain inactive until your application is approved by an administrator.') }}

                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- EMAIL NOTIFICATION --}}

                        <div class="col-md-6">

                            <div class="academy-success-info-card">

                                <div class="academy-success-info-icon">

                                    <i class="bi bi-envelope-check-fill"></i>

                                </div>


                                <div>

                                    <h3>

                                        {{ __('Email Notification') }}

                                    </h3>

                                    <p>

                                        {{ __('You will receive an email notification when your application has been reviewed and a decision has been made.') }}

                                    </p>

                                </div>

                            </div>

                        </div>


                    </div>



                    {{-- =================================================
                         WAITING MESSAGE
                    ================================================== --}}

                    <div class="academy-success-waiting">

                        <div class="academy-success-waiting-icon">

                            <i class="bi bi-clock-history"></i>

                        </div>


                        <div>

                            <strong>

                                {{ __('What happens next?') }}

                            </strong>

                            <p>

                                {{ __('For now, there is nothing else you need to do. Please wait while our administration reviews your application. If your application is approved, you will be notified by email and your profile access will be activated.') }}

                            </p>

                        </div>

                    </div>



                    {{-- =================================================
                         ACTIONS
                    ================================================== --}}

                    <div class="academy-success-actions">

                        <a
                            href="{{ route('academy') }}"
                            class="academy-success-primary-button"
                        >

                            <i class="bi bi-mortarboard-fill"></i>

                            {{ __('Back to Academy') }}

                        </a>


                        <a
                            href="{{ route('index') }}"
                            class="academy-success-secondary-button"
                        >

                            <i class="bi bi-house-door-fill"></i>

                            {{ __('Go to Home') }}

                        </a>

                    </div>



                    {{-- =================================================
                         FOOTER NOTE
                    ================================================== --}}

                    <div class="academy-success-footer">

                        <i class="bi bi-info-circle-fill"></i>

                        <span>

                            {{ __('Please keep an eye on your email for updates regarding your application.') }}

                        </span>

                    </div>


                </div>

            </div>

        </div>

    </div>

</section>


@endsection
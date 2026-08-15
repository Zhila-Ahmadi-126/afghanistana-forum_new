

<style>

/* =====================================================
   ACADEMY STUDENT LOGIN
===================================================== */

.academy-student-login-page {
    min-height: 78vh;
    padding: 90px 20px;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}


/* =====================================================
   BACKGROUND LIGHT EFFECT
===================================================== */

.academy-student-login-page::before {
    content: "";
    position: absolute;
    width: 420px;
    height: 420px;
    background: rgba(13, 110, 253, 0.08);
    border-radius: 50%;
    top: -180px;
    left: -150px;
    filter: blur(5px);
}

.academy-student-login-page::after {
    content: "";
    position: absolute;
    width: 380px;
    height: 380px;
    background: rgba(0, 123, 255, 0.07);
    border-radius: 50%;
    bottom: -180px;
    right: -120px;
    filter: blur(5px);
}


/* =====================================================
   GLASS CARD
===================================================== */

.academy-student-login-card {
    width: 100%;
    max-width: 470px;
    position: relative;
    z-index: 2;

    padding: 45px 40px;

    background: rgba(255, 255, 255, 0.72);

    border: 1px solid rgba(255, 255, 255, 0.85);

    border-radius: 28px;

    box-shadow:
        0 25px 60px rgba(10, 45, 85, 0.14),
        0 8px 25px rgba(10, 45, 85, 0.08);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}


.academy-student-login-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 30px 70px rgba(10, 45, 85, 0.18),
        0 10px 30px rgba(10, 45, 85, 0.10);
}


/* =====================================================
   ICON
===================================================== */

.academy-student-login-icon {
    width: 78px;
    height: 78px;

    margin: 0 auto 22px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 22px;

    background: rgba(255, 255, 255, 0.75);

    border: 1px solid rgba(13, 110, 253, 0.15);

    box-shadow:
        0 10px 25px rgba(13, 110, 253, 0.10);

    transition:
        transform 0.35s ease,
        box-shadow 0.35s ease;
}


.academy-student-login-card:hover
.academy-student-login-icon {
    transform: translateY(-4px) rotate(2deg);

    box-shadow:
        0 15px 30px rgba(13, 110, 253, 0.16);
}


.academy-student-login-icon i {
    font-size: 34px;
    color: #0d6efd;
}


/* =====================================================
   TITLE
===================================================== */

.academy-student-login-title {
    text-align: center;
    margin-bottom: 8px;

    color: #12304a;

    font-size: 30px;
    font-weight: 700;
}


.academy-student-login-subtitle {
    text-align: center;

    color: #66788a;

    font-size: 14px;

    line-height: 1.8;

    margin-bottom: 30px;
}


/* =====================================================
   ALERT
===================================================== */

.academy-student-login-alert {
    border-radius: 14px;

    padding: 13px 16px;

    margin-bottom: 22px;

    background: rgba(220, 53, 69, 0.08);

    border: 1px solid rgba(220, 53, 69, 0.18);

    color: #a12b39;

    font-size: 14px;

    text-align: left;
}


/* =====================================================
   FORM GROUP
===================================================== */

.academy-login-field {
    margin-bottom: 20px;
}


.academy-login-field label {
    display: block;

    margin-bottom: 8px;

    color: #34495e;

    font-size: 14px;

    font-weight: 600;
}


/* =====================================================
   INPUT
===================================================== */

.academy-login-input-wrapper {
    position: relative;
}


.academy-login-input-wrapper > i {
    position: absolute;

    left: 17px;
    top: 50%;

    transform: translateY(-50%);

    color: #0d6efd;

    font-size: 16px;

    pointer-events: none;

    transition: color 0.25s ease;
}


.academy-login-input {
    width: 100%;

    height: 56px;

    padding:
        0 18px
        0 48px;

    border-radius: 14px;

    border: 1px solid rgba(13, 110, 253, 0.13);

    background: rgba(255, 255, 255, 0.70);

    color: #263746;

    outline: none;

    transition:
        border-color 0.25s ease,
        box-shadow 0.25s ease,
        background 0.25s ease;
}


.academy-login-input::placeholder {
    color: #91a0ad;
}


.academy-login-input:focus {
    background: rgba(255, 255, 255, 0.92);

    border-color: rgba(13, 110, 253, 0.45);

    box-shadow:
        0 0 0 4px rgba(13, 110, 253, 0.08);
}


.academy-login-input-wrapper:focus-within > i {
    color: #084298;
}


/* =====================================================
   LOGIN BUTTON
===================================================== */

.academy-student-login-button {
    width: 100%;

    height: 56px;

    border: 0;

    border-radius: 14px;

    background: linear-gradient(
        135deg,
        #0d6efd,
        #0756b8
    );

    color: #ffffff;

    font-size: 15px;

    font-weight: 600;

    box-shadow:
        0 12px 25px rgba(13, 110, 253, 0.20);

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        filter 0.3s ease;
}


.academy-student-login-button:hover {
    transform: translateY(-3px);

    filter: brightness(1.04);

    box-shadow:
        0 16px 32px rgba(13, 110, 253, 0.28);
}


.academy-student-login-button:active {
    transform: translateY(0);
}


/* =====================================================
   REGISTER LINK
===================================================== */

.academy-student-login-register {
    text-align: center;

    margin-top: 26px;

    padding-top: 22px;

    border-top: 1px solid rgba(13, 110, 253, 0.10);

    color: #71808e;

    font-size: 14px;
}


.academy-student-login-register a {
    color: #0d6efd;

    font-weight: 600;

    text-decoration: none;

    transition: color 0.25s ease;
}


.academy-student-login-register a:hover {
    color: #084298;
}


/* =====================================================
   RESPONSIVE
===================================================== */

@media (max-width: 576px) {

    .academy-student-login-page {
        padding: 55px 15px;
    }

    .academy-student-login-card {
        padding: 35px 22px;

        border-radius: 22px;
    }

    .academy-student-login-title {
        font-size: 25px;
    }

    .academy-student-login-icon {
        width: 68px;
        height: 68px;
    }

    .academy-student-login-icon i {
        font-size: 29px;
    }

}
.academy-login-back-home {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    color: #4d7892;

    font-size: 14px;
    font-weight: 600;

    text-decoration: none;

    transition: all .3s ease;
      background:
        linear-gradient(
            135deg,
            #aaacaf 0%,
            #ddcb8999 45%,
            #7faede74 100%
        );
        padding: 15px;
         border-radius: 30px;

        border: 2px solid lightblue;
     
}

.academy-login-back-home:hover {
    color: #28617f;
    transform: translateY(-2px);
}

</style>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<section class="academy-student-login-page">

    <div class="academy-student-login-card">


        {{-- =====================================================
             ICON
        ====================================================== --}}

        <div class="academy-student-login-icon">

            <i class="bi bi-person-lock"></i>

        </div>


        {{-- =====================================================
             TITLE
        ====================================================== --}}

        <h1 class="academy-student-login-title">

            {{ __('Student Login') }}

        </h1>


        <p class="academy-student-login-subtitle">

            {{ __('Sign in to access your academy student profile and academic information.') }}

        </p>


        {{-- =====================================================
             ERRORS
        ====================================================== --}}

        @if($errors->any())

            <div class="academy-student-login-alert">

                @foreach($errors->all() as $error)

                    <div>

                        <i class="bi bi-exclamation-circle me-1"></i>

                        {{ $error }}

                    </div>

                @endforeach

            </div>

        @endif


        {{-- =====================================================
             LOGIN FORM
        ====================================================== --}}

        <form
            action="{{ route('academy.student.login.submit') }}"
            method="POST"
        >

            @csrf


            {{-- EMAIL --}}

            <div class="academy-login-field">

                <label for="student-email">

                    {{ __('Email Address') }}

                </label>


                <div class="academy-login-input-wrapper">

                    <i class="bi bi-envelope"></i>

                    <input
                        id="student-email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="academy-login-input"
                        placeholder="{{ __('Enter your email address') }}"
                        autocomplete="email"
                        required
                    >

                </div>

            </div>


            {{-- PASSWORD --}}

            <div class="academy-login-field">

                <label for="student-password">

                    {{ __('Password') }}

                </label>


                <div class="academy-login-input-wrapper">

                    <i class="bi bi-lock"></i>

                    <input
                        id="student-password"
                        type="password"
                        name="password"
                        class="academy-login-input"
                        placeholder="{{ __('Enter your password') }}"
                        autocomplete="current-password"
                        required
                    >

                </div>

            </div>


            {{-- SUBMIT --}}

            <button
                type="submit"
                class="academy-student-login-button"
            >

                <i class="bi bi-box-arrow-in-right me-2"></i>

                {{ __('Login to My Profile') }}

            </button>

        </form>


        {{-- =====================================================
             REGISTER
        ====================================================== --}}

        <div class="academy-student-login-register">

            {{ __("Don't have an academy account yet?") }}

            <a href="{{ route('academy.apply') }}">

                {{ __('Apply Now') }}

            </a>

        </div>
        <br>
        <div class="text-center mt-4 ml-auto" style="text-align: center;">

                <a
                    href="{{ route('index') }}"
                    class="academy-login-back-home"
                >
                    <i class="bi bi-house-door me-1"></i>
                    {{ __('Back to Home') }}
                </a>

            </div>


    </div>

</section>

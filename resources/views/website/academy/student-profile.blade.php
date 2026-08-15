
@extends('layouts.website')

@section('content')


<style>

/* ==========================================================
   STUDENT PROFILE PAGE
========================================================== */

.academy-student-profile-page {
    position: relative;
    overflow: hidden;
    

    background:
     
       linear-gradient(
            135deg,
            #aaacaf 0%,
            #ddcb8999 45%,
            #7faede74 100%
        );
}


/* ==========================================================
   SOFT BACKGROUND CIRCLES
========================================================== */

.academy-student-profile-page::before,
.academy-student-profile-page::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
    filter: blur(5px);
}

.academy-student-profile-page::before {
    width: 360px;
    height: 360px;
    top: 30px;
    left: -120px;

    background:
        radial-gradient(
            circle,
            rgba(104, 178, 230, .18) 0%,
            rgba(104, 178, 230, .06) 45%,
            transparent 72%
        );
}

.academy-student-profile-page::after {
    width: 430px;
    height: 430px;
    right: -160px;
    bottom: 40px;

    background:
        radial-gradient(
            circle,
            rgba(125, 201, 185, .16) 0%,
            rgba(125, 201, 185, .05) 45%,
            transparent 72%
        );
}


/* ==========================================================
   MAIN GLASS CONTAINER
========================================================== */

.academy-profile-container {
    position: relative;
    overflow: hidden;
    z-index: 2;

    max-width: 1100px;
    margin: auto;

    border-radius: 32px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.68),
            rgba(239,247,253,.48)
        );

    border: 1px solid rgba(255,255,255,.82);

    box-shadow:
        0 25px 70px rgba(65, 116, 150, .12),
        inset 0 1px 0 rgba(255,255,255,.90);

    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
}


/* ==========================================================
   DECORATIVE GLASS CIRCLES
========================================================== */

.academy-profile-container::before {
    content: "";

    position: absolute;

    width: 280px;
    height: 280px;

    top: -130px;
    right: -90px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(121, 190, 230, .18),
            rgba(121, 190, 230, .04) 65%,
            transparent 75%
        );

    filter: blur(8px);

    pointer-events: none;
}


.academy-profile-container::after {
    content: "";

    position: absolute;

    width: 230px;
    height: 230px;

    bottom: -110px;
    left: -70px;

    border-radius: 50%;

    background:
        radial-gradient(
            circle,
            rgba(139, 206, 193, .16),
            rgba(139, 206, 193, .04) 65%,
            transparent 75%
        );

    filter: blur(8px);

    pointer-events: none;
}


/* ==========================================================
   PROFILE HEADER
========================================================== */

.academy-profile-top {
    position: relative;
    z-index: 3;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 30px;

    padding: 38px 42px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.48),
            rgba(225,239,249,.38)
        );

    border-bottom:
        1px solid rgba(255,255,255,.72);

    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
}


/* ==========================================================
   IDENTITY
========================================================== */

.academy-profile-identity {
    display: flex;
    align-items: center;
    gap: 24px;
}


.academy-profile-avatar {
    width: 120px;
    height: 120px;

    flex-shrink: 0;

    overflow: hidden;

    border-radius: 28px;

    background:
        rgba(255,255,255,.58);

    border:
        3px solid rgba(255,255,255,.88);

    box-shadow:
        0 15px 35px rgba(75, 120, 150, .14),
        inset 0 1px 0 rgba(255,255,255,.90);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}


.academy-profile-avatar:hover {
    transform: translateY(-5px) scale(1.02);

    box-shadow:
        0 20px 42px rgba(75, 120, 150, .20);
}


.academy-profile-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}


.academy-profile-avatar-placeholder {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #4d89ae;

    font-size: 45px;

    background:
        rgba(235,246,253,.72);
}


/* ==========================================================
   NAME
========================================================== */

.academy-profile-name h1 {
    margin: 0 0 7px;

    color: #234d69;

    font-size: 30px;
    font-weight: 700;

    letter-spacing: -.3px;
}


.academy-profile-name p {
    margin: 0;

    color: #7391a5;

    font-size: 14px;
}


/* ==========================================================
   ACTIVE BADGE
========================================================== */

.academy-profile-active {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    margin-top: 13px;

    padding: 7px 13px;

    border-radius: 30px;

    color: #347c68;

    background:
        rgba(211, 241, 232, .55);

    border:
        1px solid rgba(150, 214, 195, .45);

    font-size: 12px;
    font-weight: 600;

    backdrop-filter: blur(8px);
}


.academy-profile-active-dot {
    width: 8px;
    height: 8px;

    border-radius: 50%;

    background: #65b89c;

    box-shadow:
        0 0 0 4px rgba(101,184,156,.12);
}


/* ==========================================================
   ACTIONS
========================================================== */

.academy-profile-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}


.academy-profile-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    min-height: 43px;

    padding: 10px 17px;

    border-radius: 14px;

    color: #416b84;

    background:
        rgba(255,255,255,.48);

    border:
        1px solid rgba(255,255,255,.80);

    box-shadow:
        0 8px 20px rgba(70,110,135,.07);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    font-size: 13px;
    font-weight: 600;

    text-decoration: none;

    transition:
        all .3s ease;
}


.academy-profile-action:hover {
    color: #285b78;

    background:
        rgba(255,255,255,.72);

    transform: translateY(-3px);

    box-shadow:
        0 12px 25px rgba(70,110,135,.12);
}


.academy-profile-action.logout:hover {
    color: #b05d68;

    background:
        rgba(255,238,241,.65);

    border-color:
        rgba(220,160,170,.40);
}


/* ==========================================================
   CONTENT
========================================================== */

.academy-profile-content {
    position: relative;
    z-index: 3;

    padding: 42px;
}


/* ==========================================================
   SECTION
========================================================== */

.academy-profile-section {
    margin-bottom: 40px;
}


.academy-profile-section:last-child {
    margin-bottom: 0;
}


/* ==========================================================
   SECTION TITLE
========================================================== */

.academy-profile-section-title {
    display: flex;
    align-items: center;
    gap: 13px;

    margin-bottom: 20px;
}


.academy-profile-section-title-icon {
    width: 43px;
    height: 43px;

    display: flex;
    align-items: center;
    justify-content: center;

    flex-shrink: 0;

    border-radius: 14px;

    color: #39789d;

    background:
        rgba(221, 240, 250, .68);

    border:
        1px solid rgba(171, 213, 234, .55);

    box-shadow:
        0 8px 18px rgba(70,130,160,.08);

    backdrop-filter: blur(10px);

    font-size: 17px;
}


.academy-profile-section-title h2 {
    margin: 0;

    color: #31566e;

    font-size: 20px;
    font-weight: 700;
}


.academy-profile-section-title span {
    display: block;

    margin-top: 3px;

    color: #8299a9;

    font-size: 12px;
}


/* ==========================================================
   INFORMATION GRID
========================================================== */

.academy-profile-info-grid {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 15px;
}


/* ==========================================================
   INFORMATION CARD
========================================================== */

.academy-profile-info-item {
    position: relative;
    overflow: hidden;

    display: flex;
    align-items: center;

    gap: 14px;

    min-height: 82px;

    padding: 17px;

    border-radius: 18px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.62),
            rgba(240,248,253,.40)
        );

    border:
        1px solid rgba(255,255,255,.82);

    box-shadow:
        0 10px 25px rgba(70,110,135,.06),
        inset 0 1px 0 rgba(255,255,255,.85);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    transition:
        transform .3s ease,
        box-shadow .3s ease,
        background .3s ease;
}


.academy-profile-info-item::before {
    content: "";

    position: absolute;

    width: 70px;
    height: 70px;

    top: -38px;
    right: -25px;

    border-radius: 50%;

    background:
        rgba(147, 204, 230, .12);

    filter: blur(2px);
}


.academy-profile-info-item:hover {
    transform: translateY(-5px);

    background:
        rgba(255,255,255,.78);

    box-shadow:
        0 16px 32px rgba(70,110,135,.11);
}


/* ==========================================================
   INFORMATION ICON
========================================================== */

.academy-profile-info-icon {
    width: 44px;
    height: 44px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 13px;

    color: #397ca3;

    background:
        rgba(221, 240, 250, .72);

    border:
        1px solid rgba(170, 211, 232, .52);

    box-shadow:
        0 6px 15px rgba(70,130,160,.08);

    font-size: 16px;
}


/* ==========================================================
   INFORMATION TEXT
========================================================== */

.academy-profile-info-text {
    min-width: 0;
}


.academy-profile-info-text span {
    display: block;

    margin-bottom: 4px;

    color: #8198a8;

    font-size: 11px;
    font-weight: 500;
}


.academy-profile-info-text strong {
    display: block;

    color: #355b72;

    font-size: 14px;
    font-weight: 650;

    word-break: break-word;
}


/* ==========================================================
   ACADEMIC CARD
========================================================== */

.academy-profile-academic-card {
    position: relative;
    overflow: hidden;

    width: 100%;

    padding: 26px;

    border-radius: 21px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.66),
            rgba(238,247,252,.46)
        );

    border:
        1px solid rgba(255,255,255,.84);

    box-shadow:
        0 13px 30px rgba(65,110,135,.07),
        inset 0 1px 0 rgba(255,255,255,.88);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    transition:
        transform .35s ease,
        box-shadow .35s ease;
}


.academy-profile-academic-card::after {
    content: "";

    position: absolute;

    width: 120px;
    height: 120px;

    right: -45px;
    bottom: -55px;

    border-radius: 50%;

    background:
        rgba(150, 205, 224, .12);

    filter: blur(5px);

    pointer-events: none;
}


.academy-profile-academic-card:hover {
    transform: translateY(-5px);

    box-shadow:
        0 20px 40px rgba(65,110,135,.12);
}


/* ==========================================================
   ACADEMIC TOP
========================================================== */

.academy-profile-academic-top {
    position: relative;
    z-index: 2;

    display: flex;
    align-items: center;

    gap: 15px;

    margin-bottom: 20px;
}


.academy-profile-academic-icon {
    width: 52px;
    height: 52px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 16px;

    color: #397ca3;

    background:
        rgba(220, 240, 250, .72);

    border:
        1px solid rgba(168, 211, 232, .55);

    box-shadow:
        0 8px 20px rgba(70,130,160,.09);

    font-size: 20px;
}


.academy-profile-academic-top h3 {
    margin: 0;

    color: #345a71;

    font-size: 19px;
    font-weight: 700;
}


.academy-profile-class-code {
    margin-top: 3px;

    color: #8198a8;

    font-size: 12px;
}


/* ==========================================================
   ACADEMIC DETAILS
========================================================== */

.academy-profile-academic-details {
    position: relative;
    z-index: 2;

    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 12px;
}


.academy-profile-academic-detail {
    padding: 13px 15px;

    border-radius: 14px;

    background:
        rgba(255,255,255,.48);

    border:
        1px solid rgba(255,255,255,.76);

    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.75);

    backdrop-filter: blur(10px);
}


.academy-profile-academic-detail span {
    display: block;

    color: #849aa9;

    font-size: 11px;

    margin-bottom: 4px;
}


.academy-profile-academic-detail strong {
    color: #3c6076;

    font-size: 13px;
}


/* ==========================================================
   ENROLLMENT STATUS
========================================================== */

.academy-profile-enrollment-status {
    position: relative;
    z-index: 2;

    display: inline-flex;
    align-items: center;

    gap: 7px;

    margin-top: 18px;

    padding: 7px 13px;

    border-radius: 30px;

    color: #47809d;

    background:
        rgba(218, 240, 249, .60);

    border:
        1px solid rgba(160, 208, 228, .48);

    font-size: 11px;
    font-weight: 700;

    text-transform: capitalize;

    backdrop-filter: blur(8px);
}


/* ==========================================================
   NOTES
========================================================== */

.academy-profile-notes {
    padding: 23px;

    border-radius: 18px;

    background:
        rgba(255,255,255,.56);

    border:
        1px solid rgba(255,255,255,.82);

    box-shadow:
        0 10px 25px rgba(70,110,135,.06);

    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);

    color: #607b8e;

    font-size: 14px;
    line-height: 1.9;
}


/* ==========================================================
   EMPTY
========================================================== */

.academy-profile-empty {
    padding: 25px;

    border-radius: 18px;

    color: #78909f;

    background:
        rgba(255,255,255,.48);

    border:
        1px dashed rgba(120,170,195,.30);

    text-align: center;

    backdrop-filter: blur(12px);
}


/* ==========================================================
   FULL WIDTH ACADEMIC CARD
========================================================== */

/*
   Programming / Academy class card
   now takes the full available width.
*/

.academy-profile-section .row > .col-lg-6:has(.academy-profile-academic-card) {
    width: 100%;
}


/* ==========================================================
   RESPONSIVE
========================================================== */

@media (max-width: 991px) {

    .academy-profile-info-grid {
        grid-template-columns:
            repeat(2, 1fr);
    }

    .academy-profile-top {
        align-items: flex-start;
        flex-direction: column;
    }

    .academy-profile-actions {
        width: 100%;
    }

}


@media (max-width: 767px) {

    .academy-student-profile-page {
        padding: 50px 12px 70px;
    }

    .academy-profile-container {
        border-radius: 24px;
    }

    .academy-profile-top {
        padding: 30px 22px;
    }

    .academy-profile-content {
        padding: 28px 20px;
    }

    .academy-profile-avatar {
        width: 95px;
        height: 95px;

        border-radius: 22px;
    }

    .academy-profile-name h1 {
        font-size: 25px;
    }

    .academy-profile-info-grid {
        grid-template-columns: 1fr;
    }

}


@media (max-width: 480px) {

    .academy-profile-identity {
        flex-direction: column;
        align-items: flex-start;
    }

    .academy-profile-actions {
        width: 100%;
    }

    .academy-profile-action {
        flex: 1;
    }

    .academy-profile-academic-details {
        grid-template-columns: 1fr;
    }

}







/* ==========================================================
   CERTIFICATES
========================================================== */

.academy-profile-certificate-card {

    position: relative;

    display: flex;

    align-items: center;

    gap: 20px;

    padding: 22px;

    border-radius: 22px;

    background:
        linear-gradient(
            135deg,
            rgba(255,255,255,.48),
            rgba(255,255,255,.25)
        );

    border:
        1px solid rgba(255,255,255,.55);

    box-shadow:
        0 12px 35px rgba(40,90,130,.08),
        inset 0 1px 0 rgba(255,255,255,.65);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    transition:
        transform .35s ease,
        box-shadow .35s ease,
        border-color .35s ease;

    overflow: hidden;
}


.academy-profile-certificate-card::before {

    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: -70px;
    top: -80px;

    border-radius: 50%;

    background:
        rgba(13,110,253,.07);

    filter: blur(15px);

    pointer-events: none;
}


.academy-profile-certificate-card:hover {

    transform: translateY(-5px);

    border-color:
        rgba(13,110,253,.20);

    box-shadow:
        0 20px 45px rgba(40,90,130,.13),
        inset 0 1px 0 rgba(255,255,255,.75);
}


.academy-profile-certificate-icon {

    width: 58px;
    height: 58px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 17px;

    color: #1769aa;

    background:
        rgba(255,255,255,.55);

    border:
        1px solid rgba(255,255,255,.65);

    box-shadow:
        0 8px 20px rgba(40,90,130,.08);

    font-size: 24px;

    transition:
        transform .3s ease;
}


.academy-profile-certificate-card:hover
.academy-profile-certificate-icon {

    transform:
        rotate(-5deg)
        scale(1.06);
}


.academy-profile-certificate-content {

    flex: 1;

    min-width: 0;
}


.academy-profile-certificate-title {

    margin-bottom: 12px;
}


.academy-profile-certificate-title h3 {

    margin: 0 0 4px;

    color: #234c6d;

    font-size: 17px;

    font-weight: 700;
}


.academy-profile-certificate-title span {

    color: #7890a3;

    font-size: 12px;
}


.academy-profile-certificate-details {

    display: flex;

    flex-wrap: wrap;

    gap: 25px;
}


.academy-profile-certificate-details div {

    display: flex;

    flex-direction: column;

    gap: 3px;
}


.academy-profile-certificate-details span {

    color: #8296a8;

    font-size: 10px;
}


.academy-profile-certificate-details strong {

    color: #315a78;

    font-size: 13px;
}


.academy-profile-certificate-button {

    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 8px;

    flex-shrink: 0;

    padding: 11px 16px;

    border-radius: 13px;

    color: #1769aa;

    background:
        rgba(255,255,255,.58);

    border:
        1px solid rgba(255,255,255,.70);

    text-decoration: none;

    font-size: 12px;

    font-weight: 600;

    box-shadow:
        0 7px 18px rgba(40,90,130,.07);

    transition:
        all .3s ease;
}


.academy-profile-certificate-button:hover {

    color: #0d5a91;

    background:
        rgba(255,255,255,.82);

    transform:
        translateY(-2px);

    box-shadow:
        0 12px 25px rgba(40,90,130,.11);
}


@media (max-width: 767px) {

    .academy-profile-certificate-card {

        align-items: flex-start;

        flex-wrap: wrap;
    }

    .academy-profile-certificate-content {

        width: calc(100% - 78px);
    }

    .academy-profile-certificate-button {

        width: 100%;
    }

}
.mystylee{
     color: #4d7892;
     transition: all .3s ease;
      background:
        linear-gradient(
            135deg,
            #aaacaf 0%,
            #ddcb8999 45%,
            #7faede74 100%
        );
       
         border-radius: 30px;

        border: 2px solid lightblue;
}
</style>





<section class="academy-student-profile-page mybody">

    <div class="container pt-5">


        <div class="academy-profile-container pt-5">


            {{-- =====================================================
                 PROFILE HEADER
            ====================================================== --}}

            <div class="academy-profile-top">


                <div class="academy-profile-identity">


                    {{-- AVATAR --}}

                    <div class="academy-profile-avatar">

                        @if($student->profile_image)

                            <img
                                src="{{ asset('storage/' . $student->profile_image) }}"
                                alt="{{ $student->first_name }} {{ $student->last_name }}"
                            >

                        @else

                            <div class="academy-profile-avatar-placeholder">

                                <i class="bi bi-person-fill"></i>

                            </div>

                        @endif

                    </div>


                    {{-- NAME --}}

                    <div class="academy-profile-name">

                        <h1>

                            {{ $student->first_name }}
                            {{ $student->last_name }}

                        </h1>

                        <p>

                            {{ __('Academy Student Profile') }}

                        </p>


                        <div class="academy-profile-active">

                            <span class="academy-profile-active-dot"></span>

                            {{ __('Active Student') }}

                        </div>

                    </div>

                </div>



                {{-- ACTIONS --}}

                <div class="academy-profile-actions">

                       

                        <form
                            action="{{ route('academy.student.logout') }}"
                            method="POST"
                            style="margin:0;"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="academy-profile-action logout"
                            >
                                <i class="bi bi-box-arrow-right"></i>
                                {{ __('Logout') }}
                            </button>

                        </form>

                    </div>

            </div>



            {{-- =====================================================
                 PROFILE CONTENT
            ====================================================== --}}

            <div class="academy-profile-content">


                {{-- =================================================
                     PERSONAL INFORMATION
                ================================================== --}}

                <section class="academy-profile-section">


                    <div class="academy-profile-section-title">

                        <div class="academy-profile-section-title-icon">

                            <i class="bi bi-person-vcard"></i>

                        </div>

                        <div>

                            <h2>

                                {{ __('Personal Information') }}

                            </h2>

                            <span>

                                {{ __('Your personal and contact information') }}

                            </span>

                        </div>

                    </div>


                    <div class="academy-profile-info-grid">


                        {{-- EMAIL --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-envelope-fill"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>
                                    {{ __('Email Address') }}
                                </span>

                                <strong>
                                    {{ $student->email }}
                                </strong>

                            </div>

                        </div>


                        {{-- PHONE --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-telephone-fill"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>
                                    {{ __('Phone Number') }}
                                </span>

                                <strong>
                                    {{ $student->phone }}
                                </strong>

                            </div>

                        </div>


                        {{-- GENDER --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-gender-ambiguous"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>
                                    {{ __('Gender') }}
                                </span>

                                <strong>
                                    {{ ucfirst($student->gender) }}
                                </strong>

                            </div>

                        </div>


                        {{-- DATE OF BIRTH --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-calendar3"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>
                                    {{ __('Date of Birth') }}
                                </span>

                                <strong>
                                    {{ $student->date_of_birth }}
                                </strong>

                            </div>

                        </div>


                        {{-- ADDRESS --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-geo-alt-fill"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>
                                    {{ __('Address') }}
                                </span>

                                <strong>
                                    {{ $student->address }}
                                </strong>

                            </div>

                        </div>


                        {{-- ENROLLMENT DATE --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-calendar-check-fill"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>
                                    {{ __('Enrollment Date') }}
                                </span>

                                <strong>
                                    {{ $student->enrollment_date }}
                                </strong>

                            </div>

                        </div>

                    </div>

                </section>



                {{-- =================================================
                     ACADEMIC INFORMATION
                ================================================== --}}

                <section class="academy-profile-section">


                    <div class="academy-profile-section-title">

                        <div class="academy-profile-section-title-icon">

                            <i class="bi bi-mortarboard-fill"></i>

                        </div>

                        <div>

                            <h2>

                                {{ __('Academic Information') }}

                            </h2>

                            <span>

                                {{ __('Your enrolled academy classes') }}

                            </span>

                        </div>

                    </div>


                    <div class="row g-4">


                        @forelse($student->enrollments as $enrollment)


                            @php

                                $class =
                                    $enrollment->academyClass;

                                $classTitle =
                                    $class?->translations
                                        ?->first()?->title
                                    ?? $class?->class_code
                                    ?? __('Academy Class');

                            @endphp


                            <div class="col-lg-6">


                                <div class="academy-profile-academic-card">


                                    <div class="academy-profile-academic-top">


                                        <div class="academy-profile-academic-icon">

                                            <i class="bi bi-book-half"></i>

                                        </div>


                                        <div>

                                            <h3>

                                                {{ $classTitle }}

                                            </h3>


                                            @if($class?->class_code)

                                                <div class="academy-profile-class-code">

                                                    {{ $class->class_code }}

                                                </div>

                                            @endif

                                        </div>

                                    </div>



                                    <div class="academy-profile-academic-details">


                                        @if($class?->department)

                                            <div class="academy-profile-academic-detail">

                                                <span>
                                                    {{ __('Department') }}
                                                </span>

                                                <strong>

                                                    {{
                                                        $class->department
                                                            ->translations
                                                            ->first()?->title
                                                        ?? $class->department->code
                                                    }}

                                                </strong>

                                            </div>

                                        @endif


                                        @if($class?->room)

                                            <div class="academy-profile-academic-detail">

                                                <span>
                                                    {{ __('Room') }}
                                                </span>

                                                <strong>
                                                    {{ $class->room }}
                                                </strong>

                                            </div>

                                        @endif


                                        @if($class?->schedule)

                                            <div class="academy-profile-academic-detail">

                                                <span>
                                                    {{ __('Schedule') }}
                                                </span>

                                                <strong>
                                                    {{ $class->schedule }}
                                                </strong>

                                            </div>

                                        @endif


                                        <div class="academy-profile-academic-detail">

                                            <span>
                                                {{ __('Enrollment Date') }}
                                            </span>

                                            <strong>
                                                {{ $enrollment->enrollment_date }}
                                            </strong>

                                        </div>

                                    </div>



                                    <div class="academy-profile-enrollment-status">

                                        <i class="bi bi-check-circle-fill"></i>

                                        {{ ucfirst($enrollment->enrollment_status) }}

                                    </div>


                                </div>

                            </div>


                        @empty

                            <div class="col-12">

                                <div class="academy-profile-empty">

                                    <i class="bi bi-info-circle me-2"></i>

                                    {{ __('No academic information is currently available.') }}

                                </div>

                            </div>

                        @endforelse


                    </div>

                </section>

                {{-- =================================================
     CERTIFICATES
================================================== --}}

<section class="academy-profile-section">

    <div class="academy-profile-section-title">

        <div class="academy-profile-section-title-icon">

            <i class="bi bi-award-fill"></i>

        </div>

        <div>

            <h2>
                {{ __('My Certificates') }}
            </h2>

            <span>
                {{ __('Certificates awarded to you by the academy') }}
            </span>

        </div>

    </div>


    <div class="row ">

        @forelse(
            $student->certificates->where('status', 'issued')
            as $certificate
        )

            @php

                $certificateClass =
                    $certificate->academyClass;

                $certificateClassTitle =
                    $certificateClass?->translations
                        ?->first()?->title
                    ?? $certificateClass?->class_code
                    ?? __('Academy Class');

            @endphp


            <div class="col-12">

                <div class="academy-profile-certificate-card">


                    {{-- CERTIFICATE ICON --}}

                    <div class="academy-profile-certificate-icon">

                        <i class="bi bi-award-fill"></i>

                    </div>


                    {{-- CERTIFICATE INFO --}}

                    <div class="academy-profile-certificate-content">

                        <div class="academy-profile-certificate-title">

                            <h3>
                                {{ $certificateClassTitle }}
                            </h3>

                            <span>
                                {{ __('Certificate of Completion') }}
                            </span>

                        </div>


                        <div class="academy-profile-certificate-details">

                            <div>

                                <span>
                                    {{ __('Certificate Number') }}
                                </span>

                                <strong>
                                    {{ $certificate->certificate_number }}
                                </strong>

                            </div>


                            <div>

                                <span>
                                    {{ __('Issue Date') }}
                                </span>

                                <strong>
                                    {{ $certificate->issue_date }}
                                </strong>

                            </div>

                        </div>

                    </div>


                    {{-- VIEW / DOWNLOAD --}}

                    @if($certificate->certificate_file)

                        <a
                            href="{{ asset('storage/' . $certificate->certificate_file) }}"
                            target="_blank"
                            class="academy-profile-certificate-button"
                        >

                            <i class="bi bi-file-earmark-pdf-fill"></i>

                            {{ __('View Certificate') }}

                        </a>

               
                   

                            <a
                                href="{{ route('admin.academy_certificates.download', $certificate->id) }}"
                                class="btn btn-sm mystylee pl-3 pr-3 pt-2 pb-2 academy-profile-certificate-button"
                                title="{{ __('Download Certificate') }}"
                            >

                                <i class="bi bi-download"></i>

                                {{ __('Download') }}

                            </a>

                                 @endif

                  


                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="academy-profile-empty">

                    <i class="bi bi-award me-2"></i>

                    {{ __('No certificates have been issued to you yet.') }}

                </div>

            </div>

        @endforelse

    </div>

</section>



                {{-- =================================================
                     EMERGENCY CONTACT
                ================================================== --}}

                <section class="academy-profile-section">


                    <div class="academy-profile-section-title">

                        <div class="academy-profile-section-title-icon">

                            <i class="bi bi-shield-check"></i>

                        </div>

                        <div>

                            <h2>

                                {{ __('Emergency Contact') }}

                            </h2>

                            <span>

                                {{ __('Emergency contact information') }}

                            </span>

                        </div>

                    </div>


                    <div class="academy-profile-info-grid"
                         style="grid-template-columns: repeat(2, 1fr);">


                        {{-- CONTACT NAME --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-person-exclamation"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>

                                    {{ __('Contact Name') }}

                                </span>

                                <strong>

                                    {{ $student->emergency_contact_name }}

                                </strong>

                            </div>

                        </div>


                        {{-- CONTACT PHONE --}}

                        <div class="academy-profile-info-item">

                            <div class="academy-profile-info-icon">

                                <i class="bi bi-telephone-forward-fill"></i>

                            </div>

                            <div class="academy-profile-info-text">

                                <span>

                                    {{ __('Contact Phone') }}

                                </span>

                                <strong>

                                    {{ $student->emergency_contact_phone }}

                                </strong>

                            </div>

                        </div>


                    </div>

                </section>



                {{-- =================================================
                     NOTES
                ================================================== --}}

                @if($student->notes)

                    <section class="academy-profile-section">


                        <div class="academy-profile-section-title">

                            <div class="academy-profile-section-title-icon">

                                <i class="bi bi-journal-text"></i>

                            </div>

                            <div>

                                <h2>

                                    {{ __('Additional Notes') }}

                                </h2>

                                <span>

                                    {{ __('Information provided with your application') }}

                                </span>

                            </div>

                        </div>


                        <div class="academy-profile-notes">

                            {!! nl2br(e($student->notes)) !!}

                        </div>

                    </section>

                @endif


            </div>

        </div>

    </div>


@endsection
</section>


@extends('layouts.website')

@section('content')

<style>

    
    .academy-apply-introduction {
    display: flex;
    align-items: flex-start;
    gap: 18px;

    padding: 22px;

    border: 1px solid rgba(0, 123, 255, .15);

    border-radius: 18px;

    background: rgba(255, 255, 255, .55);

    box-shadow: 0 10px 30px rgba(0, 0, 0, .05);

    transition: all .3s ease;
}

.academy-apply-introduction:hover {
    transform: translateY(-3px);

    box-shadow: 0 15px 35px rgba(0, 0, 0, .09);
}

.academy-apply-introduction-icon {
    flex: 0 0 50px;

    width: 50px;
    height: 50px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    color: #fff;

    background: linear-gradient(
        135deg,
        #087fff,
        #005dcc
    );

    font-size: 21px;
}

.academy-apply-introduction h4 {
    margin-bottom: 7px;

    font-weight: 700;

    color: #10243b;
}

.academy-apply-introduction p {
    color: #5b6875;

    font-size: 14px;

    line-height: 1.8;
}

@media (max-width: 576px) {

    .academy-apply-introduction {
        flex-direction: column;
    }

}

 .meeting-page {
    position: relative;
    overflow: hidden;
    padding: 110px 0 100px;

    color: darkblue;
    min-height: 100vh;
}

/* Decorative glowing lights */

.meeting-page::before,
.meeting-page::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    pointer-events: none;
}

.meeting-page::before {
    width: 350px;
    height: 350px;
    background: rgba(92, 178, 255, 0.18);
    top: -100px;
    left: -120px;
}

.meeting-page::after {
    width: 400px;
    height: 400px;
    background: rgba(177, 109, 255, 0.15);
    right: -150px;
    bottom: -100px;
}

.meeting-wrapper {
    position: relative;
    z-index: 2;
}


/* ==========================================================
   HEADER
========================================================== */

.meeting-header {
    text-align: center;
    max-width: 950px;
    color: darkblue;
    margin: 0 auto 50px;
}

.meeting-date {
   
    align-items: center;
    gap: 9px;

    padding: 10px 22px;
   

    

   
 background:
        radial-gradient(circle at 10% 15%, rgba(167, 193, 239, 0.19), transparent 30%),
        radial-gradient(circle at 90% 20%, rgba(237, 212, 100, 0.173), transparent 30%),
        radial-gradient(circle at 50% 90%, rgba(105, 198, 241, 0.13), transparent 35%),
        linear-gradient(
            135deg,
            #0142b31b 0%,
            #def9661f 28%,
            #3ebff62d 52%,
            #face551a 76%,
            #647bed37 100%
        );


    border: 1px solid rgba(117, 207, 255, 0.35);

    box-shadow:
        0 0 25px rgba(50, 165, 255, 0.12),
        inset 0 1px 0 rgba(255,255,255,0.18);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
}

.bg-lightf{
 
    

 background:
        radial-gradient(circle at 10% 15%, rgba(134, 62, 3, 0.19), transparent 60%),
       
        radial-gradient(circle at 50% 90%, rgba(239, 242, 171, 0.13), transparent 40%),
        linear-gradient(
            135deg,
            #703b021b 0%,
           
            #f3e6852d 52%,
           
            #758cf637 100%
        );

   
}
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
                url("/assets/img/academy/academy1.jpg") center center no-repeat;
    background-size: 100% 100%;
}
</style>
<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100  start-50 d-flex align-items-center justify-content-center">

    <div class="spinner-border text-primary"
         style="width: 3rem; height: 3rem;"
         role="status">

        <span class="sr-only">Loading...</span>

    </div>

</div>
<!-- Spinner End -->


<!-- Page Header Start -->

<div class="container-fluid page-header  py-5" style="height:300px">

    <div class="container ml-5">

        <div style="background-color:rgba(209, 205, 86, 0.134);border:1px solid white;">

            <h1 class="display-3 text-white mb-3 animated slideInDown">

                {{ __('Apply Now') }}

            </h1>


            <nav aria-label="breadcrumb animated slideInDown">

                <ol class="breadcrumb text-uppercase">

                    <li class="breadcrumb-item">

                        <a class="text-white"
                           href="{{ route('index') }}">

                            {{ __('Home') }}

                        </a>

                    </li>


                    <li class="breadcrumb-item">

                        <a class="text-white"
                           href="{{ route('academy') }}">

                            {{ __('Academy') }}

                        </a>

                    </li>


                    <li class="breadcrumb-item text-white active"
                        aria-current="page">

                        {{ __('Apply Now') }}

                    </li>

                </ol>

            </nav>

        </div>

    </div>

</div>

<!-- Page Header End -->



<!-- Apply Form Start -->

<div class="row meeting-page meeting-date">

    <div class="col-sm-12 ">

        <div class="row justify-content-center ">

            <div class="col-lg-9 ">


                <div class="bg-lightf text-center p-5">


                    <!-- TITLE -->

                    <h1 class="mb-3">

                        {{ __('Apply for Academy') }}

                    </h1>


                    <p class="mb-5">

                        {{ __('Complete the form below to apply for one of our academic classes. Your application will be reviewed by the academy administration.') }}

                    </p>



                    <!-- SUCCESS MESSAGE -->

                    @if(session('success'))

                        <div class="alert alert-success text-start">

                            {{ session('success') }}

                        </div>

                    @endif



                    <!-- ERROR MESSAGE -->

                    @if($errors->any())

                        <div class="alert alert-danger text-start">

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

<div class="academy-apply-introduction mb-4">

    <div class="academy-apply-introduction-icon">

        <i class="bi bi-mortarboard-fill"></i>

    </div>

    <div class="text-start">

        <h4>

            {{ __('Dear Applicant') }}

        </h4>

        <p class="mb-0">

            {{ __('If you would like to join one of our academy classes, please complete the application form below carefully. Providing accurate information will help our administration team review your application and place you in the appropriate academic program.') }}

        </p>

    </div>

</div>

                    <!-- FORM -->

                    <form
                        action="{{ route('academy.apply.submit') }}"
                        method="POST"
                        enctype="multipart/form-data"
                    >

                        @csrf


                        <div class="row g-3">


                            {{-- =====================================================
                                 FIRST NAME
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="text"
                                    name="first_name"
                                    value="{{ old('first_name') }}"
                                    class="form-control border-0"
                                    placeholder="{{ __('First Name') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 LAST NAME
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="text"
                                    name="last_name"
                                    value="{{ old('last_name') }}"
                                    class="form-control border-0"
                                    placeholder="{{ __('Last Name') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 GENDER
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <select
                                    name="gender"
                                    class="form-select border-0"
                                    style="height:55px;"
                                    required
                                >

                                    <option value="">

                                        {{ __('Select Gender') }}

                                    </option>

                                    <option
                                        value="male"
                                        @selected(old('gender') === 'male')
                                    >

                                        {{ __('Male') }}

                                    </option>

                                    <option
                                        value="female"
                                        @selected(old('gender') === 'female')
                                    >

                                        {{ __('Female') }}

                                    </option>

                                </select>

                            </div>



                            {{-- =====================================================
                                 DATE OF BIRTH
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="date"
                                    name="date_of_birth"
                                    value="{{ old('date_of_birth') }}"
                                    class="form-control border-0"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 EMAIL
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control border-0"
                                    placeholder="{{ __('Email Address') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>

                            {{-- =====================================================
                                PASSWORD
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control border-0"
                                    placeholder="{{ __('Password') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>


                            {{-- =====================================================
                                CONFIRM PASSWORD
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="password"
                                    name="password_confirmation"
                                    class="form-control border-0"
                                    placeholder="{{ __('Confirm Password') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 PHONE
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="form-control border-0"
                                    placeholder="{{ __('Phone Number') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 ADDRESS
                            ====================================================== --}}

                            <div class="col-12">

                                <input
                                    type="text"
                                    name="address"
                                    value="{{ old('address') }}"
                                    class="form-control border-0"
                                    placeholder="{{ __('Address') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 EMERGENCY CONTACT NAME
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="text"
                                    name="emergency_contact_name"
                                    value="{{ old('emergency_contact_name') }}"
                                    class="form-control border-0"
                                    placeholder="{{ __('Emergency Contact Name') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 EMERGENCY CONTACT PHONE
                            ====================================================== --}}

                            <div class="col-12 col-sm-6">

                                <input
                                    type="text"
                                    name="emergency_contact_phone"
                                    value="{{ old('emergency_contact_phone') }}"
                                    class="form-control border-0"
                                    placeholder="{{ __('Emergency Contact Phone') }}"
                                    style="height:55px;"
                                    required
                                >

                            </div>



                            {{-- =====================================================
                                 CLASS
                            ====================================================== --}}

                            <div class="col-12">

                                <select
                                    name="class_id"
                                    class="form-select border-0"
                                    style="height:55px;"
                                    required
                                >

                                    <option value="">

                                        {{ __('Select Your Class') }}

                                    </option>


                                    @foreach($classes as $class)

                                        @php

                                            $classTitle =
                                                $class->translations
                                                    ->first()?->title
                                                ?? $class->class_code;

                                        @endphp


                                        <option
                                            value="{{ $class->id }}"
                                            @selected(old('class_id') == $class->id)
                                        >

                                            {{ $classTitle }}

                                            @if($class->class_code)

                                                — {{ $class->class_code }}

                                            @endif

                                        </option>

                                    @endforeach

                                </select>

                            </div>



                            {{-- =====================================================
                                 PROFILE IMAGE
                            ====================================================== --}}

                            <div class="col-12 text-start">

                                <label class="form-label">

                                    {{ __('Profile Image') }}

                                </label>


                                <input
                                    type="file"
                                    name="profile_image"
                                    class="form-control border-0"
                                    accept="image/*"
                                >

                            </div>



                            {{-- =====================================================
                                 NOTES
                            ====================================================== --}}

                            <div class="col-12">

                                <textarea
                                    name="notes"
                                    class="form-control border-0"
                                    placeholder="{{ __('Additional Notes') }}"
                                    rows="5"
                                >{{ old('notes') }}</textarea>

                            </div>



                            {{-- =====================================================
                                 SUBMIT
                            ====================================================== --}}

                            <div class="col-12">

                                <button
                                    class="btn btn-primary w-100 py-3"
                                    type="submit"
                                >

                                    <i class="bi bi-send-fill me-2"></i>

                                    {{ __('Submit Application') }}

                                </button>

                            </div>


                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- Apply Form End -->


@endsection
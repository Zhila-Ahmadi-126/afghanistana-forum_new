@extends('layouts.website')

@section('content')


<style>
         body{
    background-image: url("assets/img/bg/bac2.jpg");
    background-size: 100% 100% ;
     background-repeat: repeat;
      justify-content: center;
  
}
    .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("assets/img/bg/home_11.jpg") center center no-repeat;
    background-size: 100% 120%;
}
/* Membership Application Form */

form label {
    font-size: 0.82rem;
    font-weight: 500;
    color: #6c757d;
    margin-bottom: 6px;
}

form .form-control,
form .form-select {
    font-size: 0.88rem;
    color: #495057;
}

form .form-control::placeholder {
    color: #adb5bd;
    font-size: 0.78rem;
    opacity: 1;
}

form textarea.form-control {
    font-size: 0.88rem;
}

form small {
    font-size: 0.72rem;
}
</style>
<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->



<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 py-5">
    <div class="container ml-5"  >
        <div style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;  ">
            <h1 class="display-3 text-white mb-3 animated slideInDown"> Member Application</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase"> 
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            
                            <li class="breadcrumb-item text-white active" aria-current="page">Member Application</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->
  




            
    <!-- Booking Start -->
    <div class="container-fluid my-5 px-0">
     
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" style="margin-top: -6rem;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light text-center p-5">
                      <h1 class="mb-4">Membership Application Form</h1>
                     <form action="{{ route('member.application.submit') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="row g-3">

        {{-- First Name --}}
        <div class="col-12 col-sm-6">
            <label for="first_name" class="form-label text-start d-block small text-dark">
                First Name
            </label>

            <input
                type="text"
                id="first_name"
                name="first_name"
                class="form-control border-0"
                placeholder="Enter your first name"
                value="{{ old('first_name') }}"
                required>
        </div>


        {{-- Surname --}}
        <div class="col-12 col-sm-6">
            <label for="surname" class="form-label text-start d-block small text-dark">
                Surname
            </label>

            <input
                type="text"
                id="surname"
                name="surname"
                class="form-control border-0"
                placeholder="Enter your family name"
                value="{{ old('surname') }}"
                required>
        </div>


        {{-- Date of Birth --}}
        <div class="col-12 col-sm-6">
            <label for="date_of_birth" class="form-label text-start d-block small text-dark">
                Date of Birth
            </label>

            <input
                type="date"
                id="date_of_birth"
                name="date_of_birth"
                class="form-control border-0"
                value="{{ old('date_of_birth') }}"
                required>
        </div>


        {{-- Residence --}}
        <div class="col-12 col-sm-6">
            <label for="residence" class="form-label text-start d-block small text-dark">
                Place of Residence
            </label>

            <input
                type="text"
                id="residence"
                name="residence"
                class="form-control border-0"
                placeholder="Enter your city and country"
                value="{{ old('residence') }}"
                required>
        </div>


        {{-- Postal Code --}}
        <div class="col-12 col-sm-6">
            <label for="postal_code" class="form-label text-start d-block small text-dark">
                Postal Code
            </label>

            <input
                type="text"
                id="postal_code"
                name="postal_code"
                class="form-control border-0"
                placeholder="Enter your postal code"
                value="{{ old('postal_code') }}"
                required>
        </div>


        {{-- Education --}}
        <div class="col-12 col-sm-6">
            <label for="education" class="form-label text-start d-block small text-dark">
                Education
            </label>

            <input
                type="text"
                id="education"
                name="education"
                class="form-control border-0"
                placeholder="Enter your highest qualification"
                value="{{ old('education') }}"
                required>
        </div>


        {{-- Current Position --}}
        <div class="col-12 col-sm-6">
            <label for="current_position" class="form-label text-start d-block small text-dark">
                Current Position
            </label>

            <input
                type="text"
                id="current_position"
                name="current_position"
                class="form-control border-0"
                placeholder="Enter your current position"
                value="{{ old('current_position') }}"
                required>
        </div>


        {{-- Phone --}}
        <div class="col-12 col-sm-6">
            <label for="phone" class="form-label text-start d-block small text-dark">
                Phone Number
            </label>

            <input
                type="tel"
                id="phone"
                name="phone"
                class="form-control border-0"
                placeholder="Enter your phone number"
                value="{{ old('phone') }}"
                required>
        </div>


        {{-- Email --}}
        <div class="col-12">
            <label for="email" class="form-label text-start d-block small text-dark">
                Email Address
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control border-0"
                placeholder="Enter your email address"
                value="{{ old('email') }}"
                required>
        </div>


        {{-- Legal Experience --}}
        <div class="col-12">
            <label for="legal_service_duration" class="form-label text-start d-block small text-dark">
                Legal Service Experience
            </label>

            <input
                type="text"
                id="legal_service_duration"
                name="legal_service_duration"
                class="form-control border-0"
                placeholder="Enter your legal work experience"
                value="{{ old('legal_service_duration') }}"
                required>
        </div>


        {{-- Photo --}}
        <div class="col-12">

            <label for="photo" class="form-label text-start d-block small text-dark">
                Personal Photo
            </label>

            <div class="position-relative">

                <input
                    type="file"
                    id="photo"
                    name="photo"
                    class="form-control border-0"
                    accept="image/jpeg,image/png,image/webp"
                    required>

            </div>

            <small class="text-dark d-block text-start mt-1">
                Upload a clear photo of yourself.
            </small>

        </div>


        {{-- Motivation --}}
        <div class="col-12">

            <label for="motivation" class="form-label text-start d-block small text-dark">
                Motivation for Membership
            </label>

            <textarea
                id="motivation"
                name="motivation"
                class="form-control border-0"
                rows="4"
                placeholder="Tell us why you would like to join the Association"
                required>{{ old('motivation') }}</textarea>

        </div>


        {{-- Additional Information --}}
        <div class="col-12">

            <label for="description" class="form-label text-start d-block small text-dark">
                Additional Information
            </label>

            <textarea
                id="description"
                name="description"
                class="form-control border-0"
                rows="5"
                placeholder="Enter any additional information about yourself">{{ old('description') }}</textarea>

        </div>


        {{-- Agreement --}}
        <div class="col-12 text-start">

            <div class="form-check">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="agreement"
                    value="1"
                    id="membershipAgreement"
                    required>

                <label
                    class="form-check-label small text-dark"
                    for="membershipAgreement">

                    I confirm that I have read and accept the
                    Statutes of the Association of Afghan Lawyers in Europe.

                </label>

            </div>

        </div>


        {{-- Submit --}}
        <div class="col-12">

            <button
                class="btn btn-primary w-100 py-3"
                type="submit">

                Submit Application

            </button>

        </div>

    </div>

</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->



   


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


</body>

</html>
@endsection
@extends('layouts.website')

@section('content')

<section class="py-5" style="min-height: 70vh; display:flex; align-items:center;">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div
                    class="text-center p-5"
                    style="
                        background: rgba(20, 35, 55, 0.55);
                        backdrop-filter: blur(8px);
                        -webkit-backdrop-filter: blur(8px);
                        border: 1px solid rgba(255,255,255,.5);
                        border-radius: 35px;
                        box-shadow: 0 15px 40px rgba(0,0,0,.15);
                    "
                >

                    <div
                        class="d-flex align-items-center justify-content-center mx-auto mb-4"
                        style="
                            width:80px;
                            height:80px;
                            border-radius:50%;
                            background: linear-gradient(135deg,#1769aa,#5b4bb7);
                        "
                    >
                        <i class="fa fa-check text-white fa-2x"></i>
                    </div>

                    <h1 class="text-white mb-3">
                        Thank You!
                    </h1>

                    <h4 class="text-white mb-4">
                        Your email has been successfully registered.
                    </h4>

                    <p class="text-white mb-4">
                        Thank you for joining our community.
                        You will receive our latest news, announcements,
                        reports, seminars and important updates by email.
                    </p>

                    <a
                        href="{{ route('index') }}"
                        class="btn px-4 py-3"
                        style="
                            border-radius:30px;
                            background: linear-gradient(135deg,#1769aa,#5b4bb7);
                            color:white;
                            font-weight:600;
                        "
                    >
                        <i class="fa fa-home me-2"></i>
                        Back to Home
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection
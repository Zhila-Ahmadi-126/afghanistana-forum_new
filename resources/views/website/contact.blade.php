@extends('layouts.website')

@section('content')

 <style>
     .page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("/assets/img/contact/contact_1.jpg") center center no-repeat;
    background-size: 100% 100%;
     
}
.contact-modal-overlay{

    position:fixed;
    inset:0;

    background:rgba(0,0,0,0.45);

    backdrop-filter:blur(8px);

    display:flex;
    justify-content:center;
    align-items:center;

    z-index:9999;

}



.contact-modal{

    width:90%;
    max-width:450px;

    padding:35px;

    background:rgba(255,255,255,0.15);

    backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,0.3);

    border-radius:20px;

    color:white;

    text-align:center;

    box-shadow:0 20px 50px rgba(0,0,0,.3);

}



.close-modal{

    position:absolute;

    right:25px;
    top:15px;

    border:none;

    background:none;

    color:white;

    font-size:30px;

    cursor:pointer;

}
.contact-intro {

    position: relative;

}


.contact-badge {

    display: inline-flex;

    align-items: center;

    gap: 10px;

    padding: 10px 18px;

    margin-bottom: 20px;

    border-radius: 50px;

    background: rgba(13,110,253,0.08);

    color: #0d6efd;

    font-size: 14px;

    font-weight: 600;

    letter-spacing: .3px;

}



.contact-intro h1 {

    font-weight: 700;

    font-size: 42px;

    color: #1b1f2a;

}



.contact-intro p {

    color: #6c757d;

    line-height: 1.9;

    font-size: 16px;

}



.contact-highlight {

    margin: 25px 0;

    padding: 25px;

    border-radius: 18px;

    background: rgba(255,255,255,0.55);

    border: 1px solid rgba(13,110,253,0.12);

    box-shadow: 0 10px 30px rgba(0,0,0,0.05);

    backdrop-filter: blur(12px);

}



.contact-footer-text {

    font-weight: 600;

    color: #212529 !important;

    padding-left: 20px;

    border-left: 4px solid #0d6efd;

}
 </style>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 py-5" style="height:300px">
    <div class="container ml-5"   >
        <div style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;   ">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            
                            <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->



<!-- Contact Start -->
<div class="container-xxl ">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 mb-5">
                <h6 class="text-secondary text-uppercase">
                    Get In Touch
                </h6>


                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.3615164515572!2d5.630478123524125!3d51.46987817180479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7214ea6027b73%3A0x7a6f2862b0fc1a0a!2zVmFuIFNvbWVyZW4tRG93bmVybGFhbiA0NiwgNTcwNyBLTCBIZWxtb25kLCDZh9mE2YbYrw!5e0!3m2!1sfa!2s!4v1786134373285!5m2!1sfa!2s"
                     width="600" 
                     height="450"
                      style="border:0;"
                       allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe> -->


                
                <iframe class="position-relative w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2485.3615164515572!2d5.630478123524125!3d51.46987817180479!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c7214ea6027b73%3A0x7a6f2862b0fc1a0a!2zVmFuIFNvbWVyZW4tRG93bmVybGFhbiA0NiwgNTcwNyBLTCBIZWxtb25kLCDZh9mE2YbYrw!5e0!3m2!1sfa!2s!4v1786134373285!5m2!1sfa!2s"
                     width="600" 
                    frameborder="0"
                    style="height:300px;border:0;"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0">
                </iframe>

            </div>
        </div>


        <div class="row g-4 mt-5">


           <div class="col-sm-6 contact-intro ">

                    <div class="contact-badge">
                        <i class="fa fa-balance-scale"></i>
                        The Nationwide Association of Afghan Jurists in Europe
                    </div>


                    <h1 class="mb-4">
                        Contact Us
                    </h1>


                    <p>
                        Thank you for connecting with the The Nationwide Association of Afghan Jurists in Europe.
                        We warmly welcome communication from legal professionals, researchers,
                        academics, students, institutions, and everyone interested in the field of law.
                    </p>


                    <p>
                        If you have any questions, suggestions, feedback, or would like to
                        collaborate with us, please feel free to contact us through the communication
                        channels provided on this page. We are committed to responding to your
                        inquiries as promptly as possible.
                    </p>


                    <div class="contact-highlight">

                        <p>
                            The Nationwide Association of Afghan Jurists in Europe is dedicated to promoting legal knowledge,
                            strengthening academic and professional cooperation, and providing access
                            to reliable legal resources.
                        </p>

                        <p class="mb-0">
                            We believe that effective communication with the legal community in Afghanistan
                            and around the world is one of our core values. Your feedback and suggestions
                            play an important role in helping us improve our services and further develop
                            our activities.
                        </p>

                    </div>


                    <p class="contact-footer-text">
                        We look forward to hearing from you and appreciate your valuable support and cooperation.
                    </p>


                </div>



            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">

                <div class="bg-light p-5 h-100 d-flex align-items-center">


                   <form action="{{ route('contact.store') }}" method="POST">

    @csrf

    <div class="row g-3">

     <h1>Contact form</h1>


        <div class="col-md-6">

            <div class="form-floating">

                <input type="text"
                       name="name"
                       class="form-control"
                       id="name"
                       value="{{ old('name') }}"
                       placeholder="Your Name">

                <label for="name">
                    Your Name
                </label>

            </div>

        </div>



        <div class="col-md-6">

            <div class="form-floating">

                <input type="email"
                       name="email"
                       class="form-control"
                       id="email"
                       value="{{ old('email') }}"
                       placeholder="Your Email">

                <label for="email">
                    Your Email
                </label>

            </div>

        </div>



        <div class="col-12">

            <div class="form-floating">

                <input type="text"
                       name="subject"
                       class="form-control"
                       id="subject"
                       value="{{ old('subject') }}"
                       placeholder="Subject">

                <label for="subject">
                    Subject
                </label>

            </div>

        </div>




        <div class="col-12">

            <div class="form-floating">

                <textarea name="message"
                          class="form-control"
                          placeholder="Leave a message here"
                          id="message"
                          style="height:150px">{{ old('message') }}</textarea>


                <label for="message">
                    Message
                </label>

            </div>

        </div>




        <div class="col-12">

            <button class="btn btn-primary w-100 py-3"
                    type="submit">

                Send Message

            </button>

        </div>


    </div>


</form>


                </div>

            </div>


        </div>

    </div>

</div>
<!-- Contact End -->

@if(session('success'))

<div class="contact-modal-overlay" id="contactModal">

    <div class="contact-modal">

        <button class="close-modal"
                onclick="closeContactModal()">
            ×
        </button>


        <h3>
            Thank You!
        </h3>


        <p>
            Thank you for contacting us.
            We will review your message as soon as possible.
            If a response is required, we will reply to your email.
        </p>


        <button class="btn btn-primary"
                onclick="closeContactModal()">
            Close
        </button>


    </div>

</div>


<script>

function closeContactModal(){

    document.getElementById('contactModal').style.display='none';

}

</script>

@endif


<!-- Back to Top -->
<a href="#"
   class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top">

    <i class="bi bi-arrow-up"></i>

</a>



@endsection
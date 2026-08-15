@extends('layouts.website')

@section('content')
<!DOCTYPE html>
<html lang="en">



<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


  




    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" style="width: 100%; height: 700px;" src="assets/img/index_img//home_11.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start" >
                            <div class="col-10 col-lg-8" style="background-color:rgba(46, 73, 79, 0.434) ;border-radius: 40px;border: 1px solid white;" >
                                <h5 class="text-white text-uppercase mb-3  mt-3 animated slideInDown">Welcome to the</h5>
                                <h1 class="display-6 text-white animated slideInDown mb-4">Afghanistan Lawyers Association</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Your trusted gateway to Afghanistan's laws, legal systems, and professional legal services, 
                                    promoting easy access to reliable legal information and public legal awareness.</p>
                                <a href="" style="border-radius: 30px;" class="btn btn-primary py-md-3 px-md-5 me-3 animated mb-3 slideInLeft">Read More</a>
                                <a href="" style="border-radius: 30px;" class="btn btn-secondary py-md-3 px-md-5 animated mb-3 slideInRight">Donate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" style="width: 100%; height: 700px;" src="assets/img/index_img//homw222.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8" style="background-color:rgba(111, 99, 64, 0.334) ;border-radius: 40px;border: 1px solid white;">
                                <h5 class="text-white text-uppercase mb-3  mt-3 animated slideInDown">Legal Resources</h5>
                                <h1 class="display-5 text-white animated slideInDown mb-4">News, Documents & Research</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Stay informed with the latest legal news,
                                     official documents, research papers, and trusted academic resources—all in one place.</p>
                                <a href="" style="border-radius: 30px;" class="btn btn-primary py-md-3 px-md-5 me-3 animated mb-3 slideInLeft">Explore Resources</a>
                                <a href="" style="border-radius: 30px;" class="btn btn-secondary py-md-3 px-md-5 animated mb-3 slideInRight">Donate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" style="width: 100%; height: 700px;" src="assets/img/index_img//acdemy.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8" style="background-color:rgba(209, 205, 86, 0.134);border-radius: 40px;border: 1px solid white;">
                                <h5 class="text-white text-uppercase mb-3  mt-3 animated slideInDown"> Legal Academy</h5>
                                <h1 class="display-5 text-white animated slideInDown mb-4">Professional Legal Education</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">Advance your legal knowledge and professional skills through specialized courses, workshops,
                                     and educational programs designed for legal professionals.</p>
                                <a href="" style="border-radius: 30px;" class="btn btn-primary py-md-3 px-md-5 me-3 animated mb-3 slideInLeft">Join Academy</a>
                                <a href="" style="border-radius: 30px;" class="btn btn-secondary py-md-3 px-md-5 mb-3 animated slideInRight">Donate</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">About Us</h6>
                    <h1 class="mb-4"> National Association of Legal Professionals of Afghanistan</h1>
                    <p class="mb-4">The National Association of Legal Professionals of Afghanistan is an educational
                         and information platform dedicated to collecting, preserving, and publishing reliable legal
                          and academic resources. Our mission is to provide easy, fast, and trusted access
                         to information while promoting legal awareness, education, and professional
                          development across Afghanistan.</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Legal Resources, Laws, and Legal Systems</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Official Announcements, News, and Latest Updates</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Academy of Legal Studies and Professional Education</p>
                    <div class="bg-primary d-flex align-items-center p-4 mt-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <p class="fs-5 fw-medium mb-2 text-white">Contact us 24/7</p>
                            <h3 class="m-0 text-secondary">0987654323</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/index_img//home_1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="assets/img/index_img//ab_3.jpg" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5 bg-warning">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Legal Systemse</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Expert Technicians</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Satisfied Clients</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-wrench fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                    <p class="text-white mb-0">Compleate Projects</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <div class="container-fluid py-3 px-3 px-lg-0">
        <div class="row g-0">
            <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-90deg);">Legal Systems</h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="ms-lg-2 ps-lg-2">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase ml-2">Legal Areas Covered</h6>
                        <h1 class="mb-5">Legal System of Afghanistan and Other Countries</h1>
                    </div>
                       <!-- Service Start -->
                            <!-- <div class="container-xxl py-0"> -->
                                <!-- <div class="container"> -->
                                    <div class="row p-0 m-0 ">

                                        @forelse($legalSystems as $legalSystem)

                                            @php
                                                $translation = $legalSystem->translations->first();
                                            @endphp

                                            @if($translation)
                                                <div class="col-lg-6 col-md-6 service-item-top wow fadeInUp"
                                                    data-wow-delay="0.1s">

                                                    {{-- Image --}}
                                                    <div class="overflow-hidden">
                                                        <img
                                                            class="img-fluid "style="width: 100%; height: 400px;"
                                                            src="{{ asset('storage/' . $legalSystem->image) }}"
                                                            alt="{{ $translation->title }}"
                                                        >
                                                    </div>

                                                    {{-- Content --}}
                                                    <div class="justify-content-between bg-light p-4">

                                                        <h5 class="text-truncate me-3 mb-0">
                                                            {{ $translation->title }}
                                                        </h5>

                                                        <p class="mb-4 d-flex align-items-center justify-content-between">
                                                            {{ Str::limit($translation->summary, 120) }}
                                                        </p>

                                                        {{-- Single Page --}}
                                                        <a
                                                            class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0"
                                                            href="#"
                                                        >
                                                            <i class="fa fa-arrow-right"></i>
                                                        </a>

                                                    </div>
                                                </div>
                                            @endif

                                        @empty

                                            <div class="col-12 text-center">
                                                <p>No legal systems available.</p>
                                            </div>

                                        @endforelse

                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
   
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

      
    <!-- About Start -->
    <!-- <div class="container py-0 "> -->
        <!-- <div class="co w-100 bg-info"> -->
            <div class="row p-5 m-0">
                
                <div class="col-lg-4 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/index_img//home_1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <!-- <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="assets/img/index_img//ab_3.jpg" style="object-fit: cover;" alt=""> -->
                    </div>
                </div>
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                     
                   
                    <h6 class="text-secondary text-uppercase">About News </h6>
                    <h1 class="mb-4">Latest News and Developments
                                        </h1>
                                    <p class="mb-4">Stay informed about the latest legal, social,
                                         and educational news and developments in Afghanistan and around the world. Explore important updates
                                         related to the legal system, legal professionals, institutions, and key events shaping society.</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Legal Professionals & Events</p>
                    <p>Stay updated on important developments, changes, and discussions related to Afghanistan’s legal systems and institutions.</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Legal Professionals & Events</p>
                    <p>Discover news, activities, achievements, and events involving lawyers, legal experts, and professionals in the field of law.</p>

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Full Videos on YouTube</p>
                    <p>Watch the full coverage of important events, interviews, discussions, and programs on our YouTube channel.</p>

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Read More</p>
                    <p>Explore the full story, including complete details, related information, and additional content about each news item.. <a href="#">Read more</a></p>

                  
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
    <!-- About End -->
       <!-- About Start -->
    <!-- <div class="container py-0 "> -->
        <!-- <div class="co w-100 bg-info"> -->
            <div class="row p-5 ">
                
                
                <div class="col-lg-8 pl-5 wow fadeInUp" data-wow-delay="0.1s">
                     
                   
                    <h6 class="text-secondary text-uppercase">About Archive </h6>
                    <h1 class="mb-4">Members and Activities Archive
                                        </h1>
                                    <p class="mb-4">An overview of the former and current members of 
                                        the Afghanistan National Association of
                                         Legal Professionals, featuring a collection of their articles, activities,
                                         and academic and professional records throughout the years of the Association’s work.</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Former and current members of the Association and their activities throughout different years</p>
                  
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Articles, publications, and academic and professional activities of the Association’s members</p>
                   

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Access and search members’ records and the Association’s activities by year and period of service</p>
                    

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i><a href="#">Read more</a></p>
                

                  
                </div>
                <div class="col-lg-4  " style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/index_img//home_1.jpg" style="object-fit: cover; " alt="">
                        <!-- <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="assets/img/index_img//ab_3.jpg" style="object-fit: cover;" alt=""> -->
                    </div>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->
    <!-- About End -->

      <div class="row p-5 m-0">
                 <div class="col-lg-4 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/index_img//home_1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <!-- <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="assets/img/index_img//ab_3.jpg" style="object-fit: cover;" alt=""> -->
                    </div>
                </div>
                
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                     
                   
                    <h6 class="text-secondary text-uppercase">About Media </h6>
                    <h1 class="mb-4">Media
                                        </h1>
                                    <p class="mb-4">A collection of media appearances, reports, 
                                        and visual content related to the Afghanistan National
                                         Association of Legal Professionals across various media
                                          platforms.</p>

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Media coverage and public recognition 
                    of the activities of the Afghanistan 
                    National Association of Legal Professionals through reputable media outlets</p>
         
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Watch videos and programs related
                     to the Afghanistan Lawyers Association on our official YouTube channel</p>
                  

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>The presence and coverage of the Afghanistan Lawyers Association on media outlets such as Amu TV and other public media platforms.</p>

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i> <a href="#">Read more</a></p>
             

                  
                </div>
               
            </div>



             <div class="row p-5 ">
                
                
                <div class="col-lg-8 pl-5 wow fadeInUp" data-wow-delay="0.1s">
                     
                   
                    <h6 class="text-secondary text-uppercase">About Announcements </h6>
                    <h1 class="mb-4">Official Announcements
                                        </h1>
                                    <p class="mb-4">The official source for announcements, calls, programs,
                                         and statements 
                                        of the Afghanistan Lawyers Association, 
                                        providing information about important events and activities of the Association.</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Official announcements and calls regarding the Association’s programs, activities, and important matters</p>
                  
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Announcements of seminars, meetings, programs, and online and in-person events organized by the Association</p>
                   

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Publication of the Association’s official views, positions, and statements on legal and social issues</p>
                    

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i><a href="#">Read more</a></p>
                

                  
                </div>
                <div class="col-lg-4  " style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/index_img//home_1.jpg" style="object-fit: cover; " alt="">
                        <!-- <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="assets/img/index_img//ab_3.jpg" style="object-fit: cover;" alt=""> -->
                    </div>
                </div>
            </div>


              <div class="row p-5 m-0">
                 <div class="col-lg-4 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="assets/img/index_img//home_1.jpg" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <!-- <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="assets/img/index_img//ab_3.jpg" style="object-fit: cover;" alt=""> -->
                    </div>
                </div>
                
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                     
                   
                    <h6 class="text-secondary text-uppercase">About Academy </h6>
                    <h1 class="mb-4">Academy
                                        </h1>
                                    <p class="mb-4">An educational platform offering specialized courses and 
                                        programs across various departments, bringing together instructors and 
                                        students while providing an organized learning path from the beginning of 
                                        a course through assessment and certification. The Academy’s primary focus is on 
                                        education and knowledge development within the Legal Systems Department,
                                         alongside other educational fields.</p>

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>A variety of educational courses 
                    and departments for learning and developing specialized skills</p>
         
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Qualified instructors and students in
                     an organized and interactive learning environment</p>
                  

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Management of subjects, curricula, schedules, assignments,
                     and academic assessments</p>

                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i> <a href="#">Read more</a></p>
             

                  
                </div>
               
            </div>


            
    <!-- Booking Start -->
    <div class="container-fluid my-5 px-0">
        <div class="video wow fadeInUp" data-wow-delay="0.1s">
            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                <span></span>
            </button>

            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- 16:9 aspect ratio -->
                            <div class="ratio ratio-16x9">
                                <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                    allow="autoplay"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="text-white mb-4">Emergency Plumbing Service</h1>
            <h3 class="text-white mb-0">24 Hours 7 Days a Week</h3>
        </div>
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" style="margin-top: -6rem;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light text-center p-5">
                        <h1 class="mb-4">Book For A Service</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control border-0" placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control border-0" placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select class="form-select border-0" style="height: 55px;">
                                        <option selected>Select A Service</option>
                                        <option value="1">Service 1</option>
                                        <option value="2">Service 2</option>
                                        <option value="3">Service 3</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date1" data-target-input="nearest">
                                        <input type="text"
                                            class="form-control border-0 datetimepicker-input"
                                            placeholder="Service Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control border-0" placeholder="Special Request"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Our Technicians</h6>
                <h1 class="mb-5">Our Expert Technicians</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/img/team-1.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/img/team-2.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/img/team-3.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="/assets/img/team-4.jpg" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">Full Name</h5>
                                <small>Designation</small>
                            </div>
                            <div class="bg-primary">
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">Testimonial</h6>
                <h1 class="mb-5">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="/assets/img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Client Name</h5>
                    <p class="m-0">Profession</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="/assets/img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Client Name</h5>
                    <p class="m-0">Profession</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="/assets/img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Client Name</h5>
                    <p class="m-0">Profession</p>
                </div>
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="/assets/img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Client Name</h5>
                    <p class="m-0">Profession</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


   


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


</body>

</html>
@endsection
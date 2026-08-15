@extends('layouts.website')

@section('content')


<style>
 body{
   
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


    

    box-shadow:
        0 0 25px rgba(50, 165, 255, 0.12),
        inset 0 1px 0 rgba(255,255,255,0.18);

    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
  
}
.page-header {
    background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
                url("/assets/img/News/newss.jpg") center center no-repeat;
    background-size:  100% 100%;
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





/* =========================================================
   NEWS INDEX
========================================================= */

.news-index-section {
    position: relative;
    padding: 80px 0;
    background:
        radial-gradient(circle at 10% 10%, rgba(12, 52, 92, .08), transparent 30%),
        radial-gradient(circle at 90% 80%, rgba(20, 70, 120, .07), transparent 30%),
        #f8fafc;
    overflow: hidden;
}


/* Heading */

.news-heading {
    max-width: 800px;
    margin: 0 auto;
}

.news-eyebrow {
    display: inline-flex;
    align-items: center;
    padding: 9px 18px;
    border-radius: 40px;

    background: rgba(10, 45, 80, .08);
    border: 1px solid rgba(10, 45, 80, .12);

    color: #0b355d;
    font-size: .78rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;

    animation: newsFadeDown .7s ease both;
}

.news-main-title {
    margin-top: 18px;
    margin-bottom: 15px;

    color: #082b4c;
    font-size: clamp(2rem, 4vw, 3.5rem);
    font-weight: 800;
    letter-spacing: -1px;

    animation: newsFadeUp .8s ease both;
}

.news-intro {
    max-width: 680px;
    margin: auto;

    color: #667085;
    font-size: .95rem;
    line-height: 1.9;

    animation: newsFadeUp 1s ease both;
}


/* Card */

.news-card {
    position: relative;
    height: 100%;
    overflow: hidden;

    background: rgba(255, 255, 255, .72);

    border: 1px solid rgba(8, 43, 76, .09);
    border-radius: 35px;

    box-shadow:
        0 15px 45px rgba(8, 43, 76, .07);

    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);

    transition:
        transform .45s cubic-bezier(.2,.8,.2,1),
        box-shadow .45s ease,
        border-color .45s ease;

    animation: newsCardAppear .8s ease both;
}

.news-card:hover {
    transform: translateY(-10px);

    border-color: rgba(8, 43, 76, .2);

    box-shadow:
        0 25px 65px rgba(8, 43, 76, .15);
}


/* Image */

.news-image-wrapper {
    position: relative;
    height: 245px;
    margin: 10px;

    overflow: hidden;
    border-radius: 28px;

    background: #e9eef4;
}

.news-image {
    width: 100%;
    height: 100%;

    object-fit: cover;

    transition:
        transform .7s cubic-bezier(.2,.8,.2,1),
        filter .5s ease;
}

.news-card:hover .news-image {
    transform: scale(1.07);
    filter: brightness(.86);
}


/* No Image */

.news-no-image {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: center;

    background:
        linear-gradient(135deg, #082b4c, #164d78);

    color: rgba(255,255,255,.8);

    font-size: 3.5rem;
}


/* Media Badge */

.news-media-badge {
    position: absolute;
    top: 18px;
    left: 18px;

    padding: 7px 13px;

    border-radius: 30px;

    background: rgba(5, 25, 45, .72);
    border: 1px solid rgba(255,255,255,.18);

    color: #fff;

    font-size: .7rem;
    font-weight: 600;

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}


/* Content */

.news-card-content {
    padding: 20px 25px 26px;
}

.news-date {
    margin-bottom: 12px;

    color: #718096;
    font-size: .72rem;
    font-weight: 600;
}

.news-date i {
    color: #0b4a7c;
}


/* Title */

.news-title {
    margin-bottom: 12px;

    color: #102f4d;

    font-size: 1.25rem;
    line-height: 1.45;
    font-weight: 750;

    transition: color .3s ease;
}

.news-card:hover .news-title {
    color: #064f83;
}


/* Description */

.news-description {
    margin-bottom: 15px;

    color: #687789;

    font-size: .84rem;
    line-height: 1.8;

    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}


/* Source */

.news-source {
    margin-bottom: 20px;

    color: #8793a0;

    font-size: .72rem;
    font-weight: 600;
}


/* Read More */

.news-read-more {
    position: relative;

    display: flex;
    align-items: center;
    justify-content: space-between;

    width: 100%;

    padding: 10px 10px 10px 16px;

    border-radius: 30px;

    text-decoration: none;

    color: #082b4c;

    background: rgba(8, 43, 76, .055);

    border: 1px solid rgba(8, 43, 76, .07);

    font-size: .78rem;
    font-weight: 700;

    overflow: hidden;

    transition:
        background .35s ease,
        color .35s ease,
        transform .35s ease;
}

.news-read-more::before {
    content: "";

    position: absolute;
    left: 0;
    bottom: 0;

    width: 0;
    height: 2px;

    background: #0b4d7e;

    transition: width .4s ease;
}

.news-read-more:hover::before {
    width: 100%;
}

.news-read-more:hover {
    background: #082b4c;
    color: #fff;

    transform: translateX(2px);
}

.news-arrow {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(8, 43, 76, .1);

    transition:
        transform .35s ease,
        background .35s ease;
}

.news-read-more:hover .news-arrow {
    transform: translateX(4px);
    background: rgba(255,255,255,.16);
}


/* Empty */

.news-empty {
    padding: 70px 30px;

    text-align: center;

    background: rgba(255,255,255,.7);

    border: 1px solid rgba(8,43,76,.08);
    border-radius: 35px;

    box-shadow: 0 15px 40px rgba(8,43,76,.06);
}

.news-empty-icon {
    width: 70px;
    height: 70px;

    margin: 0 auto 20px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(8,43,76,.08);
    color: #082b4c;

    font-size: 1.7rem;
}

.news-empty h3 {
    color: #102f4d;
    font-size: 1.25rem;
}

.news-empty p {
    color: #7b8794;
    font-size: .85rem;
}


/* Animations */

@keyframes newsFadeDown {

    from {
        opacity: 0;
        transform: translateY(-15px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}

@keyframes newsFadeUp {

    from {
        opacity: 0;
        transform: translateY(25px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}

@keyframes newsCardAppear {

    from {
        opacity: 0;
        transform: translateY(30px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}


/* Mobile */

@media (max-width: 767px) {

    .news-index-section {
        padding: 55px 0;
    }

    .news-image-wrapper {
        height: 220px;
    }

    .news-card-content {
        padding: 18px 20px 22px;
    }

    .news-title {
        font-size: 1.1rem;
    }

}
.news-card {
    position: relative;
    overflow: hidden;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.72);
    border: 1px solid rgba(15, 45, 80, 0.10);
    box-shadow: 0 15px 40px rgba(10, 35, 65, 0.08);

    opacity: 0;
    transform: translateY(45px) scale(.97);

    animation: newsCardReveal .8s cubic-bezier(.22, 1, .36, 1) forwards;

    transition:
        transform .5s ease,
        box-shadow .5s ease,
        border-color .5s ease;
}

.news-card:nth-child(1) {
    animation-delay: .1s;
}

.news-card:nth-child(2) {
    animation-delay: .2s;
}

.news-card:nth-child(3) {
    animation-delay: .3s;
}

.news-card:nth-child(4) {
    animation-delay: .4s;
}

.news-card:nth-child(5) {
    animation-delay: .5s;
}

.news-card:nth-child(6) {
    animation-delay: .6s;
}

@keyframes newsCardReveal {

    from {
        opacity: 0;
        transform: translateY(45px) scale(.97);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}

.news-card:hover {
    transform: translateY(-12px) scale(1.015);
    box-shadow: 0 30px 65px rgba(8, 35, 70, 0.18);
    border-color: rgba(10, 55, 100, 0.25);
}
.news-image-wrapper {
    overflow: hidden;
    border-radius: 30px 30px 0 0;
}

.news-image {
    width: 100%;
    height: 245px;
    object-fit: cover;

    transition:
        transform .8s cubic-bezier(.22, 1, .36, 1),
        filter .5s ease;
}

.news-card:hover .news-image {
    transform: scale(1.08);
    filter: brightness(.82);
}
.news-read-more {
    display: flex;
    align-items: center;
    justify-content: space-between;

    margin-top: 25px;
    padding: 13px 17px;

    border-radius: 18px;

    background: #0b2d52;
    color: #fff !important;

    font-weight: 700;
    font-size: 15px;
    text-decoration: none;

    box-shadow: 0 8px 20px rgba(11, 45, 82, .18);

    transition:
        transform .35s ease,
        box-shadow .35s ease,
        background .35s ease;
}

.news-read-more:hover {
    background: #123f70;
    transform: translateX(5px);
    box-shadow: 0 12px 28px rgba(11, 45, 82, .28);
}

.news-arrow {
    width: 36px;
    height: 36px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: rgba(255,255,255,.15);

    transition: transform .35s ease;
}

.news-read-more:hover .news-arrow {
    transform: translateX(5px);
}
/* ===============================
   NEWS SEARCH & FILTER
================================ */

.news-filter-container {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto 45px;
}

.news-search-box {
    position: relative;
    height: 52px;
}

.news-search-box i {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 14px;
    color: #6d7b91;
    z-index: 2;
}

.news-search-input,
.news-date-filter {
    width: 100%;
    height: 52px;
    border: 1px solid rgba(12, 43, 78, 0.12);
    background: rgba(255, 255, 255, 0.85);
    color: #102d4f;
    border-radius: 30px;
    padding: 0 20px;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
}

.news-search-input {
    padding-left: 48px;
}

.news-search-input::placeholder {
    color: #8a96a6;
    font-size: 13px;
}

.news-search-input:focus,
.news-date-filter:focus {
    border-color: rgba(12, 61, 105, 0.45);
    box-shadow: 0 8px 25px rgba(9, 39, 70, 0.08);
}

.news-date-filter {
    cursor: pointer;
    appearance: auto;
}

.news-filter-button {
    width: 100%;
    height: 52px;
    border: none;
    border-radius: 30px;
    background: #0b3157;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.3px;
    cursor: pointer;
    transition: all 0.35s ease;
}

.news-filter-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(11, 49, 87, 0.22);
}
/* ===============================
   NEWS PAGINATION
================================ */

.news-pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 55px;
    padding-top: 25px;
}

.news-pagination-wrapper nav {
    display: flex;
    justify-content: center;
}

.news-pagination-wrapper .pagination {
    display: flex;
    align-items: center;
    gap: 7px;
    margin: 0;
}

.news-pagination-wrapper .page-link {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;

    border: 1px solid rgba(11, 49, 87, 0.12);
    border-radius: 50% !important;

    background: rgba(255, 255, 255, 0.9);
    color: #0b3157;

    font-size: 13px;
    font-weight: 600;

    transition: all 0.3s ease;
}

.news-pagination-wrapper .page-link:hover {
    background: #0b3157;
    color: #fff;
    border-color: #0b3157;
    transform: translateY(-3px);
    box-shadow: 0 8px 18px rgba(11, 49, 87, 0.16);
}

.news-pagination-wrapper .page-item.active .page-link {
    background: #0b3157;
    border-color: #0b3157;
    color: #fff;
    box-shadow: 0 7px 18px rgba(11, 49, 87, 0.18);
}

.news-pagination-wrapper .page-item.disabled .page-link {
    opacity: 0.4;
    background: #f4f6f8;
}
/* ===============================
   NEWS MEDIA TYPE ICONS
================================ */
.news-image-wrapper {
    position: relative;
    overflow: hidden;
}

.news-media-overlay {
    position: absolute;
    inset: 0;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;

    text-decoration: none;

    background: rgba(4, 28, 52, 0.12);

    z-index: 5;

    transition: all .4s ease;
}

.news-media-overlay:hover {
    background: rgba(4, 28, 52, 0.35);
}

.news-play-btn {
    width: 70px;
    height: 70px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #fff;

    background: rgba(5, 45, 80, .75);

    border: 1px solid rgba(255,255,255,.5);

    box-shadow:
        0 8px 25px rgba(0,0,0,.25),
        inset 0 1px 1px rgba(255,255,255,.3);

    backdrop-filter: blur(8px);

    font-size: 23px;

    transform: scale(.85);

    animation: newsIconPulse 2s infinite;

    transition: .35s ease;
}

.news-play-btn:hover {
    transform: scale(1.08);
    background: rgba(5, 55, 95, .95);
}

@keyframes newsIconPulse {

    0%, 100% {
        box-shadow:
            0 8px 25px rgba(0,0,0,.25),
            0 0 0 0 rgba(255,255,255,.2);
    }

    50% {
        box-shadow:
            0 10px 30px rgba(0,0,0,.3),
            0 0 0 10px rgba(255,255,255,.05);
    }
}

</style>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <div class="container ml-5 "  >
        <div   class=" p-3"  style="background-color:rgba(209, 205, 86, 0.134);border: 1px solid white;  ">
            <h1 class="display-3 text-white mb-3 animated slideInDown"> News</h1>
                    <nav aria-label="breadcrumb animated slideInDown">
                        <ol class="breadcrumb text-uppercase"> 
                            <li class="breadcrumb-item">
                                <a class="text-white" href="{{ route('index') }}">Home</a>
                            </li>
                            
                            <li class="breadcrumb-item text-white active" aria-current="page">News</li>
                        </ol>
                    </nav>
        </div>
        
    </div>
</div>
<!-- Page Header End -->
  
{{-- ================= NEWS INDEX SECTION ================= --}}

<div class="container py-5">

    {{-- Section Heading --}}
    <div class="news-heading  text-center mb-5">

        <span class="news-eyebrow">
            <i class="fa-solid fa-newspaper me-2"></i>
            Latest News
        </span>

        <h1 class="news-main-title">
            News &amp; Legal Updates
        </h1>

        <p class="news-intro">
            Stay informed about the latest legal developments,
            activities, events and important updates from Afghanistan
            and around the world.
        </p>

    </div>

{{-- ================= NEWS FILTERS ================= --}}
<div class="news-filter-container mb-5">

    <form action="{{ route('news.index') }}" method="GET">

        <div class="row g-3 align-items-center">

            {{-- Search --}}
            <div class="col-12 col-lg-7">

                <div class="news-search-box">

                    <i class="fas fa-search"></i>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        class="news-search-input"
                        placeholder="Search news, legal updates..."
                    >

                </div>

            </div>


            {{-- Date Filter --}}
            <div class="col-12 col-lg-3">

                <select
                    name="date_filter"
                    class="news-date-filter"
                >

                    <option value="">All Dates</option>

                    <option
                        value="day"
                        {{ request('date_filter') == 'day' ? 'selected' : '' }}
                    >
                        Last 24 Hours
                    </option>

                    <option
                        value="week"
                        {{ request('date_filter') == 'week' ? 'selected' : '' }}
                    >
                        Last 7 Days
                    </option>

                    <option
                        value="year"
                        {{ request('date_filter') == 'year' ? 'selected' : '' }}
                    >
                        Last Year
                    </option>

                    <option
                        value="two_years"
                        {{ request('date_filter') == 'two_years' ? 'selected' : '' }}
                    >
                        Last 2 Years
                    </option>

                </select>

            </div>


            {{-- Search Button --}}
            <div class="col-12 col-lg-2">

                <button
                    type="submit"
                    class="news-filter-button"
                >
                    Search
                </button>

            </div>

        </div>

    </form>

</div>
    {{-- News Grid --}}
    <div class="row g-4">

        @forelse($news as $item)

            @php
                $translation = $item->translations->first();
            @endphp

            <div class="col-12 col-md-6 col-xl-4">

                <article class="news-card">

                  {{-- ================= NEWS IMAGE ================= --}}
   {{-- ================= NEWS IMAGE ================= --}}
<div class="news-image-wrapper">

    <img
        src="{{ asset('storage/' . $item->featured_image) }}"
        alt="{{ $translation->title ?? 'News' }}"
        class="news-image"
    >

    {{-- این قسمت روی عکس قرار می‌گیرد --}}
 <a href="{{ route('news.show', $item->id) }}" class="news-media-overlay">

    @if($item->media_type === 'video')

        <span class="news-play-btn">
            <i class="fa fa-play"></i>
        </span>

    @elseif($item->media_type === 'text')

        <span class="news-play-btn">
            <i class="fa fa-file-text-o"></i>
        </span>

    @elseif($item->media_type === 'image')

        <span class="news-play-btn">
            <i class="fa fa-picture-o"></i>
        </span>

    @elseif($item->media_type === 'mixed')

        <span class="news-play-btn">
            <i class="fa fa-file-text-o"></i>
        </span>

        <span class="news-play-btn">
            <i class="fa fa-play"></i>
        </span>

    @endif

</a>

</div>
                    {{-- Content --}}
                    <div class="news-card-content">

                        {{-- Published Date --}}
                        @if($item->published_at)

                            <div class="news-date">

                                <i class="fa-regular fa-calendar me-2"></i>

                                {{ $item->published_at->format('d M Y') }}

                            </div>

                        @endif


                        {{-- Title --}}
                        <h2 class="news-title">

                            {{ $translation->title ?? 'Untitled News' }}

                        </h2>


                        {{-- Short Description / Summary --}}
                        @if($translation?->summary)

                            <p class="news-description">

                                {{ $translation->summary }}

                            </p>

                        @endif


                        {{-- Source --}}
                        @if($item->source_name)

                            <div class="news-source">

                                <i class="fa-solid fa-building-columns me-2"></i>

                                {{ $item->source_name }}

                            </div>

                        @endif


                        {{-- Read More --}}
                       <a href="{{ route('news.show', $item->id) }}"
                        class="news-read-more">

                            <span>Read Article</span>

                            <span class="news-arrow">
                                <i class="bi bi-arrow-right"></i>
                            </span>

                        </a>

                    </div>

                </article>

            </div>

        @empty

            {{-- Empty State --}}
            <div class="col-12">

                <div class="news-empty">

                    <div class="news-empty-icon">
                        <i class="fa-regular fa-newspaper"></i>
                    </div>

                    <h3>No News Available</h3>

                    <p>
                        There are currently no published news articles.
                    </p>

                </div>

            </div>

        @endforelse
         
    </div>
   {{-- ================= NEWS PAGINATION ================= --}}
           @if ($news->hasPages())

    <div class="news-pagination-wrapper">

        <nav aria-label="News pagination">

            <ul class="pagination news-pagination">

                {{-- Previous --}}
                @if ($news->onFirstPage())

                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    </li>

                @else

                    <li class="page-item">
                        <a
                            class="page-link"
                            href="{{ $news->previousPageUrl() }}"
                            aria-label="Previous"
                        >
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>

                @endif


                {{-- Page Numbers --}}
                @foreach ($news->getUrlRange(1, $news->lastPage()) as $page => $url)

                    @if ($page == $news->currentPage())

                        <li class="page-item active">
                            <span class="page-link">
                                {{ $page }}
                            </span>
                        </li>

                    @else

                        <li class="page-item">
                            <a
                                class="page-link"
                                href="{{ $url }}"
                            >
                                {{ $page }}
                            </a>
                        </li>

                    @endif

                @endforeach


                {{-- Next --}}
                @if ($news->hasMorePages())

                    <li class="page-item">
                        <a
                            class="page-link"
                            href="{{ $news->nextPageUrl() }}"
                            aria-label="Next"
                        >
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>

                @else

                    <li class="page-item disabled">
                        <span class="page-link">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </li>

                @endif

            </ul>

        </nav>

    </div>

@endif
</div>

   


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


</body>

</html>
@endsection
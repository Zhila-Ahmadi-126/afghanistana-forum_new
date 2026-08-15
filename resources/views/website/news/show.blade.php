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

.single-news-page {
    background: #ffffff;
    min-height: 100vh;
    padding: 40px 0 80px;
}


/* Back Button */

.single-news-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 10px 18px;

    color: #07345d;
    background: rgba(7, 52, 93, .06);

    border: 1px solid rgba(7, 52, 93, .10);

    border-radius: 40px;

    text-decoration: none;

    font-size: 14px;
    font-weight: 600;

    transition: .35s ease;
}

.single-news-back:hover {
    color: #ffffff;
    background: #07345d;
    transform: translateX(-4px);
}


/* Main Card */

.single-news-card {
    max-width: 1050px;
    margin: auto;

    background: #ffffff;

    border-radius: 40px;

    overflow: hidden;

    border: 1px solid rgba(7, 52, 93, .08);

    box-shadow:
        0 25px 70px rgba(7, 52, 93, .12);

    animation: newsCardAppear .8s ease both;
}


/* Image */

.single-news-image {
    position: relative;
    width: 100%;
    height: 500px;
    overflow: hidden;
}

.single-news-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;

    transition: transform 1s ease;
}

.single-news-card:hover .single-news-image img {
    transform: scale(1.04);
}


/* Image Overlay */

.single-news-media-icons {
    position: absolute;

    inset: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    gap: 15px;

    background: linear-gradient(
        to bottom,
        rgba(4, 28, 52, .05),
        rgba(4, 28, 52, .25)
    );
}


/* Media Icon */

.single-media-icon {
    width: 75px;
    height: 75px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    color: #ffffff;

    background: rgba(5, 45, 80, .72);

    border: 1px solid rgba(255, 255, 255, .45);

    backdrop-filter: blur(12px);

    font-size: 25px;

    box-shadow:
        0 15px 35px rgba(0, 0, 0, .25);

    animation: mediaFloat 2.2s ease-in-out infinite;
}


/* Content */

.single-news-content {
    padding: 50px 65px 60px;
}


/* Meta */

.single-news-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;

    margin-bottom: 25px;
}

.single-news-meta span {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    padding: 7px 14px;

    border-radius: 30px;

    color: #607080;

    background: #f4f7fa;

    font-size: 13px;

    animation: fadeUp .7s ease both;
}

.single-news-meta i {
    color: #07345d;
}


/* Title */

.single-news-title {
    margin-bottom: 22px;

    color: #082c4d;

    font-size: clamp(30px, 4vw, 48px);

    line-height: 1.2;

    font-weight: 700;

    animation: fadeUp .8s ease both;
}


/* Summary */

.single-news-summary {
    max-width: 850px;

    margin-bottom: 35px;

    color: #697887;

    font-size: 17px;

    line-height: 1.9;

    animation: fadeUp 1s ease both;
}


/* Video */

.single-news-video {
    margin: 40px 0;

    animation: fadeUp 1s ease both;
}

.single-video-heading {
    display: flex;
    align-items: center;
    gap: 10px;

    margin-bottom: 15px;

    color: #082c4d;

    font-size: 17px;
}

.single-video-heading span {
    color: #ffffff;

    width: 35px;
    height: 35px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #07345d;
}

.single-video-frame {
    position: relative;

    width: 100%;

    aspect-ratio: 16 / 9;

    overflow: hidden;

    border-radius: 28px;

    background: #061f38;

    box-shadow:
        0 20px 45px rgba(7, 52, 93, .18);
}

.single-video-frame iframe {
    width: 100%;
    height: 100%;

    border: 0;
}


/* Text */

.single-news-text {
    color: #394b5b;

    font-size: 16px;

    line-height: 2;

    animation: fadeUp 1.1s ease both;
}

.single-news-text p {
    margin-bottom: 20px;
}


/* Source */

.single-news-source {
    display: flex;
    align-items: center;
    gap: 15px;

    margin-top: 45px;
    padding: 18px 20px;

    background: rgba(7, 52, 93, .045);

    border: 1px solid rgba(7, 52, 93, .08);

    border-radius: 25px;
}

.source-icon {
    width: 48px;
    height: 48px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #ffffff;

    background: #07345d;

    border-radius: 16px;

    font-size: 18px;
}

.source-information {
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.source-information small {
    color: #8995a1;
    font-size: 12px;
}

.source-information a,
.source-information strong {
    color: #082c4d;

    font-size: 14px;

    text-decoration: none;
}

.source-information a:hover {
    text-decoration: underline;
}


/* Footer */

.single-news-footer {
    margin-top: 45px;

    padding-top: 25px;

    border-top: 1px solid rgba(7, 52, 93, .08);
}

.single-news-return {
    display: inline-flex;
    align-items: center;
    gap: 9px;

    color: #07345d;

    font-weight: 700;

    text-decoration: none;

    transition: .3s ease;
}

.single-news-return:hover {
    transform: translateX(-5px);
}


/* Animations */

@keyframes newsCardAppear {

    from {
        opacity: 0;
        transform: translateY(35px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}

@keyframes fadeUp {

    from {
        opacity: 0;
        transform: translateY(18px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }

}

@keyframes mediaFloat {

    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-7px);
    }

}


/* Responsive */

@media (max-width: 768px) {

    .single-news-page {
        padding-top: 25px;
    }

    .single-news-card {
        border-radius: 25px;
    }

    .single-news-image {
        height: 300px;
    }

    .single-news-content {
        padding: 35px 25px 40px;
    }

    .single-news-title {
        font-size: 30px;
    }

    .single-news-summary {
        font-size: 15px;
    }

    .single-media-icon {
        width: 60px;
        height: 60px;
        font-size: 20px;
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

{{-- ================= SINGLE NEWS PAGE ================= --}}

<div class="single-news-page">

    <div class="container py-5">

        {{-- Back --}}
        <div class="mb-4">
            <a href="{{ route('news.index') }}" class="single-news-back">
                <i class="fa fa-arrow-left"></i>
                <span>Back to News</span>
            </a>
        </div>


        {{-- Main Article --}}
        <article class="single-news-card">

            {{-- Featured Image --}}
            @if($news->featured_image)

                <div class="single-news-image">

                    <img
                        src="{{ asset('storage/' . $news->featured_image) }}"
                        alt="{{ $news->translations->first()->title ?? 'News' }}"
                    >

                    {{-- Media Type Overlay --}}
                    <div class="single-news-media-icons">

                        @if($news->media_type === 'video')

                            <span class="single-media-icon">
                                <i class="fa fa-play"></i>
                            </span>

                        @elseif($news->media_type === 'text')

                            <span class="single-media-icon">
                                <i class="fa fa-file-text-o"></i>
                            </span>

                        @elseif($news->media_type === 'image')

                            <span class="single-media-icon">
                                <i class="fa fa-picture-o"></i>
                            </span>

                        @elseif($news->media_type === 'mixed')

                            <span class="single-media-icon">
                                <i class="fa fa-file-text-o"></i>
                            </span>

                            <span class="single-media-icon">
                                <i class="fa fa-play"></i>
                            </span>

                        @endif

                    </div>

                </div>

            @endif


            {{-- Article Content --}}
            <div class="single-news-content">

                @php
                    $translation = $news->translations->first();
                @endphp


                {{-- Meta --}}
                <div class="single-news-meta">

                    @if($news->published_at)

                        <span>
                            <i class="fa fa-calendar-o"></i>

                            {{ \Carbon\Carbon::parse($news->published_at)->format('d M Y') }}
                        </span>

                    @endif


                    @if($news->media_type)

                        <span>
                            <i class="fa fa-folder-o"></i>

                            {{ ucfirst($news->media_type) }}
                        </span>

                    @endif


                    @if($news->source_name)

                        <span>
                            <i class="fa fa-building-o"></i>

                            {{ $news->source_name }}
                        </span>

                    @endif

                </div>


                {{-- Title --}}
                <h1 class="single-news-title">

                    {{ $translation->title ?? 'Untitled News' }}

                </h1>


                {{-- Short Description --}}
                @if($translation?->summary)

                    <p class="single-news-summary">

                        {{ $translation->summary }}

                    </p>

                @endif


                {{-- YouTube Video --}}
                @if(
                    in_array($news->media_type, ['video', 'mixed'])
                    && $news->youtube_url
                )

                    @php

                        $youtubeUrl = $news->youtube_url;

                        preg_match(
                            '/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\?\/]+)/',
                            $youtubeUrl,
                            $matches
                        );

                        $youtubeId = $matches[1] ?? null;

                    @endphp


                    @if($youtubeId)

                        <div class="single-news-video">

                            <div class="single-video-heading">

                                <span>
                                    <i class="fa fa-youtube-play"></i>
                                </span>

                                <strong>Watch Related Video</strong>

                            </div>

                            <div class="single-video-frame">

                                <iframe
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                    title="{{ $translation->title ?? 'News Video' }}"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>

                            </div>

                        </div>

                    @endif

                @endif


                {{-- Full Content --}}
                @if($translation?->content)

                    <div class="single-news-text">

                        {!! nl2br(e($translation->content)) !!}

                    </div>

                @endif


                {{-- Source --}}
                @if($news->source_name)

                    <div class="single-news-source">

                        <div class="source-icon">
                            <i class="fa fa-university"></i>
                        </div>

                        <div class="source-information">

                            <small>Source</small>

                            @if($news->source_url)

                                <a
                                    href="{{ $news->source_url }}"
                                    target="_blank"
                                    rel="noopener noreferrer">

                                    {{ $news->source_name }}

                                    <i class="fa fa-external-link"></i>

                                </a>

                            @else

                                <strong>
                                    {{ $news->source_name }}
                                </strong>

                            @endif

                        </div>

                    </div>

                @endif


                {{-- Footer --}}
                <div class="single-news-footer">

                    <a
                        href="{{ route('news.index') }}"
                        class="single-news-return">

                        <i class="fa fa-arrow-left"></i>

                        Back to all news

                    </a>

                </div>

            </div>

        </article>

    </div>

</div>


   


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


</body>

</html>
@endsection
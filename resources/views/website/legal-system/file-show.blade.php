<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'fa' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $fileTranslation->title ?? 'Legal File' }}
    </title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 50px 20px;
            background-image: url("{{ asset('assets/img/bg_lagal_file.jpg') }}");
             background-size: 100% 100%;
            font-family:
                "Segoe UI",
                Tahoma,
                Arial,
                sans-serif;

            color: #17324d;
        }


        /* =========================================
           A4 PAPER
        ========================================= */

        .legal-document-page {

            position: relative;

            width: 210mm;
            min-height: 297mm;

            margin: 0 auto;

            padding: 45px 55px 50px;

            overflow: hidden;

              background-image: url("{{ asset('assets/img/bg_lagal_file.jpg') }}");
             background-size: 100% 100%;
            border: 1px solid rgba(28, 72, 105, 0.15);

            box-shadow:
                0 25px 70px rgba(19, 55, 82, 0.20);

        }


        /* =========================================
           SOFT DECORATION
        ========================================= */

        .paper-decoration-top {

            position: absolute;

            top: -120px;
            right: -100px;

            width: 420px;
            height: 420px;

            border-radius: 50%;

            background:
                radial-gradient(
                    circle,
                    rgba(126, 190, 218, 0.20),
                    transparent 68%
                );

            pointer-events: none;
        }


        .paper-decoration-bottom {

            position: absolute;

            bottom: -170px;
            left: -130px;

            width: 520px;
            height: 350px;

            border-radius: 55% 45% 0 0;

            background:
                linear-gradient(
                    145deg,
                    rgba(116, 178, 207, 0.20),
                    rgba(207, 232, 243, 0.35)
                );

            transform: rotate(-8deg);

            pointer-events: none;
        }


        /* =========================================
           HEADER
        ========================================= */

        .document-header {

            position: relative;

            z-index: 2;

            text-align: center;

            padding-bottom: 28px;

            border-bottom:
                1px solid rgba(27, 70, 99, 0.15);

        }


        .association-logo {

            width: 82px;
            height: 82px;

            object-fit: contain;

            margin-bottom: 12px;
        }


        .association-name {

            margin: 0;

            font-size: 20px;

            font-weight: 700;

            color: #123c5c;

            letter-spacing: .5px;

        }


        .association-name-en {

            margin-top: 6px;

            font-size: 11px;

            letter-spacing: 2px;

            color: #7191a5;

            text-transform: uppercase;

        }


        .document-line {

            width: 80px;
            height: 2px;

            margin: 18px auto 0;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    #326b8e,
                    transparent
                );

        }


        /* =========================================
           DOCUMENT CONTENT
        ========================================= */

        .document-content {

            position: relative;

            z-index: 2;

            padding-top: 45px;

        }


        .document-label {

            display: inline-block;

            padding: 7px 18px;

            border: 1px solid rgba(44, 101, 133, .25);

            border-radius: 30px;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 2px;

            color: #35657f;

            background: rgba(255,255,255,.55);

        }


        .document-title {

            margin: 22px 0 25px;

            color: #143d5b;

            font-size: 34px;

            line-height: 1.35;

            font-weight: 700;

        }


        .document-short-description {

            padding: 20px 24px;

            margin-bottom: 30px;

            border-left: 3px solid #5489a6;

            background: rgba(255,255,255,.50);

            color: #4c6879;

            font-size: 15px;

            line-height: 2;

        }


        .document-body {

            color: #314e61;

            font-size: 15px;

            line-height: 2.2;

            text-align: justify;

        }


        .document-body p {

            margin-bottom: 20px;

        }


        /* =========================================
           FOOTER
        ========================================= */

        .document-footer {

            position: absolute;

            z-index: 3;

            left: 55px;
            right: 55px;

            bottom: 45px;

            padding-top: 20px;

            border-top:
                1px solid rgba(27, 70, 99, .15);

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 30px;

        }


        .footer-info {

            font-size: 11px;

            line-height: 1.8;

            color: #718999;

        }


        .footer-signature {

            text-align: center;

            min-width: 150px;

        }


        .signature-line {

            width: 150px;

            border-top: 1px solid #7896a8;

            margin-bottom: 8px;

        }


        .signature-title {

            font-size: 11px;

            color: #527083;

        }


        /* =========================================
           PRINT
        ========================================= */

        @media print {

            body {
                padding: 0;
                background: white;
            }

            .legal-document-page {

                width: 210mm;
                min-height: 297mm;

                margin: 0;

                box-shadow: none;

                border: none;

            }

        }


        /* =========================================
           MOBILE
        ========================================= */

        @media (max-width: 800px) {

            body {
                padding: 15px 8px;
            }

            .legal-document-page {

                width: 100%;

                min-height: 100vh;

                padding: 30px 25px 150px;

            }

            .document-title {

                font-size: 27px;

            }

            .document-footer {

                left: 25px;
                right: 25px;

                flex-direction: column;

                align-items: center;

                text-align: center;

            }

        }
.rtl-content {
    direction: rtl;
    text-align: right;
}

.ltr-content {
    direction: ltr;
    text-align: left;
}
    </style>
</head>


<body>


<div class="legal-document-page ">


    {{-- Decorative Shapes --}}

    <div class="paper-decoration-top "></div>

    <div class="paper-decoration-bottom"></div>



    {{-- =========================================
         HEADER
    ========================================== --}}

    <header class="document-header bg-info">

        {{-- لوگوی انجمن --}}
        <img
            src="{{ asset('assets/img/logo/logo-web-2.PNG') }}"
            alt="National Association of Afghan Lawyers"
            class="association-logo"
        >

        <h1 class="association-name">
            انجمن سراسری حقوق‌دانان افغانستان
        </h1>

        <div class="association-name-en">
            National Association of Afghan Lawyers
        </div>

        <div class="document-line"></div>

    </header>



    {{-- =========================================
         CONTENT
    ========================================== --}}

    <main class="document-content ">


        <span class="document-label">
            LEGAL DOCUMENT
        </span>


        <h2 class="document-title">

            {{ $fileTranslation->title ?? 'Legal File' }}

        </h2>



        {{-- Short Description --}}

        @if(!empty($fileTranslation->short_description))

            <div class="document-short-description">

                {{ $fileTranslation->short_description }}

            </div>

        @endif



        {{-- Main Description --}}

        @if(!empty($fileTranslation->description))

           <div class="legal-file-description
            {{ in_array(app()->getLocale(), ['fa', 'ps', 'ar']) ? 'rtl-content' : 'ltr-content' }}">

            {!! nl2br(e($fileTranslation->description)) !!}

        </div>

        @else

            <div class="document-body">

                <p>
                    {{ $fileTranslation->title ?? 'Legal Document' }}
                </p>

            </div>

        @endif


    </main>



    {{-- =========================================
         FOOTER
    ========================================== --}}

    <footer class="document-footer">


        <div class="footer-info">

            <strong>
                National Association of Afghan Lawyers
            </strong>

            <br>

            Legal Information & Documentation

        </div>



        <div class="footer-signature">

            <div class="signature-line"></div>

            <div class="signature-title">

                Authorized Representative

            </div>

        </div>


    </footer>


</div>


</body>

</html>
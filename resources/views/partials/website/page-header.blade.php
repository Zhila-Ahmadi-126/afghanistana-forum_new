<!-- Page Header Start -->
<div class="container-fluid page-header">
    <div class="container">

        <h1 class="display-3 text-white mb-3">
            {{ $title ?? __('pages_website.page_title') }}
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a class="text-white" href="{{ route('index') }}">
                        {{ __('pages_website.home') }}
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a class="text-white" href="#">
                        {{ __('pages_website.pages') }}
                    </a>
                </li>

                <li class="breadcrumb-item text-white active" aria-current="page">
                    {{ $title ?? __('pages_website.page') }}
                </li>

            </ol>
        </nav>

    </div>
</div>
<!-- Page Header End -->
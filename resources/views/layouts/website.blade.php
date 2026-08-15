@include('partials.website.head')

<body>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @include('partials.website.header')

    @include('partials.website.navbar')

    @yield('content')

    @include('partials.website.footer')

    @include('partials.website.scripts')

</body>
</html>
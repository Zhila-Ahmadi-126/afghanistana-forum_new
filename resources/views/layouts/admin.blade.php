<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    @include('includes.header_links')
    @stack('styles')
    
<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<style>
/* ==========================
   TABLE HOVER FIX
========================== */


.table tbody tr {
    transition: all .2s ease;
}


.table tbody tr:hover {

    background: rgba(52, 49, 49, 0.18) !important;

}


/* Dark Mode Table Hover */

.dark .table tbody tr:hover {

    background: rgba(74, 68, 68, 0.12) !important;

}
/* ==========================
   DARK MODE SELECT FILTER FIX
========================== */


.dark select.form-control {

    color: #fff !important;

    background-color: rgba(255,255,255,0.08) !important;

}



.dark select.form-control option {

    background-color: #1f1f1f !important;

    color: #fff !important;

}



.dark select.form-control option:hover {

    background-color: #333 !important;

    color: #fff !important;

}



/* Light Mode */

select.form-control option {

    color: #000;

    background-color: #fff;

}
/* Navbar Dropdown Fix */

.container-scroller,
.page-body-wrapper,
.main-panel {

    overflow: visible !important;

}


.navbar {

    z-index: 1050 !important;

}


.navbar .dropdown-menu {

    z-index: 99999 !important;

}


.navbar-menu-wrapper {

    overflow: visible !important;

}
</style>
<body>

<div class="container-scroller">

    {{-- NAVBAR --}}
    @include('includes.nav')

    <div class="container-fluid page-body-wrapper">

        {{-- RIGHT PANEL --}}
        @include('includes.right_skin')

        {{-- SIDEBAR --}}
        @include('includes.sidebar')

        {{-- MAIN CONTENT --}}
        <div class="main-panel">

            <div class="content-wrapper">
                @yield('content')
            </div>

            {{-- FOOTER --}}
            @include('includes.footer')

        </div>

    </div>
</div>

@include('includes.footer_links')

@stack('scripts')

</body>
</html>
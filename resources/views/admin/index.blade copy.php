@extends('layouts.admin')
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
</style>
@section('content')

<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">

                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome Aamir</h3>
                    <h6 class="font-weight-normal mb-0">
                        All systems are running smoothly!
                        You have <span class="text-primary">3 unread alerts!</span>
                    </h6>
                </div>

                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">

                            <button class="btn btn-sm btn-light dropdown-toggle"
                                    type="button"
                                    data-toggle="dropdown">

                                <i class="mdi mdi-calendar"></i>
                                Today (10 Jan 2021)

                            </button>

                            <div class="dropdown-menu dropdown-menu-right bg-light">

                                <a class="dropdown-item"><h6>January - March</h6></a>
                                <a class="dropdown-item"><h6>March - June</h6></a>
                                <a class="dropdown-item"><h6>June - August</h6></a>
                                <a class="dropdown-item"><h6>August - November</h6></a>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12 grid-margin transparent">

            <div class="row">

                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Today’s Bookings</p>
                            <p class="fs-30 mb-2">4006</p>
                            <p>10.00% (30 days)</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Total Bookings</p>
                            <p class="fs-30 mb-2">61344</p>
                            <p>22.00% (30 days)</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Number of Meetings</p>
                            <p class="fs-30 mb-2">34040</p>
                            <p>2.00% (30 days)</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Number of Clients</p>
                            <p class="fs-30 mb-2">47033</p>
                            <p>0.22% (30 days)</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
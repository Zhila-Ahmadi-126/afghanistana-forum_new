<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('languages_create.add_language') }}</title>


    <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">

    <link rel="stylesheet" href="{{ asset('dashboard/css/dark-mode.css') }}">


    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <link rel="stylesheet" href="{{ asset('css/admin-create.css') }}">


</head>


<body>



<div class="background">


    <div class="blur one"></div>

    <div class="blur two"></div>

    <div class="blur three"></div>


</div>




<div class="container py-5">



    <div class="d-flex justify-content-between align-items-center mb-4">



        <h2 class="font-weight-bold">

            {{ __('languages_create.add_language') }}

        </h2>




        <button id="theme-toggle"
                class="btn btn-light shadow">


            <i class="bi bi-moon-stars-fill"></i>


        </button>



    </div>





    <form action="{{ route('admin.languages.store') }}"

          method="POST">


        @csrf




        @if ($errors->any())


            <div class="alert alert-danger">


                <ul class="mb-0">


                    @foreach ($errors->all() as $error)


                        <li>

                            {{ $error }}

                        </li>


                    @endforeach


                </ul>


            </div>


        @endif






        <div class="glass-card">



            <div class="row">





                {{-- LANGUAGE INFORMATION --}}


                <div class="col-md-12">



                    <div class="row">








                        {{-- NAME --}}


                        <div class="col-md-6 mb-3">


                            <label>

                                {{ __('languages_create.language_name') }}

                            </label>



                            <input

                                type="text"

                                name="name"

                                id="name"

                                class="form-control"

                                placeholder="Name"

                                value="{{ old('name') }}"

                            >


                        </div>






                        {{-- CODE --}}


                        <div class="col-md-6 mb-3">


                            <label>

                                {{ __('languages_create.language_code') }}

                            </label>



                            <input

                                type="text"

                                name="code"

                                id="code"

                                class="form-control"

                                placeholder="Code"

                                value="{{ old('code') }}"

                            >


                        </div>






                        {{-- STATUS --}}


                        <div class="col-md-6 mb-3">


                            <label>

                                {{ __('general.status') }}

                            </label>



                            <select

                                name="status"

                                id="status"

                                class="form-control">


                                <option value="active">

                                    {{ __('general.active') }}

                                </option>


                                <option value="inactive">

                                    {{ __('general.inactive') }}

                                </option>



                            </select>


                        </div>






                        {{-- SORT ORDER --}}


                        <div class="col-md-6 mb-3">


                            <label>

                                {{ __('languages_create.sort_order') }}

                            </label>



                            <input

                                type="number"

                                name="sort_order"

                                id="sort_order"

                                class="form-control"

                                value="{{ old('sort_order',0) }}"

                            >


                        </div>
                                            </div>


                </div>




            </div>



            <hr>



        </div>





        <div class="text-right mt-4">



            <a href="{{ route('admin.languages.index') }}"

               class="btn btn-secondary">
<br>


                <i class="bi bi-arrow-left"></i>


                {{ __('general.back') }}



            </a>





            <button

                type="submit"

                id="saveBtn"

                class="btn btn-primary">



                <i class="bi bi-check-circle"></i>


                {{ __('languages_create.save_language') }}



            </button>




        </div>



    </form>



</div>


<script>

document.addEventListener("DOMContentLoaded", function () {



    /* ==========================
       ELEMENTS
    ========================== */


    const form = document.querySelector("form");

    const btn = document.getElementById("saveBtn");


    const body = document.body;

    const toggle = document.getElementById("theme-toggle");

    const icon = toggle ? toggle.querySelector("i") : null;





    /* ==========================
       BUTTON LOADING
    ========================== */


    if (form && btn) {


        form.addEventListener("submit", function () {


            btn.disabled = true;


            btn.innerHTML =

            '<span class="spinner-border spinner-border-sm me-2"></span>{{ __("general.saving") }}';



        });


    }









    /* ==========================
       DARK MODE
    ========================== */


    if (toggle && icon) {



        if (localStorage.getItem("theme") === "dark") {


            body.classList.add("dark");


            icon.className = "bi bi-sun-fill";



        } else {


            icon.className = "bi bi-moon-stars-fill";


        }











        toggle.addEventListener("click", function () {



            body.classList.toggle("dark");




            if (body.classList.contains("dark")) {



                localStorage.setItem("theme","dark");



                icon.className = "bi bi-sun-fill";



            } else {



                localStorage.setItem("theme","light");



                icon.className = "bi bi-moon-stars-fill";



            }



        });



    }













    /* ==========================
       VALIDATION
    ========================== */


    function validate(id, callback) {



        const input = document.getElementById(id);



        if (!input) return;






        input.classList.remove(
            "is-valid",
            "is-invalid"
        );





        if (callback(input.value)) {



            input.classList.add("is-valid");



        } else {



            input.classList.add("is-invalid");



        }



    }







    /* ==========================
       NAME VALIDATION
    ========================== */


    const name = document.getElementById("name");



    if (name) {



        name.onkeyup = function () {



            validate(
                "name",
                value => value.trim().length >= 2
            );



        };


    }
        /* ==========================
       CODE VALIDATION
    ========================== */


    const code = document.getElementById("code");



    if (code) {



        code.onkeyup = function () {



            validate(

                "code",

                value => /^[a-zA-Z]{2,10}$/.test(value)

            );



        };



    }






});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>
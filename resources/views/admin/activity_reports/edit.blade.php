<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __('activity_report_edit.edit_report') }}</title>

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

              {{ __('activity_report_edit.edit_form') }}

            </h2>

            <button id="theme-toggle" class="btn btn-light shadow">

                <i class="bi bi-moon-stars-fill"></i>

            </button>

        </div>






@php

$translation = $report->translations->first();

@endphp



<form method="POST"
action="{{ route('admin.activity_reports.update',$report->id) }}">

@csrf
@method('PUT')


<div class="row justify-content-center">

    <div class="col-xl-8 col-lg-9 col-md-10">


        <div class="card shadow report-form-card">


            <div class="card-body p-4">


                <div class="row"> 




{{-- REPORT DATE --}}


<div class="col-md-6 mb-3">


<label>

{{ __('activity_report_edit.report_date') }}

</label>



<input type="date"

name="report_date"

class="form-control"

value="{{ old('report_date',$report->report_date) }}">



</div>







{{-- LANGUAGE --}}


<div class="col-md-6 mb-3">


<label>

{{ __('activity_report_edit.language') }}

</label>



<select name="language_id"

class="form-control">



@if($translation)


<option value="{{ $translation->language_id }}">

{{ $translation->language->name ?? '' }}

({{ strtoupper($translation->language->code ?? '') }})

</option>


@endif



</select>



</div>







{{-- TITLE --}}


<div class="col-md-12 mb-3">


<label>

{{ __('activity_report_edit.title') }}

</label>



<input type="text"

name="title"

class="form-control"

value="{{ old('title',$translation->title ?? '') }}">




</div>


{{-- SUMMARY --}}

<div class="col-md-12 mb-3">


<label>

{{ __('activity_report_edit.summary') }}

</label>



<textarea

name="summary"

rows="4"

class="form-control">{{ old('summary',$translation->summary ?? '') }}</textarea>



</div>




{{-- COMPLETED ACTIVITIES --}}


<div class="col-md-6 mb-3">


<label>

{{ __('activity_report_edit.completed_activities') }}

</label>



<textarea

name="completed_activities"

rows="6"

class="form-control">{{ old('completed_activities',$translation->completed_activities ?? '') }}</textarea>



</div>










{{-- PENDING ACTIVITIES --}}


<div class="col-md-6 mb-3">


<label>

{{ __('activity_report_edit.pending_activities') }}

</label>



<textarea

name="pending_activities"

rows="6"

class="form-control">{{ old('pending_activities',$translation->pending_activities ?? '') }}</textarea>



</div>









{{-- CHALLENGES --}}


<div class="col-md-6 mb-3">


<label>

{{ __('activity_report_edit.challenges') }}

</label>



<textarea

name="challenges"

rows="5"

class="form-control">{{ old('challenges',$translation->challenges ?? '') }}</textarea>



</div>









{{-- NEXT PLAN --}}


<div class="col-md-6 mb-3">


<label>

{{ __('activity_report_edit.next_plan') }}

</label>



<textarea

name="next_plan"

rows="5"

class="form-control">{{ old('next_plan',$translation->next_plan ?? '') }}</textarea>



</div>







</div>


</div>







<div class="mt-4 text-right">



<a href="{{ route('admin.activity_reports.index') }}"

class="btn btn-secondary">

<br>

<i class="bi bi-arrow-left"></i>

{{ __('activity_report_edit.back') }}

</a>







<button type="submit"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>

{{ __('activity_report_edit.update_report') }}

</button>



</div>

                </div>

            </div>

        </div>


    </div>

</div>



</form>

</div>



<script>

const toggle = document.getElementById("theme-toggle");

const icon = toggle.querySelector("i");

const body = document.body;



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


            localStorage.setItem("theme", "dark");


            icon.className = "bi bi-sun-fill";


        } else {


            localStorage.setItem("theme", "light");


            icon.className = "bi bi-moon-stars-fill";


        }


    });


}

</script>
</body>

</html>
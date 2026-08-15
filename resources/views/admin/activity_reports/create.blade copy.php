<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Activity Report</title>


<link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/css/dark-mode.css') }}">


<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<link rel="stylesheet"
href="{{ asset('css/admin-create.css') }}">


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

Add Activity Report

</h2>



<button id="theme-toggle"
class="btn btn-light shadow">

<i class="bi bi-moon-stars-fill"></i>

</button>


</div>





<form action="{{ route('admin.activity_reports.store') }}"
method="POST">


@csrf




@if($errors->any())

<div class="alert alert-danger">


<ul class="mb-0">

@foreach($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach

</ul>


</div>

@endif





<div class="glass-card">


<div class="row">





{{-- LANGUAGE --}}


<div class="col-md-6 mb-3">


<label>

Language

</label>



<select name="language_id"
class="form-control">



@foreach($languages as $language)


<option value="{{ $language->id }}"
@if($language->code == 'en')
selected
@endif
>


{{ $language->name }}
({{ strtoupper($language->code) }})


</option>



@endforeach



</select>


</div>

<div class="col-md-6 mb-3">

<label>
Report Date
</label>

<input type="date"
name="report_date"
class="form-control"
value="{{ old('report_date', date('Y-m-d')) }}">

</div>




{{-- TITLE --}}


<div class="col-md-6 mb-3">


<label>

Report Title

</label>



<input type="text"

name="title"

class="form-control"

value="{{ old('title') }}"

placeholder="Enter report title">


</div>
{{-- SUMMARY --}}

<div class="col-md-12 mb-3">


<label>

Summary

</label>


<textarea

name="summary"

rows="4"

class="form-control"

placeholder="General summary of activities">{{ old('summary') }}</textarea>


</div>






{{-- COMPLETED ACTIVITIES --}}


<div class="col-md-6 mb-3">


<label>

Completed Activities

</label>



<textarea

name="completed_activities"

rows="6"

class="form-control"

placeholder="What activities were completed?">{{ old('completed_activities') }}</textarea>



</div>






{{-- PENDING ACTIVITIES --}}


<div class="col-md-6 mb-3">


<label>

Pending Activities

</label>



<textarea

name="pending_activities"

rows="6"

class="form-control"

placeholder="What activities were not completed?">{{ old('pending_activities') }}</textarea>



</div>








{{-- CHALLENGES --}}


<div class="col-md-6 mb-3">


<label>

Challenges

</label>



<textarea

name="challenges"

rows="5"

class="form-control"

placeholder="Problems and challenges">{{ old('challenges') }}</textarea>



</div>







{{-- NEXT PLAN --}}


<div class="col-md-6 mb-3">


<label>

Next Plan

</label>



<textarea

name="next_plan"

rows="5"

class="form-control"

placeholder="Plans for next period">{{ old('next_plan') }}</textarea>



</div>




</div>



</div>





<div class="text-right mt-4">



<a href="{{ route('admin.activity_reports.index') }}"

class="btn btn-secondary">
<br>

<i class="bi bi-arrow-left"></i>


Back


</a>





<button type="submit"

id="saveBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>


Save Report


</button>



</div>





</form>



</div>
<script>


document.addEventListener("DOMContentLoaded", function(){



// ==========================
// BUTTON LOADING
// ==========================


const form = document.querySelector("form");

const btn = document.getElementById("saveBtn");



if(form && btn){


form.addEventListener("submit",function(){


btn.disabled = true;



btn.innerHTML =

'<span class="spinner-border spinner-border-sm me-2"></span>Saving...';



});


}






// ==========================
// DARK MODE
// ==========================


const body = document.body;

const toggle = document.getElementById("theme-toggle");


if(toggle){


const icon = toggle.querySelector("i");



if(localStorage.getItem("theme") === "dark"){


body.classList.add("dark");


icon.className="bi bi-sun-fill";


}






toggle.addEventListener("click",function(){



body.classList.toggle("dark");




if(body.classList.contains("dark")){


localStorage.setItem("theme","dark");


icon.className="bi bi-sun-fill";


}

else{


localStorage.setItem("theme","light");


icon.className="bi bi-moon-stars-fill";


}



});



}



});



</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>


</html>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ __('legal_systems_create.page_title') }}</title>


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

{{ __('legal_systems_create.add_legal_system') }}

</h2>



<button id="theme-toggle"
class="btn btn-light shadow">

<i class="bi bi-moon-stars-fill"></i>

</button>


</div>







<form action="{{ route('admin.legal-systems.store') }}"
method="POST"
enctype="multipart/form-data">


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


<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_create.language') }}

</label>



<select name="language_id"

class="form-control">


@foreach($languages as $language)


<option value="{{ $language->id }}"

{{ $language->code == 'en' ? 'selected' : '' }}>


{{ $language->name }}

({{ strtoupper($language->code) }})


</option>



@endforeach



</select>


</div>







{{-- IMAGE --}}


<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_create.image') }}

</label>



<input type="file"

name="image"

class="form-control">


</div>
{{-- TITLE --}}

<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_create.title') }}

</label>



<input type="text"

name="title"

class="form-control"

value="{{ old('title') }}"

placeholder="{{ __('legal_systems_create.title_placeholder') }}">



</div>
{{-- SUMMARY --}}


<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_create.summary') }}

</label>



<textarea

name="summary"

rows="4"

class="form-control"

placeholder="{{ __('legal_systems_create.summary_placeholder') }}">{{ old('summary') }}</textarea>



</div>









{{-- CONTENT --}}


<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_create.content') }}

</label>



<textarea

name="content"

rows="8"

class="form-control"

placeholder="{{ __('legal_systems_create.content_placeholder') }}">{{ old('content') }}</textarea>



</div>









{{-- STATUS --}}


<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_create.status') }}

</label>



<select name="status"

class="form-control">





<option value="active"

{{ old('status')=='active' ? 'selected':'' }}>


{{ __('legal_systems_create.active') }}


</option>





<option value="inactive"

{{ old('status')=='inactive' ? 'selected':'' }}>


{{ __('legal_systems_create.inactive') }}


</option>





</select>



</div>





</div>

</div>







<div class="text-right mt-4">


<a href="{{ route('admin.legal-systems.index') }}"

class="btn btn-secondary">
<br>  

<i class="bi bi-arrow-left"></i>


{{ __('legal_systems_create.back') }}


</a>








<button type="submit"

id="saveBtn"

class="btn btn-primary">



<i class="bi bi-check-circle"></i>



{{ __('legal_systems_create.save_legal_system') }}



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

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("legal_systems_create.saving") }}';



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
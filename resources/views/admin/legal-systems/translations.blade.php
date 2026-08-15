<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
{{ __('legal_systems_translations.title') }}
</title>


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

{{ __('legal_systems_translations.title') }}

</h2>




<button id="theme-toggle"
class="btn btn-light shadow">

<i class="bi bi-moon-stars-fill"></i>

</button>



</div>





<form action="{{ route('admin.legal-systems.translations.store',$legalSystem->id) }}"
method="POST">


@csrf





@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif




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





<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_translations.language') }}

</label>



<select
name="language_id"
id="language_id"
class="form-control"
onchange="changeLanguage()">



@foreach($languages as $language)


<option value="{{ $language->id }}"
{{ $selectedLanguage == $language->id ? 'selected' : '' }}>


{{ $language->name }}


</option>



@endforeach



</select>



</div>
{{-- TITLE --}}

<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_translations.title_field') }}

</label>



<input

type="text"

name="title"

class="form-control"

value="{{ old('title',$translation->title ?? '') }}"

placeholder="{{ __('legal_systems_translations.title_placeholder') }}">



</div>






{{-- SUMMARY --}}


<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_translations.summary') }}

</label>



<textarea

name="summary"

rows="4"

class="form-control"

placeholder="{{ __('legal_systems_translations.summary_placeholder') }}">{{ old('summary',$translation->summary ?? '') }}</textarea>



</div>








{{-- CONTENT --}}


<div class="col-md-12 mb-3">


<label>

{{ __('legal_systems_translations.content') }}

</label>




<textarea

name="content"

rows="8"

class="form-control"

placeholder="{{ __('legal_systems_translations.content_placeholder') }}">{{ old('content',$translation->content ?? '') }}</textarea>



</div>






</div>


</div>







<div class="text-right mt-4">
 


<a href="{{ route('admin.legal-systems.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


{{ __('legal_systems_translations.back') }}


</a>






<button type="submit"

id="saveBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>



{{ $translation 
    ? __('legal_systems_translations.update') 
    : __('legal_systems_translations.save') 
}}



</button>

</form>












@if($translation)

<form action="{{ route('admin.legal-systems.translations.destroy', [
    'legalSystem' => $legalSystem->id,
    'translation' => $translation->id
]) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')


<button type="submit"

class="btn btn-sm btn-outline-light btn-danger text-dark"

onclick="return confirm('{{ __('legal_systems_translations.delete_confirm') }}')">


<i class="bi bi-trash"></i>


</button>


</form>

@endif
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

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("legal_systems_translations.saving") }}';



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








// ==========================
// CHANGE LANGUAGE
// ==========================


function changeLanguage(){


let language = document.getElementById("language_id").value;



window.location.href =
window.location.pathname + "?language_id=" + language;



}



</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle.min.js"></script>



</body>

</html>
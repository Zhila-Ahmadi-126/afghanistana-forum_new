<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ __('legal_files_translation.page_title') }}</title>

<link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/css/dark-mode.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

<i class="bi bi-translate"></i>

{{ __('legal_files_translation.title') }}

</h2>



<button
id="theme-toggle"
class="btn btn-light shadow">

<i class="bi bi-moon-stars-fill"></i>

</button>


</div>





<form
action="{{ route('admin.legal_files.saveTranslation',$file->id) }}"
method="POST">

@csrf


<div class="glass-card">


@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif



@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif



<div class="row">


<div class="col-md-12 mb-4">


<label>

{{ __('legal_files_translation.language') }}

</label>


<select
    name="language_id"
    id="language_id"
    class="form-control"
    data-url="{{ route('admin.legal_files.translation',$file->id) }}">


    @foreach($languages as $language)


        <option
            value="{{ $language->id }}"
            {{ $selectedLanguageId == $language->id ? 'selected' : '' }}>


            {{ $language->name }}


        </option>


    @endforeach


</select>



@error('language_id')

<div class="text-danger mt-1">

{{ $message }}

</div>

@enderror


</div>





@if($translation)


<div class="col-md-12 mb-4">


<div class="alert alert-success">


<i class="bi bi-check-circle-fill me-2"></i>


{{ __('legal_files_translation.translation_exists') }}


</div>


</div>



@else



<div class="col-md-12 mb-4">


<div class="alert alert-info">


<i class="bi bi-info-circle-fill me-2"></i>


{{ __('legal_files_translation.create_translation') }}


</div>


</div>


@endif
<div class="col-md-12 mb-4">


<label>

{{ __('legal_files_translation.title_field') }}

<span class="text-danger">*</span>

</label>



<input
type="text"
name="title"
class="form-control @error('title') is-invalid @enderror"
value="{{ old('title', optional($translation)->title) }}">



@error('title')

<div class="invalid-feedback d-block">

{{ $message }}

</div>

@enderror



</div>









<div class="col-md-12 mb-4">


<label>

{{ __('legal_files_translation.short_description') }}

</label>



<textarea
name="short_description"
rows="3"
class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description', optional($translation)->short_description) }}</textarea>



@error('short_description')

<div class="invalid-feedback d-block">

{{ $message }}

</div>

@enderror



</div>









<div class="col-md-12 mb-4">


<label>

{{ __('legal_files_translation.description') }}

</label>



<textarea
name="description"
rows="7"
class="form-control @error('description') is-invalid @enderror">{{ old('description', optional($translation)->description) }}</textarea>



@error('description')

<div class="invalid-feedback d-block">

{{ $message }}

</div>

@enderror



</div>









<div class="col-md-6 mb-4">


<label>

{{ __('legal_files_translation.meta_title') }}

</label>



<input
type="text"
name="meta_title"
class="form-control"
value="{{ old('meta_title', optional($translation)->meta_title) }}">



</div>









<div class="col-md-6 mb-4">


<label>

{{ __('legal_files_translation.meta_description') }}

</label>



<textarea
name="meta_description"
rows="3"
class="form-control">{{ old('meta_description', optional($translation)->meta_description) }}</textarea>



</div>



</div>


</div>







<div class="d-flex justify-content-end gap-2 mt-4">



<a href="{{ route('admin.legal_files.index') }}"

class="btn btn-secondary">

<br>

<i class="bi bi-arrow-left"></i>


{{ __('legal_files_translation.back') }}


</a>









<button
type="submit"
class="btn btn-primary"
id="saveBtn">


<i class="bi bi-check-circle"></i>


{{ __('legal_files_translation.save_translation') }}


</button>



</form>









@if($translation)



<form
action="{{ route('admin.legal_files.deleteTranslation',$translation->id) }}"
method="POST"
class="d-inline">


@csrf

@method('DELETE')



<button
type="submit"
class="btn btn-danger"
onclick="return confirm('Are you sure you want to delete this translation?')">



<i class="bi bi-trash"></i>


{{ __('legal_files_translation.delete_translation') }}



</button>



</form>



@endif
<script>

document.addEventListener("DOMContentLoaded",function(){


const body=document.body;

const toggle=document.getElementById("theme-toggle");

const icon=toggle.querySelector("i");





if(localStorage.getItem("theme")==="dark"){


body.classList.add("dark");


icon.className="bi bi-sun-fill";


}

else{


icon.className="bi bi-moon-stars-fill";


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









const language=document.getElementById("language_id");



if(language){


language.addEventListener("change",function(){


window.location =

this.dataset.url +

"?language_id=" +

this.value;


});


}









const form=document.querySelector("form");

const btn=document.getElementById("saveBtn");



if(form && btn){


form.addEventListener("submit",function(){


btn.disabled=true;


btn.innerHTML=

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("legal_files_translation.saving") }}';



});


}




});



const language = document.getElementById("language_id");


language.addEventListener("change", function () {


    window.location =
        this.dataset.url + "?language_id=" + this.value;


});

</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>
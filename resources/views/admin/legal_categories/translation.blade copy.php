<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Legal Branch of the Category Translation</title>


<link rel="stylesheet"
href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">


<link rel="stylesheet"
href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">


<link rel="stylesheet"
href="{{ asset('dashboard/css/dark-mode.css') }}">


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

<i class="bi bi-translate"></i>

Legal Branch of the Category Translation

</h2>




<button id="theme-toggle"

class="btn btn-light shadow">

<i class="bi bi-moon-stars-fill"></i>

</button>



</div>






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



<form action="{{ route('admin.legal_categories.saveTranslation',$category->id) }}"

method="POST">


@csrf







<div class="row">





<!-- CATEGORY INFO -->


<div class="col-md-4 text-center">


@if($category->image)


<img src="{{ asset('storage/'.$category->image) }}"

class="avatar-preview mb-3">


@else


<img src="{{ asset('dashboard/images/news/default.JPG') }}"

class="avatar-preview mb-3">


@endif





<h5>

Branch of the Category ID :

{{ $category->id }}

</h5>



</div>







<div class="col-md-8">





<!-- LANGUAGE -->

<div class="mb-3">

<label>
Language
</label>


<select
name="language_id"
id="language_id"
class="form-control">


@foreach($languages as $language)


<option value="{{ $language->id }}"


@if(
    ($translation && $translation->language_id == $language->id)
    ||
    (!$translation && request('language_id') == $language->id)
)

selected

@endif


>

{{ $language->name }}

({{ $language->code }})

</option>


@endforeach


</select>


</div>
<!-- TITLE -->

<div class="mb-3">


<label>

Title

</label>



<input

type="text"

name="title"

value="{{ old('title',$translation->title ?? '') }}"

class="form-control @error('title') is-invalid @enderror">



@error('title')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>








<!-- SHORT DESCRIPTION -->


<div class="mb-3">


<label>

Short Description

</label>



<textarea

name="short_description"

rows="3"

class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description',$translation->short_description ?? '') }}</textarea>



@error('short_description')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>









<!-- DESCRIPTION -->


<div class="mb-3">


<label>

Description

</label>



<textarea

name="description"

rows="5"

class="form-control @error('description') is-invalid @enderror">{{ old('description',$translation->description ?? '') }}</textarea>



@error('description')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>









<!-- META TITLE -->


<div class="mb-3">


<label>

Meta Title

</label>



<input

type="text"

name="meta_title"

value="{{ old('meta_title',$translation->meta_title ?? '') }}"

class="form-control">



</div>









<!-- META DESCRIPTION -->


<div class="mb-3">


<label>

Meta Description

</label>



<textarea

name="meta_description"

rows="3"

class="form-control">{{ old('meta_description',$translation->meta_description ?? '') }}</textarea>



</div>









<div class="text-right mt-4">





<a href="{{ route('admin.legal_categories.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>

Back


</a>







@if($translation)



<button

type="submit"

class="btn btn-warning">


<i class="bi bi-pencil-square"></i>

Update Translation


</button>







</form>






<form action="{{ route('admin.legal_categories.deleteTranslation',$translation->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button

type="submit"

class="btn btn-danger"

onclick="return confirm('Are you sure you want to delete this translation?')">


<i class="bi bi-trash"></i>

Delete


</button>



</form>






@else



<button

type="submit"

class="btn btn-primary">


<i class="bi bi-save"></i>

Save Translation


</button>




@endif






</div>






</div>



</div>



</div>




</div>
<script>


document.addEventListener("DOMContentLoaded", function(){



/*
|--------------------------------------------------------------------------
| ELEMENTS
|--------------------------------------------------------------------------
*/


const body = document.body;

const toggle = document.getElementById('theme-toggle');

const icon = toggle.querySelector('i');

const form = document.querySelector("form[action*='saveTranslation']");





/*
|--------------------------------------------------------------------------
| DARK MODE
|--------------------------------------------------------------------------
*/


if(localStorage.getItem("theme") === "dark"){


    body.classList.add("dark");

    icon.className = "bi bi-sun-fill";


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








/*
|--------------------------------------------------------------------------
| CHANGE LANGUAGE
|--------------------------------------------------------------------------
*/


const language = document.getElementById("language_id");



if(language){


language.addEventListener("change",function(){


    let url = new URL(window.location.href);


    url.searchParams.set(

        "language_id",

        this.value

    );


    window.location.href=url.toString();



});



}









/*
|--------------------------------------------------------------------------
| SAVE BUTTON LOADING
|--------------------------------------------------------------------------
*/


if(form){


form.addEventListener("submit",function(){


    let btn=this.querySelector("button[type='submit']");


    if(btn){


        btn.disabled=true;


        btn.innerHTML=

        `

        <span class="spinner-border spinner-border-sm"></span>

        Saving...

        `;


    }



});



}






});



</script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>


</html>
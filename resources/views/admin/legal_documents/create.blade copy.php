<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Legal Document</title>


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


<style>


body{

min-height:100vh;

}



.theme-btn{

position:fixed;

top:25px;

right:25px;

z-index:999;

border-radius:50%;

width:45px;

height:45px;

}




.glass-card{

background:rgba(255,255,255,.75);

backdrop-filter:blur(15px);

border-radius:20px;

}



.dark .glass-card{

background:rgba(30,30,30,.75);

color:white;

}



.form-control{

border-radius:12px;

height:45px;

}



textarea.form-control{

height:auto;

}



label{

font-weight:600;

margin-bottom:7px;

}



</style>


</head>


<body>



<div class="background">

<div class="blur one"></div>

<div class="blur two"></div>

<div class="blur three"></div>

</div>





<button id="theme-toggle"
class="btn btn-light shadow theme-btn">

<i id="theme-icon"
class="bi bi-moon-stars-fill"></i>

</button>







<div class="container py-5">


<div class="row justify-content-center">


<div class="col-xl-8 col-lg-9">



<div class="card border-0 shadow-lg glass-card">


<div class="card-body p-4">



<h3 class="text-center mb-4">

<i class="bi bi-file-earmark-text"></i>

Add Legal Category

</h3>







@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif





@if ($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach ($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif







<form action="{{ route('admin.legal_documents.store') }}"

method="POST"

enctype="multipart/form-data">


@csrf







<div class="mb-3">


<label>

Legal System

</label>


<select name="legal_system_id"

class="form-control">


<option value="">

Select Legal System

</option>



@foreach($legalSystems as $system)


<option value="{{ $system->id }}"

{{ old('legal_system_id')==$system->id ? 'selected':'' }}

>


{{ optional(
$system->translations->where('language.code','en')->first()
)->title ?? 'No Translation' }}


</option>



@endforeach


</select>


</div>









<div class="mb-3">


<label>

Cover Image

</label>


<input type="file"

name="cover_image"

class="form-control">


</div>









<div class="mb-3">


<label>

PDF File

</label>


<input type="file"

name="pdf_file"

class="form-control">


</div>









<div class="mb-3">


<label>

Status

</label>


<select name="status"

class="form-control">


<option value="draft">

Draft

</option>


<option value="published">

Published

</option>


<option value="archived">

Archived

</option>


</select>


</div>









<hr>






<h5 class="mb-3">

English Translation

</h5>









<div class="mb-3">


<label>

Language

</label>


<select name="language_id"

class="form-control">


@foreach($languages as $language)


<option value="{{ $language->id }}"

@if($language->code=='en')

selected

@endif

>


{{ $language->name }}

({{ $language->code }})


</option>


@endforeach


</select>


</div>









<div class="mb-3">


<label>

Title

</label>


<input type="text"

name="title"

value="{{ old('title') }}"

class="form-control">


</div>









<div class="mb-3">


<label>

Short Description

</label>


<textarea name="summary"

class="form-control"

rows="3">{{ old('summary') }}</textarea>


</div>









<div class="mb-3">


<label>

Long Description

</label>


<textarea name="content"

class="form-control"

rows="6">{{ old('content') }}</textarea>


</div>









<div class="mb-3">


<label>

SEO Title

</label>


<input type="text"

name="seo_title"

value="{{ old('seo_title') }}"

class="form-control">


</div>









<div class="mb-3">


<label>

SEO Description

</label>


<textarea name="seo_description"

class="form-control"

rows="3">{{ old('seo_description') }}</textarea>


</div>









<div class="text-center mt-4">


<button type="submit"

class="btn btn-success px-5">


Save


</button>




<a href="{{ route('admin.legal_documents.index') }}"

class="btn btn-secondary">
<br>

Back


</a>


</div>





</form>




</div>

</div>


</div>


</div>


</div>







<script>


const toggle = document.getElementById('theme-toggle');

const icon = document.getElementById('theme-icon');

const body = document.body;




if(localStorage.getItem('theme')==='dark'){

body.classList.add('dark');

icon.className='bi bi-sun-fill';

}



toggle.onclick=function(){


body.classList.toggle('dark');


if(body.classList.contains('dark')){

localStorage.setItem('theme','dark');

icon.className='bi bi-sun-fill';

}

else{

localStorage.setItem('theme','light');

icon.className='bi bi-moon-stars-fill';

}



}



</script>



</body>

</html>
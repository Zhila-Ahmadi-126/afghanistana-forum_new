<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Edit Legal Category</title>


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

}



label{

font-weight:600;

}



.preview-img{

width:90px;

height:90px;

object-fit:cover;

border-radius:15px;

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





<div class="card shadow-lg border-0 glass-card">


<div class="card-body p-4">



<h3 class="text-center mb-4">

<i class="bi bi-pencil-square"></i>

Edit Legal Category

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







<form action="{{ route('admin.legal_documents.update',$document->id) }}"

method="POST"

enctype="multipart/form-data">


@csrf

@method('PUT')









<label>

Legal System

</label>


<select name="legal_system_id"

class="form-control mb-3">



@foreach($legalSystems as $system)


<option value="{{ $system->id }}"

@if($document->legal_system_id==$system->id)

selected

@endif

>


{{ optional(
$system->translations->where('language.code','en')->first()
)->title ?? 'No Translation' }}



</option>


@endforeach


</select>









<label>

Current Image

</label>



@if($document->cover_image)


<div class="mb-3">


<img src="{{ asset('storage/'.$document->cover_image) }}"

class="preview-img">


</div>


@endif









<label>

Change Cover Image

</label>


<input type="file"

name="cover_image"

class="form-control mb-3">












<label>

Current PDF

</label>



@if($document->pdf_file)


<div class="mb-3">


<a href="{{ asset('storage/'.$document->pdf_file) }}"

target="_blank"

class="btn btn-info btn-sm">


<i class="bi bi-file-pdf"></i>

View PDF


</a>


</div>


@endif







<label>

Change PDF

</label>


<input type="file"

name="pdf_file"

class="form-control mb-3">










<label>

Status

</label>



<select name="status"

class="form-control mb-4">



<option value="draft"

@if($document->status=='draft')

selected

@endif
>

Draft

</option>





<option value="published"

@if($document->status=='published')

selected

@endif
>

Published

</option>





<option value="archived"

@if($document->status=='archived')

selected

@endif
>

Archived

</option>



</select>










<div class="text-center mt-4">



<button class="btn btn-success px-5">


Update


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


const toggle=document.getElementById('theme-toggle');

const icon=document.getElementById('theme-icon');

const body=document.body;



if(localStorage.getItem('theme')==='dark')

{

body.classList.add('dark');

icon.className='bi bi-sun-fill';

}





toggle.onclick=function(){


body.classList.toggle('dark');



if(body.classList.contains('dark'))

{


localStorage.setItem('theme','dark');


icon.className='bi bi-sun-fill';


}

else

{


localStorage.setItem('theme','light');


icon.className='bi bi-moon-stars-fill';


}



}



</script>



</body>

</html>
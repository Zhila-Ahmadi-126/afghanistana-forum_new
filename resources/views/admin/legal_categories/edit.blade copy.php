<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Edit Legal Branch of the Category</title>



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

<i class="bi bi-pencil-square"></i>

Edit Legal Branch of the Category

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







<form action="{{ route('admin.legal_categories.update',$category->id) }}"

method="POST"

enctype="multipart/form-data">


@csrf

@method('PUT')







<div class="glass-card">



<div class="row">







<!-- IMAGE -->

<div class="col-md-3 text-center">





<div class="photo-box"

id="dropArea">



@if($category->image)



<img id="preview"

src="{{ asset('storage/'.$category->image) }}"

class="avatar-preview">



@else



<img id="preview"

src="{{ asset('dashboard/images/news/default.JPG') }}"

class="avatar-preview">



@endif



</div>






<h5 class="mt-3">

Branch of the Category Image

</h5>




<small class="text-muted">

Click or Drag & Drop

</small>





<input

type="file"

name="image"

id="photo"

accept="image/*"

hidden>



</div>







<!-- INFORMATION -->


<div class="col-md-9">





<div class="row">







<!-- LEGAL DOCUMENT -->


<div class="col-md-6 mb-3">


<label>

Legal Branch of the Category

</label>



<select

name="legal_document_id"

class="form-control">


@foreach($documents as $document)


<option value="{{ $document->id }}"

@if($category->legal_document_id == $document->id)

selected

@endif

>

{{ optional($document->translations->first())->title ?? 'No Title' }}

</option>


@endforeach


</select>


</div>
<!-- PARENT CATEGORY -->

<div class="col-md-6 mb-3">


<label>

Parent Branch of the Category

</label>



<select

name="parent_id"

class="form-control">


<option value="">

-- No Parent --

</option>



@foreach($parents as $parent)


<option value="{{ $parent->id }}"


@if($category->parent_id == $parent->id)

selected

@endif


>

{{ optional($parent->translations->first())->title ?? 'No Title' }}


</option>


@endforeach



</select>



</div>









<!-- STATUS -->


<div class="col-md-6 mb-3">


<label>

Status

</label>



<select

name="status"

class="form-control">


<option value="draft"

@if($category->status=='draft')

selected

@endif

>

Draft

</option>




<option value="published"

@if($category->status=='published')

selected

@endif

>

Published

</option>




<option value="archived"

@if($category->status=='archived')

selected

@endif

>

Archived

</option>



</select>



</div>









<!-- SORT ORDER -->


<div class="col-md-6 mb-3">


<label>

Sort Order

</label>



<input

type="number"

name="sort_order"

value="{{ $category->sort_order ?? 0 }}"

class="form-control">



</div>









<!-- PDF FILE -->


<div class="col-md-6 mb-3">


<label>

PDF File

</label>




@if($category->pdf_file)


<div class="mb-2">


<a href="{{ asset('storage/'.$category->pdf_file) }}"

target="_blank"

class="btn btn-outline-primary btn-sm">


<i class="bi bi-file-earmark-pdf"></i>

View Current PDF


</a>


</div>



@endif




<input

type="file"

name="pdf_file"

class="form-control">



</div>








</div>



</div>



</div>








<div class="text-right mt-4">





<a href="{{ route('admin.legal_categories.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


Back


</a>






<button

type="submit"

id="saveBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>


Update Category


</button>




</div>






</form>





</div>
<script>


document.addEventListener("DOMContentLoaded", function(){



const body = document.body;

const toggle = document.getElementById("theme-toggle");

const icon = toggle.querySelector("i");


const form = document.querySelector("form");

const btn = document.getElementById("saveBtn");


const dropArea = document.getElementById("dropArea");

const photo = document.getElementById("photo");

const preview = document.getElementById("preview");







/*
|--------------------------------------------------------------------------
| IMAGE PREVIEW
|--------------------------------------------------------------------------
*/



if(dropArea){


dropArea.addEventListener("click",function(){


photo.click();


});


}







if(photo){


photo.addEventListener("change",function(e){


let file = e.target.files[0];


if(file){


preview.src = URL.createObjectURL(file);


}



});


}









/*
|--------------------------------------------------------------------------
| DRAG & DROP
|--------------------------------------------------------------------------
*/



if(dropArea){



["dragenter","dragover"].forEach(event=>{


dropArea.addEventListener(event,function(e){


e.preventDefault();


dropArea.classList.add("dragging");


});


});





["dragleave","drop"].forEach(event=>{


dropArea.addEventListener(event,function(e){


e.preventDefault();


dropArea.classList.remove("dragging");


});


});







dropArea.addEventListener("drop",function(e){



let file=e.dataTransfer.files[0];



if(file){



photo.files=e.dataTransfer.files;


preview.src=URL.createObjectURL(file);



}



});



}









/*
|--------------------------------------------------------------------------
| BUTTON LOADING
|--------------------------------------------------------------------------
*/


if(form && btn){



form.addEventListener("submit",function(){



btn.disabled=true;



btn.innerHTML=`

<span class="spinner-border spinner-border-sm"></span>

Updating...

`;



});



}









/*
|--------------------------------------------------------------------------
| DARK MODE
|--------------------------------------------------------------------------
*/


if(localStorage.getItem("theme")==="dark"){



body.classList.add("dark");


icon.className="bi bi-sun-fill";


}






if(toggle){



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
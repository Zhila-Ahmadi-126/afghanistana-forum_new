<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
{{ __('legal_categories_create.page_title') }}
</title>


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

<i class="bi bi-diagram-3"></i>

{{ __('legal_categories_create.create_branch_title') }}

</h2>




<button id="theme-toggle"

class="btn btn-light shadow">

<i class="bi bi-moon-stars-fill"></i>

</button>



</div>









<form action="{{ route('admin.legal_categories.store') }}"

method="POST"

enctype="multipart/form-data">


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





<!-- IMAGE -->


<div class="col-md-3 text-center">


<div class="photo-box"

id="dropArea">


<img id="preview"

src="{{ asset('dashboard/images/news/default.JPG') }}"

class="avatar-preview">


</div>



<h5 class="mt-3">

{{ __('legal_categories_create.category_image') }}

</h5>



<small class="text-muted">

{{ __('legal_categories_create.drag_drop_image') }}

</small>



<input type="file"

name="image"

id="photo"

accept="image/*"

hidden>


</div>











<div class="col-md-9">


<div class="row">










<div class="col-md-6 mb-3">


<label>

{{ __('legal_categories_create.legal_category') }}

</label>



<select

name="legal_document_id"

class="form-control @error('legal_document_id') is-invalid @enderror">


<option value="">

{{ __('legal_categories_create.select_category') }}

</option>



@foreach($documents as $document)


<option value="{{ $document->id }}"

{{ old('legal_document_id')==$document->id ? 'selected':'' }}>


{{ optional($document->translations->first())->title ?? 'Document '.$document->id }}


</option>



@endforeach



</select>



@error('legal_document_id')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>











<div class="col-md-6 mb-3">


<label>

{{ __('legal_categories_create.parent_category') }}

</label>



<select

name="parent_id"

class="form-control">


<option value="">

{{ __('legal_categories_create.main_category') }}

</option>



@foreach($parents as $parent)


<option value="{{ $parent->id }}"

{{ old('parent_id')==$parent->id ? 'selected':'' }}>


{{ optional($parent->translations->first())->title ?? 'Category '.$parent->id }}


</option>



@endforeach



</select>



</div>





<div class="col-md-6 mb-3">


<label>

{{ __('legal_categories_create.title') }}

</label>



<input

type="text"

name="title"

value="{{ old('title') }}"

class="form-control @error('title') is-invalid @enderror">



@error('title')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>








<div class="col-md-6 mb-3">


<label>

{{ __('legal_categories_create.status') }}

</label>



<select

name="status"

class="form-control @error('status') is-invalid @enderror">


<option value="draft">

{{ __('legal_categories_create.draft') }}

</option>


<option value="published">

{{ __('legal_categories_create.published') }}

</option>


<option value="archived">

{{ __('legal_categories_create.archived') }}

</option>


</select>



@error('status')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>









<!-- SHORT DESCRIPTION -->

<div class="col-md-12 mb-3">


<label>

{{ __('legal_categories_create.short_description') }}

</label>



<textarea

name="short_description"

rows="3"

class="form-control @error('short_description') is-invalid @enderror"

placeholder="{{ __('legal_categories_create.short_description_placeholder') }}">{{ old('short_description') }}</textarea>



@error('short_description')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>










<!-- DESCRIPTION -->

<div class="col-md-12 mb-3">


<label>

{{ __('legal_categories_create.description') }}

</label>



<textarea

name="description"

rows="5"

class="form-control @error('description') is-invalid @enderror"

placeholder="{{ __('legal_categories_create.description_placeholder') }}">{{ old('description') }}</textarea>



@error('description')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>









<!-- PDF FILE -->


<div class="col-md-6 mb-3">


<label>

{{ __('legal_categories_create.pdf_file') }}

</label>



<input

type="file"

name="pdf_file"

class="form-control @error('pdf_file') is-invalid @enderror">



@error('pdf_file')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>









<!-- SORT ORDER -->

<div class="col-md-6 mb-3">


<label>

{{ __('legal_categories_create.sort_order') }}

</label>



<input

type="number"

name="sort_order"

value="{{ old('sort_order',0) }}"

class="form-control @error('sort_order') is-invalid @enderror">



@error('sort_order')

<div class="text-danger mt-1">

<i class="bi bi-exclamation-circle"></i>

{{ $message }}

</div>

@enderror



</div>







</div>

</div>


</div>










<div class="text-right mt-4">



<a href="{{ route('admin.legal_categories.index') }}"

class="btn btn-secondary">

<br>

<i class="bi bi-arrow-left"></i>


{{ __('legal_categories_create.back') }}


</a>








<button

type="submit"

id="saveBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>


{{ __('legal_categories_create.save_category') }}


</button>



</div>







</form>


</div>
<script>


document.addEventListener("DOMContentLoaded", function(){



const form = document.querySelector("form");

const btn = document.getElementById("saveBtn");

const toggle = document.getElementById("theme-toggle");

const body = document.body;

const icon = toggle.querySelector("i");

const dropArea = document.getElementById("dropArea");

const photo = document.getElementById("photo");

const preview = document.getElementById("preview");






/* IMAGE CLICK */


dropArea.addEventListener("click",function(){

photo.click();

});






/* IMAGE PREVIEW */


photo.addEventListener("change",function(e){


let file=e.target.files[0];


if(file){

preview.src=URL.createObjectURL(file);

}


});








/* DRAG DROP */


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









/* SAVE LOADING */


form.addEventListener("submit",function(){


btn.disabled=true;


btn.innerHTML=`

<span class="spinner-border spinner-border-sm"></span>

{{ __('legal_categories_create.saving') }}

`;


});









/* DARK MODE */


if(localStorage.getItem("theme")==="dark"){


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








});



</script>







<script src="https://cdn.jsdelivr.net/npm/bootstrap.bundle.min.js"></script>





</body>

</html>
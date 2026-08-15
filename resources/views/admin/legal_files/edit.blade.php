<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ __('legal_files_edit.page_title') }}</title>


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


<i class="bi bi-pencil-square"></i>

{{ __('legal_files_edit.page_title') }}


</h2>




<button
id="theme-toggle"
class="btn btn-light shadow">


<i class="bi bi-moon-stars-fill"></i>


</button>


</div>







<form

action="{{ route('admin.legal_files.update',$file->id) }}"

method="POST"

enctype="multipart/form-data">


@csrf

@method('PUT')





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


<div class="row">






<div class="col-md-4 text-center">


<div class="photo-box" id="dropArea">


@if($file->image)


<img

id="preview"

src="{{ asset('storage/'.$file->image) }}"

class="avatar-preview">


@else


<img

id="preview"

src="{{ asset('dashboard/images/news/default.JPG') }}"

class="avatar-preview">


@endif



</div>




<h5 class="mt-3">

{{ __('legal_files_edit.featured_image') }}

</h5>



<small class="text-muted">

{{ __('legal_files_edit.image_instruction') }}

</small>




<input

type="file"

name="image"

id="photo"

accept="image/*"

hidden>



</div>
<div class="col-md-8">


<div class="row">
    <div class="col-md-6 mb-4">


<label>

{{ __('legal_files_edit.legal_category') }}

</label>


<select

name="legal_category_id"

class="form-control @error('legal_category_id') is-invalid @enderror">


<option value="">

{{ __('legal_files_edit.select_category') }}

</option>



@foreach($categories as $category)


<option

value="{{ $category->id }}"

{{ $file->legal_category_id == $category->id ? 'selected':'' }}>



@if($category->translation)

{{ $category->translation->title }}

@else

{{ __('legal_files_edit.category_number') }} {{ $category->id }}

@endif



</option>



@endforeach



</select>



@error('legal_category_id')


<div class="text-danger mt-1">

{{ $message }}

</div>


@enderror



</div>









<div class="col-md-6 mb-4">


<label>

{{ __('legal_files_edit.status') }}

</label>



<select

name="status"

class="form-control @error('status') is-invalid @enderror">



<option

value="draft"

{{ $file->status=='draft'?'selected':'' }}>

{{ __('legal_files_edit.draft') }}

</option>




<option

value="published"

{{ $file->status=='published'?'selected':'' }}>

{{ __('legal_files_edit.published') }}

</option>




<option

value="archived"

{{ $file->status=='archived'?'selected':'' }}>

{{ __('legal_files_edit.archived') }}

</option>



</select>



@error('status')


<div class="text-danger mt-1">

{{ $message }}

</div>


@enderror



</div>









<div class="col-md-6 mb-4">


<label>

{{ __('legal_files_edit.file_url') }}

</label>


<input

type="url"

name="file_url"

class="form-control @error('file_url') is-invalid @enderror"

value="{{ old('file_url',$file->file_url) }}">



@error('file_url')


<div class="text-danger mt-1">

{{ $message }}

</div>


@enderror



</div>









<div class="col-md-6 mb-4">


<label>

{{ __('legal_files_edit.sort_order') }}

</label>


<input

type="number"

name="sort_order"

class="form-control"

value="{{ old('sort_order',$file->sort_order) }}">



</div>









<div class="col-md-12 mb-4">


<label>

{{ __('legal_files_edit.pdf_file') }}

</label>



@if($file->pdf_file)


<div class="mb-3">


<a

href="{{ asset('storage/'.$file->pdf_file) }}"

target="_blank"

class="btn btn-primary">


<i class="bi bi-file-earmark-pdf"></i>


{{ __('legal_files_edit.view_current_pdf') }}


</a>


</div>



@endif





<input

type="file"

name="pdf_file"

accept="application/pdf"

class="form-control @error('pdf_file') is-invalid @enderror">



@error('pdf_file')


<div class="text-danger mt-1">

{{ $message }}

</div>


@enderror




<small class="text-muted">


{{ __('legal_files_edit.keep_current_pdf') }}


</small>



</div>







</div>


</div>


</div>



<hr>


<div class="text-right mt-4">


<a href="{{ route('admin.legal_files.index') }}"

class="btn btn-secondary">
<br>

<i class="bi bi-arrow-left"></i>

{{ __('legal_files_edit.back') }}


</a>




<button

type="submit"

id="saveBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>


{{ __('legal_files_edit.update') }}


</button>



</div>


</form>


</div>


</div>
<script>


document.addEventListener("DOMContentLoaded",function(){



const form=document.querySelector("form");

const btn=document.getElementById("saveBtn");

const body=document.body;

const toggle=document.getElementById("theme-toggle");

const icon=toggle.querySelector("i");






/*
|--------------------------------------------------------------------------
| IMAGE PREVIEW
|--------------------------------------------------------------------------
*/


const photo=document.getElementById("photo");

const preview=document.getElementById("preview");

const dropArea=document.getElementById("dropArea");





if(photo){


photo.addEventListener("change",function(){


const file=this.files[0];


if(file){


preview.src=URL.createObjectURL(file);


}


});


}









if(dropArea){


dropArea.addEventListener("click",function(){


photo.click();


});






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


const files=e.dataTransfer.files;



if(files.length){


photo.files=files;


preview.src=URL.createObjectURL(files[0]);


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


btn.innerHTML=


'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("legal_files_edit.updating") }}';



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







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>





</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>{{ __('legal_files_create.page_title') }}</title>


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

<i class="bi bi-folder-plus"></i>

{{ __('legal_files_create.page_title') }}

</h2>




<button id="theme-toggle"

class="btn btn-light shadow">


<i class="bi bi-moon-stars-fill"></i>


</button>



</div>










<form action="{{ route('admin.legal_files.store') }}"

method="POST"

enctype="multipart/form-data">


@csrf






@if($errors->any())


<div class="alert alert-danger">


<ul class="mb-0">


@foreach($errors->all() as $error)


<li>{{ $error }}</li>


@endforeach


</ul>


</div>


@endif






@if(session('error'))


<div class="alert alert-danger">

{{ session('error') }}

</div>


@endif






<div class="glass-card">


<div class="row">


<div class="col-md-4 mb-4">


<label class="form-label">

{{ __('legal_files_create.legal_category') }}

</label>



<select name="legal_category_id"

class="form-control">



<option value="">

{{ __('legal_files_create.select_category') }}

</option>



@foreach($categories as $category)



<option value="{{ $category->id }}"

{{ old('legal_category_id') == $category->id ? 'selected' : '' }}>


{{ optional($category->translations->first())->title ?? __('legal_files_create.no_title') }}


</option>



@endforeach



</select>



@error('legal_category_id')

<small class="text-danger">

{{ $message }}

</small>

@enderror



</div>








<div class="col-md-4 mb-4">


<label class="form-label">

{{ __('legal_files_create.status') }}

</label>



<select name="status"

class="form-control">



<option value="draft">

{{ __('legal_files_create.draft') }}

</option>



<option value="published">

{{ __('legal_files_create.published') }}

</option>



<option value="archived">

{{ __('legal_files_create.archived') }}

</option>



</select>



@error('status')

<small class="text-danger">

{{ $message }}

</small>

@enderror



</div>








<div class="col-md-4 mb-4">


<label class="form-label">

{{ __('legal_files_create.sort_order') }}

</label>



<input type="number"

name="sort_order"

class="form-control"

value="{{ old('sort_order',0) }}">



@error('sort_order')

<small class="text-danger">

{{ $message }}

</small>

@enderror



</div>
 
<div class="col-md-6 mb-4">


<label class="form-label">

{{ __('legal_files_create.image') }}

</label>



<input type="file"

name="image"

class="form-control"

accept="image/*">



@error('image')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>








<div class="col-md-6 mb-4">


<label class="form-label">

{{ __('legal_files_create.pdf_file') }}

</label>



<input type="file"

name="pdf_file"

class="form-control"

accept=".pdf">



@error('pdf_file')

<small class="text-danger">

{{ $message }}

</small>

@enderror


</div>









<div class="col-md-12 mb-4">


<label class="form-label">

{{ __('legal_files_create.file_url') }}

</label>



<input 
type="url"
name="file_url"
class="form-control"
value="{{ old('file_url') }}"
placeholder="{{ __('legal_files_create.file_url_placeholder') }}">





@error('file_url')

<small class="text-danger">

{{ $message }}

</small>

@enderror



</div>







<div class="col-md-6 mb-4">


<label class="form-label">

{{ __('legal_files_create.title') }}

</label>



<input type="text"

name="title"

class="form-control"

value="{{ old('title') }}"

placeholder="{{ __('legal_files_create.title_placeholder') }}">





@error('title')

<small class="text-danger">

{{ $message }}

</small>

@enderror



</div>








<div class="col-md-6 mb-4">



<label class="form-label">

{{ __('legal_files_create.meta_title') }}

</label>



<input type="text"

name="meta_title"

class="form-control"

value="{{ old('meta_title') }}"

placeholder="{{ __('legal_files_create.meta_title_placeholder') }}">



</div>









<div class="col-md-12 mb-4">



<label class="form-label">

{{ __('legal_files_create.short_description') }}

</label>



<textarea name="short_description"

class="form-control"

rows="3"

placeholder="{{ __('legal_files_create.short_description_placeholder') }}">{{ old('short_description') }}</textarea>



</div>









<div class="col-md-12 mb-4">



<label class="form-label">

{{ __('legal_files_create.description') }}

</label>



<textarea name="description"

class="form-control"

rows="5"

placeholder="{{ __('legal_files_create.description_placeholder') }}">{{ old('description') }}</textarea>



</div>









<div class="col-md-12 mb-4">



<label class="form-label">

{{ __('legal_files_create.meta_description') }}

</label>



<textarea name="meta_description"

class="form-control"

rows="3"

placeholder="{{ __('legal_files_create.meta_description_placeholder') }}">{{ old('meta_description') }}</textarea>



</div>







</div>


</div>





<div class="text-end mt-4">



<a href="{{ route('admin.legal_files.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>

{{ __('legal_files_create.back') }}

</a>





<button type="submit"

class="btn btn-primary">



<i class="bi bi-check-circle"></i>


{{ __('legal_files_create.save') }}


</button>



</div>



</div>












</form>


</div>
<script>


document.addEventListener("DOMContentLoaded",function(){



const body=document.body;

const toggle=document.getElementById("theme-toggle");

const icon=toggle.querySelector("i");



if(localStorage.getItem("theme")==="dark"){



body.classList.add("dark");



icon.className="bi bi-sun-fill";



}




toggle.addEventListener("click",function(){



body.classList.toggle("dark");





if(body.classList.contains("dark")){



localStorage.setItem("theme","dark");



icon.className="bi bi-sun-fill";



}else{



localStorage.setItem("theme","light");



icon.className="bi bi-moon-stars-fill";



}



});



});



</script>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>





</body>

</html>
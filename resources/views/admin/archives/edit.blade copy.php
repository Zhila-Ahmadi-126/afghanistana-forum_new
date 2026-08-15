@extends('layouts.admin-form')


@section('title')

@endsection





@section('content')



<div class="container py-5">






{{-- ==========================================
HEADER
========================================== --}}



<div class="mb-4">


<h2 class="font-weight-bold">


Edit Archive


</h2>



</div>








{{-- ==========================================
ERROR MESSAGE
========================================== --}}



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








{{-- ==========================================
FORM START
========================================== --}}



<form action="{{ route('admin.archives.update',$archive->id) }}"

      method="POST"

      enctype="multipart/form-data">



@csrf








<div class="glass-card">



<div class="row">








{{-- ==========================================
IMAGE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

Image

</label>




@if($archive->image)


<div class="mb-2">


<img src="{{ asset('storage/'.$archive->image) }}"

     width="120"

     height="120"

     style="object-fit:cover;border-radius:10px;">



</div>


@endif






<input type="file"

       name="image"

       class="form-control">



<small class="text-muted">

Leave empty to keep current image

</small>



</div>








{{-- ==========================================
PDF FILE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

PDF File

</label>





@if($archive->pdf_file)


<div class="mb-2">


<a href="{{ asset('storage/'.$archive->pdf_file) }}"

   target="_blank"

   class="btn btn-danger btn-sm">

<br>

<i class="bi bi-file-earmark-pdf"></i>

Current PDF


</a>



</div>


@endif





<input type="file"

       name="pdf_file"

       class="form-control">



<small class="text-muted">

Leave empty to keep current PDF

</small>



</div>








{{-- ==========================================
PROFILE URL
========================================== --}}



<div class="col-md-12 mb-3">


<label>

Profile URL

</label>




<input type="text"

       name="profile_url"

       class="form-control"

       value="{{ old('profile_url',$archive->profile_url) }}">



</div>

{{-- ==========================================
ARCHIVE YEAR
========================================== --}}

<div class="col-md-4 mb-3">

    <label>

        Archive Year

    </label>

    <input type="number"

           name="archive_year"

           class="form-control"

           min="1900"

           max="{{ date('Y') + 10 }}"

           value="{{ old('archive_year',$archive->archive_year) }}">

</div>





{{-- ==========================================
STATUS
========================================== --}}

<div class="col-md-4 mb-3">

    <label>

        Status

    </label>

    <select name="status"

            class="form-control">

        <option value="active"

            {{ old('status',$archive->status)=='active' ? 'selected':'' }}>

            Active

        </option>

        <option value="inactive"

            {{ old('status',$archive->status)=='inactive' ? 'selected':'' }}>

            Inactive

        </option>

    </select>

</div>





{{-- ==========================================
SORT ORDER
========================================== --}}

<div class="col-md-4 mb-3">

    <label>

        Sort Order

    </label>

    <input type="number"

           name="sort_order"

           class="form-control"

           value="{{ old('sort_order',$archive->sort_order) }}">

</div>





</div>

</div>





{{-- ==========================================
BUTTONS
========================================== --}}

<div class="text-end mt-4">

    <a href="{{ route('admin.archives.index') }}"

       class="btn btn-secondary">
       <br>

        <i class="bi bi-arrow-left"></i>

        Back

    </a>





    <button type="submit"

            id="saveBtn"

            class="btn btn-primary">

        <i class="bi bi-check-circle"></i>

        Update Archive

    </button>

</div>

</form>





<script>


document.addEventListener("DOMContentLoaded", function(){



// ==========================================
// BUTTON LOADING
// ==========================================


const form = document.querySelector("form");


const btn = document.getElementById("saveBtn");




if(form && btn){



    form.addEventListener("submit",function(){



        btn.disabled = true;



        btn.innerHTML =

        '<span class="spinner-border spinner-border-sm me-2"></span>Updating...';



    });



}



});



</script>







@endsection
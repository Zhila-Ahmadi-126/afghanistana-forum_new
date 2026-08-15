@extends('layouts.admin-form')


@section('title')

{{ __('archive_create.title') }}

@endsection





@section('content')




<div class="container py-5">








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



<form action="{{ route('admin.archives.store') }}"

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

{{ __('archive_create.image') }}

</label>



<input type="file"

       name="image"

       class="form-control">



</div>











{{-- ==========================================
PDF FILE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('archive_create.pdf_file') }}

</label>



<input type="file"

       name="pdf_file"

       class="form-control">



</div>











{{-- ==========================================
PROFILE URL
========================================== --}}



<div class="col-md-12 mb-3">


<label>

{{ __('archive_create.profile_url') }}

</label>



<input type="text"

       name="profile_url"

       class="form-control"

       value="{{ old('profile_url') }}"

       placeholder="Enter profile page URL">



</div>




{{-- ==========================================
ARCHIVE YEAR
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('archive_create.archive_year') }}

</label>




<input type="number"

       name="archive_year"

       class="form-control"

       value="{{ old('archive_year') }}"

       placeholder="Example: 2026">



</div>




{{-- ==========================================
STATUS
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('archive_create.status') }}

</label>




<select name="status"

        class="form-control">





<option value="active"

{{ old('status') == 'active' ? 'selected':'' }}>


{{ __('archive_create.active') }}


</option>





<option value="inactive"

{{ old('status') == 'inactive' ? 'selected':'' }}>


{{ __('archive_create.inactive') }}


</option>





</select>



</div>












{{-- ==========================================
SORT ORDER
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('archive_create.sort_order') }}

</label>




<input type="number"

       name="sort_order"

       class="form-control"

       value="{{ old('sort_order',0) }}"

       placeholder="Display order">



</div>

</div>


{{-- ==========================================
BUTTONS
========================================== --}}



<div class="text-right mt-4">






<a href="{{ route('admin.archives.index') }}"

   class="btn btn-danger">

<br>
<i class="bi bi-arrow-left"></i>


{{ __('archive_create.back') }}


</a>








<button type="submit"

        id="saveBtn"

        class="btn btn-primary">



<i class="bi bi-check-circle"></i>



{{ __('archive_create.save') }}



</button>


</div>

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

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("archive_create.saving") }}';
});
}
});



</script>


@endsection

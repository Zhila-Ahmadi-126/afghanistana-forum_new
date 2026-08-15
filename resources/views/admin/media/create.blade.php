@extends('layouts.admin-form')


@section('title')

{{ __('media_create.create_title') }}

@endsection





@section('content')




<form action="{{ route('admin.media.store') }}"

      method="POST"

      enctype="multipart/form-data">


@csrf







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






{{-- ==========================================
MEDIA TYPE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.type') }}

</label>




<select name="type"

        class="form-control"

        required>



<option value="">


{{ __('media_create.select_type') }}


</option>




<option value="seminar">


{{ __('media_create.seminar') }}


</option>





<option value="live">


{{ __('media_create.live') }}


</option>





<option value="public_video">


{{ __('media_create.public_video') }}


</option>





<option value="tv_program">


{{ __('media_create.tv_program') }}


</option>





<option value="interview">


{{ __('media_create.interview') }}


</option>



</select>



</div>









{{-- ==========================================
SOURCE TYPE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.media_type') }}

</label>




<select name="media_type"

        class="form-control"

        required>



<option value="youtube">


{{ __('media_create.youtube') }}


</option>




<option value="external">


{{ __('media_create.external') }}


</option>




<option value="upload">


{{ __('media_create.upload') }}


</option>



</select>



</div>






{{-- ==========================================
THUMBNAIL
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.thumbnail') }}

</label>




<input type="file"

       name="thumbnail"

       class="form-control"

       accept="image/*">



</div>









{{-- ==========================================
YOUTUBE URL
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.youtube_url') }}

</label>




<input type="text"

       name="youtube_url"

       class="form-control"

       placeholder="https://youtube.com/...">



</div>









{{-- ==========================================
EXTERNAL URL
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.external_url') }}

</label>




<input type="text"

       name="external_url"

       class="form-control"

       placeholder="Google Meet / Zoom link">



</div>


















{{-- ==========================================
PDF FILE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.pdf_file') }}

</label>




<input type="file"

       name="pdf_file"

       class="form-control"

       accept="application/pdf">



</div>












{{-- ==========================================
LIVE DATE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.start_date') }}

</label>




<input type="datetime-local"

       name="start_date"

       class="form-control">



</div>








{{-- ==========================================
END DATE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.end_date') }}

</label>




<input type="datetime-local"

       name="end_date"

       class="form-control">



</div>








{{-- ==========================================
STATUS
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_create.status') }}

</label>




<select name="status"

        class="form-control">



<option value="active">


{{ __('media_create.active') }}


</option>




<option value="inactive">


{{ __('media_create.inactive') }}


</option>



</select>



</div>









{{-- ==========================================
FEATURED
========================================== --}}



<div class="col-md-6 mb-3 d-flex align-items-center">


<div class="form-check mt-4 ">



<input type="checkbox"

       name="is_featured"

       value="1"

       class="form-check-input ml-3"

       id="featured">



<label class="form-check-label ml-3 pl-4"

       for="featured">


      {{ __('media_create.featured') }}


</label>



</div>


</div>





{{-- ==========================================
BUTTONS
========================================== --}}



<div class="text-end mt-4">





<a href="{{ route('admin.media.index') }}"

   class="btn btn-secondary">
<br>

<i class="bi bi-arrow-left"></i>


{{ __('media_create.back') }}



</a>








<button type="submit"

        id="saveBtn"

        class="btn btn-primary">


<i class="bi bi-check-circle"></i>


{{ __('media_create.save') }}



</button>






</div>



</div>

</div>















</form>






</div>

</div>



<script>


document.addEventListener("DOMContentLoaded",function(){



const form = document.querySelector("form");


const btn = document.getElementById("saveBtn");



if(form && btn){


form.addEventListener("submit",function(){


btn.disabled=true;



btn.innerHTML =

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("admin.media.saving") }}';



});


}



});



</script>







@endsection
@extends('layouts.admin-form')


@section('title')

{{ __('media_edit.edit_title') }}

@endsection





@section('content')




<form action="{{ route('admin.media.update',$media->id) }}"

      method="POST"

      enctype="multipart/form-data">


@csrf

@method('POST')









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
TYPE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.type') }}

</label>




<select name="type"

class="form-control"

required>



<option value="seminar"

{{ $media->type=='seminar'?'selected':'' }}>


{{ __('media_edit.seminar') }}


</option>





<option value="live"

{{ $media->type=='live'?'selected':'' }}>


{{ __('media_edit.live') }}


</option>





<option value="public_video"

{{ $media->type=='public_video'?'selected':'' }}>


{{ __('media_edit.public_video') }}


</option>





<option value="tv_program"

{{ $media->type=='tv_program'?'selected':'' }}>


{{ __('media_edit.tv_program') }}


</option>





<option value="interview"

{{ $media->type=='interview'?'selected':'' }}>


{{ __('media_edit.interview') }}


</option>



</select>



</div>








{{-- ==========================================
MEDIA TYPE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.media_type') }}

</label>




<select name="media_type"

class="form-control"

required>



<option value="youtube"

{{ $media->media_type=='youtube'?'selected':'' }}>


{{ __('media_edit.youtube') }}


</option>




<option value="external"

{{ $media->media_type=='external'?'selected':'' }}>


{{ __('media_edit.external') }}


</option>




<option value="upload"

{{ $media->media_type=='upload'?'selected':'' }}>


{{ __('media_edit.upload') }}


</option>



</select>



</div>







{{-- ==========================================
THUMBNAIL
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.thumbnail') }}

</label>




@if($media->thumbnail)



<div class="mb-2">


<img src="{{ asset('storage/'.$media->thumbnail) }}"

width="120"

height="80"

style="object-fit:cover;border-radius:8px;">


</div>



@endif





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

{{ __('media_edit.youtube_url') }}

</label>




<input type="text"

       name="youtube_url"

       class="form-control"

       value="{{ old('youtube_url',$media->youtube_url) }}">



</div>









{{-- ==========================================
EXTERNAL URL
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.external_url') }}

</label>




<input type="text"

       name="external_url"

       class="form-control"

       value="{{ old('external_url',$media->external_url) }}">



</div>









{{-- ==========================================
PDF FILE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.pdf_file') }}

</label>




@if($media->pdf_file)



<div class="mb-2">


<a href="{{ asset('storage/'.$media->pdf_file) }}"

target="_blank"

class="btn btn-sm btn-primary">

<br>
<i class="bi bi-file-earmark-pdf"></i>


{{ __('media_edit.view_pdf') }}


</a>


</div>



@endif





<input type="file"

       name="pdf_file"

       class="form-control"

       accept="application/pdf">



</div>





{{-- ==========================================
START DATE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.start_date') }}

</label>




<input type="datetime-local"

       name="start_date"

       class="form-control"

       value="{{ old('start_date',
       $media->start_date ? date('Y-m-d\TH:i',strtotime($media->start_date)) : '') }}">



</div>









{{-- ==========================================
END DATE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.end_date') }}

</label>




<input type="datetime-local"

       name="end_date"

       class="form-control"

       value="{{ old('end_date',
       $media->end_date ? date('Y-m-d\TH:i',strtotime($media->end_date)) : '') }}">



</div>









{{-- ==========================================
STATUS
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('media_edit.status') }}

</label>




<select name="status"

class="form-control">



<option value="active"

{{ $media->status=='active'?'selected':'' }}>


{{ __('media_edit.active') }}


</option>




<option value="inactive"

{{ $media->status=='inactive'?'selected':'' }}>


{{ __('media_edit.inactive') }}


</option>



</select>



</div>









{{-- ==========================================
FEATURED
========================================== --}}



<div class="col-md-6 mb-3 d-flex align-items-center">


<div class="form-check mt-4">



<input type="checkbox"

name="is_featured"

value="1"

class="form-check-input"

id="featured"

{{ $media->is_featured ? 'checked':'' }}>



<label class="form-check-label"

for="featured">


{{ __('media_edit.featured') }}


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


{{ __('media_edit.back') }}



</a>








<button type="submit"

id="updateBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>


{{ __('media_edit.update') }}



</button>






</div>








</div>

</div>













</form>









<script>


document.addEventListener("DOMContentLoaded",function(){



const form = document.querySelector("form");


const btn = document.getElementById("updateBtn");



if(form && btn){


form.addEventListener("submit",function(){


btn.disabled=true;



btn.innerHTML =

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("admin.media.updating") }}';



});


}



});



</script>






@endsection
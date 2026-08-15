@extends('layouts.admin-form')


@section('title')

{{ __('announcement_edit.edit_title') }}

@endsection



@section('content')


<form action="{{ route('admin.announcements.update',$announcement->id) }}"

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







{{-- ==========================
LANGUAGE
========================== --}}


<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.language') }}

</label>


<select name="language_id"

class="form-control">



@foreach($languages as $language)


<option value="{{ $language->id }}"

{{ $translation && $translation->language_id == $language->id ? 'selected':'' }}>


{{ $language->name }}

({{ strtoupper($language->code) }})


</option>


@endforeach



</select>


</div>









{{-- ==========================
CURRENT IMAGE
========================== --}}


<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.current_image') }}

</label>


@if($announcement->image)


<br>


<img src="{{ asset('storage/'.$announcement->image) }}"

width="120"

style="border-radius:15px;">


@else


<p class="text-muted">

{{ __('announcement_edit.no_image') }}

</p>


@endif



</div>









{{-- ==========================
NEW IMAGE
========================== --}}


<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.change_image') }}

</label>


<input type="file"

name="image"

class="form-control">


</div>








{{-- ==========================
PDF FILE
========================== --}}


<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.pdf_file') }}

</label>
<br>



@if($announcement->pdf_file)


<a href="{{ asset('storage/'.$announcement->pdf_file) }}"

target="_blank"

class="btn btn-sm btn-info mb-2">

<br>
<i class="bi bi-file-pdf"></i>


{{ __('announcement_edit.view_current_pdf') }}


</a>


@endif



<input type="file"

name="pdf_file"

class="form-control">


</div>{{-- ==========================
SOURCE URL
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_edit.source_url') }}

</label>


<input type="url"

name="source_url"

class="form-control"

value="{{ old('source_url',$announcement->source_url) }}">


</div>








{{-- ==========================
TITLE
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_edit.title') }}

</label>


<input type="text"

name="title"

class="form-control"

value="{{ old('title',$translation->title ?? '') }}">


</div>









{{-- ==========================
SHORT DESCRIPTION
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_edit.short_description') }}

</label>


<textarea name="short_description"

rows="4"

class="form-control">{{ old('short_description',$translation->short_description ?? '') }}</textarea>


</div>









{{-- ==========================
DESCRIPTION
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_edit.description') }}

</label>


<textarea name="description"

rows="8"

class="form-control">{{ old('description',$translation->description ?? '') }}</textarea>


</div>









{{-- ==========================
DATES
========================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.publish_date') }}

</label>


<input type="date"

name="publish_date"

class="form-control"

value="{{ old('publish_date',$announcement->publish_date) }}">


</div>







<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.expiry_date') }}

</label>


<input type="date"

name="expiry_date"

class="form-control"

value="{{ old('expiry_date',$announcement->expiry_date) }}">


</div>
{{-- ==========================
STATUS
========================== --}}


<div class="col-md-4 mb-3">


<label>

{{ __('announcement_edit.status') }}

</label>


<select name="status"

class="form-control">


<option value="draft"

{{ $announcement->status=='draft'?'selected':'' }}>

{{ __('announcement_edit.draft') }}

</option>


<option value="published"

{{ $announcement->status=='published'?'selected':'' }}>

{{ __('announcement_edit.published') }}

</option>


<option value="archived"

{{ $announcement->status=='archived'?'selected':'' }}>

{{ __('announcement_edit.archived') }}

</option>


</select>


</div>









{{-- ==========================
FEATURED
========================== --}}


<div class="col-md-4 mb-3">


<label>

{{ __('announcement_edit.featured') }}

</label>


<select name="is_featured"

class="form-control">


<option value="0"

{{ !$announcement->is_featured?'selected':'' }}>

{{ __('announcement_edit.no') }}

</option>


<option value="1"

{{ $announcement->is_featured?'selected':'' }}>

{{ __('announcement_edit.yes') }}

</option>


</select>


</div>










{{-- ==========================
SORT ORDER
========================== --}}


<div class="col-md-4 mb-3">


<label>

{{ __('announcement_edit.sort_order') }}

</label>


<input type="number"

name="sort_order"

class="form-control"

value="{{ $announcement->sort_order }}">


</div>

{{-- ==========================
SEO INFORMATION
========================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.meta_title') }}

</label>


<input type="text"

name="meta_title"

class="form-control"

value="{{ old('meta_title',$translation->meta_title ?? '') }}">


</div>








<div class="col-md-6 mb-3">


<label>

{{ __('announcement_edit.meta_description') }}

</label>


<textarea name="meta_description"

rows="3"

class="form-control">{{ old('meta_description',$translation->meta_description ?? '') }}</textarea>


</div>







</div>

</div>










{{-- ==========================
BUTTONS
========================== --}}



<div class="text-right mt-4">


<a href="{{ route('admin.announcements.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>

{{ __('announcement_edit.back') }}


</a>







<button type="submit"

id="saveBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>

{{ __('announcement_edit.update') }}


</button>



</div>









</form>











<script>


document.addEventListener("DOMContentLoaded", function(){



// ==========================
// BUTTON LOADING
// ==========================


const form = document.querySelector("form");

const btn = document.getElementById("saveBtn");



if(form && btn){


form.addEventListener("submit",function(){


btn.disabled = true;


btn.innerHTML =

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("announcement_edit.updating") }}';


});


}



});



</script>



@endsection
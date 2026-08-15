@extends('layouts.admin-form')


@section('title')

Add Announcement

@endsection



@section('content')


<form action="{{ route('admin.announcements.store') }}"

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

Language

</label>


<select name="language_id"

class="form-control">


@foreach($languages as $language)


<option value="{{ $language->id }}"

{{ $language->code == 'en' ? 'selected':'' }}>


{{ $language->name }}

({{ strtoupper($language->code) }})


</option>


@endforeach


</select>


</div>









{{-- ==========================
IMAGE
========================== --}}


<div class="col-md-6 mb-3">


<label>

Image

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

PDF File

</label>


<input type="file"

name="pdf_file"

class="form-control">


</div>









{{-- ==========================
SOURCE URL
========================== --}}


<div class="col-md-12 mb-3">


<label>

Source URL

</label>


<input type="url"

name="source_url"

class="form-control"

placeholder="https://example.com">


</div>








{{-- ==========================
TITLE
========================== --}}


<div class="col-md-12 mb-3">


<label>

Title

</label>


<input type="text"

name="title"

value="{{ old('title') }}"

class="form-control"

placeholder="Enter announcement title">



</div>






{{-- ==========================
SHORT DESCRIPTION
========================== --}}


<div class="col-md-12 mb-3">


<label>

Short Description

</label>


<textarea name="short_description"

rows="4"

class="form-control"

placeholder="Enter short description">{{ old('short_description') }}</textarea>


</div>

{{-- ==========================
DESCRIPTION
========================== --}}


<div class="col-md-12 mb-3">


<label>

Description

</label>


<textarea name="description"

rows="8"

class="form-control"

placeholder="Enter announcement details">{{ old('description') }}</textarea>


</div>









{{-- ==========================
PUBLISH DATE
========================== --}}


<div class="col-md-6 mb-3">


<label>

Publish Date

</label>


<input type="date"

name="publish_date"

class="form-control"

value="{{ old('publish_date') }}">


</div>








{{-- ==========================
EXPIRY DATE
========================== --}}


<div class="col-md-6 mb-3">


<label>

Expiry Date

</label>


<input type="date"

name="expiry_date"

class="form-control"

value="{{ old('expiry_date') }}">


</div>









{{-- ==========================
STATUS
========================== --}}


<div class="col-md-4 mb-3">


<label>

Status

</label>


<select name="status"

class="form-control">


<option value="draft">

Draft

</option>


<option value="published">

Published

</option>


<option value="archived">

Archived

</option>


</select>


</div>









{{-- ==========================
FEATURED
========================== --}}


<div class="col-md-4 mb-3">


<label>

Featured

</label>


<select name="is_featured"

class="form-control">


<option value="0">

No

</option>


<option value="1">

Yes

</option>


</select>


</div>









{{-- ==========================
SORT ORDER
========================== --}}


<div class="col-md-4 mb-3">


<label>

Sort Order

</label>


<input type="number"

name="sort_order"

class="form-control"

value="0">


</div>









{{-- ==========================
META TITLE
========================== --}}


<div class="col-md-6 mb-3">


<label>

Meta Title

</label>


<input type="text"

name="meta_title"

class="form-control"

value="{{ old('meta_title') }}">


</div>









{{-- ==========================
META DESCRIPTION
========================== --}}


<div class="col-md-6 mb-3">


<label>

Meta Description

</label>


<textarea name="meta_description"

rows="3"

class="form-control">{{ old('meta_description') }}</textarea>


</div>

</div> {{-- end row --}}

</div> {{-- end glass-card --}}





{{-- ==========================
BUTTONS
========================== --}}


<div class="text-right mt-4">



<a href="{{ route('admin.announcements.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


Back


</a>





<button type="submit"

id="saveBtn"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>


Save Announcement


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

'<span class="spinner-border spinner-border-sm me-2"></span>Saving...';


});


}




});



</script>



@endsection

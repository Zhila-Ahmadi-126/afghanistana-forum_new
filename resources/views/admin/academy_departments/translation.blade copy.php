@extends('layouts.admin-form')

@section('title')

Department Translation

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-9">


<div class="glass-card">


<h4 class="text-center mb-4">

Department Translation

</h4>





@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif





@if($errors->any())

<div class="alert alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif






<form action="{{ route('admin.academy_departments.saveTranslation',$department->id) }}"

method="POST">


@csrf





<div class="row">



<div class="col-md-12 mb-4">


<label>

Language

</label>


<select

name="language_id"

class="form-control"

onchange="changeLanguage(this)">



<option value="">

Select Language

</option>



@foreach($languages as $language)

<option

value="{{ $language->id }}"

{{ request('language_id')==$language->id?'selected':'' }}>

{{ $language->name }}

</option>

@endforeach


</select>


</div>



</div>
<input type="hidden"

name="language_id"

value="{{ request('language_id') }}">





<div class="mb-3">


<label>

Title

</label>


<input type="text"

name="title"

class="form-control"

value="{{ old('title',$translation?->title) }}">


@error('title')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>







<div class="mb-3">


<label>

Short Description

</label>


<textarea

name="short_description"

rows="3"

class="form-control">{{ old('short_description',$translation?->short_description) }}</textarea>


</div>








<div class="mb-3">


<label>

Description

</label>


<textarea

name="description"

rows="8"

class="form-control">{{ old('description',$translation?->description) }}</textarea>


</div>







<div class="row">


<div class="col-md-6 mb-3">


<label>

Meta Title

</label>


<input type="text"

name="meta_title"

class="form-control"

value="{{ old('meta_title',$translation?->meta_title) }}">


</div>






<div class="col-md-6 mb-3">


<label>

Meta Description

</label>


<input type="text"

name="meta_description"

class="form-control"

value="{{ old('meta_description',$translation?->meta_description) }}">


</div>


</div>
<div  class="text-right mt-4">


<a href="{{ route('admin.academy_departments.index') }}"

class="btn btn-secondary">
<br>
<i class="bi bi-arrow-left"></i>

Back

</a>












<button

type="submit"

class="btn btn-primary">

<i class="bi bi-save"></i>

Save Translation

</button>
</form>






@if($translation)

<form

action="{{ route('admin.academy_departments.deleteTranslation',$translation->id) }}"

method="POST"

class="d-inline">

@csrf

@method('DELETE')


<button

type="submit"

class="btn btn-danger"

onclick="return confirm('Delete this translation?')">

<i class="bi bi-trash"></i>

Delete

</button>

</form>

@endif
<div>

</div>


</div>


</div>


</div>

</div>


</div>





<script>

function changeLanguage(select){

    if(select.value){

        window.location = "{{ route('admin.academy_departments.translation',$department->id) }}" + "?language_id=" + select.value;
    }

}
</script>

@endsection
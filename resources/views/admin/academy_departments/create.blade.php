@extends('layouts.admin-form')

@section('title')

{{ __('academy_department_create.title_page') }}

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-md-8">


<div class="glass-card">


<h4 class="mb-4 text-center">

{{ __('academy_department_create.heading') }}

</h4>

@if(session('error'))

<div class="alert alert-danger">
    {{ session('error') }}
</div>

@endif


@if($errors->any())

<div class="alert alert-danger">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif



<form action="{{ route('admin.academy_departments.store') }}"

method="POST"

enctype="multipart/form-data">


@csrf



<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('academy_department_create.code') }}

</label>


<input type="text"

name="code"

class="form-control"

value="{{ old('code') }}"

placeholder="{{ __('academy_department_create.code_placeholder') }}">


@error('code')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>





<div class="col-md-6 mb-3">


<label>

{{ __('academy_department_create.icon') }}

</label>


<input type="text"

name="icon"

class="form-control"

value="{{ old('icon') }}"

placeholder="{{ __('academy_department_create.icon_placeholder') }}">


@error('icon')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>

<div class="col-md-12 mb-3">


<label>

{{ __('academy_department_create.title') }}

</label>


<input type="text"

name="title"

class="form-control"

value="{{ old('title') }}"

placeholder="{{ __('academy_department_create.title_placeholder') }}">


@error('title')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div><div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('academy_department_create.image') }}

</label>


<input type="file"

name="image"

class="form-control">


@error('image')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>





<div class="col-md-6 mb-3">


<label>

{{ __('academy_department_create.status') }}

</label>


<select name="status"

class="form-control">


<option value="">

{{ __('academy_department_create.select_status') }}

</option>


<option value="active"
{{ old('status')=='active'?'selected':'' }}>

{{ __('academy_department_create.active') }}

</option>


<option value="inactive"
{{ old('status')=='inactive'?'selected':'' }}>

{{ __('academy_department_create.inactive') }}

</option>



</select>


@error('status')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>







<div class="form-check mb-4">


<input type="checkbox"

name="is_featured"

value="1"

class="form-check-input mr-0 ml-0"

id="featured">


<label class="form-check-label"

for="featured">


{{ __('academy_department_create.featured_department') }}


</label>


</div>



<div class="text-right mt-4">



<a href="{{ route('admin.academy_departments.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


{{ __('academy_department_create.back') }}


</a>
<button type="submit"

class="btn btn-primary">


<i class="bi bi-save"></i>

{{ __('academy_department_create.save_department') }}


</button>



</div>



</form>



</div>


</div>


</div>


</div>


@endsection
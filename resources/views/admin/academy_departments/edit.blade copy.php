@extends('layouts.admin-form')

@section('title')

Edit Academy Department

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-8">


<div class="glass-card">


<h4 class="text-center mb-4">

Edit Academy Department

</h4>



<form action="{{ route('admin.academy_departments.update',$department->id) }}"

method="POST"

enctype="multipart/form-data">


@csrf

@method('PUT')





<div class="row">



<div class="col-md-12 mb-3">



@if($department->image)

<div class="mt-3">

<img src="{{ asset('storage/'.$department->image) }}"

width="120"

class="img-thumbnail rounded">

</div>

@endif

<label>

Image

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

Code

</label>


<input type="text"

name="code"

class="form-control"

value="{{ old('code',$department->code) }}">


@error('code')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-6 mb-3">


<label>

Icon

</label>


<input type="text"

name="icon"

class="form-control"

value="{{ old('icon',$department->icon) }}">


@error('icon')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>
<div class="row">







<div class="col-md-6 mb-3">


<label>

Status

</label>


<select name="status"

class="form-control">


<option value="active"

{{ old('status',$department->status)=='active'?'selected':'' }}>

Active

</option>



<option value="inactive"

{{ old('status',$department->status)=='inactive'?'selected':'' }}>

Inactive

</option>


</select>


@error('status')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>


<div class="form-check  mt-4">


<input type="checkbox"

class="form-check-input ml-5 mt-4 "

id="featured"

name="is_featured"

value="1"

{{ old('is_featured',$department->is_featured) ? 'checked' : '' }}>


<label class="form-check-label  ml-5 mt-3 pl-4 "

for="featured">

Featured Department

</label>


</div>


</div>






<div class="text-right mt-4">


<a href="{{ route('admin.academy_departments.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


Back


</a>





<button type="submit"

class="btn btn-primary">

<i class="bi bi-save"></i>

Update Department

</button>


</div>



</form>



</div>


</div>


</div>


</div>


@endsection
@extends('layouts.admin-form')

@section('title')

Add Academy Department

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-md-8">


<div class="glass-card">


<h4 class="mb-4 text-center">



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

Code

</label>


<input type="text"

name="code"

class="form-control"

value="{{ old('code') }}"

placeholder="Enter department code">


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

value="{{ old('icon') }}"

placeholder="bi bi-book">


@error('icon')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>
<div class="col-md-12 mb-3">

<label>

Title

</label>


<input type="text"

name="title"

class="form-control"

value="{{ old('title') }}"

placeholder="Enter department title">


@error('title')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>
<div class="row">



<div class="col-md-6 mb-3">


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

Status

</label>


<select name="status"

class="form-control">


<option value="">
Select Status
</option>


<option value="active"
{{ old('status')=='active'?'selected':'' }}>
Active
</option>


<option value="inactive"
{{ old('status')=='inactive'?'selected':'' }}>
Inactive
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


Featured Department


</label>


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

Save Department


</button>



</div>



</form>



</div>


</div>


</div>


</div>


@endsection
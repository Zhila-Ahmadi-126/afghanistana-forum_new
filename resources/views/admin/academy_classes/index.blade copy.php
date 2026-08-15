@extends('layouts.admin')


@section('content')


<div class="content-wrapper">


<div class="row">


<div class="col-md-12 grid-margin stretch-card">


<div class="card">


<div class="card-body">



<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="card-title mb-0">

Academy Classes

</h4>



<a href="{{ route('admin.academy_classes.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

Add Class


</a>


</div>

<form method="GET"

action="{{ route('admin.academy_classes.index') }}"

class="mb-4">


<div class="row">


<div class="col-md-4">


<input type="text"

name="search"

class="form-control"

value="{{ request('search') }}"

placeholder="Search class code...">


</div>




<div class="col-md-3">


<select name="status"

class="form-control">


<option value="">

All Status

</option>


<option value="active"

{{ request('status')=='active'?'selected':'' }}>

Active

</option>



<option value="inactive"

{{ request('status')=='inactive'?'selected':'' }}>

Inactive

</option>



</select>


</div>





<div class="col-md-3">


<button class="btn btn-primary">

<i class="bi bi-search"></i>

Search

</button>



<a href="{{ route('admin.academy_classes.index') }}"

class="btn btn-secondary">

Reset

</a>


</div>


</div>


</form>




@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif






@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif






<div class="table-responsive">


<table class="table table-hover">


<thead>


<tr>


<th>#</th>

<th>Class Code</th>

<th>Title</th>

<th>Department</th>

<th>Teacher</th>

<th>Capacity</th>

<th>Status</th>

<th>Action</th>


</tr>


</thead>


<tbody>
    @forelse($classes as $key=>$class)


<tr>


<td>

{{ $classes->firstItem()+$key }}

</td>





<td>

{{ $class->class_code }}

</td>







<td>


@php

$translation = $class->translations
->where('language_id',1)
->first();

@endphp



{{ $translation?->title ?? '---' }}



</td>







<td>


@php

$departmentTranslation = $class->department?->translations
->where('language_id',1)
->first();

@endphp



{{ $departmentTranslation?->title ?? '---' }}



</td>





<td>

@if($class->teacher)

    {{ $class->teacher->first_name }}
    {{ $class->teacher->last_name }}

@else

    -

@endif

</td>




<td>

{{ $class->capacity ?? '-' }}

</td>







<td>


@if($class->status == 'active')


<span class="badge badge-success">

Active

</span>


@else


<span class="badge badge-danger">

Inactive

</span>


@endif



</td>







<td>


<a href="{{ route('admin.academy_classes.edit',$class->id) }}"

class="btn btn-sm btn-primary">


<i class="bi bi-pencil"></i>


</a>





<a href="{{ route('admin.academy_classes.translation',$class->id) }}"

class="btn btn-sm btn-info">


<i class="bi bi-translate"></i>


</a>





<form action="{{ route('admin.academy_classes.destroy',$class->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button type="submit"

class="btn btn-sm btn-danger"

onclick="return confirm('Are you sure?')">


<i class="bi bi-trash"></i>


</button>


</form>


</td>



</tr>



@empty


<tr>

<td colspan="8"

class="text-center">

No classes found.

</td>

</tr>


@endforelse



</tbody>


</table>


</div>

<div class="mt-4">


{{ $classes->links() }}


</div>




</div>


</div>


</div>


</div>


</div>



@endsection
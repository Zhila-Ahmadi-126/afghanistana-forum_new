@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

<div class="row">

<div class="col-md-12 grid-margin stretch-card">

<div class="card">

<div class="card-body">


<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="card-title mb-0">

Academy Departments

</h4>



<a href="{{ route('admin.academy_departments.create') }}"

class="btn btn-primary">

<i class="bi bi-plus-circle"></i>

Add Department

</a>


</div>





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







<form method="GET"

action="{{ route('admin.academy_departments.index') }}"

class="mb-4">


<div class="row">



<div class="col-md-4">

<input type="text"

name="search"

value="{{ request('search') }}"

class="form-control"

placeholder="Search department...">


</div>





<div class="col-md-3">


<select name="status"

class="form-control">


<option value="">

All Status

</option>


<option value="published"

{{ request('status')=='published'?'selected':'' }}>

Published

</option>



<option value="draft"

{{ request('status')=='draft'?'selected':'' }}>

Draft

</option>



<option value="archived"

{{ request('status')=='archived'?'selected':'' }}>

Archived

</option>


</select>


</div>





<div class="col-md-3">


<button class="btn btn-primary">

<i class="bi bi-search"></i>

Filter

</button>


<a href="{{ route('admin.academy_departments.index') }}"

class="btn btn-secondary">

Reset

</a>


</div>



</div>


</form>
<div class="table-responsive">


<table class="table table-hover">


<thead>

<tr>


<th>

#

</th>


<th>

Image

</th>


<th>

Title

</th>


<th>

Code

</th>


<th>

Status

</th>


<th>

Featured

</th>




<th>

Action

</th>


</tr>

</thead>




<tbody>


@forelse($departments as $key=>$department)


<tr>


<td>

{{ $departments->firstItem()+$key }}

</td>





<td>


@if($department->image)


<img src="{{ asset('storage/'.$department->image) }}"

width="60"

height="60"

class="rounded">


@else

<span>

No Image

</span>

@endif


</td>







<td>


@php

$translation = $department->translations
->where('language_id',1)
->first();

@endphp



{{ $translation?->title ?? '---' }}



</td>







<td>

{{ $department->code }}

</td>







<td>
@if($department->status == 'active')

<label class="badge badge-success">

Active

</label>

@else

<label class="badge badge-danger">

Inactive

</label>

@endif


</td>







<td>


@if($department->is_featured)


<span class="badge badge-info">

Yes

</span>


@else


<span class="badge badge-secondary">

No

</span>


@endif



</td>












<td>


<a href="{{ route('admin.academy_departments.edit',$department->id) }}"

class="btn btn-sm btn-primary">


<i class="bi bi-pencil"></i>


</a>





<a href="{{ route('admin.academy_departments.translation',$department->id) }}"

class="btn btn-sm btn-info">


<i class="bi bi-translate"></i>


</a>





<form action="{{ route('admin.academy_departments.destroy',$department->id) }}"

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


No departments found.


</td>


</tr>


@endforelse



</tbody>


</table>


</div>
<div class="mt-4">


{{ $departments->links() }}


</div>



</div>

</div>

</div>

</div>

</div>



@endsection
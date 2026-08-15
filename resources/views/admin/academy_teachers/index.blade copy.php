@extends('layouts.admin')


@section('content')


<div class="content-wrapper">


<div class="row">


<div class="col-md-12 grid-margin stretch-card">


<div class="card">


<div class="card-body">



<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="card-title mb-0">

Academy Teachers

</h4>



<a href="{{ route('admin.academy_teachers.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

Add Teacher


</a>


</div>







<form method="GET"

action="{{ route('admin.academy_teachers.index') }}"

class="mb-4">



<div class="row">



<div class="col-md-4">


<input

type="text"

name="search"

value="{{ request('search') }}"

class="form-control"

placeholder="Search teacher...">


</div>





<div class="col-md-3">


<select

name="status"

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





<div class="col-md-5">


<button class="btn btn-primary">

<i class="bi bi-search"></i>

Search

</button>




<a href="{{ route('admin.academy_teachers.index') }}"

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


<th>#</th>

<th>Image</th>

<th>Name</th>

<th>Position</th>

<th>Department</th>

<th>Email</th>

<th>Status</th>

<th>Action</th>


</tr>


</thead>



<tbody>




@forelse($teachers as $key=>$teacher)



<tr>



<td>

{{ $teachers->firstItem()+$key }}

</td>






<td>


@if($teacher->profile_image)


<img src="{{ asset('storage/'.$teacher->profile_image) }}"

width="50"

height="50"

class="rounded-circle"

style="object-fit:cover;">


@else


<img src="{{ asset('admin/images/default-avatar.png') }}"

width="50"

height="50"

class="rounded-circle">


@endif



</td>







<td>


{{ $teacher->first_name }}

{{ $teacher->last_name }}


</td>







<td>


{{ $teacher->position ?? '-' }}


</td>







<td>


{{ $teacher->department?->translations

->where('language_id',1)

->first()?->title ?? '-' }}



</td>







<td>


{{ $teacher->email ?? '-' }}


</td>







<td>



@if($teacher->status == 'active')


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


<a href="{{ route('admin.academy_teachers.edit',$teacher->id) }}"

class="btn btn-sm btn-primary">


<i class="bi bi-pencil"></i>


</a>







<form action="{{ route('admin.academy_teachers.destroy',$teacher->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button

type="submit"

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

No teachers found.


</td>


</tr>


@endforelse



</tbody>


</table>


</div>
<div class="mt-4">


{{ $teachers->links() }}


</div>



</div>


</div>


</div>


</div>


</div>



@endsection
@extends('layouts.admin')


@section('title')

{{ __('academy_students.title') }}

@endsection


@section('content')


<div class="content-wrapper">


<div class="row">


<div class="col-lg-12 grid-margin stretch-card">


<div class="card">


<div class="card-body">


<h4 class="card-title">

{{ __('academy_students.title') }}

</h4>



<div class="row mb-3">


<form
action="{{ route('admin.academy_students.index') }}"
method="GET"
class="col-md-12">


<div class="row">



<div class="col-md-4">


<input
type="text"
name="search"
value="{{ request('search') }}"
class="form-control"
placeholder="{{ __('academy_students.search_placeholder') }}">


</div>




<div class="col-md-3">


<select
name="status"
class="form-control">



<option value="">

{{ __('academy_students.all_status') }}

</option>



<option
value="active"
{{ request('status')=='active' ? 'selected' : '' }}>

{{ __('academy_students.active') }}

</option>




<option
value="inactive"
{{ request('status')=='inactive' ? 'selected' : '' }}>

{{ __('academy_students.inactive') }}

</option>



</select>


</div>




<div class="col-md-2">


<button
class="btn btn-primary">


{{ __('academy_students.search') }}


</button>


</div>




<div class="col-md-3 text-end">


<a
href="{{ route('admin.academy_students.create') }}"
class="btn btn-success">


{{ __('academy_students.add_new') }}


</a>


</div>



</div>


</form>


</div>





<div class="table-responsive">


<table class="table table-hover">


<thead>


<tr>


<th>

{{ __('academy_students.id') }}

</th>



<th>

{{ __('academy_students.photo') }}

</th>



<th>

{{ __('academy_students.name') }}

</th>



<th>

{{ __('academy_students.email') }}

</th>



<th>

{{ __('academy_students.phone') }}

</th>



<th>

{{ __('academy_students.enrollment_date') }}

</th>



<th>

{{ __('academy_students.status') }}

</th>



<th width="180">

{{ __('academy_students.actions') }}

</th>



</tr>


</thead>
<tbody>


@forelse($students as $student)


<tr>


<td>

{{ $student->id }}

</td>



<td>


@if($student->profile_image)


<img
src="{{ asset('storage/'.$student->profile_image) }}"
style="width:45px;height:45px;border-radius:50%;object-fit:cover;">


@else

-

@endif



</td>




<td>


{{ $student->first_name }}
{{ $student->last_name }}


</td>





<td>


{{ $student->email }}


</td>





<td>


{{ $student->phone }}


</td>





<td>


{{ $student->enrollment_date }}


</td>






<td>


@if($student->status=='active')


<span class="badge badge-success">


{{ __('academy_students.active') }}


</span>



@else


<span class="badge badge-danger">


{{ __('academy_students.inactive') }}


</span>



@endif



</td>






<td>



<a
href="{{ route('admin.academy_students.edit',$student->id) }}"
class="btn btn-sm btn-warning">


<i class="bi bi-pencil"></i>


</a>




<form

action="{{ route('admin.academy_students.destroy',$student->id) }}"

method="POST"

onclick="return confirm('Are you sure?')">

@csrf
@method('DELETE')


<button

type="submit"

class="btn btn-danger btn-sm">

<i class="bi bi-trash"></i>
</button>


</form>



</td>




</tr>



@empty



<tr>



<td colspan="8" class="text-center">



{{ __('academy_students.no_data') }}



</td>



</tr>



@endforelse



</tbody>


</table>


</div>
<div class="mt-3">


{{ $students->links() }}


</div>


</div>


</div>


</div>


</div>


</div>


@endsection
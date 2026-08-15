@extends('layouts.admin')


@section('content')


<div class="content-wrapper">


<div class="row">


<div class="col-md-12 grid-margin stretch-card">


<div class="card">


<div class="card-body">



<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="card-title mb-0">

{{ __('academy_teachers.title') }}

</h4>



<a href="{{ route('admin.academy_teachers.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

{{ __('academy_teachers.add_teacher') }}


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

placeholder="{{ __('academy_teachers.search_placeholder') }}">



</div>







<div class="col-md-3">



<select

name="status"

class="form-control">



<option value="">


{{ __('academy_teachers.all_status') }}


</option>





<option value="active"

{{ request('status')=='active'?'selected':'' }}>



{{ __('academy_teachers.active') }}



</option>





<option value="inactive"

{{ request('status')=='inactive'?'selected':'' }}>



{{ __('academy_teachers.inactive') }}



</option>





</select>



</div>







<div class="col-md-5">



<button class="btn btn-primary">


<i class="bi bi-search"></i>


{{ __('academy_teachers.search') }}



</button>





<a href="{{ route('admin.academy_teachers.index') }}"

class="btn btn-secondary">


{{ __('academy_teachers.reset') }}



</a>



</div>





</div>



</form>


<div class="table-responsive">



<table class="table table-hover">


<thead>


<tr>


<th>

{{ __('academy_teachers.number') }}

</th>


<th>

{{ __('academy_teachers.image') }}

</th>


<th>

{{ __('academy_teachers.name') }}

</th>


<th>

{{ __('academy_teachers.position') }}

</th>


<th>

{{ __('academy_teachers.department') }}

</th>


<th>

{{ __('academy_teachers.email') }}

</th>


<th>

{{ __('academy_teachers.status') }}

</th>


<th>

{{ __('academy_teachers.action') }}

</th>


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


{{ __('academy_teachers.active') }}


</span>



@else


<span class="badge badge-danger">


{{ __('academy_teachers.inactive') }}


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


{{ __('academy_teachers.no_data') }}


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
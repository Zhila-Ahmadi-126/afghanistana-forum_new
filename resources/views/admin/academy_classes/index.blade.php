@extends('layouts.admin')


@section('content')


<div class="content-wrapper">


<div class="row">


<div class="col-md-12 grid-margin stretch-card">


<div class="card">


<div class="card-body">



<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="card-title mb-0">

{{ __('academy_classes.title') }}

</h4>



<a href="{{ route('admin.academy_classes.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

{{ __('academy_classes.add_new') }}


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

placeholder="{{ __('academy_classes.search_placeholder') }}">



</div>





<div class="col-md-3">



<select name="status"

class="form-control">



<option value="">


{{ __('academy_classes.all_status') }}


</option>




<option value="active"

{{ request('status')=='active'?'selected':'' }}>


{{ __('academy_classes.active') }}


</option>





<option value="inactive"

{{ request('status')=='inactive'?'selected':'' }}>


{{ __('academy_classes.inactive') }}


</option>



</select>



</div>







<div class="col-md-3">



<button class="btn btn-primary">


<i class="bi bi-search"></i>


{{ __('academy_classes.search') }}



</button>




<a href="{{ route('admin.academy_classes.index') }}"

class="btn btn-secondary">


{{ __('academy_classes.reset') }}



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


<th>

{{ __('academy_classes.number') }}

</th>


<th>

{{ __('academy_classes.class_code') }}

</th>


<th>

{{ __('academy_classes.title_field') }}

</th>


<th>

{{ __('academy_classes.department') }}

</th>


<th>

{{ __('academy_classes.teacher') }}

</th>


<th>

{{ __('academy_classes.capacity') }}

</th>


<th>

{{ __('academy_classes.status') }}

</th>


<th>

{{ __('academy_classes.action') }}

</th>


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


{{ __('academy_classes.active') }}



</span>



@else



<span class="badge badge-danger">


{{ __('academy_classes.inactive') }}



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


{{ __('academy_classes.no_data') }}



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
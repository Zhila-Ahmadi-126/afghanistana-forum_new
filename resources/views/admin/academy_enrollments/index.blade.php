@extends('layouts.admin')


@section('content')

<div class="content-wrapper">

<div class="row">

<div class="col-lg-12 grid-margin stretch-card">

<div class="card">

<div class="card-body">



<div class="d-flex justify-content-between mb-3">


<h4 class="card-title">


{{ __('academy_enrollments.title') }}


</h4>


</div>





<form method="GET"

action="{{ route('admin.academy_enrollments.index') }}">



<div class="row mb-3">





<div class="col-md-4">


<input

type="text"

name="search"

value="{{ request('search') }}"

class="form-control"

placeholder="{{ __('academy_enrollments.search_placeholder') }}"

>


</div>






<div class="col-md-3">



<select

name="status"

class="form-control"

>




<option value="">


{{ __('academy_enrollments.all_status') }}


</option>





<option value="pending">


{{ __('academy_enrollments.pending') }}


</option>





<option value="approved">


{{ __('academy_enrollments.approved') }}


</option>





<option value="rejected">


{{ __('academy_enrollments.rejected') }}


</option>





<option value="completed">


{{ __('academy_enrollments.completed') }}


</option>





</select>


</div>






<div class="col-md-2">


<button class="btn btn-primary">


{{ __('academy_enrollments.filter') }}


</button>


</div>





</div>


</form>





<div class="table-responsive">



<table class="table table-bordered">



<thead>


<tr>



<th>

{{ __('academy_enrollments.id') }}

</th>



<th>

{{ __('academy_enrollments.student') }}

</th>



<th>

{{ __('academy_enrollments.class') }}

</th>



<th>

{{ __('academy_enrollments.date') }}

</th>



<th>

{{ __('academy_enrollments.status') }}

</th>



<th>

{{ __('academy_enrollments.result') }}

</th>



<th>

{{ __('academy_enrollments.actions') }}

</th>



</tr>



</thead>
<tbody>


@forelse($enrollments as $enrollment)



<tr>



<td>


{{ $enrollment->id }}


</td>





<td>


{{ $enrollment->student?->first_name }}

{{ $enrollment->student?->last_name }}



</td>





<td>


{{ $enrollment->academyClass?->translations?->first()?->title ?? '-' }}



</td>





<td>


{{ $enrollment->enrollment_date }}



</td>





<td>



{{ ucfirst($enrollment->enrollment_status) }}



</td>





<td>


{{ $enrollment->final_result ?? '-' }}



</td>





<td>





<a


href="{{ route('admin.academy_enrollments.edit',$enrollment->id) }}"


class="btn btn-warning btn-sm">



{{ __('academy_enrollments.edit') }}



</a>







<form


action="{{ route('admin.academy_enrollments.destroy',$enrollment->id) }}"


method="POST"


class="d-inline">



@csrf

@method('DELETE')




<button


class="btn btn-danger btn-sm"


onclick="return confirm('{{ __('delete_enrollment_confirm') }}')">



{{ __('academy_enrollments.delete') }}



</button>




</form>





</td>



</tr>





@empty




<tr>



<td colspan="7" class="text-center">



{{ __('academy_enrollments.no_data') }}



</td>



</tr>




@endforelse




</tbody>


</table>


</div>
<div class="mt-3">


{{ $enrollments->links() }}


</div>



</div>

</div>

</div>

</div>

</div>

<!-- </div> -->


@endsection
@extends('layouts.admin')


@section('content')

<div class="content-wrapper">

<div class="row">

<div class="col-lg-12 grid-margin stretch-card">

<div class="card">

<div class="card-body">


<div class="d-flex justify-content-between mb-3">

<h4 class="card-title">

{{ __('Enrollments') }}

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

placeholder="{{ __('Search student...') }}"

>

</div>



<div class="col-md-3">


<select

name="status"

class="form-control"

>


<option value="">

{{ __('All Status') }}

</option>



<option value="pending">

{{ __('Pending') }}

</option>


<option value="approved">

{{ __('Approved') }}

</option>


<option value="rejected">

{{ __('Rejected') }}

</option>


<option value="completed">

{{ __('Completed') }}

</option>



</select>


</div>



<div class="col-md-2">

<button class="btn btn-primary">

{{ __('Filter') }}

</button>

</div>


</div>


</form>




<div class="table-responsive">


<table class="table table-bordered">


<thead>

<tr>


<th>ID</th>

<th>{{ __('Student') }}</th>

<th>{{ __('Class') }}</th>

<th>{{ __('Date') }}</th>

<th>{{ __('Status') }}</th>

<th>{{ __('Result') }}</th>

<th>{{ __('Actions') }}</th>


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

{{ __('Edit') }}

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

{{ __('Delete') }}

</button>


</form>


</td>


</tr>



@empty


<tr>

<td colspan="7" class="text-center">

{{ __('No records found') }}

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


@endsection
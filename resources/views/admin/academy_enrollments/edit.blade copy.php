@extends('layouts.admin-form')

@section('content')

<div class="content-wrapper">


<div class="card">

<div class="card-body">


<h4 class="card-title">

{{ __('Edit Enrollment') }}

</h4>



<form method="POST"

action="{{ route('admin.academy_enrollments.update',$enrollment->id) }}">


@csrf

@method('PUT')



<div class="form-group">

<label>

{{ __('Student') }}

</label>


<input type="text"

class="form-control"

readonly

value="{{ $enrollment->student?->first_name }} {{ $enrollment->student?->last_name }}">


</div>




<div class="form-group">

<label>

{{ __('Class') }}

</label>


<select name="class_id"

class="form-control">


@foreach($classes as $class)


<option

value="{{ $class->id }}"

{{ $enrollment->class_id == $class->id ? 'selected':'' }}

>


{{ $class->translations->first()?->title ?? 'No Title' }}


</option>


@endforeach


</select>


</div>




<div class="form-group">

<label>

{{ __('Enrollment Date') }}

</label>


<input

type="date"

name="enrollment_date"

class="form-control"

value="{{ $enrollment->enrollment_date }}">


</div>




<div class="form-group">

<label>

{{ __('Status') }}

</label>


<select name="enrollment_status"

class="form-control">


<option value="pending"
{{ $enrollment->enrollment_status=='pending'?'selected':'' }}>

Pending

</option>


<option value="approved"
{{ $enrollment->enrollment_status=='approved'?'selected':'' }}>

Approved

</option>


<option value="rejected"
{{ $enrollment->enrollment_status=='rejected'?'selected':'' }}>

Rejected

</option>


<option value="completed"
{{ $enrollment->enrollment_status=='completed'?'selected':'' }}>

Completed

</option>


</select>

</div>




<div class="form-group">

<label>

{{ __('Final Result') }}

</label>


<input

type="text"

name="final_result"

class="form-control"

value="{{ $enrollment->final_result }}">


</div>




<div class="form-group">

<label>

{{ __('Notes') }}

</label>


<textarea

name="notes"

class="form-control"

rows="4">{{ $enrollment->notes }}</textarea>


</div>




<button class="btn btn-primary">

{{ __('Update') }}

</button>



<a href="{{ route('admin.academy_enrollments.index') }}"

class="btn btn-secondary">

{{ __('Back') }}

</a>


</form>


</div>

</div>


</div>


@endsection
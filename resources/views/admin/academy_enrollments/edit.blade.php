@extends('layouts.admin-form')

@section('content')



<div class="glass-card">

<div class="card-body">


<h4 class="card-title">

{{ __('academy_enrollment_edit.page_title') }}

</h4>



<form method="POST"

action="{{ route('admin.academy_enrollments.update',$enrollment->id) }}">


@csrf

@method('PUT')



<div class="form-group">

<label>

{{ __('academy_enrollment_edit.student') }}

</label>


<input type="text"

class="form-control"

readonly

value="{{ $enrollment->student?->first_name }} {{ $enrollment->student?->last_name }}">


</div>




<div class="form-group">

<label>

{{ __('academy_enrollment_edit.class') }}

</label>


<select name="class_id"

class="form-control">


@foreach($classes as $class)


<option

value="{{ $class->id }}"

{{ $enrollment->class_id == $class->id ? 'selected':'' }}

>


{{ $class->translations->first()?->title ?? __('academy_enrollment_edit.no_title') }}


</option>


@endforeach


</select>


</div>




<div class="form-group">

<label>

{{ __('academy_enrollment_edit.enrollment_date') }}

</label>


<input

type="date"

name="enrollment_date"

class="form-control"

value="{{ $enrollment->enrollment_date }}">


</div>




<div class="form-group">

<label>

{{ __('academy_enrollment_edit.status') }}

</label>


<select name="enrollment_status"

class="form-control">


<option value="pending"
{{ $enrollment->enrollment_status=='pending'?'selected':'' }}>

{{ __('academy_enrollment_edit.pending') }}

</option>


<option value="approved"
{{ $enrollment->enrollment_status=='approved'?'selected':'' }}>

{{ __('academy_enrollment_edit.approved') }}

</option>


<option value="rejected"
{{ $enrollment->enrollment_status=='rejected'?'selected':'' }}>

{{ __('academy_enrollment_edit.rejected') }}

</option>


<option value="completed"
{{ $enrollment->enrollment_status=='completed'?'selected':'' }}>

{{ __('academy_enrollment_edit.completed') }}

</option>


</select>

</div>
<div class="form-group">

<label>

{{ __('academy_enrollment_edit.final_result') }}

</label>


<input

type="text"

name="final_result"

class="form-control"

value="{{ $enrollment->final_result }}">


</div>




<div class="form-group">

<label>

{{ __('academy_enrollment_edit.notes') }}

</label>


<textarea

name="notes"

class="form-control"

rows="4">{{ $enrollment->notes }}</textarea>


</div>




<button class="btn btn-primary">

{{ __('academy_enrollment_edit.update') }}

</button>



<a href="{{ route('admin.academy_enrollments.index') }}"

class="btn btn-secondary">
<br>
{{ __('academy_enrollment_edit.back') }}

</a>


</form>


</div>
</div>





@endsection
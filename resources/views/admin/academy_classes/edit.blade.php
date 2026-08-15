@extends('layouts.admin-form')

@section('title')

{{ __('academy_class_edit.page_title') }}

@endsection


@section('content')


<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-9">

<div class="glass-card">


<h4 class="text-center mb-4">

{{ __('academy_class_edit.heading') }}

</h4>



<form action="{{ route('admin.academy_classes.update',$class->id) }}"

method="POST">

@csrf

@method('PUT')





<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('academy_class_edit.department') }}

</label>

<select name="department_id"

class="form-control">


@foreach($departments as $department)

<option

value="{{ $department->id }}"

{{ old('department_id',$class->department_id)==$department->id ? 'selected' : '' }}>

{{ $department->translations->where('language_id',1)->first()?->title ?? '---' }}

</option>

@endforeach

</select>

</div>


<div class="col-md-6 mb-3">

<label>

{{ __('academy_class_edit.teacher') }}

</label>

<select
    name="teacher_id"
    class="form-control">

    <option value="">

        {{ __('academy_class_edit.select_teacher') }}

    </option>

    @foreach($teachers as $teacher)

        <option
            value="{{ $teacher->id }}"
            {{ old('teacher_id',$class->teacher_id) == $teacher->id ? 'selected' : '' }}>

            {{ $teacher->first_name }}
            {{ $teacher->last_name }}

        </option>

    @endforeach

</select>

</div>

</div>

<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('academy_class_edit.title') }}

</label>

<input

type="text"

name="title"

class="form-control"

value="{{ old('title',$class->translations->where('language_id',1)->first()?->title) }}">


@error('title')

<span class="text-danger">

{{ $message }}

</span>

@enderror

</div>





<div class="col-md-6 mb-3">

<label>

{{ __('academy_class_edit.class_code') }}

</label>

<input

type="text"

name="class_code"

class="form-control"

value="{{ old('class_code',$class->class_code) }}">


@error('class_code')

<span class="text-danger">

{{ $message }}

</span>

@enderror

</div>


</div>
<div class="row">


<div class="col-md-4 mb-3">

<label>

{{ __('academy_class_edit.capacity') }}

</label>

<input

type="number"

name="capacity"

class="form-control"

value="{{ old('capacity',$class->capacity) }}">

</div>





<div class="col-md-4 mb-3">

<label>

{{ __('academy_class_edit.start_date') }}

</label>

<input

type="date"

name="start_date"

class="form-control"

value="{{ old('start_date',$class->start_date) }}">

</div>





<div class="col-md-4 mb-3">

<label>

{{ __('academy_class_edit.end_date') }}

</label>

<input

type="date"

name="end_date"

class="form-control"

value="{{ old('end_date',$class->end_date) }}">

</div>


</div>







<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('academy_class_edit.room') }}

</label>

<input

type="text"

name="room"

class="form-control"

value="{{ old('room',$class->room) }}">

</div>





<div class="col-md-6 mb-3">

<label>

{{ __('academy_class_edit.status') }}

</label>

<select

name="status"

class="form-control">


<option value="active"

{{ old('status',$class->status)=='active'?'selected':'' }}>

{{ __('academy_class_edit.active') }}

</option>


<option value="inactive"

{{ old('status',$class->status)=='inactive'?'selected':'' }}>

{{ __('academy_class_edit.inactive') }}

</option>


</select>

</div>


</div>







<div class="mb-4">

<label>

{{ __('academy_class_edit.schedule') }}

</label>

<textarea

name="schedule"

rows="4"

class="form-control">{{ old('schedule',$class->schedule) }}</textarea>

</div>
<div class="text-right mt-4">


<a href="{{ route('admin.academy_classes.index') }}"

class="btn btn-secondary">
<br>
<i class="bi bi-arrow-left"></i>

{{ __('academy_class_edit.back') }}

</a>





<button

type="submit"

class="btn btn-primary">

<i class="bi bi-save"></i>

{{ __('academy_class_edit.update_class') }}

</button>


</div>



</form>



</div>


</div>


</div>


</div>


@endsection
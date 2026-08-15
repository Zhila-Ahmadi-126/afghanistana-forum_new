@extends('layouts.admin-form')

@section('title')

{{ __('academy_class_create.page_title') }}

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-9">


<div class="glass-card">


<h4 class="text-center mb-4">

{{ __('academy_class_create.heading') }}

</h4>
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<form action="{{ route('admin.academy_classes.store') }}"

method="POST">


@csrf





<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('academy_class_create.department') }}

</label>


<select

name="department_id"

class="form-control">


<option value="">

{{ __('academy_class_create.select_department') }}

</option>



@foreach($departments as $department)

<option

value="{{ $department->id }}"

{{ old('department_id')==$department->id?'selected':'' }}>

{{ $department->translations->where('language_id',1)->first()?->title ?? '---' }}

</option>

@endforeach


</select>


@error('department_id')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>




<div class="col-md-6 mb-3">

<label>

{{ __('academy_class_create.teacher') }}

</label>

<select
    name="teacher_id"
    class="form-control">

    <option value="">

        {{ __('academy_class_create.select_teacher') }}

    </option>

    @foreach($teachers as $teacher)

        <option
            value="{{ $teacher->id }}"
            {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>

            {{ $teacher->first_name }}
            {{ $teacher->last_name }}

        </option>

    @endforeach

</select>
@error('teacher_id')
    <span class="text-danger">
        {{ $message }}
    </span>
@enderror

</div>


</div>

<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('academy_class_create.title') }}

</label>


<input

type="text"

name="title"

class="form-control"

value="{{ old('title') }}"

placeholder="{{ __('academy_class_create.title_placeholder') }}">


@error('title')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-6 mb-3">


<label>

{{ __('academy_class_create.class_code') }}

</label>


<input

type="text"

name="class_code"

class="form-control"

value="{{ old('class_code') }}"

placeholder="CLS-001">


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

{{ __('academy_class_create.capacity') }}

</label>


<input

type="number"

name="capacity"

class="form-control"

value="{{ old('capacity') }}">


@error('capacity')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-4 mb-3">


<label>

{{ __('academy_class_create.start_date') }}

</label>


<input

type="date"

name="start_date"

class="form-control"

value="{{ old('start_date') }}">


@error('start_date')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-4 mb-3">


<label>

{{ __('academy_class_create.end_date') }}

</label>


<input

type="date"

name="end_date"

class="form-control"

value="{{ old('end_date') }}">


@error('end_date')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>







<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('academy_class_create.room') }}

</label>


<input

type="text"

name="room"

class="form-control"

value="{{ old('room') }}"

placeholder="{{ __('academy_class_create.room_placeholder') }}">


</div>






<div class="col-md-6 mb-3">


<label>

{{ __('academy_class_create.status') }}

</label>


<select

name="status"

class="form-control">


<option value="active"

{{ old('status')=='active'?'selected':'' }}>

{{ __('academy_class_create.active') }}

</option>



<option value="inactive"

{{ old('status')=='inactive'?'selected':'' }}>

{{ __('academy_class_create.inactive') }}

</option>


</select>


@error('status')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>







<div class="mb-4">


<label>

{{ __('academy_class_create.schedule') }}

</label>


<textarea

name="schedule"

rows="4"

class="form-control"

placeholder="{{ __('academy_class_create.schedule_placeholder') }}">{{ old('schedule') }}</textarea>


</div>
<div class="text-right mt-4">


<a href="{{ route('admin.academy_classes.index') }}"

class="btn btn-secondary">
<br>
<i class="bi bi-arrow-left"></i>

{{ __('academy_class_create.back') }}

</a>





<button

type="submit"

class="btn btn-primary">

<i class="bi bi-save"></i>

{{ __('academy_class_create.save_class') }}

</button>


</div>



</form>



</div>


</div>


</div>


</div>


@endsection
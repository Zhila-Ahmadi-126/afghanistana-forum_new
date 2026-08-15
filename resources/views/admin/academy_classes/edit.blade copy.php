@extends('layouts.admin-form')

@section('title')

Edit Academy Class

@endsection


@section('content')


<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-9">

<div class="glass-card">


<h4 class="text-center mb-4">

Edit Academy Class

</h4>



<form action="{{ route('admin.academy_classes.update',$class->id) }}"

method="POST">

@csrf

@method('PUT')





<div class="row">


<div class="col-md-6 mb-3">

<label>

Department

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

        Teacher

    </label>

    <select
        name="teacher_id"
        class="form-control">

        <option value="">

            Select Teacher

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

Title

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

Class Code

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

Capacity

</label>

<input

type="number"

name="capacity"

class="form-control"

value="{{ old('capacity',$class->capacity) }}">

</div>





<div class="col-md-4 mb-3">

<label>

Start Date

</label>

<input

type="date"

name="start_date"

class="form-control"

value="{{ old('start_date',$class->start_date) }}">

</div>





<div class="col-md-4 mb-3">

<label>

End Date

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

Room

</label>

<input

type="text"

name="room"

class="form-control"

value="{{ old('room',$class->room) }}">

</div>





<div class="col-md-6 mb-3">

<label>

Status

</label>

<select

name="status"

class="form-control">


<option value="active"

{{ old('status',$class->status)=='active'?'selected':'' }}>

Active

</option>


<option value="inactive"

{{ old('status',$class->status)=='inactive'?'selected':'' }}>

Inactive

</option>


</select>

</div>


</div>







<div class="mb-4">

<label>

Schedule

</label>

<textarea

name="schedule"

rows="4"

class="form-control">{{ old('schedule',$class->schedule) }}</textarea>

</div>
<div  class="text-right mt-4">


<a href="{{ route('admin.academy_classes.index') }}"

class="btn btn-secondary">
<br>
<i class="bi bi-arrow-left"></i>

Back

</a>





<button

type="submit"

class="btn btn-primary">

<i class="bi bi-save"></i>

Update Class

</button>


</div>



</form>



</div>


</div>


</div>


</div>


@endsection
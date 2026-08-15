@extends('layouts.admin-form')

@section('title')

Add Schedule

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-9">


<div class="glass-card">


<h4 class="text-center mb-4">

Add Schedule

</h4>




<form

action="{{ route('admin.academy_schedules.store') }}"

method="POST">


@csrf





<div class="row">



<div class="col-md-6 mb-3">


<label>

Class

</label>


<select

name="class_id"

class="form-control">


<option value="">

Select Class

</option>



@foreach($classes as $class)

<option

value="{{ $class->id }}"

{{ old('class_id')==$class->id?'selected':'' }}>

{{ $class->translations->where('language_id',1)->first()?->title ?? '---' }}

</option>

@endforeach


</select>


@error('class_id')

<span class="text-danger">

{{ $message }}

</span>

@enderror


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

{{ old('teacher_id')==$teacher->id?'selected':'' }}>

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


<div class="col-md-4 mb-3">


<label>

Day

</label>


<select

name="day_of_week"

class="form-control">


<option value="">

Select Day

</option>

<option value="Saturday">Saturday</option>

<option value="Sunday">Sunday</option>

<option value="Monday">Monday</option>

<option value="Tuesday">Tuesday</option>

<option value="Wednesday">Wednesday</option>

<option value="Thursday">Thursday</option>

<option value="Friday">Friday</option>


</select>


@error('day_of_week')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>




<div class="col-md-4 mb-3">


<label>

Start Time

</label>


<input

type="time"

name="start_time"

class="form-control"

value="{{ old('start_time') }}">


@error('start_time')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>




<div class="col-md-4 mb-3">


<label>

End Time

</label>


<input

type="time"

name="end_time"

class="form-control"

value="{{ old('end_time') }}">


@error('end_time')

<span class="text-danger">

{{ $message }}

</span>

@enderror


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

value="{{ old('room') }}"

placeholder="Room A-101">


@error('room')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>







<div class="col-md-6 mb-3">


<label>

Schedule Type

</label>


<select

name="schedule_type"

class="form-control">



<option value="">

Select Type

</option>



<option value="offline"

{{ old('schedule_type')=='offline'?'selected':'' }}>

Offline

</option>



<option value="online"

{{ old('schedule_type')=='online'?'selected':'' }}>

Online

</option>



<option value="hybrid"

{{ old('schedule_type')=='hybrid'?'selected':'' }}>

Hybrid

</option>


</select>



@error('schedule_type')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>







<div class="row">



<div class="col-md-6 mb-3">


<label>

Meeting Link

</label>


<input

type="text"

name="meeting_link"

class="form-control"

value="{{ old('meeting_link') }}"

placeholder="https://example.com">


@error('meeting_link')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-6 mb-3">


<label>

Status

</label>


<select

name="status"

class="form-control">



<option value="active"

{{ old('status')=='active'?'selected':'' }}>

Active

</option>



<option value="inactive"

{{ old('status')=='inactive'?'selected':'' }}>

Inactive

</option>


</select>



@error('status')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>


</div>






<div class="row">



<div class="col-md-12 mb-3">


<label>

Notes

</label>


<textarea

name="notes"

rows="4"

class="form-control"

placeholder="Enter notes">{{ old('notes') }}</textarea>



@error('notes')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>


</div>
<div  class="text-right mt-4">


<a

href="{{ route('admin.academy_schedules.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


Back


</a>





<button

type="submit"

class="btn btn-primary">


<i class="bi bi-save"></i>


Save Schedule


</button>



</div>



</form>



</div>


</div>


</div>


</div>


</div>



@endsection
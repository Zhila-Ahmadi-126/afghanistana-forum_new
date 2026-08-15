@extends('layouts.admin-form')

@section('title')

Edit Schedule

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-9">


<div class="glass-card">


<h4 class="text-center mb-4">

Edit Schedule

</h4>




<form

action="{{ route('admin.academy_schedules.update',$schedule->id) }}"

method="POST">


@csrf

@method('PUT')






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

{{ old('class_id',$schedule->class_id)==$class->id?'selected':'' }}>

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

{{ old('teacher_id',$schedule->teacher_id)==$teacher->id?'selected':'' }}>

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


<option value="Saturday"

{{ old('day_of_week',$schedule->day_of_week)=='Saturday'?'selected':'' }}>

Saturday

</option>


<option value="Sunday"

{{ old('day_of_week',$schedule->day_of_week)=='Sunday'?'selected':'' }}>

Sunday

</option>


<option value="Monday"

{{ old('day_of_week',$schedule->day_of_week)=='Monday'?'selected':'' }}>

Monday

</option>


<option value="Tuesday"

{{ old('day_of_week',$schedule->day_of_week)=='Tuesday'?'selected':'' }}>

Tuesday

</option>


<option value="Wednesday"

{{ old('day_of_week',$schedule->day_of_week)=='Wednesday'?'selected':'' }}>

Wednesday

</option>


<option value="Thursday"

{{ old('day_of_week',$schedule->day_of_week)=='Thursday'?'selected':'' }}>

Thursday

</option>


<option value="Friday"

{{ old('day_of_week',$schedule->day_of_week)=='Friday'?'selected':'' }}>

Friday

</option>


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

value="{{ old('start_time',$schedule->start_time) }}">


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

value="{{ old('end_time',$schedule->end_time) }}">


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

value="{{ old('room',$schedule->room) }}"

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


<option value="offline"

{{ old('schedule_type',$schedule->schedule_type)=='offline'?'selected':'' }}>

Offline

</option>



<option value="online"

{{ old('schedule_type',$schedule->schedule_type)=='online'?'selected':'' }}>

Online

</option>



<option value="hybrid"

{{ old('schedule_type',$schedule->schedule_type)=='hybrid'?'selected':'' }}>

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

value="{{ old('meeting_link',$schedule->meeting_link) }}"

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

{{ old('status',$schedule->status)=='active'?'selected':'' }}>

Active

</option>



<option value="inactive"

{{ old('status',$schedule->status)=='inactive'?'selected':'' }}>

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

placeholder="Enter notes">{{ old('notes',$schedule->notes) }}</textarea>


@error('notes')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>


</div>
<div class="d-flex justify-content-between mt-4">


<a

href="{{ route('admin.academy_schedules.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>

Back


</a>





<div>


<button

type="submit"

class="btn btn-success">


<i class="bi bi-check-circle"></i>

Update Schedule


</button>


</div>



</div>



</form>



</div>


</div>


</div>


</div>


</div>



@endsection
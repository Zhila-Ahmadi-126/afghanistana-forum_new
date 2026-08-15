@extends('layouts.admin-form')

@section('title')

{{ __('academy_schedule_edit.page_title') }}

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-9">


<div class="glass-card">


<h4 class="text-center mb-4">

{{ __('academy_schedule_edit.heading') }}

</h4>




<form

action="{{ route('admin.academy_schedules.update',$schedule->id) }}"

method="POST">


@csrf

@method('PUT')








<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_edit.class') }}

</label>


<select

name="class_id"

class="form-control">


<option value="">

{{ __('academy_schedule_edit.select_class') }}

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

{{ __('academy_schedule_edit.teacher') }}

</label>


<select

name="teacher_id"

class="form-control">


<option value="">

{{ __('academy_schedule_edit.select_teacher') }}

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

{{ __('academy_schedule_edit.day') }}

</label>


<select

name="day_of_week"

class="form-control">


<option value="Saturday"

{{ old('day_of_week',$schedule->day_of_week)=='Saturday'?'selected':'' }}>

{{ __('academy_schedule_edit.saturday') }}

</option>


<option value="Sunday"

{{ old('day_of_week',$schedule->day_of_week)=='Sunday'?'selected':'' }}>

{{ __('academy_schedule_edit.sunday') }}

</option>


<option value="Monday"

{{ old('day_of_week',$schedule->day_of_week)=='Monday'?'selected':'' }}>

{{ __('academy_schedule_edit.monday') }}

</option>
<option value="Tuesday"

{{ old('day_of_week',$schedule->day_of_week)=='Tuesday'?'selected':'' }}>

{{ __('academy_schedule_edit.tuesday') }}

</option>


<option value="Wednesday"

{{ old('day_of_week',$schedule->day_of_week)=='Wednesday'?'selected':'' }}>

{{ __('academy_schedule_edit.wednesday') }}

</option>


<option value="Thursday"

{{ old('day_of_week',$schedule->day_of_week)=='Thursday'?'selected':'' }}>

{{ __('academy_schedule_edit.thursday') }}

</option>


<option value="Friday"

{{ old('day_of_week',$schedule->day_of_week)=='Friday'?'selected':'' }}>

{{ __('academy_schedule_edit.friday') }}

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

{{ __('academy_schedule_edit.start_time') }}

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

{{ __('academy_schedule_edit.end_time') }}

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

{{ __('academy_schedule_edit.room') }}

</label>


<input

type="text"

name="room"

class="form-control"

value="{{ old('room',$schedule->room) }}"

placeholder="{{ __('academy_schedule_edit.room_placeholder') }}">


@error('room')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>









<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_edit.schedule_type') }}

</label>


<select

name="schedule_type"

class="form-control">


<option value="offline"

{{ old('schedule_type',$schedule->schedule_type)=='offline'?'selected':'' }}>

{{ __('academy_schedule_edit.offline') }}

</option>



<option value="online"

{{ old('schedule_type',$schedule->schedule_type)=='online'?'selected':'' }}>

{{ __('academy_schedule_edit.online') }}

</option>



<option value="hybrid"

{{ old('schedule_type',$schedule->schedule_type)=='hybrid'?'selected':'' }}>

{{ __('academy_schedule_edit.hybrid') }}

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

{{ __('academy_schedule_edit.meeting_link') }}

</label>


<input

type="text"

name="meeting_link"

class="form-control"

value="{{ old('meeting_link',$schedule->meeting_link) }}"

placeholder="{{ __('academy_schedule_edit.meeting_link_placeholder') }}">


@error('meeting_link')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>







<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_edit.status') }}

</label>


<select

name="status"

class="form-control">


<option value="active"

{{ old('status',$schedule->status)=='active'?'selected':'' }}>

{{ __('academy_schedule_edit.active') }}

</option>



<option value="inactive"

{{ old('status',$schedule->status)=='inactive'?'selected':'' }}>

{{ __('academy_schedule_edit.inactive') }}

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

{{ __('academy_schedule_edit.notes') }}

</label>


<textarea

name="notes"

rows="4"

class="form-control"

placeholder="{{ __('academy_schedule_edit.notes_placeholder') }}">{{ old('notes',$schedule->notes) }}</textarea>


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

{{ __('academy_schedule_edit.back') }}


</a>







<div>


<button

type="submit"

class="btn btn-success">


<i class="bi bi-check-circle"></i>

{{ __('academy_schedule_edit.update_schedule') }}


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
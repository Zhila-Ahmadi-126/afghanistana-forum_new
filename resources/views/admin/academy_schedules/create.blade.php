@extends('layouts.admin-form')

@section('title')

{{ __('academy_schedule_create.page_title') }}

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-9">


<div class="glass-card">


<h4 class="text-center mb-4">

{{ __('academy_schedule_create.heading') }}

</h4>




<form

action="{{ route('admin.academy_schedules.store') }}"

method="POST">


@csrf





<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_create.class') }}

</label>


<select

name="class_id"

class="form-control">


<option value="">

{{ __('academy_schedule_create.select_class') }}

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

{{ __('academy_schedule_create.teacher') }}

</label>


<select

name="teacher_id"

class="form-control">


<option value="">

{{ __('academy_schedule_create.select_teacher') }}

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

{{ __('academy_schedule_create.day') }}

</label>


<select

name="day_of_week"

class="form-control">


<option value="">

{{ __('academy_schedule_create.select_day') }}

</option>

<option value="Saturday">{{ __('academy_schedule_create.saturday') }}</option>

<option value="Sunday">{{ __('academy_schedule_create.sunday') }}</option>

<option value="Monday">{{ __('academy_schedule_create.monday') }}</option>

<option value="Tuesday">{{ __('academy_schedule_create.tuesday') }}</option>

<option value="Wednesday">{{ __('academy_schedule_create.wednesday') }}</option>

<option value="Thursday">{{ __('academy_schedule_create.thursday') }}</option>

<option value="Friday">{{ __('academy_schedule_create.friday') }}</option>


</select>
@error('day_of_week')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>




<div class="col-md-4 mb-3">


<label>

{{ __('academy_schedule_create.start_time') }}

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

{{ __('academy_schedule_create.end_time') }}

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

{{ __('academy_schedule_create.room') }}

</label>


<input

type="text"

name="room"

class="form-control"

value="{{ old('room') }}"

placeholder="{{ __('academy_schedule_create.room_placeholder') }}">


@error('room')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>







<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_create.schedule_type') }}

</label>


<select

name="schedule_type"

class="form-control">



<option value="">

{{ __('academy_schedule_create.select_type') }}

</option>



<option value="offline"

{{ old('schedule_type')=='offline'?'selected':'' }}>

{{ __('academy_schedule_create.offline') }}

</option>



<option value="online"

{{ old('schedule_type')=='online'?'selected':'' }}>

{{ __('academy_schedule_create.online') }}

</option>



<option value="hybrid"

{{ old('schedule_type')=='hybrid'?'selected':'' }}>

{{ __('academy_schedule_create.hybrid') }}

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

{{ __('academy_schedule_create.meeting_link') }}

</label>


<input

type="text"

name="meeting_link"

class="form-control"

value="{{ old('meeting_link') }}"

placeholder="{{ __('academy_schedule_create.meeting_link_placeholder') }}">


@error('meeting_link')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_create.status') }}

</label>


<select

name="status"

class="form-control">



<option value="active"

{{ old('status')=='active'?'selected':'' }}>

{{ __('academy_schedule_create.active') }}

</option>



<option value="inactive"

{{ old('status')=='inactive'?'selected':'' }}>

{{ __('academy_schedule_create.inactive') }}

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

{{ __('academy_schedule_create.notes') }}

</label>


<textarea

name="notes"

rows="4"

class="form-control"

placeholder="{{ __('academy_schedule_create.notes_placeholder') }}">{{ old('notes') }}</textarea>



@error('notes')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>


</div>
<div class="text-right mt-4">


<a

href="{{ route('admin.academy_schedules.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


{{ __('academy_schedule_create.back') }}


</a>





<button

type="submit"

class="btn btn-primary">


<i class="bi bi-save"></i>


{{ __('academy_schedule_create.save_schedule') }}


</button>



</div>



</form>



</div>


</div>


</div>


</div>


</div>



@endsection
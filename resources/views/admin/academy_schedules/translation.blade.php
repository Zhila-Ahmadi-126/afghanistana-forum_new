@extends('layouts.admin-form')


@section('title')

{{ __('academy_schedule_translation.page_title') }}

@endsection



@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-9">


<div class="glass-card">


<h4 class="text-center mb-4">

{{ __('academy_schedule_translation.heading') }}

</h4>





<div class="mb-4">


<div class="row">


<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_translation.class') }}

</label>


<input

type="text"

class="form-control"

value="{{ $schedule->academyClass?->translations->where('language_id',1)->first()?->title ?? '---' }}"

readonly>


</div>





<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_translation.teacher') }}

</label>


<input

type="text"

class="form-control"

value="{{ $schedule->teacher?->first_name }} {{ $schedule->teacher?->last_name }}"

readonly>


</div>


</div>


</div>





<form

method="GET"

action="{{ route('admin.academy_schedules.translation',$schedule->id) }}">



<div class="row">


<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_translation.language') }}

</label>


<select

name="language_id"

class="form-control"

onchange="this.form.submit()">



<option value="">

{{ __('academy_schedule_translation.select_language') }}

</option>



@foreach($languages as $language)


<option

value="{{ $language->id }}"

{{ request('language_id')==$language->id?'selected':'' }}>


{{ $language->name }}


</option>


@endforeach



</select>


</div>


</div>


</form>





<hr>
@if(request('language_id'))


<form

action="{{ route('admin.academy_schedules.translation.save',$schedule->id) }}"

method="POST">


@csrf



<input

type="hidden"

name="language_id"

value="{{ request('language_id') }}">



<div class="row">


<div class="col-md-12 mb-3">


<label>

{{ __('academy_schedule_translation.title') }}

</label>



<input

type="text"

name="title"

class="form-control"

value="{{ old('title',$translation?->title) }}"

placeholder="{{ __('academy_schedule_translation.title_placeholder') }}">



@error('title')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>


</div>






<div class="row">


<div class="col-md-12 mb-3">


<label>

{{ __('academy_schedule_translation.description') }}

</label>


<textarea

name="description"

rows="5"

class="form-control"

placeholder="{{ __('academy_schedule_translation.description_placeholder') }}">{{ old('description',$translation?->description) }}</textarea>



@error('description')

<span class="text-danger">

{{ $message }}

</span>

@enderror



</div>


</div>





<div class="row">


<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_translation.day') }}

</label>


<input

type="text"

class="form-control"

value="{{ $schedule->day_of_week }}"

readonly>


</div>





<div class="col-md-6 mb-3">


<label>

{{ __('academy_schedule_translation.time') }}

</label>


<input

type="text"

class="form-control"

value="{{ $schedule->start_time }} - {{ $schedule->end_time }}"

readonly>


</div>


</div>

<div class="text-end mt-4">



<a

href="{{ route('admin.academy_schedules.index') }}"

class="btn btn-secondary">

<br>
<i class="bi bi-arrow-left"></i>


{{ __('academy_schedule_translation.back') }}


</a>






<button

type="submit"

class="btn btn-primary">


<i class="bi bi-save"></i>


{{ __('academy_schedule_translation.save_translation') }}


</button>



</div>



</form>
@if($translation)


<form

action="{{ route('admin.academy_schedules.translation.delete',$translation->id) }}"

method="POST"

class="mt-3"

onsubmit="return confirm('{{ __('messages.delete_translation') }}')">


@csrf

@method('DELETE')



<button

type="submit"

class="btn btn-danger">


<i class="bi bi-trash"></i>


{{ __('academy_schedule_translation.delete_translation') }}


</button>



</form>


@endif





@endif



</div>


</div>


</div>


</div>


</div>



@endsection
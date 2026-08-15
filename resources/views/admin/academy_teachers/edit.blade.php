@extends('layouts.admin-form')

@section('title')

{{ __('teacher_edit.page_title') }}

@endsection


@section('content')


<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="glass-card">


<h4 class="text-center mb-4">

{{ __('teacher_edit.heading') }}

</h4>



<form action="{{ route('admin.academy_teachers.update',$teacher->id) }}"

method="POST"

enctype="multipart/form-data">

@csrf
@method('PUT')



<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.first_name') }}

</label>

<input

type="text"

name="first_name"

class="form-control"

value="{{ old('first_name',$teacher->first_name) }}">


@error('first_name')

<span class="text-danger">{{ $message }}</span>

@enderror


</div>





<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.last_name') }}

</label>

<input

type="text"

name="last_name"

class="form-control"

value="{{ old('last_name',$teacher->last_name) }}">


@error('last_name')

<span class="text-danger">{{ $message }}</span>

@enderror


</div>


</div>







<div class="row">


<div class="col-md-4 mb-3">

<label>

{{ __('teacher_edit.gender') }}

</label>

<select

name="gender"

class="form-control">

<option value="">{{ __('teacher_edit.select_gender') }}</option>

<option value="male"

{{ old('gender',$teacher->gender)=='male'?'selected':'' }}>

{{ __('teacher_edit.male') }}

</option>

<option value="female"

{{ old('gender',$teacher->gender)=='female'?'selected':'' }}>

{{ __('teacher_edit.female') }}

</option>

</select>

</div>





<div class="col-md-4 mb-3">

<label>

{{ __('teacher_edit.date_of_birth') }}

</label>

<input

type="date"

name="date_of_birth"

class="form-control"

value="{{ old('date_of_birth',$teacher->date_of_birth) }}">

</div>





<div class="col-md-4 mb-3">

<label>

{{ __('teacher_edit.department') }}

</label>

<select

name="department_id"

class="form-control">

<option value="">{{ __('teacher_edit.select_department') }}</option>

@foreach($departments as $department)

<option

value="{{ $department->id }}"

{{ old('department_id',$teacher->department_id)==$department->id ? 'selected' : '' }}>

{{ $department->translations->where('language_id',1)->first()?->title ?? '---' }}

</option>

@endforeach

</select>

</div>


</div>
<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.email') }}

</label>

<input

type="email"

name="email"

class="form-control"

value="{{ old('email',$teacher->email) }}">


@error('email')

<span class="text-danger">

{{ $message }}

</span>

@enderror

</div>





<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.phone') }}

</label>

<input

type="text"

name="phone"

class="form-control"

value="{{ old('phone',$teacher->phone) }}">

</div>


</div>







<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.position') }}

</label>

<input

type="text"

name="position"

class="form-control"

value="{{ old('position',$teacher->position) }}">

</div>





<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.profile_image') }}

</label>

<input

type="file"

name="profile_image"

class="form-control">



@if($teacher->profile_image)

<div class="mt-2">

<img

src="{{ asset('storage/'.$teacher->profile_image) }}"

width="80"

class="img-thumbnail">

</div>

@endif

</div>


</div>







<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.education') }}

</label>

<textarea

name="education"

rows="4"

class="form-control">{{ old('education',$teacher->education) }}</textarea>

</div>





<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.experience') }}

</label>

<textarea

name="experience"

rows="4"

class="form-control">{{ old('experience',$teacher->experience) }}</textarea>

</div>


</div>







<div class="mb-3">

<label>

{{ __('teacher_edit.biography') }}

</label>

<textarea

name="biography"

rows="5"

class="form-control">{{ old('biography',$teacher->biography) }}</textarea>

</div>

<div class="row">


<div class="col-md-4 mb-3">

<label>

{{ __('teacher_edit.facebook_url') }}

</label>

<input

type="text"

name="facebook_url"

class="form-control"

value="{{ old('facebook_url',$teacher->facebook_url) }}">

</div>





<div class="col-md-4 mb-3">

<label>

{{ __('teacher_edit.linkedin_url') }}

</label>

<input

type="text"

name="linkedin_url"

class="form-control"

value="{{ old('linkedin_url',$teacher->linkedin_url) }}">

</div>





<div class="col-md-4 mb-3">

<label>

{{ __('teacher_edit.youtube_url') }}

</label>

<input

type="text"

name="youtube_url"

class="form-control"

value="{{ old('youtube_url',$teacher->youtube_url) }}">

</div>


</div>
<div class="row">


<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.website_url') }}

</label>

<input

type="text"

name="website_url"

class="form-control"

value="{{ old('website_url',$teacher->website_url) }}">

</div>





<div class="col-md-6 mb-3">

<label>

{{ __('teacher_edit.status') }}

</label>

<select

name="status"

class="form-control">

<option value="active"

{{ old('status',$teacher->status)=='active' ? 'selected' : '' }}>

{{ __('teacher_edit.active') }}

</option>

<option value="inactive"

{{ old('status',$teacher->status)=='inactive' ? 'selected' : '' }}>

{{ __('teacher_edit.inactive') }}

</option>

</select>

</div>


</div>







<div class="text-right mt-4">


<a href="{{ route('admin.academy_teachers.index') }}"

class="btn btn-secondary">
<br>
<i class="bi bi-arrow-left"></i>

{{ __('teacher_edit.back') }}

</a>





<button

type="submit"

class="btn btn-primary">

<i class="bi bi-save"></i>

{{ __('teacher_edit.update_teacher') }}

</button>


</div>



</form>


</div>

</div>

</div>

</div>

@endsection
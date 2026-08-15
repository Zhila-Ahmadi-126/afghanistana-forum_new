@extends('layouts.admin-form')


@section('title')

{{ __('teacher_create.page_title') }}

@endsection



@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-10">


<div class="glass-card">



<h4 class="text-center mb-4">

{{ __('teacher_create.heading') }}

</h4>





<form action="{{ route('admin.academy_teachers.store') }}"

method="POST"

enctype="multipart/form-data">


@csrf






<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.first_name') }}

</label>


<input

type="text"

name="first_name"

class="form-control"

value="{{ old('first_name') }}"

placeholder="{{ __('teacher_create.first_name_placeholder') }}">



@error('first_name')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.last_name') }}

</label>


<input

type="text"

name="last_name"

class="form-control"

value="{{ old('last_name') }}"

placeholder="{{ __('teacher_create.last_name_placeholder') }}">



@error('last_name')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>



</div>







<div class="row">



<div class="col-md-4 mb-3">


<label>

{{ __('teacher_create.gender') }}

</label>


<select

name="gender"

class="form-control">


<option value="">

{{ __('teacher_create.select_gender') }}

</option>



<option value="male">

{{ __('teacher_create.male') }}

</option>



<option value="female">

{{ __('teacher_create.female') }}

</option>


</select>


</div>






<div class="col-md-4 mb-3">


<label>

{{ __('teacher_create.date_of_birth') }}

</label>


<input

type="date"

name="date_of_birth"

class="form-control"

value="{{ old('date_of_birth') }}">


</div>






<div class="col-md-4 mb-3">


<label>

{{ __('teacher_create.department') }}

</label>


<select

name="department_id"

class="form-control">


<option value="">

{{ __('teacher_create.select_department') }}

</option>


@foreach($departments as $department)


<option

value="{{ $department->id }}">


{{ $department->translations->where('language_id',1)->first()?->title ?? '---' }}


</option>


@endforeach


</select>


</div>



</div>
<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.email') }}

</label>


<input

type="email"

name="email"

class="form-control"

value="{{ old('email') }}"

placeholder="{{ __('teacher_create.email_placeholder') }}">


@error('email')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>






<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.phone') }}

</label>


<input

type="text"

name="phone"

class="form-control"

value="{{ old('phone') }}"

placeholder="{{ __('teacher_create.phone_placeholder') }}">


</div>



</div>







<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.position') }}

</label>


<input

type="text"

name="position"

class="form-control"

value="{{ old('position') }}"

placeholder="{{ __('teacher_create.position_placeholder') }}">


</div>






<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.profile_image') }}

</label>


<input

type="file"

name="profile_image"

class="form-control">


</div>



</div>









<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.education') }}

</label>


<textarea

name="education"

rows="4"

class="form-control"

placeholder="{{ __('teacher_create.education_placeholder') }}">{{ old('education') }}</textarea>


</div>







<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.experience') }}

</label>


<textarea

name="experience"

rows="4"

class="form-control"

placeholder="{{ __('teacher_create.experience_placeholder') }}">{{ old('experience') }}</textarea>


</div>



</div>









<div class="mb-3">


<label>

{{ __('teacher_create.biography') }}

</label>


<textarea

name="biography"

rows="5"

class="form-control"

placeholder="{{ __('teacher_create.biography_placeholder') }}">{{ old('biography') }}</textarea>


</div>

<div class="row">



<div class="col-md-4 mb-3">


<label>

{{ __('teacher_create.facebook_url') }}

</label>


<input

type="text"

name="facebook_url"

class="form-control"

value="{{ old('facebook_url') }}"

placeholder="https://facebook.com/">



</div>







<div class="col-md-4 mb-3">


<label>

{{ __('teacher_create.linkedin_url') }}

</label>


<input

type="text"

name="linkedin_url"

class="form-control"

value="{{ old('linkedin_url') }}"

placeholder="https://linkedin.com/">



</div>







<div class="col-md-4 mb-3">


<label>

{{ __('teacher_create.youtube_url') }}

</label>


<input

type="text"

name="youtube_url"

class="form-control"

value="{{ old('youtube_url') }}"

placeholder="https://youtube.com/">



</div>



</div>
<div class="row">



<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.website_url') }}

</label>


<input

type="text"

name="website_url"

class="form-control"

value="{{ old('website_url') }}"

placeholder="https://example.com/">



</div>







<div class="col-md-6 mb-3">


<label>

{{ __('teacher_create.status') }}

</label>


<select

name="status"

class="form-control">



<option value="active"

{{ old('status')=='active' ? 'selected' : '' }}>

{{ __('teacher_create.active') }}

</option>



<option value="inactive"

{{ old('status')=='inactive' ? 'selected' : '' }}>

{{ __('teacher_create.inactive') }}

</option>



</select>


</div>



</div>







<div class="text-right mt-4">



<a href="{{ route('admin.academy_teachers.index') }}"

class="btn btn-secondary">
<br>

<i class="bi bi-arrow-left"></i>

{{ __('teacher_create.back') }}


</a>







<button

type="submit"

class="btn btn-primary">


<i class="bi bi-save"></i>

{{ __('teacher_create.save_teacher') }}


</button>



</div>






</form>



</div>


</div>


</div>


</div>



@endsection
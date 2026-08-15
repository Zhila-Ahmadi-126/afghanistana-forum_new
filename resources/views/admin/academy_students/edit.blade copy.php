@extends('layouts.admin-form')

@section('title')

Edit Student

@endsection


@section('content')


<div class="container-fluid">


<div class="row justify-content-center">


<div class="col-lg-10">


<div class="glass-card">


<h4 class="text-center mb-4">

Edit Student

</h4>




<form

action="{{ route('admin.academy_students.update',$student->id) }}"

method="POST"

enctype="multipart/form-data">


@csrf
@method('PUT')





<div class="row">







<div class="col-md-6 mb-3">


<label>

Status

</label>


<select

name="status"

class="form-control">


<option value="active"

{{ old('status',$student->status)=='active'?'selected':'' }}>

Active

</option>


<option value="inactive"

{{ old('status',$student->status)=='inactive'?'selected':'' }}>

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


<div class="col-md-6 mb-3">


<label>

First Name

</label>


<input

type="text"

name="first_name"

class="form-control"

value="{{ old('first_name',$student->first_name) }}">


@error('first_name')

<span class="text-danger">

{{ $message }}

</span>

@enderror


</div>





<div class="col-md-6 mb-3">


<label>

Last Name

</label>


<input

type="text"

name="last_name"

class="form-control"

value="{{ old('last_name',$student->last_name) }}">


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

            Gender

        </label>

        <select

            name="gender"

            class="form-control">

            <option value="male"

                {{ old('gender',$student->gender)=='male'?'selected':'' }}>

                Male

            </option>

            <option value="female"

                {{ old('gender',$student->gender)=='female'?'selected':'' }}>

                Female

            </option>

        </select>

        @error('gender')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>



    <div class="col-md-4 mb-3">

        <label>

            Date of Birth

        </label>

        <input

            type="date"

            name="date_of_birth"

            class="form-control"

            value="{{ old('date_of_birth',$student->date_of_birth) }}">

        @error('date_of_birth')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>



    <div class="col-md-4 mb-3">

        <label>

            Enrollment Date

        </label>

        <input

            type="date"

            name="enrollment_date"

            class="form-control"

            value="{{ old('enrollment_date',$student->enrollment_date) }}">

        @error('enrollment_date')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>


</div>





<div class="row">


    <div class="col-md-6 mb-3">

        <label>

            Email

        </label>

        <input

            type="email"

            name="email"

            class="form-control"

            value="{{ old('email',$student->email) }}">

        @error('email')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>



    <div class="col-md-6 mb-3">

        <label>

            Phone

        </label>

        <input

            type="text"

            name="phone"

            class="form-control"

            value="{{ old('phone',$student->phone) }}">

        @error('phone')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>


</div>





<div class="row">


    <div class="col-md-12 mb-3">

        <label>

            Address

        </label>

        <textarea

            name="address"

            rows="3"

            class="form-control">{{ old('address',$student->address) }}</textarea>

        @error('address')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>


</div>





<div class="row">


    <div class="col-md-6 mb-3">

        <label>

            Profile Image

        </label>

        <input

type="file"

name="profile_image"

class="form-control">

    </div>



    <div class="col-md-6 mb-3">

        @if($student->profile_image)

            <label>

                Current Image

            </label>

            <div>

                <img

                    src="{{ asset('storage/'.$student->profile_image) }}"

                    class="img-thumbnail"

                    style="max-height:120px;">

            </div>

        @endif

    </div>


</div><div class="row">


    <div class="col-md-6 mb-3">

        <label>

            Emergency Contact Name

        </label>

        <input

            type="text"

            name="emergency_contact_name"

            class="form-control"

            value="{{ old('emergency_contact_name',$student->emergency_contact_name) }}">

        @error('emergency_contact_name')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>



    <div class="col-md-6 mb-3">

        <label>

            Emergency Contact Phone

        </label>

        <input

            type="text"

            name="emergency_contact_phone"

            class="form-control"

            value="{{ old('emergency_contact_phone',$student->emergency_contact_phone) }}">

        @error('emergency_contact_phone')

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

            class="form-control">{{ old('notes',$student->notes) }}</textarea>

        @error('notes')

            <span class="text-danger">

                {{ $message }}

            </span>

        @enderror

    </div>


</div>





<div  class="text-right mt-4">


    <a

        href="{{ route('admin.academy_students.index') }}"

        class="btn btn-secondary">
<br>
        <i class="bi bi-arrow-left"></i>

        Back

    </a>




    <button

        type="submit"

        class="btn btn-success">

        <i class="bi bi-check-circle"></i>

        Update Student

    </button>


</div>



</form>



</div>


</div>


</div>


</div>


</div>


@endsection
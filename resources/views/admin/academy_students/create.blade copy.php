@extends('layouts.admin-form')

@section('title')
{{ __('Add Student') }}
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="glass-card">

                <h4 class="text-center mb-4">{{ __('Add Student') }}</h4>

                <form action="{{ route('admin.academy_students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                      

                        <div class="col-md-6 mb-3">
                            <label>{{ __('Enrollment Date') }}</label>
                            <input type="date" name="enrollment_date" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>{{ __('First Name') }}</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('Last Name') }}</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>{{ __('Gender') }}</label>
                            <select name="gender" class="form-control">
                                <option value="male">{{ __('Male') }}</option>
                                <option value="female">{{ __('Female') }}</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>{{ __('Date of Birth') }}</label>
                            <input type="date" name="date_of_birth" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>{{ __('Status') }}</label>
                            <select name="status" class="form-control">
                                <option value="active">{{ __('Active') }}</option>
                                <option value="inactive">{{ __('Inactive') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('Phone') }}</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>{{ __('Address') }}</label>
                        <textarea name="address" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>{{ __('Emergency Contact Name') }}</label>
                            <input type="text" name="emergency_contact_name" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('Emergency Contact Phone') }}</label>
                            <input type="text" name="emergency_contact_phone" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>{{ __('Profile Image') }}</label>
                        <input type="file" name="profile_image" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label>{{ __('Notes') }}</label>
                        <textarea name="notes" rows="4" class="form-control"></textarea>
                    </div>

                    <div  class="text-right mt-4">
                        <a href="{{ route('admin.academy_students.index') }}" class="btn btn-secondary">
                         <br>
                            {{ __('Back') }}
                        </a>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Save Student') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.admin-form')

@section('title')
{{ __('academy_student_create.page_title') }}
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="glass-card">

                <h4 class="text-center mb-4">{{ __('academy_student_create.heading') }}</h4>

                <form action="{{ route('admin.academy_students.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                      

                        <div class="col-md-6 mb-3">
                            <label>{{ __('academy_student_create.enrollment_date') }}</label>
                            <input type="date" name="enrollment_date" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>{{ __('academy_student_create.first_name') }}</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('academy_student_create.last_name') }}</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label>{{ __('academy_student_create.gender') }}</label>
                            <select name="gender" class="form-control">
                                <option value="male">{{ __('academy_student_create.male') }}</option>
                                <option value="female">{{ __('academy_student_create.female') }}</option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>{{ __('academy_student_create.date_of_birth') }}</label>
                            <input type="date" name="date_of_birth" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>{{ __('academy_student_create.status') }}</label>
                            <select name="status" class="form-control">
                                <option value="active">{{ __('academy_student_create.active') }}</option>
                                <option value="inactive">{{ __('academy_student_create.inactive') }}</option>
                            </select>
                        </div>
                    </div>
                                        <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>{{ __('academy_student_create.email') }}</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('academy_student_create.phone') }}</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>{{ __('academy_student_create.address') }}</label>
                        <textarea name="address" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>{{ __('academy_student_create.emergency_contact_name') }}</label>
                            <input type="text" name="emergency_contact_name" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>{{ __('academy_student_create.emergency_contact_phone') }}</label>
                            <input type="text" name="emergency_contact_phone" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>{{ __('academy_student_create.profile_image') }}</label>
                        <input type="file" name="profile_image" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label>{{ __('academy_student_create.notes') }}</label>
                        <textarea name="notes" rows="4" class="form-control"></textarea>
                    </div>
                                        <div class="text-right mt-4">
                        <a href="{{ route('admin.academy_students.index') }}" class="btn btn-secondary">
                         <br>
                            {{ __('academy_student_create.back') }}
                        </a>

                        <button type="submit" class="btn btn-primary">
                            {{ __('academy_student_create.save_student') }}
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
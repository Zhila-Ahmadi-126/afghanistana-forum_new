@extends('layouts.admin-form')

@section('title')

{{ __('admin.academy_assignments.edit_title') }}

@endsection



@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="glass-card">

                <h4 class="text-center mb-4">

                    {{ __('admin.academy_assignments.edit_title') }}

                </h4>


                <form
                    action="{{ route('admin.academy_assignments.update',$assignment->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_assignments.class') }}

                            </label>

                            <select
                                name="class_id"
                                class="form-select @error('class_id') is-invalid @enderror"
                                required>

                                <option value="">

                                    {{ __('admin.general.select') }}

                                </option>

                                @foreach($classes as $class)

                                    <option
                                        value="{{ $class->id }}"
                                        {{ old('class_id',$assignment->class_id)==$class->id ? 'selected' : '' }}>

                                        {{ $class->translation->title ?? ('#'.$class->id) }}

                                    </option>

                                @endforeach

                            </select>

                            @error('class_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_assignments.teacher') }}

                            </label>

                            <select
                                name="teacher_id"
                                class="form-select @error('teacher_id') is-invalid @enderror"
                                required>

                                <option value="">

                                    {{ __('admin.general.select') }}

                                </option>

                                @foreach($teachers as $teacher)

                                    <option
                                        value="{{ $teacher->id }}"
                                        {{ old('teacher_id',$assignment->teacher_id)==$teacher->id ? 'selected' : '' }}>

                                        {{ $teacher->first_name }}
                                        {{ $teacher->last_name }}

                                    </option>

                                @endforeach

                            </select>

                            @error('teacher_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                    </div>
                                        <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_assignments.due_date') }}

                            </label>

                            <input
                                type="date"
                                name="due_date"
                                class="form-control @error('due_date') is-invalid @enderror"
                                value="{{ old('due_date',$assignment->due_date) }}">

                            @error('due_date')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_assignments.status') }}

                            </label>

                            <select
                                name="status"
                                class="form-select @error('status') is-invalid @enderror">

                                <option
                                    value="active"
                                    {{ old('status',$assignment->status)=='active' ? 'selected' : '' }}>

                                    {{ __('admin.general.active') }}

                                </option>

                                <option
                                    value="inactive"
                                    {{ old('status',$assignment->status)=='inactive' ? 'selected' : '' }}>

                                    {{ __('admin.general.inactive') }}

                                </option>

                            </select>

                            @error('status')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                    </div>



                    <div class="mb-4">

                        <label class="form-label">

                            {{ __('admin.academy_assignments.attachment') }}

                        </label>

                        <input
                            type="file"
                            name="attachment"
                            class="form-control @error('attachment') is-invalid @enderror">

                        @error('attachment')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror


                        @if($assignment->attachment)

                            <div class="mt-3">

                                <strong>

                                    {{ __('admin.general.current_file') }}

                                </strong>

                                <br>

                                <a
                                    href="{{ asset($assignment->attachment) }}"
                                    target="_blank">

                                    {{ basename($assignment->attachment) }}

                                </a>

                            </div>

                        @endif

                    </div>
                                        <div class="d-flex justify-content-between mt-4">


                        <a
                            href="{{ route('admin.academy_assignments.index') }}"
                            class="btn btn-light">

                            <i class="mdi mdi-arrow-left"></i>

                            {{ __('admin.general.back') }}

                        </a>



                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="mdi mdi-content-save"></i>

                            {{ __('admin.general.update') }}

                        </button>


                    </div>


                </form>


            </div>

        </div>

    </div>

</div>


@endsection
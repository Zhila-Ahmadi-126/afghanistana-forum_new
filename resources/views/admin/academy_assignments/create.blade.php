@extends('layouts.admin-form')


@section('title')

{{ __('academy_assignments_create.create_title') }}

@endsection



@section('content')


<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-9">


           <div class="glass-card">


                <div class="card-body">


                    <h4 class="text-center mb-4">

                        {{ __('academy_assignments_create.create_title') }}

                    </h4>



                    <form

                        action="{{ route('admin.academy_assignments.store') }}"

                        method="POST"

                        enctype="multipart/form-data">


                        @csrf




                        <div class="row">


                            <div class="col-md-6 mb-3">


                                <label class="form-label">

                                    {{ __('academy_assignments_create.class') }}

                                </label>


                                <select

                                    name="class_id"

                                    class="form-control"

                                    required>


                                    <option value="">

                                        {{ __('academy_assignments_create.select_class') }}

                                    </option>



                                    @foreach($classes as $class)


                                        <option

                                            value="{{ $class->id }}"

                                            {{ old('class_id')==$class->id?'selected':'' }}>


                                            {{ $class->translation?->title ?? '---' }}


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


                                <label class="form-label">

                                    {{ __('academy_assignments_create.teacher') }}

                                </label>


                                <select

                                    name="teacher_id"

                                    class="form-control"

                                    required>


                                    <option value="">

                                        {{ __('academy_assignments_create.select_teacher') }}

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


                            <div class="col-md-6 mb-3">


                                <label class="form-label">

                                    {{ __('academy_assignments_create.attachment') }}

                                </label>



                                <input

                                    type="file"

                                    name="attachment"

                                    class="form-control">



                                @error('attachment')

                                    <span class="text-danger">

                                        {{ $message }}

                                    </span>

                                @enderror


                            </div>





                            <div class="col-md-6 mb-3">


                                <label class="form-label">

                                    {{ __('academy_assignments_create.due_date') }}

                                </label>



                                <input

                                    type="date"

                                    name="due_date"

                                    class="form-control"

                                    value="{{ old('due_date') }}">



                                @error('due_date')

                                    <span class="text-danger">

                                        {{ $message }}

                                    </span>

                                @enderror


                            </div>


                        </div>





                        <div class="row">


                            <div class="col-md-6 mb-3">


                                <label class="form-label">

                                    {{ __('academy_assignments_create.status') }}

                                </label>



                                <select

                                    name="status"

                                    class="form-control"

                                    required>


                                    <option value="active"

                                    {{ old('status')=='active'?'selected':'' }}>

                                        {{ __('academy_assignments_create.active') }}

                                    </option>



                                    <option value="inactive"

                                    {{ old('status')=='inactive'?'selected':'' }}>

                                        {{ __('academy_assignments_create.inactive') }}

                                    </option>


                                </select>



                                @error('status')

                                    <span class="text-danger">

                                        {{ $message }}

                                    </span>

                                @enderror


                            </div>


                        </div>
                                                  <div class="text-end mt-4">


                            <a

                                href="{{ route('admin.academy_assignments.index') }}"

                                class="btn btn-light">
                                <br>


                                <i class="mdi mdi-arrow-left"></i>


                                {{ __('academy_assignments_create.back') }}


                            </a>





                            <button

                                type="submit"

                                class="btn btn-primary">


                                <i class="mdi mdi-content-save"></i>


                                {{ __('academy_assignments_create.save') }}


                            </button>


                        </div>



                    </form>



                </div>


            </div>


        </div>


    </div>


</div>



@endsection
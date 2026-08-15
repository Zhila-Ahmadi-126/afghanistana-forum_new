@extends('layouts.admin-form')

@section('title')

{{ __('academy_assignments_edit.edit_title') }}

@endsection


@section('content')


<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-9">


            <div class="glass-card">


                <div class="card-body">


                    <h4 class="text-center mb-4">

                        {{ __('academy_assignments_edit.edit_title') }}

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

                                    {{ __('academy_assignments_edit.class') }}

                                </label>


                                <select

                                    name="class_id"

                                    class="form-control @error('class_id') is-invalid @enderror"

                                    required>


                                    <option value="">

                                        {{ __('academy_assignments_edit.select_class') }}

                                    </option>



                                    @foreach($classes as $class)


                                        <option

                                            value="{{ $class->id }}"

                                            {{ old('class_id',$assignment->class_id)==$class->id ? 'selected':'' }}>


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

                                    {{ __('academy_assignments_edit.teacher') }}

                                </label>


                                <select

                                    name="teacher_id"

                                    class="form-control @error('teacher_id') is-invalid @enderror"

                                    required>



                                    <option value="">

                                        {{ __('academy_assignments_edit.select_teacher') }}

                                    </option>



                                    @foreach($teachers as $teacher)


                                        <option

                                            value="{{ $teacher->id }}"

                                            {{ old('teacher_id',$assignment->teacher_id)==$teacher->id ? 'selected':'' }}>


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

                                    {{ __('academy_assignments_edit.due_date') }}

                                </label>


                                <input

                                    type="date"

                                    name="due_date"

                                    class="form-control @error('due_date') is-invalid @enderror"

                                    value="{{ old('due_date', $assignment->due_date ? \Carbon\Carbon::parse($assignment->due_date)->format('Y-m-d') : '') }}">



                                @error('due_date')

                                    <span class="text-danger">

                                        {{ $message }}

                                    </span>

                                @enderror



                            </div>
                                                        <div class="col-md-6 mb-3">


                                <label class="form-label">

                                    {{ __('academy_assignments_edit.status') }}

                                </label>


                                <select

                                    name="status"

                                    class="form-control @error('status') is-invalid @enderror">



                                    <option

                                        value="active"

                                        {{ old('status',$assignment->status)=='active' ? 'selected':'' }}>

                                        {{ __('academy_assignments_edit.active') }}

                                    </option>



                                    <option

                                        value="inactive"

                                        {{ old('status',$assignment->status)=='inactive' ? 'selected':'' }}>

                                        {{ __('academy_assignments_edit.inactive') }}

                                    </option>


                                </select>



                                @error('status')

                                    <span class="text-danger">

                                        {{ $message }}

                                    </span>

                                @enderror



                            </div>


                        </div>


                        <div class="mb-4">


                            <label class="form-label">

                                {{ __('academy_assignments_edit.attachment') }}

                            </label>



                            <input

                                type="file"

                                name="attachment"

                                class="form-control @error('attachment') is-invalid @enderror">



                            @error('attachment')

                                <span class="text-danger">

                                    {{ $message }}

                                </span>

                            @enderror





                            @if($assignment->attachment)


                                <div class="mt-4 p-3 border rounded">


                                    <label class="form-label">

                                        {{ __('academy_assignments_edit.current_file') }}

                                    </label>



                                    <div class="mt-3">


                                        <img

                                            src="{{ asset('storage/'.$assignment->attachment) }}"

                                            class="img-thumbnail"

                                            style="width:250px;height:180px;object-fit:cover;"

                                            alt="Assignment Image">


                                    </div>



                                    <div class="mt-3">


                                        <a

                                            href="{{ asset('storage/'.$assignment->attachment) }}"

                                            target="_blank"

                                            class="btn btn-sm btn-primary">
                                            <br>


                                            <i class="mdi mdi-eye"></i>


                                            {{ __('academy_assignments_edit.current_file') }}


                                        </a>


                                    </div>



                                </div>


                            @endif



                        </div>





                        <div class="row">


                            <div class="col-md-12 mb-3">


                                <label class="form-label">

                                    {{ __('academy_assignments_edit.class_information') }}

                                </label>


                                <div class="alert alert-light">


                                    <strong>

                                        {{ __('academy_assignments_edit.assignment_id') }}:

                                    </strong>

                                    {{ $assignment->id }}



                                </div>


                            </div>


                        </div>
                            <div class="text-end mt-4">


                            <a

                                href="{{ route('admin.academy_assignments.index') }}"

                                class="btn btn-secondary">

                                <br>


                                <i class="mdi mdi-arrow-left"></i>


                                {{ __('academy_assignments_edit.back') }}


                            </a>





                            <button

                                type="submit"

                                class="btn btn-primary">


                                <i class="mdi mdi-content-save"></i>


                                {{ __('academy_assignments_edit.update') }}


                            </button>



                        </div>




                    </form>



                </div>


            </div>



        </div>


    </div>


</div>



@endsection
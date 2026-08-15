@extends('layouts.admin-form')


@section('title')

{{ __('academy_grades_edit.edit_title') }}

@endsection



@section('content')


<div class="container-fluid">


    <div class="row justify-content-center">


        <div class="col-lg-9">


            <div class="glass-card">


                <h4 class="text-center mb-4">

                    {{ __('academy_grades_edit.edit_title') }}

                </h4>



                <form

                    action="{{ route('admin.academy_grades.update',$grade->id) }}"

                    method="POST">


                    @csrf

                    @method('PUT')





                    <div class="row">



                        {{-- Enrollment --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_edit.enrollment') }}

                            </label>



                            <select

                                name="enrollment_id"

                                class="form-select form-control @error('enrollment_id') is-invalid @enderror"

                                required>


                                <option value="">

                                    {{ __('academy_grades_edit.select_enrollment') }}

                                </option>



                                @foreach($enrollments as $enrollment)


                                    <option

                                        value="{{ $enrollment->id }}"

                                        {{ old('enrollment_id',$grade->enrollment_id)==$enrollment->id ? 'selected':'' }}>


                                        #{{ $enrollment->id }}


                                    </option>


                                @endforeach



                            </select>



                            @error('enrollment_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>







                        {{-- Assignment --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_edit.assignment') }}

                            </label>



                            <select

                                name="assignment_id"

                                class="form-select form-control @error('assignment_id') is-invalid @enderror"

                                required>


                                <option value="">

                                    {{ __('academy_grades_edit.select_assignment') }}

                                </option>



                                @foreach($assignments as $assignment)


                                    <option

                                        value="{{ $assignment->id }}"

                                        {{ old('assignment_id',$grade->assignment_id)==$assignment->id ? 'selected':'' }}>


                                        #{{ $assignment->id }}


                                    </option>


                                @endforeach



                            </select>



                            @error('assignment_id')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>


                    </div>
                     id="7m3xqp"
                    <div class="row">



                        {{-- Grade Type --}}


                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_edit.grade_type') }}

                            </label>



                            <select

                                name="grade_type"

                                class="form-select form-control @error('grade_type') is-invalid @enderror"

                                required>



                                <option value="">

                                    {{ __('academy_grades_edit.select_type') }}

                                </option>



                                <option value="exam"

                                {{ old('grade_type',$grade->grade_type)=='exam'?'selected':'' }}>

                                    {{ __('academy_grades_edit.exam') }}

                                </option>



                                <option value="assignment"

                                {{ old('grade_type',$grade->grade_type)=='assignment'?'selected':'' }}>

                                    {{ __('academy_grades_edit.assignment_type') }}

                                </option>



                                <option value="final"

                                {{ old('grade_type',$grade->grade_type)=='final'?'selected':'' }}>

                                    {{ __('academy_grades_edit.final') }}

                                </option>


                            </select>



                            @error('grade_type')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>







                        {{-- Score --}}


                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_edit.score') }}

                            </label>



                            <input

                                type="number"

                                step="0.01"

                                name="score"

                                class="form-control @error('score') is-invalid @enderror"

                                value="{{ old('score',$grade->score) }}"

                                required>



                            @error('score')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>








                        {{-- Max Score --}}


                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_edit.max_score') }}

                            </label>



                            <input

                                type="number"

                                step="0.01"

                                name="max_score"

                                class="form-control @error('max_score') is-invalid @enderror"

                                value="{{ old('max_score',$grade->max_score) }}"

                                required>



                            @error('max_score')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>


                    </div>







                    <div class="row">



                        {{-- Graded By --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_edit.graded_by') }}

                            </label>



                            <select

                                name="graded_by"

                                class="form-select form-control @error('graded_by') is-invalid @enderror">



                                <option value="">

                                    {{ __('academy_grades_edit.select_teacher') }}

                                </option>



                                @foreach($teachers as $teacher)


                                    <option

                                        value="{{ $teacher->id }}"

                                        {{ old('graded_by',$grade->graded_by)==$teacher->id ? 'selected':'' }}>


                                        {{ $teacher->first_name }}

                                        {{ $teacher->last_name }}


                                    </option>


                                @endforeach



                            </select>



                            @error('graded_by')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>







                        {{-- Grade Date --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_edit.grade_date') }}

                            </label>



                            <input

                                type="date"

                                name="grade_date"

                                class="form-control @error('grade_date') is-invalid @enderror"

                                value="{{ old('grade_date',$grade->grade_date ? \Carbon\Carbon::parse($grade->grade_date)->format('Y-m-d') : '') }}">



                            @error('grade_date')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>



                    </div>
                                        {{-- Feedback --}}


                    <div class="mb-3">


                        <label class="form-label">

                            {{ __('academy_grades_edit.feedback') }}

                        </label>



                        <textarea

                            name="feedback"

                            rows="5"

                            class="form-control @error('feedback') is-invalid @enderror">{{ old('feedback',$grade->feedback) }}</textarea>



                        @error('feedback')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror



                    </div>









                    <div class="text-right mt-4">



                        <a

                            href="{{ route('admin.academy_grades.index') }}"

                            class="btn btn-light">
                            <br>


                            <i class="mdi mdi-arrow-left"></i>


                            {{ __('academy_grades_edit.back') }}


                        </a>









                        <button

                            type="submit"

                            class="btn btn-primary">



                            <i class="mdi mdi-content-save"></i>



                            {{ __('academy_grades_edit.update') }}




                        </button>



                    </div>





                </form>



            </div>


        </div>


    </div>


</div>



@endsection
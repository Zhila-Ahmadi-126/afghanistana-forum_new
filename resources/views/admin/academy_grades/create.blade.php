@extends('layouts.admin-form')


@section('title')

{{ __('academy_grades_create.create_title') }}

@endsection



@section('content')


<div class="container-fluid">


    <div class="row justify-content-center">


        <div class="col-lg-9">


            <div class="glass-card">


                <h4 class="text-center mb-4">

                    {{ __('academy_grades_create.create_title') }}

                </h4>



                <form

                    action="{{ route('admin.academy_grades.store') }}"

                    method="POST">


                    @csrf



                    <div class="row">



                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_create.enrollment') }}

                            </label>



                            <select

                                name="enrollment_id"

                                class="form-select form-control @error('enrollment_id') is-invalid @enderror"

                                required>


                                <option value="">


                                    {{ __('academy_grades_create.select_enrollment') }}


                                </option>



                                @foreach($enrollments as $enrollment)


                                    <option

                                        value="{{ $enrollment->id }}"

                                        {{ old('enrollment_id')==$enrollment->id ? 'selected':'' }}>


                                        #{{ $enrollment->id }}


                                    </option>


                                @endforeach



                            </select>



                            @error('enrollment_id')

                                <div class="text-danger">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>







                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_create.assignment') }}

                            </label>



                            <select

                                name="assignment_id"

                                class="form-select form-control @error('assignment_id') is-invalid @enderror"

                                required>



                                <option value="">


                                    {{ __('academy_grades_create.select_assignment') }}


                                </option>



                                @foreach($assignments as $assignment)


                                    <option

                                        value="{{ $assignment->id }}"

                                        {{ old('assignment_id')==$assignment->id ? 'selected':'' }}>


                                        #{{ $assignment->id }}


                                    </option>


                                @endforeach



                            </select>



                            @error('assignment_id')

                                <div class="text-danger">

                                    {{ $message }}

                                </div>

                            @enderror


                        </div>


                    </div>
                                        <div class="row">



                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_create.grade_type') }}

                            </label>




                            <select

                                name="grade_type"

                                class="form-select form-control @error('grade_type') is-invalid @enderror"

                                required>




                                <option value="">


                                    {{ __('academy_grades_create.select_type') }}


                                </option>




                                <option value="exam">


                                    {{ __('academy_grades_create.exam') }}


                                </option>




                                <option value="assignment">


                                    {{ __('academy_grades_create.assignment_type') }}


                                </option>




                                <option value="final">


                                    {{ __('academy_grades_create.final') }}


                                </option>




                            </select>




                            @error('grade_type')

                                <div class="text-danger">

                                    {{ $message }}

                                </div>

                            @enderror





                        </div>








                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_create.score') }}

                            </label>




                            <input

                                type="number"

                                step="0.01"

                                name="score"

                                class="form-control"

                                value="{{ old('score') }}"

                                required>



                        </div>








                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                {{ __('academy_grades_create.max_score') }}

                            </label>




                            <input

                                type="number"

                                step="0.01"

                                name="max_score"

                                class="form-control"

                                value="{{ old('max_score',100) }}"

                                required>



                        </div>



                    </div>








                    <div class="row">





                        <div class="col-md-6 mb-3">



                            <label class="form-label">

                                {{ __('academy_grades_create.graded_by') }}

                            </label>




                            <select

                                name="graded_by"

                                class="form-select form-control">





                                <option value="">


                                    {{ __('academy_grades_create.select_teacher') }}


                                </option>





                                @foreach($teachers as $teacher)



                                    <option

                                        value="{{ $teacher->id }}"

                                        {{ old('graded_by')==$teacher->id ? 'selected':'' }}>




                                        {{ $teacher->first_name }} {{ $teacher->last_name }}




                                    </option>



                                @endforeach




                            </select>



                        </div>








                        <div class="col-md-6 mb-3">



                            <label class="form-label">

                                {{ __('academy_grades_create.grade_date') }}

                            </label>




                            <input

                                type="date"

                                name="grade_date"

                                class="form-control"

                                value="{{ old('grade_date') }}">





                        </div>





                    </div>
                                        <div class="mb-3">


                        <label class="form-label">

                            {{ __('academy_grades_create.feedback') }}

                        </label>




                        <textarea

                            name="feedback"

                            rows="5"

                            class="form-control">{{ old('feedback') }}</textarea>




                    </div>







                    <div class="text-right mt-4">





                        <a

                            href="{{ route('admin.academy_grades.index') }}"

                            class="btn btn-light">


                            <br>


                            <i class="mdi mdi-arrow-left"></i>




                            {{ __('academy_grades_create.back') }}




                        </a>









                        <button

                            type="submit"

                            class="btn btn-primary">



                            <i class="mdi mdi-content-save"></i>




                            {{ __('academy_grades_create.save') }}






                        </button>





                    </div>






                </form>





            </div>


        </div>


    </div>


</div>




@endsection
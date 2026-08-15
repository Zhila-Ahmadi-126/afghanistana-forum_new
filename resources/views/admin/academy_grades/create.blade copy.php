@extends('layouts.admin-form')


@section('title')

{{ __('admin.academy_grades.create_title') }}

@endsection



@section('content')


<div class="container-fluid">


    <div class="row justify-content-center">


        <div class="col-lg-9">


            <div class="glass-card">


                <h4 class="text-center mb-4">

                    {{ __('admin.academy_grades.create_title') }}

                </h4>



                <form

                    action="{{ route('admin.academy_grades.store') }}"

                    method="POST">


                    @csrf



                    <div class="row">



                        {{-- Enrollment --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Enrollment

                            </label>


                            <select

                                name="enrollment_id"

                                class="form-select form-control @error('enrollment_id') is-invalid @enderror"

                                required>


                                <option value="">

                                    Select Enrollment

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






                        {{-- Assignment --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Assignment

                            </label>


                            <select

                                name="assignment_id"

                                class="form-select form-control @error('assignment_id') is-invalid @enderror"

                                required>


                                <option value="">

                                    Select Assignment

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


                        {{-- Grade Type --}}


                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                Grade Type

                            </label>



                            <select

                                name="grade_type"

                                class="form-select form-control @error('grade_type') is-invalid @enderror"

                                required>



                                <option value="">

                                    Select Type

                                </option>



                              <option value="exam">
                                        Exam
                                    </option>


                                    <option value="assignment">
                                        Assignment
                                    </option>


                                    <option value="final">
                                        Final
                                    </option>


                            </select>


                            @error('grade_type')

                                <div class="text-danger">

                                    {{ $message }}

                                </div>

                            @enderror



                        </div>






                        {{-- Score --}}


                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                Score

                            </label>



                            <input

                                type="number"

                                step="0.01"

                                name="score"

                                class="form-control"

                                value="{{ old('score') }}"

                                required>


                        </div>






                        {{-- Max Score --}}


                        <div class="col-md-4 mb-3">


                            <label class="form-label">

                                Max Score

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


                        {{-- Graded By --}}



                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Graded By

                            </label>



                           <select

                                name="graded_by"

                                class="form-select form-control">


                                <option value="">

                                    Select Teacher

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








                        {{-- Grade Date --}}



                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Grade Date

                            </label>



                            <input

                                type="date"

                                name="grade_date"

                                class="form-control"

                                value="{{ old('grade_date') }}">



                        </div>



                    </div>
                                        {{-- Feedback --}}


                    <div class="mb-3">


                        <label class="form-label">

                            Feedback

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


                            {{ __('admin.general.back') }}


                        </a>






                        <button

                            type="submit"

                            class="btn btn-primary">


                            <i class="mdi mdi-content-save"></i>


                            {{ __('admin.general.save') }}



                        </button>



                    </div>




                </form>



            </div>


        </div>


    </div>


</div>



@endsection
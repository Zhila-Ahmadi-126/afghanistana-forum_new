@extends('layouts.admin-form')


@section('title')

Create Certificate

@endsection



@section('content')


<div class="container-fluid">


    <div class="row justify-content-center">


        <div class="col-lg-9">


            <div class="glass-card">


                <h4 class="text-center mb-4">

                    Create Certificate

                </h4>



                <form

                action="{{ route('admin.academy_certificates.store') }}"

                method="POST"

                enctype="multipart/form-data">


                    @csrf





                    <div class="row">



                        {{-- Student --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Student

                            </label>



                            <select

                            name="student_id"

                            class="form-select form-control"

                            required>



                                <option value="">

                                    Select Student

                                </option>



                                @foreach($students as $student)


                                    <option

                                    value="{{ $student->id }}"

                                    {{ old('student_id')==$student->id?'selected':'' }}>


                                        {{ $student->first_name }}

                                        {{ $student->last_name }}


                                    </option>


                                @endforeach



                            </select>


                        </div>







                        {{-- Class --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Class

                            </label>



                            <select

                            name="class_id"

                            class="form-select form-control"

                            required>



                                <option value="">

                                    Select Class

                                </option>



                            @foreach($classes as $class)

                            <option value="{{ $class->id }}"

                            {{ old('class_id')==$class->id?'selected':'' }}>


                                {{ $class->translation?->title ?? 'No title' }}


                            </option>

                            @endforeach


                            </select>


                        </div>



                    </div>
                                        <div class="row">



                        {{-- Certificate Number --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Certificate Number

                            </label>



                            <input

                            type="text"

                            name="certificate_number"

                            class="form-control"

                            value="{{ old('certificate_number') }}"

                            required>



                        </div>







                        {{-- Issue Date --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                Issue Date

                            </label>



                            <input

                            type="date"

                            name="issue_date"

                            class="form-control"

                            value="{{ old('issue_date') }}"

                            required>



                        </div>



                    </div>








                    {{-- Certificate File --}}


                    <div class="mb-3">


                        <label class="form-label">

                            Certificate File

                        </label>



                        <input

                        type="file"

                        name="certificate_file"

                        class="form-control">



                        <small class="text-muted">

                            PDF, JPG, PNG (Max 10MB)

                        </small>



                    </div>









                    {{-- Status --}}


                    <div class="mb-3">


                        <label class="form-label">

                            Status

                        </label>



                        <select

                        name="status"

                        class="form-select form-control"

                        required>
                        <option value="issued"
                        {{ old('status')=='issued'?'selected':'' }}>

                            Issued

                        </option>


                        <option value="pending"
                        {{ old('status')=='pending'?'selected':'' }}>

                            Pending

                        </option>


                        <option value="revoked"
                        {{ old('status')=='revoked'?'selected':'' }}>

                            Revoked

                        </option>
                        </select>


                    </div>
                                        {{-- Notes --}}


                    <div class="mb-3">


                        <label class="form-label">

                            Notes

                        </label>



                        <textarea

                        name="notes"

                        rows="5"

                        class="form-control">{{ old('notes') }}</textarea>



                    </div>








                    <div class="text-right mt-4">



                        <a

                        href="{{ route('admin.academy_certificates.index') }}"

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
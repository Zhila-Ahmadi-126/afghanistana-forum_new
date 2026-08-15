@extends('layouts.admin-form')


@section('title')

{{ __('academy_certificates_create.create_title') }}

@endsection



@section('content')


<div class="container-fluid">


    <div class="row justify-content-center">


        <div class="col-lg-9">


            <div class="glass-card">


                <h4 class="text-center mb-4">

                    {{ __('academy_certificates_create.create_title') }}

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

                                {{ __('academy_certificates_create.student') }}

                            </label>





                            <select

                                name="student_id"

                                class="form-select form-control @error('student_id') is-invalid @enderror"

                                required>





                                <option value="">


                                    {{ __('academy_certificates_create.select_student') }}


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




                            @error('student_id')


                                <div class="invalid-feedback">


                                    {{ $message }}


                                </div>


                            @enderror



                        </div>









                        {{-- Class --}}



                        <div class="col-md-6 mb-3">


                            <label class="form-label">


                                {{ __('academy_certificates_create.class') }}


                            </label>





                            <select

                                name="class_id"

                                class="form-select form-control @error('class_id') is-invalid @enderror"

                                required>





                                <option value="">


                                    {{ __('academy_certificates_create.select_class') }}


                                </option>





                                @foreach($classes as $class)



                                    <option

                                        value="{{ $class->id }}"

                                        {{ old('class_id')==$class->id?'selected':'' }}>




                                        {{ $class->translation?->title ?? __('academy_certificates_create.no_title') }}




                                    </option>



                                @endforeach





                            </select>





                            @error('class_id')


                                <div class="invalid-feedback">


                                    {{ $message }}


                                </div>


                            @enderror



                        </div>





                    </div>
                                        <div class="row">





                        {{-- Certificate Number --}}



                        <div class="col-md-6 mb-3">


                            <label class="form-label">


                                {{ __('academy_certificates_create.certificate_number') }}


                            </label>





                            <input


                                type="text"


                                name="certificate_number"


                                class="form-control @error('certificate_number') is-invalid @enderror"


                                value="{{ old('certificate_number') }}"


                                required>





                            @error('certificate_number')


                                <div class="invalid-feedback">


                                    {{ $message }}


                                </div>


                            @enderror



                        </div>









                        {{-- Issue Date --}}



                        <div class="col-md-6 mb-3">


                            <label class="form-label">


                                {{ __('academy_certificates_create.issue_date') }}


                            </label>





                            <input


                                type="date"


                                name="issue_date"


                                class="form-control @error('issue_date') is-invalid @enderror"


                                value="{{ old('issue_date') }}"


                                required>





                            @error('issue_date')


                                <div class="invalid-feedback">


                                    {{ $message }}


                                </div>


                            @enderror



                        </div>




                    </div>









                    {{-- Certificate File --}}



                    <div class="mb-3">


                        <label class="form-label">


                            {{ __('academy_certificates_create.certificate_file') }}


                        </label>





                        <input


                            type="file"


                            name="certificate_file"


                            class="form-control @error('certificate_file') is-invalid @enderror">





                        @error('certificate_file')


                            <div class="invalid-feedback">


                                {{ $message }}


                            </div>


                        @enderror





                       


                    </div>













                    {{-- Status --}}



                    <div class="mb-3">


                        <label class="form-label">


                            {{ __('academy_certificates_create.status') }}


                        </label>





                        <select


                            name="status"


                            class="form-select form-control @error('status') is-invalid @enderror"


                            required>





                            <option value="issued"

                            {{ old('status')=='issued'?'selected':'' }}>


                                {{ __('academy_certificates_create.issued') }}


                            </option>





                            <option value="pending"

                            {{ old('status')=='pending'?'selected':'' }}>


                                {{ __('academy_certificates_create.pending') }}


                            </option>





                            <option value="revoked"

                            {{ old('status')=='revoked'?'selected':'' }}>


                                {{ __('academy_certificates_create.revoked') }}


                            </option>





                        </select>





                        @error('status')


                            <div class="invalid-feedback">


                                {{ $message }}


                            </div>


                        @enderror



                    </div>
                                        {{-- Notes --}}



                    <div class="mb-3">


                        <label class="form-label">


                            {{ __('academy_certificates_create.notes') }}


                        </label>





                        <textarea


                            name="notes"


                            rows="5"


                            class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>





                        @error('notes')


                            <div class="invalid-feedback">


                                {{ $message }}


                            </div>


                        @enderror



                    </div>









                    <div class="text-right mt-4">





                        <a


                            href="{{ route('admin.academy_certificates.index') }}"


                            class="btn btn-light">
                            <br>


                            <i class="mdi mdi-arrow-left"></i>





                            {{ __('academy_certificates_create.back') }}





                        </a>









                        <button


                            type="submit"


                            class="btn btn-primary">





                            <i class="mdi mdi-content-save"></i>





                            {{ __('academy_certificates_create.save') }}






                        </button>





                    </div>







                </form>





            </div>


        </div>


    </div>


</div>





@endsection
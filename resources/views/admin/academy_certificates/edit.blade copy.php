@extends('layouts.admin-form')

@section('title')

{{ __('admin.academy_certificates.edit_title') }}

@endsection


@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="glass-card">


                <h4 class="text-center mb-4">

                    {{ __('admin.academy_certificates.edit_title') }}

                </h4>



                <form

                    action="{{ route('admin.academy_certificates.update',$certificate->id) }}"

                    method="POST"

                    enctype="multipart/form-data">


                    @csrf

                    @method('PUT')




                    <div class="row">



                        {{-- Student --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('admin.academy_certificates.student') }}

                            </label>



                            <select

                                name="student_id"

                                class="form-select form-control @error('student_id') is-invalid @enderror"

                                required>



                                <option value="">

                                    {{ __('admin.general.select') }}

                                </option>



                                @foreach($students as $student)


                                    <option

                                        value="{{ $student->id }}"

                                        {{ old('student_id',$certificate->student_id)==$student->id ? 'selected' : '' }}>


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

                                {{ __('admin.academy_certificates.class') }}

                            </label>



                            <select

                                name="class_id"

                                class="form-select form-control @error('class_id') is-invalid @enderror"

                                required>



                                <option value="">

                                    {{ __('admin.general.select') }}

                                </option>



                                @foreach($classes as $class)


                                    <option

                                        value="{{ $class->id }}"

                                        {{ old('class_id',$certificate->class_id)==$class->id ? 'selected' : '' }}>


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



                    </div>






                    <div class="row">


                        {{-- Certificate Number --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('admin.academy_certificates.certificate_number') }}

                            </label>



                            <input

                                type="text"

                                name="certificate_number"

                                class="form-control @error('certificate_number') is-invalid @enderror"

                                value="{{ old('certificate_number',$certificate->certificate_number) }}"

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

                                {{ __('admin.academy_certificates.issue_date') }}

                            </label>



                            <input

                                type="date"

                                name="issue_date"

                                class="form-control"

                                value="{{ old('issue_date',$certificate->issue_date) }}">


                        </div>



                    </div>
                                        <div class="row">


                        {{-- Certificate File --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('admin.academy_certificates.certificate_file') }}

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






                            @if($certificate->certificate_file)


                                <div class="mt-3">


                                    @php

                                        $filePath = asset(
                                            'storage/'.$certificate->certificate_file
                                        );

                                        $extension = strtolower(
                                            pathinfo(
                                                $certificate->certificate_file,
                                                PATHINFO_EXTENSION
                                            )
                                        );

                                    @endphp





                                    @if(in_array($extension,[

                                        'jpg',
                                        'jpeg',
                                        'png',
                                        'webp'

                                    ]))


                                        <a

                                        href="{{ $filePath }}"

                                        target="_blank">


                                            <img

                                            src="{{ $filePath }}"

                                            width="100"

                                            class="rounded border">


                                        </a>



                                    @else


                                        <a

                                        href="{{ $filePath }}"

                                        target="_blank"

                                        class="btn btn-sm btn-outline-danger">


                                            <i class="mdi mdi-file-pdf"></i>


                                            {{ __('admin.general.view') }}


                                        </a>



                                    @endif


                                </div>


                            @endif



                        </div>










                        {{-- Status --}}


                        <div class="col-md-6 mb-3">


                            <label class="form-label">

                                {{ __('admin.general.status') }}

                            </label>



                            <select

                                name="status"

                                class="form-select form-control">


                                <option

                                    value="issued"

                                    {{ old('status',$certificate->status)=='issued' ? 'selected' : '' }}>


                                    {{ __('admin.academy_certificates.issued') }}


                                </option>



                                <option

                                    value="pending"

                                    {{ old('status',$certificate->status)=='pending' ? 'selected' : '' }}>


                                    {{ __('admin.academy_certificates.pending') }}


                                </option>




                                <option

                                    value="revoked"

                                    {{ old('status',$certificate->status)=='revoked' ? 'selected' : '' }}>


                                    {{ __('admin.academy_certificates.revoked') }}


                                </option>



                            </select>


                        </div>



                    </div>









                    {{-- Notes --}}


                    <div class="mb-3">


                        <label class="form-label">

                            {{ __('admin.academy_certificates.notes') }}

                        </label>




                        <textarea

                            name="notes"

                            rows="5"

                            class="form-control @error('notes') is-invalid @enderror">{{ old('notes',$certificate->notes) }}</textarea>




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
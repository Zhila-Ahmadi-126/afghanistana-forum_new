@extends('layouts.admin-form')

@section('title')

{{ __('admin.academy_resources.edit_title') }}

@endsection



@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="glass-card">

                <h4 class="text-center mb-4">

                    {{ __('admin.academy_resources.edit_title') }}

                </h4>


                <form
                    action="{{ route('admin.academy_resources.update',$resource->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                    <div class="row">


                        {{-- Department --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.department') }}

                            </label>

                            <select
                                name="department_id"
                                class="form-select form-control @error('department_id') is-invalid @enderror"
                                required>

                                @foreach($departments as $department)

                                    <option
                                        value="{{ $department->id }}"
                                        {{ old('department_id',$resource->department_id)==$department->id ? 'selected' : '' }}>

                                        {{ $department->translation->title ?? ('#'.$department->id) }}

                                    </option>

                                @endforeach

                            </select>

                        </div>



                        {{-- Class --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.class') }}

                            </label>

                            <select
                                name="class_id"
                                class="form-select form-control @error('class_id') is-invalid @enderror"
                                required>

                                @foreach($classes as $class)

                                    <option
                                        value="{{ $class->id }}"
                                        {{ old('class_id',$resource->class_id)==$class->id ? 'selected' : '' }}>

                                        {{ $class->translation->title ?? ('#'.$class->id) }}

                                    </option>

                                @endforeach

                            </select>

                        </div>



                        {{-- Resource Type --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.resource_type') }}

                            </label>

                            <select
                                name="resource_type"
                                class="form-select form-control">

                                <option value="book" {{ old('resource_type',$resource->resource_type)=='book' ? 'selected' : '' }}>Book</option>

                                <option value="pdf" {{ old('resource_type',$resource->resource_type)=='pdf' ? 'selected' : '' }}>PDF</option>

                                <option value="video" {{ old('resource_type',$resource->resource_type)=='video' ? 'selected' : '' }}>Video</option>

                                <option value="link" {{ old('resource_type',$resource->resource_type)=='link' ? 'selected' : '' }}>Link</option>

                                <option value="file" {{ old('resource_type',$resource->resource_type)=='file' ? 'selected' : '' }}>File</option>

                                <option value="html" {{ old('resource_type',$resource->resource_type)=='html' ? 'selected' : '' }}>HTML</option>

                            </select>

                        </div>

                    </div>
                                        <div class="row">


                        {{-- Title --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.title') }}

                            </label>

                            <input
                                type="text"
                                name="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title',$resource->title) }}"
                                required>

                            @error('title')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>



                        {{-- Author --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.author') }}

                            </label>

                            <input
                                type="text"
                                name="author"
                                class="form-control @error('author') is-invalid @enderror"
                                value="{{ old('author',$resource->author) }}">

                            @error('author')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>

                    </div>



                    <div class="row">


                        {{-- Cover Image --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.cover_image') }}

                            </label>

                            <input
                                type="file"
                                name="cover_image"
                                class="form-control @error('cover_image') is-invalid @enderror">

                            @error('cover_image')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                            @if($resource->cover_image)

                                <div class="mt-2">

                                    <a
                                        href="{{ asset('storage/'.$resource->cover_image) }}"
                                        target="_blank">

                                        <img
                                            src="{{ asset('storage/'.$resource->cover_image) }}"
                                            width="90"
                                            class="rounded border">

                                    </a>

                                </div>

                            @endif

                        </div>



                        {{-- File --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.file') }}

                            </label>

                            <input
                                type="file"
                                name="file_path"
                                class="form-control @error('file_path') is-invalid @enderror">

                            @error('file_path')

                                <div class="invalid-feedback">

                                    {{ $message }}

                                </div>

                            @enderror


                            @if($resource->file_path)

                                <div class="mt-2">

                                    <a
                                        href="{{ asset('storage/'.$resource->file_path) }}"
                                        target="_blank"
                                        class="btn btn-sm btn-outline-primary">

                                        <i class="mdi mdi-download"></i>

                                        {{ __('admin.general.view') }}

                                    </a>

                                </div>

                            @endif

                        </div>

                    </div>



                    <div class="row">


                        {{-- External URL --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.external_url') }}

                            </label>

                            <input
                                type="url"
                                name="external_url"
                                class="form-control"
                                value="{{ old('external_url',$resource->external_url) }}">

                        </div>



                        {{-- HTML Path --}}

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.html_path') }}

                            </label>

                            <input
                                type="text"
                                name="html_path"
                                class="form-control"
                                value="{{ old('html_path',$resource->html_path) }}">

                        </div>

                    </div>
                                        {{-- Short Description --}}

                    <div class="mb-3">

                        <label class="form-label">

                            {{ __('admin.academy_resources.short_description') }}

                        </label>

                        <textarea
                            name="short_description"
                            rows="3"
                            class="form-control @error('short_description') is-invalid @enderror">{{ old('short_description',$resource->short_description) }}</textarea>

                        @error('short_description')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    {{-- Description --}}

                    <div class="mb-3">

                        <label class="form-label">

                            {{ __('admin.academy_resources.description') }}

                        </label>

                        <textarea
                            name="description"
                            rows="6"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description',$resource->description) }}</textarea>

                        @error('description')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>



                    <div class="row">


                        {{-- Published Date --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                {{ __('admin.academy_resources.published_date') }}

                            </label>

                            <input
                                type="date"
                                name="published_date"
                                class="form-control"
                                value="{{ old('published_date', optional($resource->published_date)->format('Y-m-d')) }}">

                        </div>



                        {{-- Status --}}

                        <div class="col-md-4 mb-3">

                            <label class="form-label">

                                {{ __('admin.general.status') }}

                            </label>

                            <select
                                name="status"
                                class="form-select form-control ">

                                <option
                                    value="active"
                                    {{ old('status',$resource->status)=='active' ? 'selected' : '' }}>

                                    {{ __('admin.general.active') }}

                                </option>

                                <option
                                    value="inactive"
                                    {{ old('status',$resource->status)=='inactive' ? 'selected' : '' }}>

                                    {{ __('admin.general.inactive') }}

                                </option>

                            </select>

                        </div>



                        {{-- Featured --}}

                        <div class="col-md-4 mb-3 d-flex align-items-center">

                            <div class="form-check mt-4 ">

                                <input
                                    class="form-check-input ml-2"
                                    type="checkbox"
                                    name="is_featured"
                                    value="1"
                                    {{ old('is_featured',$resource->is_featured) ? 'checked' : '' }}>

                                <label class="form-check-label">

                                    {{ __('admin.academy_resources.is_featured') }}

                                </label>

                            </div>

                        </div>

                    </div>



                    <div class="text-right mt-4">

                        <a
                            href="{{ route('admin.academy_resources.index') }}"
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
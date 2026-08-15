@extends('layouts.admin-form')

@section('title')
{{ __('admin.academy_assignments.translation_title') }}
@endsection

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="glass-card">

                <h4 class="text-center mb-4">

                    {{ __('admin.academy_assignments.translation_title') }}

                </h4>


                @if(session('success'))

                    <div class="alert alert-success">

                        {{ session('success') }}

                    </div>

                @endif


                @if($translation)

                    <div class="alert alert-info">

                        {{ __('admin.academy_assignments.translation_exists') }}

                    </div>

                @else

                    <div class="alert alert-warning">

                        {{ __('admin.academy_assignments.translation_new') }}

                    </div>

                @endif


                <div class="mb-4">

                    <label class="form-label">

                        {{ __('admin.general.language') }}

                    </label>

                    <select
                        class="form-select form-control"
                       onchange="location.href='{{ request()->url() }}?language_id=' + this.value;">

                        @foreach($languages as $language)

                            <option
                                value="{{ $language->id }}"
                                {{ $language->id == $language_id ? 'selected' : '' }}>

                                {{ $language->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <form
                    action="{{ route('admin.academy_assignments.translation.store',$assignment->id) }}"
                    method="POST">

                    @csrf

                    <input
                        type="hidden"
                        name="language_id"
                        value="{{ $language_id }}">


                    <div class="mb-3">

                        <label class="form-label">

                            {{ __('admin.academy_assignments.title') }}

                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title',$translation->title ?? '') }}"
                            required>

                        @error('title')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label">

                            {{ __('admin.academy_assignments.description') }}

                        </label>

                        <textarea
                            name="description"
                            rows="8"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description',$translation->description ?? '') }}</textarea>

                        @error('description')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>
                                        <div class="row">

                       


                       

                    </div>


                    <div  class="text-end mt-4">

                        <a
                            href="{{ route('admin.academy_assignments.index') }}"
                            class="btn btn-light">
                            <br>

                            <i class="mdi mdi-arrow-left"></i>

                            {{ __('admin.general.back') }}

                        </a>


                       

                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="mdi mdi-content-save"></i>

                                @if($translation)

                                    {{ __('admin.academy_assignments.edit_translation') }}

                                @else

                                    {{ __('admin.academy_assignments.save_translation') }}

                                @endif

                            </button>
                              </form>
                                @if($translation)


                                <form
                                    action="{{ route('admin.academy_assignments.translation.destroy',$translation->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">

                                        <i class="mdi mdi-delete"></i>

                                        {{ __('admin.general.delete') }}

                                    </button>

                                </form>

                 

                          @endif
                          </div>
                    </div>
              <div>
            </div>
        </div>

    </div>

</div>

@endsection
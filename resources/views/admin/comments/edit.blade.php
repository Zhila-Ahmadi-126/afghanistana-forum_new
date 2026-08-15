@extends('layouts.admin-form')


@section('title')

    {{ __('comments_edit.edit_title') }}

@endsection


@section('content')


<div class="container-fluid">


    <div class="row justify-content-center">


        <div class="col-lg-10">


            <div class="glass-card">


                <h4 class="text-center mb-4">

                    {{ __('comments_edit.edit_title') }}

                </h4>


                <form
                    action="{{ route('admin.comments.update', $comment->id) }}"
                    method="POST">

                    @csrf

                    @method('PUT')


                    {{-- Status --}}

                    <div class="mb-3">

                        <label class="form-label">

                            {{ __('comments_edit.status') }}

                        </label>


                        <select
                            name="status"
                            class="form-select form-control @error('status') is-invalid @enderror"
                            required>


                            <option
                                value="pending"
                                {{ old('status', $comment->status) == 'pending' ? 'selected' : '' }}>

                                {{ __('comments_edit.pending') }}

                            </option>


                            <option
                                value="approved"
                                {{ old('status', $comment->status) == 'approved' ? 'selected' : '' }}>

                                {{ __('comments_edit.approved') }}

                            </option>


                            <option
                                value="rejected"
                                {{ old('status', $comment->status) == 'rejected' ? 'selected' : '' }}>

                                {{ __('comments_edit.rejected') }}

                            </option>


                        </select>


                        @error('status')

                            <div class="invalid-feedback">

                                {{ $message }}

                            </div>

                        @enderror

                    </div>


                    {{-- Buttons --}}

                    <div class="text-right mt-4">


                        <a
                            href="{{ route('admin.comments.index') }}"
                            class="btn btn-light">
                            <br>

                            <i class="mdi mdi-arrow-left"></i>

                            {{ __('comments_edit.back') }}

                        </a>


                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="mdi mdi-content-save"></i>

                            {{ __('comments_edit.update') }}

                        </button>


                    </div>


                </form>


            </div>


        </div>


    </div>


</div>


@endsection
@extends('layouts.admin')

@section('title')

{{ __('academy_certificates.menu') }}

@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-4">

                        <h4>

                            {{ __('academy_certificates.menu') }}

                        </h4>

                        <a
                            href="{{ route('admin.academy_certificates.create') }}"
                            class="btn btn-primary">

                            <i class="mdi mdi-plus"></i>

                            {{ __('general.create') }}

                        </a>

                    </div>



                    {{-- Search Filter --}}

                    <form
                        method="GET"
                        action="{{ route('admin.academy_certificates.index') }}">

                        <div class="row mb-3">

                            <div class="col-md-4">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="{{ __('academy_certificates.search_placeholder') }}"
                                    value="{{ request('search') }}">

                            </div>

                            <div class="col-md-3">

                                <select
                                    name="status"
                                    class="form-select form-control">

                                    <option value="">

                                        {{ __('general.all_status') }}

                                    </option>

                                    <option
                                        value="active"
                                        {{ request('status')=='active'?'selected':'' }}>

                                        {{ __('general.active') }}

                                    </option>

                                    <option
                                        value="inactive"
                                        {{ request('status')=='inactive'?'selected':'' }}>

                                        {{ __('general.inactive') }}

                                    </option>

                                </select>

                            </div>

                            <div class="col-md-2">

                                <button
                                    class="btn btn-secondary">

                                    {{ __('general.search') }}

                                </button>

                            </div>

                        </div>

                    </form>

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>

                                        {{ __('academy_certificates.student') }}

                                    </th>

                                    <th>

                                        {{ __('academy_certificates.class') }}

                                    </th>

                                    <th>

                                        {{ __('academy_certificates.certificate_number') }}

                                    </th>

                                    <th>

                                        {{ __('academy_certificates.issue_date') }}

                                    </th>

                                    <th>

                                        {{ __('academy_certificates.file') }}

                                    </th>

                                    <th>

                                        {{ __('general.status') }}

                                    </th>

                                    <th width="150">

                                        {{ __('general.action') }}

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            @forelse($certificates as $certificate)

                                <tr>

                                    <td>

                                        {{ $loop->iteration }}

                                    </td>
                                                                        {{-- Student --}}

                                    <td>

                                        @if($certificate->student)

                                            {{ $certificate->student->first_name }}

                                            {{ $certificate->student->last_name }}

                                        @else

                                            <span class="text-muted">

                                                --

                                            </span>

                                        @endif

                                    </td>





                                    {{-- Class --}}

                                    <td>

                                        {{ $certificate->academyClass?->translation?->title ?? '--' }}

                                    </td>







                                    {{-- Certificate Number --}}

                                    <td>

                                        <strong>

                                            {{ $certificate->certificate_number }}

                                        </strong>

                                    </td>







                                    {{-- Issue Date --}}

                                    <td>

                                        @if($certificate->issue_date)

                                            {{ \Carbon\Carbon::parse($certificate->issue_date)->format('Y-m-d') }}

                                        @else

                                            --

                                        @endif

                                    </td>







                                    {{-- File --}}

                                    <td>

                                        @if($certificate->certificate_file)

                                            @php

                                                $file = asset('storage/'.$certificate->certificate_file);

                                                $extension = pathinfo(
                                                    $certificate->certificate_file,
                                                    PATHINFO_EXTENSION
                                                );

                                            @endphp



                                            {{-- Image Preview --}}

                                            @if(in_array(strtolower($extension),[
                                                'jpg',
                                                'jpeg',
                                                'png',
                                                'gif',
                                                'webp'
                                            ]))

                                                <a
                                                    href="{{ $file }}"
                                                    target="_blank">

                                                    <img
                                                        src="{{ $file }}"
                                                        width="70"
                                                        height="70"
                                                        style="object-fit:cover;border-radius:8px;">

                                                </a>



                                            {{-- PDF / File --}}

                                            @else

                                                <a
                                                    href="{{ $file }}"
                                                    target="_blank"
                                                    class="btn btn-sm btn-danger">

                                                    <i class="mdi mdi-file-pdf"></i>

                                                    {{ __('academy_certificates.pdf') }}

                                                </a>

                                            @endif

                                        @else

                                            <span class="text-muted">

                                                --

                                            </span>

                                        @endif

                                    </td>







                                    {{-- Status --}}

                                    <td>

                                        @if($certificate->status=='active')

                                            <span class="badge bg-success">

                                                {{ __('general.active') }}

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                {{ __('general.inactive') }}

                                            </span>

                                        @endif

                                    </td>
                                                                        {{-- Action --}}

                                    <td>

                                        <a
                                            href="{{ route('admin.academy_certificates.edit',$certificate->id) }}"
                                            class="btn btn-sm btn-primary">

                                            <i class="bi bi-pencil"></i>

                                        </a>



                                        <form
                                            action="{{ route('admin.academy_certificates.destroy',$certificate->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="8" class="text-center">

                                        {{ __('general.no_data_found') }}

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>



                    {{-- Pagination --}}

                    <div class="mt-3">

                        {{ $certificates->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
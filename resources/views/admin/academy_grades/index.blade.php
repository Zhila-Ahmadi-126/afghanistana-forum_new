@extends('layouts.admin')

@section('title')

{{ __('academy_grades.menu') }}

@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-4">

                        <h4>

                            {{ __('academy_grades.menu') }}

                        </h4>

                        <a
                            href="{{ route('admin.academy_grades.create') }}"
                            class="btn btn-primary">

                            <i class="mdi mdi-plus"></i>

                            {{ __('general.create') }}

                        </a>

                    </div>

                    {{-- Search --}}

                    <form
                        method="GET"
                        action="{{ route('admin.academy_grades.index') }}">

                        <div class="row mb-3">

                            <div class="col-md-4">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="{{ __('academy_grades.search_placeholder') }}"
                                    value="{{ request('search') }}">

                            </div>

                            <div class="col-md-3">

                                <select
                                    name="grade_type"
                                    class="form-select form-control">

                                    <option value="">

                                        {{ __('academy_grades.all_types') }}

                                    </option>

                                    <option
                                        value="exam"
                                        {{ request('grade_type')=='exam' ? 'selected' : '' }}>

                                        {{ __('academy_grades.exam') }}

                                    </option>

                                    <option
                                        value="assignment"
                                        {{ request('grade_type')=='assignment' ? 'selected' : '' }}>

                                        {{ __('academy_grades.assignment') }}

                                    </option>

                                    <option
                                        value="quiz"
                                        {{ request('grade_type')=='quiz' ? 'selected' : '' }}>

                                        {{ __('academy_grades.quiz') }}

                                    </option>

                                </select>

                            </div>

                            <div class="col-md-2">

                                <button class="btn btn-secondary">

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

                                        {{ __('academy_grades.enrollment') }}

                                    </th>

                                    <th>

                                        {{ __('academy_grades.assignment') }}

                                    </th>

                                    <th>

                                        {{ __('academy_grades.type') }}

                                    </th>

                                    <th>

                                        {{ __('academy_grades.score') }}

                                    </th>

                                    <th>

                                        {{ __('academy_grades.feedback') }}

                                    </th>

                                    <th>

                                        {{ __('academy_grades.graded_by') }}

                                    </th>

                                    <th>

                                        {{ __('academy_grades.date') }}

                                    </th>

                                    <th width="150">

                                        {{ __('general.action') }}

                                    </th>

                                </tr>

                            </thead>

                            <tbody>
                                @forelse($grades as $grade)

<tr>

    <td>

        {{ $loop->iteration }}

    </td>

    {{-- Enrollment --}}

    <td>

        @if($grade->enrollment)

            {{ $grade->enrollment->id }}

        @else

            <span class="text-muted">

                {{ __('academy_grades.not_available') }}

            </span>

        @endif

    </td>

    {{-- Assignment --}}

    <td>

        @if($grade->assignment)

            {{ $grade->assignment->id }}

        @else

            <span class="text-muted">

                {{ __('academy_grades.not_available') }}

            </span>

        @endif

    </td>

    {{-- Grade Type --}}

    <td>

        <span class="badge bg-info">

            @switch($grade->grade_type)

                @case('exam')
                    {{ __('academy_grades.exam') }}
                    @break

                @case('assignment')
                    {{ __('academy_grades.assignment') }}
                    @break

                @case('quiz')
                    {{ __('academy_grades.quiz') }}
                    @break

                @default
                    {{ strtoupper($grade->grade_type) }}

            @endswitch

        </span>

    </td>

    {{-- Score --}}

    <td>

        <strong>

            {{ $grade->score }}

        </strong>

        /

        {{ $grade->max_score }}

    </td>

    {{-- Feedback --}}

    <td>

        {{ $grade->feedback ?? __('academy_grades.not_available') }}

    </td>

    {{-- Graded By --}}

    <td>

        @if($grade->grader)

            {{ $grade->grader->first_name }}

            {{ $grade->grader->last_name }}

        @else

            <span class="text-muted">

                {{ __('academy_grades.not_available') }}

            </span>

        @endif

    </td>

    {{-- Grade Date --}}

    <td>

        @if($grade->grade_date)

            {{ \Carbon\Carbon::parse($grade->grade_date)->format('Y-m-d') }}

        @else

            {{ __('academy_grades.not_available') }}

        @endif

    </td>

    {{-- Action --}}
                                        {{-- Action --}}

                                    <td>

                                        <a

                                        href="{{ route('admin.academy_grades.edit',$grade->id) }}"

                                        class="btn btn-sm btn-primary">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form

                                        action="{{ route('admin.academy_grades.destroy',$grade->id) }}"

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

                                    <td colspan="9" class="text-center">

                                        {{ __('general.no_data_found') }}

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                    {{-- Pagination --}}

                    <div class="mt-3">

                        {{ $grades->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
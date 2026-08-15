@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <div class="page-header">

        <h3 class="page-title">

            {{ __('Academy Schedules') }}

        </h3>

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">

                <li class="breadcrumb-item">

                    <a href="{{ route('admin.dashboard') }}">

                        {{ __('Dashboard') }}

                    </a>

                </li>

                <li class="breadcrumb-item">

                    {{ __('Academy') }}

                </li>

                <li class="breadcrumb-item active" aria-current="page">

                    {{ __('Schedules') }}

                </li>

            </ol>

        </nav>

    </div>



    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif



    <div class="card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <h4 class="card-title mb-0">

                    {{ __('Schedules List') }}

                </h4>

                <a

                    href="{{ route('admin.academy_schedules.create') }}"

                    class="btn btn-primary">

                    <i class="mdi mdi-plus"></i>

                    {{ __('Create Schedule') }}

                </a>

            </div>



            <form method="GET">

                <div class="row">

                    <div class="col-md-4 mb-3">

                        <input

                            type="text"

                            name="search"

                            class="form-control"

                            value="{{ request('search') }}"

                            placeholder="{{ __('Search by title...') }}">

                    </div>



                    <div class="col-md-3 mb-3">

                        <select

                            name="status"

                            class="form-control">

                            <option value="">

                                {{ __('All Status') }}

                            </option>

                            <option

                                value="active"

                                {{ request('status')=='active' ? 'selected':'' }}>

                                {{ __('Active') }}

                            </option>

                            <option

                                value="inactive"

                                {{ request('status')=='inactive' ? 'selected':'' }}>

                                {{ __('Inactive') }}

                            </option>

                        </select>

                    </div>



                    <div class="col-md-2 mb-3">

                        <button

                            type="submit"

                            class="btn btn-success w-100">

                            <i class="mdi mdi-magnify"></i>

                            {{ __('Search') }}

                        </button>

                    </div>

                </div>

            </form>



            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>{{ __('Title') }}</th>

                            <th>{{ __('Class') }}</th>

                            <th>{{ __('Teacher') }}</th>

                            <th>{{ __('Day') }}</th>

                            <th>{{ __('Time') }}</th>

                            <th>{{ __('Room') }}</th>

                            <th>{{ __('Status') }}</th>

                            <th width="220">

                                {{ __('Action') }}

                            </th>

                        </tr>

                    </thead>

                    <tbody>
                        @if($schedules->count())

@foreach($schedules as $schedule)

<tr>

    <td>

        {{ $schedule->id }}

    </td>


    <td>

        {{ $schedule->translations->first()?->title ?? '-' }}

    </td>


    <td>

        {{ $schedule->academyClass?->translations->first()?->title ?? '-' }}

    </td>


    <td>

        {{ $schedule->teacher?->first_name }}

        {{ $schedule->teacher?->last_name }}

    </td>


    <td>

        {{ ucfirst($schedule->day_of_week) }}

    </td>


    <td>

        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}

        -

        {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}

    </td>


    <td>

        {{ $schedule->room ?? '-' }}

    </td>


    <td>

        @if($schedule->status=='active')

            <span class="badge badge-success">

                {{ __('Active') }}

            </span>

        @else

            <span class="badge badge-danger">

                {{ __('Inactive') }}

            </span>

        @endif

    </td>


    <td>

        <a

            href="{{ route('admin.academy_schedules.edit',$schedule->id) }}"

            class="btn btn-warning btn-sm">

                <i class="bi bi-pencil"></i>

        </a>



        <a

            href="{{ route('admin.academy_schedules.translation',$schedule->id) }}"

            class="btn btn-info btn-sm">

          <i class="bi bi-translate"></i>


        </a>



      <form

action="{{ route('admin.academy_schedules.destroy',$schedule->id) }}"

method="POST"

style="display:inline-block"
 onsubmit="return confirm('Are you sure?')">

    @csrf
    @method('DELETE')

    <button

        type="submit"

        class="btn btn-danger btn-sm">

        <i class="bi bi-trash"></i>

    </button>

</form>

    </td>

</tr>

@endforeach

@else

<tr>

    <td colspan="9" class="text-center">

        {{ __('No records found.') }}

    </td>

</tr>

@endif
                    </tbody>

                </table>

            </div>



            <div class="mt-4">

                {{ $schedules->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
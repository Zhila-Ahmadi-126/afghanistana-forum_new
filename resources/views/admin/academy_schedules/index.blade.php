@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <div class="page-header">

        <h3 class="page-title">

            {{ __('academy_schedules.title') }}

        </h3>


        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">


                <li class="breadcrumb-item">

                    <a href="{{ route('admin.dashboard') }}">

                        {{ __('academy_schedules.dashboard') }}

                    </a>

                </li>


                <li class="breadcrumb-item">

                    {{ __('academy_schedules.academy') }}

                </li>


                <li class="breadcrumb-item active" aria-current="page">

                    {{ __('academy_schedules.schedules') }}

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

                    {{ __('academy_schedules.list') }}

                </h4>




                <a

                    href="{{ route('admin.academy_schedules.create') }}"

                    class="btn btn-primary">


                    <i class="mdi mdi-plus"></i>


                    {{ __('academy_schedules.create') }}


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

                            placeholder="{{ __('academy_schedules.search_placeholder') }}">



                    </div>






                    <div class="col-md-3 mb-3">


                        <select

                            name="status"

                            class="form-control">



                            <option value="">


                                {{ __('academy_schedules.all_status') }}


                            </option>



                            <option

                                value="active"

                                {{ request('status')=='active' ? 'selected':'' }}>



                                {{ __('academy_schedules.active') }}



                            </option>





                            <option

                                value="inactive"

                                {{ request('status')=='inactive' ? 'selected':'' }}>



                                {{ __('academy_schedules.inactive') }}



                            </option>



                        </select>



                    </div>






                    <div class="col-md-2 mb-3">


                        <button

                            type="submit"

                            class="btn btn-success w-100">


                            <i class="mdi mdi-magnify"></i>


                            {{ __('academy_schedules.search') }}



                        </button>



                    </div>



                </div>


            </form>
           
            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead>

                        <tr>

                            <th>

                                {{ __('academy_schedules.number') }}

                            </th>


                            <th>

                                {{ __('academy_schedules.title_field') }}

                            </th>


                            <th>

                                {{ __('academy_schedules.class') }}

                            </th>


                            <th>

                                {{ __('academy_schedules.teacher') }}

                            </th>


                            <th>

                                {{ __('academy_schedules.day') }}

                            </th>


                            <th>

                                {{ __('academy_schedules.time') }}

                            </th>


                            <th>

                                {{ __('academy_schedules.room') }}

                            </th>


                            <th>

                                {{ __('academy_schedules.status') }}

                            </th>


                            <th width="220">

                                {{ __('academy_schedules.action') }}

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

                {{ __('academy_schedules.active') }}

            </span>


        @else


            <span class="badge badge-danger">

                {{ __('academy_schedules.inactive') }}

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


        {{ __('academy_schedules.no_data') }}


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
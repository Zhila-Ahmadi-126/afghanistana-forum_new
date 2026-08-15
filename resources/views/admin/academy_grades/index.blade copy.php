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

                    <form method="GET"

                    action="{{ route('admin.academy_grades.index') }}">


                        <div class="row mb-3">


                            <div class="col-md-4">


                                <input

                                type="text"

                                name="search"

                                class="form-control"

                                placeholder="Search assignment id..."

                                value="{{ request('search') }}">


                            </div>



                            <div class="col-md-3">


                                <select

                                name="grade_type"

                                class="form-select form-control">


                                    <option value="">

                                        All Types

                                    </option>


                                    <option value="exam"

                                    {{ request('grade_type')=='exam'?'selected':'' }}>

                                        Exam

                                    </option>


                                    <option value="assignment"

                                    {{ request('grade_type')=='assignment'?'selected':'' }}>

                                        Assignment

                                    </option>


                                    <option value="quiz"

                                    {{ request('grade_type')=='quiz'?'selected':'' }}>

                                        Quiz

                                    </option>


                                </select>


                            </div>



                            <div class="col-md-2">


                                <button

                                class="btn btn-secondary">

                                    Search

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

                                        Enrollment

                                    </th>


                                    <th>

                                        Assignment

                                    </th>


                                    <th>

                                        Type

                                    </th>


                                    <th>

                                        Score

                                    </th>


                                    <th>

                                        Feedback

                                    </th>


                                    <th>

                                        Graded By

                                    </th>


                                    <th>

                                        Date

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

                                                --

                                            </span>


                                        @endif


                                    </td>





                                    {{-- Assignment --}}


                                    <td>


                                        @if($grade->assignment)


                                            {{ $grade->assignment->id }}


                                        @else


                                            <span class="text-muted">

                                                --

                                            </span>


                                        @endif


                                    </td>






                                    {{-- Grade Type --}}


                                    <td>


                                        <span class="badge bg-info">


                                            {{ strtoupper($grade->grade_type) }}


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


                                        {{ $grade->feedback ?? '--' }}


                                    </td>








                                    {{-- Graded By --}}


                                   <td>

                                        @if($grade->grader)

                                            {{ $grade->grader->first_name }}

                                            {{ $grade->grader->last_name }}

                                        @else

                                            <span class="text-muted">
                                                --
                                            </span>

                                        @endif

                                        </td>
                                    </td>








                                    {{-- Grade Date --}}


                                    <td>


                                        @if($grade->grade_date)


                                            {{ \Carbon\Carbon::parse($grade->grade_date)->format('Y-m-d') }}


                                        @else


                                            --


                                        @endif


                                    </td>








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
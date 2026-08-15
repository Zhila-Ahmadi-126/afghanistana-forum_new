@extends('layouts.admin')

@section('title')

{{ __('admin.academy_assignments.title') }}

@endsection



@section('content')

<div class="content-wrapper">

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h4 class="card-title mb-0">

                            {{ __('admin.academy_assignments.title') }}

                        </h4>

                        <a

                            href="{{ route('admin.academy_assignments.create') }}"

                            class="btn btn-primary">

                            <i class="mdi mdi-plus"></i>

                            {{ __('admin.academy_assignments.create') }}

                        </a>

                    </div>



                    <form

                        method="GET"

                        action="{{ route('admin.academy_assignments.index') }}">

                        <div class="row mb-4">

                            <div class="col-md-3">

                                <input

                                    type="text"

                                    name="search"

                                    class="form-control"

                                    value="{{ request('search') }}"

                                    placeholder="{{ __('admin.academy_assignments.search') }}">

                            </div>



                            <div class="col-md-3">

                                <select

                                    name="class_id"

                                    class="form-control">

                                    <option value="">

                                        {{ __('admin.academy_assignments.select_class') }}

                                    </option>

                                    @foreach($classes as $class)

                                        <option

                                            value="{{ $class->id }}"

                                            {{ request('class_id')==$class->id ? 'selected':'' }}>

                                            {{ $class->translation?->title ?? ('#'.$class->id) }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>



                            <div class="col-md-3">

                                <select

                                    name="teacher_id"

                                    class="form-control">

                                    <option value="">

                                        {{ __('admin.academy_assignments.select_teacher') }}

                                    </option>

                                    @foreach($teachers as $teacher)

                                        <option

                                            value="{{ $teacher->id }}"

                                            {{ request('teacher_id')==$teacher->id ? 'selected':'' }}>

                                            {{ $teacher->first_name }}

                                            {{ $teacher->last_name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>
                                                        <div class="col-md-2">

                                <select

                                    name="status"

                                    class="form-control">

                                    <option value="">

                                        {{ __('admin.academy_assignments.all_status') }}

                                    </option>

                                    <option

                                        value="active"

                                        {{ request('status')=='active' ? 'selected':'' }}>

                                        {{ __('admin.general.active') }}

                                    </option>

                                    <option

                                        value="inactive"

                                        {{ request('status')=='inactive' ? 'selected':'' }}>

                                        {{ __('admin.general.inactive') }}

                                    </option>

                                </select>

                            </div>



                            <div class="col-md-1">

                                <button

                                    class="btn btn-primary w-100"

                                    type="submit">

                                    <i class="mdi mdi-magnify"></i>

                                </button>

                            </div>

                        </div>

                    </form>





                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>{{ __('admin.academy_assignments.title_column') }}</th>

                                    <th>{{ __('admin.academy_assignments.class') }}</th>

                                    <th>{{ __('admin.academy_assignments.teacher') }}</th>

                                    <th>{{ __('admin.academy_assignments.due_date') }}</th>

                                    <th>{{ __('admin.academy_assignments.attachment') }}</th>

                                    <th>{{ __('admin.academy_assignments.status') }}</th>

                                    <th width="220">

                                        {{ __('admin.general.actions') }}

                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($assignments as $assignment)

                                    <tr>

                                        <td>

                                            {{ $assignment->id }}

                                        </td>

                                        <td>

                                            {{ $assignment->translation?->title ?? '---' }}

                                        </td>

                                        <td>

                                            {{ $assignment->academyClass?->translation?->title ?? '---' }}

                                        </td>

                                        <td>

                                           {{ $assignment->teacher?->first_name }}
                                            {{ $assignment->teacher?->last_name }}

                                        </td>

                                        <td>

                                            {{ $assignment->due_date }}

                                        </td>

                                        <td>

                                            @if($assignment->attachment)

                                                @php
                                                    $file = asset('storage/'.$assignment->attachment);
                                                    $extension = strtolower(pathinfo($assignment->attachment, PATHINFO_EXTENSION));
                                                @endphp


                                                @if(in_array($extension, ['jpg','jpeg','png','gif','webp']))

                                                    <a href="{{ $file }}" target="_blank">

                                                        <img 
                                                            src="{{ $file }}"
                                                            width="80"
                                                            height="60"
                                                            style="object-fit:cover;border-radius:8px;"
                                                        >

                                                    </a>


                                                @elseif($extension == 'pdf')


                                                    <a 
                                                        href="{{ $file }}" 
                                                        target="_blank"
                                                        class="btn btn-sm btn-outline-danger">

                                                        <i class="mdi mdi-file-pdf"></i>

                                                        PDF

                                                    </a>


                                                @else


                                                    <a 
                                                        href="{{ $file }}" 
                                                        target="_blank"
                                                        class="btn btn-sm btn-outline-primary">

                                                        <i class="mdi mdi-file"></i>

                                                        {{ strtoupper($extension) }}

                                                    </a>


                                                @endif


                                            @else

                                                <span class="text-muted">
                                                    {{ __('admin.general.no_file') }}
                                                </span>

                                            @endif


                                            </td>

                                        <td>

                                            @if($assignment->status=='active')

                                                <span class="badge badge-success">

                                                    {{ __('admin.general.active') }}

                                                </span>

                                            @else

                                                <span class="badge badge-danger">

                                                    {{ __('admin.general.inactive') }}

                                                </span>

                                            @endif

                                        </td>
                                                                                <td>

                                            <a

                                                href="{{ route('admin.academy_assignments.translation',$assignment->id) }}"

                                               class="btn btn-info btn-sm"

                                                title="{{ __('admin.general.translation') }}">

                                               <i class="bi bi-translate"></i>

                                            </a>



                                            <a

                                                href="{{ route('admin.academy_assignments.edit',$assignment->id) }}"

                                                class="btn btn-warning btn-sm"

                                                title="{{ __('admin.general.edit') }}">

                                               

                                                 <i class="bi bi-pencil"></i>

                                            </a>



                                            <form

                                                action="{{ route('admin.academy_assignments.destroy',$assignment->id) }}"

                                                method="POST"

                                                class="d-inline"

                                                onsubmit="return confirm('Are you sure?')">

                                                @csrf
                                                @method('DELETE')

                                                <button

                                                    type="submit"

                                                   class="btn btn-danger btn-sm"

                                                    title="{{ __('admin.general.delete') }}">

                                                     <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td

                                            colspan="8"

                                            class="text-center">

                                            {{ __('admin.general.no_data_found') }}

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>



                    <div class="mt-4">

                        {{ $assignments->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
@extends('layouts.admin')

@section('content')


<div class="content-wrapper">


    {{-- HEADER --}}

    <div class="row mb-3">


        <div class="col-md-6">


            <h3 class="font-weight-bold">

                Audit Logs

            </h3>


            <p class="text-muted">

                Monitor all system activities

            </p>


        </div>


    </div>





    {{-- FILTER BAR --}}


    <div class="card mb-3">


        <div class="card-body">



            <form method="GET">


                <div class="row align-items-center">





                    {{-- SEARCH --}}


                    <div class="col-md-5 mb-2">


                        <input

                            type="text"

                            name="search"

                            value="{{ request('search') }}"

                            class="form-control"

                            placeholder="Search admin, module, record..."

                        >


                    </div>







                    {{-- MODULE --}}


                    <div class="col-md-3 mb-2">


                        <select

                            name="module"

                            class="form-control">



                            <option value="">

                                All Modules

                            </option>




                            <option value="Users"

                            {{ request('module')=='Users'?'selected':'' }}>

                                Users

                            </option>




                            <option value="News"

                            {{ request('module')=='News'?'selected':'' }}>

                                News

                            </option>




                            <option value="Languages"

                            {{ request('module')=='Languages'?'selected':'' }}>

                                Languages

                            </option>



                        </select>


                    </div>








                    {{-- ACTION --}}


                    <div class="col-md-2 mb-2">


                        <select

                            name="action_type"

                            class="form-control">



                            <option value="">

                                Actions

                            </option>



                            <option value="insert"

                            {{ request('action_type')=='insert'?'selected':'' }}>

                                Insert

                            </option>



                            <option value="update"

                            {{ request('action_type')=='update'?'selected':'' }}>

                                Update

                            </option>




                            <option value="delete"

                            {{ request('action_type')=='delete'?'selected':'' }}>

                                Delete

                            </option>



                        </select>


                    </div>


                    {{-- START DATE --}}

                        <div class="col-md-2 mb-2">

                            <label class="small">
                                From Date
                            </label>

                            <input
                                type="date"
                                name="start_date"
                                value="{{ request('start_date') }}"
                                class="form-control"
                            >

                        </div>




                        {{-- END DATE --}}

                        <div class="col-md-2 mb-2">

                            <label class="small">
                                To Date
                            </label>

                            <input
                                type="date"
                                name="end_date"
                                value="{{ request('end_date') }}"
                                class="form-control"
                            >

                        </div>








                    {{-- BUTTON --}}


                    <div class="col-md-2 mb-2">


                        <button

                            type="submit"

                            class="btn btn-info btn-block">


                            Search


                        </button>


                    </div>





                </div>


            </form>


        </div>


    </div>





    {{-- TABLE --}}


    <div class="card">


        <div class="card-body">


            <div class="table-responsive">


                <table class="table table-hover">


                    <thead>


                        <tr>


                            <th>#</th>

                            <th>Admin</th>

                            <th>Role</th>

                            <th>Table</th>

                            <th>Action</th>

                            <th>Module</th>

                            <th>Record ID</th>

                            <th>Record Title</th>

                            <th>Description</th>

                            <th>Changed Fields</th>
                            <th>Old Data</th>
                            <th>New Data</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                            <th>Created At</th>


                        </tr>


                    </thead>



                    <tbody>
                    @foreach($logs as $key => $log)


                    <tr>



                        {{-- NUMBER --}}

                        <td>

                            {{ $logs->firstItem() + $key }}

                        </td>







                        {{-- ADMIN NAME --}}

                        <td>


                            {{ $log->admin_name ?? '-' }}

                            {{ $log->admin_lastname ?? '' }}


                        </td>







                        {{-- ROLE --}}

                        <td>


                            <span class="badge badge-primary">


                                {{ $log->admin_role ?? '-' }}


                            </span>


                        </td>








                        {{-- TABLE --}}

                        <td>


                            {{ $log->table_name ?? '-' }}


                        </td>








                        {{-- ACTION --}}

                        <td>



                            @if($log->action_type == 'insert')


                                <span class="badge badge-success">

                                    Insert

                                </span>



                            @elseif($log->action_type == 'update')


                                <span class="badge badge-warning">

                                    Update

                                </span>



                            @elseif($log->action_type == 'delete')


                                <span class="badge badge-danger">

                                    Delete

                                </span>



                            @else


                                <span class="badge badge-secondary">

                                    {{ $log->action_type }}

                                </span>


                            @endif



                        </td>









                        {{-- MODULE --}}

                        <td>


                            {{ $log->module ?? '-' }}


                        </td>








                        {{-- RECORD ID --}}

                        <td>


                            {{ $log->record_id ?? '-' }}


                        </td>









                        {{-- RECORD TITLE --}}

                        <td>


                            {{ $log->record_title ?? '-' }}


                        </td>









                        {{-- DESCRIPTION --}}

                        <td>


                            {{ $log->description ?? '-' }}


                        </td>
                        {{-- CHANGED FIELDS --}}

                            <td style="min-width:200px;">

                                <pre class="mb-0 small">
                            {{ $log->changed_fields ? json_encode($log->changed_fields, JSON_PRETTY_PRINT) : '-' }}
                                </pre>

                            </td>




                            {{-- OLD DATA --}}

                            <td style="min-width:250px;">

                                <pre class="mb-0 small">
                            {{ $log->old_data ? json_encode($log->old_data, JSON_PRETTY_PRINT) : '-' }}
                                </pre>

                            </td>





                            {{-- NEW DATA --}}

                            <td style="min-width:250px;">

                                <pre class="mb-0 small">
                            {{ $log->new_data ? json_encode($log->new_data, JSON_PRETTY_PRINT) : '-' }}
                                </pre>

                            </td>






                            {{-- IP ADDRESS --}}

                            <td>

                                {{ $log->ip_address ?? '-' }}

                            </td>







                            {{-- USER AGENT --}}

                            <td style="min-width:300px;">

                                {{ $log->user_agent ?? '-' }}

                            </td>







                            {{-- CREATED AT --}}

                            <td>

                                {{ $log->created_at }}

                            </td>







                    </tr>



                    @endforeach



                    </tbody>



                </table>



            </div>

                {{-- PAGINATION --}}

               <div class="d-flex justify-content-between align-items-center mt-3">


                        {{-- CLEAN LOGS --}}

                        @if(auth()->user()->role == 'super_admin')


                        <form action="{{ route('admin.audit_logs.clean') }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete these audit logs?')">

                            @csrf

                            @method('DELETE')


                            <input 
                                type="hidden"
                                name="start_date"
                                value="{{ request('start_date') }}">


                            <input 
                                type="hidden"
                                name="end_date"
                                value="{{ request('end_date') }}">



                            <button class="btn btn-danger">

                                <i class="bi bi-trash"></i>

                                Clean Logs

                            </button>


                        </form>


                        @endif





                        {{-- PAGINATION --}}

                        <div>

                            {{ $logs->links() }}

                        </div>


                    </div>



            </div>


        </div>


    </div>



</div>



@endsection
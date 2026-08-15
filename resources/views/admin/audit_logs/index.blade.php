@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    {{-- HEADER --}}

    <div class="row mb-3">

        <div class="col-md-6">

            <h3 class="font-weight-bold">

                {{ __('audit_logs.title') }}

            </h3>

            <p class="text-muted">

                {{ __('audit_logs.subtitle') }}

            </p>

        </div>

    </div>



    {{-- FILTER BAR --}}

    <div class="card mb-3">

        <div class="card-body">

            <form method="GET">

                <div class="row align-items-center">

                    {{-- SEARCH --}}

                    <div class="col-md-3 mt-3">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="{{ __('audit_logs.search_placeholder') }}">

                    </div>



                    {{-- MODULE --}}

                    <div class="col-md-2 mt-3">

                        <select
                            name="module"
                            class="form-control">

                            <option value="">

                                {{ __('audit_logs.all_modules') }}

                            </option>

                            <option
                                value="Users"
                                {{ request('module')=='Users'?'selected':'' }}>

                                {{ __('audit_logs.users') }}

                            </option>

                            <option
                                value="News"
                                {{ request('module')=='News'?'selected':'' }}>

                                {{ __('audit_logs.news') }}

                            </option>

                            <option
                                value="Languages"
                                {{ request('module')=='Languages'?'selected':'' }}>

                                {{ __('audit_logs.languages') }}

                            </option>

                        </select>

                    </div>



                    {{-- ACTION --}}

                    <div class="col-md-2 mt-3">

                        <select
                            name="action_type"
                            class="form-control">

                            <option value="">

                                {{ __('audit_logs.actions') }}

                            </option>

                            <option
                                value="insert"
                                {{ request('action_type')=='insert'?'selected':'' }}>

                                {{ __('audit_logs.insert') }}

                            </option>

                            <option
                                value="update"
                                {{ request('action_type')=='update'?'selected':'' }}>

                                {{ __('audit_logs.update') }}

                            </option>

                            <option
                                value="delete"
                                {{ request('action_type')=='delete'?'selected':'' }}>

                                {{ __('audit_logs.delete') }}

                            </option>

                        </select>

                    </div>
                    <br>


                        
                    {{-- START DATE --}}

                    <div class="col-md-2 mb-2">

                        <label class="small">

                            {{ __('audit_logs.from_date') }}

                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ request('start_date') }}"
                            class="form-control">

                    </div>



                    {{-- END DATE --}}

                    <div class="col-md-2 mb-2">

                        <label class="small">

                            {{ __('audit_logs.to_date') }}

                        </label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ request('end_date') }}"
                            class="form-control">

                    </div>



                    {{-- BUTTON --}}

                    <div class="col-md-1 p-0  mt-3">

                        <button
                            type="submit"
                            class="btn btn-warning btn-block">

                            {{ __('general.search') }}

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

                            <th>{{ __('audit_logs.admin') }}</th>

                            <th>{{ __('audit_logs.role') }}</th>

                            <th>{{ __('audit_logs.table') }}</th>

                            <th>{{ __('audit_logs.action') }}</th>

                            <th>{{ __('audit_logs.module') }}</th>

                            <th>{{ __('audit_logs.record_id') }}</th>

                            <th>{{ __('audit_logs.record_title') }}</th>

                            <th>{{ __('audit_logs.description') }}</th>

                            <th>{{ __('audit_logs.changed_fields') }}</th>

                            <th>{{ __('audit_logs.old_data') }}</th>

                            <th>{{ __('audit_logs.new_data') }}</th>

                            <th>{{ __('audit_logs.ip_address') }}</th>

                            <th>{{ __('audit_logs.user_agent') }}</th>

                            <th>{{ __('audit_logs.created_at') }}</th>

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

                                    {{ __('audit_logs.insert') }}

                                </span>

                            @elseif($log->action_type == 'update')

                                <span class="badge badge-warning">

                                    {{ __('audit_logs.update') }}

                                </span>

                            @elseif($log->action_type == 'delete')

                                <span class="badge badge-danger">

                                    {{ __('audit_logs.delete') }}

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

                        <td style="min-width:220px;">

                            <pre class="mb-0 small p-2 rounded border bg-body text-body"
style="white-space:pre-wrap;word-break:break-word;overflow:auto;">{{ $log->changed_fields ? json_encode($log->changed_fields, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '-' }}</pre>

                        </td>



                        {{-- OLD DATA --}}

                        <td style="min-width:260px;">

                            <pre class="mb-0 small p-2 rounded border bg-body text-body"
style="white-space:pre-wrap;word-break:break-word;overflow:auto;">{{ $log->old_data ? json_encode($log->old_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '-' }}</pre>

                        </td>



                        {{-- NEW DATA --}}

                        <td style="min-width:260px;">

                            <pre class="mb-0 small p-2 rounded border bg-body text-body"
style="white-space:pre-wrap;word-break:break-word;overflow:auto;">{{ $log->new_data ? json_encode($log->new_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '-' }}</pre>

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


                        {{ __('audit_logs.clean_logs') }}


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



@endsection
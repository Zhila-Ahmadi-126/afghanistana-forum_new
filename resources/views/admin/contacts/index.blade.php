@extends('layouts.admin')

@section('title')

    {{ __('contacts.menu') }}

@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    {{-- Header --}}

                    <div class="d-flex justify-content-between mb-4">

                        <h4>

                            {{ __('contacts.menu') }}

                        </h4>

                    </div>


                    {{-- Search & Filter --}}

                    <form
                        method="GET"
                        action="{{ route('admin.contacts.index') }}">

                        <div class="row mb-3">

                            {{-- Search --}}

                            <div class="col-md-4">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="{{ __('contacts.search_placeholder') }}"
                                    value="{{ request('search') }}">

                            </div>


                            {{-- Status --}}

                            <div class="col-md-3">

                                <select
                                    name="status"
                                    class="form-select form-control">

                                    <option value="">

                                        {{ __('general.all_status') }}

                                    </option>

                                    <option
                                        value="unread"
                                        {{ request('status') == 'unread' ? 'selected' : '' }}>

                                        {{ __('contacts.unread') }}

                                    </option>

                                    <option
                                        value="read"
                                        {{ request('status') == 'read' ? 'selected' : '' }}>

                                        {{ __('contacts.read') }}

                                    </option>

                                    <option
                                        value="replied"
                                        {{ request('status') == 'replied' ? 'selected' : '' }}>

                                        {{ __('contacts.replied') }}

                                    </option>

                                </select>

                            </div>


                            {{-- Search Button --}}

                            <div class="col-md-2">

                                <button
                                    type="submit"
                                    class="btn btn-secondary">

                                    {{ __('general.search') }}

                                </button>

                            </div>

                        </div>

                    </form>


                    {{-- Table --}}

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>
                                        {{ __('contacts.name') }}
                                    </th>

                                    <th>
                                        {{ __('contacts.email') }}
                                    </th>

                                    <th>
                                        {{ __('contacts.subject') }}
                                    </th>

                                    <th>
                                        {{ __('contacts.message') }}
                                    </th>

                                    <th>
                                        {{ __('contacts.status') }}
                                    </th>

                                    <th>
                                        {{ __('contacts.date') }}
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                            @forelse($contacts as $contact)

                                <tr>

                                    {{-- ID --}}

                                    <td>

                                        {{ $contact->id }}

                                    </td>


                                    {{-- Name --}}

                                    <td>

                                        {{ $contact->name }}

                                    </td>


                                    {{-- Email --}}

                                    <td>

                                        {{ $contact->email }}

                                    </td>


                                    {{-- Subject --}}

                                    <td>

                                        {{ $contact->subject }}

                                    </td>


                                    {{-- Message --}}

                                    <td style="max-width: 350px;">

                                        <textarea
                                            class="form-control"
                                            rows="3"
                                            readonly>{{ $contact->message }}</textarea>

                                    </td>


                                    {{-- Status --}}

                                    <td>

                                        @if($contact->status == 'unread')

                                            <span class="badge bg-warning">

                                                {{ __('contacts.unread') }}

                                            </span>

                                        @elseif($contact->status == 'read')

                                            <span class="badge bg-success">

                                                {{ __('contacts.read') }}

                                            </span>

                                        @elseif($contact->status == 'replied')

                                            <span class="badge bg-primary">

                                                {{ __('contacts.replied') }}

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Date --}}

                                    <td>

                                        {{ $contact->created_at?->format('Y-m-d H:i') }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="text-center">

                                        {{ __('general.no_data_found') }}

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}

                    <div class="mt-3">

                        {{ $contacts->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
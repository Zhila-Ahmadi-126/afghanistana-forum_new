@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- PAGE HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">
                Archive Members
            </h4>

            <p class="text-muted mb-0">
                Manage archive members
            </p>
        </div>

        <div>
            <a href="{{ route('admin.archive_members.create') }}"
               class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>

                Add Member

            </a>
        </div>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}

            <button type="button"
                    class="close"
                    data-dismiss="alert">

                <span>&times;</span>

            </button>

        </div>

    @endif


    {{-- FILTERS --}}
    <div class="card mb-4">

        <div class="card-body">

            <form method="GET"
                  action="{{ route('admin.archive_members.index') }}">

                <div class="row">

                    {{-- SEARCH --}}
                    <div class="col-md-4 mb-3">

                        <label>
                            Search
                        </label>

                        <input type="text"
                               name="search"
                               class="form-control"
                               value="{{ request('search') }}"
                               placeholder="Search by name, email or phone">

                    </div>


                    {{-- SECTION --}}
                    <div class="col-md-3 mb-3">

                        <label>
                            Section
                        </label>

                        <select name="section"
                                class="form-control">

                            <option value="">
                                All Sections
                            </option>

                            @foreach($sections as $section)

                                <option value="{{ $section }}"
                                    {{ request('section') == $section ? 'selected' : '' }}>

                                    {{ $section }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- COUNTRY --}}
                    <div class="col-md-3 mb-3">

                        <label>
                            Country
                        </label>

                        <select name="country"
                                class="form-control">

                            <option value="">
                                All Countries
                            </option>

                            @foreach($countries as $country)

                                <option value="{{ $country }}"
                                    {{ request('country') == $country ? 'selected' : '' }}>

                                    {{ $country }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- BUTTONS --}}
                    <div class="col-md-2 mb-3 d-flex align-items-end">

                        <button type="submit"
                                class="btn btn-primary mr-2">

                            Search

                        </button>

                        <a href="{{ route('admin.archive_members.index') }}"
                           class="btn btn-light">

                            Reset

                        </a>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- MEMBERS TABLE --}}
    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Photo
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Section
                            </th>

                            <th>
                                Position
                            </th>

                            <th>
                                Country
                            </th>

                            <th>
                                Contact
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($members as $member)

                            <tr>

                                {{-- ID --}}
                                <td>
                                    {{ $member->id }}
                                </td>


                                {{-- PHOTO --}}
                                <td>

                                    @if($member->photo)

                                      <img src="{{ asset(ltrim($member->photo, '/')) }}"
                                        alt="{{ $member->name }}"
                                        style="width:50px;height:50px;object-fit:cover;border-radius:50%;">
                                    @else

                                        <div style="
                                            width:50px;
                                            height:50px;
                                            border-radius:50%;
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            background:#f1f3f5;
                                        ">

                                            <i class="mdi mdi-account"
                                               style="font-size:24px;"></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- NAME --}}
                                <td>

                                    <strong>
                                        {{ $member->name }}
                                    </strong>

                                    @if($member->surname)

                                        <br>

                                        <small class="text-muted">
                                            {{ $member->surname }}
                                        </small>

                                    @endif

                                </td>


                                {{-- SECTION --}}
                                <td>

                                    {{ $member->section }}

                                </td>


                                {{-- POSITION --}}
                                <td>

                                    {{ $member->position ?? '—' }}

                                </td>


                                {{-- COUNTRY --}}
                                <td>

                                    {{ $member->country ?? '—' }}

                                </td>


                                {{-- CONTACT --}}
                                <td>

                                    @if($member->email)

                                        <div>
                                            <small>
                                                {{ $member->email }}
                                            </small>
                                        </div>

                                    @endif

                                    @if($member->phone)

                                        <div>
                                            <small>
                                                {{ $member->phone }}
                                            </small>
                                        </div>

                                    @endif

                                    @if(!$member->email && !$member->phone)

                                        <span class="text-muted">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- ACTIONS --}}
                                <td>

                                    <a href="{{ route('admin.archive_members.edit', $member->id) }}"
                                       class="btn btn-sm btn-outline-primary">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    <form action="{{ route('admin.archive_members.destroy', $member->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                onclick="return confirm('Are you sure you want to delete this member?')">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center py-5">

                                    <div class="text-muted">

                                        No archive members found.

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- PAGINATION --}}
            <div class="mt-4">

                {{ $members->links() }}

            </div>

        </div>

    </div>

</div>

@endsection
@extends('layouts.admin')
<style>
/* ==========================
   TABLE HOVER FIX
========================== */


.table tbody tr {
    transition: all .2s ease;
}


.table tbody tr:hover {

    background: rgba(52, 49, 49, 0.18) !important;

}


/* Dark Mode Table Hover */

.dark .table tbody tr:hover {

    background: rgba(74, 68, 68, 0.12) !important;

}
/* ==========================
   DARK MODE SELECT FILTER FIX
========================== */


.dark select.form-control {

    color: #fff !important;

    background-color: rgba(255,255,255,0.08) !important;

}



.dark select.form-control option {

    background-color: #1f1f1f !important;

    color: #fff !important;

}



.dark select.form-control option:hover {

    background-color: #333 !important;

    color: #fff !important;

}



/* Light Mode */

select.form-control option {

    color: #000;

    background-color: #fff;

}
</style>
@section('content')

<div class="content-wrapper">

    {{-- HEADER --}}
    <div class="row mb-3">

        <div class="col-md-6">
            <h3 class="font-weight-bold">Administrators</h3>
            <p class="text-muted">Manage system administrators</p>
        </div>

        <div class="col-md-6 text-md-right">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                + Add New Administrator
            </a>
        </div>

    </div>

    {{-- FILTER BAR --}}
    <div class="card mb-3">

        <div class="card-body">

            <form id="filterForm">

                <div class="row align-items-center">

                    {{-- SEARCH --}}
                    <div class="col-md-5 mb-2">

                        <input
                            type="text"
                            name="search"
                            id="searchInput"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="Search name, email, username..."
                        >

                    </div>

                    {{-- ROLE --}}
                    <div class="col-md-3 mb-2">

                        <select name="role" class="form-control">

                            <option value="">All Roles</option>

                            <option value="admin"
                                {{ request('role') == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="super_admin"
                                {{ request('role') == 'super_admin' ? 'selected' : '' }}>
                                Super Admin
                            </option>

                        </select>

                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-2 mb-2">

                        <select name="status" class="form-control">

                            <option value="">Status</option>

                            <option value="active"
                                {{ request('status') == 'active' ? 'selected' : '' }}>
                                Active
                            </option>

                            <option value="inactive"
                                {{ request('status') == 'inactive' ? 'selected' : '' }}>
                                Inactive
                            </option>

                        </select>

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-md-2 mb-2">

                        <button type="submit" class="btn btn-info btn-block">
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
                            <th>Avatar</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Last Login</th>
                            <th>Created At</th>
                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>@foreach($users as $key => $user)

<tr>

    {{-- ROW NUMBER --}}
    <td>
        {{ $users->firstItem() + $key }}
    </td>

    {{-- AVATAR --}}
    <td>

     @if($user->avatar)

        <img
            src="{{ asset('storage/'.$user->avatar) }}"
            class="img-fluid rounded-circle">

    @else

        <img
            src="{{ asset('storage/avatar/default.png') }}"
            class="img-fluid rounded-circle">

    @endif

    </td>

    {{-- FULL NAME --}}
    <td>
        {{ $user->first_name }} {{ $user->last_name }}
    </td>

    {{-- USERNAME --}}
    <td>
        {{ $user->username }}
    </td>

    {{-- EMAIL --}}
    <td>
        {{ $user->email }}
    </td>

    {{-- PHONE --}}
    <td>
        {{ $user->phone ?? '-' }}
    </td>

    {{-- ROLE --}}
    <td>

        <span class="badge badge-primary">
            {{ ucfirst($user->role) }}
        </span>

    </td>

    {{-- STATUS --}}
    <td>

        @if($user->status == 'active')

            <span class="badge badge-success">
                Active
            </span>

        @else

            <span class="badge badge-danger">
                Inactive
            </span>

        @endif

    </td>

    {{-- LAST LOGIN --}}
    <td>
        {{ $user->last_login ?? '-' }}
    </td>

    {{-- CREATED --}}
    <td>
        {{ $user->created_at }}
    </td>

    {{-- ACTIONS --}}
    <td>

       
       <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">
            Edit
        </a>

       <form action="{{ route('admin.users.destroy', $user->id) }}"
            method="POST">

            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('Delete this user?')">

                Delete

    </button>

</form>
    </td>

</tr>

@endforeach

</tbody>

</table>

</div>

{{-- PAGINATION --}}
<div class="d-flex justify-content-end mt-3">

    {{ $users->links() }}

</div>

</div>

</div>

</div>

@endsection
@push('scripts')

<script>

document.addEventListener("DOMContentLoaded", function () {

    const searchInput = document.getElementById("searchInput");

    if (!searchInput) return;

    searchInput.addEventListener("keyup", function () {

        let search = this.value;

        fetch("{{ route('admin.users.ajax') }}?search=" + encodeURIComponent(search))

            .then(response => response.json())

            .then(users => {

                let tableBody = document.querySelector("tbody");

                tableBody.innerHTML = "";

                users.forEach((user, index) => {

                    tableBody.innerHTML += `
                    <tr>

                        <td>${index + 1}</td>

                        <td>
                            <img
                                src="/dashboard/images/faces/face1.jpg"
                                width="35"
                                class="rounded-circle">
                        </td>

                        <td>${user.first_name ?? ''} ${user.last_name ?? ''}</td>

                        <td>${user.username ?? '-'}</td>

                        <td>${user.email ?? '-'}</td>

                        <td>${user.phone ?? '-'}</td>

                        <td>
                            <span class="badge badge-primary">
                                ${user.role ?? '-'}
                            </span>
                        </td>

                        <td>

                            ${
                                user.status === 'active'

                                ? '<span class="badge badge-success">Active</span>'

                                : '<span class="badge badge-danger">Inactive</span>'
                            }

                        </td>

                        <td>${user.last_login ?? '-'}</td>

                        <td>${user.created_at ?? '-'}</td>

                        <td>

                            <button class="btn btn-sm btn-info">
                                View
                            </button>

                            <button class="btn btn-sm btn-warning">
                                Edit
                            </button>

                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>

                        </td>

                    </tr>
                    `;

                });

            })

            .catch(error => {

                console.error(error);

            });

    });

});

</script>

@endpush
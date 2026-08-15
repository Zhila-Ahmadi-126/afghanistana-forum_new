@extends('layouts.admin')
<style>
/* تمام بخش style بدون تغییر */
</style>

@section('content')

<div class="content-wrapper">

    {{-- HEADER --}}
    <div class="row mb-3">

        <div class="col-md-6">

            <h3 class="font-weight-bold">
                {{ __('languages.languages') }}
            </h3>

            <p class="text-muted">
                {{ __('languages.manage_system_languages') }}
            </p>

        </div>

        <div class="col-md-6 text-md-right">

            <a href="{{ route('admin.languages.create') }}"
               class="btn btn-primary">

                + {{ __('languages.add_new_language') }}

            </a>

        </div>

    </div>

    {{-- FILTER BAR --}}
    <div class="card mb-3">

        <div class="card-body">

            <form id="filterForm">

                <div class="row align-items-center">

                    {{-- SEARCH --}}
                    <div class="col-md-6 mb-2">

                        <input
                            type="text"
                            name="search"
                            id="searchInput"
                            value="{{ request('search') }}"
                            class="form-control"
                            placeholder="{{ __('languages.search_placeholder') }}"
                        >

                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-3 mb-2">

                        <select name="status"
                                class="form-control">

                            <option value="">
                                {{ __('languages.all_status') }}
                            </option>

                            <option value="active"
                                {{ request('status') == 'active' ? 'selected' : '' }}>

                                {{ __('languages.active') }}

                            </option>

                            <option value="inactive"
                                {{ request('status') == 'inactive' ? 'selected' : '' }}>

                                {{ __('languages.inactive') }}

                            </option>

                        </select>

                    </div>

                    {{-- BUTTON --}}
                    <div class="col-md-3 mb-2">

                        <button type="submit"
                                class="btn btn-info btn-block">

                            {{ __('languages.search') }}

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

                            <th>{{ __('languages.name') }}</th>

                            <th>{{ __('languages.code') }}</th>

                            <th>{{ __('languages.status') }}</th>

                            <th>{{ __('languages.sort_order') }}</th>

                            <th>{{ __('languages.created_at') }}</th>

                            <th>{{ __('languages.actions') }}</th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($languages as $key => $language)

                        <tr>

                            <td>
                                {{ $languages->firstItem() + $key }}
                            </td>

                            <td>
                                {{ $language->name }}
                            </td>

                            <td>

                                <span class="badge badge-primary">
                                    {{ strtoupper($language->code) }}
                                </span>

                            </td>
                                                        {{-- STATUS --}}
                            <td>

                                @if($language->status == 'active')

                                    <span class="badge badge-success">
                                        {{ __('languages.active') }}
                                    </span>

                                @else

                                    <span class="badge badge-danger">
                                        {{ __('languages.inactive') }}
                                    </span>

                                @endif

                            </td>

                            {{-- SORT ORDER --}}
                            <td>

                                {{ $language->sort_order ?? 0 }}

                            </td>

                            {{-- CREATED --}}
                            <td>

                                {{ $language->created_at }}

                            </td>

                            {{-- ACTIONS --}}
                            <td>

                                <a href="{{ route('admin.languages.edit', $language->id) }}"
                                   class="btn btn-sm btn-warning">

                                    {{ __('languages.edit') }}

                                </a>

                                <form action="{{ route('admin.languages.destroy', $language->id) }}"
                                      method="POST"
                                      style="display:inline-block;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                             onclick="return confirm('Delete this user?')">

                                        {{ __('languages.delete') }}

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

                {{ $languages->links() }}

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

        fetch("{{ route('admin.languages.ajax') }}?search=" + encodeURIComponent(search))

            .then(response => response.json())

            .then(languages => {

                let tableBody = document.querySelector("tbody");

                tableBody.innerHTML = "";

                languages.forEach((language, index) => {                    tableBody.innerHTML += `

                    <tr>

                        <td>
                            ${index + 1}
                        </td>

                        <td>
                            ${language.name ?? '-'}
                        </td>

                        <td>

                            <span class="badge badge-primary">

                                ${(language.code ?? '-').toUpperCase()}

                            </span>

                        </td>

                        <td>

                            ${
                                language.status === 'active'

                                ? '<span class="badge badge-success">{{ __("languages.active") }}</span>'

                                : '<span class="badge badge-danger">{{ __("languages.inactive") }}</span>'

                            }

                        </td>

                        <td>

                            ${language.sort_order ?? 0}

                        </td>

                        <td>

                            ${language.created_at ?? '-'}

                        </td>

                        <td>

                            <a href="/admin/languages/edit/${language.id}"
                               class="btn btn-sm btn-warning">

                                {{ __('languages.edit') }}

                            </a>

                            <form action="/admin/languages/destroy/${language.id}"
                                  method="POST"
                                  style="display:inline-block;">

                                @csrf

                                <input type="hidden"
                                       name="_method"
                                       value="DELETE">

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('{{ __('languages.delete_confirm') }}')">

                                    {{ __('languages.delete') }}

                                </button>

                            </form>

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
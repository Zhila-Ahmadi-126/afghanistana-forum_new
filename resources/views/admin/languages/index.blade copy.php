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

            <h3 class="font-weight-bold">
                Languages
            </h3>

            <p class="text-muted">
                Manage system languages
            </p>

        </div>


        <div class="col-md-6 text-md-right">

            <a href="{{ route('admin.languages.create') }}"
               class="btn btn-primary">

                + Add New Language

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

                            placeholder="Search language name or code..."

                        >


                    </div>



                    {{-- STATUS --}}
                    <div class="col-md-3 mb-2">


                        <select name="status"
                                class="form-control">


                            <option value="">
                                All Status
                            </option>


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
                    <div class="col-md-3 mb-2">


                        <button type="submit"
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

                            <th>Name</th>

                            <th>Code</th>

                            <th>Status</th>

                            <th>Sort Order</th>

                            <th>Created At</th>

                            <th>Actions</th>


                        </tr>


                    </thead>



                    <tbody>


                    @foreach($languages as $key => $language)


                        <tr>


                            {{-- ROW NUMBER --}}

                            <td>

                                {{ $languages->firstItem() + $key }}

                            </td>




                            {{-- NAME --}}

                            <td>

                                {{ $language->name }}

                            </td>




                            {{-- CODE --}}

                            <td>

                                <span class="badge badge-primary">

                                    {{ strtoupper($language->code) }}

                                </span>


                            </td>





                            {{-- STATUS --}}

                            <td>


                                @if($language->status == 'active')


                                    <span class="badge badge-success">

                                        Active

                                    </span>


                                @else


                                    <span class="badge badge-danger">

                                        Inactive

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


                                    Edit


                                </a>





                                <form action="{{ route('admin.languages.destroy', $language->id) }}"

                                      method="POST"

                                      style="display:inline-block;">


                                    @csrf

                                    @method('DELETE')



                                    <button type="submit"

                                            class="btn btn-sm btn-danger"

                                            onclick="return confirm('Delete this language?')">


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




                languages.forEach((language, index) => {



                    tableBody.innerHTML += `


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

                                ?

                                '<span class="badge badge-success">Active</span>'

                                :

                                '<span class="badge badge-danger">Inactive</span>'

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


                                Edit


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

                                        onclick="return confirm('Delete this language?')">


                                    Delete


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
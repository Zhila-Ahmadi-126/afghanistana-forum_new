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
                News
            </h3>

            <p class="text-muted">
                Manage News and Articles
            </p>

        </div>

        <div class="col-md-6 text-md-right">

            <a href="{{ route('admin.news.create') }}"
               class="btn btn-primary">

                + Add New News

            </a>

        </div>

    </div>


    {{-- FILTER --}}
    <div class="card mb-3">

        <div class="card-body">

            <form id="filterForm">

                <div class="row align-items-center">

                    {{-- SEARCH --}}
                    <div class="col-md-4 mb-2">

                        <input
                            type="text"
                            id="searchInput"
                            name="search"
                            class="form-control"
                            placeholder="Search news..."
                            value="{{ request('search') }}">

                    </div>


                    {{-- STATUS --}}
                    <div class="col-md-2 mb-2">

                        <select
                            name="status"
                            class="form-control">

                            <option value="">
                                All Status
                            </option>

                            <option value="draft"
                                {{ request('status')=='draft' ? 'selected' : '' }}>

                                Draft

                            </option>

                            <option value="published"
                                {{ request('status')=='published' ? 'selected' : '' }}>

                                Published

                            </option>

                            <option value="archived"
                                {{ request('status')=='archived' ? 'selected' : '' }}>

                                Archived

                            </option>

                        </select>

                    </div>


                    {{-- MEDIA TYPE --}}
                    <div class="col-md-2 mb-2">

                        <select
                            name="media_type"
                            class="form-control">

                            <option value="">
                                All Media
                            </option>

                            <option value="text"
                                {{ request('media_type')=='text' ? 'selected' : '' }}>

                                Text

                            </option>

                            <option value="image"
                                {{ request('media_type')=='image' ? 'selected' : '' }}>

                                Image

                            </option>

                            <option value="video"
                                {{ request('media_type')=='video' ? 'selected' : '' }}>

                                Video

                            </option>

                            <option value="mixed"
                                {{ request('media_type')=='mixed' ? 'selected' : '' }}>

                                Mixed

                            </option>

                        </select>

                    </div>


                    {{-- LANGUAGE --}}
                    <div class="col-md-2 mb-2">

                        <select
                            name="language"
                            class="form-control">

                            <option value="en">English</option>

                            <option value="fa">Persian</option>

                            <option value="ps">Pashto</option>

                        </select>

                    </div>


                    {{-- BUTTON --}}
                    <div class="col-md-2 mb-2">

                        <button
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

                            <th>Image</th>

                            

                           

                            <th>Creator</th>

                            <th>Status</th>

                            <th>Media</th>

                            <th>Source</th>

                            <th>Published</th>

                            <th>Created</th>

                            <th>Actions</th>

                        </tr>

                    </thead>

                    <tbody>
                        @foreach($news as $key => $item)

<tr>

    {{-- ROW NUMBER --}}
    <td>
        {{ $news->firstItem() + $key }}
    </td>

    {{-- FEATURED IMAGE --}}
    <td>

      @if($item->featured_image)

    <img src="{{ asset('dashboard/images/news/' . $item->featured_image) }}"
         width="70"
         height="70"
         style="object-fit:cover;border-radius:10px;">

@else

      <img
                src="{{ asset('dashboard/images/no-image.png') }}"
                width="45"
                height="45"
                class="rounded">


@endif

          

    </td>

  
   
    {{-- CREATOR --}}
    <td>

        {{ optional($item->creator)->first_name }}
        {{ optional($item->creator)->last_name }}

    </td>

    {{-- STATUS --}}
    <td>

        @if($item->status=='published')

            <span class="badge badge-success">
                Published
            </span>

        @elseif($item->status=='draft')

            <span class="badge badge-warning">
                Draft
            </span>

        @else

            <span class="badge badge-danger">
                Archived
            </span>

        @endif

    </td>

    {{-- MEDIA --}}
    <td>

        <span class="badge badge-info">

            {{ ucfirst($item->media_type) }}

        </span>

    </td>

    {{-- SOURCE --}}
    <td>

        {{ $item->source_name ?? '-' }}

    </td>

    {{-- PUBLISHED --}}
    <td>

        {{ $item->published_at ?? '-' }}

    </td>

    {{-- CREATED --}}
    <td>

        {{ $item->created_at }}

    </td>

    {{-- ACTIONS --}}
          
    <td>


      <a href="{{ route('admin.news.translation.form', $item->id) }}"
            class="btn btn-sm btn-info"
            title="Translation">

                <i class="bi bi-translate"></i>

            </a>

        <a href="{{ route('admin.news.edit',$item->id) }}"
           class="btn btn-sm btn-warning">

            Edit

        </a>

       <form action="{{ route('admin.news.destroy', $item->id) }}"
            method="POST"
            class="d-inline"
            onsubmit="return confirm('Are you sure you want to delete this news?')">

            @csrf
            @method('DELETE')

            <button class="btn btn-sm btn-danger">

                <i class="bi bi-trash"></i>

            </button>

        </form>

    </td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="d-flex justify-content-end mt-3">

    {{ $news->links() }}

</div>

</div>

</div>

</div>

@endsection

@push('scripts')

<script>

document.addEventListener("DOMContentLoaded",function(){

    const searchInput=document.getElementById("searchInput");

    if(!searchInput) return;

    searchInput.addEventListener("keyup",function(){

        let search=this.value;

        fetch("{{ route('admin.news.ajax') }}?search=" + encodeURIComponent(search))

.then(response => response.json())

.then(news => {

    let tableBody = document.querySelector("tbody");

    tableBody.innerHTML = "";

    news.forEach((item,index)=>{

        tableBody.innerHTML += `

        <tr>

            <td>${index + 1}</td>

            <td>

                ${
                    item.featured_image

                    ? `<img src="/${item.featured_image}" width="45" height="45" class="rounded">`

                    : `<img src="/dashboard/images/no-image.png" width="45" height="45" class="rounded">`
                }

            </td>

            <td>

                ${item.translated_title ?? item.title ?? '-'}

            </td>

            <td>

                -

            </td>

            <td>

                ${
                    item.status === 'published'

                    ? '<span class="badge badge-success">Published</span>'

                    : item.status === 'draft'

                        ? '<span class="badge badge-warning">Draft</span>'

                        : '<span class="badge badge-danger">Archived</span>'
                }

            </td>

            <td>
           

                <span class="badge badge-info">

                    ${item.media_type ?? '-'}

                </span>

            </td>

            <td>

                ${item.source_name ?? '-'}

            </td>

            <td>

                ${item.published_at ?? '-'}

            </td>

            <td>

                ${item.created_at ?? '-'}

            </td>

            <td>

                <a href="/admin/news/edit/${item.id}"
                   class="btn btn-sm btn-warning">

                    Edit

                </a>

                <form
                    action="/admin/news/destroy/${item.id}"
                    method="POST"
                    style="display:inline;">

                    <input
                        type="hidden"
                        name="_token"
                        value="{{ csrf_token() }}">

                    <input
                        type="hidden"
                        name="_method"
                        value="DELETE">

                    <button
                        class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this news?')">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        `;

    });

})

.catch(error=>{

    console.error(error);

});

});

});

</script>

@endpush
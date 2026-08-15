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

                {{ __('news.news') }}

            </h3>


            <p class="text-muted">

                {{ __('news.manage_news') }}

            </p>


        </div>



        <div class="col-md-6 text-md-right">


            <a href="{{ route('admin.news.create') }}"

               class="btn btn-primary">


                + {{ __('news.add_news') }}


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
                            placeholder="{{ __('news.search_news') }}"
                            value="{{ request('search') }}">


                    </div>





                    {{-- STATUS --}}

                    <div class="col-md-2 mb-2">


                        <select

                            name="status"

                            class="form-control">


                            <option value="">

                                {{ __('news.all_status') }}

                            </option>



                            <option value="draft"

                                {{ request('status')=='draft' ? 'selected' : '' }}>


                                {{ __('news.draft') }}


                            </option>



                            <option value="published"

                                {{ request('status')=='published' ? 'selected' : '' }}>


                                {{ __('news.published') }}


                            </option>



                            <option value="archived"

                                {{ request('status')=='archived' ? 'selected' : '' }}>


                                {{ __('news.archived') }}


                            </option>


                        </select>


                    </div>





                    {{-- MEDIA TYPE --}}

                    <div class="col-md-2 mb-2">


                        <select

                            name="media_type"

                            class="form-control">



                            <option value="">

                                {{ __('news.all_media') }}

                            </option>



                            <option value="text"

                                {{ request('media_type')=='text' ? 'selected' : '' }}>


                                {{ __('news.text') }}


                            </option>



                            <option value="image"

                                {{ request('media_type')=='image' ? 'selected' : '' }}>


                                {{ __('news.image') }}


                            </option>



                            <option value="video"

                                {{ request('media_type')=='video' ? 'selected' : '' }}>


                                {{ __('news.video') }}


                            </option>



                            <option value="mixed"

                                {{ request('media_type')=='mixed' ? 'selected' : '' }}>


                                {{ __('news.mixed') }}


                            </option>



                        </select>


                    </div>
                                        {{-- LANGUAGE --}}

                    <div class="col-md-2 mb-2">


                        <select

                            name="language"

                            class="form-control">


                            <option value="en">

                                {{ __('news.english') }}

                            </option>


                            <option value="fa">

                                {{ __('news.persian') }}

                            </option>


                            <option value="ps">

                                {{ __('news.pashto') }}

                            </option>


                        </select>


                    </div>





                    {{-- BUTTON --}}

                    <div class="col-md-2 mb-2">


                        <button

                            class="btn btn-info btn-block">


                            {{ __('news.search') }}


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


                            <th>

                                #

                            </th>


                            <th>

                                {{ __('news.image') }}

                            </th>



                            <th>

                                {{ __('news.creator') }}

                            </th>



                            <th>

                                {{ __('news.status') }}

                            </th>



                            <th>

                                {{ __('news.media') }}

                            </th>



                            <th>

                                {{ __('news.source') }}

                            </th>



                            <th>

                                {{ __('news.published') }}

                            </th>



                            <th>

                                {{ __('news.created') }}

                            </th>



                            <th>

                                {{ __('news.actions') }}

                            </th>



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



    <img src="{{ asset('storage/' . $item->featured_image) }}"
            alt="{{ $translation->title ?? 'News' }}"

         width="70"

         height="70"

         style="object-fit:cover;border-radius:10px;">



    @else



      <img

                src="{{ route('news.show', $item->id) }}"

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


                {{ __('news.published') }}


            </span>



        @elseif($item->status=='draft')


            <span class="badge badge-warning">


                {{ __('news.draft') }}


            </span>



        @else


            <span class="badge badge-danger">


                {{ __('news.archived') }}


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

            title="{{ __('news.translation') }}">


                <i class="bi bi-translate"></i>


        </a>




        <a href="{{ route('admin.news.edit',$item->id) }}"

           class="btn btn-sm btn-warning">


            {{ __('news.edit') }}


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

                        ${item.creator ?? '-'}

                    </td>



                    <td>


                        ${
                            item.status === 'published'

                            ? '<span class="badge badge-success">{{ __("admin.news.published") }}</span>'

                            : item.status === 'draft'

                            ? '<span class="badge badge-warning">{{ __("admin.news.draft") }}</span>'

                            : '<span class="badge badge-danger">{{ __("admin.news.archived") }}</span>'

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


                            {{ __('news.edit') }}


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

                                onclick="return confirm('{{ __('news.delete_confirm') }}')">


                                {{ __('news.delete') }}


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
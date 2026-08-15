@extends('layouts.admin')


@section('title')

{{ __('archives.title') }}

@endsection





@section('content')



<div class="container-fluid">





{{-- ==========================================
HEADER
========================================== --}}



<div class="d-flex justify-content-between align-items-center mb-4">



    <div>

        <h2 class="font-weight-bold">

            {{ __('archives.archives') }}

        </h2>


        <p class="text-muted mb-0">

            {{ __('archives.description') }}

        </p>


    </div>





    <div>


        <a href="{{ route('admin.archives.create') }}"

           class="btn btn-primary">


            <i class="bi bi-plus-circle"></i>


            {{ __('archives.add_archive') }}


        </a>



    </div>



</div>






{{-- ==========================================
FILTER BOX
========================================== --}}



<div class="card mb-4">


<div class="card-body">



<form method="GET" action="{{ route('admin.archives.index') }}">



<div class="row">






{{-- SEARCH --}}



<div class="col-md-4 mb-3">


<label>

{{ __('archives.search_name') }}

</label>



<input type="text"

       name="search"

       class="form-control"

       value="{{ request('search') }}"

       placeholder="{{ __('archives.search_placeholder') }}">



</div>









{{-- YEAR FILTER --}}



<div class="col-md-3 mb-3">


<label>

{{ __('archives.year') }}

</label>



<select name="year"

        class="form-control">



<option value="">

{{ __('archives.all_years') }}

</option>




@foreach($years as $year)


<option value="{{ $year }}"

{{ request('year') == $year ? 'selected' : '' }}>


{{ $year }}


</option>


@endforeach



</select>



</div>









{{-- STATUS FILTER --}}



<div class="col-md-3 mb-3">


<label>

{{ __('archives.status') }}

</label>




<select name="status"

        class="form-control">



<option value="">

{{ __('archives.all_status') }}

</option>




<option value="active"

{{ request('status') == 'active' ? 'selected' : '' }}>

{{ __('archives.active') }}

</option>





<option value="inactive"

{{ request('status') == 'inactive' ? 'selected' : '' }}>

{{ __('archives.inactive') }}

</option>




</select>



</div>









{{-- BUTTONS --}}



<div class="col-md-2 mb-3 d-flex align-items-end">



<div class="w-100">



<button type="submit"

        class="btn btn-primary w-100 mb-2">


<i class="bi bi-search"></i>


{{ __('archives.filter') }}


</button>





<a href="{{ route('admin.archives.index') }}"

   class="btn btn-secondary w-100">


<i class="bi bi-arrow-repeat"></i>


{{ __('archives.reset') }}


</a>




</div>



</div>






</div>





</form>



</div>


</div>

{{-- ==========================================
SUCCESS MESSAGE
========================================== --}}



@if(session('success'))


<div class="alert alert-success">


{{ session('success') }}


</div>


@endif


{{-- ==========================================
TABLE START
========================================== --}}

<div class="card">


<div class="card-body">



<div class="table-responsive">


<table class="table table-bordered table-hover"

       id="archiveTable">



<thead>


<tr>


<th>

{{ __('archives.image') }}

</th>


<th>
    {{ __('archives.archive_member') }}
</th>
<th>

{{ __('archives.name') }}

</th>



<th>

{{ __('archives.year') }}

</th>



<th>

{{ __('archives.status') }}

</th>



<th>

{{ __('archives.pdf') }}

</th>



<th>

{{ __('archives.created') }}

</th>



<th width="220">

{{ __('archives.actions') }}

</th>



</tr>


</thead>



<tbody>
    
@foreach($archives as $archive)


@php

$translation = $archive->translations->first();

@endphp



<tr>


{{-- ==========================================
IMAGE
========================================== --}}


<td>



@if($archive->image)


<img src="{{ asset('storage/'.$archive->image) }}"

     width="70"

     height="70"

     style="object-fit:cover;border-radius:10px;">



@else


<span class="text-muted">

{{ __('archives.no_image') }}

</span>


@endif



</td>


{{-- ==========================================
ARCHIVE MEMBER
========================================== --}}

<td>

    @if($archive->archiveMember)

        {{ $archive->archiveMember->name }}

        @if($archive->archiveMember->surname)

            {{ ' ' . $archive->archiveMember->surname }}

        @endif

    @else

        <span class="text-muted">

            {{ __('archives.no_member') }}

        </span>

    @endif

</td>






{{-- ==========================================
NAME
========================================== --}}


<td>


{{ $translation->name ?? __('archives.no_translation') }}



<br>







</td>









{{-- ==========================================
YEAR
========================================== --}}


<td>


{{ $archive->archive_year }}


</td>









{{-- ==========================================
STATUS
========================================== --}}


<td>


@if($archive->status == 'active')


<span class="badge badge-success">


{{ __('archives.active') }}


</span>


@else


<span class="badge badge-secondary">


{{ __('archives.inactive') }}


</span>


@endif



</td>









{{-- ==========================================
PDF
========================================== --}}


<td>



@if($archive->pdf_file)


<a href="{{ asset('storage/'.$archive->pdf_file) }}"

   target="_blank"

   class="btn btn-sm btn-danger">


<i class="bi bi-file-earmark-pdf"></i>


{{ __('archives.pdf') }}


</a>



@else


<span class="text-muted">

{{ __('archives.no_pdf') }}

</span>


@endif



</td>









{{-- ==========================================
CREATED DATE
========================================== --}}


<td>


{{ $archive->created_at->format('Y-m-d') }}



</td>









{{-- ==========================================
ACTIONS
========================================== --}}


<td>




<a href="{{ route('admin.archives.edit',$archive->id) }}"

   class="btn btn-sm btn-warning">


<i class="bi bi-pencil"></i>





</a>









<a href="{{ route('admin.archives.translations.index',$archive->id) }}"

   class="btn btn-sm btn-info">


<i class="bi bi-translate"></i>





</a>









<form action="{{ route('admin.archives.destroy',$archive->id) }}"

      method="POST"

      class="d-inline">



@csrf

@method('DELETE')




<button type="submit"

        class="btn btn-sm btn-danger"

        onclick="return confirm('{{ __('archives.delete_confirm') }}')">


<i class="bi bi-trash"></i>





</button>




</form>





</td>





</tr>



@endforeach



</tbody>



</table>



</div>
</div>


</div>

</div>


{{-- ==========================================
PAGINATION
========================================== --}}



<div class="mt-4">


{{ $archives->links() }}


</div>


<!-- </div> -->

@endsection
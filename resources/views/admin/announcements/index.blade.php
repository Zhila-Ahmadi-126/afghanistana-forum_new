@extends('layouts.admin')


@section('content')


<div class="container-fluid">



{{-- =========================
HEADER
========================= --}}


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h3 class="fw-bold mb-1">

{{ __('announcements.title') }}

</h3>


<p class="text-muted mb-0">

{{ __('announcements.manage') }}

</p>


</div>



<a href="{{ route('admin.announcements.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

{{ __('announcements.add') }}


</a>



</div>







{{-- =========================
FILTER CARD
========================= --}}


<div class="card shadow-lg border-0 mb-4"

style="

border-radius:20px;

backdrop-filter:blur(15px);

background:rgba(255,255,255,0.08);

">


<div class="card-body">



<form method="GET"

action="{{ route('admin.announcements.index') }}">



<div class="row">





{{-- SEARCH --}}


<div class="col-md-3 mb-3">


<label>

{{ __('announcements.search') }}

</label>


<input type="text"

name="search"

class="form-control"

value="{{ request('search') }}"

placeholder="{{ __('announcements.search_placeholder') }}">


</div>









{{-- LANGUAGE --}}


<div class="col-md-3 mb-3">


<label>

{{ __('announcements.language') }}

</label>


<select name="language_id"

class="form-control">


@foreach($languages as $language)


<option value="{{ $language->id }}"

{{ $languageId == $language->id ? 'selected':'' }}>


{{ $language->name }}

({{ strtoupper($language->code) }})


</option>


@endforeach


</select>


</div>










{{-- STATUS --}}


<div class="col-md-2 mb-3">


<label>

{{ __('announcements.status') }}

</label>


<select name="status"

class="form-control">


<option value="">

{{ __('announcements.all') }}

</option>


<option value="draft"

{{ request('status')=='draft'?'selected':'' }}>

{{ __('announcements.draft') }}

</option>



<option value="published"

{{ request('status')=='published'?'selected':'' }}>

{{ __('announcements.published') }}

</option>



<option value="archived"

{{ request('status')=='archived'?'selected':'' }}>

{{ __('announcements.archived') }}

</option>



</select>


</div>






{{-- FEATURED --}}


<div class="col-md-2 mb-3">


<label>

{{ __('announcements.featured') }}

</label>


<select name="featured"

class="form-control">


<option value="">

{{ __('announcements.all') }}

</option>



<option value="1"

{{ request('featured')=='1'?'selected':'' }}>

{{ __('announcements.yes') }}

</option>



<option value="0"

{{ request('featured')=='0'?'selected':'' }}>

{{ __('announcements.no') }}

</option>


</select>


</div>







{{-- BUTTON --}}


<div class="col-md-2 mb-3 d-flex align-items-end">


<button class="btn btn-primary w-100">


<i class="bi bi-search"></i>

{{ __('announcements.filter') }}


</button>


</div>



</div>


</form>


</div>

</div>
{{-- =========================
TABLE CARD START
========================= --}}


<div class="card shadow-lg border-0"

style="

border-radius:20px;

backdrop-filter:blur(15px);

background:rgba(255,255,255,0.08);

">


<div class="card-body">



@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif





<div class="table-responsive">

<table class="table table-hover align-middle">



<thead>


<tr>


<th>#</th>

<th>

{{ __('announcements.image') }}

</th>


<th>

{{ __('announcements.title_column') }}

</th>


<th>

{{ __('announcements.language') }}

</th>


<th>

{{ __('announcements.status') }}

</th>


<th>

{{ __('announcements.featured') }}

</th>


<th>

{{ __('announcements.publish_date') }}

</th>


<th>

{{ __('announcements.expiry_date') }}

</th>


<th>

{{ __('announcements.created') }}

</th>


<th class="text-center">

{{ __('announcements.actions') }}

</th>


</tr>


</thead>




<tbody>



@forelse($announcements as $key => $announcement)



@php

$translation = $announcement->translations->first();

@endphp





<tr>



<td>

{{ $announcements->firstItem() + $key }}

</td>







{{-- IMAGE --}}


<td>


@if($announcement->image)



<img src="{{ asset('storage/'.$announcement->image) }}"

width="70"

height="50"

style="object-fit:cover;border-radius:10px;">



@else


<span class="text-muted">

{{ __('announcements.no_image') }}

</span>


@endif



</td>









{{-- TITLE --}}


<td>


{{ $translation->title ?? __('announcements.no_title') }}


</td>









{{-- LANGUAGE --}}


<td>


@if($translation && $translation->language)


{{ $translation->language->name }}

({{ strtoupper($translation->language->code) }})



@else


<span class="text-muted">

-

</span>


@endif



</td>









{{-- STATUS --}}


<td>


@if($announcement->status == 'published')


<span class="badge bg-success">


{{ __('announcements.published') }}


</span>



@elseif($announcement->status == 'draft')


<span class="badge bg-warning text-dark">


{{ __('announcements.draft') }}


</span>



@else


<span class="badge bg-danger">


{{ __('announcements.archived') }}


</span>



@endif



</td>









{{-- FEATURED --}}


<td>


@if($announcement->is_featured)


<span class="badge bg-primary">


{{ __('announcements.featured') }}


</span>



@else


<span class="badge bg-secondary">


{{ __('announcements.no') }}


</span>



@endif



</td>









{{-- PUBLISH DATE --}}


<td>


{{ $announcement->publish_date ?? '-' }}


</td>









{{-- EXPIRY DATE --}}


<td>


{{ $announcement->expiry_date ?? '-' }}


</td>









{{-- CREATED --}}


<td>


{{ $announcement->created_at->format('Y-m-d') }}


</td>{{-- ACTIONS --}}


<td class="text-center">






{{-- EDIT --}}


<a href="{{ route('admin.announcements.edit',$announcement->id) }}"

class="btn btn-sm btn-outline-primary">


<i class="bi bi-pencil-square"></i>


</a>









{{-- TRANSLATE --}}


<a href="{{ route('admin.announcements.translations.index',$announcement->id) }}"

class="btn btn-info btn-sm">


<i class="bi bi-translate"></i>



</a>









{{-- DELETE --}}


<form action="{{ route('admin.announcements.destroy',$announcement->id) }}"

method="POST"

class="d-inline delete-form">


@csrf

@method('DELETE')




<button type="button"

class="btn btn-sm btn-outline-danger delete-btn">


<i class="bi bi-trash"></i>


</button>



</form>





</td>





</tr>





@empty



<tr>


<td colspan="10"

class="text-center py-4">



<span class="text-muted">


{{ __('announcements.no_data') }}


</span>



</td>


</tr>



@endforelse




</tbody>





</table>


</div>







{{-- =========================
PAGINATION
========================= --}}


<div class="mt-4">


{{ $announcements->links() }}


</div>





</div>

</div>


</div>



@endsection








@push('scripts')


<script>


// =========================
// DELETE CONFIRM
// =========================



document.querySelectorAll('.delete-btn').forEach(button => {



button.addEventListener('click', function(){



let form = this.closest('.delete-form');




if(confirm('{{ __("announcements.delete_confirm") }}')){



form.submit();



}



});



});



</script>


@endpush
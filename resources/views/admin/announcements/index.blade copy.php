@extends('layouts.admin')


@section('content')


<div class="container-fluid">


{{-- =========================
HEADER
========================= --}}


<div class="d-flex justify-content-between align-items-center mb-4">


<div>

<h3 class="fw-bold mb-1">

Announcements

</h3>


<p class="text-muted mb-0">

Manage announcements records

</p>


</div>



<a href="{{ route('admin.announcements.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>

Add Announcement


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

Search

</label>


<input type="text"

name="search"

class="form-control"

value="{{ request('search') }}"

placeholder="Search title...">


</div>







{{-- LANGUAGE --}}


<div class="col-md-3 mb-3">


<label>

Language

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

Status

</label>


<select name="status"

class="form-control">


<option value="">

All

</option>


<option value="draft"

{{ request('status')=='draft'?'selected':'' }}>

Draft

</option>



<option value="published"

{{ request('status')=='published'?'selected':'' }}>

Published

</option>



<option value="archived"

{{ request('status')=='archived'?'selected':'' }}>

Archived

</option>



</select>


</div>









{{-- FEATURED --}}


<div class="col-md-2 mb-3">


<label>

Featured

</label>


<select name="featured"

class="form-control">


<option value="">

All

</option>



<option value="1"

{{ request('featured')=='1'?'selected':'' }}>

Yes

</option>



<option value="0"

{{ request('featured')=='0'?'selected':'' }}>

No

</option>


</select>


</div>







{{-- BUTTON --}}


<div class="col-md-2 mb-3 d-flex align-items-end">


<button class="btn btn-primary w-100">


<i class="bi bi-search"></i>

Filter


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

<th>Image</th>

<th>Title</th>

<th>Language</th>

<th>Status</th>

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

No Image

</span>


@endif



</td>






{{-- TITLE --}}


<td>


{{ $translation->title ?? 'No Title' }}


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

Published

</span>


@elseif($announcement->status == 'draft')


<span class="badge bg-warning text-dark">

Draft

</span>


@else


<span class="badge bg-danger">

Archived

</span>


@endif



</td>







{{-- FEATURED --}}


<td>


@if($announcement->is_featured)


<span class="badge bg-primary">

Featured

</span>


@else


<span class="badge bg-secondary">

No

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


</td>







{{-- ACTIONS --}}


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

Translate

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

No Announcement Found

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



        if(confirm('Are you sure you want to delete this Announcement?')){


            form.submit();


        }


    });


});



</script>


@endpush
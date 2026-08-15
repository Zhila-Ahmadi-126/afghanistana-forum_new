@extends('layouts.admin')


<style>

.table tbody tr {
    transition: all .2s ease;
}


.table tbody tr:hover {

    background: rgba(52, 49, 49, 0.18) !important;

}


.dark .table tbody tr:hover {

    background: rgba(74, 68, 68, 0.12) !important;

}




.dark select.form-control {

    color: #fff !important;

    background-color: rgba(255,255,255,0.08) !important;

}



.dark select.form-control option {

    background-color: #1f1f1f !important;

    color: #fff !important;

}




select.form-control option {

    color: #000;

    background-color: #fff;

}



.btn-info{

    background-color: rgba(255, 255, 0, 0.34);

    color:black;

}


</style>



<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



@section('content')


<div class="container-fluid">



{{-- Header --}}


<div class="d-flex justify-content-between align-items-center mb-4">


<div>


<h3 class="fw-bold mb-1">

Legal Systems

</h3>


<p class="text-muted mb-0">

Manage legal system records

</p>


</div>




<a href="{{ route('admin.legal-systems.create') }}"

class="btn btn-primary">


<i class="icon-plus"></i>

Add Legal System


</a>



</div>








{{-- Glass Card --}}


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







{{-- Language Filter --}}


<form method="GET"

action="{{ route('admin.legal-systems.index') }}"

class="mb-4">


<div class="row align-items-end">



<div class="col-md-4">


<label>

Language

</label>



<select name="language_id"

class="form-control">


<option value="">

All Languages

</option>



@foreach($languages as $language)


<option value="{{ $language->id }}"

{{ request('language_id') == $language->id ? 'selected':'' }}>


{{ $language->name }}


</option>


@endforeach



</select>



</div>




<div class="col-md-2">


<button class="btn btn-primary">


<i class="bi bi-search"></i>

Filter


</button>


</div>



</div>


</form>






<div class="table-responsive">


<table class="table table-hover align-middle">


<thead>


<tr>


<th>
#
</th>
<th>
    Image
</th>

<th>
Title
</th>

<th>
    Language
</th>
<th>
Status
</th>


<th>
Created At
</th>


<th class="text-center">
Actions
</th>


</tr>


</thead>


<tbody>
    @forelse($legalSystems as $key => $legalSystem)


<tr>
    <td>

{{ $legalSystems->firstItem() + $key }}

</td>
<td>

@if($legalSystem->image)

<img src="{{ asset('storage/'.$legalSystem->image) }}"
     width="60"
     height="60"
     style="object-fit:cover;border-radius:10px;"
     alt="Legal System Image">

@else

<span class="text-muted">
No Image
</span>

@endif

</td>






<td>


@if($legalSystem->translations->count())


{{ $legalSystem->translations->first()->title }}


@else


<span class="text-muted">

No Translation

</span>


@endif


</td>

<td>

@if($legalSystem->translations->count())

{{ $legalSystem->translations->first()->language->name }}

@else

<span class="text-muted">
-
</span>

@endif

</td>





<td>


@if($legalSystem->status == 'active')


<span class="badge bg-success">

Active

</span>


@else


<span class="badge bg-danger">

Inactive

</span>


@endif



</td>







<td>


{{ $legalSystem->created_at->format('Y-m-d') }}


</td>







<td class="text-center">






{{-- Translate --}}


<a href="{{ route('admin.legal-systems.translations.index',$legalSystem->id) }}"

class="btn btn-sm btn-info"

title="Translate">


<i class="bi bi-translate"></i>


</a>







{{-- Edit --}}


<a href="{{ route('admin.legal-systems.edit',$legalSystem->id) }}"

class="btn btn-sm btn-outline-primary">


<i class="bi bi-pencil-square"></i>


</a>







{{-- Delete --}}


<form action="{{ route('admin.legal-systems.destroy',$legalSystem->id) }}"

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


<td colspan="5"

class="text-center py-4">


<span class="text-muted">

No Legal System Found

</span>


</td>


</tr>




@endforelse
</tbody>


</table>


</div>





{{-- Pagination --}}


<div class="mt-4">


{{ $legalSystems->withQueryString()->links() }}


</div>



</div>

</div>


</div>







<script>


document.querySelectorAll('.delete-btn').forEach(button => {



button.addEventListener('click', function(){



let form = this.closest('.delete-form');



if(confirm('Are you sure you want to delete this Legal System?')){


form.submit();


}



});



});



</script>



@endsection
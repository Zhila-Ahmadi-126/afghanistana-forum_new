@extends('layouts.admin')


@section('content')


<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<div class="container-fluid">


<div class="row">


<div class="col-12">


<div class="card">


<div class="card-body">



<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="card-title mb-0">

<i class="icon-grid menu-icon"></i>
Branches of the Categories

</h4>



<a href="{{ route('admin.legal_categories.create') }}"

class="btn btn-primary btn-sm">


<i class="icon-plus"></i>

Create


</a>



</div>







@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif







@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif







<div class="table-responsive">


<table class="table table-hover">


<thead>


<tr>


<th>
ID
</th>


<th>
Image
</th>


<th>
Legal Document
</th>


<th>
Parent
</th>


<th>
Title
</th>


<th>
PDF
</th>


<th>
Status
</th>


<th>
Sort
</th>


<th>
Action
</th>


</tr>


</thead>






<tbody>



@foreach($categories as $category)



<tr>


<td>

{{ $category->id }}

</td>







<td>


@if($category->image)


<img src="{{ asset('storage/'.$category->image) }}"

width="60"

height="60"

style="object-fit:cover;border-radius:10px;">



@else

-

@endif


</td>







<td>


{{ optional(
$category->document
?->translations
->first()
)->title ?? '-' }}


</td>







<td>


@if($category->parent)


{{ optional(
$category->parent
->translations
->first()
)->title ?? '-' }}


@else

Main

@endif



</td>







<td>


{{ optional(
$category->translations
->first()
)->title ?? 'No Translation' }}


</td>







<td>


@if($category->pdf_file)


<a href="{{ asset('storage/'.$category->pdf_file) }}"

target="_blank"

class="btn btn-info btn-sm">


<i class="icon-doc"></i>


PDF


</a>


@else

-

@endif


</td>







<td>


@if($category->status=='published')


<label class="badge badge-success">

Published

</label>



@elseif($category->status=='draft')


<label class="badge badge-warning">

Draft

</label>



@else


<label class="badge badge-secondary">

Archived

</label>



@endif


</td>








<td>

{{ $category->sort_order }}

</td>







<td>



<a href="{{ route('admin.legal_categories.translation',$category->id) }}"

class="btn btn-info btn-sm"

title="Translation">

<i class="bi bi-translate"></i>




</a>







<a href="{{ route('admin.legal_categories.edit',$category->id) }}"

class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>


</a>






<form action="{{ route('admin.legal_categories.destroy',$category->id) }}"
method="POST"
class="d-inline">

@csrf

@method('DELETE')


<button type="submit"
class="btn btn-danger p-2"
onclick="return confirm('Delete this category?')">

<i class="bi bi-trash"></i>



</button>


</form>



</td>



</tr>



@endforeach



</tbody>


</table>



</div>







<div class="mt-3">


{{ $categories->links() }}


</div>






</div>


</div>


</div>


</div>


</div>



@endsection
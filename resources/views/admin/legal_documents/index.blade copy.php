@extends('layouts.admin')


@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



<div class="container-fluid">


    {{-- SUCCESS --}}
    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif



    {{-- ERROR --}}
    @if(session('error'))

        <div class="alert alert-danger">
            {{ session('error') }}
        </div>

    @endif





<div class="card shadow">


<div class="card-body">



<div class="d-flex justify-content-between align-items-center mb-4">


<h4 class="card-title mb-0">
    Legal Categories
</h4>



<a href="{{ route('admin.legal_documents.create') }}"
   class="btn btn-primary">

    <i class="icon-plus"></i>
    Add Category

</a>


</div>







{{-- FILTER --}}

<form method="GET"
      action="{{ route('admin.legal_documents.index') }}">



<div class="row mb-3">



<div class="col-md-6">

<input type="text"
       name="search"
       value="{{ request('search') }}"
       class="form-control"
       placeholder="Search title...">

</div>





<div class="col-md-3">


<select name="status"
        class="form-control">


<option value="">
    All Status
</option>


<option value="draft"
@if(request('status')=='draft') selected @endif>
Draft
</option>



<option value="published"
@if(request('status')=='published') selected @endif>
Published
</option>




<option value="archived"
@if(request('status')=='archived') selected @endif>
Archived
</option>


</select>


</div>





<div class="col-md-3">


<button class="btn btn-dark">

    Filter

</button>


<a href="{{ route('admin.legal_documents.index') }}"
   class="btn btn-secondary">

    Reset

</a>


</div>


</div>


</form>









<div class="table-responsive">


<table class="table table-hover">


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
Legal System
</th>




<th>
PDF
</th>



<th>
Status
</th>



<th>
Created At
</th>




<th>
Actions
</th>


</tr>


</thead>





<tbody>



@forelse($documents as $document)



<tr>



<td>

{{ $loop->iteration }}

</td>





<td>


@if($document->cover_image)


<img src="{{ asset('storage/'.$document->cover_image) }}"
     width="60"
     height="60"
     style="object-fit:cover;border-radius:10px;">


@else


<span class="badge badge-secondary">
No Image
</span>


@endif



</td>








<td>



{{ optional(
    $document->translations
    ->where('language.code','en')
    ->first()
)->title ?? '---'
}}



</td>









<td>


@if($document->legalSystem)


{{ optional(
    $document->legalSystem
    ->translations
    ->where('language.code','en')
    ->first()
)->title ?? '---'
}}


@else

---

@endif


</td>









<td>


@if($document->pdf_file)


<a href="{{ asset('storage/'.$document->pdf_file) }}"
   target="_blank"
   class="btn btn-sm btn-info">


<i class="icon-doc"></i>

PDF


</a>


@else


---


@endif



</td>









<td>



@if($document->status=='published')


<span class="badge badge-success">
Published
</span>



@elseif($document->status=='draft')


<span class="badge badge-warning">
Draft
</span>



@else


<span class="badge badge-danger">
Archived
</span>



@endif



</td>








<td>


{{ $document->created_at->format('Y-m-d') }}


</td>








<td>



<a href="{{ route(
    'admin.legal_documents.edit',
    $document->id
) }}"
class="btn btn-sm btn-warning">


<i class="bi bi-pencil-square"></i>

</a>







<a href="{{ route(
    'admin.legal_documents.translation',
    $document->id
) }}"
class="btn btn-sm btn-info">



<i class="bi bi-translate"></i>

</a>








<form action="{{ route(
    'admin.legal_documents.destroy',
    $document->id
) }}"
method="POST"
style="display:inline-block;">


@csrf

@method('DELETE')



<button type="submit"
        class="btn btn-sm btn-danger"
        onclick="return confirm('Delete this document?')">

<i class="bi bi-trash"></i>


</button>



</form>





</td>





</tr>




@empty


<tr>

<td colspan="8"
class="text-center">


No documents found.


</td>


</tr>


@endforelse




</tbody>



</table>


</div>







<div class="mt-3">


{{ $documents->links() }}


</div>



</div>

</div>



</div>



@endsection
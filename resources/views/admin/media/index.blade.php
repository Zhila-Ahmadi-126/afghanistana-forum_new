@extends('layouts.admin')


@section('title')

{{ __('media.title') }}

@endsection





@section('content')




<div class="container-fluid">







{{-- ==========================================
HEADER
========================================== --}}



<div class="d-flex justify-content-between align-items-center mb-4">



<h3>

{{ __('media.title') }}

</h3>




<a href="{{ route('admin.media.create') }}"

class="btn btn-primary">


<i class="bi bi-plus-circle"></i>


{{ __('media.add_new') }}


</a>



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
FILTER BOX
========================================== --}}



<div class="card mb-4">


<div class="card-body">



<form method="GET"

action="{{ route('admin.media.index') }}">





<div class="row">






{{-- SEARCH --}}



<div class="col-md-4 mb-3">


<label>

{{ __('media.search') }}

</label>



<input type="text"

name="search"

class="form-control"

value="{{ request('search') }}"

placeholder="{{ __('media.search_placeholder') }}">



</div>








{{-- TYPE --}}



<div class="col-md-3 mb-3">


<label>

{{ __('media.type') }}

</label>



<select name="type"

class="form-control">



<option value="">


{{ __('media.all_types') }}


</option>




<option value="seminar"

{{ request('type')=='seminar'?'selected':'' }}>


{{ __('media.seminar') }}


</option>




<option value="live"

{{ request('type')=='live'?'selected':'' }}>


{{ __('media.live') }}


</option>




<option value="public_video"

{{ request('type')=='public_video'?'selected':'' }}>


{{ __('media.public_video') }}


</option>



<option value="tv_program"

{{ request('type')=='tv_program'?'selected':'' }}>


{{ __('media.tv_program') }}


</option>



<option value="interview"

{{ request('type')=='interview'?'selected':'' }}>


{{ __('media.interview') }}


</option>



</select>


</div>




{{-- ==========================================
STATUS FILTER
========================================== --}}



<div class="col-md-3 mb-3">


<label>

{{ __('media.status') }}

</label>




<select name="status"

class="form-control">



<option value="">


{{ __('media.all_status') }}


</option>




<option value="active"

{{ request('status')=='active'?'selected':'' }}>


{{ __('media.active') }}


</option>




<option value="inactive"

{{ request('status')=='inactive'?'selected':'' }}>


{{ __('media.inactive') }}


</option>



</select>



</div>






{{-- FILTER BUTTON --}}



<div class="col-md-2 mb-3 d-flex align-items-end">



<button type="submit"

class="btn btn-primary w-100">



<i class="bi bi-search"></i>


{{ __('media.filter') }}



</button>



</div>






</div>



</form>



</div>


</div>









{{-- ==========================================
TABLE
========================================== --}}



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

{{ __('media.thumbnail') }}

</th>




<th>

{{ __('media.title') }}

</th>




<th>

{{ __('media.type') }}

</th>




<th>

{{ __('media.status') }}

</th>




<th>

{{ __('media.created_at') }}

</th>




<th>

{{ __('media.actions') }}

</th>




</tr>


</thead>







<tbody>



@forelse($media as $item)



<tr>



<td>

{{ $loop->iteration }}

</td>







<td>



@if($item->thumbnail)



<img src="{{ asset('storage/'.$item->thumbnail) }}"

width="70"

height="50"

style="object-fit:cover;border-radius:8px;">



@else


<span class="text-muted">

{{ __('media.no_image') }}

</span>


@endif



</td>







<td>


{{ optional($item->translations->first())->title ?? '-' }}



</td>






<td>


<span class="badge bg-info">


{{ ucfirst($item->type) }}


</span>


</td>







<td>


@if($item->status == 'active')


<span class="badge bg-success">


{{ __('media.active') }}


</span>


@else


<span class="badge bg-secondary">


{{ __('media.inactive') }}


</span>


@endif



</td>





<td>

{{ $item->created_at->format('Y-m-d') }}

</td>









<td>



<div class="btn-group">







{{-- EDIT --}}



<a href="{{ route('admin.media.edit',$item->id) }}"

class="btn btn-sm btn-warning">


<i class="bi bi-pencil"></i>





</a>







{{-- TRANSLATION --}}



<a href="{{ route('admin.media.translations.index',$item->id) }}"

class="btn btn-sm btn-info">


<i class="bi bi-translate"></i>





</a>








{{-- DELETE --}}



<form action="{{ route('admin.media.destroy',$item->id) }}"

method="POST"

class="d-inline">



@csrf

@method('DELETE')





<button type="submit"

class="btn btn-sm btn-danger"

onclick="return confirm('Are you sure?')">


<i class="bi bi-trash"></i>






</button>



</form>







</div>



</td>






</tr>






@empty



<tr>


<td colspan="7"

class="text-center">


{{ __('media.no_data') }}


</td>


</tr>




@endforelse



</tbody>



</table>






</div>



</div>



</div>



{{-- ==========================================
PAGINATION
========================================== --}}



<div class="mt-4">


{{ $media->links() }}


</div>

</div>

@endsection
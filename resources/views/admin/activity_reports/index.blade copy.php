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
.btn-info{

     background-color: rgba(255, 255, 0, 0.34);
        color: black;

}
</style>
@section('content')

<div class="content-wrapper">


{{-- HEADER --}}
<div class="row mb-3">

    <div class="col-md-6">

        <h3 class="font-weight-bold">
            Activity Reports
        </h3>

        <p class="text-muted">
            Manage 24 hour activity reports
        </p>

    </div>


    <div class="col-md-6 text-md-right">

        <a href="{{ route('admin.activity_reports.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            Add New Report

        </a>

    </div>


</div>




{{-- FILTER CARD --}}

<div class="card mb-3">

<div class="card-body">

<form method="GET"
action="{{ route('admin.activity_reports.index') }}"
class="mb-4">


<div class="row">


<div class="col-md-4 mb-3">

<label>
Search
</label>


<input type="text"
name="search"
class="form-control"
value="{{ request('search') }}"
placeholder="Search report...">

</div>




<div class="col-md-3 mb-3">


<label>
Period
</label>


<select name="period"
class="form-control">


<option value="">
All
</option>


<option value="daily"
@if(request('period')=='daily') selected @endif>
Daily
</option>


<option value="weekly"
@if(request('period')=='weekly') selected @endif>
Weekly
</option>


<option value="monthly"
@if(request('period')=='monthly') selected @endif>
Monthly
</option>


<option value="yearly"
@if(request('period')=='yearly') selected @endif>
Yearly
</option>


</select>


</div>



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





{{-- TABLE --}}

<div class="card">

<div class="card-body">


<div class="table-responsive">

<table class="table table-hover">

<thead>

<tr>

<th>#</th>

<th>User</th>

<th>Date</th>

<th>Title</th>

<th>Summary</th>

<th>Completed</th>

<th>Pending</th>

<th>Challenges</th>

<th>Next Plan</th>

<th>Created</th>

<th>Action</th>

</tr>

</thead>



<tbody>


@forelse($reports as $report)


@php

$english = $report->translations->first();

@endphp



<tr>


<td>
{{ $loop->iteration }}
</td>



<td>

{{ $report->user->first_name ?? '-' }}

{{ $report->user->last_name ?? '' }}

</td>




<td>

{{ $report->report_date }}

</td>




<td>

{{ $english->title ?? '-' }}

</td>




<td>

{{ Str::limit($english->summary ?? '-',50) }}

</td>




<td>

{{ Str::limit($english->completed_activities ?? '-',40) }}

</td>




<td>

{{ Str::limit($english->pending_activities ?? '-',40) }}

</td>




<td>

{{ Str::limit($english->challenges ?? '-',40) }}

</td>




<td>

{{ Str::limit($english->next_plan ?? '-',40) }}

</td>




<td>

{{ $report->created_at->format('Y-m-d') }}

</td>




<td>


<a href="{{ route('admin.activity_reports.translation',$report->id) }}"

class="btn btn-info btn-sm">
<i class="icon-globe"></i>

Translation

</a>



<a href="{{ route('admin.activity_reports.edit',$report->id) }}"

class="btn btn-warning btn-sm">


Edit

</a>


   <form action="{{ route('admin.activity_reports.destroy',$report->id) }}"
      method="POST"
      class="d-inline">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        class="btn btn-danger btn-sm"
        onclick="return confirm('Delete this report?')">

        <i class="icon-trash"></i>

    </button>

</form>


</td>


</tr>



@empty


<tr>

<td colspan="11"
class="text-center">


No reports found.


</td>

</tr>


@endforelse



</tbody>


</table>


</div>
{{-- PAGINATION --}}

<div class="d-flex justify-content-end mt-3">

    {{ $reports->links() }}

</div>



</div>

</div>



</div>


@endsection




@push('scripts')


<script>


document.addEventListener("DOMContentLoaded", function(){


const searchInput = document.querySelector(
    'input[name="search"]'
);



if(searchInput){


searchInput.addEventListener(
"keyup",
function(){


let value = this.value;



if(value.length < 2 && value.length !== 0){

return;

}



fetch(
"{{ route('admin.activity_reports.ajax') }}?search="
+encodeURIComponent(value)

)


.then(response=>response.json())


.then(data=>{


let tbody=document.querySelector("tbody");


tbody.innerHTML="";



data.forEach((report,index)=>{


let user = "-";


if(report.user){

user =
report.user.first_name
+" "
+report.user.last_name;

}



tbody.innerHTML += `

<tr>


<td>
${index+1}
</td>


<td>

${user}

</td>



<td>

${report.report_date}

</td>



<td>


${
report.status === 'published'

?

'<span class="badge badge-success">Published</span>'

:

'<span class="badge badge-warning">Draft</span>'

}


</td>



<td>

${report.created_at ?? '-'}

</td>



<td>


<a href="/admin/activity-reports/translation/${report.id}"
class="btn btn-sm btn-info">

Translation

</a>


<a href="/admin/activity-reports/edit/${report.id}"
class="btn btn-sm btn-warning">

Edit

</a>



<form action="/admin/activity-reports/destroy/${report.id}"
method="POST"
style="display:inline-block">


<input type="hidden"
name="_token"
value="{{ csrf_token() }}">


<input type="hidden"
name="_method"
value="DELETE">


<button class="btn btn-sm btn-danger"
onclick="return confirm('Delete this report?')">

Delete

</button>


</form>



</td>


</tr>

`;


});



})


.catch(error=>{


console.log(error);


});


});


}



});



</script>


@endpush
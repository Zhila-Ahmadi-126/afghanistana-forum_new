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
     color:black;

}

</style>


@section('content')

<div class="content-wrapper">


{{-- HEADER --}}
<div class="row mb-3">

    <div class="col-md-6">

        <h3 class="font-weight-bold">
            {{ __('activity_reports.title') }}
        </h3>

        <p class="text-muted">
            {{ __('activity_reports.subtitle') }}
        </p>

    </div>


    <div class="col-md-6 text-md-right">

        <a href="{{ route('admin.activity_reports.create') }}"
           class="btn btn-primary">

            <i class="bi bi-plus-circle"></i>

            {{ __('activity_reports.add_new') }}

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
{{ __('activity_reports.search') }}
</label>


<input type="text"
name="search"
class="form-control"
value="{{ request('search') }}"
placeholder="{{ __('activity_reports.search_placeholder') }}">

</div>




<div class="col-md-3 mb-3">


<label>
{{ __('activity_reports.period') }}
</label>


<select name="period"
class="form-control">


<option value="">
{{ __('activity_reports.all') }}
</option>


<option value="daily"
@if(request('period')=='daily') selected @endif>
{{ __('activity_reports.daily') }}
</option>


<option value="weekly"
@if(request('period')=='weekly') selected @endif>
{{ __('activity_reports.weekly') }}
</option>


<option value="monthly"
@if(request('period')=='monthly') selected @endif>
{{ __('activity_reports.monthly') }}
</option>


<option value="yearly"
@if(request('period')=='yearly') selected @endif>
{{ __('activity_reports.yearly') }}
</option>


</select>


</div>



<div class="col-md-2 mb-3 d-flex align-items-end">


<button class="btn btn-primary w-100">

<i class="bi bi-search"></i>

{{ __('activity_reports.filter') }}

</button>


</div>



</div>


</form>


</div>

</div>{{-- TABLE --}}

<div class="card">

<div class="card-body">


<div class="table-responsive">

<table class="table table-hover">

<thead>

<tr>

<th>#</th>

<th>{{ __('activity_reports.user') }}</th>

<th>{{ __('activity_reports.date') }}</th>

<th>{{ __('activity_reports.title_column') }}</th>

<th>{{ __('activity_reports.summary') }}</th>

<th>{{ __('activity_reports.completed') }}</th>

<th>{{ __('activity_reports.pending') }}</th>

<th>{{ __('activity_reports.challenges') }}</th>

<th>{{ __('activity_reports.next_plan') }}</th>

<th>{{ __('activity_reports.created') }}</th>

<th>{{ __('activity_reports.action') }}</th>

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

{{ __('activity_reports.translation') }}

</a>



<a href="{{ route('admin.activity_reports.edit',$report->id) }}"

class="btn btn-warning btn-sm">


{{ __('activity_reports.edit') }}

</a>


<form action="{{ route('admin.activity_reports.destroy',$report->id) }}"

method="POST"

class="d-inline">

@csrf
@method('DELETE')

<button
type="submit"
class="btn btn-danger btn-sm"
onclick="return confirm('{{ __('activity_reports.delete_confirm') }}')">

<i class="icon-trash"></i>

</button>

</form>


</td>


</tr>



@empty


<tr>

<td colspan="11"
class="text-center">


{{ __('activity_reports.no_reports') }}


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

${report.title ?? '-'}

</td>



<td>

${report.summary ?? '-'}

</td>



<td>

${report.completed_activities ?? '-'}

</td>



<td>

${report.pending_activities ?? '-'}

</td>



<td>

${report.challenges ?? '-'}

</td>



<td>

${report.next_plan ?? '-'}

</td>



<td>

${report.created_at ?? '-'}

</td>



<td>


<a href="/admin/activity-reports/translation/${report.id}"

class="btn btn-sm btn-info">

{{ __('activity_reports.translation') }}

</a>


<a href="/admin/activity-reports/edit/${report.id}"

class="btn btn-sm btn-warning">

{{ __('activity_reports.edit') }}

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

onclick="return confirm('{{ __('activity_reports.delete_confirm') }}')">

{{ __('activity_reports.delete') }}

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
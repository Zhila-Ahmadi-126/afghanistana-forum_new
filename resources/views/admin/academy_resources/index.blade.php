@extends('layouts.admin')

@section('title')

{{ __('academy_resources.title') }}

@endsection

@section('content')

<div class="container-fluid">

<div class="page-header">

    <div class="d-flex justify-content-between align-items-center">

        <h3>

            {{ __('academy_resources.title') }}

        </h3>

        <a
            href="{{ route('admin.academy_resources.create') }}"
            class="btn btn-primary">

            <i class="mdi mdi-plus"></i>

            {{ __('general.create') }}

        </a>

    </div>

</div>

<div class="card">

<div class="card-body">

<form method="GET">

<div class="row">

<div class="col-md-3 mb-3">

<input
type="text"
name="search"
class="form-control"
placeholder="{{ __('general.search') }}"
value="{{ request('search') }}">

</div>

<div class="col-md-2 mb-3">

<select
name="department_id"
class="form-control">

<option value="">

{{ __('general.department') }}

</option>

@foreach($departments as $department)

<option
value="{{ $department->id }}"
{{ request('department_id') == $department->id ? 'selected' : '' }}>

{{ $department->translation->title ?? ('#'.$department->id) }}

</option>

@endforeach

</select>

</div>

<div class="col-md-2 mb-3">

<select
name="class_id"
class="form-control">

<option value="">

{{ __('general.class') }}

</option>

@foreach($classes as $class)

<option
value="{{ $class->id }}"
{{ request('class_id') == $class->id ? 'selected' : '' }}>

{{ $class->translation->title ?? ('#'.$class->id) }}

</option>

@endforeach

</select>

</div>

<div class="col-md-2 mb-3">

<select
name="resource_type"
class="form-control">

<option value="">

{{ __('academy_resources.resource_type') }}

</option>

<option
value="book"
{{ request('resource_type') == 'book' ? 'selected' : '' }}>

{{ __('academy_resources.book') }}

</option>

<option
value="pdf"
{{ request('resource_type') == 'pdf' ? 'selected' : '' }}>

{{ __('academy_resources.pdf') }}

</option>

<option
value="video"
{{ request('resource_type') == 'video' ? 'selected' : '' }}>

{{ __('academy_resources.video') }}

</option>

<option
value="link"
{{ request('resource_type') == 'link' ? 'selected' : '' }}>

{{ __('academy_resources.link') }}

</option>

<option
value="file"
{{ request('resource_type') == 'file' ? 'selected' : '' }}>

{{ __('academy_resources.file_type') }}

</option>

<option
value="html"
{{ request('resource_type') == 'html' ? 'selected' : '' }}>

{{ __('academy_resources.html') }}

</option>

</select>

</div>

<div class="col-md-2 mb-3">

<select
name="status"
class="form-control">

<option value="">

{{ __('general.status') }}

</option>

<option
value="active"
{{ request('status') == 'active' ? 'selected' : '' }}>

{{ __('general.active') }}

</option>

<option
value="inactive"
{{ request('status') == 'inactive' ? 'selected' : '' }}>

{{ __('general.inactive') }}

</option>

</select>

</div>

<div class="col-md-1 mb-3">

<button
class="btn btn-primary w-100">

<i class="mdi mdi-magnify"></i>

</button>

</div>

</div>

</form>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead>

<tr>

<th>#</th>

<th>{{ __('academy_resources.cover_image') }}</th>

<th>{{ __('academy_resources.title') }}</th>

<th>{{ __('general.department') }}</th>

<th>{{ __('general.class') }}</th>

<th>{{ __('academy_resources.resource_type') }}</th>

<th>

{{ __('academy_resources.published_date') }}

</th>

<th>

{{ __('academy_resources.file') }}

</th>

<th>

{{ __('general.status') }}

</th>

<th width="160">

{{ __('general.action') }}

</th>

</tr>

</thead>

<tbody>

@forelse($resources as $resource)

<tr>

<td>

{{ $loop->iteration }}

</td>
{{-- Cover Image --}}

<td>

@if($resource->cover_image)

<a
href="{{ asset('storage/'.$resource->cover_image) }}"
target="_blank">

<img
src="{{ asset('storage/'.$resource->cover_image) }}"
width="70"
height="70"
style="object-fit:cover;border-radius:8px;">

</a>

@else

<span class="text-muted">

{{ __('academy_resources.no_image') }}

</span>

@endif

</td>



{{-- Title --}}

<td>

<strong>

{{ $resource->title ?? __('academy_resources.not_available') }}

</strong>

<br>

<small class="text-muted">

{{ $resource->author ?? __('academy_resources.not_available') }}

</small>

</td>



{{-- Department --}}

<td>

@if($resource->department)

{{
    $resource->department->name
    ?? $resource->department->title
    ?? $resource->department->translation?->title
    ?? __('academy_resources.not_available')
}}

@else

{{ __('academy_resources.not_available') }}

@endif

</td>



{{-- Class --}}

<td>

@if($resource->academyClass)

{{
    $resource->academyClass->name
    ?? $resource->academyClass->title
    ?? $resource->academyClass->translation?->title
    ?? __('academy_resources.not_available')
}}

@else

{{ __('academy_resources.not_available') }}

@endif

</td>



{{-- Resource Type --}}

<td>

<span class="badge bg-info">

{{ __('academy_resources.'.$resource->resource_type) }}

</span>

</td>



{{-- Published Date --}}

<td>

@if($resource->published_date)

{{ \Carbon\Carbon::parse($resource->published_date)->format('Y-m-d') }}

@else

<span class="text-muted">

{{ __('academy_resources.not_available') }}

</span>

@endif

</td>



{{-- File Preview --}}

<td>

@if($resource->resource_type == 'pdf' && $resource->file_path)

<a
href="{{ asset('storage/'.$resource->file_path) }}"
target="_blank"
class="btn btn-sm btn-danger">

<i class="mdi mdi-file-pdf"></i>

{{ __('academy_resources.pdf') }}

</a>



@elseif($resource->resource_type == 'video' && $resource->external_url)

<a
href="{{ $resource->external_url }}"
target="_blank"
class="btn btn-sm btn-success">

<i class="mdi mdi-play-circle"></i>

{{ __('academy_resources.video') }}

</a>



@elseif($resource->resource_type == 'link' && $resource->external_url)

<a
href="{{ $resource->external_url }}"
target="_blank"
class="btn btn-sm btn-primary">

<i class="mdi mdi-link"></i>

{{ __('academy_resources.link') }}

</a>



@elseif($resource->resource_type == 'html' && $resource->html_path)

<a
href="{{ asset($resource->html_path) }}"
target="_blank"
class="btn btn-sm btn-warning">

<i class="mdi mdi-language-html5"></i>

{{ __('academy_resources.html') }}

</a>



@elseif($resource->file_path)

<a
href="{{ asset('storage/'.$resource->file_path) }}"
target="_blank"
class="btn btn-sm btn-secondary">

<i class="mdi mdi-download"></i>

{{ __('academy_resources.file_type') }}

</a>



@else

<span class="text-muted">

{{ __('academy_resources.no_file') }}

</span>

@endif

</td>
{{-- Status --}}

<td>

@if($resource->status == 'active')

<span class="badge bg-success">

{{ __('general.active') }}

</span>

@else

<span class="badge bg-danger">

{{ __('general.inactive') }}

</span>

@endif

</td>



{{-- Action --}}

<td>

<a

href="{{ route('admin.academy_resources.edit',$resource->id) }}"

class="btn btn-sm btn-primary">

<i class="mdi mdi-pencil"></i>

</a>



<form

action="{{ route('admin.academy_resources.destroy',$resource->id) }}"

method="POST"

class="d-inline"

onsubmit="return confirm('Are you sure?')">

@csrf

@method('DELETE')

<button

type="submit"

class="btn btn-sm btn-danger">

<i class="mdi mdi-delete"></i>

</button>

</form>

</td>

</tr>

@empty

<tr>

<td colspan="10" class="text-center">

{{ __('general.no_data_found') }}

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-3">

{{ $resources->links() }}

</div>

</div>

</div>

</div>

@endsection
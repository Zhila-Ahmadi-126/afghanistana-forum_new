@extends('layouts.admin-form')


@section('title')

{{ __('announcement_translation.title_page') }}

@endsection




@section('content')

<form action="{{ url('admin/announcements/'.$announcement->id.'/translations/store') }}"
method="POST">

@csrf





@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif




@if($errors->any())

<div class="alert-danger">

<ul class="mb-0">

@foreach($errors->all() as $error)

<li>

{{ $error }}

</li>

@endforeach

</ul>

</div>

@endif






<div class="glass-card">


<div class="row">





{{-- ==========================
LANGUAGE
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_translation.language') }}

</label>



<select name="language_id"

class="form-control"

onchange="changeLanguage(this.value)">



@foreach($languages as $language)


<option value="{{ $language->id }}"

{{ $languageId == $language->id ? 'selected':'' }}>


{{ $language->name }}

({{ strtoupper($language->code) }})


</option>



@endforeach



</select>


</div>










{{-- ==========================
TITLE
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_translation.title') }}

</label>


<input type="text"

name="title"

class="form-control"

value="{{ old('title',$translation->title ?? '') }}">


</div>




{{-- ==========================
SHORT DESCRIPTION
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_translation.short_description') }}

</label>


<textarea name="short_description"

rows="4"

class="form-control">{{ old('short_description',$translation->short_description ?? '') }}</textarea>


</div>

{{-- ==========================
DESCRIPTION
========================== --}}


<div class="col-md-12 mb-3">


<label>

{{ __('announcement_translation.description') }}

</label>


<textarea name="description"

rows="8"

class="form-control">{{ old('description',$translation->description ?? '') }}</textarea>


</div>










{{-- ==========================
META TITLE
========================== --}}


<div class="col-md-6 mb-3">


<label>

{{ __('announcement_translation.meta_title') }}

</label>


<input type="text"

name="meta_title"

class="form-control"

value="{{ old('meta_title',$translation->meta_title ?? '') }}">


</div>









{{-- ==========================
META DESCRIPTION
========================== --}}


<div class="col-md-6 mb-3">


<label>

{{ __('announcement_translation.meta_description') }}

</label>


<textarea name="meta_description"

rows="3"

class="form-control">{{ old('meta_description',$translation->meta_description ?? '') }}</textarea>


</div>







</div>

</div>

{{-- ==========================
BUTTONS
========================== --}}



<div class="text-right mt-4">





<a href="{{ route('admin.announcements.index') }}"

class="btn btn-secondary">
<br>

<i class="bi bi-arrow-left"></i>


{{ __('announcement_translation.back') }}


</a>







<button type="submit"

class="btn btn-primary">


<i class="bi bi-check-circle"></i>


{{ __('announcement_translation.save_translation') }}


</button>

</form>


@if($translation)


<form action="{{ route('admin.announcements.translations.destroy',
[
'announcement'=>$announcement->id,
'translation'=>$translation->id
]) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button type="submit"

class="btn btn-danger"

onclick="return confirm('{{ __('announcement_translation.delete_confirm') }}')">


<i class="bi bi-trash"></i>


{{ __('announcement_translation.delete_translation') }}


</button>



</form>



@endif

</div>
<script>


// ==========================
// CHANGE LANGUAGE
// ==========================


function changeLanguage(id){


let url = new URL(window.location.href);


url.searchParams.set(
    'language_id',
    id
);


window.location.href = url.toString();


}



</script>






@endsection
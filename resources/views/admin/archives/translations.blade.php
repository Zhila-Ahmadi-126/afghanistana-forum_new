@extends('layouts.admin-form')


@section('title')

{{ __('archive_translation.translation_title') }}

@endsection





@section('content')



<div class="container py-5">







{{-- ==========================================
ERROR MESSAGE
========================================== --}}



@if($errors->any())


<div class="alert alert-danger">


<ul class="mb-0">


@foreach($errors->all() as $error)


<li>

{{ $error }}

</li>


@endforeach


</ul>


</div>


@endif










{{-- ==========================================
SUCCESS MESSAGE
========================================== --}}



@if(session('success'))


<div class="alert alert-success">


{{ session('success') }}


</div>


@endif










{{-- ==========================================
FORM START
========================================== --}}



<form action="{{ route('admin.archives.translations.store',$archive->id) }}"

      method="POST">



@csrf






<div class="glass-card">



<div class="row">







{{-- ==========================================
LANGUAGE
========================================== --}}



<div class="col-md-12 mb-3">


<label>

{{ __('archive_translation.language') }}

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








{{-- ==========================================
NAME
========================================== --}}



<div class="col-md-12 mb-3">


<label>

{{ __('archive_translation.name') }}

</label>




<input type="text"

       name="name"

       class="form-control"

       value="{{ old('name',$translation->name ?? '') }}"

       placeholder="{{ __('archive_translation.name_placeholder') }}">



</div>









{{-- ==========================================
SHORT DESCRIPTION
========================================== --}}



<div class="col-md-12 mb-3">


<label>

{{ __('archive_translation.short_description') }}

</label>




<textarea name="short_description"

          rows="4"

          class="form-control"

          placeholder="{{ __('archive_translation.short_description_placeholder') }}">{{ old('short_description',$translation->short_description ?? '') }}</textarea>



</div>









{{-- ==========================================
DESCRIPTION
========================================== --}}



<div class="col-md-12 mb-3">


<label>

{{ __('archive_translation.description') }}

</label>




<textarea name="description"

          rows="8"

          class="form-control"

          placeholder="{{ __('archive_translation.description_placeholder') }}">{{ old('description',$translation->description ?? '') }}</textarea>



</div>









{{-- ==========================================
META TITLE
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('archive_translation.meta_title') }}

</label>




<input type="text"

       name="meta_title"

       class="form-control"

       value="{{ old('meta_title',$translation->meta_title ?? '') }}">



</div>










{{-- ==========================================
META DESCRIPTION
========================================== --}}



<div class="col-md-6 mb-3">


<label>

{{ __('archive_translation.meta_description') }}

</label>




<textarea name="meta_description"

          rows="3"

          class="form-control">{{ old('meta_description',$translation->meta_description ?? '') }}</textarea>



</div>






</div>

</div>





{{-- ==========================================
BUTTONS
========================================== --}}



<div class="text-right mt-4">





<a href="{{ route('admin.archives.index') }}"

   class="btn btn-secondary">
<br>

<i class="bi bi-arrow-left"></i>


{{ __('archive_translation.back') }}


</a>







<button type="submit"

        id="saveBtn"

        class="btn btn-primary">


<i class="bi bi-check-circle"></i>


{{ __('archive_translation.save_translation') }}


</button>












</form>
















@if($translation)



<form action="{{ route('admin.archives.translations.destroy',
[
'archive'=>$archive->id,
'translation'=>$translation->id
]) }}"

method="POST"

class="d-inline">



@csrf

@method('DELETE')





<button type="submit"

        class="btn btn-danger"

        onclick="return confirm('{{ __('archive_translation.delete_confirm') }}')">


<i class="bi bi-trash"></i>


{{ __('archive_translation.delete_translation') }}


</button>





</form>



@endif

</div>


<script>


// ==========================================
// CHANGE LANGUAGE
// ==========================================


function changeLanguage(id){



let url = new URL(window.location.href);



url.searchParams.set(

    'language_id',

    id

);



window.location.href = url.toString();



}











// ==========================================
// BUTTON LOADING
// ==========================================


document.addEventListener("DOMContentLoaded", function(){



const form = document.querySelector("form");

const btn = document.getElementById("saveBtn");





if(form && btn){



form.addEventListener("submit",function(){



btn.disabled = true;



btn.innerHTML =

'<span class="spinner-border spinner-border-sm me-2"></span>{{ __("archive_translation.saving") }}';



});



}



});



</script>









@endsection
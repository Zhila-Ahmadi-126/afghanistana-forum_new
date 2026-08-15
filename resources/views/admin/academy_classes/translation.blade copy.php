@extends('layouts.admin-form')

@section('title')

Class Translation

@endsection


@section('content')


<div class="container-fluid">

<div class="row justify-content-center">

<div class="col-lg-10">

<div class="glass-card">


<h4 class="text-center mb-4">

Class Translation

</h4>



<form

method="GET"

action="{{ route('admin.academy_classes.translation',$class->id) }}"

class="mb-4">


<div class="row">


<div class="col-md-8">

<select

name="language_id"

class="form-control"

onchange="this.form.submit()">


<option value="">

Select Language

</option>


@foreach($languages as $language)

<option

value="{{ $language->id }}"

{{ request('language_id')==$language->id ? 'selected' : '' }}>

{{ $language->name }}

</option>

@endforeach


</select>


</div>


</div>


</form>





@if(request('language_id'))

<form

action="{{ route('admin.academy_classes.translation.save',$class->id) }}"

method="POST">


@csrf

<input

type="hidden"

name="language_id"

value="{{ request('language_id') }}">


<div class="mb-3">

<label>

Title

</label>

<input

type="text"

name="title"

class="form-control"

value="{{ old('title',$translation->title ?? '') }}">


@error('title')

<span class="text-danger">

{{ $message }}

</span>

@enderror

</div>
<div class="mb-3">

<label>

Short Description

</label>

<textarea

name="short_description"

rows="3"

class="form-control">{{ old('short_description',$translation->short_description ?? '') }}</textarea>

</div>







<div class="mb-3">

<label>

Description

</label>

<textarea

name="description"

rows="8"

class="form-control">{{ old('description',$translation->description ?? '') }}</textarea>

</div>







<div class="mb-3">

<label>

Meta Title

</label>

<input

type="text"

name="meta_title"

class="form-control"

value="{{ old('meta_title',$translation->meta_title ?? '') }}">

</div>







<div class="mb-4">

<label>

Meta Description

</label>

<textarea

name="meta_description"

rows="4"

class="form-control">{{ old('meta_description',$translation->meta_description ?? '') }}</textarea>

</div>
<div  class="text-right mt-4">

   

        <a
            href="{{ route('admin.academy_classes.index') }}"
            class="btn btn-secondary">
              <br>
            <i class="bi bi-arrow-left"></i>

            Back

        </a>

    

   



        <button
            type="submit"
            class="btn btn-primary">

            <i class="bi bi-save"></i>

            Save Translation

        </button>
        </form>

@endif

  


        @if($translation)

        <form
            action="{{ route('admin.academy_classes.translation.delete',$translation->id) }}"
            method="POST"
            class="d-inline">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                class="btn btn-danger"
                onclick="return confirm('Delete this translation?')">

                <i class="bi bi-trash"></i>

                Delete

            </button>

        </form>

        @endif
          </div>

</div>

</div>

</div>

</div>

</div>

@endsection
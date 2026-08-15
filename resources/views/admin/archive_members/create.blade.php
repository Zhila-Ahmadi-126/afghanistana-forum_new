@extends('layouts.admin-form')

@section('title')

{{ __('archive_member_create.title') }}

@endsection

@section('content')

{{-- ==========================================
ERROR MESSAGE
========================================== --}}

@if($errors->any())


@foreach($errors->all() as $error)

    {{ $error }}

@endforeach


@endif

{{-- ==========================================
FORM START
========================================== --}}
<div class="container py-5">
    
<div class="glass-card">






<form
    action="{{ route('admin.archive_members.store') }}"
    method="POST"
    enctype="multipart/form-data">


@csrf


{{-- ==========================================
NAME
========================================== --}}

{{ __('archive_member_create.name') }}

<input
    type="text"
    name="name"
    class="form-control"
    value="{{ old('name') }}"
    placeholder="{{ __('archive_member_create.name_placeholder') }}">


{{-- ==========================================
SURNAME
========================================== --}}

{{ __('archive_member_create.surname') }}

<input
    type="text"
    name="surname"
    class="form-control"
    value="{{ old('surname') }}"
    placeholder="{{ __('archive_member_create.surname_placeholder') }}">


{{-- ==========================================
SECTION
========================================== --}}

{{ __('archive_member_create.section') }}

<select
    name="section"
    class="form-control">

    <option value="">
        {{ __('archive_member_create.select_section') }}
    </option>

    <option
        value="Leadership Council of the Association"
        {{ old('section') == 'Leadership Council of the Association' ? 'selected' : '' }}>

        {{ __('archive_member_create.leadership_council') }}

    </option>

    <option
        value="Supervisory Commission"
        {{ old('section') == 'Supervisory Commission' ? 'selected' : '' }}>

        {{ __('archive_member_create.supervisory_commission') }}

    </option>

    <option
        value="Director of the Association\'s Branches"
        {{ old('section') == "Director of the Association's Branches" ? 'selected' : '' }}>

        {{ __('archive_member_create.branch_director') }}

    </option>

    <option
        value="Editorial Board"
        {{ old('section') == 'Editorial Board' ? 'selected' : '' }}>

        {{ __('archive_member_create.editorial_board') }}

    </option>

    <option
        value="Other Members and Experienced Legal Professionals"
        {{ old('section') == 'Other Members and Experienced Legal Professionals' ? 'selected' : '' }}>

        {{ __('archive_member_create.other_members') }}

    </option>
        <option value="archive_contributors">
            {{ __('archive_contributors') }}
        </option>

</select>


{{-- ==========================================
POSITION
========================================== --}}

{{ __('archive_member_create.position') }}

<input
    type="text"
    name="position"
    class="form-control"
    value="{{ old('position') }}"
    placeholder="{{ __('archive_member_create.position_placeholder') }}">


{{-- ==========================================
COUNTRY
========================================== --}}

{{ __('archive_member_create.country') }}

<input
    type="text"
    name="country"
    class="form-control"
    value="{{ old('country') }}"
    placeholder="{{ __('archive_member_create.country_placeholder') }}">


{{-- ==========================================
PHONE
========================================== --}}

{{ __('archive_member_create.phone') }}

<input
    type="text"
    name="phone"
    class="form-control"
    value="{{ old('phone') }}"
    placeholder="{{ __('archive_member_create.phone_placeholder') }}">


{{-- ==========================================
EMAIL
========================================== --}}

{{ __('archive_member_create.email') }}

<input
    type="email"
    name="email"
    class="form-control"
    value="{{ old('email') }}"
    placeholder="{{ __('archive_member_create.email_placeholder') }}">


{{-- ==========================================
PHOTO
========================================== --}}

{{ __('archive_member_create.photo') }}

<input
    type="file"
    name="photo"
    class="form-control"
    accept="image/*">


{{-- ==========================================
SHORT DESCRIPTION
========================================== --}}

{{ __('archive_member_create.short_description') }}

<textarea
    name="short_description"
    class="form-control"
    rows="4"
    placeholder="{{ __('archive_member_create.short_description_placeholder') }}">{{ old('short_description') }}</textarea>


{{-- ==========================================
DESCRIPTION
========================================== --}}

{{ __('archive_member_create.description') }}

<textarea
    name="description"
    class="form-control"
    rows="7"
    placeholder="{{ __('archive_member_create.description_placeholder') }}">{{ old('description') }}</textarea>


{{-- ==========================================
BUTTONS
========================================== --}}

<a
    href="{{ route('admin.archive_members.index') }}"
    class="btn btn-danger">
    <br>

    {{ __('archive_member_create.back') }}

</a>


<button
    type="submit"
    id="saveBtn"
    class="btn btn-primary">

    {{ __('archive_member_create.save') }}

</button>


</form>
</div>
</div>


@endsection

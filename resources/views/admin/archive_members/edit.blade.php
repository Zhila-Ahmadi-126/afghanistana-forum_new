@extends('layouts.admin-form')

@section('title')

{{ __('archive_member_edit.title') }}

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
    action="{{ route('admin.archive_members.update', $member->id) }}"
    method="POST"
    enctype="multipart/form-data">


@csrf


{{-- ==========================================
NAME
========================================== --}}

{{ __('archive_member_edit.name') }}

<input
    type="text"
    name="name"
    class="form-control"
    value="{{ old('name', $member->name) }}"
    placeholder="{{ __('archive_member_edit.name_placeholder') }}">


{{-- ==========================================
SURNAME
========================================== --}}

{{ __('archive_member_edit.surname') }}

<input
    type="text"
    name="surname"
    class="form-control"
    value="{{ old('surname', $member->surname) }}"
    placeholder="{{ __('archive_member_edit.surname_placeholder') }}">


{{-- ==========================================
SECTION
========================================== --}}

{{ __('archive_member_edit.section') }}

<select
    name="section"
    class="form-control">

    <option value="">
        {{ __('archive_member_edit.select_section') }}
    </option>

    <option
        value="Leadership Council of the Association"
        {{ old('section', $member->section) == 'Leadership Council of the Association' ? 'selected' : '' }}>

        {{ __('archive_member_edit.leadership_council') }}

    </option>

    <option
        value="Supervisory Commission"
        {{ old('section', $member->section) == 'Supervisory Commission' ? 'selected' : '' }}>

        {{ __('archive_member_edit.supervisory_commission') }}

    </option>

    <option
        value="Director of the Association\'s Branches"
        {{ old('section', $member->section) == "Director of the Association's Branches" ? 'selected' : '' }}>

        {{ __('archive_member_edit.branch_director') }}

    </option>

    <option
        value="Editorial Board"
        {{ old('section', $member->section) == 'Editorial Board' ? 'selected' : '' }}>

        {{ __('archive_member_edit.editorial_board') }}

    </option>

    <option
        value="Other Members and Experienced Legal Professionals"
        {{ old('section', $member->section) == 'Other Members and Experienced Legal Professionals' ? 'selected' : '' }}>

        {{ __('archive_member_edit.other_members') }}

    </option>
    <option value="archive_contributors"
    {{ old('section', $member->section) == 'archive_contributors' ? 'selected' : '' }}>
    {{ __('archive_member_edit.archive_contributors') }}
</option>

</select>


{{-- ==========================================
POSITION
========================================== --}}

{{ __('archive_member_edit.position') }}

<input
    type="text"
    name="position"
    class="form-control"
    value="{{ old('position', $member->position) }}"
    placeholder="{{ __('archive_member_edit.position_placeholder') }}">


{{-- ==========================================
COUNTRY
========================================== --}}

{{ __('archive_member_edit.country') }}

<input
    type="text"
    name="country"
    class="form-control"
    value="{{ old('country', $member->country) }}"
    placeholder="{{ __('archive_member_edit.country_placeholder') }}">


{{-- ==========================================
PHONE
========================================== --}}

{{ __('archive_member_edit.phone') }}

<input
    type="text"
    name="phone"
    class="form-control"
    value="{{ old('phone', $member->phone) }}"
    placeholder="{{ __('archive_member_edit.phone_placeholder') }}">


{{-- ==========================================
EMAIL
========================================== --}}

{{ __('archive_member_edit.email') }}

<input
    type="email"
    name="email"
    class="form-control"
    value="{{ old('email', $member->email) }}"
    placeholder="{{ __('archive_member_edit.email_placeholder') }}">


{{-- ==========================================
CURRENT PHOTO
========================================== --}}

{{ __('archive_member_edit.current_photo') }}

@if($member->photo)

    <div class="mb-3">

        <img
            src="{{ asset($member->photo) }}"
            alt="{{ $member->name }}"
            style="width:120px;height:120px;object-fit:cover;">

    </div>

@endif


{{-- ==========================================
NEW PHOTO
========================================== --}}

{{ __('archive_member_edit.photo') }}

<input
    type="file"
    name="photo"
    class="form-control"
    accept="image/*">


{{-- ==========================================
SHORT DESCRIPTION
========================================== --}}

{{ __('archive_member_edit.short_description') }}

<textarea
    name="short_description"
    class="form-control"
    rows="4"
    placeholder="{{ __('archive_member_edit.short_description_placeholder') }}">{{ old('short_description', $member->short_description) }}</textarea>


{{-- ==========================================
DESCRIPTION
========================================== --}}

{{ __('archive_member_edit.description') }}

<textarea
    name="description"
    class="form-control"
    rows="7"
    placeholder="{{ __('archive_member_edit.description_placeholder') }}">{{ old('description', $member->description) }}</textarea>


{{-- ==========================================
BUTTONS
========================================== --}}

<a
    href="{{ route('admin.archive_members.index') }}"
    class="btn btn-danger">
    <br>

    {{ __('archive_member_edit.back') }}

</a>


<button
    type="submit"
    id="saveBtn"
    class="btn btn-primary">

    {{ __('archive_member_edit.update') }}

</button>


</form>
</div>
</div>
@endsection

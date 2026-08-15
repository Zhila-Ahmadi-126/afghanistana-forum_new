<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">


<title>{{ __('activity_report_translation.activity_report_translation') }}</title>


<link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">

<link rel="stylesheet" href="{{ asset('dashboard/css/dark-mode.css') }}">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<link rel="stylesheet" href="{{ asset('css/admin-create.css') }}">


</head>


<body>
<div class="background">

<div class="blur one"></div>
<div class="blur two"></div>
<div class="blur three"></div>

</div>

<div class="container py-5">


<div class="d-flex justify-content-between align-items-center mb-4">


<h3>
{{ __('activity_report_translation.activity_report_translation') }}
</h3>



<button id="theme-toggle" class="btn btn-light shadow">

<i class="bi bi-moon-stars-fill"></i>

</button>


</div>



<div class="card report-form-card shadow">


<div class="card-body p-4">



<form method="POST"
action="{{ route('admin.activity_reports.saveTranslation',$report->id) }}">


@csrf



<div class="row">


<div class="col-md-6 mb-3">

    <label>
        {{ __('activity_report_translation.language') }}
    </label>

    <select
        name="language_id"
        class="form-control"
        onchange="changeLanguage(this.value)"
    >

        @foreach($languages as $language)

            <option
                value="{{ $language->id }}"
                {{ $language->id == $languageId ? 'selected' : '' }}
            >

                {{ $language->name }} ({{ $language->code }})

            </option>

        @endforeach

    </select>

</div>


<div class="col-md-6 mb-3">

<label>
{{ __('activity_report_translation.title') }}
</label>

<input type="text"
name="title"
class="form-control"
value="{{ $translation->title ?? '' }}">

</div>



<div class="col-12 mb-3">

<label>
{{ __('activity_report_translation.summary') }}
</label>

<textarea 
name="summary"
class="form-control"
rows="4">{{ $translation->summary ?? '' }}</textarea>

</div>





<div class="col-12 mb-3">

<label>
{{ __('activity_report_translation.completed_activities') }}
</label>

<textarea 
name="completed_activities"
class="form-control"
rows="5">{{ $translation->completed_activities ?? '' }}</textarea>

</div>






<div class="col-12 mb-3">

<label>
{{ __('activity_report_translation.pending_activities') }}
</label>

<textarea 
name="pending_activities"
class="form-control"
rows="5">{{ $translation->pending_activities ?? '' }}</textarea>

</div>






<div class="col-12 mb-3">

<label>
{{ __('activity_report_translation.challenges') }}
</label>

<textarea 
name="challenges"
class="form-control"
rows="5">{{ $translation->challenges ?? '' }}</textarea>

</div>






<div class="col-12 mb-3">

<label>
{{ __('activity_report_translation.next_plan') }}
</label>

<textarea 
name="next_plan"
class="form-control"
rows="5">{{ $translation->next_plan ?? '' }}</textarea>

</div>






<div class="text-end">
    

<button type="submit"
class="btn btn-primary">

{{ __('activity_report_translation.save_translation') }}

</button>

<a href="{{ route('admin.activity_reports.index') }}"
   class="btn btn-secondary">
<br>
    <i class="bi bi-arrow-left"></i>

    {{ __('activity_report_translation.back') }}

</a>


</div>

</div>


</form>


</div>


</div>


</div>


<script>


const toggle = document.getElementById("theme-toggle");

const icon = toggle.querySelector("i");

const body = document.body;



if(localStorage.getItem("theme") === "dark"){


    body.classList.add("dark");

    icon.className="bi bi-sun-fill";


}




toggle.addEventListener("click",function(){


    body.classList.toggle("dark");



    if(body.classList.contains("dark")){


        localStorage.setItem("theme","dark");

        icon.className="bi bi-sun-fill";


    }else{


        localStorage.setItem("theme","light");

        icon.className="bi bi-moon-stars-fill";


    }



});








function changeLanguage(languageId)
{


    let url = new URL(window.location.href);


    url.searchParams.set(
        'language_id',
        languageId
    );


    window.location.href = url.toString();



}



</script>
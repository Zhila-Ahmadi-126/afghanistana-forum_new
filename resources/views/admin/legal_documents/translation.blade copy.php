<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title>Legal Category Translation</title>


<link rel="stylesheet"
href="{{ asset('dashboard/vendors/css/vendor.bundle.base.css') }}">


<link rel="stylesheet"
href="{{ asset('dashboard/css/vertical-layout-light/style.css') }}">


<link rel="stylesheet"
href="{{ asset('dashboard/css/dark-mode.css') }}">


<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<link rel="stylesheet"
href="{{ asset('css/admin-create.css') }}">



<style>


.theme-btn{

position:fixed;

top:25px;

right:25px;

z-index:999;

border-radius:50%;

width:45px;

height:45px;

}



.glass-card{

background:rgba(255,255,255,.75);

backdrop-filter:blur(15px);

border-radius:20px;

}



.dark .glass-card{

background:rgba(30,30,30,.75);

color:white;

}



.form-control{

border-radius:12px;

}



label{

font-weight:600;

}



</style>


</head>



<body>





<div class="background">

<div class="blur one"></div>

<div class="blur two"></div>

<div class="blur three"></div>

</div>








<button id="theme-toggle"

class="btn btn-light shadow theme-btn">


<i id="theme-icon"

class="bi bi-moon-stars-fill"></i>


</button>









<div class="container py-5">


<div class="row justify-content-center">


<div class="col-xl-8 col-lg-9">





<div class="card shadow-lg border-0 glass-card">


<div class="card-body p-4">



<h3 class="text-center mb-4">

<i class="bi bi-translate"></i>

Legal Category Translation

</h3>







@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif







@if(session('error'))

<div class="alert alert-danger">

{{ session('error') }}

</div>

@endif








<form method="POST"

action="{{ route('admin.legal_documents.saveTranslation',$document->id) }}">


@csrf







<div class="mb-3">


<label>

Legal Category

</label>



<input type="text"

class="form-control"

value="{{ optional($document->translations->where('language.code','en')->first())->title ?? 'Legal Document' }}"

readonly>


</div>








<div class="mb-3">

<label>
Language
</label>


<select name="language_id"

class="form-control"

onchange="changeLanguage(this.value)">



@foreach($languages as $language)


<option value="{{ $language->id }}"

@if(request('language_id') == $language->id)

selected

@elseif($translation && $translation->language_id == $language->id)

selected

@elseif(!request('language_id') && !$translation && $language->code == 'en')

selected

@endif

>

{{ $language->name }}

({{ $language->code }})

</option>



@endforeach



</select>

</div>









<div class="mb-3">


<label>

Title

</label>


<input type="text"

name="title"

class="form-control"

value="{{ $translation->title ?? '' }}">



</div>









<div class="mb-3">


<label>

Short Descroption

</label>


<textarea name="summary"

class="form-control"

rows="3">{{ $translation->summary ?? '' }}</textarea>



</div>









<div class="mb-3">


<label>

Long Descroption

</label>


<textarea name="content"

class="form-control"

rows="7">{{ $translation->content ?? '' }}</textarea>



</div>









<div class="mb-3">


<label>

SEO Title

</label>


<input type="text"

name="seo_title"

class="form-control"

value="{{ $translation->seo_title ?? '' }}">



</div>









<div class="mb-3">


<label>

SEO Description

</label>


<textarea name="seo_description"

class="form-control"

rows="3">{{ $translation->seo_description ?? '' }}</textarea>



</div>




<div class="text-center mt-4">


@if($translation)


<button type="submit"
        class="btn btn-warning px-5">

    Update Translation

</button>



<button type="button"
        class="btn btn-danger"
        onclick="deleteTranslation({{ $translation->id }})">

    Delete Translation

</button>



@else


<button type="submit"
        class="btn btn-success px-5">

    Save Translation

</button>



@endif




<a href="{{ route('admin.legal_documents.index') }}"
   class="btn btn-secondary">
   <br>

Back

</a>


</div>





</form>





</div>

</div>






</div>

</div>

</div>







<script>


const toggle=document.getElementById('theme-toggle');

const icon=document.getElementById('theme-icon');

const body=document.body;




if(localStorage.getItem('theme')==='dark')

{

body.classList.add('dark');

icon.className='bi bi-sun-fill';

}





toggle.onclick=function(){


body.classList.toggle('dark');



if(body.classList.contains('dark'))

{


localStorage.setItem('theme','dark');

icon.className='bi bi-sun-fill';


}

else

{


localStorage.setItem('theme','light');

icon.className='bi bi-moon-stars-fill';


}


}







function changeLanguage(id)
{


window.location.href =

"{{ route('admin.legal_documents.translation',$document->id) }}"

+

"?language_id="

+

id;


}



</script>

<script>

function deleteTranslation(id)
{

    if(confirm('Delete this translation?'))
    {

        let form = document.createElement('form');

        form.method = 'POST';

        form.action = '/admin/legal-documents/translation/delete/' + id;


        let csrf = document.createElement('input');

        csrf.type = 'hidden';

        csrf.name = '_token';

        csrf.value = '{{ csrf_token() }}';


        let method = document.createElement('input');

        method.type = 'hidden';

        method.name = '_method';

        method.value = 'DELETE';


        form.appendChild(csrf);

        form.appendChild(method);


        document.body.appendChild(form);

        form.submit();

    }

}

</script>
</body>

</html>
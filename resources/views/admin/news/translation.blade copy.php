<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>News Translation</title>

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


        <h2 class="font-weight-bold">

            News Translation

        </h2>



        <button id="theme-toggle" class="btn btn-light shadow">

            <i class="bi bi-moon-stars-fill"></i>

        </button>


    </div>




    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif



    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif




    <div class="glass-card">


        <!-- ========================= -->
        <!-- LANGUAGE SELECT -->
        <!-- ========================= -->


        <form method="GET"
              action="{{ route('admin.news.translation.form',$news->id) }}">


            <div class="row">


                <div class="col-md-4 mb-3">


                    <label>

                        Select Language

                    </label>



                    <select name="language"
                            class="form-control"
                            onchange="this.form.submit()">



                       @foreach($languages as $language)

                        <option value="{{ $language->code }}"
                            {{ request('language', $translation->language_code ?? 'fa') == $language->code ? 'selected' : '' }}>

                            {{ $language->name }}

                        </option>

                    @endforeach


                    </select>


                </div>


            </div>


        </form>
                <hr>


        <!-- ========================= -->
        <!-- TRANSLATION FORM -->
        <!-- ========================= -->


        @php

            $currentLanguage = request('language', 'fa');

            $translation = $translations[$currentLanguage] ?? null;

        @endphp



        <form action="{{ route('admin.news.translation.save',$news->id) }}"
              method="POST">


            @csrf



            <input type="hidden"
                   name="language_code"
                   value="{{ $currentLanguage }}">



            <div class="row">



                <!-- TITLE -->

                <div class="col-md-6 mb-3">


                    <label>

                        Title

                    </label>


                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title',$translation->title ?? '') }}">


                </div>




                <!-- SLUG -->

                <div class="col-md-6 mb-3">


                    <label>

                        Slug

                    </label>


                    <input type="text"
                           name="slug"
                           class="form-control"
                           value="{{ old('slug',$translation->slug ?? '') }}">


                </div>






                <!-- SHORT DESCRIPTION -->

                <div class="col-md-12 mb-3">


                    <label>

                        Short Description

                    </label>


                    <textarea name="summary"
                              rows="4"
                              class="form-control">{{ old('summary',$translation->summary ?? '') }}</textarea>


                </div>






                <!-- LONG TEXT -->

                <div class="col-md-12 mb-3">


                    <label>

                        Long Text

                    </label>


                    <textarea name="content"
                              rows="8"
                              class="form-control">{{ old('content',$translation->content ?? '') }}</textarea>


                </div>







                <!-- META TITLE -->

                <div class="col-md-6 mb-3">


                    <label>

                        Meta Title

                    </label>


                    <input type="text"
                           name="meta_title"
                           class="form-control"
                           value="{{ old('meta_title',$translation->meta_title ?? '') }}">


                </div>






                <!-- META DESCRIPTION -->

                <div class="col-md-6 mb-3">


                    <label>

                        Meta Description

                    </label>


                    <textarea name="meta_description"
                              rows="3"
                              class="form-control">{{ old('meta_description',$translation->meta_description ?? '') }}</textarea>


                </div>



            </div>
                        <div class="text-right mt-4">


                <a href="{{ route('admin.news.index') }}"
                   class="btn btn-secondary">
                   <br>


                    <i class="bi bi-arrow-left"></i>

                    Back


                </a>




                @if($translation)


                    <button type="button"
                            class="btn btn-danger"
                            onclick="deleteTranslation()">


                        <i class="bi bi-trash"></i>

                        Delete


                    </button>


                @endif





                <button type="submit"
                        id="saveBtn"
                        class="btn btn-primary">


                    <i class="bi bi-check-circle"></i>

                    Save Translation


                </button>



            </div>



        </form>



        @if($translation)


            <form id="deleteForm"
                  action="{{ route('admin.news.translation.destroy',
                        [$news->id,$translation->id]) }}"
                  method="POST"
                  style="display:none;">


                @csrf

                @method('DELETE')


            </form>


        @endif



    </div>


</div>






<script>


document.addEventListener("DOMContentLoaded", function(){



    const body = document.body;

    const toggle = document.getElementById("theme-toggle");

    const icon = toggle ? toggle.querySelector("i") : null;


    const form = document.querySelector("form[action*='translation']");

    const btn = document.getElementById("saveBtn");




    /* =====================
       BUTTON LOADING
    ===================== */


    if(form && btn){


        form.addEventListener("submit",function(){


            btn.disabled = true;


            btn.innerHTML =
            '<span class="spinner-border spinner-border-sm me-2"></span>Saving...';


        });


    }







    /* =====================
       DARK MODE
    ===================== */


    if(toggle && icon){



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



    }




});






function deleteTranslation(){


    if(confirm("Are you sure you want to delete this translation?")){


        document.getElementById("deleteForm").submit();


    }


}



</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

    {{-- LOGO --}}
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

        <a class="navbar-brand brand-logo mr-4"
           href="{{ url('/admin/dashboard') }}">

           <img
                src="{{ asset('storage/logo/logo-s-removebg-preview.PNG') }}"
                alt="logo"
                style="height:42px;width:auto;">

        </a>


        <a class="navbar-brand brand-logo-mini"
           href="{{ url('/admin/dashboard') }}">

           <img
                src="{{ asset('storage/logo/logo-s-removebg-preview.PNG') }}"
                alt="logo"
                style="height:34px;width:auto;">

        </a>

    </div>



    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
       


        {{-- Sidebar Toggle --}}
        <button
            class="navbar-toggler align-self-center pr-3"
            type="button"
            data-toggle="minimize">

            <span class="icon-menu"></span>

        </button>
         

       
 <h5 class="pt-2">The Nationwide Association of Afghan Jurists in Europe</h5>



        <ul class="navbar-nav navbar-nav-right">
        

{{-- ==========================
     LANGUAGE DROPDOWN
=========================== --}}

<li class="nav-item dropdown">

 @php

    $menuLanguages = \App\Models\Language::where('status','active')
        ->orderBy('sort_order')
        ->get();


    $currentLanguage = $menuLanguages->firstWhere(
        'code',
        session('locale', app()->getLocale())
    );

@endphp

    <a class="nav-link count-indicator dropdown-toggle"
       id="languageDropdown"
       href="#"
       data-toggle="dropdown">


        @if($currentLanguage && $currentLanguage->flag)

            <img
                src="{{ asset('storage/'.$currentLanguage->flag) }}"
                alt="{{ $currentLanguage->name }}"
                style="
                width:24px;
                height:24px;
                border-radius:50%;
                object-fit:cover;
                ">

        @else

            <i class="bi bi-translate mx-0"></i>

        @endif
        


    </a>
     




    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
         aria-labelledby="languageDropdown">
          <p class="mb-0 font-weight-normal float-left dropdown-header">

            {{ __('admin.general.language') }}

        </p>


      


       @foreach($menuLanguages as $language)


            <a class="dropdown-item preview-item"
               href="{{ route('language.switch',$language->code) }}">


                <div class="preview-thumbnail">

                    <div class="preview-icon bg-info">


                        @if($language->flag)

                            <img
                                src="{{ asset('storage/'.$language->flag) }}"
                                style="
                                width:22px;
                                height:22px;
                                border-radius:50%;
                                object-fit:cover;
                                ">

                        @else

                            <i class="bi bi-translate mx-0"></i>

                        @endif


                    </div>

                </div>



                <div class="preview-item-content">


                    <h6 class="preview-subject font-weight-normal">

                        {{ $language->name }}

                    </h6>


                    <p class="font-weight-light small-text mb-0 text-muted">

                        {{ strtoupper($language->code) }}

                    </p>


                </div>


            </a>


        @endforeach



    </div>


</li>




            {{-- ==========================
                 THEME SWITCH
            =========================== --}}

                       <li class="nav-item d-flex align-items-center mr-3">
                <button id="theme-toggle" class="theme-toggle-btn">
                    <span id="theme-icon">🌙</span>
                </button>
            </li>
                        {{-- ==========================
                 USER PROFILE
            =========================== --}}

            <li class="nav-item nav-profile dropdown">


                <a
                    class="nav-link dropdown-toggle user-profile-link d-flex align-items-center"
                    href="#"
                    data-toggle="dropdown"
                    id="profileDropdown">


                    @if(auth()->user()->avatar)

                        <img
                            src="{{ asset('storage/'.auth()->user()->avatar) }}"
                            class="user-avatar"
                            alt="profile">

                    @else

                        <img
                            src="{{ asset('storage/avatar/default.JPG') }}"
                            class="user-avatar"
                            alt="profile">

                    @endif



                    <span class="ml-2 d-none d-lg-inline">

                        {{ auth()->user()->first_name }}
                        {{ auth()->user()->last_name }}

                    </span>


                </a>




                <div
                    class="dropdown-menu dropdown-menu-right profile-menu"
                    aria-labelledby="profileDropdown">


                    <div class="dropdown-header text-center">


                        <img
                            src="{{ auth()->user()->avatar 
                            ? asset('storage/'.auth()->user()->avatar)
                            : asset('storage/avatar/default.JPG') }}"
                            class="profile-big-avatar">


                        <strong class="d-block mt-2">

                            {{ auth()->user()->first_name }}
                            {{ auth()->user()->last_name }}

                        </strong>


                        <small class="text-muted">

                            {{ auth()->user()->email }}

                        </small>


                    </div>



                    <div class="dropdown-divider"></div>



                    <a
                        class="dropdown-item"
                        href="{{ route('admin.users.edit',auth()->id()) }}">


                        <i class="bi bi-person-circle"></i>

                        {{ __('admin.general.profile') }}


                    </a>



                </div>


            </li>



        </ul>




        <button
            class="navbar-toggler navbar-toggler-right d-lg-none align-self-center"
            type="button"
            data-toggle="offcanvas">


            <span class="icon-menu"></span>


        </button>


    </div>


</nav>



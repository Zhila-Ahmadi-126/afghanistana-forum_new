<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav">


    {{-- DASHBOARD --}}

<li class="nav-item">

    <a class="nav-link"
       href="{{ route('admin.dashboard') }}">

        <i class="icon-grid menu-icon"></i>

        <span class="menu-title">
            {{ __('admin.sidebar.dashboard') }}
        </span>

    </a>

</li>


{{-- USER PAGES --}}

@if(canPermission('users', 'view') || auth()->check())

<li class="nav-item">

    <a class="nav-link"
       data-toggle="collapse"
       href="#auth"
       aria-expanded="{{ request()->routeIs('admin.users.*') ? 'true' : 'false' }}"
       aria-controls="auth">


        <i class="icon-head menu-icon"></i>


        <span class="menu-title">
            {{ __('admin.sidebar.user_pages') }}
        </span>


        <i class="menu-arrow"></i>


    </a>



    <div class="collapse 
    {{ request()->routeIs('admin.users.*') ? 'show' : '' }}"
    id="auth">


        <ul class="nav flex-column sub-menu">



            {{-- USERS --}}

            @if(canPermission('users', 'view'))

            <li class="nav-item">

                <a class="nav-link"
                   href="{{ route('admin.users.index') }}">

                    {{ __('admin.sidebar.users') }}

                </a>

            </li>

            @endif




            {{-- LOGOUT --}}

            <li class="nav-item">

                <a class="nav-link"
                   href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">


                    <i class="menu-icon mdi mdi-logout"></i>


                    <span class="menu-title">

                        {{ __('admin.sidebar.logout') }}

                    </span>


                </a>



                <form id="logout-form"
                      method="POST"
                      action="{{ route('admin.logout') }}"
                      style="display:none;">

                    @csrf

                </form>


            </li>


        </ul>


    </div>


</li>

@endif


      {{-- LANGUAGES --}}

        @if(canPermission('languages', 'view'))

        <li class="nav-item">


            <a class="nav-link"
            href="{{ route('admin.languages.index') }}">


                <i class="icon-globe menu-icon"></i>


                <span class="menu-title">

                    {{ __('admin.sidebar.languages') }}

                </span>


            </a>


        </li>

        @endif




{{-- LEGAL MANAGEMENT --}}

@if(
    canPermission('legal_systems', 'view') ||
    canPermission('legal_documents', 'view') ||
    canPermission('legal_categories', 'view') ||
    canPermission('legal_files', 'view')
)

<li class="nav-item">


    <a class="nav-link"
       data-toggle="collapse"
       href="#legalManagement"
       aria-expanded="{{ request()->routeIs('admin.legal-systems.*') || request()->routeIs('admin.legal_documents.*') || request()->routeIs('admin.legal_categories.*') || request()->routeIs('admin.legal_files.*') ? 'true' : 'false' }}"
       aria-controls="legalManagement">


        <i class="icon-book menu-icon"></i>


        <span class="menu-title">

            {{ __('admin.sidebar.legal_management') }}

        </span>


        <i class="menu-arrow"></i>


    </a>




    <div class="collapse 
    {{ request()->routeIs('admin.legal-systems.*') || request()->routeIs('admin.legal_documents.*') || request()->routeIs('admin.legal_categories.*') || request()->routeIs('admin.legal_files.*') ? 'show' : '' }}"
    id="legalManagement">


        <ul class="nav flex-column sub-menu">



            {{-- LEGAL SYSTEMS --}}

            @if(canPermission('legal_systems', 'view'))

            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('admin.legal-systems.*') ? 'active' : '' }}"
                   href="{{ route('admin.legal-systems.index') }}">

                    {{ __('admin.sidebar.legal_systems') }}

                </a>

            </li>

            @endif





            {{-- LEGAL DOCUMENTS --}}

            @if(canPermission('legal_documents', 'view'))

            <li class="nav-item">


                <a class="nav-link {{ request()->routeIs('admin.legal_documents.*') ? 'active' : '' }}"
                   href="{{ route('admin.legal_documents.index') }}">


                    {{ __('admin.sidebar.legal_categories') }}


                </a>


            </li>

            @endif





            {{-- LEGAL CATEGORIES --}}

            @if(canPermission('legal_categories', 'view'))

            <li class="nav-item">


                <a class="nav-link {{ request()->routeIs('admin.legal_categories.*') ? 'active' : '' }}"
                   href="{{ route('admin.legal_categories.index') }}">


                    {{ __('admin.sidebar.branches_categories') }}


                </a>


            </li>

            @endif





            {{-- LEGAL FILES --}}

            @if(canPermission('legal_files', 'view'))

            <li class="nav-item">


                <a class="nav-link {{ request()->routeIs('admin.legal_files.*') ? 'active' : '' }}"
                   href="{{ route('admin.legal_files.index') }}">


                    {{ __('admin.sidebar.legal_files') }}


                </a>


            </li>

            @endif



        </ul>


    </div>


</li>

@endif



{{-- CONTENT --}}

@if(
    canPermission('news', 'view') ||
    canPermission('activity_reports', 'view') ||
    canPermission('media', 'view') ||
    canPermission('archives', 'view') ||
    canPermission('announcements', 'view')
)

<li class="nav-item">

    <a class="nav-link"
       data-toggle="collapse"
       href="#content"
       aria-expanded="{{ request()->routeIs('admin.news.*') || request()->routeIs('admin.activity_reports.*') || request()->routeIs('admin.media.*') || request()->routeIs('admin.archives.*') || request()->routeIs('admin.announcements.*') ? 'true' : 'false' }}"
       aria-controls="content">


        <i class="icon-layout menu-icon"></i>


        <span class="menu-title">

            {{ __('admin.sidebar.content') }}

        </span>


        <i class="menu-arrow"></i>


    </a>



    <div class="collapse 
    {{ request()->routeIs('admin.news.*') || request()->routeIs('admin.activity_reports.*') || request()->routeIs('admin.media.*') || request()->routeIs('admin.archives.*') || request()->routeIs('admin.announcements.*') ? 'show' : '' }}"
    id="content">


        <ul class="nav flex-column sub-menu">


            {{-- NEWS --}}

            @if(canPermission('news', 'view'))

            <li class="nav-item">

                <a class="nav-link"
                   href="{{ url('/admin/news') }}">

                    {{ __('admin.sidebar.news') }}

                </a>

            </li>

            @endif



            {{-- REPORTS --}}

            @if(canPermission('activity_reports', 'view'))

            <li class="nav-item">

                <a class="nav-link"
                   href="{{ route('admin.activity_reports.index') }}">

                    {{ __('admin.sidebar.reports') }}

                </a>

            </li>

            @endif



            {{-- MEDIA --}}

            @if(canPermission('media', 'view'))

            <li class="nav-item">

                <a class="nav-link"
                   href="{{ route('admin.media.index') }}">

                    {{ __('admin.sidebar.media') }}

                </a>

            </li>

            @endif



          


            {{-- ANNOUNCEMENTS --}}

            @if(canPermission('announcements', 'view'))

            <li class="nav-item">

                <a class="nav-link"
                   href="{{ url('/admin/announcements') }}">

                    {{ __('admin.sidebar.announcements') }}

                </a>

            </li>

            @endif
            {{-- COMMENTS --}}

            @if(canPermission('comments', 'view'))

            <li class="nav-item">

                <a class="nav-link"
                href="{{ url('/admin/comments') }}">

                    {{ __('admin.sidebar.comments') }}

                </a>

            </li>

            @endif
            {{-- CONTACTS --}}

                @if(canPermission('contacts', 'view'))

                <li class="nav-item">

                    <a class="nav-link"
                    href="{{ url('/admin/contacts') }}">

                        {{ __('admin.sidebar.contacts') }}

                    </a>

                </li>

                @endif
                {{-- NEWSLETTER SUBSCRIBERS --}}

@if(canPermission('newsletter_subscribers', 'view'))

<li class="nav-item">

    <a class="nav-link"
       href="{{ url('/admin/newsletter-subscribers') }}">

        {{ __('admin.sidebar.newsletter_subscribers') }}

    </a>

</li>

@endif


        </ul>

    </div>

</li>

@endif
{{-- ARCHIVE --}}

@if(canPermission('archives', 'view'))

<li class="nav-item">


<a class="nav-link"
   data-toggle="collapse"
   href="#archive"
   aria-expanded="{{ request()->routeIs('admin.archive_members.*') || request()->routeIs('admin.archives.*') ? 'true' : 'false' }}"
   aria-controls="archive">

    <i class="icon-archive menu-icon"></i>

    <span class="menu-title">
        {{ __('admin.sidebar.archive') }}
    </span>

    <i class="menu-arrow"></i>

</a>


<div class="collapse
{{ request()->routeIs('admin.archive_members.*') || request()->routeIs('admin.archives.*') ? 'show' : '' }}"
id="archive">

    <ul class="nav flex-column sub-menu">


        {{-- ARCHIVE MEMBERS --}}

        <li class="nav-item">

            <a class="nav-link"
               href="{{ route('admin.archive_members.index') }}">

                {{ __('admin.sidebar.archive_members') }}

            </a>

        </li>


        {{-- ARCHIVE FILES --}}

        <li class="nav-item">

            <a class="nav-link"
               href="{{ route('admin.archives.index') }}">

                {{ __('admin.sidebar.archive_files') }}

            </a>

        </li>


    </ul>

</div>


</li>

@endif


{{-- ACADEMY --}}

@if(
    canPermission('academy_departments', 'view') ||
    canPermission('academy_teachers', 'view') ||
    canPermission('academy_classes', 'view') ||
    canPermission('academy_students', 'view') ||
    canPermission('academy_enrollments', 'view') ||
    canPermission('academy_schedules', 'view') ||
    canPermission('academy_assignments', 'view') ||
    canPermission('academy_resources', 'view') ||
    canPermission('academy_grades', 'view') ||
    canPermission('academy_certificates', 'view')
)

<li class="nav-item">


    <a class="nav-link"
       data-toggle="collapse"
       href="#academy"
       aria-expanded="{{ request()->routeIs('admin.academy_*') ? 'true' : 'false' }}"
       aria-controls="academy">


        <i class="bi bi-mortarboard"></i>


        <span class="menu-title pl-3">

            {{ __('admin.sidebar.academy') }}

        </span>


        <i class="menu-arrow"></i>


    </a>



    <div class="collapse 
    {{ request()->routeIs('admin.academy_*') ? 'show' : '' }}"
    id="academy">


        <ul class="nav flex-column sub-menu">



            {{-- DEPARTMENTS --}}
            @if(canPermission('academy_departments', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_departments.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_departments.index') }}">

                    {{ __('admin.sidebar.departments') }}

                </a>
            </li>

            @endif




            {{-- TEACHERS --}}
            @if(canPermission('academy_teachers', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_teachers.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_teachers.index') }}">

                    {{ __('admin.sidebar.teachers') }}

                </a>
            </li>

            @endif




            {{-- CLASSES --}}
            @if(canPermission('academy_classes', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_classes.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_classes.index') }}">

                    {{ __('admin.sidebar.classes') }}

                </a>
            </li>

            @endif




            {{-- STUDENTS --}}
            @if(canPermission('academy_students', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_students.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_students.index') }}">

                    {{ __('admin.sidebar.students') }}

                </a>
            </li>

            @endif




            {{-- ENROLLMENTS --}}
            @if(canPermission('academy_enrollments', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_enrollments.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_enrollments.index') }}">

                    {{ __('admin.sidebar.enrollments') }}

                </a>
            </li>

            @endif




            {{-- SCHEDULES --}}
            @if(canPermission('academy_schedules', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_schedules.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_schedules.index') }}">

                    {{ __('admin.sidebar.schedules') }}

                </a>
            </li>

            @endif




            {{-- ASSIGNMENTS --}}
            @if(canPermission('academy_assignments', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_assignments.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_assignments.index') }}">

                    {{ __('admin.sidebar.assignments') }}

                </a>
            </li>

            @endif




            {{-- RESOURCES --}}
            @if(canPermission('academy_resources', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_resources.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_resources.index') }}">

                    {{ __('admin.sidebar.resources') }}

                </a>
            </li>

            @endif




            {{-- GRADES --}}
            @if(canPermission('academy_grades', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_grades.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_grades.index') }}">

                    {{ __('admin.sidebar.grades') }}

                </a>
            </li>

            @endif




            {{-- CERTIFICATES --}}
            @if(canPermission('academy_certificates', 'view'))

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.academy_certificates.*') ? 'active' : '' }}"
                   href="{{ route('admin.academy_certificates.index') }}">

                    {{ __('admin.sidebar.certificates') }}

                </a>
            </li>

            @endif



        </ul>


    </div>


</li>

@endif



{{-- AUDIT LOGS --}}

@if(canPermission('audit_logs', 'view'))

<li class="nav-item">


    <a class="nav-link"
       href="{{ route('admin.audit_logs.index') }}">


        <i class="icon-clock menu-icon"></i>


        <span class="menu-title">


            {{ __('admin.sidebar.audit_logs') }}


        </span>


    </a>


</li>

@endif

    </ul>
      

</nav>
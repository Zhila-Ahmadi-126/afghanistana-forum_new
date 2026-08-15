@extends('layouts.admin')


@section('content')

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">



<div class="container-fluid">



    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-4">


        <div>

            <h3 class="font-weight-bold">

                <i class="bi bi-folder2-open"></i>

                {{ __('legal_files.legal_files') }}

            </h3>


            <p class="text-muted mb-0">

                {{ __('legal_files.manage_legal_files') }}

            </p>


        </div>





        <a href="{{ route('admin.legal_files.create') }}"

           class="btn btn-primary">


            <i class="bi bi-plus-circle"></i>

            {{ __('legal_files.add_legal_file') }}


        </a>



    </div>










    <!-- SUCCESS MESSAGE -->


    @if(session('success'))


        <div class="alert alert-success">


            {{ session('success') }}


        </div>


    @endif











    <!-- ERROR MESSAGE -->


    @if(session('error'))


        <div class="alert alert-danger">


            {{ session('error') }}


        </div>


    @endif













    <!-- MAIN CARD -->


    <div class="card shadow-sm border-0">


        <div class="card-body">



            <div class="table-responsive">



                <table class="table table-hover align-middle">



                    <thead>


                    <tr>


                        <th>
                            {{ __('legal_files.image') }}
                        </th>



                        <th>
                            {{ __('legal_files.title') }}
                        </th>



                        <th>
                            {{ __('legal_files.category') }}
                        </th>



                        <th>
                            {{ __('legal_files.pdf') }}
                        </th>



                        <th>
                            {{ __('legal_files.status') }}
                        </th>



                        <th>
                            {{ __('legal_files.creator') }}
                        </th>



                        <th width="160">
                            {{ __('legal_files.actions') }}
                        </th>



                    </tr>


                    </thead>




                    <tbody>
                        
<tbody>

@forelse($files as $file)

<tr>


<td>

    @if($file->image)

        <img src="{{ asset('storage/'.$file->image) }}"

             width="55"

             height="55"

             class="rounded"

             style="object-fit:cover;">

    @else

        <i class="bi bi-file-earmark-text fs-3"></i>

    @endif

</td>





<td>

    {{ optional($file->translation)->title ?? __('legal_files.no_title') }}

</td>





<td>

    {{ optional($file->category->translations->first())->title ?? __('legal_files.no_category') }}

</td>





<td>

    @if($file->pdf_file)


        <a href="{{ asset('storage/'.$file->pdf_file) }}"

           target="_blank"

           class="btn btn-sm btn-outline-danger">


            <i class="bi bi-file-earmark-pdf"></i>

            {{ __('legal_files.pdf') }}


        </a>


    @else


        <span class="text-muted">

            {{ __('legal_files.no_pdf') }}

        </span>


    @endif

</td>





<td>


@if($file->status == 'published')


<span class="badge badge-success">

    {{ __('legal_files.published') }}

</span>


@elseif($file->status == 'archived')


<span class="badge badge-secondary">

    {{ __('legal_files.archived') }}

</span>


@else


<span class="badge badge-warning">

    {{ __('legal_files.draft') }}

</span>


@endif


</td>





<td>

    {{ optional($file->creator)->name ?? __('legal_files.unknown') }}

</td>





<td>


<a href="{{ route('admin.legal_files.edit',$file->id) }}"

   class="btn btn-sm btn-warning">


    <i class="bi bi-pencil"></i>


</a>





<a href="{{ route('admin.legal_files.translation',$file->id) }}"

   class="btn btn-sm btn-info text-white">


    <i class="bi bi-translate"></i>


</a>






<form

action="{{ route('admin.legal_files.destroy',$file->id) }}"

method="POST"

class="d-inline">


@csrf

@method('DELETE')



<button

type="submit"

class="btn btn-danger btn-sm"

onclick="return confirm('Are you sure you want to delete this legal file?')">


<i class="bi bi-trash"></i>


</button>



</form>


</td>


</tr>



@empty


<tr>


<td colspan="7" class="text-center">


    {{ __('legal_files.no_files_found') }}


</td>


</tr>


@endforelse


</tbody>

</table>


</div>



<div class="mt-4">


    {{ $files->links() }}


</div>



</div>

</div>


</div>


</div>


@endsection
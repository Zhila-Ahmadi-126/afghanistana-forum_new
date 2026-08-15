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

                Legal Files 

            </h3>


            <p class="text-muted mb-0">

                Manage legal files and documents

            </p>


        </div>




        <a href="{{ route('admin.legal_files.create') }}"

           class="btn btn-primary">


            <i class="bi bi-plus-circle"></i>

            Add Legal File


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
                            Image
                        </th>



                        <th>
                            Title
                        </th>



                        <th>
                            Category
                        </th>



                        <th>
                            PDF
                        </th>



                        <th>
                            Status
                        </th>



                        <th>
                            Creator
                        </th>



                        <th width="160">
                            Actions
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
    {{ optional($file->translation)->title ?? 'No Title' }}
</td>


<td>
    {{ optional($file->category->translations->first())->title ?? 'No Category' }}
</td>


<td>
    @if($file->pdf_file)

        <a href="{{ asset('storage/'.$file->pdf_file) }}"
           target="_blank"
           class="btn btn-sm btn-outline-danger">

            <i class="bi bi-file-earmark-pdf"></i>
            PDF

        </a>

    @else

        <span class="text-muted">
            No PDF
        </span>

    @endif
</td>


<td>

@if($file->status == 'published')

<span class="badge badge-success">
    Published
</span>

@elseif($file->status == 'archived')

<span class="badge badge-secondary">
    Archived
</span>

@else

<span class="badge badge-warning">
    Draft
</span>

@endif

</td>


<td>
    {{ optional($file->creator)->name ?? 'Unknown' }}
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

    No legal files found.

</td>

</tr>

@endforelse


</tbody>
                </tbody>

            </table>

        </div>


        <div class="mt-4">

            {{ $files->links() }}

        </div>


    </div>

</div>


</div>


@endsection
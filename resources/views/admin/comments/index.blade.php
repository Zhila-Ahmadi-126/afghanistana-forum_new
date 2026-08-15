@extends('layouts.admin')

@section('title')

{{ __('comments.menu') }}

@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    <div class="d-flex justify-content-between mb-4">

                        <h4>

                            {{ __('comments.menu') }}

                        </h4>

                    </div>


                    {{-- Search Filter --}}

                    <form
                        method="GET"
                        action="{{ route('admin.comments.index') }}">

                        <div class="row mb-3">

                            <div class="col-md-4">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="{{ __('comments.search_placeholder') }}"
                                    value="{{ request('search') }}">

                            </div>


                            <div class="col-md-3">

                                <select
                                    name="status"
                                    class="form-select form-control">

                                    <option value="">

                                        {{ __('general.all_status') }}

                                    </option>

                                    <option
                                        value="pending"
                                        {{ request('status') == 'pending' ? 'selected' : '' }}>

                                        {{ __('comments.pending') }}

                                    </option>

                                    <option
                                        value="approved"
                                        {{ request('status') == 'approved' ? 'selected' : '' }}>

                                        {{ __('comments.approved') }}

                                    </option>

                                    <option
                                        value="rejected"
                                        {{ request('status') == 'rejected' ? 'selected' : '' }}>

                                        {{ __('comments.rejected') }}

                                    </option>

                                </select>

                            </div>


                            <div class="col-md-2">

                                <button
                                    type="submit"
                                    class="btn btn-secondary">

                                    {{ __('general.search') }}

                                </button>

                            </div>

                        </div>

                    </form>


                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>
                                        {{ __('comments.name') }}
                                    </th>

                                    <th>
                                        {{ __('comments.email') }}
                                    </th>

                                    <th>
                                        {{ __('comments.rating') }}
                                    </th>

                                    <th>
                                        {{ __('comments.message') }}
                                    </th>

                                    <th>
                                        {{ __('general.status') }}
                                    </th>

                                    <th>
                                        {{ __('comments.date') }}
                                    </th>

                                    <th width="150">
                                        {{ __('general.action') }}
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                            @forelse($comments as $comment)

                                <tr>

                                    <td>

                                        {{ $comments->firstItem() + $loop->index }}

                                    </td>


                                    {{-- NAME --}}

                                    <td>

                                        <strong>

                                            {{ $comment->name }}

                                        </strong>

                                    </td>


                                    {{-- EMAIL --}}

                                    <td>

                                        {{ $comment->email }}

                                    </td>


                                    {{-- RATING --}}

                                    <td>

                                        @if($comment->rating)

                                            <span class="text-warning">

                                                @for($i = 1; $i <= 5; $i++)

                                                    @if($i <= $comment->rating)

                                                        <i class="mdi mdi-star"></i>

                                                    @else

                                                        <i class="mdi mdi-star-outline"></i>

                                                    @endif

                                                @endfor

                                            </span>

                                            <small class="text-muted">

                                                ({{ $comment->rating }}/5)

                                            </small>

                                        @else

                                            <span class="text-muted">

                                                --

                                            </span>

                                        @endif

                                    </td>


                                    {{-- MESSAGE --}}

                                    <td style="width: 350px; max-width: 350px;">

                                        <textarea
                                            class="form-control"
                                            rows="10"
                                            cols="10"
                                            readonly
                                            style="
                                                resize: none;
                                                width: 200px;
                                                max-width: 300px;
                                                overflow-y: auto;
                                                word-break: break-word;
                                                white-space: pre-wrap;
                                            "
                                        >{{ $comment->message }}</textarea>

                                    </td>

                                    {{-- STATUS --}}

                                    <td>

                                        @if($comment->status == 'approved')

                                            <span class="badge bg-success">

                                                {{ __('comments.approved') }}

                                            </span>

                                        @elseif($comment->status == 'pending')

                                            <span class="badge bg-warning">

                                                {{ __('comments.pending') }}

                                            </span>

                                        @elseif($comment->status == 'rejected')

                                            <span class="badge bg-danger">

                                                {{ __('comments.rejected') }}

                                            </span>

                                        @else

                                            <span class="badge bg-secondary">

                                                {{ $comment->status }}

                                            </span>

                                        @endif

                                    </td>


                                    {{-- DATE --}}

                                    <td>

                                        {{ $comment->created_at
                                            ? $comment->created_at->format('Y-m-d H:i')
                                            : '--'
                                        }}

                                    </td>


                                    {{-- ACTION --}}

                                    <td>

                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route(
                                                'admin.comments.edit',
                                                $comment->id
                                            ) }}"
                                            class="btn btn-sm btn-primary">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- DELETE --}}

                                        <form
                                            action="{{ route(
                                                'admin.comments.destroy',
                                                $comment->id
                                            ) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('{{ __('comments.delete_confirm') }}')">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="text-center">

                                        {{ __('general.no_data_found') }}

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>


                    {{-- Pagination --}}

                    <div class="mt-3">

                        {{ $comments->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
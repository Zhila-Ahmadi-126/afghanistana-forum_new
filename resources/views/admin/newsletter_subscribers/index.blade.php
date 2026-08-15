@extends('layouts.admin')

@section('title')

    {{ __('newsletter_subscribers.menu') }}

@endsection

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">

                    {{-- Header --}}

                    <div class="d-flex justify-content-between mb-4">

                        <h4>

                            {{ __('newsletter_subscribers.menu') }}

                        </h4>

                    </div>


                    {{-- Search --}}

                    <form
                        method="GET"
                        action="{{ route('admin.newsletter_subscribers.index') }}">

                        <div class="row mb-3">

                            <div class="col-md-5">

                                <input
                                    type="text"
                                    name="search"
                                    class="form-control"
                                    placeholder="{{ __('newsletter_subscribers.search_placeholder') }}"
                                    value="{{ request('search') }}">

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


                    {{-- Subscribers Table --}}

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>
                                        {{ __('newsletter_subscribers.email') }}
                                    </th>

                                    <th>
                                        {{ __('newsletter_subscribers.subscribed_at') }}
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                            @forelse($subscribers as $subscriber)

                                <tr>

                                    {{-- ID --}}

                                    <td>

                                        {{ $subscriber->id }}

                                    </td>


                                    {{-- Email --}}

                                    <td>

                                        {{ $subscriber->email }}

                                    </td>


                                    {{-- Date --}}

                                    <td>

                                        {{ $subscriber->created_at?->format('Y-m-d H:i') }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="3"
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

                        {{ $subscribers->links() }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
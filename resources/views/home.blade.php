@extends('layouts.app')

@section('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }

    </style>

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Short Links </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('components.generate-link')

                        <h3 class="mt-4">List Of Short Links.</h3>
                        <table class="table table-bordered table-sm ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Short Link</th>
                                    <th>Destination Link</th>
                                    <th>TTL</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody >
                                @forelse ($links as $key => $link)
                                    <tr >
                                        <td>{{ ++$key }}</td>
                                        <td>
                                            <a href="{{ url($link->default_short_url) }}"
                                                target="_blank">{{ $link->default_short_url ?? '' }}</a>
                                        </td>

                                        <td>{{ $link->destination_url ?? '' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($link->deactivated_at)->diffInMinutes($link->activated_at) ?? '' }}
                                            Minute(s)</td>
                                        <td>{{ \Carbon\Carbon::parse($link->activated_at)->ne($link->deactivated_at) ? 'Active' : 'Expired' }}
                                        </td>
                                        <td>
                                            @include('components.link-actions')
                                        </td>
                                       
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" >No Short links yet</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection

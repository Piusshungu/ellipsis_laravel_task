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
                    <div class="card-header"><a href="{{route('home')}}">All Short Links</a> / Update Short Links </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <form method="POST" action="{{ route('links.update', $link) }}">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="url" class="form-control"
                                        value="{{ $link->destination_url ?? '' }}" placeholder="URL" required>
                                    @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="number" min="6" name="ttl" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($link->deactivated_at)->diffInMinutes($link->activated_at) ?? '' }}"
                                        placeholder="TTL (Minutes)" required>
                                    @error('ttl')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Update Short Link</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('styles')
    <style>
        [x-cloak] { display: none !important; }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name ?? '' }} Profile</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="d-flex justify-content-between" x-data="{ showEditForm: false }">
                            <div class="p-3" x-show="!showEditForm">
                                <h4><b>{{ $user->name ?? '' }}</b></h4>
                                <div class="pb-3">
                                    <span class="pr-2">Email &nbsp;: </span>
                                    <span>{{ $user->email }}</span>
                                </div>

                                <div class="pb-3">
                                    <span class=" pr-2 pb-4">Joined &nbsp; : </span>
                                    <span class=" pb-4">{{ $user->created_at ?? '' }}</span>
                                </div>

                            </div>

                            <div x-cloak x-show="showEditForm">
                                @include('components.update-user')
                            </div>
                            <div class="ml-auto p-2">
                                <div class="text-right">
                                    <button @click="showEditForm = true" x-cloak x-show="!showEditForm"
                                        class="btn btn-primary btn-rounded">Edit Profile
                                    </button>
                                    <button @click="showEditForm = false" x-cloak x-show="showEditForm"
                                        class="btn btn-primary btn-rounded">Show Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection

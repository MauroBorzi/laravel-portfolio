@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="fs-3 text-center text-secondary mb-4">
            {{ __('Dashboard') }}
        </h2>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold">
                        {{ __('User Dashboard') }}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <p class="fs-5 text-secondary text-center">
                            Benvenuto nella tua dashboard! Qui puoi gestire i tuoi post e accedere alle varie funzionalità.
                        </p>

                        <div class="mt-4 d-flex justify-content-center gap-3">
                            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg shadow-sm px-4">
                                Vai a tutti i post
                            </a>

                            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg shadow-sm px-4">
                                Crea nuovo post
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card-header {
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }

        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
        }
    </style>
@endsection

@extends('layouts.posts')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-body">
                    <!-- Titolo -->
                    <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

                    <!-- Autore e categoria -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-muted mb-0">Autore: {{ $post->author }}</h6>
                        <span class="badge bg-info text-dark fs-6">{{ $post->category }}</span>
                    </div>

                    <hr>

                    <!-- Contenuto -->
                    <p class="fs-5 text-secondary">{{ $post->content }}</p>

                    <!-- Navigazione -->
                    <div class="mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg shadow-sm">
                            ← Torna a tutti i post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

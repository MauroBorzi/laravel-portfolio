@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body">

                        <!-- Titolo -->
                        <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

                        <!-- Autore e categoria -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-muted mb-0">Autore: {{ $post->author }}</h6>
                            <span class="badge bg-info text-dark fs-6 px-3 py-2 rounded-pill">
                                {{ $post->category }}
                            </span>
                        </div>

                        <hr>

                        <!-- Contenuto -->
                        <p class="fs-5 text-secondary lh-lg">
                            {{ $post->content }}
                        </p>

                        <!-- Navigazione -->
                        <div class="mt-4 d-flex gap-3 align-items-center">

                            <!-- Torna ai post -->
                            <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg shadow-sm px-4">
                                ← Torna a tutti i post
                            </a>

                            <!-- Modifica -->
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-lg shadow-sm"
                                title="Modifica">
                                <i class="bi bi-pencil-square fs-4"></i>
                            </a>

                            <!-- Elimina -->
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                onsubmit="return confirm('Sei sicuro di voler eliminare questo post?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-outline-danger btn-lg shadow-sm" title="Elimina">
                                    <i class="bi bi-trash3 fs-4"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

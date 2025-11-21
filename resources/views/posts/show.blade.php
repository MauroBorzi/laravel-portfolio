@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold rounded-top">
                        Dettagli del post
                    </div>

                    <div class="card-body p-4">

                        <!-- Titolo -->
                        <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

                        <!-- Immagine -->
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Immagine del post"
                                class="img-fluid rounded-4 shadow-sm mb-4"
                                style="max-height: 450px; object-fit: cover; width: 100%;">
                        @endif

                        <!-- Autore + Categoria -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">

                            <!-- Autore -->
                            <div class="text-muted fs-6 d-flex align-items-center gap-2">
                                <i class="bi bi-person-circle fs-5"></i>
                                <span class="fw-semibold">Autore:</span> {{ $post->author }}
                            </div>

                            <!-- Categoria con badge -->
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-semibold text-secondary mb-0 d-flex align-items-center gap-1">
                                    <i class="bi bi-folder-fill text-info"></i>
                                    Categoria:
                                </h6>

                                <span class="badge bg-info text-dark fs-6 px-3 py-2 rounded-pill shadow-sm">
                                    {{ $post->category->name }}
                                </span>
                            </div>

                        </div>

                        <!-- Tags -->
                        <div class="mt-3 mb-4 text-center">

                            <h6
                                class="fw-semibold text-secondary mb-3 d-flex justify-content-center align-items-center gap-2">
                                <i class="bi bi-tags-fill text-primary"></i>
                                Tags:
                            </h6>

                            @if ($post->tags->isNotEmpty())
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    @foreach ($post->tags as $tag)
                                        <span
                                            class="badge fs-6 px-3 py-2 rounded-pill shadow-sm d-flex align-items-center gap-2"
                                            style="background-color: {{ $tag->color }}; color: #222;">
                                            <i class="bi bi-tag-fill"></i>
                                            {{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted fst-italic mt-2">Nessun tag</p>
                            @endif

                        </div>

                        <hr>

                        <!-- Contenuto -->
                        <p class="fs-5 text-secondary lh-lg">
                            {{ $post->content }}
                        </p>

                        <hr class="my-4">

                        <!-- Pulsanti -->
                        <div class="mt-4 d-flex gap-3 align-items-center flex-wrap">

                            <a href="{{ route('posts.index') }}"
                                class="btn btn-primary btn-lg shadow-sm px-4 rounded-3 d-flex align-items-center gap-2 transition-ease">
                                <i class="bi bi-arrow-left-circle fs-4"></i> Torna ai post
                            </a>

                            <a href="{{ route('posts.edit', $post->id) }}"
                                class="btn btn-outline-warning btn-lg shadow-sm rounded-3 transition-ease">
                                <i class="bi bi-pencil-square fs-4"></i>
                            </a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                onsubmit="return confirm('Sei sicuro di voler eliminare questo post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-outline-danger btn-lg shadow-sm rounded-3 transition-ease">
                                    <i class="bi bi-trash3 fs-4"></i>
                                </button>
                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        /* Bottone hover */
        .transition-ease {
            transition: all 0.2s ease-in-out;
        }

        .transition-ease:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15) !important;
        }

        /* Badge ombreggiati */
        .badge {
            transition: 0.2s;
        }

        .badge:hover {
            transform: scale(1.05);
        }

        /* Testo più leggibile */
        p,
        h1,
        h6 {
            letter-spacing: 0.2px;
        }
    </style>
@endsection

@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold rounded-top">
                        Dettagli del post
                    </div>

                    <div class="card-body p-4">

                        <div class="row g-4 align-items-start">

                            {{-- COLONNA IMMAGINE --}}
                            @if ($post->image)
                                <div class="col-md-5">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="Immagine del post"
                                        class="img-fluid rounded-4 shadow-sm"
                                        style="max-height: 420px; object-fit: cover; width: 100%;">
                                </div>
                                <div class="col-md-7">
                                @else
                                    {{-- Se non c'è immagine, tutto centrato --}}
                                    <div class="col-12">
                            @endif

                            {{-- TITOLO --}}
                            <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

                            {{-- AUTORE + CATEGORIA --}}
                            <div class="d-flex justify-content-between flex-wrap align-items-center mb-4">

                                {{-- Autore --}}
                                <div class="text-muted fs-6 d-flex align-items-center gap-2">
                                    <i class="bi bi-person-circle fs-5"></i>
                                    <span class="fw-semibold">Autore:</span> {{ $post->author }}
                                </div>

                                {{-- Categoria --}}
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

                            {{-- TAGS --}}
                            <div class="mt-2 mb-4">

                                <h6 class="fw-semibold text-secondary mb-3 d-flex align-items-center gap-2">
                                    <i class="bi bi-tags-fill text-primary"></i>
                                    Tags:
                                </h6>

                                @if ($post->tags->isNotEmpty())
                                    <div class="d-flex flex-wrap gap-2">
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

                            {{-- CONTENUTO --}}
                            <p class="fs-5 text-secondary lh-lg">
                                {{ $post->content }}
                            </p>

                            <hr class="my-4">

                            {{-- BOTTONI --}}
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

                        </div> {{-- fine colonna testi --}}

                    </div> {{-- fine row immagine + dettagli --}}

                </div>
            </div>

        </div>
    </div>
    </div>

    <style>
        .transition-ease {
            transition: all 0.2s ease-in-out;
        }

        .transition-ease:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15) !important;
        }

        .badge {
            transition: 0.2s;
        }

        .badge:hover {
            transform: scale(1.05);
        }

        h1,
        p,
        h6 {
            letter-spacing: 0.2px;
        }
    </style>
@endsection

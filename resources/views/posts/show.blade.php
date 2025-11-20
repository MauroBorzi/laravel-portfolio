@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">

                        <!-- Titolo -->
                        <h1 class="fw-bold mb-3">{{ $post->title }}</h1>

                        <!-- Autore (sx) + Categoria (dx) -->
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">

                            <!-- Autore -->
                            <div class="text-muted fs-6 d-flex align-items-center gap-1">
                                <i class="bi bi-person-circle fs-5"></i>
                                <strong>Autore:</strong> {{ $post->author }}
                            </div>

                            <!-- Categoria a destra con badge accanto al nome -->
                            <div class="d-flex align-items-center gap-2">
                                <h6 class="fw-semibold text-secondary mb-0 d-flex align-items-center gap-1">
                                    <i class="bi bi-folder-fill text-info"></i>
                                    Categoria:
                                </h6>

                                <span class="badge bg-info text-dark fs-6 px-3 py-2 rounded-pill">
                                    {{ $post->category->name }}
                                </span>
                            </div>

                        </div>


                        <!-- TAGS -->
                        <div class="mt-3 mb-4 text-center">

                            <h6
                                class="fw-semibold text-secondary mb-2 d-flex justify-content-center align-items-center gap-1">
                                <i class="bi bi-tags-fill text-primary"></i>
                                Tags:
                            </h6>

                            @if ($post->tags->isNotEmpty())
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    @foreach ($post->tags as $tag)
                                        <span class="badge fs-6 px-3 py-2 rounded-pill d-flex align-items-center gap-2"
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
                                class="btn btn-primary btn-lg shadow-sm px-4 d-flex align-items-center gap-2">
                                <i class="bi bi-arrow-left-circle fs-4"></i> Torna a tutti i post
                            </a>

                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-lg shadow-sm">
                                <i class="bi bi-pencil-square fs-4"></i>
                            </a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                onsubmit="return confirm('Sei sicuro di voler eliminare questo post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-lg shadow-sm">
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

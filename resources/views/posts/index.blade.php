@extends('layouts.posts')

@section('content')
    <div class="container mt-5">

        <h1 class="mb-4 text-center text-secondary fw-bold">Tutti i Post</h1>

        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white fs-5 fw-semibold">
                Elenco completo dei post
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 35%">Titolo</th>
                                <th style="width: 25%">Autore</th>
                                <th style="width: 20%">Categoria</th>
                                <th style="width: 20%" class="text-center">Azioni</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="fw-semibold">
                                        <a href="{{ route('posts.show', $post->id) }}" class="post-link">
                                            {{ $post->title }}
                                        </a>
                                    </td>

                                    <td>{{ $post->author }}</td>

                                    <td>
                                        <span class="badge bg-info text-dark px-3 py-2 rounded-pill">
                                            {{ $post->category }}
                                        </span>
                                    </td>

                                    <td class="text-center d-flex justify-content-center gap-2">

                                        <!-- Modifica -->
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="btn btn-outline-warning btn-sm shadow-sm" title="Modifica">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>

                                        <!-- Elimina -->
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            onsubmit="return confirm('Sei sicuro di voler eliminare questo post?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-outline-danger btn-sm shadow-sm"
                                                title="Elimina">
                                                <i class="bi bi-trash3 fs-5"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4 d-flex justify-content-center gap-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg shadow-sm px-4">
                Torna alla dashboard
            </a>

            <a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg shadow-sm px-4">
                Crea nuovo post
            </a>
        </div>
    </div>

    <style>
        .post-link {
            text-decoration: none;
            color: inherit;
            transition: all 0.2s;
        }

        .post-link:hover {
            color: #0d6efd;
            text-decoration: underline;
        }

        .card-header {
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }
    </style>
@endsection

@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Tutti i Post</h1>

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 40%">Titolo</th>
                                <th style="width: 30%">Autore</th>
                                <th style="width: 30%">Categoria</th>
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
                                        <span class="badge bg-info text-dark">{{ $post->category }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mt-4 d-flex justify-content-between gap-3">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg shadow-sm">
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
            transition: color 0.2s;
            cursor: pointer;
        }

        .post-link:hover {
            color: #0d6efd;
            text-decoration: underline;
        }
    </style>
@endsection

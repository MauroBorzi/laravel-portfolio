@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold rounded-top">
                        Modifica il post
                    </div>

                    <div class="card-body p-4">

                        <form action="{{ route('posts.update', $post) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Titolo -->
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Titolo</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="title" id="title"
                                    value="{{ $post->title }}">
                            </div>

                            <!-- Autore -->
                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Autore</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="author" id="author"
                                    value="{{ $post->author }}">
                            </div>

                            <!-- Categoria -->
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-semibold">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select rounded-3 shadow-sm">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- TAGS -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tags</label>

                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($tags as $tag)
                                        <label for="tag-{{ $tag->id }}"
                                            class="tag-label px-3 py-2 rounded-pill shadow-sm"
                                            style="cursor: pointer; background-color: {{ $tag->color }}22; border: 1px solid {{ $tag->color }}55;">

                                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                id="tag-{{ $tag->id }}" class="d-none"
                                                @if ($post->tags->contains($tag->id)) checked @endif>

                                            <span class="fw-semibold" style="color: {{ $tag->color }}">
                                                {{ $tag->name }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Contenuto -->
                            <div class="mb-3">
                                <label for="content" class="form-label fw-semibold">Contenuto</label>
                                <textarea class="form-control rounded-3 shadow-sm" name="content" id="content" rows="6">{{ $post->content }}</textarea>
                            </div>

                            <!-- Bottone -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg shadow px-5 rounded-3">
                                    Salva modifiche
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.45) !important;
            border-color: #80bdff;
        }

        .tag-label {
            transition: all 0.2s;
        }

        .tag-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .tag-label input:checked+span {
            font-weight: bold;
            text-decoration: underline;
        }

        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-1px);
        }
    </style>
@endsection

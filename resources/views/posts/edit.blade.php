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

                        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- TITOLO --}}
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Titolo</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="title" id="title"
                                    value="{{ $post->title }}">
                            </div>

                            {{-- AUTORE --}}
                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Autore</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="author" id="author"
                                    value="{{ $post->author }}">
                            </div>

                            {{-- CATEGORIA --}}
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

                            {{-- TAGS --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tags</label>

                                <div class="d-flex flex-wrap gap-2">

                                    @foreach ($tags as $tag)
                                        <label for="tag-{{ $tag->id }}"
                                            class="tag-label px-3 py-2 rounded-pill shadow-sm d-flex align-items-center gap-1"
                                            style="cursor: pointer; background-color: {{ $tag->color }}22;
                                                   border: 1px solid {{ $tag->color }}55;">

                                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                id="tag-{{ $tag->id }}" class="d-none" @checked($post->tags->contains($tag->id))>

                                            <i class="bi bi-tag-fill" style="color: {{ $tag->color }}"></i>

                                            <span class="fw-semibold" style="color: {{ $tag->color }}">
                                                {{ $tag->name }}
                                            </span>
                                        </label>
                                    @endforeach

                                </div>
                            </div>

                            {{-- IMMAGINE --}}
                            <div class="mb-3">
                                <label for="image" class="form-label fw-semibold">Immagine</label>

                                <input id="image" name="image" type="file"
                                    class="form-control rounded-3 shadow-sm">

                                @if ($post->image)
                                    <div class="mt-3 text-center">
                                        <img src="{{ asset('storage/' . $post->image) }}"
                                            class="img-fluid rounded-3 shadow-sm"
                                            style="max-height: 200px; object-fit: cover;" alt="Immagine attuale">
                                    </div>
                                @endif
                            </div>

                            {{-- CONTENUTO --}}
                            <div class="mb-3">
                                <label for="content" class="form-label fw-semibold">Contenuto</label>
                                <textarea class="form-control rounded-3 shadow-sm" name="content" id="content" rows="6">{{ $post->content }}</textarea>
                            </div>

                            {{-- BUTTON --}}
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
        /* Focus */
        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.45) !important;
            border-color: #80bdff;
        }

        /* TAGS */
        .tag-label {
            transition: all 0.2s ease-in-out;
            user-select: none;
        }

        .tag-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .tag-label input:checked+i+span {
            text-decoration: underline;
            font-weight: bold;
        }

        /* Button hover */
        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-1px);
        }
    </style>
@endsection

@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold">
                        Modifica il post
                    </div>

                    <div class="card-body">

                        <form action="{{ route('posts.update', $post) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Titolo</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="title" id="title"
                                    value="{{ $post->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Autore</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="author" id="author"
                                    value="{{ $post->author }}">
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-semibold">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select rounded-3 shadow-sm">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Contenuto</label>
                                <textarea class="form-control rounded-3 shadow-sm" name="content" id="content" rows="6">
                                  {{ $post->content }}
                                </textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg shadow px-5">
                                    Modifica
                                </button>
                            </div>

                        </form>

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

        .form-control:focus {
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.45);
        }

        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
        }
    </style>
@endsection

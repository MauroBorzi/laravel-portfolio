@extends('layouts.posts')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-primary text-white fs-5 fw-semibold rounded-top">
                        Aggiungi un nuovo post
                    </div>

                    <div class="card-body">

                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Titolo</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="title"
                                    id="title">
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Autore</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="author"
                                    id="author">
                            </div>

                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-semibold">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select rounded-3 shadow-sm">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label fw-semibold">Contenuto</label>
                                <textarea class="form-control rounded-3 shadow-sm" name="content" id="content" rows="6"></textarea>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg shadow px-5 rounded-3">
                                    Crea
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

        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-1px);
            transition: all 0.2s;
        }
    </style>
@endsection

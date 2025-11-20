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

                            {{-- TITOLO --}}
                            <div class="mb-3">
                                <label for="title" class="form-label fw-semibold">Titolo</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="title"
                                    id="title">
                            </div>

                            {{-- AUTORE --}}
                            <div class="mb-3">
                                <label for="author" class="form-label fw-semibold">Autore</label>
                                <input type="text" class="form-control rounded-3 shadow-sm" name="author"
                                    id="author">
                            </div>

                            {{-- CATEGORIA --}}
                            <div class="mb-3">
                                <label for="category_id" class="form-label fw-semibold">Categoria</label>
                                <select name="category_id" id="category_id" class="form-select rounded-3 shadow-sm">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- TAGS --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tags</label>
                                <div class="d-flex flex-wrap gap-2">

                                    @foreach ($tags as $tag)
                                        <div class="tag-item">
                                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                                id="tag-{{ $tag->id }}" class="tag-checkbox d-none">
                                            <label for="tag-{{ $tag->id }}" class="tag-label">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            {{-- CONTENUTO --}}
                            <div class="mb-3">
                                <label for="content" class="form-label fw-semibold">Contenuto</label>
                                <textarea class="form-control rounded-3 shadow-sm" name="content" id="content" rows="6"></textarea>
                            </div>

                            {{-- BUTTON --}}
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
        /* Focus uniformato */
        .form-control:focus,
        .form-select:focus {
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.45) !important;
            border-color: #80bdff;
        }

        /* Tag come badge interattivi */
        .tag-label {
            padding: 6px 14px;
            border-radius: 20px;
            background: #e9ecef;
            cursor: pointer;
            transition: 0.2s;
            font-size: 0.9rem;
            border: 1px solid #ced4da;
        }

        .tag-label:hover {
            background: #d7e3ff;
            border-color: #0d6efd;
            color: #0d6efd;
        }

        /* Quando il tag è selezionato */
        .tag-checkbox:checked+.tag-label {
            background: #0d6efd;
            border-color: #0d6efd;
            color: white;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.5);
        }

        /* Button hover */
        .btn-primary:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-1px);
            transition: all 0.2s;
        }
    </style>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Artikel</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input value="{{ old('title', $article->title) }}" type="text" name="title"
                            class="form-control" id="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea name="content" class="form-control" id="content" rows="5"
                            required> {{ old('content', $article->content) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail (Opsional)</label>
                            <input type="file" name="thumbnail" class="form-control" id="thumbnail" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Artikel</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

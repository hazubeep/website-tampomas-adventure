@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Buat Artikel</h4>
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

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Konten</label>
                        <textarea name="content" class="form-control" id="content" rows="5" required></textarea>
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

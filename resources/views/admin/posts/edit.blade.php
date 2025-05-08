@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit galeri</h1>

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  

            <div class="form-group mb-3">
                <label for="title">Judul</label>
                <input value="{{ old('title', $post->title) }}" type="text" class="form-control" name="title" id="title" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="content">Konten</label>
                <input value="{{ old('content', $post->content) }}" type="text" class="form-control" name="content" id="content"
                    required>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="image">Gambar</label>
                <input value="{{ old('image',$post->image) }}" type="file" class="form-control" name="image" id="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">Edit</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

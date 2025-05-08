@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>New Post</h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input value="{{ old('title') }}" type="text" class="form-control" name="title" id="title" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="content">Content</label>
                <input value="{{ old('content') }}" type="text" class="form-control" name="content" id="content"
                    required>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input value="{{ old('image') }}" type="file" class="form-control" name="image" id="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-dark">Create Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

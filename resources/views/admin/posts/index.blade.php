@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
                <h1>Galeri</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('posts.create') }}" class="btn btn-primary">Buat baru</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="img img-thumbnail"
                                    width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
                <h1>Artikel</h1>
            </div>
            <div class="col-sm-4">
                <a href="{{ route('articles.create') }}" class="btn btn-primary">Buat baru</a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Penulis</th>
                    <th>Judul</th>
                    <th>konten</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td>{{ $article->id }}</td>
                        <td>{{ $article->user->name }}</td>
                        <td>{{Str::words($article->title, 5, '...' ) }}</td>
                        <td >{{Str::words($article->content, 10, '...' )}}</td>
                        <td>
                            @if ($article->thumbnail)
                                <img src="{{ asset('storage/' . $article->thumbnail) }}" class="img img-thumbnail"
                                    width="50">
                            @else
                                No Image
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('articles.edit', $article->id) }}">Edit</a>

                            <form action="{{ route('articles.destroy', $article->id) }}" method="post"
                                style="display: inline">
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
        {{-- {{ $posts->links() }} --}}
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    @session('welcome')
        <div class="alert alert-primary">{{ session('welcome') }}</div>
    @endsession

    <div class="container mt-5">
        <h1>Data</h1>
        <div class="row">
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-text">Data Galeri</h3>
                        <h1 class="card-text text-center">{{ $dataGallery }}</h1>
                        <u>
                            <a href="{{ route('posts.index') }}" class="nav-link">Lhat</a>
                        </u>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="card-text">Data Galeri</h3>
                        <h1 class="card-text text-center">{{ $dataGallery }}</h1>
                        <u>
                            <a href="{{ route('posts.index') }}" class="nav-link">Lhat</a>
                        </u>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

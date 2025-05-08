@extends('layouts.home')

@php
$paragraphs = explode("\n", trim($article->content) )
@endphp

@section('content')
<section class="show-article">


    <div class="container">
        <div class="thumbnail">
            <img src="{{ asset('storage/' . $article->thumbnail) }}" alt="thumbnail">
        </div>

        <h1 class="article-title">
            {{ $article->title }}
        </h1>

        <p class="meta"> <i class="fas fa-user"></i>By {{$article->user->name}}</p>

      @foreach ($paragraphs as $para)
          @if (trim($para) !== '')
        <p class="article-content">{{ $para }}</p>
              
          @endif
      @endforeach

<a href="{{route('welcome')}}" class="btn btn-primary">Kembali</a>      
    </div>
</section>
@endsection

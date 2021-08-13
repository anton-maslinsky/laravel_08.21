@extends('layouts.main')
@section('title')Список новостей - @parent @stop
@section('slug') @parent @stop
@section('content')
    @forelse($newsList as $news)
    <!-- Post preview-->
    <div class="post-preview">
        <a href="{{ route('news.show', ['id' => $news['id']]) }}">
            <h2 class="post-title">{{ $news['title'] }}</h2>
            <h3 class="post-subtitle">{{ $news['description'] }}</h3>
        </a>
        <p class="post-meta">
            Posted by
            <a href="#!">Admin</a>
            on {{ now()->format('d-m-Y H:i') }}
        </p>
    </div>
    <!-- Divider-->
    <hr class="my-4" />
    <!-- Pager-->
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a>
    </div>
    @empty
        <h2>Новостей пока нет...</h2>
    @endforelse
@endsection

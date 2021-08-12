@extends('layouts.main')
<h2>Список новостей</h2>
<br>
@forelse($newsList as $news)
    <div>
        <strong>
            <a href="{{ route('news.show', ['id' => $news['id']]) }}">
                {{ $news['title'] }}
            </a>
        </strong>
        <p>{{ $news['description'] }}</p>
    </div>
@empty
    <h2>Новостей пока нет...</h2>
@endforelse

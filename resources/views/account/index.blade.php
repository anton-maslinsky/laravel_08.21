@extends('layouts.app')
@section('content')
    <h1>Приветствую, {{ Auth::user()->name }}</h1>
    <br>
    <p>Кабинет пользователя</p>
    <br>
    <p><a href="{{ route('admin.index') }}">Перейти в админку</a></p>
@endsection

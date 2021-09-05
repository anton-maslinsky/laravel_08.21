@extends('layouts.app')
@section('content')
    <h1>Приветствую, {{ Auth::user()->name }}</h1>
    <br>
    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" style="width: 50px">
    @endif
    <p>Кабинет пользователя</p>
    <br>
    <p><a href="{{ route('admin.index') }}">Перейти в админку</a></p>
@endsection

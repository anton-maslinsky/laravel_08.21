@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Панель администратора</h1>
    </div>
    <div class="row" style="display: block">
        <p>Всего новостей: {{ $countNews }}</p>
        <br>
        <p>Всего Категорий: {{ $countCategories }}</p>
    </div>
@endsection

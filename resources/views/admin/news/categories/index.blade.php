@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Категории</h1>
        <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Добавить категорию</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Название</th>
                        <th>Дата добавления</th>
                        <th>Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category['title'] }}</td>
                            <td>{{ now()->format('d-m-Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', ['news' => $category['id']]) }}" style="font-size: 12px;">Редактировать </a>
                                <a href="javascript:;" style="font-size: 12px; color: red;">   Удалить</a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Новостей не найдено</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

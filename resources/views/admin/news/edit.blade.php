@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать новость</h1>
        <a href="{{ route('admin.news.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> К списку новостей</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            @include('inc.message')
            <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="0">Выбрать категорию</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if($news->category_id === $category->id) selected @endif>
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $news->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Текст</label>
                    <textarea type="text" class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                    <input type="text" class="form-control" name="author" id="author" value="{{ $news->author }}">
                </div>
                <div class="form-group">
                    <label for="image">Изображение</label>
                    <input type="file" class="form-control" name="image" id="image" value="{{ $news->image }}">
                </div>
                <div class="form-group">
                    <label for="status">Статус</label>
                    <select class="form-control" name="status" id="status">
                        <option value="DRAFT" @if($news->status === 'DRAFT') selected @endif>DRAFT</option>
                        <option value="PUBLISHED" @if($news->status === 'PUBLISHED') selected @endif>PUBLISHED</option>
                        <option value="BLOCKED" @if($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
                    </select>
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

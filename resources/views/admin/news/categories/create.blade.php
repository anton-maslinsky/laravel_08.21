@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Создать категорию</h1>
        <a href="{{ route('admin.categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> К списку категорий</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="table-responsive">
            @include('inc.message')
            <form method="post" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="col-5 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea type="text" class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="col-5 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
@endsection

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
        @include('inc.message')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Текст</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at}}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" style="font-size: 12px;">Редактировать </a>
                            <a href="javascript:;" rel="{{ $category->id }}" class="delete" style="font-size: 12px; color: red;">   Удалить</a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Записей нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        $(function() {
            $(".delete").on('click', function() {
                var id = $(this).attr('rel');
                if(confirm("Подтверждаете удаление записи c ID #" + id + " ?")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "DELETE",
                        url: "/admin/categories/" + id,
                        dataType: 'json',
                        success: function(response) {
                            alert("Запись была удалена");
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endpush


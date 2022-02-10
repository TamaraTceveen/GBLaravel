@extends('layouts.admin')

@section('header')
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" type="button"
               class="btn btn-sm btn-outline-secondary">Добавить категорию</a>

        </div>
    </div>
@endsection


@section('content')
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#ID</th>
                <th>Категория</th>
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categoriesList as $categories)
                <tr>
                    <td>{{ $categories->id }}</td>
                    <td>{{ $categories->title }}</td>
                    <td>{{ $categories->description }}</td>
                    <td>{{ $categories->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $categories]) }}">Ред.</a> &nbsp;
                        <a href="javascript:;" class="delete" rel="{{ $categories->id }}">Уд.</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $categoriesList->links() }}
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function (){
            const el = document.querySelectorAll('.delete');
            el.forEach(function (e, k) {
                e.addEventListener('click', function (){
                    const id = this.getAttribute('rel');
                    if (confirm(`Подтвердите удаление категории с #ID ${id} ?`)){
                        send('/admin/categories/' + id).then(() => {
                            location.reload();
                        })
                    }
                });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush


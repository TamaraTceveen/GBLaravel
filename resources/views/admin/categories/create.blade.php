@extends('layouts.admin')

@section('header')
    <h1 class="h2">Добавить запись</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" type="button"
               class="btn btn-sm btn-outline-secondary">Добавить категорию</a>

        </div>
    </div>
@endsection


@section('content')
    @include('inc.message')
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection


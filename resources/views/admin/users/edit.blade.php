@extends('layouts.admin')

@section('header')
    <h1 class="h2">Редактировать пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.users.create') }}" type="button"
               class="btn btn-sm btn-outline-secondary">Добавить запись</a>

        </div>
    </div>
@endsection


@section('content')
    @include('inc.message')
    <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="is_admin">Изменить права доступа</label>
            <select name="is_admin" id="is_admin" class="form-control">
                <option @if($user->is_admin === '1') selected @endif>1</option>
                <option @if($user->is_admin === '0') selected @endif>0</option>
            </select>
        </div>

        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection


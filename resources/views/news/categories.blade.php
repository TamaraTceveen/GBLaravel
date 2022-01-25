@extends('layouts.main')

@section('title')
    Категории новостей @parent
@stop

@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список новостных категорий</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <ul>
    @foreach ($categoriesList as $category)
            <li>
                <a href="{{ route('categories.show', ['id' => $category['id']]) }}">
                    {{ $category['categoryName'] }}
                </a>
            </li>

    @endforeach
        </ul>
    </div>
@endsection

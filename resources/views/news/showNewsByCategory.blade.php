@extends('layouts.main')

@section('title')
    Категории новостей @parent
@stop

@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Список новостей в категории {{ $categoriesList[0]['categoryName'] }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">

<ul>
    @foreach ($categoriesList as $category)
        <li>
            <a href="{{ route('news.show', ['id' => $category['news_id']]) }}">
                {{ $category['title'] }}
            </a>
        </li>

    @endforeach
</ul>
    </div>
@endsection
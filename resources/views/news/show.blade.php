@extends('layouts.main')

@section('title')
    {{ $newsList['title'] }} @parent
@stop

@section('header')
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $newsList['title'] }}</h1>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">

    <p>Author: {{ $newsList['author'] }} &nbsp; Date: {{ $newsList['created_at'] }}</p>
    <p class="card-text">{{ $newsList['description'] }}</p>

</div>
@endsection

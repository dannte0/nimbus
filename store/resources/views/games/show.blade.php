@extends('layouts.main')

@section('title',  $game->title)

@section('content')

    <div class="container" id="container-show">
        <div>
            <img src="{{ $game->cover_image }}" alt="{{ $game->title }}">
        </div>
            <div class="text-content">
                <h1>{{ $game->title }}</h1>
                <h5>Developer : {{ $game->developer }}</h5>
                <p class="desc">{{ $game->description }}</p>
                <a class="btn btn-primary w-25 mt-3 align-self-end" href="#">Install</a>
            </div>
    </div>

@endsection
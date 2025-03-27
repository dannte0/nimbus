@extends('layouts.main')

@php
$games = Auth::user()->games()->orderBy('created_at', 'desc')->take(5)->get()
@endphp

@section('title', 'Profile')

@section('content')
    <div class="container" id="container-profile">
        <div class="box-profile">
            <div class="info-profile">
                <img src="{{Auth::user()->image}}" alt="{{Auth::user()->name}}">
                <h1>{{Auth::user()->name}}</h1>
            </div>
      
            <div class="game-list">
            <h2>Games crated:</h2>
            @foreach ($games as $game )
                <div class="info-profile" style="margin-top:50px">
                        <div id="game-cover">
                            <img src="{{ $game->cover_image }}" alt="{{ $game->title }}">
                        </div>
                        <div id="game-info">
                            <h3>{{ $game->title }}</h3>
                            <h6>{{ $game->created_at->format('d/m/Y') }}</h6>
                            <p>{{ $game->description }}</p>
                                <a class="btn btn-primary float-end me-2" href="{{ route('games.show', ['game'=> $game])}}">See</a>
                        </div>
                </div>
            @endforeach
        </div>

        </div>
    </div>
@endsection
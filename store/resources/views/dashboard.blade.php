@extends('layouts.main')

@section('title', 'My games')

@section('content')

<div class="container">
    <div class="row">
    @foreach ($games as $game)
        <div id="dashboard-card">
            <div>
                <img src="{{$game->cover_image}}" alt="{{ $game->title }}">
            </div>
            <h1>{{ $game->title }} <i class="bi bi-patch-check-fill fs-4"></i></h1>
            <p>{{ $game->description }} </p>
            @if ($game->is_for_kids)
                <p>Is for kids.</p>
            @else
                <p>Is n't for kids.</p>
            @endif
            <p>Age rating: for {{ $game->age_rating }}. </p>
            <a class="btn btn-primary float-end" href="{{ route('games.show', ['game'=> $game])}}">Page</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
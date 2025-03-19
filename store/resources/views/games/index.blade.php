@extends('layouts.main')

@section('title', 'Welcome')

@section('content')
@foreach ($games as $game )

<img src="{{ $game->cover_image}}" alt="">
<p>{{ $game->title }}</p>
    
@endforeach
@endsection
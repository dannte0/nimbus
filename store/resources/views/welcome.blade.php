@extends('layouts.main')

@section('title', 'Home')

@section('content')
<div class="welcome">
    <div class="container">
        @include('components.carousel')
    <div class="container">
        <div class="d-flex row justify-content-center align-itens-center">
            @include('components.card')
        </div>
    </div>
</div>
</div>
@endsection
@extends('layouts.main')

@section('title', 'Games')

@section('content')
<div class="index">
    <div class="container">
        <div class="row">
            @include('components.card')
        </div>
    </div>
</div>
@endsection
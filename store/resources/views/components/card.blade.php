@foreach ($games as $game)

<div class="card col-md-4 m-3" style="width: 18rem; background-color:#1A1A1A; font-family: Poppins;">
    <div class="mx-auto" style="width: 200px;">
        <img src="{{ $game->cover_image }}" class="mt-1" alt="{{ $game->title }}" >
    </div>
    <div class="card-body p-2 desc">
        <h1 class="card-text title">{{ $game->title }}</h1>
        <div class="card-footer p-0">
            <p class="card-text desc truncate-multiline">{{ $game->description }}</p>
            <a class="btn btn-primary float-end" href="{{ route('games.show', ['game'=> $game])}}">Install</a>
        </div>
    </div>
</div>

@endforeach
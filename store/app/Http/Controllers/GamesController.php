<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Models\Game;
use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{

    public function welcome(Request $request) : View
    {
        $games = Game::latest()
        ->limit(20)
        ->get();

        $search = $request->input('search');

        if($search){
            $games = Game::where('title', 'like', '%'. $search . '%')
            ->limit(15)
            ->get();

            return view('games.index',[
                'games' => $games
            ]);
        }


        return view('welcome',[
            'games'=> $games  
        ]);
    }
     
    public function index()
    {
        $games = Game::latest()->paginate();

        return view('games.index',[
                'games'=> $games  
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   
    public function store(GameRequest $request)
    {

        $validated =  $request->validated();

      // Cria uma instância do Cloudinary
      $cloudinary = new Cloudinary([
        'cloud' => [
            'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
            'api_key'    => env('CLOUDINARY_API_KEY'),
            'api_secret' => env('CLOUDINARY_API_SECRET'),
        ],
    ]);

    // Upload da imagem de capa (coverimage)
    if ($request->hasFile('cover_image')) {
        $uploadedCoverImage = $cloudinary->uploadApi()->upload($request->file('cover_image')->getRealPath(), [
            'folder' => 'games/covers', // Pasta onde o arquivo será salvo
            'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET', 'laravel_upload') // Upload Preset
        ]);
        $validated['cover_image'] = $uploadedCoverImage['secure_url']; // Salva a URL da imagem
    }


        $validated['publisher'] = Auth::user()->name;
        $validated['developer'] = Auth::user()->name;

    
        $validated['user_id'] = Auth::user()->id;

        $game = Game::create($validated);

        $game->setIsForKids($validated['isforkids']);
        $game->setPublisherAndDeveloper();
        $game->setAgeRating($validated['isforkids'], $validated['agerating']);

        // Define a classificação etária
        $game->save();

        return redirect()->route('dashboard')->with('msg', 'Game registered sucessful!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('games.edit', [
            'game' => $game
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}

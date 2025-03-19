<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Carbon\Carbon;
use Cloudinary\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function welcome()
    {
        return view('welcome');
    }
     
    public function index()
    {
        $games = Game::latest()->get();

        return view(
            'games.index',
            [
                'games'=> $games  
            ]
        );
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
   
    public function store(Request $request)
    {

        $validated =  $request->validate([
            'title' => ['required', 'max:40', 'min:3', 'unique:'. Game::class],
            'description' => ['required', 'min:200', 'max:350'],
            'genre' => ['required', 'max:150', 'min:3'],
            'developer' => ['required', 'max:150', 'min:3'],
            'publisher' => ['required', 'max:150', 'min:3'],
            'isforkids' => ['required', 'boolean'],
            'agerating' => ['required', 'max:50'],
            'cover_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

        $validated['publisher'] = Auth::user()->name;
        $validated['developer'] = Auth::user()->name;

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


        $game = Game::create($validated);

         // Define o publisher e o developer
        $game->setPublisherAndDeveloper();

        // Define a classificação etária
        $game->setAgeRating($request->isforkids, $request->agerating);

        $game->save();

        return redirect()->route('dashboard')->with('msg', 'Game registered sucessful!');

        
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);

        return redirect()->route('games.show')->with($game);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

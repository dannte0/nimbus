<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Carbon\Carbon;
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
            'isforkids' => ['required', 'boolean'],
            'agerating' => ['required', 'max:50'],
            'cover_image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'banner_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
        ]);

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

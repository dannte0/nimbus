<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Exception;
use Illuminate\Http\Request;

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
        $games = Games::all();

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

        $gameData = [
            'title' => $request->title,
            'description' => $request->description,
            'cover_image' => $request->coverimage,
            'release_date' => $request->releasedate,
            'genre' => $request->genre
        ];

        $validated =  $request->validate([
            'title' => ['required|max:255|unique:' . Games::class],
            'description' => ['required|min:200|max:350|unique:' . Games::class],
            'cover_image' => ['nullable'],
            'review' => ['nullable|integer|min:0|max:5'],
            'release_date' => ['required|date|date_format:Y-m-d'],
            'genre' => ['required|max:150|min:3'],
            // 'developer' => ['required|max:255|min:3'],
            // 'publisher' => ['required|max:255|min:3'],
        ]);

        if($validated){
            $game = Games::create($gameData);

            $game->save();

            return redirect()->route('dashboard')->with('msg', 'Game registered sucessful!');

        }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Games $games)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Games $games)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Games $games)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Games $games)
    {
        //
    }
}

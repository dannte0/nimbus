@extends('layouts.main')

@section('title', 'Register a game')

@section('content')
    <body class="register">
        <div class="container">
                <form method="POST" action="{{ route('games.store')}}" class="form" enctype="multipart/form-data">
                @csrf
                <div class="group">
                <h1>Register your game!</h1>
                <h5>Type a little bit about your game.</h5>
                <img id="blah" class="image"/>
                <p>Choice a cover to the game</p>
                <p class="text-light">{{ $errors }}</p>
                <input type="file" accept="img/*" class="form-control my-5 w-75" name="cover_image" id="imgInp">
                @error('coverimage')
                <span style="color: #ff0000">{{ $message }}</span>
                @enderror
                </div>
                <div class="group">
                    
                            <label for="Title">Title:</label>
                            <input class="form-control" type="text" placeholder="" name="title">
                            @error('title')
                                <span style="color: #ff0000">{{ $message }}</span>
                            @enderror
                        
                            <label for="Description">Description:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            @error('description')
                            <span style="color: #ff0000">{{ $message }}</span>
                            @enderror
                        
                            <label for="Publisher">Genre:</label>
                            <input class="form-control" type="text" placeholder="" name="genre">
                            @error('genre')
                            <span style="color: #ff0000">{{ $message }}</span>
                            @enderror
                            
                            <div class="form-check form-switch mt-4">
                            <label for="Publisher">Can it be recommended for kids?</label>
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked name="isforkids">
                            @error('isforkids')
                            <span style="color: #ff0000">{{ $message }}</span>
                            @enderror
                            <input type="hidden" id="switchValue" name="isforkids" value="1">
                            </div>

                            <input type="hidden" id="switchValueAgeRating" name="agerating" value="everyone">
                            <div id="additionalOptions" style="display:none">
                                <label for="agerating" class="mt-2 mb-2">Select an age rating:</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="agerating" id="option1" value="10-12">
                                    <label class="form-check-label" for="option1">10-12 years old</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="agerating" id="option2" value="14-16">
                                    <label class="form-check-label" for="option2">14-16 years old</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="agerating" id="option3" value="18+">
                                    <label class="form-check-label" for="option2">18+ years old</label>
                                </div>
                            </div>
                            @error('agerating')
                            <span style="color: #ff0000">{{ $message }}</span>
                            @enderror       
                            
                            <input class="form-control" type="text" placeholder="" name="publisher" value="{{ Auth::user()->name }}">
                            <input class="form-control" type="text" placeholder="" name="developer" value="{{ Auth::user()->name }}">

                            <button class="btn btn-primary mt-5 float-end" type="submit">Submit</button>

                </div>
                </form>
        </div>
    </body>
@endsection
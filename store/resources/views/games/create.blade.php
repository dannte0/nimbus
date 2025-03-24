@extends('layouts.main')

@section('title', 'Register a game')

@section('content')
    <body class="register">
        <div class="container">
                <form method="POST" action="{{ route('games.store')}}" id="myForm" class="form" enctype="multipart/form-data">
                @csrf
                <div class="group">
                <h1>Register your game!</h1>
                <h5>Type a little bit about your game.</h5>
                <img id="blah" class="image"/>
                @error('cover_image')
                <p>
                    <span style="color: #ff0000">{{ $message }}</span>
                </p>
                @enderror
                <p>Choice a cover to the game</p>
                
                <input type="file" accept="img/*" class="form-control my-5 w-75" name="cover_image" id="imgInp">
                </div>
                <div class="group">
                    
                            <label for="Title">Title:</label>
                            <input class="form-control" type="text" placeholder="" name="title" value="{{ old('title') }}">
                            @error('title')
                            <p>
                                <span style="color: #ff0000">{{ $message }}</span>
                            </p>
                            @enderror
                        
                            <label for="Description">Description:</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"> {{ old('description') }}</textarea>
                            @error('description')
                            <p>
                                <span style="color: #ff0000">{{ $message }}</span>
                            </p>
                            @enderror
                        
                            <label for="Publisher">Genre:</label>
                            <input class="form-control" type="text" placeholder="" name="genre" value="{{ old('genre') }}">
                            @error('genre')
                            <p>
                                <span style="color: #ff0000">{{ $message }}</span>
                            </p>
                            @enderror
                            
                            <div class="form-check form-switch mt-4">
                            <label for="Publisher">Can it be recommended for kids?</label>
                            <input type="hidden" id="switchValue" name="isforkids" value="0">

                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked name="isforkids" value="1">
                            @error('isforkids')
                            <p>
                                <span style="color: #ff0000">{{ $message }}</span>
                            </p>
                            @enderror
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
                            <p>
                                <span style="color: #ff0000">{{ $message }}</span>
                            </p>
                            @enderror       
                            <input type="hidden" placeholder="" name="publisher" value="{{ Auth::user()->name }}">
                             <input type="hidden" placeholder="" name="developer" value="{{ Auth::user()->name }}">

                            <button class="btn btn-primary mt-5 float-end" type="submit">Submit</button>

                </div>
                </form>
        </div>
    </body>
@endsection
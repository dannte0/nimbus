@extends('layouts.main')

@section('title', 'Register a game')

@section('content')
    <body class="register">
        <div class="container">
            <div class="form">
                <div class="group">
                <h1>Register your game!</h1>
                <h5>Type a little bit about your game.</h5>
                <img id="blah" class="image" src="{{ './img/assets/imagegame.png' }}" />
                <p>Choice a cover to the game</p>

                <input type="file" accept="image/*" class="form-control my-5 w-75" name="image" id="imgInp">
                </div>
                <div class="group">
                    <label for="Title">Title:</label>
                    <input class="form-control" type="text" placeholder="" >
                
                    <label for="Description">Description:</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                
                    <label for="Publisher">Publisher:</label>
                    <input class="form-control" type="text" placeholder="" >

                    <button class="btn btn-primary mt-5 float-end" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </body>
@endsection
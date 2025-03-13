@extends('layouts.main')

@section('title', 'Welcome')

@section('content')
<div class="welcome">
    <div class="container">
        <div class="carrossel absolute">
            <div id="carouselExampleRide" class="carousel slide carousel-fade" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleRide" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ './img/wallpapersden.com_k-lonely-japanese-city_3840x2165.jpg' }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ './img/wallpaper.jpg' }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ './img/thumb-1920-1354012.png' }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="d-flex row justify-content-center align-itens-center">
            <div class="card col-md-4 m-3" style="width: 18rem; background-color:#1A1A1A; font-family: Poppins;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body desc">
                    <p class="card-text title">Some</p>
                    <div class="card-footer ">
                        <p class="card-text desc">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <button class="btn btn-primary" type="submit">Button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
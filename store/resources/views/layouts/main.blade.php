<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ './img/assets/favicon.ico' }}" />
    <title>@yield('title')</title>
    <!-- Links -->
        <!-- CSS -->
         <link rel="stylesheet" href="{{'./css/styles.css'}}">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!-- Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">

    <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #1A1A1A">
  <div class="container-fluid">
  <a class="navbar-brand p-0" href="{{ route('games.index') }}"><img src="{{ './img/assets/logoazul.png'}}" height="80px" alt="nimbus"></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('games.index') }}">Games</a>
        </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('games.index') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('games.index') }}">Suport</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
     
    </div>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-5">
      @guest
      <li class="nav-item me-2">
        <a class="nav-link" aria-current="page" href="{{ route('register') }}">Register</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-outline-primary" aria-current="page" href="{{ route('login') }}">Login</a>
      </li>
      @endguest
    @auth
        <li class="nav-item dropdown px-4 me-5 ">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="{{ './img/celeste.png' }}" class="user-picture" alt="perfil">
          {{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu" style="background-color: #1A1A1A;">
            <li><a class="dropdown-item text-light" href="{{ route('profile.edit') }}"><i class="bi bi-person-fill text-light"></i> Profile</a></li>
            <li><a class="dropdown-item text-light" href="{{ route('game.register') }}"><i class="bi bi-plus-circle text-light"></i>  Register your game</a></li>
            <li><a class="dropdown-item text-light" href="{{ route('dashboard') }}"><i class="bi bi-folder text-light"></i>  My games</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-light" href="#"><i class="bi bi-gear text-light"></i> Settings</a></li>
            <form method="POST" action="{{ route('logout') }}">
            @csrf
            <li><a class="dropdown-item text-danger" href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"><i class="bi bi-box-arrow-left"></i> Logout</a></li>
            </form>
          </ul>
        </li>
        @endauth
      </ul>
  </div>
</nav>
</head>

<body>
    @yield('content')
</body>
<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script src="{{ './js/script.js' }}"></script>
</html>
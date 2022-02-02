<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
    </script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    <title>{{env('APP_NAME')}}</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
          

<ul class="navbar-nav ml-auto">
@auth
        <li class="nav-item">
            <a href="{{route('airplanes.index')}}" class="nav-link">Airplanes</a>
        </li>
        <li class="nav-item">
            <a href="{{route('airplanes.create')}}" class="nav-link">Create Airplane</a>
        </li>
        <li class="nav-item">
        <a href="{{route('bids.index')}}" class="nav-link">User Bids</a>
        </li>
        <li class="nav-item ">
           
                <a class="nav-link" href="#" >{{ Auth::user()->name }} </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{route('home')}}">
                    Dashboard
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    Logout
                </a>
                </li>
                <li class="nav-item">
                <form class="nav-link" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                </li>
            </div>
        </li>
    @else
        <li class="nav-item">
            <a href="{{route('login')}}" class="nav-link">Login</a>
        </li>
        <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">Register</a>
        </li>

    @endauth
    </ul>
      </div>
    </div>
</nav>
    <div id="app">
        <app>


        <router-view></router-view>
        </app>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Isko Get Fit</title>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dynamic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/light.css') }}" rel="stylesheet">


    <link rel="fav icon" href="{{ url('photos/IGFlogo.png') }}" >
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                @guest
                <a class="navbar-brand navbar mr-auto" href="{{ url('/') }}">
                    Isko Get Fit
                </a>
                @else
                <a class="navbar-brand mr-auto" href="/profile/{{ Auth::user()->username}}">
                    {{ Auth::user()->username }}
                </a>

                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Center Side Of Navbar -->
                    @guest

                    @else
                    <ul class="navbar-nav mx-auto" style="align-items: center; justify-content: center; display: flex;">
                        <div>
                            <li>
                                <a class="" style="position: center; padding: none; margin:none;" href="{{ url('/home') }}">
                                <img style="width:45px; height:45px; " src="{{ url('photos/IGF logo.png') }}" />
                                </a>
                            </li>
                        </div>
                    </ul>
                    @endguest


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        @guest
                        

                        @else  
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <!-- this is where edit profile go -->


                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                        @endguest
                    </ul>
                <!-- </div> -->
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>  

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <script src="{{ asset('js/weightcal.js') }}"></script>
</body>
</html>

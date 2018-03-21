

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}" />
    <link rel="stylesheet" href="/res/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/res/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="/res/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/res/css/jquery.selectBoxIt.css" />
    <link rel="stylesheet" href="/css/back.css" />
    <link rel="stylesheet" href="/css/charts.css" />

    <script src="/res/js/jquery.js"></script>
    <script src="/res/js/Chart.js"></script>

</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    الرئيسيه
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <img src="/uploaded/{{Auth::user()->img}}" style="width:30px; height:30px;border-radius:100%" />
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        تسجيل الخروج
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="/res/js/jquery.nicescroll.min.js"></script>
    <script src="/res/js/jquery-ui.min.js"></script>
    <script src="/res/js/bootstrap.min.js"></script>
    <script src="/res/js/jquery.selectBoxIt.min.js"></script>
    <script src="/js/back.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{$title}}</title>
    <link rel="shortcut icon" href="img/store.ico" />
    

    <link rel="shortcut icon" href="img/store.ico" />
    <!-- Styles -->
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
    <nav class="navbar navbar-inverse mynav">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                <a class="navbar-brand" href="{{route('dashboard')}}">الرئيسيه</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">


                    <li><a href="/store">المخازن</a></li>
                    <li><a href="/chart">الاحصائيات</a></li>
                    <li><a href="/covenant">العهد</a></li>
                    <li><a href="/user">المستخدمين</a></li>

                </ul>
                <ul class="nav navbar-nav pull-right main-nav-menu">
                    <li class="notify-parent">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle notification" type="button" data-toggle="dropdown">
                                      
                                <span class="notify" id="notify">{{count($notifies)}}</span>
                                <i id="notification" class="fa fa-bell-o fa-lg"></i>
                            </button>

                            <ul class="dropdown-menu" id="notify-list">
                                @foreach ($notifies as $notify)
                                <li><a href="/editaction?itemid={{$notify->requerd_num}}">{{$notify->notify}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </li>
                    @guest
                    @else
                    <li class="user">
                       
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" v-pre>
        
                                            <span class="caret"></span>
                                            <bdi>{{Auth::user()->name}}</bdi>
                                            <input type="hidden" id="emp" value="{{Auth::user()->id}}">
                    
                                            <img src="{{url('/uploaded') . "/" . Auth::user()->img}}" />
                                            
                                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">الملف الشخصي</a></li>
                                <li><a href="/modify?id={{Auth::id()}}">تعديل</a></li>
                                <li class="divider"></li>

                                <li><a href="{{ route('logout') }}" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    تسجيل خروج
                                </a>
                                </li>

                            </ul>

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
    

    <!-- Scripts -->
    <script src="/res/js/jquery.nicescroll.min.js"></script>
    <script src="/res/js/jquery-ui.min.js"></script>
    <script src="/res/js/bootstrap.min.js"></script>
    <script src="/res/js/jquery.selectBoxIt.min.js"></script>
    <script src="/js/back.js"></script>
    <script src="/js/notify.js"></script>

</body>

</html>





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

<div class="container-fluid">
    <div class="row">

        <div class="hidden-sm hidden-xs col-md-2 main-aside">

            <!--Start Aside Bar -->
            <div class="aside">
                <img width="80%" alt="main logo" class="main-logo" src="/img/main-logo.png" />
                <hr>
                <h3 class="text-center"><bdi>{{Auth::user()->name}}</bdi> <img src="/uploaded/{{Auth::user()->img}}" /></h3>

                <h4 class="text-muted text-uppercase"><bdi>الرئيسـيه</bdi></h4>

                <ul class="aside-ul">
                    <li class="down-menu"><i class="fa fa-chevron-left"></i> <bdi>المستديم</bdi></li>
                    <ul class="open">
                        <li><a href="#">اضافه</a></li>
                        <li><a href="#">توزيع</a></li>
                        <li><a href="#">احصائيات</a></li>
                    </ul>
                    <li class="down-menu"><i class="fa fa-chevron-left"></i> <bdi>الخامات</bdi></li>
                    <ul class="open">
                        <li><a href="#">اضافه</a></li>
                        <li><a href="#">توزيع</a></li>
                        <li><a href="#">احصائيات</a></li>
                    </ul>
                    <li class="down-menu"><i class="fa fa-chevron-left"></i> <bdi>المستهلك</bdi></li>
                    <ul class="open">
                        <li><a href="#">اضافه</a></li>
                        <li><a href="#">توزيع</a></li>
                        <li><a href="#">احصائيات</a></li>
                    </ul>

                    <li class="down-menu"><i class="fa fa-chevron-left"></i> <bdi>الكهنه</bdi></li>
                    <ul class="open">
                        <li><a href="#">اضافه</a></li>
                        <li><a href="#">توزيع</a></li>
                        <li><a href="#">احصائيات</a></li>
                    </ul>
                </ul>

                <div class="aside-footer">
                    <ul class="list-unstyled">
                        <li><a href="#" class="btn" data-toggle="modal" data-target="#clock"><i class="fa fa-clock-o fa-2x"></i></a></li>
                        <li><a href="#" class="btn"><i class="fa fa-user"></i></a></li>
                        <li><a href="{{ route('logout') }}" class="btn" 
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i></a></li>
                    </ul>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </div>
            <!--End Aside Bar -->

        </div>

        <div class="modal fade" id="clock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">السجل</h4>
                        </div>
                        <div class="modal-body">
    
                            <div style="max-width:100%;" id="datepicker"></div>
    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-md-10 main-content">
            <nav class="navbar navbar-inverse main-nav">

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
                                                    <span class="notify" id="notify"></span>
                                                    <i class="fa fa-bell-o fa-lg"></i>
                                                </button>
            
                                        <ul class="dropdown-menu" id="notify-list"></ul>
            
                                    </div>
                                </li>
                                @guest
                                @else
                                <li class="user">
                                   
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" v-pre>
                    
                                                        <span class="caret"></span>
                                                        <bdi>{{Auth::user()->name}}</bdi>
                                
                                                        <img src="uploaded/{{Auth::user()->img}}" />
                                                        
                                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">الملف الشخصي</a></li>
                                            <li><a href="#">تعديل</a></li>
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

            </nav>



            <!--START container body -->

            <!--Start Content -->
            <div class="content">
                <h2 class="text-center"><bdi>المخـــازن العــامـه</bdi></h2>
                <hr />
                <div class="content-box">
                    <div class="box">
                        <span class="num">{{$covenetNum}}</span>
                        <i class="fa fa-shopping-bag pull text-muted"></i>
                        <p class="des"><bdi>العٌهد</bdi></p>
                        <a href="/covenant"><i class="fa fa-arrow-right"></i> <bdi>تفاصيل</bdi></a>

                    </div>

                    <div class="box">
                        <span class="num">{{$count}}</span>
                        <i class="fa fa-line-chart pull text-muted"></i>
                        <p class="des"><bdi>احصائيات </bdi></p>


                        <a href="/chart"><i class="fa fa-arrow-right"></i> <bdi>تفاصيل</bdi></a>
                    </div>

                    <div class="box">
                        <span class="num">{{$userNum}}</span>
                        <i class="fa fa-user-plus pull text-muted"></i>
                        <p class="des"><bdi>المستخدمين</bdi></p>


                        <a href="/user"><i class="fa fa-arrow-right"></i> <bdi>تفاصيل</bdi></a>
                    </div>

                    <div class="box">
                        <span class="num">{{$storeNum}}</span>
                        <i class="fa fa-pie-chart pull text-muted"></i>
                        <p class="des"><bdi>المخازن</bdi></p>


                        <a href="/store"><i class="fa fa-arrow-right"></i> <bdi>تفاصيل</bdi></a>
                    </div>


                </div>
                <div class="row">


                    <div class="col-sm-6 chart">

                        <div style="width:95%; min-height:250px;margin-bottom:20px; position:relative;">
                            <canvas style="max-width:100%; height:300px;" id="dashChart"></canvas>
                        </div>
                        <script>

                            var adds = [{{$stores[0]}},{{$stores[1]}},{{$stores[2]}},{{$stores[3]}}]
                            var cov = [{{$cov[0]}},{{$cov[1]}},{{$cov[2]}},{{$cov[3]}}];

                            var config = {
                                type: 'line',
                                data: {
                                    labels: ["المستهلك", "المستديم", "الخامات", "كهنه"],

                                    datasets: [{
                                        label: "احصائيات الخصم",
                                        data: cov,
                                        fill: true,
                                        borderColor: "#f27",
                                        backgroundColor: "rgba(255,20,70,0.4)"
                                    }, {
                                        label: "احصائيات الاضافه ",
                                        data: adds,
                                        fill: true,
                                        borderColor: "#27f",
                                        backgroundColor: "rgba(20,60,255,0.4)"
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    title: {
                                        display: true,
                                        text :"الاحصائيات العامه للمخازن"
                                       
                                    }
                                }
                            };

                            window.onload = function() {
                                var ctx = document.getElementById("dashChart").getContext("2d");
                                window.myLine = new Chart(ctx, config);
                            };
                        </script>

                    </div>


                    <!--content of stors -->
                    <div class="col-sm-6">
                       <div class="panel panel-primary" style="margin-top:15px;">
                            <div class="panel-heading">اخر 5 تحويلات</div>
                            <div class="panel-body">
                                <ul class="list-unstyled changes">
                                    <li class="nav-item">كمبيوتر</li>
                                    <li class="nav-item">كمبيوتر</li>
                                    <li class="nav-item">كمبيوتر</li>
                                    <li class="nav-item">كمبيوتر</li>
                                    <li class="nav-item">كمبيوتر</li>
                                </ul>    
                            </div>
                        </div>
                    </div>
                    <!--content of stors -->


                </div>
            </div>
            <!--End Content -->
        </div>
        <!--END col-content -->
    </div>
    <!--END row all -->
</div>
<!--END container all -->

<!-- Scripts -->
   <script src="/res/js/jquery.nicescroll.min.js"></script>
    <script src="/res/js/jquery-ui.min.js"></script>
    <script src="/res/js/bootstrap.min.js"></script>
    <script src="/res/js/jquery.selectBoxIt.min.js"></script>
    <script src="/js/back.js"></script>
    <script src="/js/notify.js"></script>



</body>
</html>
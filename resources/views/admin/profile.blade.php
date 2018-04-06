@extends('layouts.header')

@section('content')

<div class="container">
    <div class="header">
        <div class="header-img">
            <img src="/uploaded/{{$user->img}}" class="img" alt="user image" />
            <h3 class="text-center">{{$user->name}}</h3>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">بيانات المستخدم</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-md-push-6">
                    <h3 class="text-center">المعلومات الاساسيه</h3>
                    <ul class="list-unstyled list-notify">
                        <li><bdi>اسم المستخدم</bdi><span>{{$user->username}}</span></li>
                        <li><bdi>البريد</bdi><span>{{$user->email}}</span></li>
                        <li><bdi>الجوال</bdi><span>{{$user->phone}}</span></li>
                        @if($user->jop_id ==0)
                        <li><bdi>الوظيفه</bdi><span>مدير</span></li>
                        @elseif($user->jop_id == 1)
                        <li><bdi>الوظيفه</bdi><span>أمين مخزن</span></li>
                        <li><bdi>المخزن</bdi><span>{{$user->store_name}}</span></li>
                        @else
                        <li><bdi>الوظيفه</bdi><span>كاتب شطب</span></li>
                        <li><bdi>المخزن</bdi><span>{{$user->store_name}}</span></li>
                        @endif
                        <li><bdi>العنوان</bdi><span>{{$user->address}}</span></li>
                    </ul>
                </div>
                <div class="col-md-6 col-md-pull-6"></div>
            </div>
        </div>
    </div>

</div>
@endsection
@extends('layouts.header')

@section('content')
<div class="task">
        <div class="container">
            <h2 class="text-center">بيانات المستخدمين</h2>
    
            <div class="panel panel-primary table-panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-4">
                            <input class="form-control input-primary" id="userSearch" type="search" name="search" placeholder="بحث بالاسم" />
                        </div>
                    </div>
                    
                </div>
                <div class="panel-body mytable" style="overflow:auto; height:400px;">
                    <div class="table-responsive text-right">
                        <table class="table table-striped ">
                            <thead>
                            <tr>
                                <th>التسلسل</th>
                                <th>اسم المستخدم</th>
                                <th>الوظيفه</th>
                                <th>اسم المخزن</th>
                                <th>الإيميل</th>
                                <th>رقم التليفون</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody id="tableusers">
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td><a class="emp_name" href="/profile?id={{$user->id}}">{{$user->name}}</a></td>
                                <td>
                                    @if($user->jop_id==0)
                                        المدير
                                    @elseif($user->jop_id==1)
                                        امين مخزن
                                    @else
                                        كاتب شطب
                                    @endif
                                
                                </td>
                                <td>{{$user->store_id != 1?$user->store_name:''}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    @if(Auth::user()->jop_id == 0)
                                        @if($user->jop_id != 0)
                                            <a href="/delete?action=user&id={{$user->id}}" data-class="{{$user->name}}" class="btn btn-danger btn-sm confirm">حذف <i class="fa fa-close"></i></a>
                                        @endif
                                        <a href="/modify?id={{$user->id}}" class="btn btn-success btn-sm">تعديل <i class="fa fa-edit"></i></a>
                                    @else
                                    <p class="disabled">Disabled</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="text-center after-panel">
                @if(Auth::user()->jop_id == 0)
                <a class="btn btn-success" role="button" href="/register">اضافه موظف <i class="fa fa-plus"></i></a>
                @endif
            </div>
        </div>
    </div>
    @include('admin.ajax.userAjax');
@endsection    
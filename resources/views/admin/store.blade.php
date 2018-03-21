@extends('layouts.header')

@section('content')
<div class="container">
            <br><br>
        <div class="panel panel-primary table-panel">
            <div class="panel-heading form-parent">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <input class="form-control input-primary" id="searchinput" type="search" name="search" placeholder="بحث باسم الصنف" />
                    </div>
                    <div class="col-sm-4 col-sm-offset-4">
                        <select class="form-control input-primary" id="storechoose" name="store">
                            <option value="1">الكل</option>
                            @foreach($stores as $store)
                            <option value="{{$store->id}}">{{$store->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                
            </div>
            <div class="panel-body mytable" id="table-container">
  
                <table  class="table table-responsive table-striped">
                   <thead>
                        <tr>
                            <th>التسلسل</th>
                            <th>اسم الصنف</th>
                            <th>المخزن</th>
                            <th>الكميه الاساسيه</th>
                            <th>المصدر</th>
                            <th>سعر القطعه</th>
                            <th>الاجمالي</th>
                            <th>اذن الاضافه</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody id="tableStore">
                        @foreach($data as $d) 
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>{{$d->name}}</td>
                            <td>{{$d->store_name}}</td>
                            <td>{{$d->quantity}}</td>
                            <td>{{$d->source}}</td>
                            <td>{{$d->price}}</td>
                            <td>{{$d->total}}</td>
                            <td>{{$d->permision}}</td>
                            <td>
                                @if(Auth::user()->jop_id == 0 || Auth::user()->store_id == $d->store_id)
                                
                                <a href="/edit?id={{$d->id}}" class="btn btn-success btn-sm ">تعديل <i class="fa fa-edit"></i></a>
                                
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

        <div class="text-right after-panel">
                <button class="btn btn-success">توريد جديد <i class="fa fa-plus"></i></button>
                <button class="btn btn-info">اذن صرف <i class="fa fa-shopping-bag"></i></button>
            </div>
        
    </div>

    @include('admin.ajax.storeAjax');

@endsection
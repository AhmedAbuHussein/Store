@extends('layouts.header')

@section('content')

<div class="container">
        <h2 class="text-center text-muted" style="margin-bottom:30px;">تعديل بيانات {{$user->name}}</h2>
    <div class="row">
      
        <div class="col-md-7 col-md-push-5">
            
            <form id="register" class="form-horizontal" method="POST" action="{{url('/register')}}" enctype="multipart/form-data">
                @csrf
                <!-- start first name create -->
                <div class="form-group">
                    <div class="col-md-3 text-md-left pull-right">
                        <label for="fullname" class="control-label"> الاسم</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{$user->name}}" id="fullname" name="name" class="form-control" placeholder="الاسم" required />
                    </div>
                    
                </div>
                <!-- end first name create -->

                <!-- start email create -->
                <div class="form-group">
                    <div class="col-md-3 text-md-left pull-right">
                        <label for="email" class="control-label">البريد الالكتروني</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="email" value="{{$user->email}}" name="email" class="form-control" placeholder="البريد الالكتروني" required />
                    </div>
                    
                </div>
                <!-- end email create -->

                <!-- start password create -->
                <div class="form-group">
                    <div class="col-md-3 text-md-left pull-right">
                        <label for="password" class="control-label">كلمه المرور</label>
                    </div>
                    <div class="col-md-9">
                        <input type="password" id="password"  name="password" class="form-control" placeholder="كلمه المرور , لعدم التغير اتركها فارغه" required />
                    </div>
                    
                </div>
                <!-- end email create -->

                <!-- start username create -->
                <div class="form-group">  
                    <div class="col-md-3 text-md-left pull-right">
                        <label for="username" class="control-label">اسم المستخدم</label>
                    </div>            
                     <div class="col-md-9">
                        <input type="text" id="username" value="{{$user->username}}" name="username" class="form-control" placeholder="اسم المستخدم" required />
                    </div>
                    
                </div>
                <!-- end email create -->

                <!-- start jop create -->
                <div class="form-group">  
                    <div class="col-md-3 text-md-left pull-right">
                        <label for="jop" class="control-label">الوظيفه</label>
                    </div>            
                    <div class="col-md-9">
                        <select name="jop_id" id="jop" class="form-control">
                            <option value="">اختار الوظيفه</option>
                            <option value="0" {{ $user->jop_id == 0? 'selected':''}}>مدير</option>
                            <option value="1" {{ $user->jop_id == 1? 'selected':''}} >امين مخزن</option>
                            <option value="2" {{ $user->jop_id == 2? 'selected':''}} >كاتب شطب</option>
                        </select>
                    </div>
                   
                </div>
                <!-- end email create -->
                <!-- start jop create -->
                
                <div class="form-group" id="store" style="display:{{$user->jop_id == 0?'none':'block'}}"> 
                    <div class="col-md-3 text-md-left pull-right">
                        <label for="store" class="control-label">المخزن</label>
                    </div>             
                    <div class="col-md-9">
                        <select name="store" id="store" class="form-control">
                            <option value="">اختار المخزن</option>
                            @foreach($stores as $store)
                            <option value="{{$store->id}}" {{$user->store_id == $store->id? 'selected':'' }} >{{$store->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <!-- end email create -->

                 <!-- start username create -->
                 <div class="form-group">  
                        <div class="col-md-3 text-md-left pull-right">
                            <label for="phone" class="control-label">رقم الهاتف</label>
                        </div>            
                         <div class="col-md-9">
                            <input type="text" id="phone" value="{{$user->phone}}" name="phone" class="form-control" placeholder="رقم الهاتف" required />
                        </div>
                        
                    </div>
                    <!-- end email create -->
   
                <div class="form-group">
                    <div class="col-md-3 text-md-left pull-right">
                        <label for="text" class="control-label">العنوان</label>
                    </div>
                    <div class="col-md-9">
                        <textarea id="text" name="address" placeholder="العنوان" class="form-control" rows="2">{{$user->address}}</textarea>
                    </div>
                </div>

            </form>
        </div>

        <div class="col-md-5 col-md-pull-7">

            <div class="show-img">
                <img src="/uploaded/{{$user->img}}" alt="live preview" class="preview img-responsive center-block">
            </div>
            <div class="form-group">
                
                <input form="register" id="inputimg" type="file" max="1" name="imgfile" />
                
            </div>
            <div class="form-group" style="width:50%; margin:30px auto;">
                <button form="register" type="submit" class="btn btn-primary btn-block">حفـــــظ</button>
            </div>
        </div>

    </div>
</div>

@endsection
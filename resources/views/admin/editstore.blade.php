@extends('layouts.header')

@section('content')

<div class="container">

    <h2 class="text-center text-muted" style="margin:30px;">تعديل البيانات</h2>
   
    <form action="{{url('/edit')}}" id="updateForm" method="POST" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <input type="hidden" name="itemid" id="id" value=" {{$item[0]->id}}" />
        <input type="hidden" name="user" id="user" value=" {{Auth::user()->id}}" />
        <div class="row">
            <div class="col-sm-6 clear-float pull-sm-right">

                <!-- start name group -->
                <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="name" class="control-label d-block text-md-left">اسم الصنف</label>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            class="form-control" 
                            value="{{$item[0]->name}}" 
                            placeholder="اسم الصنف"/>

                    </div>
                </div>
                <!-- End name group -->

                <!-- start group -->
                <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="source" class="control-label d-block text-md-left ">اسم المورد</label>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text" 
                            name="source" 
                            id="source" 
                            class="form-control" 
                            value="{{$item[0]->source}}" 
                            placeholder="المصدر"/>

                    </div>
                </div>
                <!-- End group -->

                <!-- start group -->
                <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="quantity" class="control-label d-block text-md-left ">الكميه المورد</label>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text"
                            min="0"
                            name="quantity" 
                            id="quantity" 
                            class="form-control" 
                            value="{{$item[0]->quantity}}" 
                            placeholder="الكميه المورده"/>

                    </div>
                </div>
                <!-- End group -->

                 <!-- start group -->
                 <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="price" class="control-label d-block text-md-left ">سعر الصنف</label>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text" 
                            min="0"
                            name="price" 
                            id="price" 
                            class="form-control" 
                            value="{{$item[0]->price}}" 
                            placeholder=" سعر الصنف" />

                    </div>
                </div>
                <!-- End group -->

            </div>


            <div class="col-sm-6">

                <!-- start group -->
                <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="permision" class="control-label d-block text-md-left">رقم الاذن</label>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text" 
                            name="permision"
                            readonly 
                            id="permision" 
                            class="form-control" 
                            value="{{$item[0]->permision}}" 
                            placeholder="رقم الاذن" />

                    </div>
                </div>
                <!-- End group -->
               
                 <!-- start group -->
                 <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="status" class="control-label d-block text-md-left ">حاله الصنف</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" value="{{$item[0]->status==0?'جديد':'مرتجع'}}" class="form-control" readonly>
                        <input type="hidden" name="status" value="{{$item[0]->status}}">
                        
                    </div>
                </div>
                <!-- End group -->

                <!-- start group -->
                <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="store" class="control-label d-block text-md-left ">اسم المخزن</label>
                    </div>
                    <div class="col-md-9">
                       
                        <input type="text" name="store" class="form-control" value="{{$item[0]->store_name}}" placeholder="اسم المخزن" readonly >
                        <input type="hidden" name="store" value="{{$item[0]->store_id}}" />
                    </div>
                </div>
                <!-- End group -->
                <!-- start group -->
                <div class="form-group">
                    <div class="col-md-3 pull-right">
                        <label for="date" class="control-label d-block text-md-left ">تاريخ التوريد</label>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text" 
                           
                            id="date" 
                            readonly
                            class="form-control" 
                            value="{{$item[0]->created_at->toDayDateTimeString()}}" 
                            placeholder="تاريخ التوريد" />

                    </div>
                </div>
                <!-- End group -->
            </div>

            <div class="col-sm-4 col-sm-offset-4 mt-5">
                <div class="form-group text-center">
                    <div class="col-md-9">
                        <button id="updatedata" type="submit" class="btn btn-primary btn-block">حفظ <i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>

        </div>

        

    </form>

</div>

@endsection
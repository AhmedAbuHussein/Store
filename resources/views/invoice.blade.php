<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/res/css/bootstrap.min.css" />
        <link rel="stylesheet" href="/res/css/jquery-ui.min.css" />
        <style>
            
            *{
                direction: rtl;
                .table{
                    border-spacing: 0;
                    border-collapse: collapse;
                    background-color: transparent;
                    width: 100%;
                    max-width: 100%;
                    margin-bottom: 20px;
                    min-height: .01%;
                    overflow-x: auto;
                }
                .btn{
                    padding: 5px 10px;
                    font-size: 12px;
                    line-height: 1.5;
                    border-radius: 3px;

                    color: #fff;
                    background-color: #5cb85c;
                    border-color: #4cae4c;

                    display: inline-block;
                    padding: 6px 12px;
                    margin-bottom: 0;
                    font-size: 14px;
                    font-weight: 400;
                    line-height: 1.42857143;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: middle;
                    -ms-touch-action: manipulation;
                    touch-action: manipulation;
                    cursor: pointer;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    user-select: none;
                    background-image: none;
                    border: 1px solid transparent;
                    border-radius: 4px;
                }
            }
        </style>
    </head>
    <body>

        <div class="container">
            <br><br>
        <div class="panel panel-primary">
            <div class="panel-heading">Data store</div>
            <div class="panel-body" id="table-container">
        
                <table  class="table table-striped">
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
                               Admin
                            </td>
        
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        
            </div>
        </div>
                
        </div>

        <script src="/res/js/bootstrap.min.js"></script>

    </body>
</html>

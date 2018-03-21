<script>
     var tableStore = $('#tableStore');
    $(function() {

       
        $('#searchinput').keyup(function(event) {

            event.preventDefault();
            var text = $(this).val();
            var store = $('#storechoose').val();

            $.post('/store', { 'item': text,'store':store, '_token': $('input[name=_token]').val() }, function(req) {

               updateTable(req);

            });

        });

        $('#storechoose').change(function(e) {
            e.preventDefault();
            var text = $(this).val();
            var item = $('#searchinput').val();
            $.post('/storetype', { 'text': text,'item':item, '_token': $('input[name=_token]').val() }, function(req) {
                
                updateTable(req);
            });

        });

    });


    function updateTable(req) {
        
        tableStore.html("");
        for (i = 0; i < req.data.length; i++) {

            tdata = "<td>" + req.data[i].id + "</td>" +
                "<td>" + req.data[i].name + "</td>" +
                "<td>" + req.data[i].store_name + "</td>" +
                "<td>" + req.data[i].quantity + "</td>" +
                "<td>" + req.data[i].source + "</td>" +
                "<td>" + req.data[i].price + "</td>" +
                "<td>" + req.data[i].total + "</td>" +
                "<td>" + req.data[i].permision + "</td>";

            if (req.role == 1 || req.role == req.data[i].store_id) {
        
                tdata += '<td><a href="/edit?id=' + req.data[i].id + '" class="btn btn-success btn-sm ">تعديل <i class="fa fa-edit"></i></a></td>'
            }else{ 
                tdata += "<td>Disabled</td>";
            }
        

            tableStore.append("<tr>" + tdata + "</tr>");
        }

    }

</script>
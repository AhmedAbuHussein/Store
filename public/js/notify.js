$(function() {

    //notify-list
    count = 0;
    setInterval(function() {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/notification',
            dataType: 'json',
            type: 'get',
            data: { 'count': count },
            success: function(response) {
                $('#notify').text(response.count).show();
                $('#notify-list').html("");
                for (i = 0; i < response.count; i++) {
                    $('#notify-list').append('<li><a href="/store?store=' + response.notify[i].store_id + '&itemid=' + response.notify[i].requerd_num + '">' + response.notify[i].notify + '</a></li>');
                }
                count = response.count;
            }
        });
    }, 5000);

});
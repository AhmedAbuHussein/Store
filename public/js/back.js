/* global $, alert ,window */

$(function() {

    'use strict';
    if ($('#notify').text() == "") {
        $('#notify').hide();
    } else {
        $('#notify').show();
    }

    $('body').on('click', '.confirm', function() {
        var text = $(this).data('class');
        return confirm('هل انت متاكد من حذف ( ' + text + ' ) ؟')
    });

    $('.aside-ul > li').each(function() {

        $(this).click(function() {
            if ($(this).hasClass('selected')) {
                $(this).next('ul').slideUp(300);
                $(this).removeClass('selected');
            } else {
                $(this).addClass('selected').siblings().removeClass('selected');

                if ($(this).hasClass('selected')) {
                    $('ul.open').slideUp();
                    $(this).next('ul').slideDown(300);
                }
            }
        });

    });


    $("#datepicker").datepicker({
        inline: true,
        showButtonPanel: true,
        autoSize: true,

    });

    $('.aside').css({
        'height': $(window).height(),
    });

    $(window).resize(function() {

        $('.aside').css({
            'height': $(window).height(),
        })

    });

    $('.notification').click(function() {
        $(this).children('.notify').hide();
    });

    function readURL(input, $seleector) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $($seleector).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("input[type='file']").change(function() {
        readURL(this, '.preview');
    });


    $('#jop').change(function() {
        if ($(this).val() > 0) {
            $('#store').show(600);
        } else {
            $('#store').hide(600);
        }
    });


    $('.mytable').niceScroll();

    $('.selectbox').selectBoxIt();

});
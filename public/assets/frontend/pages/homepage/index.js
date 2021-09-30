// ajax pagination
$(function() {
    $('.carlist-page').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href'); 
        getCarList(url);
        window.history.pushState("", "", url);
    });
    $('#filter-select').on('select2:select', function (e) {
        var url = $(this).attr('href');  
        getCarList(url);
    });

    function getCarList(url) {
        var value = $('#filter-select').val();
        //alert(value);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : url,
            data : {filter: value},
        }).done(function (data) {
            $('.carlist-page').html(data);
        }).fail(function () {
            alert('記事を読み込めませんでした。');
        });
    }

    $('#table-filter').select2({
        width: '100'
    })
    $('#table-filter').on("select2:select", function(e) { 
        value = $(this).val();
        console.log(value);
        $.ajax({
            url : home_url,
            data : {bulletin_filter: value},
        }).done(function (data) {
            $('.table-responsive').html(data);
            $('#datatable').dataTable({
                ordering:false,
            });
        }).fail(function () {
            alert('記事を読み込めませんでした。');
        });
    });

    // hide select2 search box 
    $('select').select2({
        minimumResultsForSearch: -1
    });
    //change border width 
    if($(window).width() >= 768){
        for(i=0; i<=5; i++){
            $('.car-list-info').eq(i).css('border-bottom', 'transparent')
        }
        for(i=0; i<=4; i++){
            $('.car-list-info').eq(i).css('border-right', 'transparent')
        }
        for(i=6; i<=10; i++){
            $('.car-list-info').eq(i).css('border-right', 'transparent')
        }
    } else{
        for(i=0; i<=8; i++){
            $('.car-list-info').eq(i).css('border-bottom', 'transparent')
        }
        $('.car-list-info').eq(0).css('border-right', 'transparent')
        $('.car-list-info').eq(1).css('border-right', 'transparent')
        $('.car-list-info').eq(3).css('border-right', 'transparent')
        $('.car-list-info').eq(4).css('border-right', 'transparent')
        $('.car-list-info').eq(6).css('border-right', 'transparent')
        $('.car-list-info').eq(7).css('border-right', 'transparent')
        $('.car-list-info').eq(9).css('border-right', 'transparent')
        $('.car-list-info').eq(10).css('border-right', 'transparent')

    }
});
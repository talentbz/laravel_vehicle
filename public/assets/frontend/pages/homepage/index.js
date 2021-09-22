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
});
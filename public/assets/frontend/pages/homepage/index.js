// ajax pagination
$(function() {
    $('.carlist-page').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');  
        getCarList(url);
        window.history.pushState("", "", url);
    });

    function getCarList(url) {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.carlist-page').html(data);  
        }).fail(function () {
            alert('記事を読み込めませんでした。');
        });
    }
});
// ajax pagination
$(function() {
    $('.carlist-page').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');  
        getCarList(url);
        window.history.pushState("", "", url);
    });

    function getCarList(url) {
        $.ajax({
            url : url  
        }).done(function (data) {
            $('.carlist-page').html(data);  
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }
});
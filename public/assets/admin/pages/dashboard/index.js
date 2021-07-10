$(document).ready(function(){
    $('.confirm_delete').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        $('.delete').click(function(){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: bulletin_destroy,
                method: 'post',
                data: {id:id},
                success: function (res){
                    toastr["success"]("データが削除されました!");
                    $('#myModal').modal('hide');
                }
            })
        })
    })

    $('.confirm_vehicle').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        $('.vehicle_delete').click(function(){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: vehicle_destroy,
                method: 'post',
                data: {id:id},
                success: function (res){
                    toastr["success"]("データが削除されました!");
                    $('#vehicleDelete').modal('hide');
                }
            })
        })
    })
})
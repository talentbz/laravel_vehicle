$(document).ready(function(){
    $('.confirm_delete').click(function(){
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
                    toastr["success"]("Data deleted!");
                    $('#myModal').modal('hide');
                }
            })
        })
    })
})
$(document).ready(function(){
    //add data
    $('form#myForm').submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: add_url,
            method: 'post',
            data: formData,
            beforeSend: function(){
                $('.back').hide();
            },
            success: function (res) {
                toastr["success"]("保存完了");
                $('.back').show();
                $('.create_save').hide();
            },
            error: function (res){
                console.log(res)
            },
            cache: false,
            contentType: false,
            processData: false
        })
    })
    //delete bulletin
    $('.delete').click(function(e){
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:"POST",
            url: delete_url,
            data: { id: id },
            dataType: 'json',
            success: function(res){
                toastr["success"]("データが削除されました!");
                // $('#datatable').dataTable().fnDestroy();
                // $("#datatable").dataTable();


                //$('#datatable').DataTable().ajax.reload();
           }
        });
        
    })
     // change width data table
})
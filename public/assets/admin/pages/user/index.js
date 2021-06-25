
$(document).ready(function(){

    //edit data
    $('.edit').click(function(e){
        //e.preventDefault();
        //e.stopPropagation();
        var id = $(this).data('id');
        $('#myModal').modal('show');
        $("#myForm").append('<input type="hidden" name="id" value="'+ id +'"/>');
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
                $('.spinner-border').addClass("spinner-display")
            },
            success: function (res) {
                $('#myForm input[name="id"]').remove();
                setTimeout(function () {
                    $('.spinner-border').removeClass("spinner-display")
                }, 1000);
                if(res == 'exist'){
                    toastr["warning"]("Exist email, Please insert another one!");
                } else {
                    toastr["success"]("Data saved!");
                    $('#myModal').modal('hide');
                }
            },
            error: function (res){
                console.log(res)
            },
            cache: false,
            contentType: false,
            processData: false

        });
        
    })

    //edit data
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
                toastr["success"]("Data deleted!");
                var oTable = $('#datatable').dataTable();
                oTable.fnDraw(false);
           }
        });
        
    })

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
                $('.spinner-border').addClass("spinner-display")
            },
            success: function (res) {
                setTimeout(function () {
                    $('.spinner-border').removeClass("spinner-display")
                }, 1000);
                if(res == 'exist'){
                    toastr["warning"]("Exist email, Please insert another one!");
                } else {
                    toastr["success"]("Data saved!");
                    $('#myModal').modal('hide');
                }
            },
            error: function (res){
                console.log(res)
            },
            cache: false,
            contentType: false,
            processData: false

        });
    })
})

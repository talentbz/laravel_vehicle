$(document).ready(function(){

    //edit data
    $('.edit').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        var row = $(this).parent().parent(".data-row");
        var email = row.children(".email").text();
        var company_name = row.children(".company_name").text();
        var phone = row.children(".phone").text();
        var location = row.children(".location").text();
        $('#company_name').val(company_name);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#location').val(location);
        $('#user_id').val(id);
        $('#editModal').modal('show');
    })

    $('form#editForm').submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: edit_url,
            method: 'POST',
            data: formData,
            success: function (res) {
                if(res == 'exist'){
                    toastr["warning"]("メールがあります。別のメールを挿入してください。");
                } else {
                    toastr["success"]("データが保存されました！");
                    $('#editModal').modal('hide');
                }
            },
            error: function (res){
            },
            cache: false,
            contentType: false,
            processData: false

        });
    })


    //delte data
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
                type:"POST",
                url: delete_url,
                data: { id: id },
                dataType: 'json',
                success: function(data){
                    //$('#datatable').DataTable().ajax.reload(null, false);
                    toastr["success"]("データが削除されました!");
                    $('#deleteModal').modal('hide');
               }
            });
        })
        
    })

    //add data
    $('form#addForm').submit(function(e){
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
            success: function (res) {
                $('#datatable').DataTable().ajax.reload(null, false);
                if(res == 'exist'){
                    toastr["warning"]("メールがあります。別のメールを挿入してください。");
                } else {
                    toastr["success"]("データが保存されました！");
                    $('#myModal').modal('hide');
                }
            },
            error: function (res){
            },
            cache: false,
            contentType: false,
            processData: false

        });
    })

    //password show & hide
    $('.password_show').on('click', function(){
        var $pwd = $(".password");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    })
    //change lauguage of input file.
})

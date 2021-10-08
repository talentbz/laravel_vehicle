   $(document).ready(function () {
    $("#input-711").fileinput({
        theme: 'fa',
        maxFileCount: 1,
        initialPreview: image_paths,
        initialPreviewAsData: true,
        deleteUrl: remove_photo,
        initialPreviewConfig: id_array,
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        
        uploadUrl: add_photo_url,
        overwriteInitial: false,
        maxFileCount: 1,
        showBrowse: false,
        browseOnZoneClick: true
    });
        $('form#myForm').submit(function(e){
            e.preventDefault();
            e.stopPropagation();
            var formData = new FormData(this);
            console.log(formData);
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
                    window.location = redirect_company;
                },
                error: function (res){
                    console.log(res)
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })
        
   })